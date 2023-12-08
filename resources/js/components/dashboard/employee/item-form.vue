<template>
  <div class="guardian-form">
    <div class="page-header border" style="margin-top: 10px">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            {{ $t("UPDATE_EMPLOYEE") }}
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
                    {{ $t("EMPLOYEE_NAME") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_EMPLOYEE_NAME')"
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
                <div class="form-group">
                  <label for="exampleInputEmail1">
                    {{ $t("EMPLOYEE_JOB") }}
                  </label>
                  <input
                    :placeholder="$t('TYPE_EMPLOYEE_JOB')"
                    type="text"
                    class="form-control"
                    v-model="job"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          id="students"
          class="form-container bg-white border border-radius-4 mb-30"
        >
          <div class="create-item">
            <div class="title mb-4">
              {{ $t("STUDENTS") }}
            </div>
            <div class="form-group">
              <Multiselect
                mode="tags"
                :placeholder="$t('SELECT_STUDENTS')"
                :label="'name'"
                :searchable="true"
                v-model="student_ids"
                valueProp="id"
                :options="students"
              />
            </div>
          </div>
        </div>
        <div id="price-target" class="row">
          <div class="col-lg-6">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("PRICE_HOUR") }}
                </div>
                <div class="form-group">
                  <input
                    :placeholder="$t('TYPE_EMPLOYEE_PRICE_HOUR')"
                    type="text"
                    class="form-control"
                    v-model="hour_price"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("TARGET") }}
                </div>
                <div class="form-group">
                  <input
                    :placeholder="$t('TYPE_EMPLOYEE_TARGET')"
                    type="text"
                    class="form-control"
                    v-model="target"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          id="cv"
          class="form-container bg-white border border-radius-4 mb-30"
        >
          <div class="create-item">
            <div class="title mb-4">
              {{ $t("Employee_cv") }}
            </div>
            <div class="row">
              <div class="col-lg-12 mb-4">
                <label class="file-label">{{ $t("cv") }}</label>
                <div class="upload-file">
                  <input id="upload-file" @change="uploadCv" type="file" />
                  <label for="upload-file">
                    <i class="fa fa-upload"></i>

                    <template v-if="!cvFile">
                      <span>{{ $t("attach_cv") }}</span>
                    </template>
                    <template v-else>
                      {{ cvFile.name }}
                    </template>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          id="image"
          class="form-container bg-white border border-radius-4 mb-30"
        >
          <div class="create-item">
            <div class="title mb-4">
              {{ $t("Employee and national id images") }}
            </div>
            <div class="row">
              <div class="col-lg-12 mb-4">
                <Image
                  :id="2"
                  title="EMPLOYEE_IMAGE"
                  subTitle="CHOOSE_EMPLOYEE_IMAGE_THUMBNAIL"
                  :selectedMedia="selectedMedia"
                  @selectedMedia="selectedMedia = $event"
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

        <div id="phone-address" class="row">
          <div class="col-lg-6">
            <div class="form-container bg-white border border-radius-4 mb-30">
              <div class="create-item">
                <div class="title mb-4">
                  {{ $t("EMPLOYEE_PHONE") }}
                </div>
                <div class="form-group">
                  <input
                    :placeholder="$t('TYPE_EMPLOYEE_PHONE')"
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
                  {{ $t("EMPLOYEE_ADDRESS") }}
                </div>
                <div class="form-group">
                  <input
                    :placeholder="$t('TYPE_EMPLOYEE_ADDRESS')"
                    type="text"
                    class="form-control"
                    v-model="address"
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
            <div class="title">{{ $t("EMPLOYEE_INFORMATION") }}</div>
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
                id="a__students"
                @click="currentSection = 'students'"
                href="#students"
              >
                <li :class="{ active: currentSection == 'students' }">
                  {{ $t("STUDENTS") }}
                </li>
              </a>
              <a
                id="a__price-target"
                @click="currentSection = 'price-target'"
                href="#price-target"
              >
                <li :class="{ active: currentSection == 'price-target' }">
                  {{ $t("Price and Target") }}
                </li>
              </a>
              <a id="a__cv" @click="currentSection = 'cv'" href="#cv">
                <li :class="{ active: currentSection == 'cv' }">
                  {{ $t("Employee_cv") }}
                </li>
              </a>

              <a id="a__image" @click="currentSection = 'image'" href="#image">
                <li
                  :class="{ active: currentSection == 'image' }"
                  class="add-new-tax"
                >
                  {{ $t("Employee and national id images") }}
                </li>
              </a>
              <a
                id="a__phone-address"
                @click="currentSection = 'phone-address'"
                href="#phone-address"
              >
                <li
                  :class="{ active: currentSection == 'phone-address' }"
                  class="add-new-tax"
                >
                  {{ $t("PHONE_ADDRESS") }}
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
import { computed, inject, onMounted, reactive, toRefs, watch } from "vue-demi";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import Image from "../../../shared/components/image.vue";
import employeeClient from "../../../http-clients/admin/employee-client";

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
      cvFile: null,
      currentSection: "basic-information",
      uploadedImage: null,
      selectedMedia: [],
      levels: [],
      selectedBirthMedia: [],
      selectedNationalMedia: [],
      previewImage: "",
      titleArExist: false,
      titleEnExist: false,
      students: [],
    });
    function handleDateClick(arg) {
      data.calendarOptions.events.push({ title: "Meeting", start: new Date() });
    }
    const form = reactive({
      name: "",
      job: "",
      phone: "",
      address: "",
      hour_price: "",
      student_ids: [],
      target: "",
    });
    const rules = {
      name: { required },
    };
    const v$ = useVuelidate(rules, form);
    onMounted(() => {
      employeeClient.getItem(route.params.id).then((res) => {
        form.name = res.data.name;
        form.phone = res.data.phone;
        form.address = res.data.address;
        form.job = res.data.job;
        form.target = res.data.target;
        form.hour_price = res.data.hour_price;
        form.student_ids = res.data.students.map((s) => s.id);
        data.selectedMedia = res.data.media_manager
          ? [res.data.media_manager]
          : [];
        data.selectedNationalMedia = res.data.national
          ? [res.data.national]
          : [];
      });
      employeeClient.getStudents().then((res) => {
        data.students = res.data;
      });
      setScrollTemp();
    });
    //Methods
    function uploadCv(e) {
      data.cvFile = e.target.files[0];
    }
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
        let birthNationImages = $("#a__image").attr("href");
        let phoneLevel = $("#a__phone-address").attr("href");
        let cv = $("#a__cv").attr("href");
        let students = $("#a__students").attr("href");
        let priceTarget = $("#a__price-target").attr("href");
        if (linkClicked) return;
        if (
          document.documentElement.scrollTop >=
          $(phoneLevel).offset().top - 140
        ) {
          data.currentSection = "phone-address";
        } else if (
          document.documentElement.scrollTop >=
          $(birthNationImages).offset().top - 140
        ) {
          data.currentSection = "image";
        } else if (
          document.documentElement.scrollTop >=
          $(cv).offset().top - 140
        ) {
          data.currentSection = "cv";
        } else if (
          document.documentElement.scrollTop >=
          $(priceTarget).offset().top - 140
        ) {
          data.currentSection = "price-target";
        } else if (
          document.documentElement.scrollTop >=
          $(students).offset().top - 140
        ) {
          data.currentSection = "students";
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
      employeeClient
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
      employeeClient
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
      let formData = new FormData();
      formData.append("id", route.params.id);
      if (data.selectedMedia.length)
        formData.append("media_manager_id", data.selectedMedia[0].id);
      if (data.selectedNationalMedia.length)
        formData.append("national_id", data.selectedNationalMedia[0].id);
      if (form.name) formData.append("name", form.name);
      if (form.job) formData.append("job", form.job);
      if (form.target) formData.append("target", form.target);
      if (form.phone) formData.append("phone", form.phone);
      if (form.hour_price) formData.append("hour_price", form.hour_price);
      if (form.address) formData.append("address", form.address);
      if (data.cvFile) formData.append("cv", data.cvFile);
      form.student_ids.forEach((id, index) => {
        formData.append(`student_ids[${index}]`, id);
      });
      return formData;
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
      uploadCv,
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
.guardian-form {
  .multiselect-tag {
    font-weight: 400;
  }
  .multiselect-tag,
  .is-selected,
  .is-pointed {
    color: #454f5b !important;
    background: rgb(244, 246, 248) !important;
  }
  .upload-file {
    input[type="file"] {
      display: none;
    }
    label {
      &:hover {
        cursor: pointer;
      }
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 200px;
      border: 2px dashed #dfe3e8;
      width: 100%;
      gap: 10px;
      font-size: 12.5px !important;
      i {
        font-size: 20px !important;
      }
    }
  }
  .multiselect-wrapper {
    padding: 8px 0 !important;
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
    .file-label {
      font-size: 12.5px !important;
    }
    .form-group {
      input {
        font-size: 12.5px !important;
        &::placeholder {
          font-size: 12.5px !important;
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