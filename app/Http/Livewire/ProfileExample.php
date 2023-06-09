<?php

namespace App\Http\Livewire;

use App\Models\News;
use App\Models\Domain;
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
    public $publish_status;
    public $domain_id;
    public $domain_name;
    public $Slug;
    public $Date;
    public $Name;
    public $SubCatName;
    public $youtube;
    public $tags;
    public $author;
    public $keyword;
    public $Display_in_front;
    public $Content;
    public $photos;
    public $news;
    public $category_id;

    public $tid;
    protected $queryString = ['tid'];
    
    public function mount(News $news, Request $request)
    {   


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        $this->category_id = "";
        $this->Title = "";
        $this->publish_status = "";
        $this->domain_id = "";
        $this->domain_name = "";
        $this->Slug = "";
        $this->Date = "";
        $this->Name = "";
        $this->SubCatName = "";
        $this->youtube = "";
        $this->tags = "";
        $this->author = "";
        $this->keyword = "";
        $this->Display_in_front = "";
        $this->Content ="";
        $this->photos = "";
        $this->news = "";


        if($this->isEdit) {
            $news = News::findOrFail($this->editId);
            
            $this->publish_status = $news->publish_status;
            $this->domain_id = $news->domain_id;
            $this->category_id = $news->category_id;
            $this->Title = $news->Title;
            $this->domain_name = $news->domain_name;
            $this->Slug = $news->Slug;
            $this->Date = $news->Date;
            $this->Name = $news->Name;
            $this->SubCatName = $news->SubCatName;
            $this->youtube = $news->youtube;
            $this->author = $news->author;
            $this->keyword = $news->keyword;
            $this->tags = $news->tags;
            $this->Display_in_front = $news->Display_in_front;
            $this->Content = $news->Content;
            $this->photos = $news->photos;
        }   

    }

    public function render(News $livewire)
    {
        $livewire = News::findOrFail($livewire);
       
        // return view('component.forms',['livewire' => $livewire]);
        return view('livewire.profile-example', ['livewire' => $livewire]);
    }

    // public function edit(News $livewire)
    // {
    //     $test = "test 1213";
    //     return view('livewire.profile-example',compact('livewire'));
    // }

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
