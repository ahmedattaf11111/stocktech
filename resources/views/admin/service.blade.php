@extends('layouts.admin')
@section('content')
<div id="app" class="pd-ltr-20 xs-pd-20-10">
	<!-- Content wrapper -->
	<div class="bs-toast toast delete-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Success')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.item has been deleted successfully')}}</div>
	</div>
	<div class="modal fade" id="paymentMethods" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
			<div class="modal-content p-3 p-md-5">
				<div class="modal-body">
					<button @click="onManageImageClose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<div class="text-center mb-4">
						<h3 class="mb-3">{{__('general.Manage item images')}}</h3>
						<p class="text-muted">{{__('general.You can delete or show images')}}</p>
					</div>
					<div v-for="image in images" class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
						<div class="d-flex gap-2 align-items-center">
							<img style="object-fit: cover;border-radius: 2px;" :src="`/uploads/${image}`" class="img-fluid w-px-50 h-px-30" alt="visa-card" />
						</div>
						<h6 class="m-0 d-none d-sm-block">
							<button v-if="images.length>1" @click="deleteImage(image)" type="button" class="btn btn-icon" style="box-shadow:none !important">
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
	<div class="bs-toast toast image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The image is required')}}</div>
	</div>


	<div class="bs-toast toast create-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Success')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The item has created successfully')}}</div>
	</div>
	<div class="bs-toast toast update-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Success')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The item has updated successfully')}}</div>
	</div>

	<!-- Modal to add new record -->
	<div class="offcanvas offcanvas-end" id="add-new-record">
		<div class="offcanvas-header border-bottom">
			<h5 class="offcanvas-title" id="exampleModalLabel">{{__('general.New Review')}}</h5>
			<button type="button" class="btn-close canvase-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="col-sm-12">

		</div>
		<div class="row offcanvas-body flex-grow-1">

			<form style="padding-right: 0 !important;padding-left: 0 !important;" class="add-new-record" id="form-add-new-record" @submit.prevent="save">
				<div class="card-cont">
					<h6>{{__('general.Basic information')}}</h6>
					<div class="col-sm-12">
						<div class="mb-2">
							<label class="form-label" for="basicFullname">{{__('general.Name')}}</label>
							<input v-model="name" type="text" id="name" class="form-control dt-full-name" name="name" placeholder="{{__('general.Name')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
						</div>
					</div>
					<div class="col-sm-12">
						<div class="mb-2">
							<label class="form-label" for="address">{{__('general.description')}}</label>
							<textarea name="description" class="form-control" id="description" v-model="description" rows="2" placeholder="{{__('general.description')}}"></textarea>
						</div>
					</div>
				</div>
				<div class="card-cont mt-3">
					<h6>{{__('general.Details')}}</h6>
					<div class="col-sm-12">
						<div class="mb-2">
							<label class="form-label" for="address">{{__('general.content')}}</label>
							<textarea name="detail_content" class="form-control" id="detail_content" v-model="detail_content" rows="3" placeholder="{{__('general.content')}}"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.point')}}</label>
								<input v-model="detail_point_one" type="text" id="detail_point_one" class="form-control dt-full-name" name="detail_point_one" placeholder="{{__('general.point')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.point')}}</label>
								<input v-model="detail_point_tow" type="text" id="detail_point_tow" class="form-control dt-full-name" name="detail_point_tow" placeholder="{{__('general.point')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.point')}}</label>
								<input v-model="detail_point_three" type="text" id="detail_point_three" class="form-control dt-full-name" name="detail_point_three" placeholder="{{__('general.point')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.point')}}</label>
								<input v-model="detail_point_four" type="text" id="detail_point_four" class="form-control dt-full-name" name="detail_point_four" placeholder="{{__('general.point')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.point')}}</label>
								<input v-model="detail_point_five" type="text" id="detail_point_five" class="form-control dt-full-name" name="detail_point_five" placeholder="{{__('general.point')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.point')}}</label>
								<input v-model="detail_point_six" type="text" id="detail_point_six" class="form-control dt-full-name" name="detail_point_six" placeholder="{{__('general.point')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
					</div>

				</div>
			</form>
			<div class="card-cont mt-3">
				<h6>
					{{__('general.images')}}
					<button @click="onManageImageOpen" v-if="images.length" style="padding:0" type="button" class="btn mx-2" data-bs-toggle="modal" data-bs-target="#paymentMethods">
						<span class="ti ti-edit"></span>
					</button>
				</h6>
				<div class="col-sm-12">
					<div class="card-body">
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

			<div class="col-sm-12 mt-4 mb-2" style="padding-right: 0;padding-left:0">
				@if(auth()->user()->can('super admin')||auth()->user()->can('update service'))
				<button form="form-add-new-record" :disabled="loading" type="submit" class="btn save me-sm-3 me-1">
					<template v-if="!loading">{{__('general.Save')}}</template>
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
				<button id="cancel-modal" type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">{{__('general.Cancel')}}</button>
			</div>
		</div>
	</div>
	<!--/ DataTable with Buttons -->
	<div class="content-wrapper">

		<!-- Content -->
		<div class="container-xxl flex-grow-1 container-p-y">
			<h4 class="py-3 mb-4"><span class="text-muted fw-light">{{__('general.Website')}} /</span> {{__('general.Service List')}}</h4>
			<!-- DataTable with Buttons -->
			<div class="card">
				<div class="card-datatable table-responsive pt-0">
					<div class="data-table-header">
						<div class="actions">
							<label style="margin-top:10px">{{__('general.Show')}} :</label>
							<select v-model="page_size" @change="changPageSize()" style="padding: 0 7px;">
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
							</select>
							@if(auth()->user()->can('super admin')||auth()->user()->can('view service'))
							<button @click="onAddClicked" data-bs-target="#add-new-record" data-bs-toggle='offcanvas' class="create-new btn  waves-effect waves-light">
								<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">{{__('general.Add service')}}</span>
							</button>
							@endif
						</div>
						<div class="search-cntrl">
							@if(auth()->user()->can('super admin')||auth()->user()->can('delete service'))
							<a @click="onDeleteClicked(ids)" v-if="ids.length" @click="show(item)" href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm me-2"></i></a>
							@endif

							<input @keyup.enter="search" v-model="text" placeholder="{{__('general.Search review')}}" class="form-control" />
						</div>
					</div>
					<table class="table border-top">
						<thead>
							<tr>
								<th>
									<label class="form-check-label custom-option-content" for="parent-check">
										<input @change="setAllIds" style="width: 18px;height: 17px;" class="form-check-input" type="checkbox" value="" id="parent-check" :checked="ids.length==items.data.length && items.data.length>0" />
									</label>
								</th>
								<th>#{{__('general.ID')}}</th>
								<th>{{__('general.Service')}}</th>
								<th>{{__('general.Name')}}</th>
								<th>{{__('general.Action')}}</th>
							</tr>
						</thead>
						<template v-if="!loading&&items.data.length">
							<tbody>
								<tr v-for="item in items.data">
									<td>
										<label class="form-check-label custom-option-content" :for="`customCheckTemp-${item.id}`">
											<input class="form-check-input" :checked="ids.includes(item.id)" type="checkbox" @change="setIds(item.id)" :id="`customCheckTemp-${item.id}`" />
										</label>
									</td>
									<td>#@{{item.id}}</td>
									<td>
										<div class="image">
											<a target="_blank" :href="`/uploads/${item.images[0]}`">
												<img class="table-image" :src="`/uploads/${item.images[0]}`" />
											</a>
											<div class="info">
												<div class="text-body text-wrap fw-medium">@{{translate('name',item.name,'Service',item.id)}}</div>
											</div>
										</div>
									</td>
									<td>@{{translate('name',item.name,'Service',item.id)}}</td>
									<td>
										<div class="d-flex align-items-center">
											<a data-bs-target="#add-new-record" data-bs-toggle='offcanvas' @click="show(item)" href="javascript:;" class="text-body">
												<i class="ti ti-{{auth()->user()->can('super admin')||auth()->user()->can('update service')?'edit':'eye'}} ti-sm me-2"></i>
											</a>
											@if(auth()->user()->can('super admin')||auth()->user()->can('delete service'))
											<a @click="onDeleteClicked([item.id])" href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a>
											@endif
										</div>
									</td>
								</tr>
							</tbody>
						</template>
						<template v-if="loading">
							<tbody>
								<tr>
									<td colspan="20">
										<div class="d-flex justify-content-center">
											<div class="sk-chase sk-primary">
												<div class="sk-chase-dot"></div>
												<div class="sk-chase-dot"></div>
												<div class="sk-chase-dot"></div>
												<div class="sk-chase-dot"></div>
												<div class="sk-chase-dot"></div>
												<div class="sk-chase-dot"></div>
											</div>
										</div>

									</td>
								</tr>
							</tbody>
						</template>
						<template v-if="!loading&&items.data.length==0">
							<tbody>
								<tr class="text-center">
									<td colspan="20">
										{{__('general.EmptyData')}}
									</td>
								</tr>
							</tbody>
						</template>
					</table>
					<div class="d-flex justify-content-between mx-3" style="align-items:center">
						<div class="entries">
							{{__('general.Showing')}} @{{1+(page-1)*(page_size)}} {{__('general.to')}} @{{page * page_size}} {{__('general.of')}} @{{items.total}}
						</div>
						<paginate :container-class="'pagination-vue'" v-model="page" :page-count="Math.ceil(items.total/page_size)" :click-handler="getItems" prev-text="{{__('general.Previous')}}" next-text="{{__('general.Next')}}">
						</paginate>
					</div>
				</div>
			</div>


		</div>
		<!-- / Content -->


		<div class="content-backdrop fade"></div>
	</div>
	<!-- Content wrapper -->
