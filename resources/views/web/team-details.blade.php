@extends('layouts.web')
@section('content')
<div id="smooth-content">

	<main class="main-bg">



		<!-- ==================== Start Team ==================== -->

		<section class="team-single">
			<div class="container-fluid">
				<div class="row xlg-marg">
					<div class="col-lg-6">
						<div class="img">
							<img src="/uploads/{{$team->image}}" alt="" data-speed="0.2" data-lag="0">
						</div>
					</div>
					<div class="col-lg-6 valign">
						<div class="cont">
							<h1>{{$team->name}}</h1>
							<h6 class="text-u ls1 opacity-8">{{$team->job}}</h6>
							<div class="text main-bg">
								{!! $team->about !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ==================== End Team ==================== -->



		<!-- ==================== Start Skills ==================== -->

		<section class="skills section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="skil-progs md-mb80">
							<h3>
								@if(app()->getLocale()=='en')
								{{__('general.Professionals')}}
								@else
								{{__('general.Skills')}}
								@endif
								<span class="fw-300">
									@if(app()->getLocale()=='en')
									{{__('general.Skills')}}
									@else
									{{__('general.Professionals')}}
									@endif

								</span>
							</h3>
							<p class="fz-13 mt-15">
								{!! $team->skill_content !!}
							</p>
							<div class="skill-item mt-50">
								<h6 class="fz-16 mb-10">{{$team->skill_one}}</h6>
								<div class="skill-progress">
									<div class="progres" data-value="{{$team->skill_one_rate}}%"></div>
								</div>
							</div>
							<div class="skill-item mt-30">
								<h6 class="fz-16 mb-10">{{$team->skill_tow}}</h6>
								<div class="skill-progress">
									<div class="progres" data-value="{{$team->skill_tow_rate}}%"></div>
								</div>
							</div>
							<div class="skill-item mt-30">
								<h6 class="fz-16 mb-10">{{$team->skill_three}}</h6>
								<div class="skill-progress">
									<div class="progres" data-value="{{$team->skill_three_rate}}%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="resume-exp">
							<h3>
								@if(app()->getLocale()=='en')
								{{__('general.Educational')}}
								@else
								{{__('general.Experience')}}
								@endif
								<span class="fw-300">
									@if(app()->getLocale()=='en')
									{{__('general.Experience')}}

									@else
									{{__('general.Educational')}}

									@endif
								</span>
							</h3>
							<p class="fz-13 mt-15">
								{!! $team->experience_content !!}
							</p>

							<div class="box-items row mt-50">
								<div class="col-md-6 item">
									<span class="num">1 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{$team->experience_one}}</h6>
										<span class="opacity-7">{{$team->experience_one_duration}}</span>
									</div>
								</div>
								<div class="col-md-6 item">
									<span class="num">2 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{$team->experience_tow}}</h6>
										<span class="opacity-7">{{$team->experience_tow_duration}}</span>
									</div>
								</div>
								<div class="col-md-6 item">
									<span class="num">3 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{$team->experience_three}}</h6>
										<span class="opacity-7">{{$team->experience_three_duration}}</span>
									</div>
								</div>
								<div class="col-md-6 item">
									<span class="num">4 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{$team->experience_three}}</h6>
										<span class="opacity-7">{{$team->experience_three_duration}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<x-footer />
		<!-- ==================== End Skills ==================== -->
	</main>
</div>

@push('js')
<script>
	new Vue({
		el: "#smooth-content",
		components: {},
		data: {
			team: @json($team),
		},
		methods: {

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