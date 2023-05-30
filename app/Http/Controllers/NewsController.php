<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public $livewires;


    // public function users()
    // {
    //     $livewire = Company::orderBy('id','desc')->paginate(5);
    //     return view('livewire.users', compact('livewire'));
    // }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    // public function create()
    // {
    //     return view('livewire.create');
    // }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {

        $request->validate([
            // 'Type' => 'required',
            // 'sno' => 'required',
            // 'employee' => 'required',
            // 'designation' => 'required',
            // 'qualification' => 'required',
            // 'department' => 'required',
        ]);

        $tid = $request->input('tid');
        $isEdit = $tid != -1;

        if($isEdit) {
            $news = News::findOrFail($tid);
            $news->domain_name = $request->input('domain_name');
            $news->Title = $request->input('Title');
            if($request->hasfile('photos'))
            {
                $file = $request->file('photos');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('storage/', $filename);
                $news->photos = $filename;  
            }
            $news->Date = $request->input('Date');
            $news->Name = $request->input('Name');
            $news->SubCatName = $request->input('SubCatName');
            $news->Containt = $request->input('Containt');
            $news->save();
        } else {
            $image = new News;
            $image->domain_name = $request->input('domain_name');
            $image->Title = $request->input('Title');
            if($request->hasfile('photos'))
            {
                $file = $request->file('photos');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('storage/', $filename);
                $image->photos = $filename;  
            }
            $image->Date = $request->input('Date');
            $image->Name = $request->input('Name');
            $image->SubCatName = $request->input('SubCatName');
            $image->Containt = $request->input('Containt');
            $image->save();
        }

        //return redirect()->route('forms')->with('success','News has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('forms')->with('success', 'News has been '.$text.' successfully');
        
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    // public function show(Company $company)
    // {
    //     return view('livewire.show',compact('company'));
    // }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(News $livewire, $id)
    {
        $livewire = News::findOrFail($livewire, $id);
        return view('component.forms',['livewire' => $livewire]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, News $livewire)
    {
        // $validated = $request->validate([
        //     'Type' => 'required|unique:livewire,Type,' . $livewire->id . '|max:255',
        //     'sno' => 'required|unique:livewire,sno,' . $livewire->id . '|max:10',
        // ]);
    
        $livewire->Type = $request->input('Type');
        $livewire->sno = $request->input('sno');
        // $livewire->save();
    
        
        $livewire->fill($request->post())->save();

        return redirect()->route('forms')->with('success','News Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(News $livewire)
    {
        $livewire->delete();
        return redirect()->route('forms')->with('success','News has been deleted successfully');
    }
}