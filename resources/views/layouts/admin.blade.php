<!doctype html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="/admin/assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>{{translate($dictionaries, 'app_name_en',$app_name_en,'AdminSetting', $admin_setting_id)}}</title>

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

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="/admin/assets/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/typeahead-js/typeahead.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/swiper/swiper.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <!-- Page CSS -->
  <link rel="stylesheet" href="/admin/assets/vendor/css/pages/cards-advance.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/spinkit/spinkit.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/toastr/toastr.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/animate-css/animate.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/dropzone/dropzone.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/@form-validation/form-validation.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/quill/editor.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/select2/select2.css" />

  <!-- Helpers -->
  <script src="/admin/assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="/admin/assets/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="/admin/assets/js/config.js"></script>

  <style>
    :root {
      --bs-primary: {{$color??'var(--bs-primary)'}}!important;}

    .admin-save {
      background-color: var(--bs-primary) !important;
      color: #fff !important;
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
      color: var(--bs-primary) !important;
    }

    .dropdown-item:focus {
      background-color: var(--bs-primary) !important;
    }

    #add-new-record-admin {
      width: 50%;
      background: #f8f7fa;
    }

    #add-new-record-admin .card-cont {
      background: #fff;
      padding: 27px;
      border-radius: 5px;
    }

    ul.pagination-vue {
      display: flex;
      gap: 5px;
      margin-top: 30px;
      border-radius: 0.375rem;
      list-style: none;
    }

    ul.pagination-vue li a {
      border-radius: 5px;
      font-size: 14px;
      justify-content: center;
      align-items: center;
      display: flex;
      height: 38px;
      width: 40px;
      border-radius: 0.375rem;
      background: rgba(75, 70, 92, 0.08);
    }

    ul.pagination-vue li.active a {
      background: var(--bs-primary);
      color: #fff;
      transform: scale(0.98);
      box-shadow: 0 .125rem .25rem rgba(165, 163, 174, .3);

    }

    ul.pagination-vue li.active a:hover {
      color: #fff;
    }

    ul.pagination-vue li:first-child a,
    ul.pagination-vue li:last-child a {
      width: unset !important;
      padding: 0 10px;
    }

    .toggle-setting i {
      color: #fff;
    }

    .toggle-setting:hover {
      cursor: pointer;
    }

    .toggle-setting {
      position: absolute;
      top: 180px;
      z-index: 999;
      width: 42px;
      height: 42px;
      background: var(--bs-primary);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    [dir=ltr] .toggle-setting {
      right: 0;
      border-top-left-radius: 15%;
      border-bottom-left-radius: 15%;
    }

    [dir=rtl] .toggle-setting {
      left: 0;
      border-top-right-radius: 15%;
      border-bottom-right-radius: 15%;
    }

    .template-customizer-open-btn {
      display: none !important;
    }

    input.form-control:focus {
      border-color: var(--bs-primary) !important;
    }

    .form-check-input:checked,
    .form-check-input[type=checkbox]:indeterminate {
      background-color: var(--bs-primary) !important;
      border-color: var(--bs-primary) !important;
    }

    .form-check-input:focus {
      border-color: var(--bs-primary) !important;

    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:focus {
      color: #fff;
      background-color: var(--bs-primary) !important;
      border-color: var(--bs-primary) !important;
    }

    .text-primary {
      color: var(--bs-primary) !important;
    }

    table th,
    table td {
      white-space: nowrap;
    }
  </style>
  @stack('css')

</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="bs-toast toast admin-image-toast-ex toast-ex animate__bounce animate__animated my-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
      <div class="toast-header">
        <i class="ti ti-bell ti-xs me-2"></i>
        <div class="me-auto fw-medium">{{__('general.Error')}}</div>
        <small class="text-muted">{{__('general.one seconds ago')}}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">{{__('general.The image is required')}}</div>
    </div>
    <a data-bs-target="#add-new-record-admin" data-bs-toggle='offcanvas' class="toggle-setting">
      <i class="ti ti-settings"></i>
    </a>

    <div class="layout-container">

      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img style="width: 100%;height: 100%;object-fit: cover;" src="/uploads/{{$image}}" />
            </span>

            <span class="app-brand-text demo menu-text fw-bold">{{translate($dictionaries, 'app_name_en',$app_name_en,'AdminSetting', $admin_setting_id)}}</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Layouts -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
              <div>{{__('general.Website')}}</div>
            </a>
            <ul class="menu-sub">
              @if(auth()->user()->can('super admin')||auth()->user()->can('view team'))
              <li class="menu-item">
                <a href="/admin/teams?page_size=10" class="menu-link">
                  <div>{{__('general.team')}}</div>
                </a>
              </li>
              @endif
              @if(auth()->user()->can('super admin')||auth()->user()->can('view review'))

              <li class="menu-item">
                <a href="/admin/reviews?page=1&page_size=10" class="menu-link">
                  <div>{{__('general.reviews')}}</div>
                </a>
              </li>
              @endif
              @if(auth()->user()->can('super admin')||auth()->user()->can('view partner'))
              <li class="menu-item">
                <a href="/admin/partners?page=1&page_size=10" class="menu-link">
                  <div>{{__('general.partner')}}</div>
                </a>
              </li>
              @endif
              @if(auth()->user()->can('super admin')||auth()->user()->can('view user'))

              <li class="menu-item">
                <a href="/admin/users?page=1&page_size=10" class="menu-link">
                  <div>{{__('general.Users')}}</div>
                </a>
              </li>
              @endif
              @if(auth()->user()->can('super admin')||auth()->user()->can('view service'))

              <li class="menu-item">
                <a href="/admin/services?page=1&page_size=10" class="menu-link">
                  <div>{{__('general.Services')}}</div>
                </a>
              </li>
              @endif
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div>{{__('general.Careers')}}</div>
                </a>
                <ul class="menu-sub">
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view career-team'))
                  <li class="menu-item">
                    <a href="/admin/career-team?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Career Team')}}</div>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view career-type'))
                  <li class="menu-item">
                    <a href="/admin/career-types?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Career Type')}}</div>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view application'))
                  <li class="menu-item">
                    <a href="/admin/career-applications?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Career Application')}}</div>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view career'))
                  <li class="menu-item">
                    <a href="/admin/careers?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Careers')}}</div>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div>{{__('general.Blogs')}}</div>
                </a>
                <ul class="menu-sub">
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view blog-tag'))

                  <li class="menu-item">
                    <a href="/admin/blog-tags?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Tags')}}</div>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view blog-category'))
                  <li class="menu-item">
                    <a href="/admin/blog-categories?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Categories')}}</div>
                    </a>
                  </li>
                  @endif

                  @if(auth()->user()->can('super admin')||auth()->user()->can('view blog'))
                  <li class="menu-item">
                    <a href="/admin/blogs?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Blogs')}}</div>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div>{{__('general.lang')}}</div>
                </a>
                <ul class="menu-sub">
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view lang'))
                  <li class="menu-item">
                    <a href="/admin/langs?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.lang')}}</div>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div>{{__('general.Projects')}}</div>
                </a>
                <ul class="menu-sub">
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view project-category'))
                  <li class="menu-item">
                    <a href="/admin/project-categories?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Categories')}}</div>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view project'))
                  <li class="menu-item">
                    <a href="/admin/projects?page=1&page_size=10" class="menu-link">
                      <div>{{__('general.Projects')}}</div>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div>{{__('general.Forms')}}</div>
                </a>
                <ul class="menu-sub">
                @if(auth()->user()->can('super admin')||auth()->user()->can('view home'))
                  <li class="menu-item">
                    <a href="/admin/home" class="menu-link">
                      <div>{{__('general.Home')}}</div>
                    </a>
                  </li>
                @endif
                @if(auth()->user()->can('super admin')||auth()->user()->can('view about'))
                  <li class="menu-item">
                    <a href="/admin/about" class="menu-link">
                      <div>{{__('general.about')}}</div>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->can('super admin')||auth()->user()->can('view setting'))
                  <li class="menu-item">
                    <a href="/admin/web-setting" class="menu-link">
                      <div>{{__('general.setting')}}</div>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              @if(auth()->user()->can('super admin')||auth()->user()->can('view contact'))
              <li class="menu-item">
                <a href="/admin/contact?page=1&page_size=10" class="menu-link">
                  <div>{{__('general.Contact Us')}}</div>
                </a>
              </li>
              @endif
              @if(auth()->user()->can('super admin')||auth()->user()->can('view faq'))
              <li class="menu-item">
                <a href="/admin/faqs?page_size=10" class="menu-link">
                  <div>{{__('general.faqs')}}</div>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @if(auth()->user()->can('super admin')||auth()->user()->can('view employee'))
          <li class="menu-item">
            <a href="/admin/employees?page=1&page_size=10&page_size_role=5" class="menu-link">
              <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>

              <div>{{__('general.Employees')}}</div>
            </a>
          </li>
          @endif
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="ti ti-menu-2 ti-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                  <i class="ti ti-search ti-md me-2"></i>
                  <span class="d-none d-md-inline-block text-muted">{{__('general.Search')}} (Ctrl+/)</span>
                </a>
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Language -->
              <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="ti ti-language rounded-circle ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  @foreach($langs as $lang)
                  <li>
                    <a href="/set-locale/{{$lang->key}}" class="dropdown-item" data-language="{{$lang->key}}" data-text-direction="{{$lang->is_rtl?'rtl':'ltr'}}">
                      <span class="align-middle">{{$lang->name}}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <!--/ Language -->

              <!-- Style Switcher -->
              <!-- <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                      <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                      <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                      <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                    </a>
                  </li>
                </ul>
              </li> -->
              <!-- / Style Switcher-->

              <!-- Quick links  -->
              <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="ti ti-layout-grid-add ti-md"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0">
                  <div class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                      <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="ti ti-sm ti-apps"></i></a>
                    </div>
                  </div>
                  <div class="dropdown-shortcuts-list scrollable-container">
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-calendar fs-4"></i>
                        </span>
                        <a href="app-calendar.html" class="stretched-link">Calendar</a>
                        <small class="text-muted mb-0">Appointments</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-file-invoice fs-4"></i>
                        </span>
                        <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                        <small class="text-muted mb-0">Manage Accounts</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-users fs-4"></i>
                        </span>
                        <a href="app-user-list.html" class="stretched-link">User App</a>
                        <small class="text-muted mb-0">Manage Users</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-lock fs-4"></i>
                        </span>
                        <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                        <small class="text-muted mb-0">Permission</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-chart-bar fs-4"></i>
                        </span>
                        <a href="index.html" class="stretched-link">Dashboard</a>
                        <small class="text-muted mb-0">User Profile</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-settings fs-4"></i>
                        </span>
                        <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                        <small class="text-muted mb-0">Account Settings</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-help fs-4"></i>
                        </span>
                        <a href="pages-faq.html" class="stretched-link">FAQs</a>
                        <small class="text-muted mb-0">FAQs & Articles</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-square fs-4"></i>
                        </span>
                        <a href="modal-examples.html" class="stretched-link">Modals</a>
                        <small class="text-muted mb-0">Useful Popups</small>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Quick links -->

              <!-- Notification -->
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="ti ti-bell ti-md"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                  <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Notification</h5>
                      <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                    </div>
                  </li>
                  <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="/admin/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                            <p class="mb-0">Won the monthly best seller gold badge</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Charles Franklin</h6>
                            <p class="mb-0">Accepted your connection</p>
                            <small class="text-muted">12hr ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="/admin/assets/img/avatars/2.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New Message ✉️</h6>
                            <p class="mb-0">You have new message from Natalie</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-shopping-cart"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                            <p class="mb-0">ACME Inc. made new order $1,154</p>
                            <small class="text-muted">1 day ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="/admin/assets/img/avatars/9.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Application has been approved 🚀</h6>
                            <p class="mb-0">Your ABC project application has been approved.</p>
                            <small class="text-muted">2 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-chart-pie"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Monthly report is generated</h6>
                            <p class="mb-0">July monthly financial report is generated</p>
                            <small class="text-muted">3 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="/admin/assets/img/avatars/5.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Send connection request</h6>
                            <p class="mb-0">Peter sent you connection request</p>
                            <small class="text-muted">4 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="/admin/assets/img/avatars/6.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New message from Jane</h6>
                            <p class="mb-0">Your have new message from Jane</p>
                            <small class="text-muted">5 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-alert-triangle"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">CPU is running high</h6>
                            <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                            <small class="text-muted">5 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-menu-footer border-top">
                    <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                      View all notifications
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ Notification -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img style="width: 40px;height: 40px;object-fit: cover;" src="{{auth()->user()->image?'/uploads/'.auth()->user()->image:'/admin/assets/img/avatars/1.png'}}" alt class="rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img style="width: 40px;height: 40px;object-fit: cover;" src="{{auth()->user()->image?'/uploads/'.auth()->user()->image:'/admin/assets/img/avatars/1.png'}}" alt class="rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block">{{auth()->user()->name}}</span>
                          <small class="text-muted">{{auth()->user()->email}}</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-profile-user.html">
                      <i class="ti ti-user-check me-2 ti-sm"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <i class="ti ti-settings me-2 ti-sm"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-billing.html">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-faq.html">
                      <i class="ti ti-help me-2 ti-sm"></i>
                      <span class="align-middle">FAQ</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-pricing.html">
                      <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                      <span class="align-middle">Pricing</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a href="/admin/logout" class="dropdown-item">
                      <i class="ti ti-logout me-2 ti-sm"></i>
                      <span class="align-middle">{{__('general.Log Out')}}</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>

          <!-- Search Small Screens -->
          <div class="navbar-search-wrapper search-input-wrapper d-none">
            <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="offcanvas offcanvas-end" id="add-new-record-admin">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title" id="exampleModalLabel">{{__('general.setting')}}</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="col-sm-12">

            </div>
            <div id="admin-setting" class="row offcanvas-body flex-grow-1">

              <form style="padding-right: 0 !important;padding-left: 0 !important;" class="add-new-record" id="form-add-new-record-admin" @submit.prevent="saveAdmin">
                <div class="card-cont">
                  <h6>{{__('general.Basic information')}}</h6>
                  <div class="col-sm-12">
                    <div class="mb-2">
                      <label class="form-label" for="basicPost">{{__('general.app_name_en')}}</label>
                      <input v-model="app_name_en" type="text" id="app_name_en" name="app_name_en" class="form-control dt-post" placeholder="{{__('general.app_name_en')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="mb-2">
                      <label class="form-label" for="basicPost">{{__('general.color')}}</label>
                      <input v-model="color" type="text" id="color" name="color" class="form-control dt-post" placeholder="{{__('general.color')}}" aria-label="Web Developer" aria-describedby="basicPost2" />
                    </div>
                  </div>
                </div>

                <div class="card-cont mt-3">
                  <h6>

                    @if($image)
                    <a target="_blank" href="/uploads/{{$image}}" style="padding:0" class="btn">
                      {{__('general.Logo')}}
                      <span class="ti ti-edit"></span>
                    </a>
                    @else
                    {{__('general.Logo')}}
                    @endif
                  </h6>
                  <div class="col-sm-12">
                    <div class="card-body">
                      <div action="/upload" class="dropzone needsclick" id="admin-dropzone-basic">
                        <div class="dz-message needsclick">
                          {{__('general.Drop files here or click to upload')}}
                        </div>
                        <div class="fallback">
                          <input name="admin-file" type="file" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>


              <div class="col-sm-12 mt-4 mb-2" style="padding-right: 0;padding-left:0">
                <button form="form-add-new-record-admin" :disabled="loading" type="submit" class="btn admin-save me-sm-3 me-1">
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
                <button id="admin-cancel-modal" type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">{{__('general.Cancel')}}</button>
              </div>
            </div>
          </div>

          <!-- Content -->

          @yield('content')
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                <div>
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://pixinvent.com" target="_blank" class="footer-link text-primary fw-medium">Pixinvent</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>

                  <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                  <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

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
  <script src="/admin/assets/vendor/libs/@form-validation/popular.js"></script>
  <script src="/admin/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
  <script src="/admin/assets/vendor/libs/@form-validation/auto-focus.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="/admin/assets/vendor/libs/swiper/swiper.js"></script>
  <script src="/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

  <!-- Main JS -->

  <!-- Page JS -->
  <script src="/admin/assets/js/dashboards-analytics.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    let baseUrl = @json(env('APP_URL'));
  </script>
  <script src="/admin/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script src="/admin/assets/vendor/libs/dropzone/dropzone.js"></script>
  <script src="/admin/assets/js/main.js"></script>
  <script src="/admin/assets/js/ui-toasts.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script src="https://unpkg.com/vuejs-paginate@latest"></script>
  <script src="/admin/assets/vendor/libs/quill/katex.js"></script>
  <script src="/admin/assets/vendor/libs/quill/quill.js"></script>
  <script src="/admin/assets/vendor/libs/select2/select2.js"></script>

  <script>
    let adminUploadedFiles = [];
    Vue.component('paginate', VuejsPaginate);
    new Vue({
      el: "#admin-setting",
      components: {},
      data: {
        loading: false,
        app_name_en: "{{translate($dictionaries, 'app_name_en',$app_name_en, 'AdminSetting', $admin_setting_id)}}",
        color: @json($color),
        image: @json($image),
        empty: @json($empty)
      },
      methods: {
        saveAdmin() {
          fvAdmin.validate().then((status) => {
            if (status != "Invalid") {
              let formData = new FormData();
              formData.append("app_name_en", this.app_name_en);
              formData.append("color", this.color);
              if (adminUploadedFiles.length) {
                formData.append("image", adminUploadedFiles[0]);
              }
              if (adminUploadedFiles.length == 0 && this.empty) {
                const toastAnimationExample = document.querySelector(`.admin-image-toast-ex`);
                toastAnimationExample.querySelector('.ti').classList.add("text-danger");
                toastAnimation = new bootstrap.Toast(toastAnimationExample);
                toastAnimation.show();
                return;
              }
              this.loading = true;
              axios.post(`${baseUrl}/admin/admin-settings`, formData).then(res => {
                this.loading = false;
                location.reload();
              })
            }
          });

        },
      }
    });
    const adminPreviewTemplate = `<div class="dz-preview dz-file-preview">
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
      const adminDropzoneBasic = document.querySelector('#admin-dropzone-basic');
      if (adminDropzoneBasic) {
        const myDropzone = new Dropzone(adminDropzoneBasic, {
          previewTemplate: adminPreviewTemplate,
          parallelUploads: 1,
          maxFilesize: 5,
          addRemoveLinks: true,
          maxFiles: 1,
          acceptedFiles: 'image/*',
          init: function() {
            this.on("addedfiles", (files) => {
              for (const key in files) {
                if (typeof files[key] == "object") {
                  adminUploadedFiles.push(files[key]);
                }
              }
            });
          },
          removedfile: function(file) {
            var name = file.name;
            let index = adminUploadedFiles.findIndex((e) => e == file);
            adminUploadedFiles.splice(index, 1);
            console.log(adminUploadedFiles);
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
          }
        });
      }
      const formAddNewRecord = document.getElementById('form-add-new-record-admin');
      fvAdmin = FormValidation.formValidation(formAddNewRecord, {
        fields: {
          app_name_en: {
            validators: {
              notEmpty: {
                message: @json(__('general.the field is required'))
              }
            }
          },
          color: {
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
  </script>
  @stack('js')

</body>

</html>