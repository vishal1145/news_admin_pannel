<?php

namespace App\Http\Livewire;

use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Http\Request;


class ProfileExample extends Component
{
    
    // public $showSavedAlert = false;
    // public $showDemoNotification = false;

    public $editId;
    public $livewire;
    public $test;
    public $isEdit;
    public $Title;
    public $Domain;
    public $Date;
    public $Category;
    public $Subcategory;
    public $Containt;
    public $photos;
    public $news;

    public $tid;
    protected $queryString = ['tid'];
    
    public function mount(News $news, Request $request)
    {   


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;


        $this->Title = "";
        $this->Domain = "";
        $this->Date = "";
        $this->Category = "";
        $this->Subcategory = "";
        $this->Containt ="";
        $this->photos = "";
        $this->news = "";


        if($this->isEdit) {
            $news = News::findOrFail($this->editId);
            
            $this->Title = $news->Title;
            $this->Domain = $news->Domain;
            $this->Date = $news->Date;
            $this->Category = $news->Category;
            $this->Category = $news->Subcategory;
            $this->Containt = $news->Containt;
            $this->photos = $news->photos;
        }   

    }

    public function render(News $livewire)
    {
        $livewire = News::findOrFail($livewire);
       
        // return view('component.forms',['livewire' => $livewire]);
        return view('livewire.profile-example', ['livewire' => $livewire]);
    }

    public function edit(News $livewire)
    {
        $test = "test 1213";
        return view('livewire.profile-example',compact('livewire'));
    }

    // /**
    // * Update the specified resource in storage.
    // *
    // * @param  \Illuminate\Http\Request  $request
    // * @param  \App\company  $company
    // * @return \Illuminate\Http\Response
    // */
    // public function update(Request $request, Company $livewire)
    // {
    //     $request->validate([
    //         'Pin_No' => 'required',
    //         'Unique_No' => 'required',
    //         'Hall_Ticket_No' => 'required',
    //         'rank' => 'required',
    //         'student_name' => 'required',
    //         'gender' => 'required',
    //         'caste' => 'required',
    //     ]);
        
    //     $livewire->fill($request->post())->save();

    //     return redirect()->route('users')->with('success','Company Has Been updated successfully');
    // }
}
