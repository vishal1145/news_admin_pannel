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
        $domain_name = $request->domain_name;

        $this->categories = Subcategory::when(!is_null($domain_name), function ($query) use ($domain_name) {
            return $query->where('domain_name', $domain_name);
        })->latest()->get();
        // $categories = Subcategory::get();
        return view('components.buttons');


        //     $livewires = Company::orderBy('id','desc')->paginate(5);
        //    // return view('livewire.users', compact('livewires'));
    }
}
