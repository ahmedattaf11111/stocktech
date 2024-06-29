@extends('layouts.web')
@section('content')

<div id="smooth-wrapper">


	<div id="smooth-content">

		<main class="main-bg o-hidden">
			<!-- ==================== Start Header ==================== -->
			<header class="main-header bg-img" data-background="assets/imgs/header/bg1.jpg" data-overlay-dark="8">
				<div class="container pt-100">
					<div class="row justify-content-end">
						<div class="col-lg-6">
							<div class="text mb-100">
								<h4>
									{{translate($dictionaries,"banner_content",$home->banner_content,"Home",$home->id)}}
								</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid ontop">
					<div class="container">
						<div class="lg-text">
							<div class="d-flex">
								<h6>{{translate($dictionaries,"banner_main_title",$home->banner_main_title,"Home",$home->id)}}</h6>
								<h6 class="ml-auto">{{translate($dictionaries,"banner_first_title",$home->banner_first_title,"Home",$home->id)}}</h6>
							</div>
							<h1>{{translate($dictionaries,"banner_second_title",$home->banner_second_title,"Home",$home->id)}}</h1>
						</div>
					</div>
					<div class="img">
						<img src="/uploads/{{$home->banner_image}}" alt="">
					</div>
				</div>
			</header>

			<!-- ==================== End Header ==================== -->


			<!-- Modal -->


			<!-- ==================== Start intro ==================== -->

			<section class="intro section-padding position-re">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-6">
							<div class="cont">
								<h4>
									{{translate($dictionaries,"experience_main_content",$about->experience_main_content,"About",$about->id)}}
								</h4>
								<div class="exp mt-80 md-mb15">
									<h2 class="fz-70 numb-font">
										{{translate($dictionaries,"experience_number",$about->experience_number,"About",$about->id)}}
										<span class="sub-title main-font opacity-7 ml-15">{{translate($dictionaries,"experience_number_text",$about->experience_number_text,"About",$about->id)}}</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="text">
								<p>{{translate($dictionaries,"experience_second_content",$about->experience_second_content,"About",$about->id)}}</p>
							</div>
							<div class="main-marq o-hidden mt-100">
								<div class="slide-har st1">
									<div class="box">
										<div class="item">
											<h4 class="d-flex align-items-center"><span>{{translate($dictionaries,"experience_one",$about->experience_one,"About",$about->id)}}</span>
												<span class="fz-50 ml-50 stroke icon">*</span>
											</h4>
										</div>
										<div class="item">
											<h4 class="d-flex align-items-center"><span>{{translate($dictionaries,"experience_tow",$about->experience_tow,"About",$about->id)}}</span>
												<span class="fz-50 ml-50 stroke icon">*</span>
											</h4>
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


			<!-- ==================== Start Services ==================== -->

			<section class="skills-img-crev pb-50">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-4 offset-lg-1 valign">
							<div class="img md-mb80">
								<div class="rotate-butn-vid">
									<a href="{{$home->intro_video}}" class="vid d-flex align-items-center">
										<div class="icon">
											<i class="fas fa-play main-color"></i>
										</div>
										<span class="sub-title ml-15">{{__('general.Watch Intro')}}</span>
									</a>
								</div>
								<img src="/uploads/{{$home->intro_image}}" alt="" class="radius-30">
							</div>
						</div>
						<div class="col-lg-6 valign">
							<div class="content full-width">
								<div class="sec-head mb-50">
									<h6 class="sub-title mb-15 main-color">{{translate($dictionaries,"intro_main_title",$home->intro_main_title,"Home",$home->id)}}</h6>
									<h2 class="d-slideup wow">
										{{translate($dictionaries,"intro_second_title",$home->intro_second_title,"Home",$home->id)}}
									</h2>
								</div>
								<div class="row justify-content-end">
									<div class="col-lg-11">
										<div class="text">
											<p>
												{{translate($dictionaries,"intro_content",$home->intro_content,"Home",$home->id)}}
											</p>
										</div>
										<div class="row mt-50 pt-50 bord-thin-top">
											<div class="col-sm-6">
												<div class="item d-flex align-items-center sm-mb30">
													<h2 class="fz-60 line-height-1"><span class="numb-count">{{translate($dictionaries,"intro_one_number",$home->intro_one_number,"Home",$home->id)}}</span></h2>
													<span class="sub-title opacity-7 ml-30">
														{{translate($dictionaries,"intro_one_text",$home->intro_one_text,"Home",$home->id)}}

													</span>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="item d-flex align-items-center">
													<h2 class="fz-60 line-height-1">
														{{translate($dictionaries,"intro_tow_number",$home->intro_tow_number,"Home",$home->id)}}
													</h2>
													<span class="sub-title opacity-7 ml-30">
														{{translate($dictionaries,"intro_tow_text",$home->intro_tow_text,"Home",$home->id)}}
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End Services ==================== -->



			<!-- ==================== Start Services ==================== -->

			<section class="services section-padding">
				<div class="container">
					<div class="sec-head mb-80">
						<h6 class="sub-title main-color mb-25">{{__('general.Our Specialize')}}</h6>
						<div class="bord pt-25 bord-thin-top d-flex align-items-center">
							<h2 class="fw-600 d-rotate wow">
								<span class="rotate-text">{{__('general.Comprehensive Services')}}</span>
							</h2>
							<div class="ml-auto">
								<div class="swiper-arrow-control">
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
					<div class="serv-swiper" data-carousel="swiper" data-loop="true" data-space="30">
						<div id="content-carousel-container-unq-serv" class="swiper-container" data-swiper="container">
							<div class="swiper-wrapper">
								@foreach($services as $service)
								<div class="swiper-slide">
									<div class="item-box radius-15">
										<div class="icon mb-40 opacity-5">
											<img src="/uploads/{{$service->images[0]??''}}" alt="">
										</div>
										<h5 class="mb-15">{{translate($dictionaries,"name",$service->name,"Service",$service->id)}}</h5>
										<p>
										{{translate($dictionaries,"description",$service->description,"Service",$service->id)}}
										</p>
										<a href="/web/service-details/{{$service->id}}" class="rmore mt-30">
											<span class="sub-title">{{__('general.Read More')}}</span>
											<img src="assets/imgs/arrow-right.png" alt="" class="icon-img-20 ml-5">
										</a>
									</div>
								</div>
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End Services ==================== -->



			<!-- ====================$home->adv_text,Start Marquee ==================== -->

			<section>
				<div class="main-marq xlrg o-hidden">
					<div class="slide-har st1">
						<div class="box">
							<div class="item">
								<h4 class="d-flex align-items-center"><span>{{translate($dictionaries, 'adv_text',$home->adv_text,'Home', $home->id)}}</span>
									<span class="fz-50 ml-50 stroke icon">*</span>
								</h4>
							</div>
							<div class="item">
								<h4 class="d-flex align-items-center"><span>{{translate($dictionaries, 'adv_text',$home->adv_text,'Home', $home->id)}}</span>
									<span class="fz-50 ml-50 stroke icon">*</span>
								</h4>
							</div>
							<div class="item">
								<h4 class="d-flex align-items-center"><span>{{translate($dictionaries, 'adv_text',$home->adv_text,'Home', $home->id)}}</span>
									<span class="fz-50 ml-50 stroke icon">*</span>
								</h4>
							</div>
							<div class="item">
								<h4 class="d-flex align-items-center"><span>{{translate($dictionaries, 'adv_text',$home->adv_text,'Home', $home->id)}}</span>
									<span class="fz-50 ml-50 stroke icon">*</span>
								</h4>
							</div>
							<div class="item">
								<h4 class="d-flex align-items-center"><span>{{translate($dictionaries, 'adv_text',$home->adv_text, 'Home', $home->id)}}</span>
									<span class="fz-50 ml-50 stroke icon">*</span>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End Marquee ==================== -->



			<!-- ==================== Start Portfolio ==================== -->

			<section class="inter-fixed-text section-padding">
				<div class="container">
					<div class="sec-head mb-80">
						<h6 class="sub-title main-color mb-25">{{__('general.Our Portfolio')}}</h6>
						<div class="bord pt-25 bord-thin-top d-flex justify-content-end">
							<h2 class="fw-600 d-rotate wow">
								<span class="rotate-text">{{__('general.Our featured projects')}}</span></span>
							</h2>
						</div>
					</div>
				</div>
				<div class="container position-re">
					<div class="links-img">
						<div class="row">
							@foreach($projects as $index=>$project)
							<div class="col-lg-4 items">
								<div class="item">
									<div class="img" data-tab="tab-{{$index+1}}">
										<img src="/uploads/{{$project->images[0]??''}}" alt="">
										<a href="/web/project-details/{{$project->id}}" class="link-overlay"></a>
									</div>
									<div class="cont">
										<span class="tag">{{translate($dictionaries, 'name', 'ProjectCategory',$project->category->name, $project->category->id)}}</span>
										<h2>{{translate($dictionaries, 'name',$project->name,'Project', $project->id)}}</h2>
									</div>
								</div>
							</div>
							@endforeach
						</div>

					</div>
					<div class="links-text">
						<ul class="rest">
							@foreach($projects as $index=>$project)
							<li id="tab-{{$index+1}}">
								<span class="tag">{{translate($dictionaries, 'name',$project->category->name, 'ProjectCategory', $project->category->id)}}</span>
								<h2>{{translate($dictionaries, 'name',$project->name, 'Project', $project->id)}}</h2>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="container mt-40">
					<div class="sec-bottom mt-100">
						<div class="main-bg d-flex align-items-center">
							<p>{{__('general.Here are some select projects that showcase')}}</p>
							<a href="/web/projects" class="butn main-color ml-40 underline">
								<span>{{__('general.View All')}}</span>
							</a>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End Portfolio ==================== -->



			<!-- ==================== Start Testimonials ==================== -->

			<section class="testimonials">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="sec-head">
								<h6 class="sub-title main-color mb-15">{{__('general.Testimonials')}}</h6>
								<h3 class="fw-600 d-rotate wow">
									<span class="rotate-text">{{__('general.What People Say')}}</span>
								</h3>
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
															<path data-name="Path" d="M-23.723-530.169v97.327H-121.05v-68.7q0-40.076,13.359-73.472T-62.845-639.9l36.259,28.625Q-63.8-570.244-68.57-530.169Zm158.395,0v97.327H37.345v-68.7q0-40.076,13.359-73.472T95.55-639.9l36.259,28.625Q94.6-570.244,89.825-530.169Z" transform="translate(121.55 640.568)" fill="none" stroke="#222" stroke-width="1" opacity="0.322">
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
															<h5>{{translate($dictionaries, 'job',$review->job, 'Review', $review->id)}}</h5>
															<span class="sub-title main-color">{{translate($dictionaries, 'name',$review->name, 'Review', $review->id)}}</span>
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

			<section class="team section-padding">
				<div class="container">
					<div class="sec-head mb-80">
						<h6 class="sub-title main-color mb-25">{{__('general.OUR TEAM')}}</h6>
						<div class="bord pt-25 bord-thin-top d-flex align-items-center">
							<h2 class="fw-600 d-rotate wow">
								<span class="rotate-text">{{__('general.Meet our')}} <span class="fw-200">{{__('general.legends')}}</span></span>
							</h2>
							<div class="ml-auto">
								<a href="/web/teams?page=1&page_size=6" class="go-more">
									<span class="text">{{__('general.view_all_members')}}</span>
									<span class="icon ti-arrow-top-{{app()->getLocale()=='en'?'right':'left'}}"></span>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach($teams as $team)
						<div class="col-lg-4">
							<div class="item md-mb50">
								<div class="img">
									<a href="/web/team-details/{{$team->id}}">
										<img src="/uploads/{{$team->image}}" alt="">
									</a>
									<a href="/web/team-details/{{$team->id}}">
										<div class="info">
											<span class="fz-12">{{translate($dictionaries, 'name',$team->name, 'Team', $team->id)}}</span>
											<h6 class="fz-18">{{translate($dictionaries, 'job',$team->job, 'Team', $team->id)}}</h6>
										</div>
									</a>
								</div>
								<div class="social">
									<div class="links">
										<a href="{{$team->first_link}}" target="__blank">
											<i class="fab fa-facebook-f"></i>
										</a>
										<a href="{{$team->second_link}}" target="__blank">
											<i class="fab fa-behance"></i>
										</a>
										<a href="{{$team->third_link}}" target="__blank">
											<i class="fab fa-instagram"></i>
										</a>
									</div>
								</div>
							</div>
						</div>

						@endforeach

					</div>
				</div>
			</section>

			<!-- ==================== End Team ==================== -->



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
							<div class="item main-bg md-mb50">
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
													{{translate($dictionaries,'name',$category->name, 'BlogCategory', $category->id)}}
												</a>
												@endforeach
											</div>
											<h5>
												<a href="/web/blog-details/{{$blog->id}}">
												{{translate($dictionaries,'name',$blog->name, 'Blog', $blog->id)}}
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



			<!-- ==================== Start clients ==================== -->

			<section class="clients-carso section-padding pt-0 sub-bg">
				<div class="container">
					<div class="sec-bottom mb-100">
						<div class="sub-bg d-flex align-items-center">
							<h6 class="fz-14 fw-400">{{__('general.More than')}} <span class="fw-600">{{$partners->count() ." ". __('general.companies')}}</span> {{__('general.trusted us worldwide')}}</h6>
						</div>
					</div>
					<div class="swiper5" data-carousel="swiper" data-items="5" data-loop="true" data-space="40">
						<div id="content-carousel-container-unq-clients" class="swiper-container" data-swiper="container">
							<div class="swiper-wrapper">
								@foreach($partners as $partner)
								<div class="swiper-slide">
									<div class="item">
										<div class="img icon-img-100">
											<img src="/uploads/{{$partner->image}}" alt="">
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ==================== End clients ==================== -->
			<x-footer />



		</main>



	</div>

</div>
@push('js')
@endpush
@push('css')
@endpush
@endsection