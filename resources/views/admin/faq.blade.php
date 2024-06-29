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
	<div class="modal fade" id="form-add-new-record" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
			<div class="modal-content p-3 p-md-5">
				<div class="modal-body">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<div class="text-center mb-4">
						<h3 class="mb-2">{{__('general.New Faq')}}</h3>
						<p class="text-muted">{{__('general.Add new question with answer')}}</p>
					</div>
					<form id="form-add-new-record" class="row g-3" @submit.prevent="save">
						<div class="col-sm-12">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.question')}}</label>
								<input v-model="question" type="text" id="question" class="form-control dt-full-name" name="question" placeholder="{{__('general.question')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.answer')}}</label>
								<textarea v-model="answer" type="text" id="answer" class="form-control dt-full-name" name="answer" placeholder="{{__('general.answer')}}" aria-label="John Doe" aria-describedby="basicFullname2"></textarea>
							</div>
						</div>
						<div class="col-12 text-center">
							<button type="submit" class="btn btn-primary me-sm-3 me-1">
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
							<button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">
								{{__('general.Cancel')}}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--/ DataTable with Buttons -->
	<div class="content-wrapper">

		<!-- Content -->
		<div class="container-xxl flex-grow-1 container-p-y">
			<h4 class="py-3 mb-4"><span class="text-muted fw-light">{{__('general.Website')}} /</span> {{__('general.Faq List')}}</h4>
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
							@if(auth()->user()->can('super admin')||auth()->user()->can('create faq'))
							<button @click="onAddClicked" class="create-new btn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#form-add-new-record">
								<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">{{__('general.Add faq')}}</span>
							</button>
							@endif
						</div>
						<div class="search-cntrl">
							@if(auth()->user()->can('super admin')||auth()->user()->can('delete faq'))
							<a @click="onDeleteClicked(ids)" v-if="ids.length" @click="show(item)" href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm me-2"></i></a>
							@endif
							<input @keyup.enter="search" v-model="text" placeholder="{{__('general.Search faq')}}" class="form-control" />
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
								<th>{{__('general.question')}}</th>
								<th>{{__('general.answer')}}</th>
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
									<td>@{{translate("question", item.question, "Faq", item.id)}}</td>
									<td>@{{translate("answer", item.answer, "Faq", item.id)}}</td>
									<td>
										<div class="d-flex align-items-center">
											<a data-bs-target="#form-add-new-record" data-bs-toggle='modal' @click="show(item)" href="javascript:;" class="text-body">
												<i class="ti ti-{{auth()->user()->can('super admin')||auth()->user()->can('update faq')?'edit':'eye'}} ti-sm me-2"></i>
											</a>
											@if(auth()->user()->can('super admin')||auth()->user()->can('delete faq'))
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
	Vue.component('paginate', VuejsPaginate);
	new Vue({
		el: "#app",
		components: {},
		data: {
			dictionaries: @json($dictionaries),
			lang: @json(app() -> getLocale()),

			ids: [],
			loading: false,
			text: "",
			page: 1,
			page_size: 10,
			message: 'Hello Vue!',
			items: @json($items),
			question: "",
			answer: "",
			id: "",
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

			getDictionaries() {
				axios.get(`${baseUrl}/dictionaries`).then(res => {
					this.dictionaries = res.data;
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
						axios.post(`${baseUrl}/admin/faqs/multi-delete`, {
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
				axios.get(`${baseUrl}/admin/faqs/data?page=${this.page}&page_size=${this.page_size}&text=${this.text}`).then(res => {
					this.items = res.data;
					this.loading = false;
					if (action) {
						const toastAnimationExample = document.querySelector(`.${action}-toast-ex`);
						toastAnimationExample.querySelector('.ti').classList.add("text-primary");
						toastAnimation = new bootstrap.Toast(toastAnimationExample);
						toastAnimation.show();
						if (action == "create" || action == "update") {
							this.getDictionaries();
						}

					}
				})
			},
			show(item) {
				this.id = item.id;
				fv.resetForm();
				this.answer=this.translate("answer", item.answer, "Faq", this.id)
				this.question=this.translate("question", item.question, "Faq", this.id)
				uploadedFiles = [];
			},
			onAddClicked() {
				fv.resetForm();
				this.question = "";
				this.answer = "";
				this.id = "";
			},
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						formData.append("question", this.question);
						formData.append("answer", this.answer);
						if (!this.id) {
							this.loading = true;
							axios.post(`${baseUrl}/admin/faqs`, formData).then(res => {
								this.loading = false;
								$(".btn-reset").click();
								this.page = 1;
								this.getItems("create");
							})
						} else {
							this.loading = true;
							axios.post(`${baseUrl}/admin/faqs/${this.id}`, formData).then(res => {
								this.loading = false;
								$(".btn-reset").click();

								this.page = 1;
								this.getItems("update");
							})
						}

					}
				});

			},
		}
	});
	document.addEventListener('DOMContentLoaded', function(e) {
		const formAddNewRecord = document.getElementById('form-add-new-record');
		fv = FormValidation.formValidation(formAddNewRecord, {
			fields: {

				question: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				answer: {
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
	td {
		max-width: 100px;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

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