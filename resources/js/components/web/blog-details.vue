<template>
  <div class="blog-details-container">
    <!-- ======= Breadcrumbs ======= -->
    <div
      class="breadcrumbs d-flex align-items-center"
      style="background-image: url('/images/Banner.jpg')"
    >
      <div
        class="container position-relative d-flex flex-column align-items-center"
        data-aos="fade"
      >
        <h2>{{$t("Blog Details")}}</h2>
        <ol>
          <li><router-link to="/home">{{$t("HOME")}}</router-link></li>
          <li>{{$t("Blog Details")}}</li>
        </ol>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5">
          <div class="col-lg-8">
            <article class="blog-details">
              <div class="post-img">
                <img
                  :src="
                    blog.media_manager
                      ? `/uploads/${blog.media_manager.hash_name}`
                      : '/images/placeholder-thumb.png'
                  "
                  alt=""
                />
              </div>
              <h2 class="title">
                {{ blog.name }}
              </h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-person"></i>
                    <a href="">
                      {{ blog.author }}
                    </a>
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i>
                    <a href="">
                      {{ blog.created_at }}
                    </a>
                  </li>
                </ul>
              </div>
              <!-- End meta top -->

              <div class="content">
                <p>
                  {{ blog.description }}
                </p>
              </div>
            </article>
            <!-- End blog post -->
          </div>

          <div class="col-lg-4">
            <div class="sidebar">
              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">{{$t("Recent Posts")}}</h3>

                <div class="mt-3">
                  <div class="post-item mt-3">
                    <img
                      :src="
                        blog.media_manager
                          ? `/uploads/${blog.media_manager.hash_name}`
                          : '/images/placeholder-thumb.png'
                      "
                      alt=""
                    />
                    <div>
                      <h4>
                        <a href="#">{{ blog.name }}</a>
                      </h4>
                      <time datetime="2020-01-01">{{ blog.created_at }}</time>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End sidebar recent posts-->
            </div>
            <!-- End Blog Sidebar -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Blog Details Section -->
  </div>
</template>

<script>
import { onMounted, reactive, ref, toRefs } from "vue";
import useVuelidate from "@vuelidate/core";
import { useI18n } from "vue-i18n";
import blogClient from "../../http-clients/web/blog-client";
import { useRoute } from "vue-router";

export default {
  setup() {
    // Form setup
    const route = useRoute();
    const { t, locale } = useI18n({ useScope: "global" });
    const data = reactive({
      blog: {},
      blogs: [],
    });
    onMounted(() => {
      blogClient.getItem(route.params.id).then((res) => {
        data.blog = res.data;
        data.selectedMedia = res.data.media_manager
          ? [res.data.media_manager]
          : [];
      });
      blogClient.getLatestBlogs().then((res) => {
        data.blogs = res.data;
      });
    });
    const rules = {};
    const v$ = useVuelidate(rules);
    return {
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

