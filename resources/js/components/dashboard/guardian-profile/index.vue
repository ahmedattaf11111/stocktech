<template>
  <div class="profile-container">
    <div class="page-header border" style="margin-top: 10px">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            {{ $t("GUARDIAN_PROFILE") }}
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div
          class="pd-20 height-100-p"
          style="border-radius: 5px; background: #fff"
        >
          <div class="profile-photo">
            <!-- <a
              href="modal"
              data-toggle="modal"
              data-target="#modal"
              class="edit-avatar"
              ><i class="fa fa-pencil"></i
            ></a> -->
            <img
              class="avatar-photo"
              :src="
                currentGuardian && currentGuardian.media_manager
                  ? `/uploads/${currentGuardian.media_manager.hash_name}`
                  : '/images/placeholder-thumb.png'
              "
            />
            <div
              class="modal fade"
              id="modal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="modalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body pd-5">
                    <div class="img-container">
                      <img
                        id="image"
                        src="vendors/images/photo2.jpg"
                        alt="Picture"
                      />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input
                      type="submit"
                      value="Update"
                      class="btn btn-primary"
                    />
                    <button
                      type="button"
                      class="btn btn-default"
                      data-dismiss="modal"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h5 class="text-center h5 mb-0">
            <!-- {{ currentStudent ? currentStudent.name : $t("NO_INFORMATION") }} -->
          </h5>
          <p class="text-center text-muted font-14">
            <Multiselect
              class="mb-2"
              @change="onGuardianSelected"
              :placeholder="$t('SELECT_GUARDIAN')"
              :label="'name'"
              :searchable="true"
              v-model="guardian_id"
              valueProp="id"
              :options="guardians"
            />
            <Multiselect
              @change="onStudentSelected"
              :placeholder="$t('SELECT_STUDENT')"
              :label="'name'"
              :searchable="true"
              v-model="student_id"
              valueProp="id"
              :options="students"
            />
          </p>
          <div class="profile-info">
            <ul class="mt-3">
              <li>
                <span>{{ $t("GUARDIAN_NAME") }}:</span>
                {{
                  currentGuardian ? currentGuardian.name : $t("NO_INFORMATION")
                }}
              </li>
              <li>
                <span>{{ $t("PHONE") }}:</span>
                {{
                  currentGuardian && currentGuardian.phone
                    ? currentGuardian.phone
                    : $t("NO_INFORMATION")
                }}
              </li>
              <li>
                <span>{{ $t("JOB") }}:</span>
                {{
                  currentGuardian && currentGuardian.job
                    ? currentGuardian.job
                    : $t("NO_INFORMATION")
                }}
              </li>
              <li>
                <span>{{ $t("ADDRESS") }}:</span>
                {{
                  currentGuardian && currentGuardian.address
                    ? currentGuardian.address
                    : $t("NO_INFORMATION")
                }}
              </li>
            </ul>
          </div>
          <!-- <div class="profile-social">
            <h5 class="mb-20 h5 text-blue">Social Links</h5>
            <ul class="clearfix">
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#3b5998"
                  data-color="#ffffff"
                  ><i class="fa fa-facebook"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#1da1f2"
                  data-color="#ffffff"
                  ><i class="fa fa-twitter"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#007bb5"
                  data-color="#ffffff"
                  ><i class="fa fa-linkedin"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#f46f30"
                  data-color="#ffffff"
                  ><i class="fa fa-instagram"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#c32361"
                  data-color="#ffffff"
                  ><i class="fa fa-dribbble"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#3d464d"
                  data-color="#ffffff"
                  ><i class="fa fa-dropbox"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#db4437"
                  data-color="#ffffff"
                  ><i class="fa fa-google-plus"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#bd081c"
                  data-color="#ffffff"
                  ><i class="fa fa-pinterest-p"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#00aff0"
                  data-color="#ffffff"
                  ><i class="fa fa-skype"></i
                ></a>
              </li>
              <li>
                <a
                  href="#"
                  class="btn"
                  data-bgcolor="#00b489"
                  data-color="#ffffff"
                  ><i class="fa fa-vine"></i
                ></a>
              </li>
            </ul>
          </div>
          <div class="profile-skills">
            <h5 class="mb-20 h5 text-blue">Key Skills</h5>
            <h6 class="mb-5 font-14">HTML</h6>
            <div class="progress mb-20" style="height: 6px">
              <div
                class="progress-bar"
                role="progressbar"
                style="width: 90%"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <h6 class="mb-5 font-14">Css</h6>
            <div class="progress mb-20" style="height: 6px">
              <div
                class="progress-bar"
                role="progressbar"
                style="width: 70%"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <h6 class="mb-5 font-14">jQuery</h6>
            <div class="progress mb-20" style="height: 6px">
              <div
                class="progress-bar"
                role="progressbar"
                style="width: 60%"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <h6 class="mb-5 font-14">Bootstrap</h6>
            <div class="progress mb-20" style="height: 6px">
              <div
                class="progress-bar"
                role="progressbar"
                style="width: 80%"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="height-100-p overflow-hidden">
          <div class="pd-20" style="border-radius: 5px; background: #fff">
            <div class="profile-timeline">
              <div class="timeline-month">
                <h5>{{ $t("ALL_RATES") }}</h5>
              </div>
              <div class="profile-timeline-list">
                <ul>
                  <li v-for="g_rate in all_rates" :key="g_rate.id">
                    <div class="date">{{ g_rate.created_at }}</div>
                    <template
                      v-for="(rate, index) in g_rate.rates"
                      :key="index"
                    >
                      <div class="task-name">
                        {{ rate.name }}
                      </div>
                      <div class="rates">
                        <div
                          v-for="i in rate.length"
                          :key="i"
                          class="rate"
                          :class="{ active: i - 1 < rate.value }"
                        >
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                    </template>
                  </li>
                </ul>
              </div>
              <!-- <div class="timeline-month">
                        <h5>July, 2020</h5>
                      </div>
                      <div class="profile-timeline-list">
                        <ul>
                          <li>
                            <div class="date">12 July</div>
                            <div class="task-name">
                              <i class="ion-android-alarm-clock"></i> Task Added
                            </div>
                            <p>
                              Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit.
                            </p>
                            <div class="task-time">09:30 am</div>
                          </li>
                          <li>
                            <div class="date">10 July</div>
                            <div class="task-name">
                              <i class="ion-ios-chatboxes"></i> Task Added
                            </div>
                            <p>
                              Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit.
                            </p>
                            <div class="task-time">09:30 am</div>
                          </li>
                        </ul>
                      </div>
                      <div class="timeline-month">
                        <h5>June, 2020</h5>
                      </div>
                      <div class="profile-timeline-list">
                        <ul>
                          <li>
                            <div class="date">12 June</div>
                            <div class="task-name">
                              <i class="ion-android-alarm-clock"></i> Task Added
                            </div>
                            <p>
                              Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit.
                            </p>
                            <div class="task-time">09:30 am</div>
                          </li>
                          <li>
                            <div class="date">10 June</div>
                            <div class="task-name">
                              <i class="ion-ios-chatboxes"></i> Task Added
                            </div>
                            <p>
                              Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit.
                            </p>
                            <div class="task-time">09:30 am</div>
                          </li>
                          <li>
                            <div class="date">10 June</div>
                            <div class="task-name">
                              <i class="ion-ios-clock"></i> Event Added
                            </div>
                            <p>
                              Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit.
                            </p>
                            <div class="task-time">09:30 am</div>
                          </li>
                        </ul>
                      </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Multiselect from "@vueform/multiselect";
