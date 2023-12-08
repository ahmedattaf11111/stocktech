<template>
  <div class="student-form">
    <div class="page-header border" style="margin-top: 10px">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            {{ $t("SETTINGS") }}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div
        class="col-lg-9 order-lg-1 order-2"
        :style="
          $i18n.locale == 'en' ? 'padding-right:10px' : 'padding-left:10px'
        "
      >
        <div
          id="basic-information"
          class="form-container bg-white border border-radius-4 mb-30"
        >
          <div class="create-item">
            <div class="title mb-4">{{ $t("BASIC_INFORMATION") }}</div>
            <div class="row">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">
                    {{ $t("EMAIL") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_EMAIL')"
                    type="text"
                    class="form-control"
                    v-model="v$.email.$model"
                    :class="{
                      'is-invalid': v$.email.$error || titleArExist,
                    }"
                  />
                  <div class="invalid-feedback">
                    <div v-for="error in v$.email.$errors" :key="error">
                      {{ $t("EMAIL") + " " + $t(error.$validator) }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">
                    {{ $t("PHONE") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_PHONE')"
                    type="text"
                    class="form-control"
                    v-model="phone"
                  />
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">
                    {{ $t("ADDRESS") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_ADDRESS')"
                    type="text"
                    class="form-control"
                    v-model="address"
                  />
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">
                    {{ $t("MAP_POSITION") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_MAP_POSITION')"
                    type="text"
                    class="form-control"
                    v-model="map_position"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          id="about"
          class="form-container bg-white border border-radius-4 mb-30"
        >
          <div class="create-item">
            <div class="title mb-4">{{ $t("ABOUT") }}</div>
            <div class="row">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <textarea
                    :placeholder="$t('ABOUT')"
                    type="text"
                    class="form-control"
                    v-model="footer_about_us"
                  >
                  </textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="employee-supervisor-content" class="row">
          <div class="col-lg-12">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("EMPLOYEE_SUPERVISOR_CONTENT") }}
                </div>
                <div class="form-group">
                  <textarea
                    :placeholder="$t('TYPE_EMPLOYEE_CONTENT')"
                    type="text"
                    class="form-control"
                    v-model="employee_body"
                  >
                  </textarea>
                </div>
                <div class="form-group">
                  <textarea
                    :placeholder="$t('TYPE_SUPERVISOR_CONTENT')"
                    type="text"
                    class="form-control"
                    v-model="supervisor_body"
                  >
                  </textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="event-blog-content" class="row">
          <div class="col-lg-12">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("EVENT_CLIENT_CONTENT") }}
                </div>
                <div class="form-group">
                  <textarea
                    :placeholder="$t('TYPE_EVENT_CONTENT')"
                    type="text"
                    class="form-control"
                    v-model="event_body"
                  >
                  </textarea>
                </div>
                <div class="form-group">
                  <textarea
                    :placeholder="$t('TYPE_BLOG_CONTENT')"
                    type="text"
                    class="form-control"
                    v-model="blog_body"
                  >
                  </textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="socials" class="row">
          <div class="col-lg-12">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("SOCIAL_MEDIA") }}
                </div>
                <div class="row">
                  <div class="col-lg-4 mb-3">
                    <div class="form-gorup">
                      <input
                        :placeholder="$t('FACEBOOK')"
                        class="form-control"
                        v-model="facebook"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-gorup">
                      <input
                        class="form-control"
                        :placeholder="$t('TWITTER')"
                        v-model="twitter"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-gorup">
                      <input
                        class="form-control"
                        v-model="youtube"
                        :placeholder="$t('YOUTUBE')"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-gorup">
                      <input
                        :placeholder="$t('INSTGRAM')"
                        class="form-control"
                        v-model="instgram"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-gorup">
                      <input
                        class="form-control"
                        :placeholder="$t('SNAPCHAT')"
                        v-model="snapchat"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-gorup">
                      <input
                        class="form-control"
                        v-model="linkedin"
                        :placeholder="$t('LINKEDIN')"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <button @click="save" class="btn btn-primary save-submit">
          <i class="fa fa-save"></i>
          {{ $t("SAVE") }}
        </button>
      </div>
      <div class="col-lg-3 order-lg-2 order-1">
        <div
          class="bg-white information-container border border-radius-4 mb-30"
        >
          <div class="information">
            <div class="title">{{ $t("SETTING_INFORMATION") }}</div>
            <ul>
              <a
                id="a__basic-information"
                @click="currentSection = 'basic-information'"
                href="#basic-information"
              >
                <li :class="{ active: currentSection == 'basic-information' }">
                  {{ $t("BASIC_INFORMATION") }}
                </li>
              </a>
              <a id="a__about" @click="currentSection = 'about'" href="#about">
                <li
                  :class="{ active: currentSection == 'about' }"
                  class="add-new-tax"
                >
                  {{ $t("ABOUT") }}
                </li>
              </a>

              <a
                id="a__employee-supervisor-content"
                @click="currentSection = 'employee-supervisor-content'"
                href="#employee-supervisor-content"
              >
                <li
                  :class="{
                    active: currentSection == 'employee-supervisor-content',
                  }"
                >
                  {{ $t("EMPLOYEE_SUPERVISOR_CONTENT") }}
                </li>
              </a>
              <a
                id="a__event-blog-content"
                @click="currentSection = 'event-blog-content'"
                href="#event-blog-content"
              >
                <li
                  :class="{ active: currentSection == 'event-blog-content' }"
                  class="add-new-tax"
                >
                  {{ $t("EVENT_BLOG_CONTENT") }}
                </li>
              </a>

              <a
                id="a__socials"
                @click="currentSection = 'socials'"
                href="#socials"
              >
                <li
                  :class="{ active: currentSection == 'socials' }"
                  class="add-new-tax"
                >
                  {{ $t("SOCIAL_MEDIA") }}
                </li>
              </a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import Multiselect from "@vueform/multiselect";

import useVuelidate from "@vuelidate/core";
import { required, email, helpers } from "@vuelidate/validators";
import settingClient from "../../../http-clients/admin/setting-client";
import { computed, inject, onMounted, reactive, toRefs, watch } from "vue-demi";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import Image from "../../../shared/components/image.vue";
export default {
  components: {
    Image,
    Multiselect,
  },
  setup(props, context) {
    const route = useRoute();
    const { t, locale } = useI18n({ useScope: "global" });
    const item_store = inject("item_store");
    const data = reactive({
      isArabic: false,
      currentSection: "basic-information",
      uploadedImage: null,
      selectedMedia: [],
      levels: [],
      guardians: [],
      currentAbout: null,
      selectedBirthMedia: [],
      selectedNationalMedia: [],
      previewImage: "",
      titleArExist: false,
      titleEnExist: false,
    });
    const form = reactive({
      id: "",
      address: "",
      phone: "",
      email: "",
      map_position: "",
      facebook: "",
      twitter: "",
      youtube: "",
      instgram: "",
      snapchat: "",
      linkedin: "",
      employee_body: "",
      supervisor_body: "",
      blog_body: "",
      event_body: "",
      footer_about_us: "",
    });
    const rules = {
      email: { required, email },
    };
    const v$ = useVuelidate(rules, form);
    onMounted(() => {
      settingClient.getItem().then((res) => {
        if (!res.data) return;
        form.id = res.data.id;
        form.footer_about_us = res.data.footer_about_us;
        form.employee_body = res.data.employee_body;
        form.supervisor_body = res.data.supervisor_body;
        form.blog_body = res.data.blog_body;
        form.event_body = res.data.event_body;
        form.address = res.data.address;
        form.phone = res.data.phone;
        form.email = res.data.email;
        form.map_position = res.data.map_position;
        form.facebook = res.data.facebook;
        form.twitter = res.data.twitter;
        form.youtube = res.data.youtube;
        form.instgram = res.data.instgram;
        form.snapchat = res.data.snapchat;
        form.linkedin = res.data.linkedin;
      });
      setScrollTemp();
    });
    //Methods
    function setScrollTemp() {
      let linkClicked = false;
      let timeout = null;

      $(document).ready(function () {
        // Add smooth scrolling to all links
        $("a").on("click", function (event) {
          linkClicked = true;
          clearTimeout(timeout);
          timeout = setTimeout(() => {
            linkClicked = false;
          }, 1000);
          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $("html, body").animate(
              {
                scrollTop: $(hash).offset().top - 100,
              },
              800,
              function () {
                // Add hash (#) to URL when done scrolling (default click behavior)
                // window.location.hash = hash;
              }
            );
          } // End if
        });
      });
      window.onscroll = function () {
        let tablehashElement = $("#a__basic-information").attr("href");
        let employeeSupervisorContent = $(
          "#a__employee-supervisor-content"
        ).attr("href");
        let eventBlogContent = $("#a__event-blog-content").attr("href");
        let about = $("#a__about").attr("href");
        let socials = $("#a__socials").attr("href");
        if (linkClicked) return;
        if (
          document.documentElement.scrollTop >=
          $(socials).offset().top - 140
        ) {
          data.currentSection = "socials";
        } else if (
          document.documentElement.scrollTop >=
          $(eventBlogContent).offset().top - 140
        ) {
          data.currentSection = "event-blog-content";
        } else if (
          document.documentElement.scrollTop >=
          $(employeeSupervisorContent).offset().top - 140
        ) {
          data.currentSection = "employee-supervisor-content";
        } else if (
          document.documentElement.scrollTop >=
          $(about).offset().top - 140
        ) {
          data.currentSection = "about";
        } else {
          data.currentSection = "basic-information";
        }
        // if (
        //   document.documentElement.scrollTop == $("#add").offset().top - 100 ||
        //   document.documentElement.scrollTop == $("#table").offset().top - 100
        // ) {
        //   linkClicked = false;
        // }
      };
    }
    function toggleLocale() {
      data.isArabic = !data.isArabic;
    }
    function uploadImage(e) {
      const image = e.target.files[0];
      data.uploadedImage = image;
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        data.previewImage = e.target.result;
      };
    }
    function deleteImage() {
      data.uploadedImage = null;
      data.previewImage = props.selectedItem ? props.selectedItem.image : "";
    }

    function addItem() {
      form.list.push(getElement());
    }

    function removeItem(index) {
      if (form.list.length > 1) {
        form.list.splice(index, 1);
      }
    }
    function save() {
      if (v$.value.$invalid) {
        v$.value.$touch();
        return;
      }
      update();
    }
    //Commons
    function store() {
      data.titleArExist = false;
      data.titleEnExist = false;
      settingClient
        .store(getForm())
        .then((response) => {
          context.emit("created", response.data);
          $("#itemFormModal").modal("hide");
        })
        .catch((error) => {
          data.titleArExist = error.response.data.errors.name_ar ? true : false;
          data.titleEnExist = error.response.data.errors.name_en ? true : false;
        });
    }
    function update() {
      data.titleArExist = false;
      data.titleEnExist = false;
      settingClient
        .store(getForm())
        .then((response) => {
          data.isArabic = false;
          toast.success(t("UPDATED_SUCCESSFULLY"), {
            autoClose: 2000,
            position: "top-center",
          });
          context.emit("updated", response.data);
          $("#itemFormModal").modal("hide");
        })
        .catch((error) => {
          data.titleArExist = error.response.data.errors.name_ar ? true : false;
          data.titleEnExist = error.response.data.errors.name_en ? true : false;
        });
    }
    function touchlist() {
      form.list.forEach((item) => {
        item.name_ar_dirty = true;
        item.name_en_dirty = true;
      });
    }
    function getElement() {
      return { name_ar: "", name_en: "" };
    }
    function getForm() {
      return {
        id: route.params.id,
        address: form.address,
        phone: form.phone,
        email: form.email,
        map_position: form.map_position,
        facebook: form.facebook,
        twitter: form.twitter,
        youtube: form.youtube,
        instgram: form.instgram,
        snapchat: form.snapchat,
        linkedin: form.linkedin,
        employee_body: form.employee_body,
        supervisor_body: form.supervisor_body,
        blog_body: form.blog_body,
        event_body: form.event_body,
        footer_about_us: form.footer_about_us,
      };
    }
    function setlistToFormData(formData) {
      form.list.forEach((item, index) => {
        formData.append(`list[${index}][name_ar]`, item.name_ar);
        formData.append(`list[${index}][name_en]`, item.name_en);
      });
    }
    function setForm() {
      v$.value.$reset();
      form.list = props.selectedItem
        ? _.clone(props.selectedItem.list)
        : [getElement()];
      form.name_ar = props.selectedItem ? props.selectedItem.name_ar : "";
      form.name_en = props.selectedItem ? props.selectedItem.name_en : "";
      data.previewImage = props.selectedItem ? props.selectedItem.image : "";
      data.uploadedImage = null;
      data.titleArExist = false;
      data.titleEnExist = false;
    }
    //Watchers
    // watch(
    //   () => {
    //     item_store.onFormShow;
    //   },
    //   (value) => {
    //     setForm();
    //   },
    //   { deep: true }
    // );
    return {
      toggleLocale,
      ...toRefs(data),
      ...toRefs(form),
      v$,
      uploadImage,
      deleteImage,
      addItem,
      removeItem,
      save,
    };
  },
  props: ["selectedItem"],
};
</script>

