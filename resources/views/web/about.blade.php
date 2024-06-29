@extends('layouts.web')
@section('content')
<div id="smooth-content">

	<main class="main-bg">
		<!-- ==================== Start Header ==================== -->
		<header class="page-header-cerv bg-img section-padding" data-background="/uploads/{{$about->images[0]??''}}" data-overlay-dark="4">
			<div class="container pt-100 ontop">
				<div class="text-center">
					<h1 class="fz-100">{{__('general.about')}}.</h1>
					<div class="mt-15">
						<a href="/web/home">{{__('general.Home')}}</a>
						<span class="padding-rl-20">|</span>
						<span class="main-color">{{__('general.about')}}</span>
					</div>
				</div>
			</div>
		</header>

		<!-- ==================== End Header ==================== -->



		<!-- ==================== Start intro ==================== -->

		<section class="page-intro section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 valign">
						<div class="content md-mb50">
							<h6 class="sub-title main-color mb-15">{{__('general.ABOUT COMPANY')}}</h6>
							<h3 class="fw-600 mb-30">
								{{translate($dictionaries, 'service_title',$about->service_title, 'About', $about->id)}}
							</h3>
							<p>
								{{translate($dictionaries, 'service_content',$about->service_content, 'About', $about->id)}}
							</p>
							<a href="/web/contact" class="butn butn-md butn-bord radius-30 mt-40">
								<span>{{__('general.Lets Contact')}}</span>
							</a>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="services">
							<div class="row">
								@foreach($services as $service)
								<div class="col-md-6">
									<div class="item-box radius-15 sm-mb30">
										<div class="icon mb-40 opacity-5">
											<img src="/uploads/{{$service->images[0]??''}}" alt="">
										</div>
										<h5 class="mb-15">
											{{translate($dictionaries, 'name',$service->name, 'Service', $service->id)}}
										</h5>
										<p>
											{{translate($dictionaries, 'description',$service->description, 'Service', $service->id)}}
										</p>
										<a href="/web/service-details/{{$service->id}}" class="rmore mt-30">
											<span class="sub-title">{{__('general.Read More')}}</span>
											<img src="/web/assets/imgs/arrow-right.png" alt="" class="icon-img-20 ml-5">
										</a>
									</div>
								</div>
								@endforeach


							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ==================== End intro ==================== -->



		<!-- ==================== Start intro ==================== -->

		<section class="page-intro-modern section-padding pt-0">
			<div class="container md-hide">
				<div class="row justify-content-center">
					<div class="col-lg-11">
						<div class="row">
							<div class="col-lg-3 valign">
								<div class="img1 fit-img">
									<img src="/uploads/{{$about->images[1]??''}}" alt="">
								</div>
							</div>
							<div class="col-lg-5">
								<div class="img2 fit-img position-re o-hidden">
									<img src="/uploads/{{$about->images[2]??''}}" alt="" data-speed="0.2" data-lag="0">
								</div>
							</div>
							<div class="col-lg-4 d-flex align-items-end">
								<div class="full-width">
									<div class="img3 fit-img mb-30">
										<img src="/uploads/{{$about->images[3]??''}}" alt="">
									</div>
									<div class="img4 fit-img">
										<img src="/uploads/{{$about->images[4]??''}}" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container mt-100">
				<div class="row justify-content-around">
					<div class="col-lg-5">
						<div class="cont">
							<h4>
								{{translate($dictionaries, 'experience_main_content',$about->experience_main_content, 'About', $about->id)}}
							</h4>
							<div class="exp mt-80 md-mb15">
								<h2 class="fz-70">{{translate($dictionaries, 'experience_number',$about->experience_number, 'About', $about->id)}}
									<span class="sub-title main-font opacity-7 ml-15">
										{{translate($dictionaries, 'experience_number_text',$about->experience_number_text, 'About', $about->id)}}
									</span>
								</h2>
							</div>
						</div>
					</div>
					<div class="col-lg-5 valign">
						<div class="full-width">
							<div class="text">
								<p>
									{{translate($dictionaries, 'experience_second_content',$about->experience_second_content, 'About', $about->id)}}
								</p>
							</div>
							<div class="mt-50">
								<div class="skills-box">
									<div class="skill-item mb-40">
										<h5 class="sub-title mb-15">
											{{translate($dictionaries, 'experience_one',$about->experience_one, 'About', $about->id)}}
										</h5>
										<div class="skill-progress">
											<div class="progres" data-value="{{$about->experience_one_rate}}%"></div>
										</div>
									</div>
									<div class="skill-item">
										<h5 class="sub-title mb-15">
											{{translate($dictionaries, 'experience_tow',$about->experience_tow, 'About', $about->id)}}
										</h5>
										<div class="skill-progress">
											<div class="progres" data-value="{{translate($dictionaries, 'experience_tow_rate',$about->experience_tow_rate, 'About', $about->id)}}%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="line-overlay">
				<svg viewBox="0 0 1728 1101" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M-43 773.821C160.86 662.526 451.312 637.01 610.111 733.104C768.91 829.197 932.595 1062.9 602.782 1098.75C272.969 1134.6 676.888 25.4306 1852 1" style="stroke-dasharray: 3246.53, 0;"></path>
				</svg>
			</div>
		</section>

		<!-- ==================== End intro ==================== -->



		<!-- ==================== Start Testimonials ==================== -->

		<section class="testimonials section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="sec-head">
							<h6 class="sub-title main-color mb-15">{{__('general.Testimonials')}}</h6>
							<h3 class="fw-600">{{__('general.What People Say')}}</h3>
						</div>
					</div>
					<div class="col-lg-8 position-re">
						<div class="testim-swiper" data-carousel="swiper" data-loop="true" data-space="30">
							<div id="content-carousel-container-unq-testim" class="swiper-container" data-swiper="container">
								<div class="swiper-wrapper">
									@foreach($reviews as $review)
									<div class="swiper-slide">
										<div class="item">
											<div class="content">
												<div class="text">
													<svg xmlns="http://www.w3.org/2000/svg" width="256.721" height="208.227" viewBox="0 0 256.721 208.227" class="qout-svg">
														<path data-name="Path" d="M-23.723-530.169v97.327H-121.05v-68.7q0-40.076,13.359-73.472T-62.845-639.9l36.259,28.625Q-63.8-570.244-68.57-530.169Zm158.395,0v97.327H37.345v-68.7q0-40.076,13.359-73.472T95.55-639.9l36.259,28.625Q94.6-570.244,89.825-530.169Z" transform="translate(121.55 640.568)" fill="none" stroke="#1a1a1a" stroke-width="1" opacity="0.322">
														</path>
													</svg>
													<p class="fz-30">
														{{translate($dictionaries, 'review',$review->review, 'Review', $review->id)}}
													</p>
												</div>
												<div class="info d-flex align-items-center pt-40 mt-40 bord-thin-top">
													<div>
														<div class="fit-img circle">
															<img src="/uploads/{{$review->image}}" alt="">
														</div>
													</div>
													<div class="ml-20">
														<h5>
															{{translate($dictionaries, 'name',$review->name, 'Review', $review->id)}}
														</h5>
														<span class="sub-title main-color">
															{{translate($dictionaries, 'job',$review->job, 'Review', $review->id)}}
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>

									@endforeach

								</div>
							</div>
						</div>
						<div class="swiper-arrow-control control-abslout">
							<div class="swiper-button-prev">
								<span class="ti-arrow-left"></span>
							</div>
							<div class="swiper-button-next">
								<span class="ti-arrow-right"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="small-line">
				<div class="line-overlay">
					<svg viewBox="0 0 1728 1101" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M-43 773.821C160.86 662.526 451.312 637.01 610.111 733.104C768.91 829.197 932.595 1062.9 602.782 1098.75C272.969 1134.6 676.888 25.4306 1852 1" style="stroke-dasharray: 3246.53, 0;"></path>
					</svg>
				</div>
			</div>
		</section>

		<!-- ==================== End Testimonials ==================== -->



		<!-- ==================== Start Team ==================== -->

		<section class="team-tab bord-thin-bottom bord-thin-top">
			<div class="container-fluid rest">
				<div class="sec-head pb-30 pt-20 bord-thin-bottom">
					<div class="main-marq xlrg o-hidden">
						<div class="slide-har st1">
							<div class="box">
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
							</div>
							<div class="box">
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
								<div class="item">
									<h4 class="d-flex align-items-center"><span>{{__('general.Meet Our Team')}}</span>
										<span class="fz-50 ml-50 stroke icon">*</span>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5 rest">
						<div class="glry-img">
							@foreach($teams as $index=>$team)
							<div id="tab-{{$index+1}}" class="bg-img tab-img @if($index==0) current @endif" data-background="/uploads/{{$team->image}}"></div>
							@endforeach
						</div>
					</div>
					<div class="col-lg-7 rest content">
						@foreach($teams as $index=>$team)
						<div class="cluom current" data-tab="tab-{{$index+1}}">
							<div class="info">
								<h6 class="sub-title opacity-7">
									{{translate($dictionaries, 'job',$team->job, 'Team', $team->id)}}
								</h6>
								<h4>
									{{translate($dictionaries, 'name',$team->name, 'Team', $team->id)}}
								</h4>
							</div>
							<div class="more text-u ls1 fz-12">
								<a href="/web/team-details/{{$team->id}}">{{__('general.View More')}} <i class="ml-15 ti-arrow-top-{{app()->getLocale()=='en'?'right':'left'}}"></i></a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>

		<!-- ==================== End Team ==================== -->



		<!-- ==================== Start brands ==================== -->

		<section class="brands-crev simple section-padding pt-40">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mt-100 order-md-2">
						<div class="row">
							@if($partners[0])
							<div class="col-6 item ontop">
								<div class="img">
									<img src="/uploads/{{$partners[0]->image}}" alt="">
								</div>
								<span class="top-left">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="top-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-left">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
							</div>
							@endif
							@if($partners[1])
							<div class="col-6 item">
								<div class="img">
									<img src="/uploads/{{$partners[1]->image}}" alt="">
								</div>
								<span class="top-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
							</div>
							@endif
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1 md-hide valign">
						<div class="sec-head nocurve">
							<div class="ontop">
								<h6 class="sub-title main-color mb-15">{{__('general.SPECIAL THANKS TO')}}</h6>
								<h3 class="fw-600 text-u ls1">{{__('general.All Our Partners')}}
								</h3>
							</div>
						</div>
					</div>
					<div class="col-12 order-md-1">
						<div class="row">
							@if($partners[2])
							<div class="col-lg-3 col-6 item">
								<div class="img">
									<img src="/uploads/{{$partners[2]->image}}" alt="">
								</div>
								<span class="top-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-left">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
							</div>
							@endif
							@if($partners[3])
							<div class="col-lg-3 col-6 item ontop">
								<div class="img">
									<img src="/uploads/{{$partners[3]->image}}" alt="">
								</div>
								<span class="top-left">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="top-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-left">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
							</div>
							@endif
							@if($partners[4])
							<div class="col-lg-3 col-6 item">
								<div class="img">
									<img src="/uploads/{{$partners[4]->image}}" alt="">
								</div>
								<span class="top-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
							</div>
							@endif
							@if($partners[5])
							<div class="col-lg-3 col-6 item">
								<div class="img">
									<img src="/uploads/{{$partners[5]->image}}" alt="">
								</div>
								<span class="top-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
								<span class="bottom-right">
									<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-23 2xl:w-[3.2rem] h-auto">
										<rect y="11" width="23" height="0.671958" fill="#222"></rect>
										<rect x="12" width="23" height="0.671957" transform="rotate(90 12 0)" fill="#222"></rect>
									</svg>
								</span>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ==================== End brands ==================== -->



		<!-- ==================== Start Blog ==================== -->

		<section class="blog-list-half section-padding sub-bg">
			<div class="container">
				<div class="sec-head mb-80">
					<h6 class="sub-title main-color mb-25">{{__('general.Our Blog')}}</h6>
					<div class="bord pt-25 bord-thin-top d-flex align-items-center">
						<h2 class="fw-600">{{__('general.Read Latest News')}}</h2>
						<div class="ml-auto">
							<a href="/web/blogs?page=1&page_size=6" class="go-more">
								<span class="text">{{__('general.View all posts')}}</span>
								<span class="icon ti-arrow-top-{{app()->getLocale()=='en'?'right':'left'}}"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					@foreach($blogs as $blog)
					<div class="col-lg-6">
						<div class="item main-bg">
							<div class="row rest">
								<div class="col-lg-6 col-md-5 img rest">
									<img src="/uploads/{{$blog->image}}" alt="" class="img-post">
									<div class="author d-flex align-items-center">
										<div>
											<div class="fit-img icon-img-50 circle">
												<img src="/uploads/{{$blog->author_image}}" alt="">
											</div>
										</div>
										<div class="ml-15 fz-14">
											<div><span class="opacity-7">{{__('general.Posted by')}}</span><br>{{$blog->author_name}}</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-7 cont valign">
									<div class="full-width">
										<div class="tags mb-15">
											@foreach($blog->blogCategories as $category)
											<a href="/web/blogs?page=1&page_size=6&category_id={{$category->id}}">
												{{translate($dictionaries, 'name',$category->name, 'Category', $category->id)}}
											</a>
											@endforeach
										</div>
										<h5>
											<a href="/web/blog-details/{{$blog->id}}">
												{{translate($dictionaries, 'name',$blog->name, 'Blog', $blog->id)}}
											</a>
										</h5>
										<span class="date fz-12 ls1 text-u opacity-7 mt-80">
											{{\Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>

		<!-- ==================== End Blog ==================== -->

		<x-footer />


	</main>
</div>
@push('js')
<script>
	new Vue({
		el: "#smooth-content",
		components: {},
		data: {},
		methods: {}
	});
</script>
@endpush
@push('css')
@endpush
@endsection