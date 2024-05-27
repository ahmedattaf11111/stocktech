@extends('layouts.web')
@section('content')
<main class="main-bg">
	<section class="portfolio-fixed">
		<div class="container-fluid rest">
			<div class="row">
				<div class="col-lg-6 rest">
					<div class="left sticky-item">
						@foreach($projects as $index=>$project)
						<div id="tab-{{$index+1}}" class="img bg-img" data-background="/uploads/{{$project->images[0]??''}}">
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-6 sub-bg right">
					@foreach($projects as $index=>$project)

					<div class="cont active" data-tab="tab-{{$index+1}}">
						<div class="img-hiden">
							<img src="assets/imgs/works/stand/1.jpg" alt="">
						</div>
						<span class="sub-title mb-15 main-color">{{$index+1}}. {{$project->category->name}}</span>
						<h2 class="mb-15">{{$project->name}}</h2>
						<div class="row">
							<div class="col-md-9">
								<p>{{$project->description}}</p>
								<div class="vew-all mt-50">
									<a href="/web/project-details/{{$project->id}}" class="sub-title">
										{{__('general.Explore More')}}
										<span>
											<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M13.922 4.5V11.8125C13.922 11.9244 13.8776 12.0317 13.7985 12.1108C13.7193 12.1899 13.612 12.2344 13.5002 12.2344C13.3883 12.2344 13.281 12.1899 13.2018 12.1108C13.1227 12.0317 13.0783 11.9244 13.0783 11.8125V5.51953L4.79547 13.7953C4.71715 13.8736 4.61092 13.9176 4.50015 13.9176C4.38939 13.9176 4.28316 13.8736 4.20484 13.7953C4.12652 13.717 4.08252 13.6108 4.08252 13.5C4.08252 13.3892 4.12652 13.283 4.20484 13.2047L12.4806 4.92188H6.18765C6.07577 4.92188 5.96846 4.87743 5.88934 4.79831C5.81023 4.71919 5.76578 4.61189 5.76578 4.5C5.76578 4.38811 5.81023 4.28081 5.88934 4.20169C5.96846 4.12257 6.07577 4.07813 6.18765 4.07812H13.5002C13.612 4.07813 13.7193 4.12257 13.7985 4.20169C13.8776 4.28081 13.922 4.38811 13.922 4.5Z" fill="currentColor"></path>
											</svg>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</section>
	<x-footer />

</main>
@push('js')

@endpush
@push('css')
<style>
	.navbar.change .navbar-nav .nav-link,
	.navbar.change .menu-icon,
	.navbar.change .search-form .search-icon {
		color: #1a1a1a !important;
	}

	.navbar .search-form .search-icon:after {
		border-left: 1px solid rgba(0, 0, 0, 0.2) !important;
		border-right: 1px solid rgba(0, 0, 0, 0.2) !important;
	}

	.navbar.bord {
		border-color: rgba(0, 0, 0, 0.05) !important;
	}
</style>
@endpush
@endsection