<style lang="scss">
.student-form {
  input,
  textarea {
    font-size: 12.5px !important;
    &::placeholder {
      font-size: 12.5px !important;
    }
  }
  .multiselect-wrapper {
    padding: 12.5px 0 !important;
  }
  * {
    font-size: 13px !important;
  }

  body[dir="rtl"] & {
    .multiselect-placeholder {
      font-size: 12px !important;
    }
    .image-sub-title {
      font-size: 12.5px !important;
    }
    .locale {
      border-radius: 5px;
      padding: 3px 7px;
      position: relative;
      color: #fcac00;
      font-size: 10px !important;
      bottom: 1px;
      &:hover {
        color: #fcac00 !important;
        background: rgba(252, 172, 0, 0.15);
      }
    }
    .image-title {
      font-size: 12px !important;
    }
    .form-group {
      label {
        font-size: 12.5px !important;
        font-weight: 400 !important;
      }
    }
    table {
      th,
      td {
        font-size: 14px !important;
      }
    }
    .title {
      font-size: 15px !important;
      color: #212b36;
      font-weight: 550;
    }
    .search {
      i {
        right: 17px !important;
      }
    }

    .actions-cell .dropdown-menu {
      position: absolute !important;
      transform: translate3d(103px, -43px, 0px) !important;
      top: 0px !important;
      left: 0px !important;
      width: 100px;
      will-change: transform !important;
    }
    .breadcrumb-item + .breadcrumb-item::before {
      font-family: "FontAwesome";
      content: "\f104" !important;
    }

    .information {
      a * {
        font-size: 13.5px !important;
      }
      ul {
        padding: 0 30px;
        position: relative;
        margin-top: 25px;
      }
      li::before {
        height: 12px;
        position: absolute;
        width: 12px;
        content: "";
        background: #dfe3e8;
        border-radius: 50%;
        top: 3px;
        right: -23px;
      }
      ul::before {
        position: absolute;
        display: block;
        content: "";
        top: 14px;
        height: 100%;
        width: 2px;
        right: 12px;
        background: #dfe3e8;
      }

      li.active::before {
        width: 10px;
        height: 10px;
        background: #4eb529;
        right: -25px;
        box-sizing: content-box;
        outline: 1px solid #4eb529;
        border: 3px solid #fff;
      }
      li.active {
        color: #4eb529;
      }

      li {
        position: relative;
        margin-bottom: 15px;
      }
      padding: 15px 15px 20px 15px;
    }
  }
  body[dir="ltr"] & {
    .locale {
      border-radius: 5px;
      padding: 3px 7px;
      position: relative;
      color: #fcac00;
      font-size: 10px !important;
      bottom: 1px;
      &:hover {
        color: #fcac00 !important;
        background: rgba(252, 172, 0, 0.15);
      }
    }

    .title {
      font-size: 17px !important;
      color: #212b36;
      font-weight: 600;
    }
    .search {
      i {
        left: 17px !important;
      }
    }
    .information {
      ul {
        padding: 0 30px;
        position: relative;
        margin-top: 25px;
      }
      li::before {
        height: 11px;
        position: absolute;
        width: 12px;
        content: "";
        background: #dfe3e8;
        border-radius: 50%;
        top: 2px;
        left: -23px;
      }
      ul::before {
        position: absolute;
        display: block;
        content: "";
        top: 14px;
        height: 100%;
        width: 2px;
        left: 12px;
        background: #dfe3e8;
      }

      li.active::before {
        width: 10px;
        height: 10px;
        background: #4eb529;
        left: -25px;
        box-sizing: content-box;
        outline: 1px solid #4eb529;
        border: 3px solid #fff;
      }
      li.active {
        color: #4eb529;
      }

      li {
        position: relative;
        margin-bottom: 15px;
      }
      padding: 15px 15px 20px 15px;
    }
  }

  .page-header {
    box-shadow: none;
    margin-bottom: 19px !important;
  }
  .save-submit {
    margin-bottom: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 110px;
    gap: 12px;
    justify-content: center;
    padding: 10px 0;
    border-radius: 5px;
  }
  .form-container {
    padding: 20px 20px 40px 20px;
    border-radius: 5px;
  }
  .information-container {
    position: sticky;
    top: 90px;
  }
  .form-control {
    font-size: 13px !important;
    padding: 21px 10px !important;
  }
  .information {
    a * {
      font-size: 14px !important;
    }
    ul {
      padding: 0 30px;
      position: relative;
      margin-top: 25px;
    }

    li {
      position: relative;
      margin-bottom: 15px;
    }
    padding: 15px 15px 20px 15px;
  }
}
</style>