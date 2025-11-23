<?php

namespace App\Livewire;
use Livewire\component;
USE Livewire\WithPagination;

class SubSpecialities extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $orderBy = "name";
    public $orderDirection = "asc";
    public $id,$name, $speciality;
    public $showForm = false;
    public $isEditing = false;

    public function render()
    {
        $specialitities = Speciality::all();

        $subspecialities=SubSpeciality::query
            ->where('name','like',"%this->search%")
            ->orderBy($this->orderField,$this->orderDirection)
            ->paginate(ENV('PAGINATION_COUNT',10));
        return view('livewire.sub-specialities', compact('subspecialities'));
    }
    public function orderBy($field){
        $this->orderField = $field;
        if($this->orderDirection == "asc")
            $this->orderDirection = "desc";
        else
            $this->orderDirection = "asc";
    }
    public function clearsearch(){
        $this->search="";
    }
    public function add(){
        $this->reset();
        $this->showForm = true;
    }
    public function cancel(){
        $this->reset();
        $this->showForm = false;
    }
    public function rules(){
        return[
            'name'=>['required','max:30',new AlphaSpaces()],
            'speciality' => ['required','int']
        ];
    }
    public function store(){
        $this->validate();

        SubSpeciality::create([
            'name'=>$this->name,
            'speciality_id'=>$this->specialityId
        ]);
        $this->reset();
        $this->showFOrm = false;
        session()->flash('message','Sub Speciality Added Successfully');

    }
    public function edit($id)
    {
        $subSpeciality =SubSpeciality::findorfail($id);
        $this->name = $subSpeciality->name;
        $this->id = $subSpeciality->id;
        $this->speciality = $subSpeciality->speciality_id;

        $this->showForm = true;
        $this->isEditing = true;
        
    }
    public function update($id){
        $subSpeciality = SubSpeciality::findorfail($id);
        $subSpeciality->name = $this->speciality;
        $subSpeciality->speciality_id = $this->speciality;
        $subSpeciality->save();
        

        $this->showForm = false;
        $this->isEditing = false;
    }
    public function destroy(){
        $subSpeciality = SubSpeciality::findorfail($id);
        $subSpeciality->delete();

        session()->flash('message','Sub Speciality updated Successfully');
    }
}