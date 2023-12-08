<template>
  <div class="sessions-container">
    <div
      class="modal fade"
      id="notificationModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form @submit.prevent="">
            <div class="modal-body">
              <h5 class="modal-title" id="exampleModalLabel">
                {{ $t("ADD_SESSION") }}
              </h5>
              <div class="form-group">
                <Multiselect
                  :placeholder="$t('SELECT_EMPLOYEE')"
                  :label="'name'"
                  :searchable="true"
                  v-model="employee_id"
                  valueProp="id"
                  :options="employees"
                />
              </div>
              <div class="form-group">
                <input
                  v-model="start"
                  type="datetime-local"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <input
                  v-model="end"
                  type="datetime-local"
                  class="form-control"
                />
              </div>
              <div>
                <button
                  id="cancel-notify"
                  type="button"
                  data-dismiss="modal"
                  class="btn border cancel"
                >
                  {{ $t("CANCEL") }}
                </button>

                <button
                  @click="storeSession"
                  :disabled="!start || !end || !employee_id"
                  class="btn process mx-1"
                >
                  {{ $t("SAVE") }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="page-header border" style="margin-top: 10px">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            {{ $t("SESSIONS_TABLE") }}
          </div>
        </div>
        <div
          class="col-md-6 col-sm-12"
          :style="`${
            $i18n.locale == 'ar' ? 'text-align:left' : 'text-align:right'
          }`"
        >
          <button
            data-toggle="modal"
            data-target="#notificationModal"
            class="btn btn-primary add-btn"
          >
            <i class="fa fa-plus"></i>
            {{ $t("ADD_SESSION") }}
          </button>
        </div>
      </div>
    </div>

    <FullCalendar class="mb-4" :options="calendarOptions">
      <template v-slot:eventContent="arg">
        <div class="sessions">
          <div class="session">
            <div class="title">
              <div>
                {{ arg.event.title }}
              </div>
              <div>
                <button
                  class="text-danger"
                  @click="deleteSession(arg.event.id)"
                >
                  x
                </button>
              </div>
            </div>
            <div class="text-time">
              {{
                `${parseDate12H(arg.event.start)} - ${parseDate12H(
                  arg.event.end
                )}`
              }}
            </div>
          </div>
        </div>
      </template>
    </FullCalendar>
  </div>
</template>

<script>
import Multiselect from "@vueform/multiselect";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

import useVuelidate from "@vuelidate/core";
import { required, helpers } from "@vuelidate/validators";
import { computed, inject, onMounted, reactive, toRefs, watch } from "vue-demi";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import sessionClient from "../../../http-clients/admin/session-client";

export default {
  components: {
    FullCalendar,
    Multiselect,
  },
  setup(props, context) {
    const route = useRoute();
    const { t, locale } = useI18n({ useScope: "global" });
    const item_store = inject("item_store");
    const data = reactive({
      employees: [],
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        weekends: true,
        events: [],
      },
    });
    function handleDateClick(arg) {
      data.calendarOptions.events.push({ title: "Meeting", start: new Date() });
    }
    const form = reactive({
      start: "",
      end: "",
      employee_id: null,
    });
    const rules = {};
    const v$ = useVuelidate(rules, form);
    onMounted(() => {
      getSessions();
      sessionClient.getEmployees().then((res) => {
        data.employees = res.data;
      });
    });
    //Methods
    function getSessions() {
      sessionClient.getItems().then((res) => {
        data.calendarOptions.events = {
          plugins: [dayGridPlugin, interactionPlugin],
          initialView: "dayGridMonth",
          weekends: false,
          events: res.data.map((e) => {
            return {
              id: e.id,
              title: e.employee.name,
              start: new Date(e.start),
              end: new Date(e.end),
            };
          }),
        };
      });
    }
    function storeSession() {
      sessionClient
        .store({
          start: form.start,
          end: form.end,
          employee_id: form.employee_id,
        })
        .then((res) => {
          getSessions();
          form.employee_id = null;
          form.start = "";
          form.end = "";
          $("#cancel-notify").click();
          toast.success(t("CREATED_SUCCESSFULLY"), {
            autoClose: 2000,
            position: "top-center",
          });
        });
    }
    function parseDate12H(date) {
      return new Intl.DateTimeFormat("default", {
        hour12: true,
        hour: "numeric",
        minute: "numeric",
      }).format(date);
    }
    function deleteSession(id) {
      sessionClient.delete(id).then((res) => {
        getSessions();
        toast.success(t("DELETED_SUCCESSFULLY"), {
          autoClose: 2000,
          position: "top-center",
        });
      });
    }
    return {
      deleteSession,
      parseDate12H,
      storeSession,
      ...toRefs(data),
      ...toRefs(form),
    };
  },
  props: [""],
};
</script>

<style lang="scss">
.sessions-container {
  .sessions {
    .session {
      margin-bottom: 5px;
      .title {
        button {
          background: none;
          border: none;
          font-size: 14px !important;
        }
      }
      padding: 0 10px;
      .title {
        display: flex;
        gap: 7px;
      }
    }
  }
  #notificationModal {
    .multiselect-placeholder,
    .multiselect-option,
    input,
    .multiselect-single-label-text {
      font-size: 13px !important;
    }
    .second-message {
      font-size: 14px;
      overflow: auto;
      padding: 10px 13px;
      margin-bottom: 35px;
      height: 100px;
    }
    .form-group {
      margin-bottom: 36px;
    }
    .modal-title {
      margin-bottom: 21px;
    }
    .modal-body {
      padding: 40px;
    }
    .modal-content {
      background: #fff !important;
    }
    .process {
      width: 85px;
      height: 43px;
      background: #4eb529 !important;
    }
    .cancel {
      width: 85px;
      height: 43px;
      color: #202342;
      background: #f4f6f8;
    }
    .process,
    .cancel {
      font-size: 13px !important;
    }
    .modal-header {
      display: flex;
      align-items: center;
      .modal-title {
        font-size: 16px !important;
      }
      button {
        background: none;
        border: none;
        i {
          font-size: 17px !important;
        }
      }
    }

    button {
      color: white;
    }
    .modal-footer {
      button {
        width: 60px;
      }
    }
    body[dir="rtl"] & {
      .modal-title {
        font-size: 1.1em;
        font-weight: 500;
      }
    }
    body[dir="ltr"] & {
      input::placeholder {
        font-size: 13.5px;
      }
      .modal-title {
        font-size: 1.15em;
        font-weight: 600;
      }
    }
  }
  .add-btn {
    font-size: 12px;
    padding: 11px 20px;
  }
  .create-btn {
    width: 140px;
    background: #4eb529 !important;
    color: #fff;
    padding: 11px 0px;
    span {
      margin: 0 5px;
    }
  }
  body[dir="ltr"] & {
    .create-btn {
      font-size: 13px !important;
    }
    .fc-header-toolbar {
      justify-content: flex-start;
    }
  }
  body[dir="rtl"] & {
    .create-btn {
      font-size: 13px !important;
      span {
        position: relative;
        top: 1px;
      }
    }
    .fc-header-toolbar {
      justify-content: flex-end;
    }
  }
  .fc-toolbar-title {
    font-size: 12px !important;
    font-weight: 400 !important;
  }
  .fc-header-toolbar {
    gap: 6px;
    align-items: center;
    display: flex;
  }
  .fc-today-button {
    font-size: 13px;
    padding: 7px 26px;
    background: #f4f6f8 !important;
    border-color: #dfe3e8 !important;
    color: #454f5b !important;
  }
  .fc-toolbar-title {
    padding: 6px 26px;
    background: #f4f6f8 !important;
    border: 1px solid #dfe3e8 !important;
    color: #454f5b !important;
    border-radius: 3px;
    padding: 9px 16px;
  }

  .fc-scrollgrid-section {
    th {
      background: #f4f6f8 !important;
    }
  }
  .fc-prev-button,
  .fc-next-button {
    &:hover,
    &:focus {
      background: #f4f6f8;
    }
    font-size: 13px;
    padding: 0.5em 0.65em;
    background: #f4f6f8 !important;
    border: 1px solid #dfe3e8 !important;
    color: #454f5b !important;
  }
  .fc-toolbar-title {
    font-size: 16px;
  }
  .page-header {
    font-weight: 550 !important;
    box-shadow: none;
    margin-bottom: 19px !important;
  }
}
</style>