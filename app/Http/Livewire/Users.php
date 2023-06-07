<?php

namespace App\Http\Livewire;
use App\Models\Meta;
use Illuminate\Http\Request;
use Livewire\Component;

class Users extends Component
{
   
    public $editId;
    public $test;
    public $isEdit;
    public $domain_id;
    public $facebook;
    public $tid;
    public $catid;


    protected $queryString1 = ['catid'];
    protected $queryString = ['tid'];

    public function mount(Meta $image, Request $request)
    {


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        $this->domain_id = "";
        $this->facebook = "";

        if ($this->isEdit) {
            $image = Meta::findOrFail($this->editId);

            $this->domain_id = $image->domain_id;
            $this->facebook = $image->facebook;

        }

       
    }

    public function render()
    {
        
        return view('livewire.users');

    }

}