import "vue3-toastify/dist/index.css";
import { inject, onMounted, reactive, toRefs, watch } from "vue-demi";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import profileClient from "../../../http-clients/admin/profile-client";

export default {
  components: {
    Multiselect,
  },
  setup(props, context) {
    const route = useRoute();
    const { t, locale } = useI18n({ useScope: "global" });
    const item_store = inject("item_store");
    const data = reactive({
      students: [],
      guardians: [],
      student_id: null,
      guardian_id: null,
      currentGuardian: null,
      currentStudent: null,
      all_rates: [],
    });
    onMounted(() => {
      profileClient.getGuardians().then((res) => (data.guardians = res.data));
    });
    //Methods
    function getRates() {
      profileClient
        .getStudentRates(data.currentStudent.id)
        .then((studentRateRes) => {
          profileClient.getRates().then((rateRest) => {
            data.all_rates = studentRateRes.data.map((gr) => {
              let __rates = rateRest.data.map((r) => {
                let result = gr.rates.filter((rat) => {
                  return rat.id == r.id;
                });
                return {
                  ...r,
                  value: result.length ? result[0].value : 0,
                };
              });
              gr.rates = __rates;
              return gr;
            });
          });
        });
    }
    function onGuardianSelected(id) {
      if (id) {
        data.currentGuardian = data.guardians.filter((s) => s.id == id)[0];
        if (data.currentGuardian) {
          profileClient
            .getGuardianStudents(data.currentGuardian.id)
            .then((res) => {
              data.students = res.data;
            });
        }
      } else {
        data.currentGuardian = null;
        data.currentStudent = null;
        data.all_rates = [];
        data.students = [];
        data.student_id = null;
      }
    }
    function onStudentSelected(id) {
      if (id) {
        data.currentStudent = data.students.filter((s) => s.id == id)[0];
        if (data.currentStudent) {
          getRates();
        }
      } else {
        data.currentStudent = null;
        data.all_rates = [];
      }
    }
    return {
      onStudentSelected,
      onGuardianSelected,
      ...toRefs(data),
    };
  },
  props: [""],
};
</script>

<style lang="scss">
.profile-container {
  .avatar-photo {
    object-fit: cover;
    height: 150px;
    width: 150px;
  }
  .profile-info {
    padding: 0 15px;
  }
  .page-header {
    box-shadow: unset !important;
    margin-bottom: 19px !important;
  }
  .task-name {
    font-size: 12px !important;
  }
  .rates {
    margin-top: 2px;
    margin-bottom: 20px;
    display: flex;
    gap: 25px;
    .rate {
      &.active {
        color: #fcac00;
      }
      color: #cbc9c9;
    }
  }
  .multiselect-placeholder,
  .multiselect-option,
  input,
  .multiselect-single-label-text {
    font-size: 13px !important;
  }
  .profile-timeline {
    padding: 10px !important;
  }
  input::placeholder {
    font-size: 14px !important;
  }
}
</style>