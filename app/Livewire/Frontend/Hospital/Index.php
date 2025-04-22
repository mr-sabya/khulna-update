<?php

namespace App\Livewire\Frontend\Hospital;

use App\Models\City;
use App\Models\District;
use App\Models\Hospital;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $district_id = '';
    public $city_id = '';
    public $search = '';
    public $cities = [];

    // protected $queryString = ['district_id', 'city_id', 'search'];

    public function updatedDistrictId($value)
    {
        // dd($this->district_id);
        $this->city_id = null;
        $this->cities = City::where('district_id', $value)->orderBy('name')->get();
        $this->dispatch('updateCityOptions', ['cities' => $this->cities]);
    }

    public function resetFileds()
    {
        $this->district_id = null;
        $this->city_id = null;
        $this->search = null;

        $this->cities = []; // if needed
        $this->dispatch('resetSelect2');
    }

    public function render()
    {
        $query = Hospital::query();

        if ($this->district_id) {
            $query->where('district_id', $this->district_id);
        }

        if ($this->city_id) {
            $query->where('city_id', $this->city_id);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $hospitals = $query->orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('livewire.frontend.hospital.index', compact('hospitals', 'districts'));
    }
}
