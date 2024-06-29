<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/admin/assets/" data-template="vertical-menu-template">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>{{translate($dictionaries, 'app_name_en',$web_app_name_en, 'WebSetting', $web_setting_id)}}</title>

	<meta name="description" content="" />

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="/uploads/{{$image}}" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

	<!-- Icons -->
	<link rel="stylesheet" href="/admin/assets/vendor/fonts/fontawesome.css" />
	<link rel="stylesheet" href="/admin/assets/vendor/fonts/tabler-icons.css" />
	<link rel="stylesheet" href="/admin/assets/vendor/fonts/flag-icons.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="/admin/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="/admin/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="/admin/assets/css/demo.css" />
	<link rel="stylesheet" href="/admin/assets/vendor/libs/spinkit/spinkit.css" />
	<link rel="stylesheet" href="/admin/assets/vendor/libs/toastr/toastr.css" />
	<!-- Vendors CSS -->
	<link rel="stylesheet" href="/admin/assets/vendor/libs/node-waves/node-waves.css" />
	<link rel="stylesheet" href="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="/admin/assets/vendor/libs/typeahead-js/typeahead.css" />
	<!-- Vendor -->
	<link rel="stylesheet" href="/admin/assets/vendor/libs/@form-validation/form-validation.css" />

	<!-- Page CSS -->
	<!-- Page -->
	<link rel="stylesheet" href="/admin/assets/vendor/css/pages/page-auth.css" />
	
	<!-- Helpers -->
	<script src="/admin/assets/vendor/js/helpers.js"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
	<script src="/admin/assets/vendor/js/template-customizer.js"></script>
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="/admin/assets/js/config.js"></script>
	<style>
		:root {
			--bs-primary: {{$color??'var(--bs-primary)'}}!important;
		}
		
		.input-group:focus-within .form-control, .input-group:focus-within .input-group-text ,input.form-control:focus{
    border-color: var(--bs-primary) !important;
}
	.sign-in{
		background-color: var(--bs-primary) !important;
		color: #fff !important;
	}
	.form-check-input:checked, .form-check-input[type=checkbox]:indeterminate {
    background-color: var(--bs-primary) !important;
    border-color: var(--bs-primary) !important;
}
.form-check-input:focus{
  border-color: var(--bs-primary) !important;

}
	</style>
</head>

