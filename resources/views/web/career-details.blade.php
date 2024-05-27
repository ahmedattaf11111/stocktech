@extends('layouts.web')
@section('content')
<div class="modal fade" id="careerApply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form @submit.prevent="save">
					<h5 class="text-center" style="margin-bottom: 20px;">{{__('general.Apply to')}}{{$career->name}}</h5>
					<div class="social-links mb-4">
						<a target="__blank" href="{{$web_twitter}}"><i class="fab fa-twitter"></i></a>
						<a target="__blank" href="{{$web_facebook}}"><i class="fab fa-facebook"></i></a>
						<a target="__blank" href="{{$web_instgram}}"><i class="fab fa-instagram"></i></a>
						<a target="__blank" href="{{$web_youtube}}"><i class="fab fa-youtube"></i></a>
					</div>
					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label class="mb-1" for="exampleInputEmail1">{{__('general.Name')}}</label>
								<input placeholder="{{__('general.Enter your name')}}" v-model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label class="mb-1" for="exampleInputEmail1">{{__('general.Phone')}}</label>
								<input placeholder="{{__('general.Enter your phone')}}" v-model="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label class="mb-1" for="exampleInputEmail1">{{__('general.Email')}}</label>
								<input placeholder="{{__('general.Enter your email')}}" v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							</div>
						</div>

						<div class="mb-3">
							<label for="formFile" class="form-label">{{__('general.Add Resume')}}</label>
							<input accept="application/pdf" @change="uploadCv" class="form-control" type="file" id="formFile">
						</div>

						<div class="col-md-12 mb-3 d-flex">
							<button class="btn btn-primary p-2 w-100" type="submit">
								<template v-if="!loading">
									{{__('general.Submit Now')}}
								</template>
								<template v-if="loading">
									<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
								</template>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<main class="main-bg">

	<!-- ==================== Start Slider ==================== -->

	<header class="header-project6 section-padding">
		<div class="container-xl">
			<div class="info d-flex align-items-center mb-10">
				<div>
					<span class="category">{{$career->careerTeam->name}}</span>
					<span class="category">{{$career->careerType->name}}</span>
				</div>
				<div class="date">{{$career->location->name}}</div>
			</div>
			<h1 class="fz-80">{{$career->name}}</h1>
		</div>
	</header>

	<!-- ==================== End Slider ==================== -->



	<!-- ==================== Start section ==================== -->

	<section class="section-padding pt-0">
		<div class="container-xl">
			<div class="row lg-marg">
				<div class="col-lg-6">
					<div class="imgs md-mb80">
						@foreach($career->images as $index=>$image)
						@if($index>0)
						<div class="{{$index+1!=count($career->images)?'mb-30':''}}">
							<img src="/uploads/{{$image}}" alt="">
						</div>
						@endif
						@endforeach
					</div>
				</div>
				<div class="col-lg-6">
					<div class="sticky-item">
						<div class="text">
							<h2 class="mb-30">{{__('general.requirments')}}</h2>
							<h5 class="mb-30 line-height-40">
								{!!$career->requirment!!}
							</h5>
						</div>
						<div class="info pt-80 mt-80 bord-thin-top">
							<div class="row">
								<div class="col-md-6">
									<div class="item mb-30">
										<span class="opacity-8 mb-5">{{__('general.team')}} :</span>
										<h6>{{$career->careerTeam->name}}</h6>
									</div>
								</div>
								<div class="col-md-6">
									<div class="item mb-30">
										<span class="opacity-8 mb-5">{{__('general.Type')}} :</span>
										<h6>{{$career->careerType->name}}</h6>
									</div>
								</div>
								<div class="col-md-6">
									<div class="item mb-30">
										<span class="opacity-8 mb-5">{{__('general.Location')}} :</span>
										<h6>{{$career->location->name}}</h6>
									</div>
								</div>
								<div class="col-md-6">
									<div class="item">
										<span class="opacity-8 mb-5">{{__('general.Start Date')}} :</span>
										<h6>
											{{\Carbon\Carbon::parse($career->created_at)->format('M d, Y')}}
										</h6>
									</div>
								</div>
								<div class="col-md-6">
									<div class="item">
										<button data-bs-toggle="modal" data-bs-target="#careerApply" class="btn" style="background-color: black;color:#fff">
											{{__('general.Apply Now')}}
										</button>
									</div>
								</div>
							</div>
						</div>
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
				@foreach($careers as $career)
				<div class="col-md-6 rest">
					<div class="text-left box bg-img" data-background="/uploads/{{$career->images[0]??''}}">
						<div class="cont d-flex align-items-center">
							<div>
								<h6 class="sub-title fz-16 mb-5">
									@if($index==0)
									{{__('general.Prev Project')}}
									@else
									{{__('general.Next Project')}}
									@endif
								</h6>
								<a href="/web/career-details/{{$career->id}}" class="fz-40 fw-600 stroke">{{$career->name}}</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div>
			<a href="/web/careers" class="all-works-butn text-center">
				<span class="ti-view-grid fz-24 mb-10"></span>
				<span class="d-block fz-12 text-u ls1">{{__('general.all Careers')}}</span>
			</a>
		</div>
	</section>

	<!-- ==================== End Next ==================== -->
	<x-footer />
</main>



@push('js')
<script>
	new Vue({
		el: "#careerApply",
		components: {},
		data: {
			name: "",
			email: "",
			phone: "",
			cv: "",
			loading: false,
		},
		methods: {
			uploadCv($event) {
				this.cv = $event.target.files[0];
			},
			save() {
				if (!this.name || !this.email || !this.phone) {
					return;
				}
				if(!this.cv){
					$.toast({
						hideAfter: 5000,
						text: @json(__('general.Resume is required'))
					});
					return;
				}
				this.loading = true;
				let formData = new FormData();
				formData.append("name", this.name);
				formData.append("phone", this.phone);
				formData.append("email", this.email);
				formData.append("email", this.email);
				formData.append("cv", this.cv);
				formData.append("career_id", @json(request()->id));
				axios.post(`${baseUrl}/web/careers/apply`, formData).then(res => {
					this.name = "";
					this.email = "";
					this.phone = "";
					this.cv = "";
					this.loading = false;
					$("#careerApply .btn-close").click();
					$.toast({
						hideAfter: 5000,
						text: @json(__('general.applied_successfully'))
					});
				})
			},
		}
	});
</script>
@endpush
@push('css')
<style>
	#careerApply .form-group label,
	.form-label {
		color: #8a8888 !important;
	}

	[dir="ltr"] #careerApply .form-group label,
	[dir="ltr"] #careerApply .form-group label .form-label,
	[dir="ltr"] #careerApply .form-group label .form-control::placeholder,
	[dir="ltr"] #careerApply .form-group .form-control {
		font-size: 15px;
	}

	
	[dir="rtl"] #careerApply .form-group label,
	[dir="rtl"] #careerApply .form-group label .form-label,
	[dir="rtl"] #careerApply .form-group label .form-control::placeholder,
	[dir="rtl"] #careerApply .form-group .form-control {
		font-size: 14px;
	}
	#careerApply .social-links {
		display: flex;
		justify-content: center;
		gap: 15px;
	}

	#careerApply .social-links a {
		border-radius: 50%;
		width: 40px;
		height: 40px;
		border: 1px solid #cfcfcf;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	#careerApply .form-control {
		padding: 10px;
	}

	#careerApply form {
		padding: 15px;
	}

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