<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function uploadimage(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);
            $url = url('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

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

        if ($isEdit) {
            $news = News::findOrFail($tid);
            $news->category_id = $request->input('category_id');
            $news->domain_name = $request->input('domain_name');
            $news->Slug = $request->input('Slug');
            $news->Title = $request->input('Title');
            if ($request->hasfile('photos')) {
                $file = $request->file('photos');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $news->photos = $filename;
            }
            // else {
            //     $news['photos'] = null;
            // }
            $news->Date = $request->input('Date');
            $news->Name = $request->input('Name');
            $news->SubCatName = $request->input('SubCatName');
            $news->Content = $request->input('Content');
            $news->save();
        } else {
            $image = new News;
            $image->category_id = $request->input('category_id');
            $image->domain_name = $request->input('domain_name');
            $image->Slug = $request->input('Slug');
            $image->Title = $request->input('Title');
            if ($request->hasfile('photos')) {
                $file = $request->file('photos');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $image->photos = $filename;
            }
            // else {
            //     $image['photos'] = null;
            // }
            $image->Date = $request->input('Date');
            $image->Name = $request->input('Name');
            $image->SubCatName = $request->input('SubCatName');
            $image->Content = $request->input('Content');
            $image->save();
        }

        //return redirect()->route('forms')->with('success','News has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('forms')->with('success', 'News has been ' . $text . ' successfully');
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
        return view('component.forms', ['livewire' => $livewire]);
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

        return redirect()->route('forms')->with('success', 'News Has Been updated successfully');
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
        return redirect()->route('forms')->with('success', 'News has been deleted successfully');
    }
}
