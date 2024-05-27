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
	<div class="bs-toast toast image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The image is required')}}</div>
	</div>

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="py-3 mb-4 ">
			<span class="text-muted fw-light">{{__('general.Forms')}} / </span>{{__('general.About')}}
		</h4>
		<!-- Sticky Actions -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
						<h5 class="card-title mb-sm-0 me-2">{{__('general.About Form')}}</h5>
						<div class="action-btns">
							@if(auth()->user()->can('super admin')||auth()->user()->can('update about'))
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
					<div class="modal fade" id="paymentMethods" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
							<div class="modal-content p-3 p-md-5">
								<div class="modal-body">
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									<div class="text-center mb-4">
										<h3 class="mb-3">{{__('general.Manage item images')}}</h3>
										<p class="text-muted">{{__('general.You can delete or show images')}}</p>
									</div>
									<div v-for="image in images" class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
										<div class="d-flex gap-2 align-items-center">
											<img style="object-fit: cover;border-radius: 2px;" :src="`/uploads/${image}`" class="img-fluid w-px-50 h-px-30" alt="visa-card" />
										</div>
										<h6 class="m-0 d-none d-sm-block">
											<button @click="deleteImage(image)" type="button" class="btn btn-icon" style="box-shadow:none !important">
												<template v-if="!loading">
													<span class="ti ti-trash"></span>
												</template>
												<template v-if="loading">
													<div style="height:18px!important" class="sk-chase sk-primary">
														<div class="sk-chase-dot"></div>
														<div class="sk-chase-dot"></div>
														<div class="sk-chase-dot"></div>
														<div class="sk-chase-dot"></div>
														<div class="sk-chase-dot"></div>
														<div class="sk-chase-dot"></div>
													</div>
												</template>
											</button>
											<a target="_blank" :href="`/uploads/${image}`" style="box-shadow:none !important" type="button" class="btn btn-icon ">
												<span class="ti ti-search"></span>
											</a>
										</h6>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-8 mx-auto">
								<form id="form-add-new-record" @submit.prevent="save">
									<!-- 1. Delivery Address -->
									<h5 class="mb-4 mt-4">{{__('general.service_sec')}}</h5>
									<div class="row g-3">
										<div class="col-md-12">
											<label class="form-label" for="fullname">{{__('general.Title')}}</label>
											<input name="service_content" type="text" id="service_title" v-model="service_title" class="form-control" placeholder="{{__('general.Title')}}" />
										</div>
										<div class="col-12">
											<label class="form-label" for="address">{{__('general.content')}}</label>
											<textarea name="service_content" class="form-control" id="service_content" v-model="service_content" rows="2" placeholder="{{__('general.content')}}"></textarea>
										</div>
									</div>
									<hr />
									<h5 class="mb-4 mt-4 d-flex align-items-center">
										2. {{__('general.experience')}}
									</h5>
									<div class="row g-3">
										<div class="col-md-6">
											<label class="form-label" for="fullname">{{__('general.Experience')}}</label>
											<input name="experience_one" type="text" id="experience_one" v-model="experience_one" class="form-control" placeholder="{{__('general.Name')}}" />
										</div>
										<div class="col-md-6">
											<label class="form-label" for="fullname">{{__('general.rate')}}</label>
											<input name="experience_one_rate" type="text" id="experience_one_rate" v-model="experience_one_rate" class="form-control" placeholder="{{__('general.rate')}}" />
										</div>
										<div class="col-md-6">
											<label class="form-label" for="fullname">{{__('general.Experience')}}</label>
											<input name="experience_tow" type="text" id="experience_tow" v-model="experience_tow" class="form-control" placeholder="{{__('general.Name')}}" />
										</div>
										<div class="col-md-6">
											<label class="form-label" for="fullname">{{__('general.rate')}}</label>
											<input name="experience_tow_rate" type="text" id="experience_tow_rate" v-model="experience_tow_rate" class="form-control" placeholder="{{__('general.rate')}}" />
										</div>
										<div class="col-md-6">
											<label class="form-label" for="fullname">{{__('general.number')}}</label>
											<input name="experience_number" type="text" id="experience_number" v-model="experience_number" class="form-control" placeholder="{{__('general.number')}}" />
										</div>
										<div class="col-md-6">
											<label class="form-label" for="fullname">{{__('general.text')}}</label>
											<input name="experience_number_text" type="text" id="experience_number_text" v-model="experience_number_text" class="form-control" placeholder="{{__('general.text')}}" />
										</div>
										<div class="col-md-12">
											<label class="form-label" for="address">{{__('general.main_content')}}</label>
											<textarea name="experience_main_content" class="form-control" id="experience_main_content" v-model="experience_main_content" rows="2" placeholder="{{__('general.content')}}"></textarea>
										</div>
										<div class="col-md-12">
											<label class="form-label" for="address">{{__('general.second_content')}}</label>
											<textarea name="experience_second_content" class="form-control" id="experience_second_content" v-model="experience_second_content" rows="2" placeholder="{{__('general.content')}}"></textarea>
										</div>
									</div>
								</form>
								<hr />
								<h5 class="mb-4 mt-4 d-flex align-items-center">
									2. {{__('general.images')}}
									<button v-if="images.length" style="padding:0" type="button" class="btn mx-2" data-bs-toggle="modal" data-bs-target="#paymentMethods">
										<span class="ti ti-edit"></span>
									</button>

								</h5>
								<div class="row g-3">
									<div class="col-sm-12">
										<form action="/upload" class="dropzone needsclick" id="dropzone-basic">
											<div class="dz-message needsclick">
												{{__('general.Drop files here or click to upload')}}
											</div>
											<div class="fallback">
												<input name="file" type="file" />
											</div>
										</form>
									</div>
								</div>

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
	let uploadedFiles = [];
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
			id: @json($id),
			service_title: @json($service_title),
			service_content: @json($service_content),
			images: @json($images),
			experience_one: @json($experience_one),
			experience_one_rate: @json($experience_one_rate),
			experience_tow: @json($experience_tow),
			experience_tow_rate: @json($experience_tow_rate),
			experience_main_content: @json($experience_main_content),
			experience_second_content: @json($experience_second_content),
			experience_number: @json($experience_number),
			experience_number_text: @json($experience_number_text),
		},
		methods: {
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						formData.append("service_title", this.service_title);
						formData.append("service_content", this.service_content);
						formData.append("experience_one", this.experience_one);
						formData.append("experience_one_rate", this.experience_one_rate);
						formData.append("experience_tow", this.experience_tow);
						formData.append("experience_tow_rate", this.experience_tow_rate);
						formData.append("experience_main_content", this.experience_main_content);
						formData.append("experience_second_content", this.experience_second_content);
						formData.append("experience_number", this.experience_number);
						formData.append("experience_number_text", this.experience_number_text);
						uploadedFiles.forEach((file, index) => {
							formData.append(`images[${index}]`, file);
						})
						if (uploadedFiles.length == 0 && !this.id) {
							const toastAnimationExample = document.querySelector(`.image-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						this.loading = true;
						axios.post(`${baseUrl}/admin/about`, formData).then(res => {
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
			deleteImage(image) {
				this.loading = true;
				axios.delete(`${baseUrl}/admin/about/delete-image/${image}`).then(res => {
					this.loading = false;
					this.images = res.data;
					const toastAnimationExample = document.querySelector(`.delete-toast-ex`);
					toastAnimationExample.querySelector('.ti').classList.add("text-primary");
					toastAnimation = new bootstrap.Toast(toastAnimationExample);
					toastAnimation.show();
					if (this.images.length == 0) {
						$(".btn-close").click();
					}
				}).catch((res) => {
					this.loading = false;
				})
			},

		}
	});
	const formAddNewRecord = document.getElementById('form-add-new-record');
	fv = FormValidation.formValidation(formAddNewRecord, {
		fields: {
			service_title: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			service_content: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_one: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_one_rate: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_tow: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_tow_rate: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_main_content: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_second_content: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_number: {
				validators: {
					notEmpty: {
						message: @json(__('general.the field is required'))
					}
				}
			},
			experience_number_text: {
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
	const dropzoneBasic = document.querySelector('#dropzone-basic');
	if (dropzoneBasic) {
		const myDropzone = new Dropzone(dropzoneBasic, {
			previewTemplate: previewTemplate,
			parallelUploads: 1,
			maxFilesize: 5,
			addRemoveLinks: true,
			// maxFiles: 1,
			acceptedFiles: 'image/*',
			init: function() {
				this.on("addedfiles", (files) => {
					for (const key in files) {
						if (typeof files[key] == "object") {
							uploadedFiles.push(files[key]);
							console.log(uploadedFiles);
						}
					}
				});
			},
			removedfile: function(file) {
				var name = file.name;
				let index = uploadedFiles.findIndex((e) => e == file);
				uploadedFiles.splice(index, 1);
				console.log(uploadedFiles);
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