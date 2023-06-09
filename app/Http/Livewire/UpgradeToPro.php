<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\domain_name;

use Livewire\Component;

class UpgradeToPro extends Component
{
    public $editId;
    public $livewire;
    public $test;
    public $isEdit;
    public $SubCatName;
    public $Image;
    public $Desc;
    public $category_id;
    public $domain_name;
    public $image;

    public $tid;
    public $catid;
    public $mainCatoryName = "";
    
    protected $queryString1 = ['catid'];
    protected $queryString = ['tid'];

    public function mount(Subcategory $image, Request $request)
    {   


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;


        $this->domain_name = "";
        $this->SubCatName = "";
        $this->Image = "";
        $this->category_id = "";
        $this->Desc = "";
        // $this->Sub_Title = "";
       
        // $isSubcategory = false;
        // if(isset($this->catid)){
        //     $isSubcategory = true;

        //     $image1 = Category::findOrFail($this->catid);
        //     $this->mainCatoryName =  $image1->Name;
        // }


        if($this->isEdit) {
            $image = Subcategory::findOrFail($this->editId);
            
            $this->domain_name = $image->domain_name;
            $this->SubCatName = $image->SubCatName;
            $this->Image = $image->Image;
            $this->category_id = $image->category_id;
            $this->Desc = $image->Desc;
            // $this->Sub_Title = $image->Sub_Title;



        }   

    }

    public function render()
    {
        return view('livewire.upgrade-to-pro');
    }
}
