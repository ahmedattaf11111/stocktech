@extends('layouts.web')
@section('content')
<div id="smooth-content">

	<main class="main-bg">



		<!-- ==================== Start Header ==================== -->

		<header class="page-header bg-img section-padding" data-background="assets/imgs/header/b5.jpg" data-overlay-dark="9">
			<div class="container pt-100">
				<div class="text-center">
					<h1 class="fz-100 text-u">{{__('general.faqs')}}.</h1>
					<div class="mt-15">
						<a href="/web/home">{{__('general.Home')}}</a>
						<span class="padding-rl-20">|</span>
						<span class="main-color">{{__('general.faqs')}}</span>
					</div>
				</div>
			</div>
		</header>

		<!-- ==================== End Header ==================== -->



		<!-- ==================== Start Services ==================== -->
		<section class="faqs section-padding position-re">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-4">
						<div class="sec-head md-mb80">
							<h6 class="sub-title main-color mb-15">{{__('general.faqs')}}</h6>
							<h2>{{__('general.Frequently asked questions')}}</h2>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="list-serv">
							<div class="accordion bord">
								@foreach($faqs as $index=>$faq)

								<div class="item @if($index==0) active @endif mb-15 wow fadeInUp" data-wow-delay=".1s">
									<div class="title">
										<h6>
											{{translate($dictionaries, 'question',$faq->question, 'Faq', $faq->id)}}
										</h6>
										<span class="ico ti-plus"></span>
									</div>
									<div class="accordion-info">
										<p class="">
											{{translate($dictionaries, 'answer',$faq->answer, 'Faq', $faq->id)}}
										</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="line-overlay up opacity-7">
				<svg viewBox="0 0 1728 1101" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M-43 773.821C160.86 662.526 451.312 637.01 610.111 733.104C768.91 829.197 932.595 1062.9 602.782 1098.75C272.969 1134.6 676.888 25.4306 1852 1" style="stroke-dasharray: 3246.53, 0;"></path>
				</svg>
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
														<h5>
															{{translate($dictionaries, 'name',$review->name, 'Review', $review->id)}}

														</h5>
														<span class="sub-title main-color">
															{{translate($dictionaries, 'job',$review->job, 'Review', $review->id)}}
														</span>
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

	<!-- ==================== End Footer ==================== -->


</div>

@push('js')
<script>
	new Vue({
		el: "#smooth-content",
		components: {},
		data: {
			items: @json($faqs),
		},
		methods: {

		}
	});
</script>
@endpush
@push('css')
@endpush
@endsection