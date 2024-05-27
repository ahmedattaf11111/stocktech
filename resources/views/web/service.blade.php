@extends('layouts.web')
@section('content')
<div id="smooth-content">

	<main class="main-bg">



		<!-- ==================== Start Header ==================== -->

		<header class="page-header bg-img section-padding" data-background="assets/imgs/header/b5.jpg" data-overlay-dark="9">
			<div class="container pt-100">
				<div class="text-center">
					<h1 class="fz-100 text-u">{{__('general.Services')}}.</h1>
					<div class="mt-15">
						<a href="/web/home">{{__('general.Home')}}</a>
						<span class="padding-rl-20">|</span>
						<span class="main-color">{{__('general.Services')}}</span>
					</div>
				</div>
			</div>
		</header>

		<!-- ==================== End Header ==================== -->



		<!-- ==================== Start Services ==================== -->

		<section class="services-boxs section-padding" style="padding-bottom: 0;">
			<div class="container">
				<div class="sec-head mb-80">
					<h6 class="sub-title main-color mb-25">{{__('general.Our Specialize')}}</h6>
					<div class="bord pt-25 bord-thin-top d-flex align-items-center">
						<h2 class="fw-600 text-u ls1">{{__('general.What We Offer')}}</h2>
					</div>
				</div>
				<div class="row pt-30">
					@foreach($services as $service)
					<div class="col-lg-3 col-md-6 items">
						<div class="item-box bg md-mb50">
							<div class="icon mb-40 opacity-5">
								<img src="/uploads/{{$service->images[0]??''}}" alt="">
							</div>
							<h5 class="mb-15 text-u">{{$service->name}}</h5>
							<p>{{$service->description}}</p>
							<a href="/web/service-details/{{$service->id}}" class="rmore mt-30">
								<span class="sub-title">{{__('general.Read More')}}</span>
								<img src="assets/imgs/arrow-right.png" alt="" class="icon-img-20 ml-5">
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="d-flex justify-content-end" style="padding: 40px 23px 140px 16px;">
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
														{{$review->review}}
													</h4>
												</div>
												<div class="info d-flex align-items-center pt-40 mt-40 bord-thin-top">
													<div>
														<h5>{{$review->name}}</h5>
														<span class="sub-title main-color">{{$review->job}}</span>
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

		<section class="blog-list-half section-padding ">
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
											<a href="/web/blogs?page=1&page_size=6&category_id={{$category->id}}">{{$category->name_trans}}</a>
											@endforeach
										</div>
										<h5>
											<a href="/web/blog-details/{{$blog->id}}">
												{{$blog->name_trans}}
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

	<!-- ==================== End Footer ==================== -->


</div>

@push('js')
<script>
	const urlParams = new URLSearchParams(window.location.search);
	Vue.component('paginate', VuejsPaginate);
	new Vue({
		el: "#smooth-content",
		components: {},
		data: {
			page: urlParams.get('page'),
			page_size: urlParams.get('page_size'),
			items: @json($services),
		},
		methods: {
			getItems() {
				window.location.href = `/web/services?page=${this.page}&page_size=${this.page_size}`
			}
		}
	});
</script>
@endpush
@push('css')
@endpush
@endsection