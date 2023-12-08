<template>
  <div class="contest-form">
    <div class="page-header border" style="margin-top: 10px">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            {{
              params.id == "create"
                ? $t("ADD_TEST_RATE")
                : $t("UPDATE_TEST_RATE")
            }}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div
        class="col-lg-9 order-lg-1 order-2 basic-info-sec"
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
            <form>
              <div class="row">
                <div class="col-lg-12 mb-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      {{ $t("EMPLOYEE") }}
                    </label>
                    <Multiselect
                      @change="onEmployeeChanged"
                      :placeholder="$t('SELECT_EMPLOYEE')"
                      :label="'name'"
                      :searchable="true"
                      v-model="employee_id"
                      valueProp="id"
                      :options="employees"
                    />
                  </div>
                </div>
                <div class="col-lg-12 mb-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      {{ $t("STUDENT") }}
                    </label>
                    <Multiselect
                      :placeholder="$t('SELECT_STUDENT')"
                      :label="'name'"
                      :searchable="true"
                      v-model="student_id"
                      valueProp="id"
                      :options="students"
                    />
                  </div>
                </div>
                <div class="col-lg-12 mb-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      {{ $t("TEST") }}
                    </label>
                    <Multiselect
                      :placeholder="$t('SELECT_TEST')"
                      :label="'name'"
                      :searchable="true"
                      v-model="test_id"
                      valueProp="id"
                      :options="tests"
                    />
                  </div>
                </div>

                <div class="col-lg-12 mb-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      {{ $t("RATE") }}
                    </label>
                    <input
                      :placeholder="$t('TYPE_TEST_RATE')"
                      type="number"
                      class="form-control"
                      v-model="rate"
                    />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <button @click="save" class="btn save-submit">
          <i class="fa fa-save"></i>
          {{ $t("SAVE") }}
        </button>
      </div>
      <div class="col-lg-3 order-lg-2 order-1">
        <div
          class="bg-white information-container border border-radius-4 mb-30"
        >
          <div class="information">
            <div class="title">{{ $t("TEST_RATE_INFORMATION") }}</div>
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

import useVuelidate from "@vuelidate/core";
import { required, helpers } from "@vuelidate/validators";
import testRateClient from "../../../http-clients/admin/test-rate-client";
import { computed, inject, onMounted, reactive, toRefs, watch } from "vue-demi";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import Image from "../../../shared/components/image.vue";
import Multiselect from "@vueform/multiselect";

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
      uploadedImage: null,
      tests: [],
      selectedMedia: [],
      previewImage: "",
      titleArExist: false,
      titleEnExist: false,
      students: [],
      employees: [],
      currentSection: "basic-information",
    });
    const form = reactive({
      rate: null,
      employee_id: "",
      test_id: "",
      student_id: "",
    });
    const rules = {};
    const v$ = useVuelidate(rules, form);
    onMounted(() => {
      getEmployees();
      setForm();
      setScrollTemp();
    });
    //Methods
    function onEmployeeChanged() {
      setTimeout(() => {
        if (!form.employee_id) {
          data.tests = [];
          data.students = [];
          return;
        }
        getStudents();
        getTests();
      }, 500);
    }
    function onDeselect() {
      setTimeout(() => {
        form.base_category_id = -1;
      }, 10);
    }
    function setForm() {
      if (route.params.id != "create") {
        testRateClient.getItem(route.params.id).then((res) => {
          form.student_id = res.data.student_id;
          form.employee_id = res.data.employee_id;
          form.test_id = res.data.test_id;
          form.rate = res.data.rate;
        });
      }
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
        let addhashElement = $("#a__image").attr("href");
        if (linkClicked) return;
        if (
          document.documentElement.scrollTop >=
          $(addhashElement).offset().top - 140
        ) {
          data.currentSection = "image";
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
    function getEmployees() {
      testRateClient.getEmployees().then((res) => {
        data.employees = res.data;
      });
    }

    function getStudents() {
      testRateClient.getStudents(form.employee_id).then((res) => {
        data.students = res.data;
      });
    }
    function getTests() {
      testRateClient
        .getTests(form.employee_id)
        .then((res) => (data.tests = res.data));
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
      if (route.params.id == "create") {
        store();
      } else {
        update();
      }
    }
    //Commons
    function store() {
      data.titleArExist = false;
      data.titleEnExist = false;
      testRateClient
        .store(getForm())
        .then((category) => {
          v$.value.$reset();

          form.employee_id = null;
          form.student_id = null;
          form.test_id = null;
          form.rate = null;
          toast.success(t("CREATED_SUCCESSFULLY"), {
            autoClose: 2000,
            position: "top-center",
          });
        })
        .catch((error) => {
          data.titleArExist = error.response.data.errors.name_ar ? true : false;
          data.titleEnExist = error.response.data.errors.name_en ? true : false;
        });
    }
    function update() {
      data.titleArExist = false;
      data.titleEnExist = false;
      testRateClient
        .update(getForm())
        .then((category) => {
          data.isArabic = false;
          toast.success(t("UPDATED_SUCCESSFULLY"), {
            autoClose: 2000,
            position: "top-center",
          });
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
        id: route.params.id == "create" ? null : route.params.id,
        employee_id: form.employee_id,
        student_id: form.student_id,
        test_id: form.test_id,
        rate: form.rate,
      };
    }
    function setlistToFormData(formData) {
      form.list.forEach((item, index) => {
        formData.append(`list[${index}][name_ar]`, item.name_ar);
        formData.append(`list[${index}][name_en]`, item.name_en);
      });
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
      onDeselect,
      ...toRefs(data),
      ...toRefs(form),
      ...toRefs(route),
      onEmployeeChanged,
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
<style src="@vueform/multiselect/themes/default.css"></style>

<style lang="scss">
.contest-form {
  .media-manager .head-title {
    font-size: 15px !important;
  }
  .media-manager .close-media i {
    font-size: 16px !important;
  }
  .basic-info-sec {
    padding-bottom: 400px;
  }
  .information-container {
    position: sticky;
    top: 90px;
  }
  .multiselect {
    padding: 1px 0 !important;
  }

  .multiselect-tag,
  .is-selected,
  .is-pointed {
    color: #454f5b !important;
    background: rgb(244, 246, 248) !important;
  }
  body[dir="rtl"] & {
    * {
      font-size: 12.5px !important;
    }
    .form-group {
      label {
        font-size: 12.5px !important;
      }
    }
    .multiselect-placeholder {
      font-size: 12.5px !important;
    }
    .form-control {
      font-size: 12px !important;
    }
    .form-control::placeholder {
      font-size: 12px;
    }
    .multiselect-tag {
      font-weight: 500;
    }
    .locale {
      border-radius: 5px;
      padding: 3px 7px;
      position: relative;
      color: #fcac00;
      font-size: 9px !important;
      bottom: 1px;
      &:hover {
        color: #fcac00 !important;
        background: rgba(252, 172, 0, 0.15);
      }
    }
    .form-group {
      label {
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
        font-size: 14px !important;
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
        top: 4px;
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
    * {
      font-size: 13px !important;
    }
    .form-control {
      font-size: 13px !important;
      font-weight: 500;
    }
    .form-control::placeholder {
      font-size: 13px;
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
        top: 3px;
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
    background: #4eb529;
    color: #fff;
    margin-bottom: 50px;
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
  .form-control {
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