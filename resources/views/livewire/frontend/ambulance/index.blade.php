<div class="blood-section section-padding">
    <div class="container-fluid px-5">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <!-- filter form -->
                <div class="filter mb-4">

                    <form wire:submit.prevent>
                        <div class="row g-2">
                            <div class="col-lg-2" wire:ignore>
                                <select wire:model="district_id" id="district_id" class="form-control select2">
                                    <option value="">All Bangladesh</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-2" wire:ignore>
                                <select id="city_id" class="form-control select2">
                                    <option value="" selected>Select City</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                    </form>
                </div>
            </div>
        </div>


        <div class="row g-3">
            @if($ambulances->count()>0)
            @foreach($ambulances as $ambulance)
            <div class="col-lg-3">
                <div class="hospital card text-center h-100">
                    <div class="info">
                        <h5>{{ $ambulance->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>{{ $ambulance->phone }}</p>
                        <p>
                            @if($ambulance->city)
                            {{ $ambulance->city['name'] }},
                            @endif
                            @if($ambulance->district)
                            {{ $ambulance->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $ambulance->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Ambulance Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $ambulances->links() }}
        </div>

    </div>
</div>


<script>
    function initSelect2() {
        $('#district_id').select2().on('change', function(e) {
            @this.set('district_id', $(this).val());
        });

        $('#city_id').select2().on('change', function(e) {
            @this.set('city_id', e.target.value);
        });
    }


    document.addEventListener('livewire:init', function() {
        initSelect2();

        // Listen for Livewire update to cities
        Livewire.on('updateCityOptions', data => {
            const cities = data[0]?.cities || [];
            // console.log(cities);

            let citySelect = $('#city_id');
            citySelect.empty().append('<option value="">Select City</option>');

            cities.forEach(city => {
                citySelect.append(`<option value="${city.id}">${city.name}</option>`);
            });

            // citySelect.trigger('change');
        });

        Livewire.on('resetSelect2', () => {
            // Reset the Select2 elements and trigger change
            $('#district_id').val(null).trigger('change'); // Set null to reset
            $('#city_id').val(null).trigger('change'); // Set null to reset

            // Optionally, you can also reset the Select2 elements visually
            $('#district_id').select2('destroy').select2(); // Destroy and re-initialize to reset UI
            $('#city_id').select2('destroy').select2().empty().append('<option value="">Select City</option>');; // Destroy and re-initialize to reset UI

            // Reset the Livewire model
            $('#district').val($('#district option:first').val()).trigger('change'); // Select first option
            $('#city').val($('#city option:first').val()).trigger('change'); // Select first option
        });

        // Re-initialize after Livewire updates
        Livewire.hook('message.processed', () => {
            initSelect2();
        });
    });

    document.addEventListener('livewire:init', function() {
        initSelect2();
    });
</script>