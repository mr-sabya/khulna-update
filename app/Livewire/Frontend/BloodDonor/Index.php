<?php

namespace App\Livewire\Frontend\BloodDonor;

use App\Models\Blood;
use App\Models\BloodDonor;
use App\Models\City;
use App\Models\District;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $district_id;
    public $city_id;
    public $blood_id;
    public $search = '';

    public $cities = [];

    public function getCity()
    {
        $this->cities = City::where('district_id', $this->district_id)->get();
        $this->city_id = null;
    }

    public function updated($property)
    {
        $this->resetPage(); // Reset to first page when filter changes
    }

    public function resetFileds()
    {
        $this->reset(['district_id', 'city_id', 'blood_id', 'search']);
    }

    public function render()
    {
        $query = BloodDonor::query();

        if ($this->city_id) {
            $query->where('city_id', $this->city_id);
        }

        if ($this->blood_id) {
            $query->where('blood_id', $this->blood_id);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        return view('livewire.frontend.blood-donor.index', [
            'donors' => $query->latest()->paginate(12),
            'bloods' => Blood::orderBy('name')->get(),
            'districts' => District::orderBy('name')->get(),
        ]);
    }
}
