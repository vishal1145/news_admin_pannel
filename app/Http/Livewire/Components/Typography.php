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
        $selectedDomainId = $request->input('domain_id'); // Get the selected domain ID from the request

        $domains = Domain::pluck('domain_name', 'id'); // Fetch all domains as a key-value pair (ID => Name)

        // Filter the domain list based on the selected domain ID
        if ($selectedDomainId) {
            $lives = Domain::where('id', $selectedDomainId)->get();
        } else {
            $lives = Domain::all();
        }

        $this->lives = Meta::all();

        return view('components.typography', [
            'domains' => $lives,
            'selectedDomainId' => $selectedDomainId,
        ]);
    }
}
