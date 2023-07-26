<?php

namespace App\Http\Livewire;

use App\Models\Neighbour;
use Livewire\Component;

class LoginExample extends Component
{
    public $results;
    public function render()
    {
        $this->results = Neighbour::select('neighbours.id as id', 'd1.domain_name as source', 'd2.domain_name as target')
            ->join('domains as d1', 'neighbours.source', '=', 'd1.id')
            ->join('domains as d2', 'neighbours.target', '=', 'd2.id')
            ->get();

        return view('livewire.login-example');
    }
}
