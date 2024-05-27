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

	<div class="bs-toast toast roles-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.Roles is required')}}</div>
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

	<div class="bs-toast toast permissions-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.The permissions is required')}}</div>
	</div>


	<div class="bs-toast toast name-token-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
		<div class="toast-header">
			<i class="ti ti-bell ti-xs me-2"></i>
			<div class="me-auto fw-medium">{{__('general.Error')}}</div>
			<small class="text-muted">{{__('general.one seconds ago')}}</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">{{__('general.Name token')}}</div>
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
						<h3 class="mb-2">{{__('general.New Employee')}}</h3>
						<p class="text-muted">{{__('general.Add a new user and attach it to a roles')}}</p>
					</div>
					<form id="form-add-new-record" class="row g-3" @submit.prevent="save">
						<div class="col-sm-12">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.Name')}}</label>
								<input v-model="name" type="text" id="name" class="form-control dt-full-name" name="name" placeholder="{{__('general.Name')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.Email')}}</label>
								<input v-model="email" type="text" id="email" class="form-control dt-full-name" name="email" placeholder="{{__('general.Enter your email')}}" aria-label="John Doe" aria-describedby="basicFullname2" />
							</div>
						</div>

						<div class="col-sm-12">
							<div style="position: relative;" class="mb-2">
								<label class="form-label" for="basicFullname">{{__('general.Password')}}</label>
								<input :type="show_password?'text':'password'" v-model="password" type="text" id="password" class="form-control dt-full-name" name="password" placeholder="********" aria-label="John Doe" aria-describedby="basicFullname2" />
								<button class="show-password" type="button" @click="show_password=!show_password"><i :class="`fa fa-${show_password?'eye-slash':'eye'}`"></i></button>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="mb-2">
								<label for="roleSelect" class="form-label">{{__('general.Roles')}}</label>
								<div>
									<select id="roleSelect" class="select2 form-select" multiple="multiple">
										<option :selected="roles_ids.includes(role.id)" v-for="role in roles" :value="role.id">
											@{{role.name}}
										</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<label class="form-label">{{__('general.image')}}</label>
							<div class="card-body">
								<div action="/upload" class="dropzone needsclick" id="dropzone-basic">
									<div class="dz-message needsclick">
										{{__('general.Drop files here or click to upload')}}
									</div>
									<div class="fallback">
										<input name="file" type="file" />
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 text-center">
							@if(auth()->user()->can('super admin')||auth()->user()->can('update employee'))
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
							@endif
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

			<h4 class="mb-4">{{__('general.Roles & Users List')}}</h4>

			<p class="mb-4">
				{{__('general.A role provided access to predefined menus and features so that depending on')}} <br />
				{{__('general.assigned role an administrator can have access to what user needs.')}}
			</p>
			<!-- Role cards -->
			<div class="row g-4 mb-4">
				<template v-if="loadingRole">
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
				</template>
				<template v-else>
					<div v-for="role in itemsRole.data" class="col-xl-4 col-lg-6 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<h6 class="fw-normal mb-2">{{__('general.Total')}} @{{role.users?role.users.length:0}} {{__('general.Users')}}</h6>
									<ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
										<li v-for="user in role.users" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" :title="user.name" class="avatar avatar-sm pull-up">
											<img class="rounded-circle" :src="`/uploads/${user.image}`" alt="Avatar" />
										</li>
									</ul>
								</div>
								<div class="d-flex justify-content-between align-items-end mt-1">
									<div class="role-heading">
										<h4 class="mb-1">@{{role.name}}</h4>
										<a @click="showRole(role)" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>{{auth()->user()->can('super admin')||auth()->user()->can('update employee')?__('general.Edit Role'):__('general.Show Role')}}</span></a>
									</div>
									@if(auth()->user()->can('super admin')||auth()->user()->can('delete employee'))
									<a @click="onDeleteClickedRole(role.id)" href="javascript:void(0);" class="text-muted"><i class="ti ti-trash ti-md"></i></a>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="card h-100">
							<div class="row h-100">
								<div class="col-sm-5">
									<div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
										<img src="/admin/assets/img/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
									</div>
								</div>
								<div class="col-sm-7">
									<div class="card-body text-sm-end text-center ps-sm-0">
										<button @click="prev" :disabled="pageRole==1" style="padding: 0 5px;margin-bottom:5px" class="btn"><i class="fa-solid fa-chevron-{{app()->getLocale()=='en'?'left':'right'}}"></i></button>
										@if(auth()->user()->can('super admin')||auth()->user()->can('create employee'))
										<button @click="onAddClickedRole" data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role">
											{{__('general.Add New Role')}}
										</button>
										@endif
										<button :disabled="pageRole==itemsRole.last_page" @click="next" style="padding: 0 5px;margin-bottom:5px" class="btn"><i class="fa-solid fa-chevron-{{app()->getLocale()=='en'?'right':'left'}}"></i></button>
										<p class="mb-0 mt-1">{{__('general.Add role, if it does not exist')}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</template>


			</div>
			<!--/ Role cards -->

			<!-- Add Role Modal -->
			<!-- Add Role Modal -->
			<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
					<div class="modal-content p-3 p-md-5">
						<button type="button" class="btn-close btn-pinned role-form-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="modal-body">
							<div class="text-center mb-4">
								<h3 class="role-title mb-2">{{__('general.Add New Role')}}</h3>
								<p class="text-muted">{{__('general.Set role permissions')}}</p>
							</div>
							<!-- Add role form -->
							<form id="addRoleForm" class="row g-3">
								<div class="col-12 mb-4">
									<label class="form-label" for="modalRoleName">{{__('general.Role Name')}}</label>
									<input v-model="role_name" type="text" id="role_name" name="role_name" class="form-control" placeholder="{{__('general.Enter a role name')}}" tabindex="-1" />
								</div>
								<div class="col-12">
									<h5>{{__('general.Role Permissions')}}</h5>
									<!-- Permission table -->
									<div class="table-responsive">
										<table class="table table-flush-spacing">
											<tbody>
												<template v-for="permission in permissions">

													<tr v-if="permission.module">
														<td class="text-nowrap fw-medium">
															@if(app()->getLocale()=='ar')
															@{{permission.name_ar}}
															@else
															@{{permission.name_en}}
															@endif
															<i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i>
														</td>
														<td>
															<div class="form-check">
																<input :checked="checkSelectAll(permission)" @change="selectAll(permission)" class="form-check-input" type="checkbox" :id="`selectAll-${permission.module_value}`" />
																<label class="form-check-label" :for="`selectAll-${permission.module_value}`">{{__('general.Select All')}}</label>
															</div>
														</td>
													</tr>
													<tr v-else>

														<td class="text-nowrap fw-medium">
															@if(app()->getLocale()=='ar')
															@{{permission.name_ar}}
															@else
															@{{permission.name_en}}
															@endif

														</td>
														<td>

															<div class="d-flex">
																<div v-for="operation in permission.operations" class="form-check me-3 me-lg-5">
																	<input :checked="selected_permissions.includes(operation.value)" @change="addToPermissions(operation)" :disabled="operation.notfound" class="form-check-input" type="checkbox" :id="`checkbox-${operation.value}`" />
																	<label class="form-check-label" :for="`checkbox-${operation.value}`">
																		@if(app()->getLocale()=='ar')
																		@{{operation.name_ar}}
																		@else
																		@{{operation.name_en}}
																		@endif
																	</label>
																</div>
															</div>
														</td>
													</tr>
												</template>

											</tbody>
										</table>
									</div>
									<!-- Permission table -->
								</div>
								<div class="col-12 text-center">
									@if(auth()->user()->can('super admin')||auth()->user()->can('update employee'))
									<button @click="saveRole" type="submit" class="btn btn-primary me-sm-3 me-1">
										<template v-if="!loadingRole">{{__('general.Save')}}</template>
										<template v-if="loadingRole">
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
									<button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">
										{{__('general.Cancel')}}
									</button>
								</div>
							</form>
							<!--/ Add role form -->
						</div>
					</div>
				</div>
			</div>
			<!--/ Add Role Modal -->

			<!-- / Add Role Modal -->

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
							</button> -->
							<div class="search-cntrl">
								<input @keyup.enter="search" v-model="text" placeholder="{{__('general.Search employees')}}" class="form-control" />
							</div>

						</div>
						<div>
							@if(auth()->user()->can('super admin')||auth()->user()->can('delete employee'))
							<a style="margin-top: 2px;" @click="onDeleteClicked(ids)" v-if="ids.length" @click="show(item)" href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm me-2"></i></a>
							@endif
							@if(auth()->user()->can('super admin')||auth()->user()->can('create employee'))
							<a data-bs-toggle="modal" data-bs-target="#form-add-new-record" @click.prevent="onAddClicked" class="btn">
								<i class="ti ti-plus me-sm-1"></i>
							</a>
							@endif
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
								<th>{{__('general.Employee')}}</th>
								<th>{{__('general.Roles')}}</th>
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
											<a target="_blank" :href="`/uploads/${item.image}`">
												<img class="table-image" :src="`/uploads/${item.image}`" />
											</a>
											<div class="info">
												<div class="text-body text-wrap fw-medium">@{{item.name}}</div>
												<div style="font-size: 11px!important" class="text-muted">@{{item.email}}</div>
											</div>
										</div>
									</td>

									<td>
										<template v-if="item.roles.length">
											<span v-for="role in item.roles" style="font-size: 11px!important;font-weight:bold;margin:0 2px" class="badge rounded-pill bg-label-secondary">
												@{{role.name}}
											</span>
										</template>
										<span v-else style="font-size: 11px!important;font-weight:bold;margin:0 2px" class="badge rounded-pill bg-label-secondary">
											N/A
										</span>
									</td>
									<td>
										<div style="position: relative;bottom: 7px;" class="demo-vertical-spacing">
											<label class="switch">
												<input @change="toggleStatus(item.id)" type="checkbox" class="switch-input is-valid" :checked="item.status" />
												<span class="switch-toggle-slider">
													<span class="switch-on"></span>
													<span class="switch-off"></span>
												</span>
											</label>
										</div>
									</td>

									<td>
										<div class="d-flex align-items-center">
											<a data-bs-target="#form-add-new-record" data-bs-toggle='modal' @click="show(item)" href="javascript:;" class="text-body">
												<i class="ti ti-{{auth()->user()->can('super admin')||auth()->user()->can('update employee')?'edit':'eye'}} ti-sm me-2"></i>
											</a>
											@if(auth()->user()->can('super admin')||auth()->user()->can('delete employee'))
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
	function initSelect2() {

		$(function() {
			const selectPicker = $('.selectpicker'),
				select2 = $('.select2'),
				select2Icons = $('.select2-icons');

			// Bootstrap Select
			// --------------------------------------------------------------------
			if (selectPicker.length) {
				selectPicker.selectpicker();
			}

			// Select2
			// --------------------------------------------------------------------

			// Default
			if (select2.length) {
				select2.each(function() {
					var $this = $(this);
					$this.wrap('<div class="position-relative"></div>').select2({
						placeholder: "{{__('general.Select value')}}",
						dropdownParent: $this.parent()
					});
				});
			}

			// Select2 Icons
			if (select2Icons.length) {
				// custom template to render icons
				function renderIcons(option) {
					if (!option.id) {
						return option.text;
					}
					var $icon = "<i class='" + $(option.element).data('icon') + " me-2'></i>" + option.text;

					return $icon;
				}
				select2Icons.wrap('<div class="position-relative"></div>').select2({
					dropdownParent: select2Icons.parent(),
					templateResult: renderIcons,
					templateSelection: renderIcons,
					escapeMarkup: function(es) {
						return es;
					}
				});
			}
		});
	}
	initSelect2();
</script>
<script>
	let uploadedFiles = [];
	Vue.component('paginate', VuejsPaginate);
	new Vue({
		el: "#app",
		mounted() {
			$('#roleSelect').on('change', () => {
				var data = $("#roleSelect option:selected");
				let ids = [];
				for (const [key, value] of Object.entries(data)) {
					if (Number.isInteger(parseInt(key))) {
						ids.push(data[key].getAttribute("value"));
					}
				}
				this.roles_ids = ids;
			});
		},
		components: {},
		data: {
			ids: [],
			loading: false,
			loadingRole: false,
			text: "",
			page: 1,
			pageRole: 1,
			page_size: 10,
			page_size_role: 5,
			message: 'Hello Vue!',
			items: @json($items),
			itemsRole: @json($itemsRole),
			role_name: "",
			show_password: false,
			id: "",
			name: "",
			password: "",
			email: "",
			roles_ids: [],
			roles: @json($roles),
			role_id: "",
			selected_permissions: [],
			permissions: [{
					name_ar: "محتوى الويب",
					name_en: "Web Content",
					module: true,
					module_value: "web content",
					expanded: true,
				},
				{
					name_ar: "الفريق",
					name_en: "Team",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create team",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update team",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete team",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view team",
							module: "web content",
						},

					],
				},
				{
					name_ar: "اراء العملاء",
					name_en: "Review",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create review",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update review",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete review",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view review",
							module: "web content",
						},

					],
				},
				{
					name_ar: "شركاء النجاح",
					name_en: "Partner",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create partner",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update partner",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete partner",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view partner",
							module: "web content",
						},

					],
				},
				{
					name_ar: "المستخدمين",
					name_en: "User",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							notfound: true
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update user",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete user",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view user",
							module: "web content",
						},

					],
				},
				{
					name_ar: "الخدمات",
					name_en: "Service",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create service",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update service",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete service",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view service",
							module: "web content",
						},

					],
				},

				{
					name_ar: "الوظائف",
					name_en: "Career",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create career",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update career",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete career",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view career",
							module: "web content",
						},

					],
				},
				{
					name_ar: "فرق الوظايف",
					name_en: "Career Team",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create career-team",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update career-team",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete career-team",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view career-team",
							module: "web content",
						},

					],
				},
				{
					name_ar: "انواع الوظايف",
					name_en: "Career Type",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create career-type",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update career-type",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete career-type",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view career-type",
							module: "web content",
						},

					],
				},
				{
					name_ar: "التطبيقات",
					name_en: "Application",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							notfound: true,

						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							notfound: true,
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete application",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view application",
							module: "web content",
						},

					],
				},
				{
					name_ar: "المقالات",
					name_en: "Blogs",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create blog",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update blog",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete blog",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view blog",
							module: "web content",
						},

					],
				},
				{
					name_ar: "فئات المقالات",
					name_en: "Blog Category",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create blog-category",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update blog-category",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete blog-category",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view blog-category",
							module: "web content",
						},

					],
				},
				{
					name_ar: "اشارات المقالات",
					name_en: "Blog Tag",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create blog-tag",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update blog-tag",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete blog-tag",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view blog-tag",
							module: "web content",
						},

					],
				},
				{
					name_ar: "المشاريع",
					name_en: "Projects",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create project",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update project",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete project",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view project",
							module: "web content",
						},

					],
				},
				{
					name_ar: "فئات المشاريع",
					name_en: "Project Category",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create project-category",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update project-category",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete project-category",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view project-category",
							module: "web content",
						},

					],
				},
				{
					name_ar: "الاسئلة المكررة",
					name_en: "FAQS",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create faq",
							module: "web content",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update faq",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete faq",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view faq",
							module: "web content",
						},

					],
				},
				{
					name_ar: "الصفحة الرئيسية",
					name_en: "Home",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							notfound: true
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update home",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							notfound: true
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view home",
							module: "web content",
						},

					],
				},
				{
					name_ar: "نبذه عن الشركة",
					name_en: "About",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							notfound: true
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update about",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							notfound: true
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view about",
							module: "web content",
						},

					],
				},
				{
					name_ar: "الاعدادات",
					name_en: "Setting",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							notfound: true
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update setting",
							module: "web content",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							notfound: true
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view setting",
							module: "web content",
						},

					],
				},
				{
					name_ar: "تواصل معنا",
					name_en: "Contact",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							notfound: true
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							notfound: true
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete contact",
							module: "web content",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view contact",
							module: "web content",
						},
					],
				},
				{
					name_ar: "الادارة",
					name_en: "Administration",
					module: true,
					module_value: "admin",
					expanded: false,
				},
				{
					name_ar: "الموظفين",
					name_en: "Employee",
					operations: [{
							name_en: "Create",
							name_ar: "اضافة",
							value: "create employee",
							module: "admin",
						},
						{
							name_en: "Update",
							name_ar: "تعديل",
							value: "update employee",
							module: "admin",
						},
						{
							name_en: "Delete",
							name_ar: "حذف",
							value: "delete employee",
							module: "admin",
						},
						{
							name_en: "Read",
							name_ar: "قراءة",
							value: "view employee",
							module: "admin",
						},

					],
				},
			]
		},
		methods: {
			checkSelectAll(module) {
				let allPermCount = 0;
				let selectedPermCount = 0;

				setTimeout(() => {

					this.permissions.forEach(perm => {
						if (!perm.operations) return;
						perm.operations.forEach(op => {
							if (op.module == module.module_value) {
								allPermCount++;
							}
							if (this.selected_permissions.includes(op.value)) {
								selectedPermCount++;
							}
						});
					})
					console
					if (allPermCount == 0 && selectedPermCount == 0) return false;
					return allPermCount == selectedPermCount;
				}, 500)
			},
			toggleStatus(id) {
				this.loading = true;
				axios.post(`${baseUrl}/admin/employees/toggle-status/${id}`).then(res => {
					this.loading = false;
					this.getItems('update');
				})
			},
			selectAll(module) {
				module.selectAll = !module.selectAll;
				if (module.selectAll) {
					this.permissions.forEach(perm => {
						if (!perm.module) {
							perm.operations.forEach(op => {
								if (op.module == module.module_value && !op.notfound && !this.selected_permissions.includes(op.value)) {
									this.selected_permissions.push(op.value);
								}
							})
						}
					})
				} else {
					this.permissions.forEach(perm => {
						if (!perm.module) {
							perm.operations.forEach(op => {
								if (op.module == module.module_value) {
									let index = this.selected_permissions.indexOf(op.value);
									if (index > -1) {
										this.selected_permissions.splice(index, 1);
									}
								}
							})
						}
					})
				}
			},
			prev() {
				this.pageRole--;
				this.getItemsRole();
			},
			next() {
				this.pageRole++;
				this.getItemsRole();
			},
			addToPermissions(operation) {
				let index = this.selected_permissions.indexOf(operation.value);
				if (index > -1) {
					this.selected_permissions.splice(index, 1);
				} else {
					this.selected_permissions.push(operation.value);
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
						axios.post(`${baseUrl}/admin/employees/multi-delete`, {
							ids: ids
						}).then(res => {
							this.ids = this.ids.filter(id => {
								return !ids.includes(id);
							})
							if (this.page > 1 && this.items.data.length == 1) {
								this.page--;
							}
							this.getItems("delete");
							this.getItemsRole();
						})

					} else if (result.dismiss === Swal.DismissReason.cancel) {

					}
				});
			},
			onDeleteClickedRole(id) {
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
						axios.delete(`${baseUrl}/admin/employees/destroy-role/${id}`).then(res => {
							if (this.pageRole > 1 && this.itemsRole.data.length == 1) {
								this.pageRole--;
							}
							this.getItemsRole("delete");
							this.getAllRoles();
							this.getItems();
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
				axios.get(`${baseUrl}/admin/employees/data?page=${this.page}&page_size=${this.page_size}&text=${this.text}`).then(res => {
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
			getItemsRole(action = "") {
				this.loadingRole = true;
				axios.get(`${baseUrl}/admin/employees/role-data?page=${this.pageRole}&page_size=${this.page_size_role}`).then(res => {
					this.itemsRole = res.data;
					this.loadingRole = false;
					if (action) {
						const toastAnimationExample = document.querySelector(`.${action}-toast-ex`);
						toastAnimationExample.querySelector('.ti').classList.add("text-primary");
						toastAnimation = new bootstrap.Toast(toastAnimationExample);
						toastAnimation.show();
					}
				})
			},
			getAllRoles() {
				axios.get(`${baseUrl}/admin/employees/all-roles`).then(res => {
					this.roles = res.data;
				})
			},
			show(item) {
				fv.resetForm();
				this.name = item.name;
				this.password = item.password;
				this.email = item.email;
				this.roles_ids = item.roles.map(r => r.id);
				this.id = item.id;
				setTimeout(() => {
					initSelect2();
				}, 100)
				fv.disableValidator('password');

				uploadedFiles = [];
			},
			showRole(item) {
				fvRole.resetForm();
				this.role_name = item.name;
				this.selected_permissions = item.permissions.map(p => p.name);
				this.role_id = item.id;
			},

			onAddClicked() {
				fv.resetForm();
				this.name = "";
				this.password = "";
				this.email = "";
				this.roles_ids = "";
				uploadedFiles = [];
				setTimeout(() => {
					initSelect2();
				}, 100)
				fv.enableValidator('password');
				this.id = "";
			},
			onAddClickedRole() {
				fvRole.resetForm();
				this.role_name = "";
				this.selected_permissions = [];
				this.role_id = "";
			},
			save() {
				fv.validate().then((status) => {
					if (status != "Invalid") {
						let formData = new FormData();
						formData.append("name", this.name);
						if (this.password) {
							formData.append("password", this.password);
						}
						formData.append("email", this.email);
						this.roles_ids.forEach((id, index) => {
							formData.append(`roles[${index}]`, id);
						})
						if (this.roles_ids.length == 0) {
							const toastAnimationExample = document.querySelector(`.roles-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;

						}

						if (uploadedFiles.length) {
							formData.append("image", uploadedFiles[0]);
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
							axios.post(`${baseUrl}/admin/employees`, formData).then(res => {
								this.loading = false;
								this.name = "";
								$(".btn-reset").click();
								this.page = 1;
								this.getItems("create");
								this.getItemsRole();
							})
						} else {
							this.loading = true;
							axios.post(`${baseUrl}/admin/employees/${this.id}`, formData).then(res => {
								this.loading = false;
								$(".btn-reset").click();
								this.getItemsRole();
								this.page = 1;
								this.getItems("update");
							})
						}

					}
				});

			},

			saveRole() {
				fvRole.validate().then((status) => {
					if (status != "Invalid") {
						if (this.selected_permissions.length == 0) {
							const toastAnimationExample = document.querySelector(`.permissions-toast-ex`);
							toastAnimationExample.querySelector('.ti').classList.add("text-danger");
							toastAnimation = new bootstrap.Toast(toastAnimationExample);
							toastAnimation.show();
							return;
						}
						if (!this.role_id) {
							this.loadingRole = true;
							axios.post(`${baseUrl}/admin/employees/store-role`, {
								name: this.role_name,
								permissions: this.selected_permissions,
							}).then(res => {
								this.loadingRole = false;
								$('.role-form-close').click();
								this.pageRole = 1;
								this.getItemsRole('create');
								this.getAllRoles();
							}).catch(() => {
								this.loadingRole = false;
								const toastAnimationExample = document.querySelector(`.name-token-toast-ex`);
								toastAnimationExample.querySelector('.ti').classList.add("text-danger");
								toastAnimation = new bootstrap.Toast(toastAnimationExample);
								toastAnimation.show();
							})
						} else {
							this.loadingRole = true;
							axios.post(`${baseUrl}/admin/employees/update-role/${this.role_id}`, {
								name: this.role_name,
								permissions: this.selected_permissions,
							}).then(res => {
								this.loading = false;
								$('.role-form-close').click();
								this.getItemsRole('update');
								this.getAllRoles();
								this.getItems();
							}).catch(() => {
								this.loadingRole = false;
								const toastAnimationExample = document.querySelector(`.name-token-toast-ex`);
								toastAnimationExample.querySelector('.ti').classList.add("text-danger");
								toastAnimation = new bootstrap.Toast(toastAnimationExample);
								toastAnimation.show();
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

	document.addEventListener('DOMContentLoaded', function(e) {
		const formAddNewRecord = document.getElementById('form-add-new-record');
		const roleForm = document.getElementById('addRoleForm');

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
					var _ref;
					return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
				}
			});
		}

		fv = FormValidation.formValidation(formAddNewRecord, {
			fields: {
				name: {
					validators: {
						notEmpty: {
							message: @json(__('general.the field is required'))
						}
					}
				},
				password: {
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
		fvRole = FormValidation.formValidation(roleForm, {
			fields: {
				role_name: {
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
	[dir=ltr] .show-password {
		border: none;
		position: absolute;
		right: 12px;
		bottom: 11px;
		font-size: 14px;
		color: gray;
		padding: 0;
		background: none;
	}

	[dir=rtl] .show-password {
		border: none;
		position: absolute;
		left: 12px;
		bottom: 11px;
		font-size: 14px;
		color: gray;
		padding: 0;
		background: none;
	}

	.switch-input.is-valid:checked~.switch-toggle-slider {
		background-color: var(--bs-primary) !important;
		border-color: var(--bs-primary) !important;
	}

	.switch-input.is-valid~.switch-toggle-slider {
		border-color: #c9c8ce !important;

	}

	.form-control::placeholder {
		font-size: .9rem !important;

	}

	.dz-message {
		font-size: 1rem !important;
		margin: 9rem 0 3rem !important;
	}

	#dropzone-basic {
		padding: 0 !important;
	}

	.select2-selection {
		padding: 5px;
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