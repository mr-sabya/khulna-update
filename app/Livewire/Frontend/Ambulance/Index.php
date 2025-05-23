<?php

namespace App\Livewire\Frontend\Ambulance;

use App\Models\Ambulance;
use App\Models\City;
use App\Models\District;
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

    public function resetFields()
    {
        $this->district_id = null;
        $this->city_id = null;
        $this->search = null;

        $this->cities = []; // if needed

        $this->dispatch('resetSelect2');
    }

    public function render()
    {
        $query = Ambulance::query();

        if ($this->district_id) {
            $query->where('district_id', $this->district_id);
        }

        if ($this->city_id) {
            $query->where('city_id', $this->city_id);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $ambulances = $query->orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('livewire.frontend.ambulance.index', compact('ambulances', 'districts'));
    }

}
