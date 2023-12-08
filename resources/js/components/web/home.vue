<template>
  <div class="home-container">
    <section style="background: #f5f6f7 !important" id="hero" class="hero">
      <video autoplay loop muted>
        <source src="/video/start.mp4" />

        Your browser does not support the video tag.
      </video>
    </section>
    <section id="get-started" class="get-started section-bg">
      <div class="container">
        <div class="row justify-content-between gy-4">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
              <h3>
                {{ $t("Leave us a note and we'll reach out soon") }}
              </h3>
              <p>
                {{ $t("suggesstion_message") }}
              </p>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade">
            <form @submit.prevent="store" class="php-email-form">
              <h3>{{ $t("CONTACT") }}</h3>
              <p>
                {{
                  $t(
                    "Need to get in touch with us? Either fill out the form with your inquiry or find the department email you'd like to contact below."
                  )
                }}
              </p>
              <div class="row gy-3">
                <div class="col-md-12">
                  <input
                    type="text"
                    name="name"
                    class="form-control"
                    v-model="v$.name.$model"
                    :class="{
                      'is-invalid': v$.name.$error,
                    }"
                    :placeholder="$t('NAME')"
                  />
                  <div class="invalid-feedback">
                    <div v-for="error in v$.name.$errors" :key="error">
                      {{ $t("NAME") + " " + $t(error.$validator) }}
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <input
                    type="email"
                    class="form-control"
                    v-model="v$.email.$model"
                    :class="{
                      'is-invalid': v$.email.$error,
                    }"
                    :placeholder="$t('EMAIL')"
                  />
                  <div class="invalid-feedback">
                    <div v-for="error in v$.email.$errors" :key="error">
                      {{ $t("EMAIL") + " " + $t(error.$validator) }}
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <input
                    v-model="v$.phone.$model"
                    :class="{
                      'is-invalid': v$.phone.$error,
                    }"
                    type="text"
                    class="form-control"
                    name="phone"
                    :placeholder="$t('PHONE')"
                  />
                  <div class="invalid-feedback">
                    <div v-for="error in v$.phone.$errors" :key="error">
                      {{ $t("PHONE") + " " + $t(error.$validator) }}
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <textarea
                    class="form-control"
                    v-model="message"
                    name="message"
                    rows="6"
                    :placeholder="$t('MESSAGE')"
                  ></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit">{{ $t("SEND_MESSAGE") }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>{{ $t("EVENTS") }}</h2>
          <p>
            {{ setting.event_body }}
          </p>
        </div>

        <div
          class="portfolio-isotope"
          data-portfolio-filter="*"
          data-portfolio-layout="masonry"
          data-portfolio-sort="original-order"
        >
          <!-- End Projects Filters -->

          <div
            class="row gy-4 portfolio-container"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div
              v-for="event in events"
              :key="event.id"
              class="col-lg-4 col-md-6 portfolio-item"
            >
              <div class="portfolio-content h-100">
                <img
                  :src="
                    event.media_manager
                      ? `/uploads/${event.media_manager.hash_name}`
                      : '/images/placeholder-thumb.png'
                  "
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>{{ event.name }}</h4>
                  <p>{{ event.description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="team" class="team section-bg">
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
    <!-- ======= Our Projects Section ======= -->

    <!-- End Testimonials Section -->

    <!-- ======= Our Team Section ======= -->

    <!-- End Our Team Section -->
    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>{{ $t("Recent Blog Posts") }}</h2>
          <p>
            {{ setting.blog_body }}
          </p>
        </div>

        <div class="row gy-5">
          <div
            v-for="blog in blogs"
            :key="blog.id"
            class="col-xl-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="post-item position-relative h-100">
              <div class="post-img position-relative overflow-hidden">
                <img
                  :src="
                    blog.media_manager
                      ? `/uploads/${blog.media_manager.hash_name}`
                      : '/images/placeholder-thumb.png'
                  "
                  class="img-fluid"
                  alt=""
                />
                <span class="post-date">{{ blog.created_at }}</span>
              </div>

              <div class="post-content d-flex flex-column">
                <h3 class="post-title">
                  {{ blog.name }}
                </h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i>
                    <span class="ps-2">{{ blog.author }}</span>
                  </div>
                </div>

                <hr />

                <router-link
                  :to="`/blogs/${blog.id}`"
                  class="readmore stretched-link"
                  ><span>{{ $t("Read More") }}</span
                  ><i class="bi bi-arrow-right"></i
                ></router-link>
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
  </div>
</template>

<script>
import { inject, onMounted, reactive, ref, toRefs } from "vue";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";

import { toast } from "vue3-toastify";

import contactClient from "../../http-clients/web/contact-client";
import eventClient from "../../http-clients/web/event-client";
import { useI18n } from "vue-i18n";
import supervisorClient from "../../http-clients/web/supervisor-client";
import platformEmployeeClient from "../../http-clients/web/platform-employee-client";
import blogClient from "../../http-clients/web/blog-client";

export default {
  setup() {
    // Form setup
    const { t, locale } = useI18n({ useScope: "global" });
    const __store = inject("store");
    const data = reactive({
      events: [],
      limit: 9,
      supervisors: [],
      employees: [],
      blogs: [],
    });
    onMounted(() => {
      eventClient.getEvents(data.limit).then((res) => {
        data.events = res.data;
      });
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
      platformEmployeeClient
        .getEmployees(data.limit)
        .then((res) => (data.employees = res.data));
      blogClient.getBlogs(data.limit).then((res) => (data.blogs = res.data));
    });
    const form = reactive({
      name: "",
      phone: "",
      email: "",
      message: "",
    });

    const rules = {
      name: { required },
      email: { required, email },
      phone: { required },
    };

    const v$ = useVuelidate(rules, form);

    // Methods
    function getForm() {
      return {
        name: form.name,
        email: form.email,
        phone: form.phone,
        message: form.message,
      };
    }

    function store() {
      if (v$.value.$invalid) {
        v$.value.$touch();
        return;
      }
      contactClient
        .store(getForm())
        .then(() => {
          v$.value.$reset();
          form.name = "";
          form.phone = "";
          form.email = "";
          form.message = "";
          toast.success(t("SENT_SUCCESSFULLY"), {
            autoClose: 2000,
            position: "top-center",
          });
        })
        .catch((error) => {
          // Handle the error
        });
    }

    return {
      store,
      ...toRefs(__store),
      ...toRefs(form),
      ...toRefs(data),

      v$,
    };
  },
};
</script>

<style lang="scss">
.web-header {
  background-color: black !important;
  position: relative !important;
  padding-bottom: 15px !important;
}

.web-header .logo img {
  max-height: 40px;
  margin-left: 6px;
  height: 40px;
}
.web-lang-container {
  border-color: rgb(68 68 68) !important;
}
.sec-button {
  gap: 20px;
  a {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    height: 49px;
    background: var(--color-primary);
    border: none;
    color: #fff;
    font-size: 15px;
  }
}
.constructions {
  display: flex;
  height: 400px;
  align-items: center;

  .section-header {
    padding-bottom: 30px;
  }
}

#hero {
  width: 100%;
  max-width: 100% !important;
}
#hero video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  max-width: 100%;
  max-height: 100%;
}
#welcome-section .info {
  position: relative;
  inset: 0;
  z-index: 2;
}

