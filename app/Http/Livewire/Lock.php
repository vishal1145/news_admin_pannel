<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Layout;
use Livewire\Component;

class Lock extends Component
{
    public $layouts;

    public function render(Request $request)
    {
        $this->layouts = Layout::all();
        return view('lock');
    }
}
