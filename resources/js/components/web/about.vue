<template>
  <div class="about-container">
    <!-- ======= Breadcrumbs ======= -->
    <div
      class="breadcrumbs d-flex align-items-center"
      style="background-image: url('/images/Banner.jpg')"
    >
      <div
        class="container position-relative d-flex flex-column align-items-center"
        data-aos="fade"
      >
        <h2>{{ $t("ABOUT") }}</h2>
        <ol>
          <li>
            <router-link to="/home">{{ $t("HOME") }}</router-link>
          </li>
          <li>{{ $t("ABOUT") }}</li>
        </ol>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row position-relative">
          <div
            class="col-lg-7 about-img"
            :style="`background-image: url(${
              about.media_manager
                ? `/uploads/${about.media_manager.hash_name}`
                : '/images/placeholder-thumb.png'
            })`"
          ></div>

          <div class="col-lg-7">
            <h2>{{ about.main_header }}</h2>
            <div class="our-story">
              <h4>{{ about.small_header }}</h4>
              <h3>{{ about.second_header }}</h3>
              <p>
                {{ about.first_body }}
              </p>
              <ul>
                <li>
                  <i class="bi bi-check-circle"></i>
                  <span> {{ about.point_one }} </span>
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  <span> {{ about.point_tow }} </span>
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  <span> {{ about.point_three }} </span>
                </li>
              </ul>
              <p>
                {{ about.second_body }}
              </p>

              <div
                class="watch-video d-flex align-items-center position-relative"
              >
                <i class="bi bi-play-circle"></i>
                <a target="__blank" :href="about.video_url" class="">{{
                  $t("Watch Video")
                }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>{{ $t("SUPERVISORS") }}</h2>
          <p>
            {{ setting.supervisor_body }}
          </p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">
            <div
              v-for="supervisor in supervisors"
              :key="supervisor.id"
              class="swiper-slide"
            >
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img
                    :src="
                      supervisor.media_manager
                        ? `/uploads/${supervisor.media_manager.hash_name}`
                        : '/images/placeholder-thumb.png'
                    "
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>{{ supervisor.name }}</h3>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    {{ supervisor.description }}
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <!-- End About Section -->

    <!-- End Blog Section -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>{{ $t("PLATFORM_EMPLOYEES") }}</h2>
          <p>
            {{ setting.employee_body }}
          </p>
        </div>

        <div class="row gy-5">
          <div
            v-for="employee in employees"
            :key="employee.id"
            class="col-lg-4 col-md-6 member"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="member-img">
              <img
                :src="
                  employee.media_manager
                    ? `/uploads/${employee.media_manager.hash_name}`
                    : '/images/placeholder-thumb.png'
                "
                class="img-fluid"
                alt=""
              />
            </div>
            <div class="member-info text-center">
              <h4>{{ employee.name }}</h4>
              <p>
                {{ employee.description }}
              </p>
            </div>
          </div>
          <!-- End Team Member -->
        </div>
      </div>
    </section>
  </div>
</template>

<script>

import { inject, onMounted, reactive, ref, toRefs } from "vue";
import useVuelidate from "@vuelidate/core";
import { useI18n } from "vue-i18n";
import aboutClient from "../../http-clients/web/about-client";
import supervisorClient from "../../http-clients/web/supervisor-client";
import employeePlayformClient from "../../http-clients/web/platform-employee-client";
import { useRoute } from "vue-router";
import Paginate from "vuejs-paginate-next";

export default {
  components: {
    Paginate,
  },
  setup() {
    // Form setup
    const route = useRoute();
    const { t, locale } = useI18n({ useScope: "global" });
    const store = inject("store");
    const data = reactive({
      pageSize: 6,
      page: 1,
      items: [],
      pageCounts: 0,
      totalItems: 0,
      about: {},
      limit: 6,
      supervisors: [],
      employees: [],
    });
    onMounted(() => {
      aboutClient.getItem().then((res) => (data.about = res.data));
      supervisorClient.getSupervisors(data.limit).then((res) => {
        data.supervisors = res.data;
        setTimeout(() => {
          new Swiper(".slides-2", {
            speed: 600,
            loop: true,
            autoplay: {
              delay: 5000,
              disableOnInteraction: false,
            },
            slidesPerView: "auto",
            pagination: {
              el: ".swiper-pagination",
              type: "bullets",
              clickable: true,
            },
            rtl: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            breakpoints: {
              320: {
                slidesPerView: 1,
                spaceBetween: 20,
              },

              1200: {
                slidesPerView: 2,
                spaceBetween: 20,
              },
            },
          });
        }, 500);
      });
      employeePlayformClient
        .getEmployees(data.limit)
        .then((res) => (data.employees = res.data));
    });
    const rules = {};
    const v$ = useVuelidate(rules);
    //Methods
    function getItems() {
      blogClient
        .getItems(data.page, data.pageSize)
        .then((response) => {
          data.items = response.data.data;
          data.pageCounts = Math.ceil(response.data.total / data.pageSize);
          data.totalItems = response.data.total;
        })
        .catch((error) => {});
    }
    return {
      getItems,
      ...toRefs(data),
      ...toRefs(store),
      v$,
    };
  },
};
</script>

<style lang="scss">
.about-container {
  .page-link:hover {
    cursor: pointer;
  }
  .page-link {
    align-items: center;
    justify-content: center;
    display: flex;
    border-radius: 0px;
    width: 40px;
    height: 34px;
    border: none;
  }
  .page-item.active .page-link {
    background-color: var(--color-primary);
  }
  .page-item {
    padding: 0 5px;
  }
}
</style>

