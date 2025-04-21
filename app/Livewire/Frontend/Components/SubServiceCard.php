<?php

namespace App\Livewire\Frontend\Components;

use App\Models\Service;
use Livewire\Component;

class SubServiceCard extends Component
{

    public $serviceId;

    public function mount($serviceId) 
    {
        $this->serviceId = $serviceId;    
    }

    public function render()
    {
        $service = Service::find($this->serviceId);
        return view('livewire.frontend.components.sub-service-card',[
            'service' => $service,
            'count' => app("App\\Models\\" . $service->model_name)::count(),
        ]);
    }
}
