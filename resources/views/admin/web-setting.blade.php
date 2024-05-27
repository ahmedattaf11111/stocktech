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
	<div class="bs-toast toast black-image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The black image is required')}}</div>
	</div>

	<div class="bs-toast toast term-and-condition-editor-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.Term and condition is required')}}</div>
	</div>

	<div class="bs-toast toast privacy-policy-editor-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.Privacy policy is required')}}</div>
	</div>


	<div class="bs-toast toast white-image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The white image is required')}}</div>
	</div>

	<div class="bs-toast toast review-image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The review image is required')}}</div>
	</div>


	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="py-3 mb-4 ">
			<span class="text-muted fw-light">{{__('general.Forms')}} / </span>{{__('general.setting')}}
		</h4>
		<!-- Sticky Actions -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
						<h5 class="card-title mb-sm-0 me-2">{{__('general.Setting Form')}}</h5>
						<div class="action-btns">
							@if(auth()->user()->can('super admin')||auth()->user()->can('update setting'))
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
									<h5 class="mb-4 mt-4">1. {{__('general.Basic information')}}</h5>
									<div class="row g-3">
										<div class="col-sm-6">
											<label class="form-label" for="fullname">{{__('general.app_name_ar')}}</label>
											<input name="app_name_ar" type="text" id="app_name_ar" v-model="app_name_ar" class="form-control" placeholder="{{__('general.app_name_ar')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="fullname">{{__('general.app_name_en')}}</label>
											<input name="app_name_en" type="text" id="app_name_en" v-model="app_name_en" class="form-control" placeholder="{{__('general.app_name_en')}}" />
										</div>
										<div class="col-sm-12">
											<label class="form-label" for="fullname">{{__('general.Email')}}</label>
											<input name="email" type="text" id="email" v-model="email" class="form-control" placeholder="{{__('general.Email')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="fullname">{{__('general.address')}}</label>
											<input name="address" type="text" id="address" v-model="address" class="form-control" placeholder="{{__('general.address')}}" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="fullname">{{__('general.Phone')}}</label>
											<input name="phone" type="text" id="phone" v-model="phone" class="form-control" placeholder="{{__('general.Phone')}}" />
										</div>
									</div>
									<hr />
									<!-- 1. Delivery Address -->
									<h5 class="mb-4 mt-4">2. {{__('general.logos')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<label class="form-label mb-2" for="address">
												<label class="form-label mb-2" for="address">
													@if($black_logo)
													<a target="_blank" href="/uploads/{{$black_logo}}" style="padding:0" class="btn">
														{{__('general.black_logo')}}
														<span class="ti ti-edit"></span>
													</a>
													@else
													{{__('general.black_logo')}}
													@endif
												</label>
											</label>
											<div action="/upload" class="dropzone needsclick" id="black-logo-dropzone-basic">
												<div class="dz-message needsclick">
													{{__('general.Drop files here or click to upload')}}
												</div>
												<div class="fallback">
													<input name="file" type="file" />
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<label class="form-label mb-2" for="address">
												<label class="form-label mb-2" for="address">
													@if($white_logo)
													<a target="_blank" href="/uploads/{{$white_logo}}" style="padding:0" class="btn">
														{{__('general.white_logo')}}
														<span class="ti ti-edit"></span>
													</a>
													@else
													{{__('general.white_logo')}}
													@endif
												</label>
											</label>
											<div action="/upload" class="dropzone needsclick" id="white-logo-dropzone-basic">
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
									<h5 class="mb-4 mt-4">3. {{__('general.socials_links')}}</h5>
									<div class="row g-3">
										<div class="col-sm-4">
											<input name="facebook" type="text" id="facebook" v-model="facebook" class="form-control" placeholder="{{__('general.Facebook')}}" />
										</div>
										<div class="col-sm-4">
											<input name="behance" type="text" id="behance" v-model="behance" class="form-control" placeholder="{{__('general.Behance')}}" />
										</div>
										<div class="col-sm-4">
											<input name="instgram" type="text" id="instgram" v-model="instgram" class="form-control" placeholder="{{__('general.Instgram')}}" />
										</div>
										<div class="col-sm-4">
											<input name="youtube" type="text" id="youtube" v-model="youtube" class="form-control" placeholder="{{__('general.youtube')}}" />
										</div>
										<div class="col-sm-4">
											<input name="whatsapp" type="text" id="whatsapp" v-model="whatsapp" class="form-control" placeholder="{{__('general.whatsapp')}}" />
										</div>
										<div class="col-sm-4">
											<input name="snapchat" type="text" id="snapchat" v-model="snapchat" class="form-control" placeholder="{{__('general.snapchat')}}" />
										</div>
										<div class="col-sm-4">
											<input name="tiktok" type="text" id="tiktok" v-model="tiktok" class="form-control" placeholder="{{__('general.tiktok')}}" />
										</div>
										<div class="col-sm-4">
											<input name="twitter" type="text" id="twitter" v-model="twitter" class="form-control" placeholder="{{__('general.twitter')}}" />
										</div>
										<div class="col-sm-4">
											<input name="linkedin" type="text" id="linkedin" v-model="linkedin" class="form-control" placeholder="{{__('general.linkedin')}}" />
										</div>
									</div>
									<h5 class="mb-4 mt-4">3. {{__('general.Contact Us')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<label class="form-label" for="fullname">{{__('general.Title')}}</label>

											<input name="contact_title" type="text" id="contact_title" v-model="contact_title" class="form-control" placeholder="{{__('general.Title')}}" />
										</div>
										<div class="col-sm-12">
											<label class="form-label" for="fullname">{{__('general.content')}}</label>

											<textarea name="contact_content" type="text" id="contact_content" v-model="contact_content" rows="3" class="form-control" placeholder="{{__('general.content')}}">
											</textarea>
										</div>
									</div>
									<hr />
									<h5 class="mb-4 mt-4">4. {{__('general.reviews')}}</h5>
									<div class="col-sm-12">
										<label class="form-label mb-2" for="address">
											<label class="form-label mb-2" for="address">
												@if($review_image)
												<a target="_blank" href="/uploads/{{$review_image}}" style="padding:0" class="btn">
													{{__('general.review_image')}}
													<span class="ti ti-edit"></span>
												</a>
												@else
												{{__('general.review_image')}}
												@endif
											</label>
										</label>
										<div action="/upload" class="dropzone needsclick" id="review-image">
											<div class="dz-message needsclick">
												{{__('general.Drop files here or click to upload')}}
											</div>
											<div class="fallback">
												<input name="file" type="file" />
											</div>
										</div>
									</div>
									<hr />
									<h5 class="mb-4 mt-4">5. {{__('general.Term & Conditions')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<div id="term-and-condition-editor">
											</div>
										</div>
									</div>
									<hr />
									<h5 class="mb-4 mt-4">6. {{__('general.Privacy policy')}}</h5>
									<div class="row g-3">
										<div class="col-sm-12">
											<div id="privacy-policy-editor">
											</div>
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
	let uploadedBlackLogoFiles = [];
	let uploadedWhiteLogoFiles = [];
	let uploadedReviewImageFiles = [];
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
		mounted: () => {
			setTimeout(() => {
				termAndConditionEditor.root.innerHTML = @json($term_and_condition);
				privacyPolicyEditor.root.innerHTML = @json($privacy_policy);
			}, 100)
		},
		data: {
			loading: false,
			id: @json($id),
			app_name_ar: @json($app_name_ar),
			app_name_en: @json($app_name_en),
			address: @json($address),
			email: @json($email),
			contact_title: @json($contact_title),
			contact_content: @json($contact_content),
			term_and_condition: @json($term_and_condition),
			privacy_policy: @json($privacy_policy),
			phone: @json($phone),
			black_logo: @json($black_logo),
			review_image: @json($review_image),
			white_logo: @json($white_logo),
			facebook: @json($facebook),
			behance: @json($behance),
			instgram: @json($instgram),
			linkedin: @json($linkedin),
			youtube: @json($youtube),
			whatsapp: @json($whatsapp),
			snapchat: @json($snapchat),
			tiktok: @json($tiktok),
			twitter: @json($twitter),
		},
		methods: {
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						if (uploadedBlackLogoFiles.length != 0) {
							formData.append('black_logo', uploadedBlackLogoFiles[0]);
						}
						if (termAndConditionEditor.root.innerHTML == "<p><br></p>") {
							const toastAnimationExample = document.querySelector(`.term-and-condition-editor-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						if (privacyPolicyEditor.root.innerHTML == "<p><br></p>") {
							const toastAnimationExample = document.querySelector(`.privacy-policy-editor-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						formData.append('app_name_ar', this.app_name_ar);
						formData.append("term_and_condition", termAndConditionEditor.root.innerHTML);
						formData.append("privacy_policy", privacyPolicyEditor.root.innerHTML);
						formData.append('contact_title', this.contact_title);
						formData.append('contact_content', this.contact_content);
						formData.append('app_name_en', this.app_name_en);
						formData.append('address', this.address);
						formData.append('email', this.email);
						formData.append('phone', this.phone);
						formData.append('facebook', this.facebook);
						formData.append('behance', this.behance);
						formData.append('instgram', this.instgram);
						formData.append('linkedin', this.linkedin);
						formData.append('youtube', this.youtube);
						formData.append('whatsapp', this.whatsapp);
						formData.append('snapchat', this.snapchat);
						formData.append('tiktok', this.tiktok);
						formData.append('twitter', this.twitter);
						if (uploadedBlackLogoFiles.length == 0 && !this.id) {
							const toastAnimationExample = document.querySelector(`.black-image-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						if (uploadedWhiteLogoFiles.length != 0) {
							formData.append('white_logo', uploadedWhiteLogoFiles[0]);
						}
						if (uploadedWhiteLogoFiles.length == 0 && !this.id) {
							const toastAnimationExample = document.querySelector(`.white-image-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}

						if (uploadedReviewImageFiles.length != 0) {
							formData.append('review_image', uploadedReviewImageFiles[0]);
						}
						if (uploadedReviewImageFiles.length == 0 && !this.id) {
							const toastAnimationExample = document.querySelector(`.review-image-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}

						this.loading = true;
						axios.post(`${baseUrl}/admin/web-setting`, formData).then(res => {
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
			contact_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			contact_content: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			app_name_ar: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},

			app_name_en: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			address: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			email: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			phone: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			facebook: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			behance: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			instgram: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			linkedin: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			youtube: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			whatsapp: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			snapchat: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			tiktok: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			twitter: {
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
	const fullToolbar = [
		[{
				font: []
			},
			{
				size: []
			}
		],
		['bold', 'italic', 'underline', 'strike'],
		[{
				color: []
			},
			{
				background: []
			}
		],
		[{
				script: 'super'
			},
			{
				script: 'sub'
			}
		],
		[{
				header: '1'
			},
			{
				header: '2'
			},
			'blockquote',
			'code-block'
		],
		[{
				list: 'ordered'
			},
			{
				list: 'bullet'
			},
			{
				indent: '-1'
			},
			{
				indent: '+1'
			}
		],
		[{
			direction: 'rtl'
		}],
		['link', 'image', 'video', 'formula'],
		['clean']
	];
	const termAndConditionEditor = new Quill('#term-and-condition-editor', {
		bounds: '#term-and-condition-editor',
		modules: {
			formula: true,
			toolbar: fullToolbar
		},

		theme: 'snow'
	});

	const privacyPolicyEditor = new Quill('#privacy-policy-editor', {
		bounds: '#privacy-policy-editor',
		modules: {
			formula: true,
			toolbar: fullToolbar
		},

		theme: 'snow'
	});
	const blackLogoDropzoneBasic = document.querySelector('#black-logo-dropzone-basic');
	if (blackLogoDropzoneBasic) {
		const myDropzone = new Dropzone(blackLogoDropzoneBasic, {
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
							uploadedBlackLogoFiles.push(files[key]);
						}
					}
				});
			},
			removedfile: function(file) {
				var name = file.name;
				let index = uploadedBlackLogoFiles.findIndex((e) => e == file);
				uploadedBlackLogoFiles.splice(index, 1);
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			}
		});
	}
	const whiteLogoDropzoneBasic = document.querySelector('#white-logo-dropzone-basic');
	if (whiteLogoDropzoneBasic) {
		const myDropzone = new Dropzone(whiteLogoDropzoneBasic, {
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
							uploadedWhiteLogoFiles.push(files[key]);
						}
					}
				});
			},
			removedfile: function(file) {
				var name = file.name;
				let index = uploadedWhiteLogoFiles.findIndex((e) => e == file);
				uploadedWhiteLogoFiles.splice(index, 1);
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			}
		});
	}
	const reviewImage = document.querySelector('#review-image');
	if (reviewImage) {
		const myDropzone = new Dropzone(reviewImage, {
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
							uploadedReviewImageFiles.push(files[key]);
						}
					}
				});
			},
			removedfile: function(file) {
				var name = file.name;
				let index = uploadedReviewImageFiles.findIndex((e) => e == file);
				uploadedReviewImageFiles.splice(index, 1);
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