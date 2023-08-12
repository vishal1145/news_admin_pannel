<?php

namespace App\Http\Livewire;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Http\Request;


class Transactions extends Component
{
    public $categories;
    public function render(Request $request)
    {
        // $this->images = Images::select()->get();
        // return view('transactions');
        $domain_name = $request->domain_name;
    
        $this->categories= Category::when(!is_null($domain_name), function ($query) use ($domain_name) {
            return $query->where('domain_id', $domain_name);
        })->latest()->get();
    
        // $categories = Category::get();
        return view('transactions');
    

    //     $livewires = Company::orderBy('id','desc')->paginate(5);
    //    // return view('livewire.users', compact('livewires'));
    }

    // public function show()
    // {
    //    $livewires = Company::orderBy('id','desc')->paginate(5);
    //    return view('livewire.users', compact('livewires'));
    // }

    // public function store(Request $request)
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
        
    //     Company::create($request->post());

    //     return redirect()->route('users')->with('success','Company has been created successfully.');
    // }

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
    // public function edit(Company $company)
    // {
    //     return view('livewire.edit',compact('company'));
    // }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    // public function update(Request $request, Company $company)
    // {
    //     $request->validate([
    //         'sno' => 'required',
    //         'pno' => 'required',
    //         'uno' => 'required',
    //         'hno' => 'required',
    //         'rank' => 'required',
    //         'student_name' => 'required',
    //         'gender' => 'required',
    //         'caste' => 'required',
    //     ]);
        
    //     $company->fill($request->post())->save();

    //     return redirect()->route('users')->with('success','Company Has Been updated successfully');
    // }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    // public function destroy(Company $company)
    // {
    //     $company->delete();
    //     return redirect()->route('users')->with('success','Company has been deleted successfully');
    // }
}
