<?php

namespace App\Livewire;

use Livewire\Component;

class Statuses extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $orderBy = "name";
    public $orderDirection = "asc";
    public $id,$name, $descripiton;
    public $showForm = false;
    public $isEditing = false;
    
    public function render()
    {
        $statuses = Status::all();

        $subspecialities=SubSpeciality::query
            ->where('name','like',"%this->search%")
            ->orderBy($this->orderField,$this->orderDirection)
            ->paginate(ENV('PAGINATION_COUNT',10));
        return view('livewire.statuses', compact('statuses'));
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
        $this->resetValidation();
        $this->showForm = true;
    }
    public function cancel(){
        $this->reset();
        $this->showForm = false;
    }
    public function rules(){
        return[
            'name'=>['required','max:12','Alpha'],
            'description' => ['max:20',new AlphaSpaces()]
        ];
    }
    public function store(){
        $this->validate();

        Status::create([
            'name'=>$this->name,
            'description'=>$this->description
        ]);
        $this->reset();
        $this->showFOrm = false;
        session()->flash('message','Sub Speciality Added Successfully');

    }
    public function edit($id)
    {
        $status =Status::findorfail($id);
        $this->name = $status->name;
        $this->id = $status->id;
        $this->description = $status->description;

        $this->showForm = true;
        $this->isEditing = true;
        
    }
    public function update($id){
        $this->validate();
        $status = Status::findorfail($id);
        $status->name = $this->name;
        $status->status = $this->description;
        $status->save();
        
        $this->reset();
        $this->resetValidation();
        $this->showForm = false;
        $this->isEditing = false;

        session()->flash('message',' Status Updated Successfully');
    }
    public function destroy(){
        try{
            $status = Status::findorfail($id);
            $status->delete();

            session()->flash('message',' Status Deleted Successfully');
        } catch (QueryException $e){
            Log::error($e);
            session()->flash('Error',' Sorry,you cannot delete a "status"');
        }
    }
    
}
