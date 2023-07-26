<?php

namespace App\Http\Livewire;

use App\Models\Neighbour;
use App\Models\Domain;
use Illuminate\Http\Request;
use Livewire\Component;

class RegisterExample extends Component
{
    // public $showSavedAlert = false;
    // public $showDemoNotification = false;

    public $editId;
    public $livewire;
    public $test;
    public $isEdit;
    public $source;
    public $target;

    public $tid;
    protected $queryString = ['tid'];

    public function mount(Neighbour $news, Request $request)
    {


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        
        $this->source = "";
        $this->target = "";


        if ($this->isEdit) {
            $news = Neighbour::findOrFail($this->editId);

            
            $this->source = $news->source;
            $this->target = $news->target;
        }
    }

    public function render()
    {
        return view('livewire.register-example');
    }
}
