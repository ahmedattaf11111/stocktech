@extends('layouts.admin')
@section('content')
<div id="app" class="pd-ltr-20 xs-pd-20-10">
	<div class="modal fade" id="details" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
			<div class="modal-content p-3 p-md-5">
				<div class="modal-body">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<div class="text-center mb-4">
						<h3 class="mb-3">@{{name}}</h3>
						<p class="text-muted">@{{getUserType({user_type:user_type})}}
							<a class="text-danger mx-2" target="__blank" v-if="cv" :href="`/uploads/${cv}`">
								<i class="fa fa-file-pdf"></i> {{__('general.Resume')}}
							</a>
						</p>
					</div>

					<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
						<h6 class="m-0 mb-2 mb-sm-0 me-5">{{__('general.Phone')}}</h6>
						<div class="d-flex flex-wrap gap-2">
							@{{phone}}
						</div>
					</div>
					<div v-if="user_type=='Client'" class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
						<h6 class="m-0 mb-2 mb-sm-0 me-5">{{__('general.Industry')}}</h6>
						<div class="d-flex flex-wrap gap-2">
							@{{industry}}
						</div>
					</div>
					<div v-if="user_type=='Developer'" class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
						<h6 class="m-0 mb-2 mb-sm-0 me-5">{{__('general.linkedin')}}</h6>
						<div class="d-flex flex-wrap gap-2">
							<a target="__blank" :href="linkedin">
								@{{linkedin}}
							</a>
						</div>
					</div>

					<div v-if="user_type=='Client'" class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
						<h6 class="m-0 mb-2 mb-sm-0 me-5">{{__('general.Country')}}</h6>
						<div class="d-flex flex-wrap gap-2">
							@{{country.name}}
						</div>
					</div>
					<div v-if="user_type=='Developer'" class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom pb-3 mb-3">
						<h6 class="m-0 mb-2 mb-sm-0 me-5">{{__('general.Technology')}}</h6>
						<div class="d-flex flex-wrap gap-2">
							<span style="font-size: 11px!important;font-weight:bold" v-for="tech in technology.split(',')" class="badge rounded-pill bg-label-secondary">
								@{{tech}}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	<div class="bs-toast toast update-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Success')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The item has updated successfully')}}</div>
	</div>

	<!--/ DataTable with Buttons -->
	<div class="content-wrapper">

		<!-- Content -->
		<div class="container-xxl flex-grow-1 container-p-y">
			<h4 class="py-3 mb-4"><span class="text-muted fw-light">{{__('general.Website')}} /</span> {{__('general.User List')}}</h4>
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
							<!-- <button @click="onAddClicked" class="create-new btn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#form-add-new-record">
								<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">{{__('general.Add category')}}</span>
							</button>
							 -->
						</div>
						<div class="search-cntrl">
							@if(auth()->user()->can('super admin')||auth()->user()->can('delete user'))
							<a @click="onDeleteClicked(ids)" v-if="ids.length" @click="show(item)" href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm me-2"></i></a>
							@endif
							<input @keyup.enter="search" v-model="text" placeholder="{{__('general.Search user')}}" class="form-control" />
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
								<th>{{__('general.Name')}}</th>
								<th>{{__('general.Email')}}</th>
								<th>{{__('general.Status')}}</th>
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
											<a target="_blank" :href="`/web/assets/imgs/empty.jpg`">
												<img class="table-image" :src="`/web/assets/imgs/empty.jpg`" />
											</a>
											<div class="info">
												<div class="text-body text-wrap fw-medium">@{{item.name}}</div>
												<div style="font-size: 11px!important" class="text-muted">@{{getUserType(item)}}</div>
											</div>
										</div>
									</td>
									<td>@{{item.email}}</td>
									<td>
										<div style="position: relative;bottom: 7px;" class="demo-vertical-spacing">
											<label class="switch">
												<input data-checkperm="{{auth()->user()->can('super admin')||auth()->user()->can('update user')}}" @change="toggleStatus(item.id)" type="checkbox" class="switch-input is-valid" :checked="item.status" />
												<span class="switch-toggle-slider">
													<span class="switch-on"></span>
													<span class="switch-off"></span>
												</span>
											</label>
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<button :disabled="item.user_type=='Employee'" data-bs-toggle="modal" data-bs-target="#details" @click="show(item)" href="javascript:;" class="text-body btn" style="padding: 0;"><i class="ti ti-eye ti-sm me-2"></i></button>
											@if(auth()->user()->can('super admin')||auth()->user()->can('delete user'))
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
			ids: [],
			loading: false,
			text: "",
			page: 1,
			page_size: 10,
			items: @json($items),
			id: "",
			phone: "",
			technology: "",
			industry: "",
			cv: "",
			linkedin: "",
			country: "",
			user_type: "",
		},
		methods: {
			getUserType(item) {
				if (item.user_type == 'Employee') {
					return @json(__('general.Employee'))
				}
				if (item.user_type == 'Quick Guest') {
					return @json(__('general.Quick Guest'))
				}
				if (item.user_type == 'Developer') {
					return @json(__('general.Developer'))
				}
				if (item.user_type == 'Client') {
					return @json(__('general.Client'))
				}

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
						axios.post(`${baseUrl}/admin/users/multi-delete`, {
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
				axios.get(`${baseUrl}/admin/users/data?page=${this.page}&page_size=${this.page_size}&text=${this.text}`).then(res => {
					this.items = res.data;
					this.loading = false;
					if (action) {
						const toastAnimationExample = document.querySelector(`.${action}-toast-ex`);
						toastAnimationExample.querySelector('.ti').classList.add("text-primary");
						toastAnimation = new bootstrap.Toast(toastAnimationExample);
						toastAnimation.show();
					}
				})
			},
			toggleStatus(id) {
				if (!$(".switch-input").data("checkperm")) return;
				this.loading = true;
				axios.post(`${baseUrl}/admin/users/toggle-status/${id}`).then(res => {
					this.loading = false;
					this.getItems('update');
				})
			},
			show(item) {
				this.id = item.id;
				this.phone = item.phone;
				this.industry = item.industry;
				this.linkedin = item.linkedin;
				this.country = item.country;
				this.cv = item.cv;
				this.technology = item.technology;
				this.user_type = item.user_type;
				this.name = item.name;
			},
		}
	});
</script>

@endpush
@push('css')
<style>
	.switch-input.is-valid:checked~.switch-toggle-slider {
		background-color: var(--bs-primary) !important;
		border-color: var(--bs-primary) !important;
	}

	.switch-input.is-valid~.switch-toggle-slider {
		border-color: #c9c8ce !important;

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