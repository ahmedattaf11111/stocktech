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
							<h1>{{translate($dictionaries, 'name',$team->name, 'Team', $team->id)}}</h1>
							<h6 class="text-u ls1 opacity-8">{{translate($dictionaries, 'job',$team->job, 'Team', $team->id)}}</h6>
							<div class="text main-bg">
								{!! translate($dictionaries, 'about',$team->about, 'Team', $team->id) !!}
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
								{!! translate($dictionaries, 'skill_content',$team->skill_content, 'Team', $team->id)!!}
							</p>
							<div class="skill-item mt-50">
								<h6 class="fz-16 mb-10">{{translate($dictionaries, 'skill_one',$team->skill_one, 'Team', $team->id)}}</h6>
								<div class="skill-progress">
									<div class="progres" data-value="{{translate($dictionaries, 'skill_one_rate',$team->skill_one_rate, 'Team', $team->id)}}%"></div>
								</div>
							</div>
							<div class="skill-item mt-30">
								<h6 class="fz-16 mb-10">{{translate($dictionaries, 'skill_tow',$team->skill_tow, 'Team', $team->id)}}</h6>
								<div class="skill-progress">
									<div class="progres" data-value="{{translate($dictionaries, 'skill_tow_rate',$team->skill_tow_rate, 'Team', $team->id)}}%"></div>
								</div>
							</div>
							<div class="skill-item mt-30">
								<h6 class="fz-16 mb-10">{{translate($dictionaries, 'skill_three',$team->skill_three, 'Team', $team->id)}}</h6>
								<div class="skill-progress">
									<div class="progres" data-value="{{translate($dictionaries, 'skill_three_rate',$team->skill_three_rate, 'Team', $team->id)}}%"></div>
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
								{!! translate($dictionaries, 'experience_content',$team->experience_content, 'Team', $team->id) !!}
							</p>

							<div class="box-items row mt-50">
								<div class="col-md-6 item">
									<span class="num">1 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{translate($dictionaries, 'experience_one',$team->experience_one, 'Team', $team->id)}}</h6>
										<span class="opacity-7">{{translate($dictionaries, 'experience_one_duration',$team->experience_one_duration, 'Team', $team->id)}}</span>
									</div>
								</div>
								<div class="col-md-6 item">
									<span class="num">2 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16"> {{translate($dictionaries, 'experience_tow',$team->experience_tow, 'Team', $team->id)}}</h6>
										<span class="opacity-7">{{translate($dictionaries, 'experience_tow_duration',$team->experience_tow_duration, 'Team', $team->id)}}</span>
									</div>
								</div>
								<div class="col-md-6 item">
									<span class="num">3 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{translate($dictionaries, 'experience_three',$team->experience_three, 'Team', $team->id)}}</h6>
										<span class="opacity-7">{{translate($dictionaries, 'experience_three_duration',$team->experience_three_duration, 'Team', $team->id)}}</span>
									</div>
								</div>
								<div class="col-md-6 item">
									<span class="num">4 <small>st</small></span>
									<div class="text-center">
										<h6 class="fz-16">{{translate($dictionaries, 'experience_four',$team->experience_four, 'Team', $team->id)}}</h6>
										<span class="opacity-7">{{translate($dictionaries, 'experience_four_duration',$team->experience_four_duration, 'Team', $team->id)}}</span>
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