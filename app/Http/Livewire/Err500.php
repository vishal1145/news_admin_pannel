<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HeaderNews;
use Illuminate\Http\Request;

class Err500 extends Component
{
    public $header;
    public function render(Request $request)
    {
        $Category = $request->Category;
        $domain_name = $request->domain_name;

        if ($request->filled('Category') && $request->filled('domain_name')) {
            $this->header = HeaderNews::when(!is_null($Category), function ($query) use ($Category) {
                return $query->where('Category', $Category);
            })->latest()->get();

            $this->header = HeaderNews::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('domain_name', $domain_name);
            })->latest()->get();
        } else if ($request->filled('domain_name')) {
            $this->header = HeaderNews::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('domain_name', $domain_name);
            })->latest()->get();
        } else if ($request->filled('Category')) {
            $this->header = HeaderNews::when(!is_null($Category), function ($query) use ($Category) {
                return $query->where('Category', $Category);
            })->latest()->get();
        } else {
            $this->header = HeaderNews::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('domain_name', $domain_name);
            })->latest()->get();

            $this->header = HeaderNews::when(!is_null($Category), function ($query) use ($Category) {
                return $query->where('Category', $Category);
            })->latest()->get();
        }

        return view('500');
    }
}
