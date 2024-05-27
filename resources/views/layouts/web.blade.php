<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from ui-themez.smartinnovates.net/items/infolio/Infolio-light/home-main.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2024 13:30:24 GMT -->

<head>

  <!-- Metas -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="HTML5 Template Infolio Multi-Purpose themeforest">
  <meta name="description" content="Infolio - Multi-Purpose HTML5 Template">
  <meta name="author" content="">

  <!-- Title  -->
  <title>{{$web_app_name}}</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/web/assets/imgs/favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&amp;display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font -->
  <style>
    [dir=ltr] .show-password{
      border: none;position: absolute;right: 12px;bottom: 11px;font-size: 14px;color: gray;padding: 0;background: none;
    }
    [dir=rtl] .show-password{
      border: none;position: absolute;left: 12px;bottom: 11px;font-size: 14px;color: gray;padding: 0;background: none;
    }
    
    .modal .form-group label,
	.form-label {
		color: #8a8888 !important;
	}
  tags{
    padding: 0 !important;
  }
	[dir="ltr"] .modal .form-group label,
	[dir="ltr"] .modal .form-group label .form-label,
	[dir="ltr"] .modal .form-group label .form-control::placeholder,
	[dir="ltr"] .modal .form-group .form-control {
		font-size: 15px !important;
	}

	
	[dir="rtl"] .modal .form-group label,
	[dir="rtl"] .modal .form-group label .form-label,
	[dir="rtl"] .modal .form-group label .form-control::placeholder,
	[dir="rtl"] .modal .form-group .form-control,
  [dir="rtl"] .modal select,
  [dir="rtl"] .modal select option
   {
		font-size: 13.8px !important;
	}
	.modal .social-links {
		display: flex !important;
		justify-content: center !important;
		gap: 15px !important;
	}

	.modal .social-links a {
		border-radius: 50%;
		width: 40px;
		height: 40px;
		border: 1px solid #cfcfcf;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.modal .form-control,.modal select {
		padding: 10px;
	}

	.modal form {
		padding: 15px;
	}

  </style>
  <!-- Plugins -->
  @if(app()->getLocale()=='ar')
  <!-- Core Style Css -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/web/assets/css/satoshi-rtl.css">
  <link rel="stylesheet" href="/web/assets/css/plugins-rtl.css">
  <link rel="stylesheet" href="/web/assets/css/style-rtl.css">
  <link rel="stylesheet" href="/web/assets/css/jquery.toast.min-rtl.css">

  <style>
    
    *,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .jq-toast-single {
      font-family: "Cairo", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
      font-variation-settings:
        "slnt" 0;
    }

    .jq-toast-single{
      font-size: 10px !important;
    }
    .dropdown-menu {
      text-align: right !important;
    }

    .jq-toast-single {
      text-align: right !important;
    }
  </style>
  @else
  <link rel="stylesheet" href="/web/assets/css/jquery.toast.min.css">

  <!-- Core Style Css -->
  <link rel="stylesheet" href="/web/assets/css/satoshi.css">
  <link rel="stylesheet" href="/web/assets/css/plugins.css">
  <link rel="stylesheet" href="/web/assets/css/style.css">
  @endif
  <style>
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
      background: #14cf93 !important;
      color: #fff;
      transform: scale(0.98);
      box-shadow: 0 .125rem .25rem rgba(165, 163, 174, .3);

    }

    ul.pagination-vue li.active a:hover {
      color: #fff;
    }

    ul.pagination-vue li:first-child a,
    ul.pagination-vue li:last-child a {
      display: none !important;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="/web/assets/css/tagify.css">
  @stack('css')
</head>

<body dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}">

  <div class="modal fade" id="termAndCondition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('general.Term & Conditions')}}</h1>
          <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! $web_term_and_condition !!}
        </div>
      </div>
    </div>
  </div>
  <div id="auth">
  <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button id="close-register" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="webRegister">
            <h5 class="text-center" style="margin-bottom: 20px;">{{__('general.Register')}}</h5>
            <div class="social-links mb-4">
              <a target="__blank" href="{{$web_twitter}}"><i class="fab fa-twitter"></i></a>
              <a target="__blank" href="{{$web_facebook}}"><i class="fab fa-facebook"></i></a>
              <a target="__blank" href="{{$web_instgram}}"><i class="fab fa-instagram"></i></a>
              <a target="__blank" href="{{$web_youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
              <div class="form-group">
                <label class="mb-1" for="exampleInputEmail1">{{__('general.Type')}}</label>
                <select @change="onTypeChange" required v-model="type" class="form-control" aria-label="Default select example">
                  <option value="Client">{{__('general.Client')}}</option>
                  <option value="Employee">{{__('general.Employee')}}</option>
                  <option value="Developer">{{__('general.Developer')}}</option>
                  <option value="Quick Guest">{{__('general.Quick Guest')}}</option>
                </select>
              </div>

              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Name')}}</label>
                  <input required placeholder="{{__('general.Enter your name')}}" v-model="web_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Email')}}</label>
                  <input required v-model="web_email" placeholder="{{__('general.Enter your email')}}" type="email" class="form-control"  aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div style="position: relative;" class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Password')}}</label>
                  <input minlength="8" required v-model="web_password" placeholder="{{__('general.Enter your password')}}" :type="show_password?'text':'password'" class="form-control"  aria-describedby="emailHelp">
                  <button class="show-password" type="button" @click="show_password=!show_password"  ><i  :class="`fa fa-${show_password?'eye-slash':'eye'}`"></i></button>
                  
                </div>
              </div>
              <div v-if="type!='Employee'" class="col-md-12 mb-3">
                <div class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Phone')}}</label>
                  <input required v-model="web_phone" placeholder="{{__('general.Enter your phone')}}" type="text" class="form-control"  aria-describedby="emailHelp">
                </div>
              </div>
              <div v-if="type=='Developer'" class="col-md-12 mb-3">
                <div class="form-group">
                    <label class="mb-2">{{__('general.Technology')}}</label>
                    <input placeholder="{{__('general.Technology')}}" id="technology" required class="form-control" name="input-example" autofocus>
                </div>
              </div>
            
              <div v-if="type=='Client'" class="col-md-12 mb-3">
              <div class="form-group">
                <label class="mb-1" for="exampleInputEmail1">{{__('general.Country')}}</label>
                <select required v-model="web_country_id" class="form-select" aria-label="Default select example">
                  @foreach($web_locations as $index=>$location)
                  <option @if($index==0) selected @endif value="{{$location->id}}">{{$location->name}}</option>
                  @endforeach
                </select>
              </div>

              </div>
              <div v-if="type=='Client'" class="col-md-12 mb-3">
                <div class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Industry')}}</label>
                  <input required v-model="web_industry" placeholder="{{__('general.Enter your industry')}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
              </div>
              <div v-if="type=='Developer'" class="col-md-12 mb-3">
                <div class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.linkedin')}}</label>
                  <input required v-model="web_linkedin" placeholder="{{__('general.linkedin')}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
              </div>
              <div v-if="type=='Developer'" class="col-md-12 mb-3">
                <label for="formFile" class="form-label">{{__('general.Add Resume')}}</label>
                <input accept="application/pdf"   @change="webUploadCv" class="form-control" type="file" id="formFile">
              </div>
              <div class="col-md-12 mb-3 d-flex">
                <button class="btn btn-primary p-2 w-100" type="submit">
                  <template v-if="!loading">
                    {{__('general.Submit Now')}}
                  </template>
                  <template v-if="loading">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                  </template>
                </button>
              </div>
              <div class="col-md-12 mb-3 d-flex">
                <a @click="onLoginModalShow" data-bs-toggle="modal" data-bs-target="#login" href="" >{{__('general.Already have account')}}</a>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button id="close-login" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="webLogin">
            <h5 class="text-center" style="margin-bottom: 20px;">{{__('general.Login')}}</h5>
            <div class="social-links mb-4">
              <a target="__blank" href="{{$web_twitter}}"><i class="fab fa-twitter"></i></a>
              <a target="__blank" href="{{$web_facebook}}"><i class="fab fa-facebook"></i></a>
              <a target="__blank" href="{{$web_instgram}}"><i class="fab fa-instagram"></i></a>
              <a target="__blank" href="{{$web_youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Email')}}</label>
                  <input required v-model="web_login_email" placeholder="{{__('general.Enter your email')}}" type="email" class="form-control"  aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div style="position: relative;" class="form-group">
                  <label class="mb-1" for="exampleInputEmail1">{{__('general.Password')}}</label>
                  <input minlength="8" required v-model="web_login_password" placeholder="{{__('general.Enter your password')}}" :type="login_show_password?'text':'password'" class="form-control"  aria-describedby="emailHelp">
                  <button class="show-password" type="button" @click="login_show_password=!login_show_password"  ><i  :class="`fa fa-${login_show_password?'eye-slash':'eye'}`"></i></button>
                </div>
              </div>
              <div class="col-md-12 mb-3 d-flex">
                <button class="btn btn-primary p-2 w-100" type="submit">
                  <template v-if="!loading">
                    {{__('general.Login')}}
                  </template>
                  <template v-if="loading">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                  </template>
                </button>
              </div>
              <div class="col-md-12 mb-3 d-flex">
                <a @click="onRegisterModalShow" data-bs-toggle="modal" data-bs-target="#register" href="" >{{__('general.dont have an account')}}</a>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
 
  <div class="modal fade" id="privacyPolicy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('general.Privacy policy')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! $web_privacy_policy !!}
        </div>
      </div>
    </div>
  </div>
  <!-- ==================== Start Loading ==================== -->

  <div class="loader-wrap">
    <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
      <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
    </svg>

    <div class="loader-wrap-heading">
      <div class="load-text">
        @if(app()->getLocale()=='ar')
        <span>ت</span>
        <span>ح</span>
        <span>م</span>
        <span>ي</span>
        <span>ل</span>
        @else
        <span>l</span>
        <span>o</span>
        <span>a</span>
        <span>d</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
        @endif
      </div>
    </div>
  </div>

  <!-- ==================== End Loading ==================== -->


  <div class="cursor"></div>


  <!-- ==================== Start progress-scroll-button ==================== -->

  <div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>

  <!-- ==================== End progress-scroll-button ==================== -->



  <!-- ==================== Start Navbar ==================== -->

  <nav class="navbar navbar-expand-lg change bord  blur">
    <div class="container">

      <!-- Logo -->
      <a class="logo icon-img-100" href="#">
        <img src="/uploads/{{$web_white_logo}}" alt="logo">
      </a>

      <!-- navbar links -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Home</span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="home-main.html">Main Home</a>
              <a class="dropdown-item" href="home-startup-onepage.html">Modern Startup</a>
              <a class="dropdown-item" href="home-creative-agency.html">Creative Agency</a>
              <a class="dropdown-item" href="home-modern-agency.html">Modern Agency</a>
              <a class="dropdown-item" href="home-creative-portfolio.html">Creative Portfolio</a>
              <a class="dropdown-item" href="home-digital-agency.html">Digital Agency</a>
              <a class="dropdown-item" href="home-freelancer.html">Freelancer</a>
              <a class="dropdown-item" href="home-personal-vcard.html">Personal vCard</a>
              <a class="dropdown-item" href="home-minimal-portfolio.html">Minimal Portfolio</a>
              <a class="dropdown-item" href="home-asymmetric-portfolio.html">Asymmetric Portfolio</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Portfolio</span></a>
            <div class="dropdown-menu mega-menu">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="clumn mb-80">
                      <div class="title">
                        <h6 class="sub-title ls1 pb-20 bord-thin-bottom">Portfolio Type</h6>
                      </div>
                      <div class="links row">
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="portfolio-standard.html">Standerd</a>
                          <a class="dropdown-item" href="portfolio-gallery.html">Gallery</a>
                          <a class="dropdown-item" href="portfolio-metro.html">Metro</a>
                        </div>
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="portfolio-masonry.html">Masonry</a>
                          <a class="dropdown-item" href="portfolio-caption-cursor.html">Caption
                            Cursor</a>
                          <a class="dropdown-item" href="portfolio-outline.html">Outline</a>
                        </div>
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="portfolio-parallax.html">Parallax</a>
                          <a class="dropdown-item" href="portfolio-sticky.html">Sticky</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="clumn">
                      <div class="title">
                        <h6 class="sub-title ls1 pb-20 bord-thin-bottom">Showcases</h6>
                      </div>
                      <div class="links row">
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="showcase-fullscreen.html">Parallax
                            Slider</a>
                          <a class="dropdown-item" href="showcase-carousel.html">Showcase
                            Carousel</a>
                        </div>
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="showcase-half-slider.html">Creative
                            Slider</a>
                          <a class="dropdown-item" href="showcase-interactive-full.html">Interactive Full</a>
                        </div>
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="showcase-interactive-center.html">Interactive Center</a>
                          <a class="dropdown-item" href="showcase-interactive-vertical.html">Interactive
                            Vertical</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="clumn">
                      <div class="title">
                        <h6 class="sub-title ls1 pb-20 bord-thin-bottom">Portfolio Single</h6>
                      </div>
                      <div class="links row">
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="project1.html">project1</a>
                          <a class="dropdown-item" href="project2.html">project2</a>
                        </div>
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="project3.html">project3</a>
                          <a class="dropdown-item" href="project4.html">project4</a>
                        </div>
                        <div class="col-lg-4">
                          <a class="dropdown-item" href="project5.html">project5</a>
                          <a class="dropdown-item" href="project6.html">project6</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li> -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Pages</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-item">
                <a href="#0">About Us <i class="fas fa-angle-right icon-arrow"></i></a>
                <ul class="dropdown-side">
                  <li><a class="dropdown-item" href="page-about.html">About Us 1</a>
                  </li>
                  <li><a class="dropdown-item" href="page-about2.html">About Us 2</a>
                  </li>
                  <li><a class="dropdown-item" href="page-about3.html">About Us 3</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown-item">
                <a href="#0">Services <i class="fas fa-angle-right icon-arrow"></i></a>
                <ul class="dropdown-side">
                  <li><a class="dropdown-item" href="page-services.html">Services 1</a></li>
                  <li><a class="dropdown-item" href="page-services2.html">Services 2</a>
                  </li>
                  <li><a class="dropdown-item" href="page-services-details.html">Services
                      Details</a></li>
                </ul>
              </li>
              <li class="dropdown-item">
                <a href="#0">Contact Us <i class="fas fa-angle-right icon-arrow"></i></a>
                <ul class="dropdown-side">
                  <li><a class="dropdown-item" href="page-contact.html">Contact Us 1</a></li>
                  <li><a class="dropdown-item" href="page-contact2.html">Contact Us 2</a>
                  </li>
                  <li><a class="dropdown-item" href="page-contact3.html">Contact Us 3</a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="page-team.html">Our Team</a></li>
              <li><a class="dropdown-item" href="page-team-single.html">Team Details</a></li>
              <li><a class="dropdown-item" href="page-FAQS.html">FAQS</a></li>
              <li><a class="dropdown-item" href="page-error404.html">Error 404</a></li>
            </ul>
          </li> -->
          @Auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="rolling-text">{{auth()->user()->name}}</span></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/web/logout">{{__('general.Logout')}}</a></li>
            </ul>
          </li>
          <span style="color:#fff;align-items: center;display: flex;margin:0 12px"> | </span>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="/web/home"><span class="rolling-text">
                {{__('general.Home')}}
              </span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="rolling-text">{{__('general.pages')}}</span></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/web/teams?page_size=6&page=1">{{__('general.team')}}</a></li>
              <li><a class="dropdown-item" href="/web/blogs?page_size=6&page=1">{{__('general.Blogs')}}</a></li>
              <li><a class="dropdown-item" href="/web/services?page_size=4&page=1">{{__('general.Services')}}</a></li>
              <li><a class="dropdown-item" href="/web/projects">{{__('general.Projects')}}</a></li>
              <li><a class="dropdown-item" href="/web/careers">{{__('general.Careers')}}</a></li>
              <li><a class="dropdown-item" href="/web/faqs">{{__('general.faqs')}}</a></li>
            </ul>
          </li>
          
          @guest
          <li class="nav-item">
            <a href="" data-bs-toggle="modal" data-bs-target="#login" class="nav-link"><span class="rolling-text">{{__('general.Login')}}</span></a>
          </li>
          @endguest
          <li class="nav-item">
            <a class="nav-link" href="/web/about"><span class="rolling-text">
                {{__('general.about')}}
              </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/web/contact"><span class="rolling-text">{{__('general.Contact Us')}}</span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="rolling-text">
                {{__('general.lang')}}
              </span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/set-locale/en">{{__('general.English')}}</a>

              <a class="dropdown-item" href="/set-locale/ar">{{__('general.Arabic')}}</a>
            </div>
          </li>
        </ul>
      </div>

      <form action="/web/blogs">
        <input type="hidden" name="page" value="1">
        <input type="hidden" name="page_size" value="6">

        <div class="search-form">
          <div class="form-group">
            <input type="text" name="text" placeholder="{{__('general.Search')}}">
            <button><span class="pe-7s-search"></span></button>
          </div>
          <div class="search-icon">
            <span class="pe-7s-search open-search"></span>
            <span class="pe-7s-close close-search"></span>
          </div>
        </div>
      </form>
      <div class="topnav">
        <div class="menu-icon cursor-pointer">
          <span class="icon ti-align-right"></span>
        </div>
      </div>
    </div>
  </nav>

  <div class="hamenu">
    <div class="logo icon-img-100">
      <img src="/uploads/{{$web_black_logo}}" alt="">
    </div>
    <div class="close-menu cursor-pointer ti-close"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="menu-text">
            <div class="text">
              <h2>Menu</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="menu-links">
            <ul class="main-menu rest">
              <li>
                <div class="o-hidden">
                  <a href="/web/home" class="link"><span class="fill-text" data-text="{{__('general.Home')}}">{{__('general.Home')}}</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <div class="link cursor-pointer dmenu"><span class="fill-text" data-text="{{__('general.pages')}}">{{__('general.pages')}}</span> <i></i>
                  </div>
                </div>
                <div class="sub-menu no-bord">
                  <ul>
                    <li>
                      <a href="/web/teams?page_size=6&page=1" class="sub-link">{{__('general.team')}}</a>
                    </li>
                    <li>
                      <a href="/web/teams?page_size=6&page=1" class="sub-link">{{__('general.Blogs')}}</a>
                    </li>
                    <li>
                      <a href="/web/services?page_size=4&page=1" class="sub-link">{{__('general.Services')}}</a>
                    </li>
                    <li>
                      <a href="/web/projects" class="sub-link">{{__('general.Projects')}}</a>
                    </li>
                    <li>
                      <a href="/web/careers" class="sub-link">{{__('general.Careers')}}</a>
                    </li>
                    <li>
                      <a href="/web/faqs" class="sub-link">{{__('general.faqs')}}</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="/web/about" class="link"><span class="fill-text" data-text="{{__('general.about')}}">{{__('general.about')}}</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="/web/about" class="link"><span class="fill-text" data-text="{{__('general.Contact Us')}}">{{__('general.Contact Us')}}</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <div class="link cursor-pointer dmenu"><span class="fill-text" data-text="{{__('general.lang')}}"> {{__('general.lang')}}</span> <i></i>
                  </div>
                </div>
                <div class="sub-menu no-bord">
                  <ul>
                    <li>
                      <a href="/set-locale/en" class="sub-link">{{__('general.English')}}</a>
                    </li>
                    <li>
                      <a href="/set-locale/ar" class="sub-link">{{__('general.Arabic')}}</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="cont-info">
            <div class="item mb-50">
              <h6 class="sub-title mb-15 opacity-7">{{__('general.Address')}}</h6>
              <h5>{{$web_address}}</h5>
            </div>
            <div class="item mb-50">
              <h6 class="sub-title mb-15 opacity-7">{{__('general.Social Media')}}</h6>
              <ul class="rest social-text">
                <li class="mb-10">
                  <a target="__blank" href="{{$web_facebook}}" class="hover-this"><span class="hover-anim">{{__('general.Facebook')}}</span></a>
                </li>
                <!-- <li class="mb-10">
                  <a target="__blank" href="{{$web_behance}}" class="hover-this"><span class="hover-anim">{{__('general.Behance')}}</span></a>
                </li> -->
                <li class="mb-10">
                  <a target="__blank" href="{{$web_instgram}}" class="hover-this"><span class="hover-anim">{{__('general.Instgram')}}</span></a>
                </li>
                <!-- <li class="mb-10">
                  <a target="__blank" href="{{$web_linkedin}}" class="hover-this"><span class="hover-anim">{{__('general.linkedin')}}</span></a>
                </li> -->
                <li class="mb-10">
                  <a target="__blank" href="{{$web_youtube}}" class="hover-this"><span class="hover-anim">{{__('general.youtube')}}</span></a>
                </li>
                <li class="mb-10">
                  <a target="__blank" href="https://wa.me/{{$web_whatsapp}}" class="hover-this"><span class="hover-anim">{{__('general.whatsapp')}}</span></a>
                </li>
                <!-- <li class="mb-10">
                  <a target="__blank" href="{{$web_snapchat}}" class="hover-this"><span class="hover-anim">{{__('general.snapchat')}}</span></a>
                </li> -->
                <!-- <li class="mb-10">
                  <a target="__blank" href="{{$web_tiktok}}" class="hover-this"><span class="hover-anim">{{__('general.tiktok')}}</span></a>
                </li> -->
                <!-- <li class="mb-10">
                  <a target="__blank" href="{{$web_twitter}}" class="hover-this"><span class="hover-anim">{{__('general.twitter')}}</span></a>
                </li> -->
              </ul>
            </div>
            <div class="item mb-40">
              <h6 class="sub-title mb-15 opacity-7">{{__('general.Contact Us')}}</h6>
              <h5 class="underline mt-10"><a href="#0">{{$web_email}}</a></h5>
              <h5 class="underline mt-10"><a href="#0">{{$web_phone}}</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ==================== End Navbar ==================== -->

  @yield('content')

  <!-- jQuery -->
  <script src="/web/assets/js/jquery-3.6.0.min.js"></script>
  <script src="/web/assets/js/jquery-migrate-3.4.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- plugins -->
  <script src="/web/assets/js/plugins.js"></script>

  <script src="/web/assets/js/gsap.min.js"></script>
  <script src="/web/assets/js/ScrollSmoother.min.js"></script>
  <script src="/web/assets/js/ScrollTrigger.min.js"></script>
  <script src="/web/assets/js/smoother-script.js"></script>
  <script src="/web/assets/js/tagify.js"></script>

  <script>
    var wind = $(window);
    wind.on("scroll", function() {

      var bodyScroll = wind.scrollTop(),
        navbar = $(".navbar"),
        logo = $(".navbar.change .logo> img");

      if (bodyScroll > 300) {

        navbar.addClass("nav-scroll");
        logo.attr('src', '/uploads/{{$web_black_logo}}');

      } else {

        navbar.removeClass("nav-scroll");
        logo.attr('src', '/uploads/{{$web_white_logo}}');
      }
    });
    let openOption = @if(app() -> getLocale() == 'ar') {right: 0}@else {left: 0}@endif;
    let closeOption = @if(app() -> getLocale() == 'ar') {right: '-100%'}@else {left: '-100%'}@endif;
    $('.navbar .menu-icon').on('click', function() {

      $('.hamenu').addClass("open");

      $('.hamenu').animate(openOption);

    });
    $('.hamenu .close-menu, .one-scroll .menu-links .main-menu > li').on('click', function() {

      $('.hamenu').removeClass("open").delay(300).animate(closeOption);
      $('.hamenu .menu-links .main-menu .dmenu, .hamenu .menu-links .main-menu .sub-dmenu').removeClass("dopen");
      $('.hamenu .menu-links .main-menu .sub-menu, .hamenu .menu-links .main-menu .sub-menu2').slideUp();

    });
  </script>

  <!-- custom scripts -->
  <script src="/web/assets/js/jquery.toast.min.js"></script>
  <script src="/web/assets/js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script src="https://unpkg.com/vuejs-paginate@latest"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    let baseUrl = @json(env('APP_URL'));
  </script>
  @if(app()->getLocale()=='en')
  <script>
    let elements = document.querySelectorAll(".rolling-text");

    elements.forEach((element) => {
      let innerText = element.innerText;
      element.innerHTML = "";

      let textContainer = document.createElement("div");
      textContainer.classList.add("block");

      for (let letter of innerText) {
        let span = document.createElement("span");
        span.innerText = letter.trim() === "" ? "\xa0" : letter;
        span.classList.add("letter");
        textContainer.appendChild(span);
      }

      element.appendChild(textContainer);
      element.appendChild(textContainer.cloneNode(true));
    });

    elements.forEach((element) => {
      element.addEventListener("mouseover", () => {
        element.classList.remove("play");
      });
    });
  </script>
  @endif
  <script>
      new Vue({
      el: "#auth",
      components: {},
      data: {
        loading: false,
        web_name:"",
        web_login_email:"",
        web_login_password:"",
        show_password:false,
        login_show_password:false,
        web_email:"",
        web_phone:"",
        web_password:"",
        web_country_id:"",
        web_industry:"",
        web_cv:"",
        web_linkedin:"",
        type:"Quick Guest",
      },
      methods: {
        onLoginModalShow(){
          $("#close-register").click();
        },
        onRegisterModalShow(){
          $("#close-login").click();
        },
        onTypeChange(){
          setTimeout(()=>{
          initTagInput();
          },100)
        },
        webUploadCv($event) {
				this.web_cv = $event.target.files[0];
			},
        webRegister() {
              let formData = new FormData();
              if(this.web_name) formData.append("name", this.web_name);
              if(this.web_email) formData.append("email", this.web_email);
              if(this.web_email) formData.append("email", this.web_email);
              if(this.web_phone) formData.append("phone", this.web_phone);
              if(this.web_password) formData.append("password", this.web_password);
              if($("#technology").val()){
                let values="";
              
              JSON.parse($("#technology").val()).forEach((val,index)=>{
                values+=val.value+(index==JSON.parse($("#technology").val()).length-1?"":",");
              })
              if($("#technology").val()) formData.append("technology", values);

              }
              if(this.type) formData.append("user_type", this.type);
              if(this.web_country_id) formData.append("country_id", this.web_country_id);
              if(this.web_industry) formData.append("industry", this.web_industry);
              if(this.web_cv) formData.append("cv", this.web_cv);
              if(this.web_linkedin) formData.append("linkedin", this.web_linkedin);
              if(this.type=='Developer'){
                if(!this.web_cv){
                  $.toast({
                    hideAfter: 5000,
                    text: @json(__('general.Resume is required'))
                  });
                  return;
                }
              }
              this.loading = true;
              axios.post(`${baseUrl}/web/register`, formData).then(res => {
                this.loading = false;
                location.reload();
              }).catch(()=>{
                this.loading = false;
                $.toast({
                    hideAfter: 5000,
                    text: @json(__('general.Email token'))
                  });

              })

        },
        webLogin() {
              this.loading = true;
              axios.post(`${baseUrl}/web/login`, {
                email:this.web_login_email,
                password:this.web_login_password,
              }).then(res => {
                this.loading = false;
                location.reload();
              }).catch(()=>{
                this.loading = false;
                $.toast({
                    hideAfter: 5000,
                    text: @json(__('general.Login faild'))
                  });

              })

        },
      }
    });
  </script>
  <script>
      function  initTagInput(){
        var input = document.querySelector('input[name=input-example]');
new Tagify(input, {
    // options here
});
 
    var textarea = document.querySelector('textarea[name=textarea-example]'),
        tagify =new Tagify(textarea, {
        // options here
    });

      }
  </script>
  @stack('js')
</body>


<!-- Mirrored from ui-themez.smartinnovates.net/items/infolio/Infolio-light/home-main.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2024 13:30:43 GMT -->

</html>