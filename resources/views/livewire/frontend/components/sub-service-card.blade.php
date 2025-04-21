<div class="service card">
    <a href="{{ route('service.index', $service->slug) }}" wire:navigate>
        <div class="icon">
            <img src="{{ url('storage/' . $service->image) }}" alt="">
        </div>
        <div class="text">
            <h5>{{ $service->name }}</h5>

            @if($service->model_name == 'Namaz')
            <p class="m-0" style="font-size: 12px;">{{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
            @else
            <p class="m-0" style="font-size: 12px;">{{ $count }} {{ str_limit($service->name, 10) }}</p>
            @endif
        </div>
    </a>
</div>