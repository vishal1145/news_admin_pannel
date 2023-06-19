<?php

namespace App\Http\Livewire\Components;
use App\Models\Layout;
use Livewire\Component;
use Illuminate\Http\Request;

class Notifications extends Component
{
    public $editId;
    public $livewire;
    public $test;
    public $isEdit;
    public $Display_in_layout;
    public $icon;
    public $slug;
    public $selectedID;
    public $tid;
    public $catid;
    public $mainCatoryName = "";

    protected $queryString1 = ['catid'];
    protected $queryString = ['tid'];

    public function mount(Layout $image, Request $request)
    {


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        $this->Display_in_layout = "";
        $this->icon = "";
        $this->slug = "";

        // $isSubcategory = false;
        // if(isset($this->catid)){
        //     $isSubcategory = true;

        //     $image1 = Category::findOrFail($this->catid);
        //     $this->mainCatoryName =  $image1->Name;
        // }


        if ($this->isEdit) {
            $image = Layout::findOrFail($this->editId);

            $this->Display_in_layout = $image->Display_in_layout;
            $this->icon = $image->icon;
            $this->slug = $image->slug;

        }

       
    }

    public function render()
    {
        return view('components.notifications');
    }
}
