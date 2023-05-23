<?php

namespace App\Http\Livewire\Components;
use Illuminate\Http\Request;
use App\Models\Subcategory;

use Livewire\Component;

class Buttons extends Component
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
        // $categories = Subcategory::get();
        return view('components.buttons', compact('subcategories'));
    

    //     $livewires = Company::orderBy('id','desc')->paginate(5);
    //    // return view('livewire.users', compact('livewires'));
    }
}