<body>
	<!-- Content -->

	<div id="app" class="authentication-wrapper authentication-cover authentication-bg">
		<div class="authentication-inner row">
			<div class="bs-toast toast login-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
				<div class="toast-header">
					<i class="ti ti-bell ti-xs me-2"></i>
					<div class="me-auto fw-medium">{{__('general.Error')}}</div>
					<small class="text-muted">{{__('general.one seconds ago')}}</small>
					<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">{{__('general.login_faild')}}</div>
			</div>

			<!-- /Left Text -->
			<div class="d-none d-lg-flex col-lg-7 p-0">
				<div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
					<img src="/admin/assets/img/illustrations/auth-login-illustration-light.png" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" data-app-light-img="illustrations/auth-login-illustration-light.png" data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

					<img src="/admin/assets/img/illustrations/bg-shape-image-light.png" alt="auth-login-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png" />
				</div>
			</div>
			<!-- /Left Text -->

			<!-- Login -->
			<div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
				<div class="w-px-400 mx-auto">
					<!-- Logo -->
					<div class="app-brand mb-4">
						<a href="index.html" class="app-brand-link gap-2">
							<span class="app-brand-logo demo">
								<img style="width: 100%;height: 100%;object-fit: cover;" src="/uploads/{{$image}}" />
							</span>
						</a>
					</div>
					<!-- /Logo -->
					<h3 class="mb-1">{{__('general.Welcome to')}} {{translate($dictionaries, 'app_name_en',$web_app_name_en, 'WebSetting', $web_setting_id)}}! 👋</h3>
					<p class="mb-4">{{__('general.Please sign-in to your account and start the adventure')}}</p>

					<form id="formAuthentication" class="mb-3" @submit.prevent="login">
						<div class="mb-3">
							<label for="email" class="form-label">{{__('general.Email')}}</label>
							<input type="text" class="form-control" id="email" name="email" v-model="email" placeholder="{{__('general.Enter your email')}}" autofocus />
						</div>
						<div class="mb-3 form-password-toggle">
							<div class="d-flex justify-content-between">
								<label class="form-label" for="password">{{__('general.Password')}}</label>
								<a style="color:var(--bs-primary)" href="auth-forgot-password-cover.html">
									<small>{{__('general.Forgot Password?')}}</small>
								</a>
							</div>
							<div class="input-group input-group-merge">
								<input :type="showPassword?'text':'password'" id="password" class="form-control" name="password" v-model="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
								<span @click="showPassword=!showPassword" class="input-group-text cursor-pointer"><i :class="`ti ti-eye${showPassword?'':'-off'}`"></i></span>
							</div>
						</div>
						<div class="mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="remember-me" />
								<label class="form-check-label" for="remember-me"> {{__('general.Remember Me')}} </label>
							</div>
						</div>
						<button type="submit" class="btn sign-in d-grid w-100">
							<template v-if="!loading">{{__('general.Sign in')}}</template>
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

					</form>

					<!-- <p class="text-center">
              <span>New on our platform?</span>
              <a href="auth-register-cover.html">
                <span>Create an account</span>
              </a>

            </p> -->

					<div class="divider my-4">
						<div class="divider-text">{{__('general.or')}}</div>
					</div>

					<div class="d-flex justify-content-center">
						<a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
							<i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
						</a>

						<a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
							<i class="tf-icons fa-brands fa-google fs-5"></i>
						</a>

						<a href="javascript:;" class="btn btn-icon btn-label-twitter">
							<i class="tf-icons fa-brands fa-twitter fs-5"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- /Login -->
		</div>
	</div>

	<!-- / Content -->

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->

	<script src="/admin/assets/vendor/libs/jquery/jquery.js"></script>
	<script src="/admin/assets/vendor/libs/popper/popper.js"></script>
	<script src="/admin/assets/vendor/js/bootstrap.js"></script>
	<script src="/admin/assets/vendor/libs/node-waves/node-waves.js"></script>
	<script src="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="/admin/assets/vendor/libs/hammer/hammer.js"></script>
	<script src="/admin/assets/vendor/libs/i18n/i18n.js"></script>
	<script src="/admin/assets/vendor/libs/typeahead-js/typeahead.js"></script>
	<script src="/admin/assets/vendor/js/menu.js"></script>

	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="/admin/assets/vendor/libs/@form-validation/popular.js"></script>
	<script src="/admin/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
	<script src="/admin/assets/vendor/libs/@form-validation/auto-focus.js"></script>
	<script src="/admin/assets/js/main.js"></script>

	<!-- Page JS -->
	<!-- Main JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
	<script src="/admin/assets/js/ui-toasts.js"></script>


	<script>
		window.baseUrl = @json(env('APP_URL'));
		new Vue({
			el: "#app",
			components: {},
			data: {
				loading: false,
				email: "",
				password: "",
				showPassword: false,
			},
			methods: {
				login() {
					fv.validate().then((status) => {
						if (status != "Invalid") {
							this.loading = true;
							axios.post(`${baseUrl}/admin/login`, {
								email: this.email,
								password: this.password,
							}).then(res => {
								let url = @json(env('APP_URL'));
								window.location.href = `${url}/admin/teams?page_size=10`;
							}).catch((res) => {
								this.loading = false;
								const toastAnimationExample = document.querySelector(`.login-toast-ex`);
								toastAnimationExample.querySelector('.ti').classList.add("text-danger");
								toastAnimation = new bootstrap.Toast(toastAnimationExample);
								toastAnimation.show();
								return;

							})
						}
					});

				},
			}
		});
		/**
		 *  Pages Authentication
		 */

		const formAuthentication = document.querySelector('#formAuthentication');
		// Form validation for Add new record
		const fv = FormValidation.formValidation(formAuthentication, {
			fields: {

				email: {
					validators: {
						notEmpty: {
							message: @json(__('general.Please enter your email'))
						},
						emailAddress: {
							message: @json(__('general.Please enter valid email address'))
						}
					}
				},
				password: {
					validators: {
						notEmpty: {
							message: @json(__('general.Please enter your password'))
						},
						stringLength: {
							min: 8,
							message: @json(__('general.Password must be more than 8 characters'))
						}
					}
				},
			},
			plugins: {
				trigger: new FormValidation.plugins.Trigger(),
				bootstrap5: new FormValidation.plugins.Bootstrap5({
					eleValidClass: '',
					rowSelector: '.mb-3'
				}),
				// submitButton: new FormValidation.plugins.SubmitButton(),

				// defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
				autoFocus: new FormValidation.plugins.AutoFocus()
			},
			init: instance => {
				instance.on('plugins.message.placed', function(e) {
					if (e.element.parentElement.classList.contains('input-group')) {
						e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
					}
				});
			}
		});
	</script>



</body>

</html>