</div>
@push('js')

<script>
	let uploadedFiles = [];
	Vue.component('paginate', VuejsPaginate);
	new Vue({
		el: "#app",
		components: {},
		data: {
			ids: [],
			loading: false,
			dictionaries: @json($dictionaries),
			lang: @json(app() -> getLocale()),
			text: "",
			page: 1,
			page_size: 10,
			message: 'Hello Vue!',
			items: @json($items),
			name: "",
			id: "",
			description: "",
			detail_content: "",
			detail_point_one: "",
			detail_point_tow: "",
			detail_point_three: "",
			detail_point_four: "",
			detail_point_five: "",
			detail_point_six: "",
			images: [],
			item: null,
		},

		methods: {
			translate(key, def, className = null, model_id = null) {
				let dic = null;
				if (className) {
					dic = this.dictionaries.filter((elm) => {
						return elm.lang == this.lang && elm.key == key && elm.class == className && elm.model_id == model_id;
					});
				} else {
					dic = this.dictionaries.filter((elm) => {
						return elm.lang == this.lang && elm.key == key;
					});
				}
				return dic.length ? dic[0].value : def;
			},

			onManageImageOpen() {
				$(".canvase-close").click();
			},
			onManageImageClose() {
				//event.preventDefault()
				event.stopPropagation();
				var myOffcanvas = document.getElementById('add-new-record');
				var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
				bsOffcanvas.show()
			},
			deleteImage(image) {
				this.loading = true;
				axios.delete(`${baseUrl}/admin/services/delete-image/${this.id}/${image}`).then(res => {
					this.images = res.data;
					this.loading = false;
					this.item.images = this.images;
					const toastAnimationExample = document.querySelector(`.delete-toast-ex`);
					toastAnimationExample.querySelector('.ti').classList.add("text-primary");
					toastAnimation = new bootstrap.Toast(toastAnimationExample);
					toastAnimation.show();
				}).catch((res) => {
					this.loading = false;
				})
			},
			setAllIds() {
				if (this.ids.length == this.items.data.length) {
					this.ids = [];
				} else {
					let ids = [];
					this.items.data.forEach(item => {
						ids.push(item.id);
					});
					this.ids = ids;

				}
			},
			setIds(id) {
				let index = -1;
				this.ids.forEach((_id, _index) => {
					if (id == _id) {
						index = _index;
						return;
					}
				});
				if (index > -1) {
					this.ids.splice(index, 1);
				} else {
					this.ids.push(id);
				}
			},
			onDeleteClicked(ids) {
				Swal.fire({
					title: @json(__('general.Are you sure?')),
					text: @json(__('general.You wont be able to revert this!')),
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: @json(__('general.Yes, delete it!')),
					cancelButtonText: @json(__('general.Cancel')),
					customClass: {
						confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
						cancelButton: 'btn btn-label-secondary waves-effect waves-light'
					},
					buttonsStyling: false
				}).then((result) => {
					if (result.value) {
						axios.post(`${baseUrl}/admin/services/multi-delete`, {
							ids: ids
						}).then(res => {
							this.ids = this.ids.filter(id => {
								return !ids.includes(id);
							})
							if (this.page > 1 && this.items.data.length == 1) {
								this.page--;
							}
							this.getItems("delete");
						})

					} else if (result.dismiss === Swal.DismissReason.cancel) {

					}
				});
			},
			changPageSize() {
				setTimeout(() => {
					this.page = 1;
					this.getItems();
				}, 100);
			},
			search() {
				this.page = 1;
				this.getItems();
			},
			getItems(action = "") {
				this.loading = true;
				axios.get(`${baseUrl}/admin/services/data?page=${this.page}&page_size=${this.page_size}&text=${this.text}`).then(res => {
					this.items = res.data;
					this.loading = false;
					if (action) {
						const toastAnimationExample = document.querySelector(`.${action}-toast-ex`);
						toastAnimationExample.querySelector('.ti').classList.add("text-primary");
						toastAnimation = new bootstrap.Toast(toastAnimationExample);
						toastAnimation.show();
						if(action=="create" ||action=="update"){
							this.getDictionaries();
						}
					}
				})
			},
			getDictionaries() {
				axios.get(`${baseUrl}/dictionaries`).then(res => {
					this.dictionaries = res.data;
				})
			},
			show(item) {
				fv.resetForm();
				this.item = item;
				this.id = item.id;
				this.name = this.translate("name",item.name, "Service", this.id);
				this.description = this.translate("description",item.description, "Service", this.id);
				this.detail_content = this.translate("detail_content",item.detail_content, "Service", this.id);
				this.detail_point_one = this.translate("detail_point_one",item.detail_point_one,"Service", this.id);
				this.detail_point_tow = this.translate("detail_point_tow",item.detail_point_tow,"Service", this.id);
				this.detail_point_three = this.translate("detail_point_three",item.detail_point_three,"Service", this.id);
				this.detail_point_four = this.translate("detail_point_four",item.detail_point_four,"Service", this.id);
				this.detail_point_five = this.translate("detail_point_five",item.detail_point_five,"Service", this.id);
				this.detail_point_six = this.translate("detail_point_six",item.detail_point_six,"Service", this.id);
				this.images = item.images;
				uploadedFiles = [];
			},
			onAddClicked() {
				fv.resetForm();
				this.item = null;
				this.id = "";
				this.name = "";
				this.description = "";
				this.detail_content = "";
				this.detail_point_one = "";
				this.detail_point_tow = "";
				this.detail_point_three = "";
				this.detail_point_four = "";
				this.detail_point_five = "";
				this.detail_point_six = "";
				this.images = [];
				uploadedFiles = [];
			},
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						formData.append("name", this.name);
						formData.append("description", this.description);
						formData.append("detail_content", this.detail_content);
						formData.append("detail_point_one", this.detail_point_one);
						formData.append("detail_point_tow", this.detail_point_tow);
						formData.append("detail_point_three", this.detail_point_three);
						formData.append("detail_point_four", this.detail_point_four);
						formData.append("detail_point_five", this.detail_point_five);
						formData.append("detail_point_six", this.detail_point_six);
						uploadedFiles.forEach((file, index) => {
							formData.append(`images[${index}]`, file);
						})
						if (!this.id) {
							if (uploadedFiles.length == 0) {
								const toastAnimationExample = document.querySelector(`.image-toast-ex`);
								toastAnimationExample.querySelector('.ti').classList.add("text-danger");
								toastAnimation = new bootstrap.Toast(toastAnimationExample);
								toastAnimation.show();
								return;
							}
							this.loading = true;
							axios.post(`${baseUrl}/admin/services`, formData).then(res => {
								this.loading = false;
								$("#cancel-modal").click();
								this.page = 1;
								this.getItems("create");
							})
						} else {
							this.loading = true;
							axios.post(`${baseUrl}/admin/services/${this.id}`, formData).then(res => {
								this.loading = false;
								$("#cancel-modal").click();
								this.page = 1;
								this.getItems("update");
							})
						}

					}
				});

			},
		}
	});
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

	// ? Start your code from here

	// Basic Dropzone
	// --------------------------------------------------------------------
	document.addEventListener('DOMContentLoaded', function(e) {
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
		const formAddNewRecord = document.getElementById('form-add-new-record');
		fv = FormValidation.formValidation(formAddNewRecord, {
			fields: {
				name: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				description: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_content: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_point_one: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_point_tow: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_point_three: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_point_four: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_point_five: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				detail_point_six: {
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
	})
	/**
	 * Form Editors
	 */
</script>

@endpush
@push('css')
<style>
	.save {
		background-color: var(--bs-primary) !important;
		color: #fff !important;
	}

	.create-new {
		background-color: var(--bs-primary) !important;
		color: #fff !important;
	}

	.text-body[href]:hover i {
		color: var(--bs-primary) !important;
	}

	.dz-message {
		font-size: 1.325rem;
	}

	.offcanvas-header {
		background: #fff;
	}

	.offcanvas-body {
		padding: 15px 23px !important;
	}

	.input-group:focus {
		box-shadow: none !important;
	}

	table .image {
		align-items: center;
		gap: 9px;
		display: flex;
	}

	table .image .info .job {
		font-size: 12px;
	}

	table .image img {
		background: #f2f2f3 !important;
		width: 2.375rem;
		height: 2.375rem;
		object-fit: cover;
		border-radius: 5px;
		padding: 3px;
	}

	form .form-control {
		padding: 0.722rem 0.875rem !important;
	}

	.input-group {
		margin-bottom: 10px;
	}

	.card-cont {
		background: #fff;
		padding: 27px;
		border-radius: 5px;
	}

	#add-new-record {
		width: 50%;
		background: #f8f7fa;
	}

	.actions {
		display: flex;
		gap: 10px;
	}

	.actions select {
		border: 1px solid #dbdade;
		border-radius: .376em;
		width: 80px;

	}

	.search-cntrl {
		display: flex;
		gap: 14px;
		align-items: center;
	}

	.data-table-header {
		display: flex;
		padding: 20px;
		justify-content: space-between;
	}

	.entries {
		margin-top: 12px;
		color: #a5a3ae;
		font-size: 14px;
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
</style>
@endpush
@endsection