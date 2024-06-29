@extends('layouts.web')
@section('content')
<div id="smooth-content">
	<main class="main-bg">

		<!-- ==================== Start Slider ==================== -->

		<header class="blog-header section-padding pb-0">
			<div class="container mt-80">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="caption">
							<div class="sub-title fz-12">
								@foreach($blog->blogCategories as $index=>$category)
								<a href="#0"><span>
										{{translate($dictionaries,'name',$category->name, 'BlogCategory', $category->id)}}
										@if($index+1!=$blog->blogCategories->count()),@endif </span></a>
								@endforeach
							</div>
							<h1 class="fz-55 mt-30">
								{{translate($dictionaries,'name',$blog->name, 'Blog', $blog->id)}}
							</h1>
						</div>
						<div class="info d-flex mt-40 align-items-center">
							<div class="left-info">
								<div class="d-flex align-items-center">
									<div class="author-info">
										<div class="d-flex align-items-center">
											<a href="#0" class="circle-60">
												<img src="/web/assets/imgs/blog/author.png" alt="" class="circle-img">
											</a>
											<a href="#0" class="ml-20">
												<span class="opacity-7">{{__('general.author')}}</span>
												<h6 class="fz-16">
													{{translate($dictionaries,'author_name',$blog->author_name, 'Blog', $blog->id)}}
												</h6>
											</a>
										</div>
									</div>
									<div class="date ml-50">
										<a href="#0">
											<span class="opacity-7">{{__('general.Published')}}</span>
											<h6 class="fz-16">
												{{\Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}
											</h6>
										</a>
									</div>
								</div>
							</div>
							<div class="right-info ml-auto">
								<!-- <div>
								<span class="pe-7s-comment fz-18 mr-10"></span>
								<span class="opacity-7">02 Comments</span>
							</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="background bg-img mt-80" data-background="/uploads/{{$blog->image}}"></div>
		</header>

		<!-- ==================== End Slider ==================== -->



		<!-- ==================== Start Blog ==================== -->

		<section class="blog section-padding">
			<div class="container">
				<div class="row xlg-marg">
					<div class="col-lg-8">
						<div class="main-post">
							<div class="item pb-60">
								<article>
									<div class="text">
										<p><span class="spec-letter">
												{{translate($dictionaries,'content',$blog->content, 'Blog', $blog->id)[0]}}
											</span>
											{{substr(translate($dictionaries,'content',$blog->content, 'Blog', $blog->id), 1)}}
										</p>
									</div>
									<div class="title mt-30">
										<h4>{{translate($dictionaries,'section_one_title',$blog->section_one_title, 'Blog', $blog->id)}}</h4>
									</div>
									<div class="text mt-20">
										<p>
											{{translate($dictionaries,'section_one_content',$blog->section_one_content, 'Blog', $blog->id)}}
										</p>
									</div>
								</article>

								<div class="post-qoute mt-50">
									<h6 class="fz-20">
										<span class="l-block">
											{{translate($dictionaries,'author_note',$blog->author_note, 'Blog', $blog->id)}}
										</span>
										<span class="sub-title mt-20 mb-0"> - {{translate($dictionaries,'author_name',$blog->author_name, 'Blog', $blog->id)}}</span>
									</h6>
								</div>

								<div class="mb-50 mt-50">
									<div class="row">
										<div class="col-sm-6">
											<div class="iner-img sm-mb30">
												<img src="/uploads/{{$blog->first_image}}" alt="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="iner-img">
												<img src="/uploads/{{$blog->second_image}}" alt="">
											</div>
										</div>
									</div>
								</div>

								<div class="title mb-10">
									<h4>{{translate($dictionaries,'section_tow_title',$blog->section_tow_title, 'Blog', $blog->id)}}</h4>
								</div>

								<div class="text mb-20">
									<p>
										{{translate($dictionaries,'section_tow_content',$blog->section_tow_content, 'Blog', $blog->id)}}
									</p>
								</div>

								<div class="unorder-list mb-30">
									<h6 class="mb-15">
										{{translate($dictionaries,'section_three_title',$blog->section_three_title, 'Blog', $blog->id)}}
									</h6>
									<ul class="rest">
										<li>{{translate($dictionaries,'section_three_point_one',$blog->section_three_point_one, 'Blog', $blog->id)}}</li>
										<li>{{translate($dictionaries,'section_three_point_tow',$blog->section_three_point_tow, 'Blog', $blog->id)}}</li>
										<li>
											{{translate($dictionaries,'section_three_point_three',$blog->section_three_point_three, 'Blog', $blog->id)}}
										</li>
									</ul>
								</div>

								<div class="order-list mb-30">
									<h6 class="mb-15">
										{{translate($dictionaries,'section_four_title',$blog->section_four_title, 'Blog', $blog->id)}}
									</h6>
									<ul class="rest">
										<li><span>01 -</span>{{translate($dictionaries,'section_four_point_one',$blog->section_four_point_one, 'Blog', $blog->id)}}
										</li>
										<li><span>02 -</span> {{translate($dictionaries,'section_four_point_tow',$blog->section_four_point_tow, 'Blog', $blog->id)}}
										</li>
										<li><span>03 -</span> {{translate($dictionaries,'section_four_point_three',$blog->section_four_point_three, 'Blog', $blog->id)}}
										</li>
									</ul>
								</div>

								<div class="text">
									<p>
										{{translate($dictionaries,'section_four_content',$blog->section_four_content, 'Blog', $blog->id)}}
									</p>
								</div>
							</div>
							<div class="info-area flex pt-50 bord-thin-top">
								<div>
									<div class="tags flex">
										<div class="valign">
											<span>{{__('general.Tags')}} :</span>
										</div>
										<div>
											@foreach($blog->blogTags as $tag)
											<a href="/web/blogs?page=1&page_size=6&tag_id={{$tag->id}}">
												{{translate($dictionaries,'name',$tag->name, 'BlogTag', $tag->id)}}
											</a>
											@endforeach
										</div>
									</div>
								</div>
								<!-- <div class="ml-auto">
								<div class="share-icon flex">
									<div class="valign">
										<span>{{__('general.Share')}} :</span>
									</div>
									<div>
										<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
										<a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
										<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
									</div>
								</div>
							</div> -->
							</div>
							<div class="author-area mt-50 bord-thin-bottom">
								<div class="flex">
									<div class="author-img mr-30">
										<div class="img">
											<img src="/uploads/{{$blog->author_image}}" alt="" class="circle-img">
										</div>
									</div>
									<div class="cont valign">
										<div class="full-width">
											<h6 class="fw-600 mb-10">
												{{translate($dictionaries,'author_name',$blog->author_name, 'Blog', $blog->id)}}
											</h6>
											<p>
												{{translate($dictionaries,'author_about',$blog->author_about, 'Blog', $blog->id)}}
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="comments-from mt-80">
						<div class="mb-60">
							<h3>Leave a comment</h3>
						</div>
						<form id="contact-form" method="post" action="https://ui-themez.smartinnovates.net/items/infolio/Infolio-light/contact.php">

							<div class="messages"></div>

							<div class="controls row">

								<div class="col-lg-6">
									<div class="form-group mb-30">
										<input id="form_name" type="text" name="name" placeholder="Name" required="required">
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group mb-30">
										<input id="form_email" type="email" name="email" placeholder="Email" required="required">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<textarea id="form_message" name="message" placeholder="Message" rows="4" required="required"></textarea>
									</div>
									<div class="text-center">
										<div class="mt-30">
											<button type="submit">
												<span class="text">Post Comment</span>
											</button>
										</div>
									</div>
								</div>

							</div>
						</form>
					</div> -->
					</div>
					<div class="col-lg-4">
						<div class="sidebar">
							<form action="/web/blogs">
								<div class="search-box">
									<input type="hidden" name="page" value="1">
									<input type="hidden" name="page_size" value="6">

									<input type="text" name="text" placeholder="{{__('general.Search')}}">
									<span class="icon pe-7s-search"></span>
								</div>
							</form>

							<div class="widget catogry">
								<h6 class="title-widget">{{__('general.Categories')}}</h6>
								<ul class="rest">
									@foreach($categories as $category)
									<li>
										<span><a href="@if($category->blogs_count>0)/web/blogs?page=1&page_size=6&category_id={{$category->id}} @else javascript:; @endif">
												{{translate($dictionaries, 'name',$category->name, 'BlogCategory', $category->id)}}
											</a></span>
										<span class="ml-auto">{{$category->blogs_count}}</span>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="widget last-post-thum">
								<h6 class="title-widget">{{__('general.latest Posts')}}</h6>
								@foreach($blogs as $blog)
								<div class="item d-flex align-items-center">
									<div>
										<div class="img">
											<a href="/web/blog-details/{{$blog->id}}">
												<img src="/uploads/{{$blog->image}}" alt="">
												<span class="date">

													<span> {{\Carbon\Carbon::parse($blog->created_at)->format('d')}}
														/ <br> {{\Carbon\Carbon::parse($blog->created_at)->format('M')}}
													</span>
												</span>
											</a>
										</div>
									</div>
									<div class="cont">
										<span class="tag"><a href="/web/blogs?page=1&page_size=6&category_id={{$blog->blogCategories[0]?$blog->blogCategories[0]->id:''}}">{{$blog->blogCategories[0]?$blog->blogCategories[0]->name_trans:''}}</a></span>
										<h6><a href="/web/blog-details/{{$blog->id}}">{{translate($dictionaries, 'name',$blog->name, 'Blog', $blog->id)}}</a></h6>
									</div>
								</div>
								@endforeach
							</div>
							<div class="widget tags">
								<h6 class="title-widget">{{__('general.Tags')}}</h6>
								<div>
									@foreach($tags as $tag)
									<a href="@if($tag->blogs_count > 0) /web/blogs?page=1&page_size=6&tag_id={{$tag->id}} @else javascript:; @endif">
										{{translate($dictionaries, 'name',$tag->name, 'Tag', $tag->id)}}
									</a>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ==================== End Blog ==================== -->



		<!-- ==================== Start recent Blog ==================== -->

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
		<x-footer />

		<!-- ==================== End recent Blog ==================== -->


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