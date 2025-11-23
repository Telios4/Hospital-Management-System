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

    public function render()
    {
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
}