<?php

namespace App\Http\Livewire\Components;

use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Http\Request;


class Modals extends Component
{
    public $livewire;
    public function render()
    {
        // $this->livewire = Teacher::select()->get();
        return view('components.modals');
    }

    public function edit($id)
    {
        $livewire = Teacher::findOrFail($id);
        return view('component.forms',compact('livewire'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Teacher $livewire,)
    {
        $request->validate([
            // 'Pin_No' => 'required',
            // 'Unique_No' => 'required',
            // 'Hall_Ticket_No' => 'required',
            // 'rank' => 'required',
            // 'student_name' => 'required',
            // 'gender' => 'required',
            // 'caste' => 'required',
        ]);
        
        $livewire->fill($request->post())->save();

        return redirect()->route('forms')->with('success','Teacher Has Been updated successfully');
    }

}
