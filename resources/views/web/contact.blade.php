@extends('layouts.web')
@section('content')
<div id="smooth-content">

	<main class="main-bg">



		<!-- ==================== Start Header ==================== -->

		<header class="page-header bg-img section-padding" data-background="assets/imgs/header/bg1.jpg" data-overlay-dark="9">
			<div class="container pt-100">
				<div class="text-center">
					<h1>{{__('general.Contact Us')}}</h1>
					<div class="mt-15">
						<a href="/web/home">{{__('general.Home')}}</a>
						<span class="padding-rl-20">|</span>
						<span class="main-color">{{__('general.Contact Us')}}</span>
					</div>
				</div>
			</div>
		</header>




		<section class="contact section-padding sub-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 valign">
						<div class="sec-head md-mb80">
							<h2 class="text-u ls1 d-rotate wow">
								<span class="rotate-text">
									{{translate($dictionaries, 'contact_title',$web_contact_title, 'WebSetting', $web_setting_id)}}
								</span>
							</h2>
							<p class="mt-20 mb-20">{{translate($dictionaries, 'contact_content',$web_contact_content, 'WebSetting', $web_setting_id)}}</p>
							<div class="row">
								<div class="col-md-6">
									<div class="morinfo mt-30">
										<h6 class="mb-15">{{__('general.address')}}</h6>
										<p>
											{{translate($dictionaries, 'address',$web_address, 'WebSetting', $web_setting_id)}}
										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="morinfo mt-30">
										<h6 class="mb-15">{{__('general.Email')}}</h6>
										<p>{{$web_email}}</p>
									</div>
								</div>
							</div>
							<div class="phone fz-30 fw-600 mt-30 underline main-color">
								<a href="#0">{{$web_phone}}</a>
							</div>
							<ul class="rest social-text d-flex mt-60">
								<li class="mr-30">
									<a target="__blank" href="{{$web_facebook}}" class="hover-this"><span class="hover-anim">{{__('general.Facebook')}}</span></a>
								</li>
								<li class="mr-30">
									<a target="__blank" href="{{$web_instgram}}" class="hover-this"><span class="hover-anim">{{__('general.Instgram')}}</span></a>
								</li>
								<li class="mr-30">
									<a target="__blank" href="{{$web_youtube}}" class="hover-this"><span class="hover-anim">{{__('general.youtube')}}</span></a>
								</li>
								<li>
									<a target="__blank" href="https://wa.me/{{$web_whatsapp}}" class="hover-this"><span class="hover-anim">{{__('general.whatsapp')}}</span></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 offset-lg-1 valign">

						<div class="full-width">
							<div class="sec-head mb-50">
								<h3 class="text-u ls1">{{__('general.SEND A MESSAGE')}}</h3>
							</div>
							<form id="contact-form" @submit.prevent="save">

								<div class="messages"></div>

								<div class="controls row">

									<div class="col-lg-6">
										<div class="form-group mb-30">
											<input v-model="name" id="form_name" type="text" name="name" placeholder="{{__('general.Name')}}" required="required">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group mb-30">
											<input v-model="email" id="form_email" type="email" name="email" placeholder="{{__('general.Email')}}" required="required">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group mb-30">
											<input v-model="subject" id="form_subject" type="text" name="subject" required="required" placeholder="{{__('general.Subject')}}">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<textarea v-model="message" id="form_message" name="message" placeholder="{{__('general.Message')}}" rows="4" required="required"></textarea>
										</div>
										<div class="mt-30">
											<button type="submit" class="butn butn-full butn-bord radius-30">
												<span class="text">
													<template v-if="!loading">
														{{__('general.Lets Talk')}}
													</template>
													<template v-if="loading">
														<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
													</template>
													
												</span>
											</button>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ==================== End Testimonials ==================== -->

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
														<h5>{{translate($dictionaries, 'name',$review->name, 'Review', $review->id)}}</h5>
														<span class="sub-title main-color">{{translate($dictionaries, 'job',$review->job, 'Review', $review->id)}}</span>
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
											<div><span class="opacity-7">{{__('general.Posted by')}}</span><br>
											{{translate($dictionaries, 'author_name',$blog->author_name, 'Blog', $blog->id)}}
										</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-7 cont valign">
									<div class="full-width">
										<div class="tags mb-15">
											@foreach($blog->blogCategories as $category)
											<a href="/web/blogs?page=1&page_size=6&category_id={{$category->id}}">
												{{translate($dictionaries, 'name',$category->name, 'BlogCategory', $category->id)}}
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
		data: {
			name: "",
			email: "",
			subject: "",
			message: "",
			loading: false,
		},
		methods: {
			save() {
				if (!this.name || !this.email || !this.subject || !this.message) {
					return;
				}
				this.loading = true;
				axios.post(`${baseUrl}/web/create-contact`, {
					name: this.name,
					email: this.email,
					subject: this.subject,
					message: this.message,
				}).then(res => {
					this.name = "";
					this.email = "";
					this.subject = "";
					this.message = "";
					this.loading = false;
					$.toast({
						hideAfter:5000,
						text:@json(__('general.message_sent_successfully'))
					});
				})
			},
		}
	});
</script>
@endpush
@push('css')
@endpush
@endsection