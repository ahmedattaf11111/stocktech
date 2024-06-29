@extends('layouts.admin')
@section('content')
<div id="app" class="content-wrapper">
	<!-- Content -->
	<div class="bs-toast toast update-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Success')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The item has updated successfully')}}</div>
	</div>
	<div class="bs-toast toast delete-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Success')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.item has been deleted successfully')}}</div>
	</div>
	<div class="bs-toast toast banner-image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The banner image is required')}}</div>
	</div>

	<div class="bs-toast toast intro-image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The intro image is required')}}</div>
	</div>

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="py-3 mb-4 ">
			<span class="text-muted fw-light">{{__('general.Forms')}} / </span>{{__('general.Home')}}
		</h4>
		<!-- Sticky Actions -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
						<h5 class="card-title mb-sm-0 me-2" style="display:flex; gap:30px">
							<div>
								{{__('general.Home Form')}}
							</div>
						</h5>

						<div class="action-btns">
							@if(auth()->user()->can('super admin')||auth()->user()->can('update home'))
							<button :disabled="loading" form="form-add-new-record" type="submit" class="btn save mx-3">
								<template v-if="!loading">
									{{__('general.Save')}}
								</template>
								<template v-if="loading">
									<div style="height:18px!important" class="sk-chase sk-white">
										<div class="sk-chase-dot"></div>
										<div class="sk-chase-dot"></div>
										<div class="sk-chase-dot"></div>
										<div class="sk-chase-dot"></div>
										<div class="sk-chase-dot"></div>
										<div class="sk-chase-dot"></div>
									</div>
								</template>
							</button>
							@endif
							<a href="/admin/teams?page=1&page_size=10" type="reset" class="btn btn-outline-secondary waves-effect">{{__('general.Cancel')}}</a>

						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-8 mx-auto">
								<form id="form-add-new-record" @submit.prevent="save">
									<!-- 1. Delivery Address -->
									<h5 class="mb-4 mt-4">1. {{__('general.Banner Section')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<label class="form-label" for="fullname">{{__('general.main_title')}}</label>
											<input name="banner_main_title" type="text" id="banner_main_title" v-model="banner_main_title" class="form-control" placeholder="{{__('general.main_title')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="fullname">{{__('general.Title')}}</label>
											<input name="banner_first_title" type="text" id="banner_first_title" v-model="banner_first_title" class="form-control" placeholder="{{__('general.Title')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="fullname">{{__('general.Title')}}</label>
											<input name="banner_second_title" type="text" id="banner_second_title" v-model="banner_second_title" class="form-control" placeholder="{{__('general.Title')}}" />
										</div>
										<div class="col-sm-12">
											<label class="form-label" for="address">{{__('general.content')}}</label>
											<textarea name="banner_content" class="form-control" id="banner_content" v-model="banner_content" rows="3" placeholder="{{__('general.content')}}"></textarea>
										</div>

										<div class="col-sm-12">
											<label class="form-label mb-2" for="address">
												<label class="form-label mb-2" for="address">
													@if($banner_image)
													<a target="_blank" href="/uploads/{{$banner_image}}" style="padding:0" class="btn">
														{{__('general.image')}}
														<span class="ti ti-edit"></span>
													</a>
													@else
													{{__('general.image')}}
													@endif
												</label>
											</label>
											<div action="/upload" class="dropzone needsclick" id="banner-dropzone-basic">
												<div class="dz-message needsclick">
													{{__('general.Drop files here or click to upload')}}
												</div>
												<div class="fallback">
													<input name="file" type="file" />
												</div>
											</div>
										</div>
									</div>
									<hr />
									<!-- 1. Delivery Address -->
									<h5 class="mb-4 mt-4">2. {{__('general.Intro Section')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<label class="form-label" for="fullname">{{__('general.main_title')}}</label>
											<input name="intro_main_title" type="text" id="intro_main_title" v-model="intro_main_title" class="form-control" placeholder="{{__('general.main_title')}}" />
										</div>
										<div class="col-sm-12">
											<label class="form-label" for="fullname">{{__('general.Title')}}</label>
											<input name="intro_second_title" type="text" id="intro_second_title" v-model="intro_second_title" class="form-control" placeholder="{{__('general.Title')}}" />
										</div>

										<div class="col-sm-6">
											<label class="form-label" for="address">{{__('general.number')}}</label>
											<input name="intro_one_number" class="form-control" id="intro_one_number" v-model="intro_one_number" placeholder="{{__('general.number')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="address">{{__('general.text')}}</label>
											<input name="intro_one_text" class="form-control" id="intro_one_text" v-model="intro_one_text" placeholder="{{__('general.text')}}" />
										</div>

										<div class="col-sm-6">
											<label class="form-label" for="address">{{__('general.number')}}</label>
											<input name="intro_tow_number" class="form-control" id="intro_tow_number" v-model="intro_tow_number" placeholder="{{__('general.number')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="address">{{__('general.text')}}</label>
											<input name="intro_tow_text" class="form-control" id="intro_tow_text" v-model="intro_tow_text" placeholder="{{__('general.text')}}" />
										</div>
										<div class="col-sm-12">
											<label class="form-label" for="address">{{__('general.video')}}</label>
											<input name="intro_video" class="form-control" id="intro_video" v-model="intro_video" placeholder="{{__('general.video')}}" />
										</div>
										<div class="col-sm-12">
											<label class="form-label" for="address">{{__('general.content')}}</label>
											<textarea rows="3" name="intro_content" class="form-control" id="intro_content" v-model="intro_content" placeholder="{{__('general.content')}}"></textarea>
										</div>
										<div class="col-sm-12">
											<label class="form-label mb-2" for="address">
												@if($intro_image)
												<a target="_blank" href="/uploads/{{$intro_image}}" style="padding:0" class="btn">
													{{__('general.image')}}
													<span class="ti ti-edit"></span>
												</a>
												@else
												{{__('general.image')}}
												@endif
											</label>
											<div action="/upload" class="dropzone needsclick" id="intro-dropzone-basic">
												<div class="dz-message needsclick">
													{{__('general.Drop files here or click to upload')}}
												</div>
												<div class="fallback">
													<input name="file" type="file" />
												</div>
											</div>
										</div>
									</div>
									<hr />
									<h5 class="mb-4 mt-4">3. {{__('general.advertising text')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<input name="adv_text" type="text" id="adv_text" v-model="adv_text" class="form-control" placeholder="{{__('general.advertising text')}}" />
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /Sticky Actions -->
	</div>
	<!-- / Content -->
	<div class="content-backdrop fade"></div>
</div>
@push('js')
<script>
	let uploadedBannerFiles = [];
	let uploadedIntroFiles = [];
	const previewTemplate = `<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`;
	Vue.component('paginate', VuejsPaginate);
	new Vue({
		el: "#app",
		components: {},
		data: {
			loading: false,
			langs: @json($langs),
			id: @json($id),
			banner_content: "{{translate($dictionaries, 'banner_content',$banner_content, 'Home', $id)}}",
			banner_main_title: "{{translate($dictionaries, 'banner_main_title',$banner_main_title,'Home', $id)}}",
			banner_first_title: "{{translate($dictionaries, 'banner_first_title',$banner_first_title, 'Home', $id)}}",
			banner_second_title: "{{translate($dictionaries, 'banner_second_title',$banner_second_title, 'Home', $id)}}",
			intro_main_title: "{{translate($dictionaries, 'intro_main_title',$intro_main_title, 'Home', $id)}}",
			intro_second_title: "{{translate($dictionaries, 'intro_second_title',$intro_second_title, 'Home', $id)}}",
			intro_content: "{{translate($dictionaries, 'intro_content',$intro_content,'Home', $id)}}",
			intro_one_number: "{{translate($dictionaries, 'intro_one_number',$intro_one_number,'Home', $id)}}",
			intro_one_text: "{{translate($dictionaries, 'intro_one_text',$intro_one_text,'Home', $id)}}",
			intro_tow_number: "{{translate($dictionaries, 'intro_tow_number',$intro_tow_number,'Home', $id)}}",
			intro_tow_text: "{{translate($dictionaries, 'intro_tow_text',$intro_tow_text,'Home', $id)}}",
			intro_video: @json($intro_video),
			adv_text: "{{translate($dictionaries, 'adv_text',$adv_text,'Home', $id)}}",
			banner_image: @json($banner_image),
			intro_image: @json($intro_image),
		},
		methods: {
			changeLang(lang) {
				let className = 'App\\Models\\Home';
				this.currentLang = lang;
				axios.get(`${baseUrl}/dictionaries`).then(res => {
					this.dictionaries = res.data;
					console.log(this.dictionaries)
				}).catch((res) => {})
			},
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						if (uploadedBannerFiles.length != 0) {
							formData.append('banner_image', uploadedBannerFiles[0]);
						}
						formData.append('banner_content', this.banner_content);
						formData.append('lang', this.currentLang);
						formData.append('banner_main_title', this.banner_main_title);
						formData.append('banner_first_title', this.banner_first_title);
						formData.append('banner_second_title', this.banner_second_title);
						formData.append('intro_main_title', this.intro_main_title);
						formData.append('intro_second_title', this.intro_second_title);
						formData.append('intro_content', this.intro_content);
						formData.append('intro_one_number', this.intro_one_number);
						formData.append('intro_one_text', this.intro_one_text);
						formData.append('intro_tow_number', this.intro_tow_number);
						formData.append('intro_tow_text', this.intro_tow_text);
						formData.append('intro_video', this.intro_video);
						formData.append('adv_text', this.adv_text);
						if (uploadedBannerFiles.length == 0 && !this.id) {
							const toastAnimationExample = document.querySelector(`.banner-image-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						if (uploadedIntroFiles.length != 0) {
							formData.append('intro_image', uploadedIntroFiles[0]);
						}
						if (uploadedIntroFiles.length == 0 && !this.id) {
							const toastAnimationExample = document.querySelector(`.intro-image-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}

						this.loading = true;
						axios.post(`${baseUrl}/admin/home`, formData).then(res => {
							this.loading = false;
							this.images = res.data;
							const toastAnimationExample = document.querySelector(`.update-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-primary");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
						}).catch((res) => {
							this.loading = false;
						})
					}
				});

			},

		}
	});
	const formAddNewRecord = document.getElementById('form-add-new-record');
	fv = FormValidation.formValidation(formAddNewRecord, {
		fields: {
			banner_content: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			banner_main_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			banner_first_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			banner_second_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

			intro_main_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

			intro_second_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

			intro_content: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

			intro_one_number: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			intro_one_text: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			intro_tow_number: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			intro_tow_text: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			intro_video: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

			adv_text: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

		},
		plugins: {
			trigger: new FormValidation.plugins.Trigger(),
			bootstrap5: new FormValidation.plugins.Bootstrap5({
				// Use this for enabling/changing valid/invalid class
				eleValidClass: 'is-valid',
			}),
			submitButton: new FormValidation.plugins.SubmitButton(),
			// Submit the form when all fields are valid
			// defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
			autoFocus: new FormValidation.plugins.AutoFocus()
		}
	});
	const bannerDropzoneBasic = document.querySelector('#banner-dropzone-basic');
	if (bannerDropzoneBasic) {
		const myDropzone = new Dropzone(bannerDropzoneBasic, {
			previewTemplate: previewTemplate,
			parallelUploads: 1,
			maxFilesize: 5,
			addRemoveLinks: true,
			maxFiles: 1,
			acceptedFiles: 'image/*',
			init: function() {
				this.on("addedfiles", (files) => {
					for (const key in files) {
						if (typeof files[key] == "object") {
							uploadedBannerFiles.push(files[key]);
						}
					}
				});
			},
			removedfile: function(file) {
				var name = file.name;
				let index = uploadedBannerFiles.findIndex((e) => e == file);
				uploadedBannerFiles.splice(index, 1);
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			}
		});
	}
	const introDropzoneBasic = document.querySelector('#intro-dropzone-basic');
	if (introDropzoneBasic) {
		const myDropzone = new Dropzone(introDropzoneBasic, {
			previewTemplate: previewTemplate,
			parallelUploads: 1,
			maxFilesize: 5,
			addRemoveLinks: true,
			maxFiles: 1,
			acceptedFiles: 'image/*',
			init: function() {
				this.on("addedfiles", (files) => {
					for (const key in files) {
						if (typeof files[key] == "object") {
							uploadedIntroFiles.push(files[key]);
						}
					}
				});
			},
			removedfile: function(file) {
				var name = file.name;
				let index = uploadedIntroFiles.findIndex((e) => e == file);
				uploadedIntroFiles.splice(index, 1);
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			}
		});
	}
</script>
<style>
	.dz-message {
		font-size: 1.325rem;
	}

	.save {
		background-color: var(--bs-primary) !important;
		color: #fff !important;
	}

	.sk-primary.sk-plane,
	.sk-primary .sk-chase-dot:before,
	.sk-primary .sk-bounce-dot,
	.sk-primary .sk-wave-rect,
	.sk-primary.sk-pulse,
	.sk-primary .sk-swing-dot,
	.sk-primary .sk-circle-dot:before,
	.sk-primary .sk-circle-fade-dot:before,
	.sk-primary .sk-grid-cube,
	.sk-primary .sk-fold-cube:before {
		background-color: var(--bs-primary) !important;
	}

	.btn-label-primary,
	.btn-label-primary:hover {
		color: #fff !important;
		border-color: transparent !important;
		background: var(--bs-primary) !important;
		opacity: .5 !important;
	}
</style>
@endpush
@endsection