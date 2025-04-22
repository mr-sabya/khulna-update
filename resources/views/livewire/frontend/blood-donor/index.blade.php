<div class="blood-section section-padding">
    <div class="container-fluid mx-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="filter">
                    <div class="row g-2">
                        <div class="col-lg-2 d-flex align-items-center">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#locationModal">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $city_id ? optional(\App\Models\City::find($city_id))->name : 'All Bangladesh' }}</span>
                            </button>
                        </div>

                        <div class="col-lg-2">
                            <select wire:model.live="blood_id" class="form-control">
                                <option value="">All Blood Groups</option>
                                @foreach($bloods as $blood)
                                <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search here...">
                        </div>

                        <div class="col-lg-2">
                            <button type="button" wire:click="resetFields" class="btn w-100 form-btn custom-btn">
                                <i class="fa-solid fa-rotate"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Donors List --}}
        <div class="row g-3">
            @forelse($donors as $donor)
            <div class="col-lg-3">
                <div class="card text-center h-100">
                    <div class="info">
                        <h5>{{ $donor->name }}</h5>
                        <p>Blood Group : <span class="badge bg-success">{{ $donor->bloodGroup->name ?? '' }}</span></p>
                    </div>
                    <div class="phone">
                        <p>{{ $donor->phone }}</p>
                        <p>{{ $donor->address }}</p>
                        <p>{{ $donor->city->name ?? '' }}, {{ $donor->district->name ?? '' }}</p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $donor->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12 text-center">
                <h4>No Donors Found!</h4>
            </div>
            @endforelse
        </div>

        <div class="mt-30">
            {{ $donors->links() }}
        </div>
    </div>

    {{-- Location Modal --}}
    <div class="modal fade" id="locationModal" tabindex="-1" wire:ignore.self aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Select Location</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select District</label>
                                <select wire:model="district_id" wire:change="getCity" class="form-control">
                                    <option value="0">All District</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h5>Cities:</h5>
                            <div class="row" id="city_div">
                                @foreach($cities as $city)
                                <div class="col-md-6">
                                    <button wire:click="$set('city_id', {{ $city->id }})" data-bs-dismiss="modal" class="btn btn-outline-primary w-100 mb-2">
                                        {{ $city->name }}
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>