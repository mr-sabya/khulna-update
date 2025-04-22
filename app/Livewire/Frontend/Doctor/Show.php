<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\Doctor;
use Livewire\Component;

class Show extends Component
{
    public $doctor;
    public $doctorId;

    public function mount($doctorId)
    {
        $this->doctorId = $doctorId;
        $this->doctor = Doctor::findOrFail($doctorId);    
    }


    public function render()
    {
		$doctors = Doctor::where('type_id', $this->doctor->type_id)->take(6)->get();
        return view('livewire.frontend.doctor.show',[
            'doctor' => $this->doctor,
            'doctors' => $doctors,
        ]);
    }
}
