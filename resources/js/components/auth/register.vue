<template>
  <!-- ======= Breadcrumbs ======= -->
  <div
    class="breadcrumbs d-flex align-items-center"
    style="background-image: url('/images/Banner.jpg')"
  >
    <div
      class="container position-relative d-flex flex-column align-items-center"
      data-aos="fade"
    >
      <h2>{{ $t("REGISTER") }}</h2>
      <ol>
        <li>
          <router-link to="/home">{{ $t("HOME") }}</router-link>
        </li>
        <li>{{ $t("REGISTER") }}</li>
      </ol>
    </div>
  </div>
  <!-- End Breadcrumbs -->x

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-6">
          <div
            class="info-item d-flex flex-column justify-content-center align-items-center"
          >
            <i class="bi bi-map"></i>
            <h3>{{ $t("Our Address") }}</h3>
            <p class="address-p">{{ setting.address }}</p>
          </div>
        </div>
        <!-- End Info Item -->

        <div class="col-lg-3 col-md-6">
          <div
            class="info-item d-flex flex-column justify-content-center align-items-center"
          >
            <i class="bi bi-envelope"></i>
            <h3>{{ $t("Email Us") }}</h3>
            <p>{{ setting.email }}</p>
          </div>
        </div>
        <!-- End Info Item -->

        <div class="col-lg-3 col-md-6">
          <div
            class="info-item d-flex flex-column justify-content-center align-items-center"
          >
            <i class="bi bi-telephone"></i>
            <h3>{{ $t("Call Us") }}</h3>
            <p dir="ltr">{{ setting.phone }}</p>
          </div>
        </div>
        <!-- End Info Item -->
      </div>

      <div class="row gy-4 mt-1">
        <div class="col-lg-6">
          <iframe
            :src="setting.map_position"
            frameborder="0"
            style="border: 0; width: 100%; height: 384px"
            allowfullscreen
          ></iframe>
        </div>
        <!-- End Google Maps -->

        <div class="col-lg-6">
          <form @submit.prevent="store" role="form" class="php-email-form">
            <div class="row gy-4">
              <div class="col-lg-12 form-group">
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  id="name"
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
              <div class="col-lg-12 form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="v$.email.$model"
                  :class="{
                    'is-invalid': v$.email.$error || emailExist,
                  }"
                  :placeholder="$t('EMAIL')"
                />
                <div class="invalid-feedback">
                  <div v-for="error in v$.email.$errors" :key="error">
                    {{ $t("EMAIL") + " " + $t(error.$validator) }}
                  </div>
                  <div v-if="!v$.email.$invalid && emailExist">
                    {{ $t("EMAIL") + " " + $t("EXIST") }}
                  </div>
                </div>
              </div>
              <div class="col-lg-12 form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="v$.phone.$model"
                  :class="{
                    'is-invalid': v$.phone.$error,
                  }"
                  :placeholder="$t('PHONE')"
                />
                <div class="invalid-feedback">
                  <div v-for="error in v$.phone.$errors" :key="error">
                    {{ $t("PHONE") + " " + $t(error.$validator) }}
                  </div>
                </div>
              </div>
              <div class="col-lg-12 form-group">
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  v-model="v$.password.$model"
                  :class="{
                    'is-invalid': v$.password.$error,
                  }"
                  :placeholder="$t('PASSWORD')"
                />
                <div class="invalid-feedback">
                  <div v-for="error in v$.password.$errors" :key="error">
                    {{ $t("PASSWORD") + " " + $t(error.$validator) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="submit">{{ $t("REGISTER") }}</button>
            </div>
          </form>
        </div>
        <!-- End Contact Form -->
      </div>
    </div>
  </section>
  <!-- End Contact Section -->
</template>

<script>
import TokenUtil from "../../shared/utils/token-util";
import global from "../../shared/global";

import { required, email } from "@vuelidate/validators";
import authClient from "../../http-clients/web/auth-client";
import { toast } from "vue3-toastify";
import { inject, reactive, toRefs } from "vue";
import { useI18n } from "vue-i18n";
import useVuelidate from "@vuelidate/core";
import { useRouter } from "vue-router";
export default {
  setup() {
    const router = useRouter();
    const { t, locale } = useI18n({ useScope: "global" });
    const __store = inject("store");
    const form = reactive({
      name: "",
      email: "",
      password: "",
      phone: "",
    });
    const data = reactive({
      emailExist: false,
    });
    const rules = {
      name: { required },
      email: { required, email },
      password: { required },
      phone: { required },
    };
    const v$ = useVuelidate(rules, form);
    function getForm() {
      return {
        name: form.name,
        email: form.email,
        password: form.password,
        phone: form.password,
      };
    }
    function store() {
      if (v$.value.$invalid) {
        v$.value.$touch();
        return;
      }
      authClient
        .register(getForm())
        .then((response) => {
          v$.value.$reset();
          TokenUtil.set(response.data.access_token);
          __store.currentUser = TokenUtil.getUser();
          router.push(global.AUTH_REDIRECT);
        })
        .catch((error) => {
          data.emailExist = error.response.data.errors.email ? true : false;
        });
    }
    return {
      store,
      ...toRefs(form),
      ...toRefs(data),
      ...toRefs(__store),
      v$,
    };
  },
};
</script>

<style lang="scss">
.contact .php-email-form button[type="submit"] {
  &:hover {
    background: var(--color-primary);
  }
}
.php-email-form .form-control::placeholder,
.invalid-feedback {
  font-size: 13px !important;
}
@media (max-width: 450px) {
  .info-item {
    p.address-p {
      padding: 0 25px;
      text-align: center;
    }
  }
}
</style>