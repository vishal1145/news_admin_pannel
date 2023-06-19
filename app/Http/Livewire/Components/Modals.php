<?php

namespace App\Http\Livewire\Components;

use App\Models\Meta;
use Livewire\Component;
use Illuminate\Http\Request;


class Modals extends Component
{
    public $editId;
    public $test;
    public $isEdit;
    public $domain_id;
    public $facebook;
    public $favicon;
    public $desc;
    public $twitter;
    public $image;
    public $author;
    public $instagram;
    public $title;
    public $keyword;
    public $pinterest;
    public $youtube;
    public $punchline;
    public $punchdesc;
    public $punchlogo;
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
        $this->favicon = "";
        $this->desc = "";
        $this->twitter = "";
        $this->image = "";
        $this->author = "";
        $this->instagram = "";
        $this->title = "";
        $this->keyword = "";
        $this->pinterest = "";
        $this->youtube = "";
        $this->punchline = "";
        $this->punchdesc = "";
        $this->punchlogo = "";

        if ($this->isEdit) {
            $image = Meta::findOrFail($this->editId);

            $this->domain_id = $image->domain_id;
            $this->facebook = $image->facebook;
            $this->favicon = $image->favicon;
            $this->desc = $image->desc;
            $this->twitter = $image->twitter;
            $this->image = $image->image;
            $this->author = $image->author;
            $this->instagram = $image->instagram;
            $this->title = $image->title;
            $this->keyword = $image->keyword;
            $this->pinterest = $image->pinterest;
            $this->youtube = $image->youtube;
            $this->punchline = $image->punchline;
            $this->punchdesc = $image->punchdesc;
            $this->punchlogo = $image->punchlogo;


        }

       
    }

    public function render()
    {
        // $this->livewire = Teacher::select()->get();
        return view('components.modals');
    }

   
}
