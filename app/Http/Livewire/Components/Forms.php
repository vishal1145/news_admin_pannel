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
        $Category = $request->Name;

        // if ($request->filled('Category')) {
        //     $this->livewires = News::when(!is_null($Category), function ($query) use ($Category) {
        //         return $query->where('Category', $Category);
        //     })->latest()->get();
        // } else {
        //     $this->livewires = News::when(!is_null($Category), function ($query) use ($Category) {
        //         return $query->where('Category', $Category);
        //     })->latest()->get();
        // }

        $domain_name = $request->domain_name;
        

        if ($request->filled('Category') && $request->filled('domain_name')) {
            $this->livewires = News::when(!is_null($Category), function ($query) use ($Category) {
                return $query->where('Category', $Category);
            })->latest()->get();

            $this->livewires = News::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('id', $domain_name);
            })->latest()->get();

        } else if ($request->filled('domain_name')) {
            $this->livewires = News::when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('id', $domain_name);
            })->latest()->get();

        }else if ($request->filled('Category')) {
            $this->livewires = News::when(!is_null($Category), function ($query) use ($Category) {
                return $query->where('Category', $Category);
            })->latest()->get();
            
        } else {
            $this->livewires = News::leftJoin('page_views', 'news.id', '=', 'page_views.post_id')
            ->select('news.*', 'page_views.view_count')
            ->when(!is_null($domain_name), function ($query) use ($domain_name) {
                return $query->where('news.id', $domain_name);
            })
            ->when(!is_null($Category), function ($query) use ($Category) {
                return $query->where('news.Category', $Category);
            })
            ->latest()
            ->get();

        }

        return view('components.forms');
    }
}
