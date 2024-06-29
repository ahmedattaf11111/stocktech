@extends('layouts.web')
@section('content')
<div id="smooth-content">

	<main class="main-bg">



		<!-- ==================== Start Header ==================== -->

		<header class="page-header bg-img section-padding" data-background="assets/imgs/header/bg1.jpg" data-overlay-dark="9">
			<div class="container pt-100">
				<div class="text-center">
					<h1 class="fz-100 text-u">{{__('general.Our Team')}}.</h1>
					<div class="mt-15">
						<a href="/web/home">{{__('general.Home')}}</a>
						<span class="padding-rl-20">|</span>
						<span class="main-color">{{__('general.Our Team')}}</span>
					</div>
				</div>
			</div>
		</header>

		<!-- ==================== End Header ==================== -->



		<!-- ==================== Start Team ==================== -->

		<section class="team section-padding" style="padding-bottom: 0;">
			<div class="container">
				<div class="row">
					@foreach($teams as $team)
					<div class="col-lg-4">
						<div class="item mb-80">
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
			<div class="d-flex justify-content-end" style="padding: 0 23px 60px 16px;">
				<paginate v-if="items.total>page_size" :container-class="'pagination-vue'" v-model="page" :page-count="Math.ceil(items.total/page_size)" :click-handler="getItems" prev-text="<i class='fas fa-chevron-left'></i>" next-text="<i class='fas fa-chevron-right'></i>">
				</paginate>
			</div>
		</section>
		<!-- ==================== Start Testimonials ==================== -->

		<section class="testimonials-crev section-padding pb-0 bg-img" data-background="/uploads/{{$web_review_image}}">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-lg-10">
						<div class="sec-head mb-80">
							<h2 class="fw-600 fz-70">{{__('general.What People Say')}}</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-11 position-re">
						<div class="testim-swiper testim1" data-carousel="swiper" data-loop="true" data-space="30">
							<div id="content-carousel-container-unq-testim" class="swiper-container" data-swiper="container">
								<div class="swiper-wrapper">
									@foreach($reviews as $review)
									<div class="swiper-slide">
										<div class="item d-flex align-items-center">
											<div>
												<div class="fit-img circle">
													<img src="/uploads/{{$review->image}}" alt="">
												</div>
											</div>
											<div class="content ml-100">
												<div class="text">
													<svg xmlns="http://www.w3.org/2000/svg" width="256.721" height="208.227" viewBox="0 0 256.721 208.227" id="null" class="qout-svg">
														<path id="Path_76570" data-name="Path 76570" d="M-23.723-530.169v97.327H-121.05v-68.7q0-40.076,13.359-73.472T-62.845-639.9l36.259,28.625Q-63.8-570.244-68.57-530.169Zm158.395,0v97.327H37.345v-68.7q0-40.076,13.359-73.472T95.55-639.9l36.259,28.625Q94.6-570.244,89.825-530.169Z" transform="translate(121.55 640.568)" fill="none" stroke="#1a1a1a" stroke-width="1" opacity="0.322">
														</path>
													</svg>
													<h4>
														{{translate($dictionaries, 'review',$review->review, 'Review', $review->id)}}
													</h4>
												</div>
												<div class="info d-flex align-items-center pt-40 mt-40 bord-thin-top">
													<div>
													<h5>{{translate($dictionaries, 'job',$review->job, 'Review', $review->id)}}</h5>
													<span class="sub-title main-color">{{translate($dictionaries, 'name',$review->name, 'Review', $review->id)}}</span>
													</div>
													<div class="ml-auto">
														<div class="rate-stars fz-14">
															<span class="rate main-color">
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</span>
														</div>
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
		</section>

		<!-- ==================== End Testimonials ==================== -->

		<!-- ==================== Start Blog ==================== -->

		<section class="blog-list-half section-padding">
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
		<!-- ==================== End Team ==================== -->
		<x-footer />



	</main>



</div>
@push('js')
<script>
	let uploadedFiles = [];
	const urlParams = new URLSearchParams(window.location.search);
	Vue.component('paginate', VuejsPaginate);
	new Vue({
		el: "#smooth-content",
		components: {},
		data: {
			page: urlParams.get('page'),
			page_size: urlParams.get('page_size'),
			items: @json($teams),
		},
		methods: {
			getItems() {
				window.location.href = `/web/teams?page=${this.page}&page_size=${this.page_size}`
			}
		}
	});
</script>
@endpush
@push('css')
@endpush
@endsection