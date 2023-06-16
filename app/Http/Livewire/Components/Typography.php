<?php

namespace App\Http\Livewire\Components;

use App\Models\Meta;
use App\Models\Domain;
use Livewire\Component;
use Illuminate\Http\Request;

class Typography extends Component
{
    public $lives;

    public function render(Request $request)
    {

        $this->lives = Meta::all();

        return view('components.typography');
    }
}
