<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Service;
use Livewire\Component;

class SubService extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.sub-service',[
            'services' => Service::where('type', 'sub')->orderBy('order')->get(),
        ]);
    }
}
