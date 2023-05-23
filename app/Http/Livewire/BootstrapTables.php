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
    public $Sub_Title;
    public $image;
    public $domain_name;

    public $tid;
    public $catid;
    public $mainCatoryName = "";
    
    protected $queryString1 = ['catid'];
    protected $queryString = ['tid'];

    public function mount(Category $image, Request $request)
    {   


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        $this->domain_name = "";
        $this->Name = "";
        $this->Image = "";
        $this->Desc = "";
        // $this->Sub_Title = "";
       
        // $isSubcategory = false;
        // if(isset($this->catid)){
        //     $isSubcategory = true;

        //     $image1 = Category::findOrFail($this->catid);
        //     $this->mainCatoryName =  $image1->Name;
        // }


        if($this->isEdit) {
            $image = Category::findOrFail($this->editId);
            
            $this->domain_name = $image->domain_name;
            $this->Name = $image->Name;
            $this->Image = $image->Image;
            $this->Desc = $image->Desc;
            // $this->Sub_Title = $image->Sub_Title;



        }   

    }

    
    public function render(Request $request)
    {
        // $domain_name = $request->domain_name;

        // $this->domain_name = Domain::when(!is_null($domain_name), function ($query) use ($domain_name) {
        //     return $query->where('Domain', $domain_name);
        // })->latest()->get();

        // $Domain = Domain::findOrFail($Domain);
        return view('bootstrap-tables');
    }

}
