<div class="other-services section-padding pt-0">
    <div class="container-fluid px-5">
        <div class="row"></div>
        <h2 class="heading">Our Services</h2>

        <div class="row">
            <div class="col-lg-9">
                <div class="service-container">

                    <!-- service card -->
                     @foreach($services as $service)
                     <livewire:frontend.components.sub-service-card serviceId="{{ $service->id }}" />
                        @endforeach
                    <!-- service card -->
                </div>
            </div>

            <div class="col-lg-3">
                <img src="{{ url('assets/frontend/image/facebook-ad-sizes-2.jpg') }}" alt="">
            </div>
        </div>

    </div>
</div>