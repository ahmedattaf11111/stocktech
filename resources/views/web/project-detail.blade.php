@extends('layouts.web')
@section('content')
<div id="smooth-wrapper">
	<div id="smooth-content">


		<main class="main-bg">

			<!-- ==================== Start Slider ==================== -->

			<header class="header-project1">
				<div class="container pt-100">
					<div class="row align-items-end">
						<div class="col-lg-8 md-mb50">
							<div>
								<h1 class="fz-100">
									{{translate($dictionaries, 'name',$project->name, 'Project', $project->id)}}
								</h1>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="info">
								<div class="row">
									<div class="col-md-6">
										<div class="item mb-30">
											<span class="opacity-8 mb-5">{{__('general.Category')}} :</span>
											<h6>
												{{translate($dictionaries, 'name',$project->category->name, 'ProjectCategory', $project->category->id)}}
											</h6>
										</div>
									</div>
									<div class="col-md-6">
										<div class="item mb-30">
											<span class="opacity-8 mb-5">{{__('general.Client')}} :</span>
											<h6>
												{{translate($dictionaries, 'client',$project->client, 'Project', $project->id)}}
											</h6>
										</div>
									</div>
									<div class="col-md-6">
										<div class="item mb-30">
											<span class="opacity-8 mb-5">{{__('general.Start Date')}} :</span>
											<h6>
												{{\Carbon\Carbon::parse($project->created_at)->format('d M Y')}}

											</h6>
										</div>
									</div>
									<div class="col-md-6">
										<div class="item">
											<span class="opacity-8 mb-5">{{__('general.Designer')}} :</span>
											<h6>
												{{translate($dictionaries, 'designer',$project->designer, 'Project', $project->id)}}
											</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="bg-img mt-100" data-background="/uploads/{{$project->images[0]??''}}"></div>
			</header>

			<!-- ==================== End Slider ==================== -->



			<!-- ==================== Start section ==================== -->

			<section class="section-padding bord-thin-bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<h2 class="mb-50">
								{{translate($dictionaries, 'section_one_title',$project->section_one_title, 'Project', $project->id)}}
							</h2>
						</div>
						<div class="col-lg-7">
							<div class="text">
								<h5 class="mb-30 fw-400 line-height-40">
									{{translate($dictionaries, 'section_one_content',$project->section_one_content, 'Project', $project->id)}}
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End section ==================== -->



			<!-- ==================== Start section ==================== -->

			<div class="works thecontainer ontop">
				@foreach($project->images as $index=>$image)
				@if($index!=0)
				<div class="panel">
					<div class="item">
						<div class="img">
							<img src="/uploads/{{$image}}" alt="" />
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>

			<!-- ==================== End section ==================== -->



			<!-- ==================== Start section ==================== -->

			<section class="section-padding bord-thin-top">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-lg-7">
							<div class="text">
								<h2 class="mb-50">
									{{translate($dictionaries, 'section_tow_title',$project->section_tow_title, 'Project', $project->id)}}
								</h2>
								<h5 class="mb-30 fw-400">
									{{translate($dictionaries, 'section_tow_content',$project->section_tow_content, 'Project', $project->id)}}
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End section ==================== -->



			<!-- ==================== Start Next ==================== -->

			<section class="next-project sub-bg">
				<div class="container-fluid rest">
					<div class="row">
						@foreach($latest_projects as $index=>$project)
						<div class="col-md-6 rest">
							<div class="text-left box bg-img" data-background="/uploads/{{$project->images[0]??''}}">
								<div class="cont d-flex align-items-center">

									<div>
										<h6 class="sub-title fz-16 mb-5">
											@if($index==0)
											{{__('general.Prev Project')}}
											@else
											{{__('general.Next Project')}}
											@endif
										</h6>
										<a href="/web/project-details/{{$project->id}}" class="fz-40 fw-600 stroke">
											{{translate($dictionaries, 'name',$project->name, 'Project', $project->id)}}
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div>
					<a href="/web/projects" class="all-works-butn text-center">
						<span class="ti-view-grid fz-24 mb-10"></span>
						<span class="d-block fz-12 text-u ls1">{{__('general.all Projects')}}</span>
					</a>
				</div>
			</section>

			<!-- ==================== End Next ==================== -->

		</main>

		<x-footer />

	</div>

</div>
@push('js')
<script>
	$(function() {
		var width = $(window).width();
		if (width > 991) {

			/* ===============================  scroll  =============================== */

			gsap.registerPlugin(ScrollTrigger);

			let sections = gsap.utils.toArray(".panel");

			gsap.to(sections, {
				xPercent: @json(app() -> getLocale() == 'en' ? -1 : 1) * 100 * (sections.length - 1),
				ease: "none",
				scrollTrigger: {
					trigger: ".thecontainer",
					pin: true,
					scrub: 1,
					// snap: 1 / (sections.length - 1),
					end: () => "+=" + document.querySelector(".thecontainer").offsetWidth
				}
			});

		}
	});
</script>
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