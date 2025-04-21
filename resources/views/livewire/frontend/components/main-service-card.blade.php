<div class="item">
    <a href="{{ route('service.index', $service->slug) }}" wire:navigate>
        <div class="service {{ $service->bg_color }}">
            <div class="text">
                <h4>{{ $service->name }}</h4>
                <p>{{ $count }} {{ $service->name }}</p>
            </div>
            <img src="{{ url('storage/' . $service->image) }}" alt="">
        </div>
    </a>
</div>