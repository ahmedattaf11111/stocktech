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

	<div class="bs-toast toast image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The image is required')}}</div>
	</div>

	<div class="bs-toast toast about-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.about is required')}}</div>
	</div>

	<div class="bs-toast toast skill-content-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.skill content is required')}}</div>
	</div>
	<div class="bs-toast toast experience-content-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.experience content is required')}}</div>
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
			<h5 class="offcanvas-title" id="exampleModalLabel">{{__('general.New Member')}}</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="col-sm-12">

		</div>
		<div class="row offcanvas-body flex-grow-1">

			<form style="padding-right: 0 !important;padding-left: 0 !important;" class="add-new-record" id="form-add-new-record" @submit.prevent="save">
				<div class="card-cont">
					<h6>{{__('general.Basic information')}}</h6>
					<div class="col-sm-12">
						<div class="mb-2">
							<label class="form-label" for="basicFullname">{{__('general.Full Name')}}</label>
							<input v-model="name" type="text" id="name" class="form-control dt-full-name" name="name" placeholder="{{__('general.John Doe')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
						</div>
					</div>
					<div class="col-sm-12">
						<div class="mb-2">
							<label class="form-label" for="basicPost">{{__('general.Job')}}</label>
							<input v-model="job" type="text" id="job" name="job" class="form-control dt-post" placeholder="{{__('general.Web Developer')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
						</div>
					</div>
					<div class="col-sm-12">
						<h5 class="card-header">
							<label class="form-label" for="basicPost">{{__('general.about')}}</label>
						</h5>
						<div class="card-body">
							<div id="full-editor">
							</div>
						</div>
					</div>

				</div>
				<div class="card-cont mt-3">
					<h6>{{__('general.Socials')}}</h6>
					<div class="row">
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.Facebook')}}</label>
								<input v-model="first_link" type="text" id="first_link" name="first_link" class="form-control dt-post" placeholder="{{__('general.Facebook')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.Behance')}}</label>

								<input v-model="second_link" type="text" id="second_link" name="second_link" class="form-control dt-post" placeholder="{{__('general.Behance')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.Instgram')}}</label>
								<input v-model="third_link" type="text" id="third_link" name="third_link" class="form-control dt-post" placeholder="{{__('general.Instgram')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
					</div>
				</div>
				<div class="card-cont mt-3">
					<h6>{{__('general.skills')}}</h6>
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.skill')}}</label>
								<input v-model="skill_one" type="text" id="skill_one" name="skill_one" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.rate')}}</label>

								<input v-model="skill_one_rate" type="text" id="skill_one_rate" name="skill_one_rate" class="form-control dt-post" placeholder="{{__('general.rate')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.skill')}}</label>
								<input v-model="skill_tow" type="text" id="skill_tow" name="skill_tow" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.rate')}}</label>
								<input v-model="skill_tow_rate" type="text" id="skill_tow_rate" name="skill_tow_rate" class="form-control dt-post" placeholder="{{__('general.rate')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.skill')}}</label>
								<input v-model="skill_three" type="text" id="skill_three" name="skill_three" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.rate')}}</label>
								<input v-model="skill_three_rate" type="text" id="skill_three_rate" name="skill_three_rate" class="form-control dt-post" placeholder="{{__('general.rate')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-12">
							<h5 class="card-header">
								<label class="form-label" for="basicPost">{{__('general.content')}}</label>
							</h5>
							<div class="card-body">
								<div id="skill-content-full-editor">
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="card-cont mt-3">
					<h6>{{__('general.experience')}}</h6>
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.experience')}}</label>
								<input v-model="experience_one" type="text" id="experience_one" name="experience_one" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.duration')}}</label>
								<input v-model="experience_one_duration" type="text" id="experience_one_duration" name="experience_one_duration" class="form-control dt-post" placeholder="{{__('general.duration')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.experience')}}</label>
								<input v-model="experience_tow" type="text" id="experience_tow" name="experience_tow" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.duration')}}</label>
								<input v-model="experience_tow_duration" type="text" id="experience_tow_duration" name="experience_tow_duration" class="form-control dt-post" placeholder="{{__('general.duration')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.experience')}}</label>
								<input v-model="experience_three" type="text" id="experience_three" name="experience_three" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.duration')}}</label>

								<input v-model="experience_three_duration" type="text" id="experience_three_duration" name="experience_three_duration" class="form-control dt-post" placeholder="{{__('general.duration')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.experience')}}</label>
								<input v-model="experience_four" type="text" id="experience_four" name="experience_four" class="form-control dt-post" placeholder="{{__('general.Name')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-2">
								<label class="form-label" for="basicPost">{{__('general.duration')}}</label>
								<input v-model="experience_four_duration" type="text" id="experience_four_duration" name="experience_four_duration" class="form-control dt-post" placeholder="{{__('general.duration')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
							</div>
						</div>
						<div class="col-sm-12">
							<h5 class="card-header">
								<label class="form-label" for="basicPost">{{__('general.content')}}</label>
							</h5>
							<div class="card-body">
								<div id="experience-content-full-editor">
								</div>
							</div>
						</div>

					</div>
				</div>
			</form>

			<div class="card-cont mt-3">
				<h6>{{__('general.image')}}</h6>

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
				@if(auth()->user()->can('super admin')||auth()->user()->can('update team'))
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
			<h4 class="py-3 mb-4"><span class="text-muted fw-light">{{__('general.Website')}} /</span> {{__('general.Team List')}}</h4>
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
							@if(auth()->user()->can('super admin')||auth()->user()->can('create team'))

							<button @click="onAddClicked" data-bs-target="#add-new-record" data-bs-toggle='offcanvas' class="create-new btn  waves-effect waves-light">
								<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">{{__('general.Add member')}}</span>
							</button>
							@endif
						</div>

						<div class="search-cntrl">
							@if(auth()->user()->can('super admin')||auth()->user()->can('delete team'))
							<a @click="onDeleteClicked(ids)" v-if="ids.length" @click="show(item)" href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm me-2"></i></a>
							@endif
							<input @keyup.enter="search" v-model="text" placeholder="{{__('general.Search team')}}" class="form-control" />
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
								<th>{{__('general.Member')}}</th>
								<th>{{__('general.Name')}}</th>
								<th>{{__('general.Job')}}</th>
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
											<a target="_blank" :href="`/uploads/${item.image}`">
												<img class="table-image" :src="`/uploads/${item.image}`" />
											</a>
											<div class="info">
												<div class="text-body text-wrap fw-medium">@{{translate("name", item.name, "Team", item.id)}}</div>
												<div class="text-muted text-truncate mb-0 d-none d-sm-block job">@{{translate("job", item.name, "Team", item.id)}}</div>
											</div>

										</div>
									</td>
									<td>@{{translate("name", item.name, "Team", item.id)}}</td>
									<td>@{{translate("job", item.name, "Team", item.id)}}</td>
									<td>
										<div class="d-flex align-items-center">
											<a data-bs-target="#add-new-record" data-bs-toggle='offcanvas' @click="show(item)" href="javascript:;" class="text-body">
												<i class="ti ti-{{auth()->user()->can('super admin')||auth()->user()->can('update team')?'edit':'eye'}} ti-sm me-2"></i>
											</a>
											@if(auth()->user()->can('super admin')||auth()->user()->can('delete team'))
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
			dictionaries: @json($dictionaries),
			lang: @json(app() -> getLocale()),
			ids: [],
			loading: false,
			text: "",
			page: 1,
			page_size: 10,
			message: 'Hello Vue!',
			items: @json($items),
			name: "",
			job: "",
			id: "",
			first_link: "",
			second_link: "",
			third_link: "",
			skill_one: "",
			skill_one_rate: "",
			skill_tow: "",
			skill_tow_rate: "",
			skill_three: "",
			skill_three_rate: "",

			experience_one: "",
			experience_one_duration: "",
			experience_tow: "",
			experience_tow_duration: "",
			experience_three: "",
			experience_three_duration: "",
			experience_four: "",
			experience_four_duration: "",
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
						axios.post(`${baseUrl}/admin/teams/multi-delete`, {
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
				axios.get(`${baseUrl}/admin/teams/data?page=${this.page}&page_size=${this.page_size}&text=${this.text}`).then(res => {
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
				fv.resetForm();
				this.id = item.id;
				this.name = this.translate("name", item.name, "Team", this.id);
				this.job = this.translate("job", item.job, "Team", this.id);
				this.first_link = this.translate("first_link", item.first_link, "Team", this.id);
				this.second_link = this.translate("second_link", item.second_link, "Team", this.id);
				this.third_link = this.translate("third_link", item.third_link, "Team", this.id);

				this.skill_one = this.translate("skill_one", item.skill_one, "Team", this.id);
				this.skill_one_rate = this.translate("skill_one_rate", item.skill_one_rate, "Team", this.id);
				this.skill_tow = this.translate("skill_tow", item.skill_tow, "Team", this.id);
				this.skill_tow_rate = this.translate("skill_tow_rate", item.skill_tow_rate, "Team", this.id);
				this.skill_three = this.translate("skill_three", item.skill_three, "Team", this.id);
				this.skill_three_rate = this.translate("skill_three_rate", item.skill_three_rate, "Team", this.id);

				this.experience_one = this.translate("experience_one", item.experience_one, "Team", this.id);
				this.experience_one_duration = this.translate("experience_one_duration", item.experience_one_duration, "Team", this.id);
				this.experience_tow = this.translate("experience_tow", item.experience_tow, "Team", this.id);
				this.experience_tow_duration = this.translate("experience_tow_duration", item.experience_tow_duration, "Team", this.id);
				this.experience_three = this.translate("experience_three", item.experience_three, "Team", this.id);
				this.experience_three_duration = this.translate("experience_three_duration", item.experience_three_duration, "Team", this.id);
				this.experience_four = this.translate("experience_four", item.experience_four, "Team", this.id);
				this.experience_four_duration = this.translate("experience_four_duration", item.experience_four_duration, "Team", this.id);

				fullEditor.root.innerHTML = this.translate("about", item.about, "Team", this.id);

				skillContentFullEditor.root.innerHTML = this.translate("skill_content", item.skill_content, "Team", this.id);
				experienceContentFullEditor.root.innerHTML = this.translate("experience_content", item.experience_content, "Team", this.id);

				uploadedFiles = [];
			},
			onAddClicked() {
				fv.resetForm();
				this.name = "";
				this.job = "";
				this.id = "";
				this.first_link = "";
				this.second_link = "";
				this.third_link = "";
				this.skill_one = "";
				this.skill_one_rate = "";
				this.skill_tow = "";
				this.skill_tow_rate = "";
				this.skill_three = "";
				this.skill_three_rate = "";

				this.experience_one = "";
				this.experience_one_duration = "";
				this.experience_tow = "";
				this.experience_tow_duration = "";
				this.experience_three = "";
				this.experience_three_duration = "";
				this.experience_four = "";
				this.experience_four_duration = "";

				fullEditor.root.innerHTML = "";
				skillContentFullEditor.root.innerHTML = "";
				experienceContentFullEditor.root.innerHTML = "";
				uploadedFiles = [];
			},
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						formData.append("name", this.name);
						formData.append("job", this.job);
						formData.append("first_link", this.first_link);
						formData.append("second_link", this.second_link);
						formData.append("third_link", this.third_link);
						formData.append("about", fullEditor.root.innerHTML);

						formData.append("skill_one", this.skill_one);
						formData.append("skill_one_rate", this.skill_one_rate);
						formData.append("skill_tow", this.skill_tow);
						formData.append("skill_tow_rate", this.skill_tow_rate);
						formData.append("skill_three", this.skill_three);
						formData.append("skill_three_rate", this.skill_three_rate);
						formData.append("skill_content", skillContentFullEditor.root.innerHTML);

						formData.append("experience_one", this.experience_one);
						formData.append("experience_one_duration", this.experience_one_duration);
						formData.append("experience_tow", this.experience_tow);
						formData.append("experience_tow_duration", this.experience_tow_duration);
						formData.append("experience_three", this.experience_three);
						formData.append("experience_three_duration", this.experience_three_duration);
						formData.append("experience_four", this.experience_four);
						formData.append("experience_four_duration", this.experience_four_duration);
						formData.append("experience_content", experienceContentFullEditor.root.innerHTML);

						if (uploadedFiles.length) {
							formData.append("image", uploadedFiles[0]);
						}
						if (fullEditor.root.innerHTML == "<p><br></p>") {
							const toastAnimationExample = document.querySelector(`.about-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}

						if (skillContentFullEditor.root.innerHTML == "<p><br></p>") {
							const toastAnimationExample = document.querySelector(`.skill-content-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}

						if (experienceContentFullEditor.root.innerHTML == "<p><br></p>") {
							const toastAnimationExample = document.querySelector(`.experience-content-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						if (!this.id) {
							if (uploadedFiles.length == 0) {
								const toastAnimationExample = document.querySelector(`.image-toast-ex`);
								toastAnimationExample.querySelector('.ti').classList.add("text-danger");
								toastAnimation = new bootstrap.Toast(toastAnimationExample);
								toastAnimation.show();
								return;
							}
							this.loading = true;
							axios.post(`${baseUrl}/admin/teams`, formData).then(res => {
								this.loading = false;
								this.name = "";
								this.job = "";
								$("#cancel-modal").click();
								this.page = 1;
								this.getItems("create");
							})
						} else {
							this.loading = true;
							axios.post(`${baseUrl}/admin/teams/${this.id}`, formData).then(res => {
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
				maxFiles: 1,
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
				job: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				first_link: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				second_link: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				third_link: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				skill_one: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				skill_one_rate: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				skill_tow: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				skill_tow_rate: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				skill_three: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				skill_three_rate: {
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
				experience_one_duration: {
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
				experience_tow_duration: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				experience_three: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				experience_three_duration: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				experience_four: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				experience_four_duration: {
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




	// Full Toolbar
	// --------------------------------------------------------------------
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
	const fullEditor = new Quill('#full-editor', {
		bounds: '#full-editor',
		modules: {
			formula: true,
			toolbar: fullToolbar
		},

		theme: 'snow'
	});
	const skillContentFullEditor = new Quill('#skill-content-full-editor', {
		bounds: '#skill-content-full-editor',
		modules: {
			formula: true,
			toolbar: fullToolbar
		},

		theme: 'snow'
	});
	const experienceContentFullEditor = new Quill('#experience-content-full-editor', {
		bounds: '#experience-content-full-editor',
		modules: {
			formula: true,
			toolbar: fullToolbar
		},

		theme: 'snow'
	});
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