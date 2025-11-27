<?php
namespace App\Livewire;

use App\Models\Practitioner;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Practitioners extends Component
{
    use WithPagination, WithFileUploads;
    
    protected $paginationTheme = "bootstrap";
      
    public $showForm = false;
    public $isEditing = false;
    public $status_id, $specialityId, $subSpecialityId;
    public $subSpecialities = null;
    public $qualifications_array = [];
    public $search = '';
    public $orderField = 'full_name';
    public $orderDirection = 'asc';
    public $showView = false;
    public $id, $registration_number, $full_name;
    public $profile_photo_url, $status, $speciality, $sub_speciality;
    public $contacts, $qualifications;


    public function render(){
        $searchString = $this->search;
         $statuses = Status::all();
        $specialities = Speciality::all();
        $subSpecialities = $this->subSpecialities;
        $degrees = Degree::all();
        $institutions = Institution::all();
    
        $practitioners = Practitioner::query()
            ->where('full_name', 'like', "%{$this->search}%")
            ->orWhereHas('status', function($q) use ($searchString) {
                $q->where('name', 'like', "%{$searchString}%");
            })
            ->orWhereHas('speciality', function($q) use ($searchString) {
                $q->where('name', 'like', "%{$searchString}%");
            })
            ->orderBy($this->orderField, $this->orderDirection)
            ->paginate(10);

        return view('livewire.practitioners', compact('practitioners'));
        return view('livewire.practitioners', compact(
            'practitioners', 
            'statuses', 
            'specialities', 
            'subSpecialities',
            'degrees',
            'institutions'
        ));
    }

    public function activate($id)
    {
        $practitioner = Practitioner::findOrFail($id);
        $activeStatus = Status::where('name', 'ACTIVE')->first();
        
        if ($activeStatus) {
            $practitioner->status_id = $activeStatus->id;
            $practitioner->save();
            session()->flash('success', 'Practitioner Activated Successfully');
        } else {
            session()->flash('error', 'Active status not found');
        }
    }
    public function deactivate($id)
    {
        $practitioner = Practitioner::findOrFail($id);
        $inactiveStatus = Status::where('name', 'INACTIVE')->first();
        
        if ($inactiveStatus) {
            $practitioner->status_id = $inactiveStatus->id;
            $practitioner->save();
            session()->flash('success', 'Practitioner Deactivated Successfully');
        } else {
            session()->flash('error', 'Inactive status not found');
        }
    }
    public function viewOne($id)
    {
        $practitioner = Practitioner::with('contacts', 'qualifications')
            ->findOrFail($id);
        
        $this->id = $practitioner->id;
        $this->registration_number = $practitioner->registration_number;
        $this->full_name = $practitioner->full_name;
        $this->profile_photo_url = $practitioner->profile_photo_url;
        $this->status = $practitioner->status ? $practitioner->status->name : '';
        $this->speciality = $practitioner->speciality ? $practitioner->speciality->name : '';
        $this->sub_speciality = $practitioner->sub_speciality ? $practitioner->sub_speciality->name : '';
        $this->contacts = $practitioner->contacts;
        $this->qualifications = $practitioner->qualifications;
        
        $this->showView = true;
    }

    public function closeView()
    {
        $this->reset();
        $this->showView = false;
    }

    public function add()
    {
        $this->reset();
        $this->resetValidation();
        
        // Generate registration number
        $lastPractitioner = Practitioner::orderBy('registration_number', 'desc')->first();
        $nextId = $lastPractitioner ? $lastPractitioner->registration_number + 1 : 1;
        $this->registration_number = $nextId;
        
        $this->showForm = true;
    }

    public function cancel()
    {
        $this->reset();
        $this->showForm = false;
    }
    public function rules()
    {
        return [
            'registration_number' => 'required',
            'full_name' => ['required', 'max:255'],
            'profile_photo_url' => 'nullable|image|max:5120', // 5MB max
            'status_id' => 'required|exists:statuses,id',
            'specialityId' => 'nullable|exists:specialities,id',
            'subSpecialityId' => 'nullable|exists:sub_specialities,id',
        ];
    }
    public function store()
    {
        try {
            $this->validate();

            DB::beginTransaction();

            $photoPath = null;
            if ($this->profile_photo_url) {
                Storage::disk('public')->makeDirectory('profile_photos');
                $photoPath = $this->profile_photo_url->store('profile_photos', 'public');
            }

            $practitioner = new Practitioner();
            $practitioner->registration_number = $this->registration_number;
            $practitioner->full_name = $this->full_name;
            $practitioner->profile_photo_url = $photoPath;
            $practitioner->status_id = $this->status_id;
            $practitioner->speciality_id = $this->specialityId ?? 
                Speciality::where('name', 'UNKNOWN')->first()->id;
            $practitioner->sub_speciality_id = $this->subSpecialityId ?? 
                SubSpeciality::where('name', 'UNKNOWN')->first()->id;
            $practitioner->date_of_registration = now();
            $practitioner->save();

            // Save qualifications
            foreach ($this->qualifications_array as $qualificationData) {
                if (isset($qualificationData['degree_id'], 
                        $qualificationData['institution_id'], 
                        $qualificationData['year_awarded'])) {
                    $practitioner->qualifications()->create([
                        'degree_id' => $qualificationData['degree_id'],
                        'institution_id' => $qualificationData['institution_id'],
                        'year_awarded' => $qualificationData['year_awarded'],
                    ]);
                }
            }

            DB::commit();

            $this->reset();
            $this->resetValidation();
            $this->showForm = false;

            session()->flash('success', 'Practitioner Created Successfully');
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Clean up uploaded file if exists
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            
            session()->flash('error', 'Error creating practitioner: ' . $e->getMessage());
        }
    }
    public function updatedSpecialityId()
    {
        $this->subSpecialities = SubSpeciality::where('speciality_id', $this->specialityId)->get();
        $this->subSpecialityId = null; // Reset sub-speciality selection
    }
    public function addQualification()
    {
        $this->qualifications_array[] = [
            'degree_id' => '',
            'institution_id' => '',
            'year_awarded' => '',
        ];
    }

    public function removeQualification($index)
    {
        unset($this->qualifications_array[$index]);
        $this->qualifications_array = array_values($this->qualifications_array);
    }
    public function edit($id)
    {
        $practitioner = Practitioner::with('qualifications')->findOrFail($id);
        
        $this->id = $practitioner->id;
        $this->registration_number = $practitioner->registration_number;
        $this->full_name = $practitioner->full_name;
        $this->status_id = $practitioner->status_id;
        $this->specialityId = $practitioner->speciality_id;
        $this->subSpecialityId = $practitioner->sub_speciality_id;
        
        // Load existing qualifications
        $this->qualifications_array = $practitioner->qualifications->map(function($q) {
            return [
                'degree_id' => $q->degree_id,
                'institution_id' => $q->institution_id,
                'year_awarded' => $q->year_awarded,
            ];
        })->toArray();
        
        $this->isEditing = true;
        $this->showForm = true;
    }
    public function update()
    {
        $this->validate();
        
        $practitioner = Practitioner::findOrFail($this->id);
        
        // Handle photo update
        if ($this->profile_photo_url && is_object($this->profile_photo_url)) {
            // Delete old photo
            if ($practitioner->profile_photo_url) {
                Storage::disk('public')->delete($practitioner->profile_photo_url);
            }
            $photoPath = $this->profile_photo_url->store('profile_photos', 'public');
            $practitioner->profile_photo_url = $photoPath;
        }
        
        $practitioner->full_name = $this->full_name;
        $practitioner->status_id = $this->status_id;
        $practitioner->speciality_id = $this->specialityId;
        $practitioner->sub_speciality_id = $this->subSpecialityId;
        $practitioner->save();
        
        // Update qualifications
        $practitioner->qualifications()->delete();
        foreach ($this->qualifications_array as $qualificationData) {
            if (isset($qualificationData['degree_id'], 
                    $qualificationData['institution_id'], 
                    $qualificationData['year_awarded'])) {
                $practitioner->qualifications()->create([
                    'degree_id' => $qualificationData['degree_id'],
                    'institution_id' => $qualificationData['institution_id'],
                    'year_awarded' => $qualificationData['year_awarded'],
                ]);
            }
        }
        
        $this->reset();
        $this->resetValidation();
        $this->showForm = false;
        
        session()->flash('success', 'Practitioner Updated Successfully');
    }
    public function sortBy($field)
    {
        if ($this->orderField === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderField = $field;
            $this->orderDirection = 'asc';
        }
    }
}
