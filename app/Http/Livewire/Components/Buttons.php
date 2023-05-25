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
       
        
        $Name = $request->Name;
        $domain_name = $request->domain_name;
        

        if ($request->filled('Name') && $request->filled('domain_name')) {
            
            $this->categories = Subcategory::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('domain_name', $domain_name);
            })->latest()->get();

            $this->categories = Subcategory::when(!is_null($Name), function ($query) use ($Name) {
                return $query->where('Name', $Name);
            })->latest()->get();

        } else if ($request->filled('domain_name')) {
            $this->categories = Subcategory::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('domain_name', $domain_name);
            })->latest()->get();

        }else if ($request->filled('Name')) {
            $this->categories = Subcategory::when(!is_null($Name), function ($query) use ($Name) {
                return $query->where('Name', $Name);
            })->latest()->get();
            
        } else {
            $this->categories = Subcategory::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('domain_name', $domain_name);
            })->latest()->get();

            $this->categories = Subcategory::when(!is_null($Name), function ($query) use ($Name) {
                return $query->where('Name', $Name);
            })->latest()->get();
        }
        return view('components.buttons');


        //     $livewires = Company::orderBy('id','desc')->paginate(5);
        //    // return view('livewire.users', compact('livewires'));
    }
}
