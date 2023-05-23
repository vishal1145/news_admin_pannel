<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
            'Pin_No' => 'required',
            'Unique_No' => 'required',
            'Hall_Ticket_No' => 'required',
            'rank' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'caste' => 'required',
        ]);
        
        Student::create($request->post());

        return redirect()->route('users')->with('success','Company has been created successfully.');
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
    public function edit($id)
    {
        $livewire = Student::findOrFail($id);
        return view('livewire.users',compact('livewire'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Student $livewire,)
    {
        $request->validate([
            'Pin_No' => 'required',
            'Unique_No' => 'required',
            'Hall_Ticket_No' => 'required',
            'rank' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'caste' => 'required',
        ]);
        
        $livewire->fill($request->post())->save();

        return redirect()->route('users')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Student $livewire)
    {
        $livewire->delete();
        return redirect()->route('users')->with('success','Company has been deleted successfully');
    }
}