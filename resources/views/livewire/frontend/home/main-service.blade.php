<div class="services section-padding">
    <div class="container-fluid px-5">
        <!-- <h2 class="heading">Top Services</h2> -->

        <div class="servive-section">
            <!-- main service card component -->
             @foreach ($services as $service)
            <livewire:frontend.components.main-service-card serviceId="{{ $service->id }}" />
            @endforeach
            <!-- main service card component -->
        </div>
    </div>
</div>