<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Service;
use Livewire\Component;

class MainService extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.main-service', [
            'services' => Service::where('type', 'main')->orderBy('order')->get(),
        ]);
    }
}
