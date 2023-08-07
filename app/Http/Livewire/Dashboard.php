<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\News;

class Dashboard extends Component
{
    public function render()
    {
        $categories = Category::all();
        $news = News::all();

        $totalCategories = $categories->count();
        $totalNews = $news->count();

        return view('dashboard', compact('totalCategories', 'totalNews'));
    }
}
