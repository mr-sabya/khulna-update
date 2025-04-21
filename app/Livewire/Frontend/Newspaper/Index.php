<?php

namespace App\Livewire\Frontend\Newspaper;

use App\Models\Newspaper;
use App\Models\NewspaperCategory;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $newspapers = Newspaper::orderBy('id', 'DESC')->get();
        $categories = NewspaperCategory::all();
        return view('livewire.frontend.newspaper.index',[
            'newspapers' => $newspapers,
            'categories' => $categories,
        ]);
    }
}
