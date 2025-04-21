@extends('frontend.layouts.base')

@section('title')
{{ $newspaper->name }}
@endsection

@section('content')
<!-- hero section start -->
<div class="back padding-top">
	<div class="container-fluid px-5 d-flex justify-content-between align-items-center">
		<a href="{{ url()->previous() }}" wire:navigate class="custom-btn back-btn "><i class="fa-solid fa-arrow-left"></i> Go Back</a>
		<h2>{{ $newspaper->name }}</h2>
	</div>
</div>
<!-- hero section end -->



<!-- newspaper section start -->
<div class="newspaper-section">
	<div class="container-fluid px-5">
		<iframe src="{{ $newspaper->link }}" frameborder="0"></iframe>
	</div>
</div>
<!-- newspaper section end -->



@endsection