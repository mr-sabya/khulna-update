@extends('frontend.layouts.base')

@section('content')
<!-- slider section start -->
<livewire:frontend.home.banner />
<!-- slider section end -->


<!-- service area start -->
<livewire:frontend.home.main-service />
<!-- service area end -->



<!-- service section start -->
<livewire:frontend.home.sub-service />
<!-- service section end -->

<!-- testimonial section start -->
<!-- <div class="testimonials section-padding bg-custom">
	<div class="container">
		<h2 class="heading">What our users say</h2>

		@if($feedbacks->count() > 0)
		<div class="testimonial-slider">
			@foreach($feedbacks as $feedback)
			<div class="item">
				<div class="text">
					<div class="rating">

						@if($feedback->star == 1)
						<i class="fa-solid fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>

						@elseif($feedback->star == 2)
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>

						@elseif($feedback->star == 3)
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>

						@elseif($feedback->star == 4)
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-regular fa-star"></i>
						@elseif($feedback->star == 5)
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						@endif
					</div>
					<div class="speech">
						<p>{{ $feedback->feedback }}</p>
					</div>

					<div class="shape"></div>
				</div>
				<div class="customer">
					<div class="image">
						@if($feedback->image == null)
						<img src="{{ url('assets/frontend/image/person.jpg') }}" alt="">
						@else
						<img src="{{ url('images/testimonial', $feedback->image) }}" alt="">
						@endif
					</div>
					<div class="info">
						<h4>{{ $feedback->name }}</h4>
						<p>{{ $feedback->designation }}, {{ $feedback->company }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="testionial-dots"></div>
		@else
		<div class="text-center">
			<h4>No Feedbacks Found!</h4>
		</div>
		@endif

	</div>
</div> -->
<!-- testimonial section end -->

<!-- ad section start -->
<section class="">
    <div class="container-fluid px-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="ad-image">
                    <img src="{{ url('assets/frontend/image/types-of-banner-hero.png') }}" alt="Advertisement" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ad-image">
                    <img src="{{ url('assets/frontend/image/types-of-banner-hero.png') }}" alt="Advertisement" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ad section end -->

<!-- about section -->
<div class="about section-padding pb-0">
	<div class="container-fluid px-5">
		<div class="row align-items-center">
			<div class="col-lg-6">
				@if($setting->about_us_image == null)
				<img src="{{ url('assets/frontend/image/contact-centre-agent-out-of-laptop-760.png') }}" alt="" class="rounded">
				@else
				<img src="{{ url('images/setting', $setting->about_us_image) }}" alt="" class="rounded">
				@endif
			</div>
			<div class="col-lg-6">
				<p class="sub-title">WHO WE ARE</p>
				<h2 class="heading text-start mb-4">About Khulna Seba</h2>
				<div class="about_us_text">
					{!! $setting->about_us_short_text !!}
				</div>


				<a href="{{ route('about.index') }}" class="btn custom-btn">Learn More <i class="fa-solid fa-arrow-right"></i></a>
				<a href="{{ route('contact.index') }}" class="ms-4 contact">Contact Us</a>
			</div>
		</div>
	</div>
</div>
<!-- about section end -->


<!-- blos section start -->
<div class="blogs section-padding">
    <div class="container-fluid px-5">
        <h2 class="heading">Our Blogs</h2>

        <div class="row g-3">
            @if($blogs->count() > 0)
            @foreach($blogs as $blog)
            <div class="col-lg-3">
                <div class="card p-0 border-0 h-100">
                    <div class="card-header border-0 p-0">
                        <img src="{{ url('images/blog', $blog->image) }}" alt="rover" />
                    </div>
                    <div class="card-body">
                        <span class="tag tag-teal">{{ $blog->blogCategory['name'] }}</span>
                        <a href="#">
                            <h5>{{ $blog->title }}</h5>
                        </a>

                        {!! str_limit($blog->meta_description, 80) !!}

                        <div class="user">

                            <div class="user-info">
                                <p>{{ date('d F, Y', strtotime($blog->created_at)) }}, {{ $blog->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Blogs Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="load-more">
            <a href="{{ route('blog.index')}}" class="custom-btn">Show All <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>
<!-- blos section end -->


@endsection