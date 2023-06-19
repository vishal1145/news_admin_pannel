<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Domain;
use Livewire\Component;

class BootstrapTables extends Component
{
    public $editId;
    public $livewire;
    public $test;
    public $isEdit;
    public $Name;
    public $Image;
    public $Desc;
    public $Display_in_home;
    public $Display_in_header;
    public $Display_in_top_nav;
    public $Display_in_layout;
    public $Sub_Title;
    public $image;
    public $Slug;
    public $domain_id;
    public $selectedID;
    public $tid;
    public $catid;
    public $mainCatoryName = "";
    public $categories;

    protected $queryString1 = ['catid'];
    protected $queryString = ['tid'];

    public function mount(Category $image, Request $request)
    {


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        $this->domain_id = "";
        $this->Name = "";
        $this->Image = "";
        $this->Slug = "";
        $this->Desc = "";
        $this->Display_in_home = "";
        $this->Display_in_header = "";
        $this->Display_in_top_nav = "";
        $this->Display_in_layout = "";

        // $isSubcategory = false;
        // if(isset($this->catid)){
        //     $isSubcategory = true;

        //     $image1 = Category::findOrFail($this->catid);
        //     $this->mainCatoryName =  $image1->Name;
        // }


        if ($this->isEdit) {
            $image = Category::findOrFail($this->editId);

            $this->domain_id = $image->domain_id;
            $this->Name = $image->Name;
            $this->Image = $image->Image;
            $this->Slug = $image->Slug;
            $this->Desc = $image->Desc;
            $this->Display_in_home = $image->Display_in_home;
            $this->Display_in_header = $image->Display_in_header;
            $this->Display_in_top_nav = $image->Display_in_top_nav;
            $this->Display_in_layout = $image->Display_in_layout;

            // $this->categories =  Domain::pluck('id', 'domain_name');
            // $this->selectedID = 2;

        }

       
    }


    public function render(Request $request)
    {
        return view('bootstrap-tables');
    }
}
