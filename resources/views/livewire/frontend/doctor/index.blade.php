<div>
    <!-- newspaper section start -->
    <div class="blood-section section-padding">
        <div class="container-fluid px-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <!-- filter form -->
                    <div class="filter mb-4">
                        <form method="post" wire:submit.prevent="filterDoctors">
                            @csrf
                            <div class="row g-2">
                                <div class="col-lg-2 d-flex align-items-center">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#locationModal" class="btn btn-primary w-100">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>{{ $locationLabel }}</span>
                                    </a>
                                    <input type="hidden" name="district_id" wire:model="district_id">
                                    <input type="hidden" name="city_id" wire:model="city_id">
                                </div>

                                <div class="col-lg-2" wire:ignore>
                                    <select name="type_id" id="type_id" wire:model.live="type_id" class="form-control">
                                        <option value="">All Types</option>
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <input type="text" name="search" class="form-control" placeholder="search here...." wire:model.live="search">
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
                @if($doctors->count() > 0)
                @foreach($doctors as $doctor)
                <div class="col-lg-4">
                    <div class="person card h-100">
                        <div class="all-info">
                            <div class="image">
                                <img src="{{ $doctor->image ? url('images/doctor', $doctor->image) : url('assets/frontend/image/doctor.jpg') }}" alt="">
                            </div>
                            <div class="text">
                                <div class="info">
                                    <h4>{{ $doctor->name }}</h4>
                                </div>
                                <div class="phone">
                                    <p>{{ $doctor->degree }}</p>
                                    @if($doctor->type)
                                    <p style="font-weight: bold">{{ $doctor->type->name }}</p>
                                    @else
                                    <p>.....</p>
                                    @endif
                                    <p>
                                        @if($doctor->city)
                                        {{ $doctor->city->name }},
                                        @endif
                                        @if($doctor->district)
                                        {{ $doctor->district->name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="call-button text-center">
                            <a class="call-btn" href="{{ route('doctor.show', $doctor->id) }}" wire:navigate>
                                <i class="fa-solid fa-circle-info"></i> Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>No Doctor Found!</h4>
                    </div>
                </div>
                @endif
            </div>

            <div class="mt-30">
                {{ $doctors->links() }}
            </div>
        </div>
    </div>
    <!-- newspaper section end -->

    <!-- Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" wire:ignore.self aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Select Location</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="form-group" wire:ignore>
                                <label for="district">Select District</label>
                                <select wire:model="district_id" id="district" wire:change="getCity" class="form-control select2">
                                    <option value="0">All District</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h5>Cities: </h5>
                            <div class="row" id="city_div">
                                @foreach($cities as $city)
                                <div class="col-lg-4">
                                    <button wire:click="$set('city_id', {{ $city->id }})" data-bs-dismiss="modal" class="btn {{ $city_id == $city->id ? 'btn-primary' : 'btn-outline-primary' }} w-100 mb-2">
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

<script>
    function initSelect2() {
        $('#district').select2({
            width: '100%', // Ensure Select2 takes full width
            dropdownParent: $('#locationModal'), // Make sure dropdown is appended inside the modal

        }).on('change', function() {
            // Update Livewire with the selected district ID
            @this.set('district_id', $(this).val());
        });

        $('#type_id').select2().on('change', function(e) {
            @this.set('type_id', $(this).val());
        });
    }


    document.addEventListener('livewire:init', function() {
        // Function to initialize Select2 on district dropdown
        initSelect2(); // Initialize Select2 on the district select element

        // Initialize Select2 when modal is shown
        $('#locationModal').on('shown.bs.modal', function() {
            initSelect2(); // Initialize Select2 on the district select element
        });

        // Re-initialize Select2 after Livewire updates the DOM
        document.addEventListener('livewire:update', () => {
            initSelect2(); // Re-initialize Select2 when Livewire updates the DOM
        });

        Livewire.on('resetSelect2', () => {
            $('#district').val(null).trigger('change'); // Reset district select2
            $('#district_id').select2('destroy').select2(); // Destroy and re-initialize to reset UI

            // type_id
            $('#type_id').val(null).trigger('change'); // Reset type_id select2
            $('#type_id').select2('destroy').select2(); // Destroy and re-initialize to reset UI

            // Select the first option (if available)
            $('#district').val($('#district option:first').val()).trigger('change'); // Select first option
            $('#type_id').val($('#type_id option:first').val()).trigger('change'); // Select first option
        });


    });

    document.addEventListener('livewire:navigted', function() {
        // Function to initialize Select2 on district dropdown
        initSelect2(); // Initialize Select2 on the district select element

    });
</script>