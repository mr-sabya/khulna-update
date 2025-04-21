@extends('frontend.layouts.base')

@section('title')
{{ $service->name }}
@endsection

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container-fluid">
        <h2>{{ $service->name }}</h2>
    </div>
</div>
<!-- hero section end -->

<!-- service livewire component -->
@livewire('frontend.' . $service->model_name . '.index')
<!-- service livewire component -->

@endsection