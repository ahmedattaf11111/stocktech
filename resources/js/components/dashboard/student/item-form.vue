<template>
  <div class="student-form">
    <div class="page-header border" style="margin-top: 10px">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            {{ $t("UPDATE_STUDENT") }}
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
                    {{ $t("STUDENT_NAME") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_STUDENT_NAME')"
                    type="text"
                    class="form-control"
                    v-model="v$.name.$model"
                    :class="{
                      'is-invalid': v$.name.$error || titleArExist,
                    }"
                  />
                  <div class="invalid-feedback">
                    <div v-for="error in v$.name.$errors" :key="error">
                      {{ $t("NAME") + " " + $t(error.$validator) }}
                    </div>
                    <div v-if="!v$.name.$invalid && titleArExist">
                      {{ $t("NAME") + " " + $t("EXIST") }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 mb-2">
                <Image
                  :id="1"
                  title="STUDENT_IMAGE"
                  subTitle="CHOOSE_STUDENT_THUMBNAIL"
                  :selectedMedia="selectedMedia"
                  @selectedMedia="selectedMedia = $event"
                  :singleSelect="true"
                />
              </div>
            </div>
          </div>
        </div>
        <div id="guardian" class="form-container bg-white border border-radius-4 mb-30">
          <div class="create-item">
            <div class="title mb-4">
              {{ $t("GUARDIAN") }}
            </div>
            <div class="form-group">
              <Multiselect
                :placeholder="$t('SELECT_GUARDIAN')"
                :label="'name'"
                :searchable="true"
                v-model="guardian_id"
                valueProp="id"
                :options="guardians"
              />
            </div>
          </div>
        </div>
        <div
          id="birth-national-images"
          class="form-container bg-white border border-radius-4 mb-30"
        >
          <div class="create-item">
            <div class="title mb-4">
              {{ $t("Birth and national id images") }}
            </div>
            <div class="row">
              <div class="col-lg-12 mb-4">
                <Image
                  :id="2"
                  title="BIRTH_IMAGE"
                  subTitle="CHOOSE_BIRTH_THUMBNAIL"
                  :selectedMedia="selectedBirthMedia"
                  @selectedMedia="selectedBirthMedia = $event"
                  :singleSelect="true"
                />
              </div>
              <div class="col-lg-12 mb-2">
                <Image
                  :id="3"
                  title="NATIONAL_IMAGE"
                  subTitle="CHOOSE_NATIONAL_THUMBNAIL"
                  :selectedMedia="selectedNationalMedia"
                  @selectedMedia="selectedNationalMedia = $event"
                  :singleSelect="true"
                />
              </div>
            </div>
          </div>
        </div>

        <div id="phone-level" class="row">
          <div class="col-lg-6">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("STUDENT_PHONE") }}
                </div>
                <div class="form-group">
                  <input
                    :placeholder="$t('TYPE_STUDENT_PHONE')"
                    type="text"
                    class="form-control"
                    v-model="phone"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("LEVEL") }}
                </div>
                <div class="form-group">
                  <Multiselect
                    :placeholder="$t('SELECT_LEVEL')"
                    :label="'name'"
                    :searchable="true"
                    v-model="level_id"
                    valueProp="id"
                    :options="levels"
                  />
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
            <div class="title">{{ $t("STUDENT_INFORMATION") }}</div>
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
              <a
                id="a__guardian"
                @click="currentSection = 'guardian'"
                href="#guardian"
              >
                <li :class="{ active: currentSection == 'guardian' }">
                  {{ $t("GUARDIAN") }}
                </li>
              </a>
              <a
                id="a__birth-national-images"
                @click="currentSection = 'birth-national-images'"
                href="#birth-national-images"
              >
                <li
                  :class="{ active: currentSection == 'birth-national-images' }"
                  class="add-new-tax"
                >
                  {{ $t("Birth and national id images") }}
                </li>
              </a>
              <a
                id="a__phone-level"
                @click="currentSection = 'phone-level'"
                href="#phone-level"
              >
                <li
                  :class="{ active: currentSection == 'phone-level' }"
                  class="add-new-tax"
                >
                  {{ $t("PHONE_LEVEL") }}
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
import { required, helpers } from "@vuelidate/validators";
import studentClient from "../../../http-clients/admin/student-client";
import { computed, inject, onMounted, reactive, toRefs, watch } from "vue-demi";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import Image from "../../../shared/components/image.vue";
import guardianClient from '../../../http-clients/admin/guardian-client';
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
      selectedBirthMedia: [],
      selectedNationalMedia: [],
      previewImage: "",
      titleArExist: false,
      titleEnExist: false,
      
    });
    const form = reactive({
      name: "",
      phone: "",
      level_id: "",
      guardian_id: "",
    });
    const rules = {
      name: { required },
    };
    const v$ = useVuelidate(rules, form);
    onMounted(() => {
      studentClient.getLevels().then((res) => {
        data.levels = res.data;
      });
      studentClient.getGuardians().then((res) => {
        data.guardians = res.data;
      });

      studentClient.getItem(route.params.id).then((res) => {
        form.name = res.data.name;
        form.phone = res.data.phone;
        form.level_id = res.data.level_id;
        form.guardian_id = res.data.guardian_id;
        data.selectedMedia = res.data.media_manager
          ? [res.data.media_manager]
          : [];
        data.selectedBirthMedia = res.data.birth ? [res.data.birth] : [];
        data.selectedNationalMedia = res.data.national
          ? [res.data.national]
          : [];
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
        let birthNationImages = $("#a__birth-national-images").attr("href");
        let guardian = $("#a__guardian").attr("href");
        let phoneLevel = $("#a__phone-level").attr("href");
        if (linkClicked) return;
        if (
          document.documentElement.scrollTop >=
          $(phoneLevel).offset().top - 140
        ) {
          data.currentSection = "phone-level";
        } else if (
          document.documentElement.scrollTop >=
          $(birthNationImages).offset().top - 140
        ) {
          data.currentSection = "birth-national-images";
        } else if (
          document.documentElement.scrollTop >=
          $(guardian).offset().top - 140
        ) {
          data.currentSection = "guardian";
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
      studentClient
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
      studentClient
        .update(getForm())
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
        media_manager_id: data.selectedMedia.length
          ? data.selectedMedia[0].id
          : null,
        birth_id: data.selectedBirthMedia.length
          ? data.selectedBirthMedia[0].id
          : null,
        national_id: data.selectedNationalMedia.length
          ? data.selectedNationalMedia[0].id
          : null,
        name: form.name,
        phone: form.phone,
        level_id: form.level_id,
        guardian_id: form.guardian_id,
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
  .multiselect-wrapper {
    padding: 12.5px 0 !important;
  }
  * {
    font-size: 13px !important;
  }

  body[dir="rtl"] & {
    .multiselect-placeholder{
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
    .image-title{
      font-size: 12px !important;
    }
    .form-group {
      input{
        font-size:12.5px  !important;
        &::placeholder{
          font-size:12.5px !important;
        }
      }
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