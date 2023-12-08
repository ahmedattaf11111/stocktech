<template>
  <div>
    <Loader color="#5ae4aa" />
    <PageLoader color="#5ae4aa" />
    <!-- ======= Header ======= -->
    <header id="header" class="web-header header d-flex align-items-center">
            <Lang :page="route.name" />

      <div
      style="margin-top: 19px;"
        dir="ltr"
        class="container-fluid container-xl d-flex align-items-center justify-content-between"
      >
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1><img src="/web/assets/img/white-logo.png" /></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <router-link
                to="/home"
                :class="{ active: currentPage == 'home' }"
                >{{ $t("HOME") }}</router-link
              >
            </li>
            
            <li>
              <router-link
                :class="{ active: currentPage == 'blogs' }"
                to="/blogs"
                >{{ $t("BLOGS") }}</router-link
              >
            </li>
            <li>
              <router-link
                :class="{ active: currentPage == 'events' }"
                to="/events"
                >{{ $t("EVENTS") }}</router-link
              >
            </li>
            
            <li>
              <router-link
                :class="{ active: currentPage == 'about' }"
                to="/about"
                >{{ $t("ABOUT") }}
              </router-link>
            </li>
            
             <li v-if="!currentUser" class="dropdown">
              <a :class="{ active: currentPage == 'register' }" href="#"
                ><span>{{ $t("REGISTER") }}</span>
                <i class="bi bi-chevron-down dropdown-indicator"></i
              ></a>
              <ul>
                <li>
                <router-link
                to="/register"
                >{{ $t("REGISTER") }}</router-link
              >
                </li>
               <li>
                 <router-link
                to="/login"
                >{{ $t("LOGIN") }}</router-link
              ></li> 
              </ul>
            </li>
             <li v-else class="dropdown">
              <a  href="#"
                ><span>{{ currentUser.name }}</span>
                <i class="bi bi-chevron-down dropdown-indicator"></i
              ></a>
              <ul>
                <li>
                <router-link
                to=""
                >{{ currentUser.name }}</router-link>
                </li>
               <li>
                 <router-link @click="logout" to="">
                  {{$t("LOGOUT")}}
                </router-link>
                </li> 
              </ul>
            </li>
            
          </ul>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->
    <main id="main">
      <router-view />
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="footer-content position-relative">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>{{$t("CONTACT")}}</h3>
                <p>
                  <div>{{setting.address}}</div>
                  <div style="margin-top:20px">
                  {{ $t("PHONE") }} : <span dir="ltr">{{setting.phone}}</span>
                  </div>
                  <div>
                  {{ $t("EMAIL") }} : {{setting.email}}</div>
                </p>
                <div class="social-links d-flex mt-3">
                  
                  <a
                  target="__blank"
                    :href="setting.instgram"
                    class="d-flex align-items-center justify-content-center"
                    ><i class="bi bi-instagram"></i
                  ></a>
                  
                  <a
                  target="__blank"
                    :href="setting.twitter"
                    class="d-flex align-items-center justify-content-center"
                    ><i class="bi bi-twitter"></i
                  ></a>
                  <a
                  target="__blank"
                    :href="setting.snapchat"
                    class="d-flex align-items-center justify-content-center"
                    ><i class="bi bi-snapchat"></i
                  ></a>

                  <a
                                      target="__blank"
                    :href="setting.youtube"

                    class="d-flex align-items-center justify-content-center"
                    ><i class="bi bi-youtube"></i
                  ></a>

                  <a
                                      target="__blank"
                    :href="setting.facebook"

                    class="d-flex align-items-center justify-content-center"
                    ><i class="bi bi-facebook"></i
                  ></a>
                  <a
                                      target="__blank"
                    :href="setting.linkedin"

                    class="d-flex align-items-center justify-content-center"
                    ><i class="bi bi-linkedin"></i
                  ></a>
                </div>
              </div>
            </div>
            
            <!-- End footer info column-->

            <div class="col-lg-2 col-md-3 footer-links">
              <h4>{{$t("Useful Links")}}</h4>
              <ul>
                <li>
                  <router-link to="/home">{{ $t("HOME") }}</router-link>
                </li>
                <li>
                  <router-link to="/events">{{ $t("EVENTS") }}</router-link>
                </li>
                <li>
                  <router-link to="/blogs">{{ $t("BLOGS") }}</router-link>
                </li>
                <li>
                  <router-link to="/about">{{ $t("ABOUT") }}</router-link>
                </li>
                
              </ul>
            </div>
            <!-- End footer links column-->

            <div class="col-lg-6 footer-links">
              <h4>{{$t("ABOUT")}}</h4>
              <div>
                {{setting.footer_about_us}}
              </div>
            </div>
            <!-- End footer links column-->

            <!-- <div class="col-lg-2 col-md-3 footer-links">
              <h4>{{$t("CATEGORIES")}}</h4>
              <ul>
                <li>
                  <router-link
                    :to="`/products/all`"
                  >
                    {{ $t("All Categories") }}
                  </router-link>
                </li>
                <li v-for="category in categories" :key="category.id">
                  <router-link
                    :to="`/products/${category.id}`"
                  >
                    {{
                      $i18n.locale == "ar" ? category.name_ar : category.name_en
                    }}
                  </router-link>
                </li>
              </ul>
            </div> -->
            <!-- End footer links column-->

            <!-- <div class="col-lg-2 col-md-3 footer-links">
              <h4>{{$t("OUR_STORE")}}</h4>
              <ul>
                <li><a target="__blank" href="https://sd.sa">{{$t("HOME")}}</a></li>
                <li><a target="__blank" href="https://sd.sa/products">{{$t("PRODUCTS")}}</a></li>
                <li><a target="__blank" href="https://sd.sa/blogs/monitoring-service">{{$t("NOTIFICATIONS_SERVICE")}}</a></li>
      settingClient.getItem().then((res) => (data.setting = res.data));
                <li><a target="__blank" href="https://ajax.systems/translator">{{$t("AJAX_TRANSLATOR")}}</a></li>
                <li><a target="__blank" href="https://sd.sa/blogs/installation-service">{{$t("INSTALLATION_SERVICE")}}</a></li>
              </ul>
            </div> -->
            <!-- End footer links column-->
          </div>
        </div>
      </div>

      <div class="footer-legal text-center position-relative">
        <div class="container">
          <div v-if="$i18n.locale=='en'" class="copyright">
             All Rights Reserved &copy; {{(new Date()).getFullYear()}} <strong><span>Al-elbeet</span></strong
            >
          </div>
          <div v-if="$i18n.locale=='ar'" class="copyright">
             جميع الحقوق محفوظة &copy; {{(new Date()).getFullYear()}} <strong><span>ال البيت</span></strong
            >
          </div>
          
        </div>
      </div>
    </footer>
    <a
      href="#"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- End Footer -->
  </div>
