<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HeaderNews;
use App\Models\Domain;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class Err404 extends Component
{


    // public $showSavedAlert = false;
    // public $showDemoNotification = false;

    public $editId;
    public $header;
    public $test;
    public $isEdit;
    public $Title;
    public $display_title;
    public $publish_status;
    public $domain_id;
    public $domain_name;
    public $Slug;
    public $Date;
    public $Name;
    public $SubCatName;
    public $youtube;
    public $tags;
    public $Display_in_front;
    public $Content;
    public $photos;
    public $news;
    public $category_id;

    public $tid;
    protected $queryString = ['tid'];

    public function mount(HeaderNews $news, Request $request)
    {


        $this->editId = $this->tid;

        $this->isEdit = $this->editId != -1;

        $this->category_id = "";
        $this->Title = "";
        $this->display_title = "";
        $this->publish_status = "";
        $this->domain_id = "";
        $this->domain_name = "";
        $this->Slug = "";
        $this->Date = "";
        $this->Name = "";
        $this->SubCatName = "";
        $this->youtube = "";
        $this->tags = "";
        $this->Display_in_front = "";
        $this->Content = "";
        $this->photos = "";
        $this->news = "";


        if ($this->isEdit) {
            $news = HeaderNews::findOrFail($this->editId);

            $this->display_title = $news->display_title;
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
            $this->tags = $news->tags;
            $this->Display_in_front = $news->Display_in_front;
            $this->Content = $news->Content;
            $this->photos = $news->photos;
        }
    }




    public function render(HeaderNews $header)
    {
        $header = HeaderNews::findOrFail($header);

        return view('404', ['livewire' => $header]);
    }
}
