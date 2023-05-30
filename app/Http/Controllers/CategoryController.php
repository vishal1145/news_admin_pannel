<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'Desc' => ['required', 'max:140'],
            // 'Sub_Title' => ['required','max:250'],
        ]);

        $tid = $request->input('tid');

        $isEdit = $tid != -1;


        if ($isEdit) {
            $student = Category::findOrFail($tid);
            $student->domain_name = $request->input('domain_name');
            $student->Name = $request->input('Name');

            if ($request->hasfile('Image')) {
                $file = $request->file('Image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $student->Image = $filename;
            }
            $student->Slug = $request->input('Slug');
            $student->Desc = $request->input('Desc');
            $student->Display_in_home = $request->has('Display_in_home');
            $student->Display_in_header = $request->has('Display_in_header');
            $student->save();
        } else {
            $image = new Category;
            $image->domain_name = $request->input('domain_name');
            $image->Name = $request->input('Name');
            if ($request->hasfile('Image')) {
                $file = $request->file('Image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $image->Image = $filename;
            }
            $image->Slug = $request->input('Slug');
            $image->Desc = $request->input('Desc');
            $image->Display_in_home = $request->has('Display_in_home');
            $image->Display_in_header = $request->has('Display_in_header');

            // $image->Sub_Title = $request->input('Sub_Title');
            $image->save();
        }

        //return redirect()->route('forms')->with('success','Teacher has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('transactions')->with('success', 'Category has been ' . $text . ' successfully');
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
        $student = Category::findOrFail($id);
        return view('livewire.users', compact('livewire'));
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
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('transactions')->with('success', 'Image has been deleted successfully');
    }
}
