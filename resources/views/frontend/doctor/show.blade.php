@extends('frontend.layouts.base')

@section('title', 'Doctor')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Doctor</h2>
    </div>
</div>
<!-- hero section end -->

<livewire:frontend.doctor.show doctorId="{{ $doctor->id }}" />


@endsection