</template>
<script>
import Lang from "../shared/components/lang-web.vue";
import LangUtil from "../shared/utils/lang-util";
import { inject, onMounted, provide, reactive, toRefs, watch } from "vue";
import Loader from "../shared/components/loader.vue";
import PageLoader from "../shared/components/pageLoader.vue";
import { useRoute } from "vue-router";
import settingClient from "../http-clients/web/setting-client";
import TokenUtil from "../shared/utils/token-util";
import authClient from "../http-clients/web/auth-client";

export default {
  components: { Lang, LangUtil, Loader, PageLoader },
  setup() {
    const lang = LangUtil.setup();
    const route = useRoute();
    const data = reactive({
      currentPage: "home",
      categories: [],
    });
    const store = inject("store");
    onMounted(() => {
      store.currentUser = TokenUtil.getUser();
      lang.changeWebLang(LangUtil.get());
      data.currentPage = route.name;
      settingClient.getItem().then((res) => {
        store.setting = res.data ? res.data : {};
      });
    });
    watch(
      () => route.name,
      () => {
        if (
          (route.name == "install") |
          (route.name == "notification-service")
        ) {
          data.currentPage = "services";
        } else {
          data.currentPage = route.name;
        }
      }
    );
    //Methods
    function logout() {
      authClient.logout().then(() => {
        TokenUtil.remove();
        store.currentUser = null;
        router.push(global.AUTH_REDIRECT);
      });
    }
    function onAssemblekitClicked() {
      data.currentPage = "assemble-kit";
      localStorage.removeItem("protectionTypeValues");
      localStorage.removeItem("premiseTypeValue");
      localStorage.removeItem("premiseFeatures");
      localStorage.removeItem("currentStep");
    }
    function getCategories() {
      productClient.getCategories().then((res) => {
        data.categories = res.data.slice(0, 4);
      });
    }
    return {
      logout,
      ...toRefs(data),
      onAssemblekitClicked,
      route: route,
      ...toRefs(store),
    };
  },



};
</script>
<style  lang="scss">
#footer {
  padding: 80px 0 25px 0 !important;
  background: url('/images/Footer.jpg');
}
.navbar .dropdown a:hover {
  cursor: pointer;
}
.scroll-top {
  &:hover {
    background: var(--color-primary);
  }
  i {
    color: #fff;
  }
}
body[dir="rtl"] {
  .navbar ul {
    direction: rtl;
  }
  .navbar .dropdown ul a {
    font-size: 13.5px;
  }
}
</style>