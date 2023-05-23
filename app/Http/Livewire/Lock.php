<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Livewire\Component;

class Lock extends Component
{
    public $categories;
    public function render(Request $request)
    {
        // $this->images = Images::select()->get();
        // return view('transactions');
        $Type = $request->Type;
    
        $this->categories= Subcategory::when(!is_null($Type), function ($query) use ($Type) {
            return $query->where('Type', $Type);
        })->latest()->get();
    
        return view('lock');
    

    //     $livewires = Company::orderBy('id','desc')->paginate(5);
    //    // return view('livewire.users', compact('livewires'));
    }
}
