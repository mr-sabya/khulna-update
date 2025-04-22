<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\City;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorType;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;


    public $district_id = 0;
    public $city_id = 0;
    public $type_id = null;
    public $search = '';
    public $cities = [];
    public $locationLabel = 'All Bangladesh'; // Default label

    public function render()
    {
        // Fetch doctors with filters
        $doctors = Doctor::query()
            ->when($this->district_id, function ($query) {
                $query->where('district_id', $this->district_id);
            })
            ->when($this->city_id, function ($query) {
                $query->where('city_id', $this->city_id);
            })
            ->when($this->type_id, function ($query) {
                $query->where('type_id', $this->type_id);
            })
            ->where(function ($query) {
                if ($this->search) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('degree', 'like', '%' . $this->search . '%');
                }
            })
            ->orderBy('id', 'DESC')
            ->paginate(12);

        $districts = District::orderBy('name', 'ASC')->get();
        $types = DoctorType::orderBy('name', 'ASC')->get();

        // If district is selected, fetch the cities for that district
        if ($this->district_id) {
            $this->cities = City::where('district_id', $this->district_id)->get();
            $this->locationLabel = $this->district_id ? District::find($this->district_id)->name : 'All Bangladesh';
        }

        return view('livewire.frontend.doctor.index', compact('doctors', 'districts', 'types'));
    }

    // Update cities when district changes
    public function getCity()
    {
        $this->cities = City::where('district_id', $this->district_id)->get();
    }

    // Reset location filter
    public function resetLocation()
    {
        $this->district_id = 0;
        $this->city_id = 0;
        $this->locationLabel = 'All Bangladesh';
    }

    public function resetFields()
    {
        $this->district_id = '';
        $this->city_id = '';
        $this->type_id = '';
        $this->search = '';
        $this->cities = [];
        $this->resetLocation(); // Reset location label

        // Trigger the JavaScript event to reset the Select2 fields
        $this->dispatch('resetSelect2');
    }

    // Filter doctors based on selected criteria
    public function filterDoctors()
    {
        $this->dispatch('filterDoctors'); // Emit any event if needed
    }
}
