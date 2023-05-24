<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'Desc' => ['required','max:140'],
            // 'Sub_Title' => ['required','max:250'],
        ]);

        $tid = $request->input('tid');
       
        $isEdit = $tid != -1;
        

        if($isEdit) {
            $student = Subcategory::findOrFail($tid);
            $student->domain_name = $request->input('domain_name');
            $student->Name = $request->input('Name');

            if($request->hasfile('Image'))
            {
                $file = $request->file('Image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('storage/', $filename);
                $student->Image = $filename;
            }

            $student->category_id = $request->input('category_id');
            $student->Desc = $request->input('Desc');
            // $student->Sub_Title = $request->input('Sub_Title');
            $student->save();
        } else {
            $image = new Subcategory;
            $image->domain_name = $request->input('domain_name');
            $image->Name = $request->input('Name');
            if($request->hasfile('Image'))
                {
                    $file = $request->file('Image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extenstion;
                    $file->move('storage/', $filename);
                    $image->Image = $filename;
                }
                $image->category_id = $request->input('category_id');
                $image->Desc = $request->input('Desc');
                // $image->Sub_Title = $request->input('Sub_Title');
            $image->save();
        }

        //return redirect()->route('forms')->with('success','Teacher has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('buttons')->with('success', 'Image has been '.$text.' successfully');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Student  $Student
    * @return \Illuminate\Http\Response
    */
    // public function show(Student $Student)
    // {
    //     return view('livewire.show',compact('Student'));
    // }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Student  $Student
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $student = Subcategory::findOrFail($id);
        return view('livewire.users',compact('livewire'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Student  $Student
    * @return \Illuminate\Http\Response
    */
    // public function update(Request $request, Images $student,)
    // {
    //     $request->validate([
    //         // 'Pin_No' => 'required',
    //         // 'Unique_No' => 'required',
    //         // 'Hall_Ticket_No' => 'required',
    //         // 'rank' => 'required',
    //         // 'student_name' => 'required',
    //         // 'gender' => 'required',
    //         // 'caste' => 'required',
    //     ]);
        
    //     $student->fill($request->post())->save();

    //     return redirect()->route('users')->with('success','Student Has Been updated successfully');
    // }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Student  $Student
    * @return \Illuminate\Http\Response
    */
    public function destroy(Subcategory $category)
    {
        $category->delete();
        return redirect()->route('transactions')->with('success','Image has been deleted successfully');
    }
}
