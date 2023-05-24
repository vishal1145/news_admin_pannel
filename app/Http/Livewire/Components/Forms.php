<?php

namespace App\Http\Livewire\Components;

use App\Models\News;
use Illuminate\Http\Request;
use Livewire\Component;
use DataTables;

class Forms extends Component
{
    public $livewires;
    public function render(Request $request)
    {
        // $this->livewires = Teacher::select()->get();
        // return view('components.forms');
        // $this->livewires = Teacher::when($request->status !=null, function ($q) use ($request) {
        //     return $q->where('status_message', $request->status);
        // })
        // ->paginate(10);
        // return view('components.forms');
        $Category = $request->Category;
        

        $this->livewires = News::when(!is_null($Category), function ($query) use ($Category) {
            return $query->where('Category', $Category);
        })->latest()->get();

        return view('components.forms');
    }

}