#welcome-section .info .btn-get-started {
  font-family: var(--font-primary);
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 40px;
  border-radius: 50px;
  margin: 10px;
  color: #fff;
  border: 2px solid var(--color-primary);
  background-color: #5ae4aa;
}

#welcome-section .logo-black {
  margin-bottom: 20px;
}
#welcome-section .logo-black img {
  width: 170px;
  height: 100%;
  border-bottom: 0.3rem solid #5ae4aa;
  padding-bottom: 15px;
}

#welcome-section .info p {
  color: #181818 !important;
  margin-bottom: 10px;
}
#welcome-section {
  padding: 60px 0 !important;
}

#welcome-section {
  .logo-black {
    margin-left: auto;
    margin-right: auto;
    position: relative;
    width: 300px;
    height: 300px;
    &::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: -1;
      border-radius: 50%;
      background: linear-gradient(to right, #1dcf94 50%, #000 50%);
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      animation: circle-move 3s ease-in-out infinite;
    }
  }
  @keyframes circle-move {
    0% {
      transform: rotate(0deg);
    }
    50% {
      transform: rotate(360deg);
    }
    100% {
      transform: rotate(0deg);
    }
  }
  video {
    object-fit: contain;
    border: 1px solid var(--color-primary);
    width: 100% !important;
    height: 100% !important;
    border-radius: 50% !important;
    position: relative !important;
    text-align: center !important;
    padding: 4px !important;
    cursor: pointer !important;
  }
}
.home-container {
  .get-started .php-email-form button[type="submit"] {
    &:hover {
      background: var(--color-primary);
    }
  }
  .apply-now {
    margin-top: 40px !important;
  }
  .install-contact-us,
  .apply-now {
    &:hover {
      color: white;
      cursor: pointer;
    }
    width: 140px;
    height: 45px;
    border: 1px solid #5ae4aa;
    border-radius: 9px;
    color: white;
    background: #5ae4aa;
    margin-top: 19px;
    // font-size: 15px;
    font-weight: 600;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .close-video {
    top: -21px;
    right: -45px;
    position: absolute;
    width: 20px;
    height: 30px;
    background: none;
    color: #fff;
    border: none;
    font-size: 36px;
  }
  body[dir="ltr"] & {
    .sec-button {
      a {
        width: 170px;
      }
    }
  }
  @media (max-width: "700px") {
    body[dir="rtl"] & {
      .close-video {
        position: absolute !important;
        top: 6px !important;
        right: 7px !important;
      }
    }
    body[dir="ltr"] & {
      .sec-button {
        a {
          width: 170px;
        }
      }
      .close-video {
        position: absolute !important;
        top: -9px !important;
        right: 16px !important;
      }
    }
  }

  body[dir="rtl"] & {
    .sec-button {
      a {
        width: 140px;
      }
    }
    .php-email-form .form-control::placeholder {
      font-size: 13px !important;
    }
    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
      background: #5ae4aa;
      opacity: 1 !important;
      color: #fff;
    }
    p.aos-init.aos-animate {
      line-height: 29px !important;
      // font-weight: 600 !important;
      // font-size: 20px !important;
    }
    .btn-get-started {
      font-weight: 600 !important;
      font-size: 19px !important;
    }
    .get-started .php-email-form button[type="submit"] {
      padding: 6px 30px;
      font-weight: 600 !important;
    }
  }
  .modal-content {
    background-color: unset !important;
    border-radius: 0 !important;
  }
}
</style>

