<template>
  <div class="all-event-container">
    <!-- ======= Breadcrumbs ======= -->
    <div
      class="breadcrumbs d-flex align-items-center"
      style="background-image: url('/images/Banner.jpg')"
    >
      <div
        class="container position-relative d-flex flex-column align-items-center"
        data-aos="fade"
      >
        <h2>{{ $t("EVENTS") }}</h2>
        <ol>
          <li>
            <router-link to="/home">{{ $t("HOME") }}</router-link>
          </li>
          <li>{{ $t("EVENTS") }}</li>
        </ol>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">
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
              v-for="event in items"
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
      <div class="d-flex justify-content-center mt-5" v-if="pageCounts > 1">
        <paginate
          :prevText="''"
          :nextText="''"
          v-model="page"
          :pageCount="pageCounts"
          :clickHandler="getItems"
        >
        </paginate>
      </div>
    </section>
    <!-- End Blog Section -->
  </div>
</template>

<script>
import { onMounted, reactive, ref, toRefs } from "vue";
import useVuelidate from "@vuelidate/core";
import { useI18n } from "vue-i18n";
import eventClient from "../../http-clients/web/event-client";
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
    const data = reactive({
      pageSize: 6,
      page: 1,
      items: [],
      pageCounts: 0,
      totalItems: 0,
    });
    onMounted(() => {
      data.page = 1;
      getItems();
    });
    const rules = {};
    const v$ = useVuelidate(rules);
    //Methods
    function getItems() {
      eventClient
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
      v$,
    };
  },
};
</script>

<style lang="scss">
.all-event-container {
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

