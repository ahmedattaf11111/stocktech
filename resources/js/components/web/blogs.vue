<template>
  <div class="all-blog-container">
    <!-- ======= Breadcrumbs ======= -->
    <div
      class="breadcrumbs d-flex align-items-center"
      style="background-image: url('/images/Banner.jpg')"
    >
      <div
        class="container position-relative d-flex flex-column align-items-center"
        data-aos="fade"
      >
        <h2>{{ $t("BLOGS") }}</h2>
        <ol>
          <li>
            <router-link to="/home">{{ $t("HOME") }}</router-link>
          </li>
          <li>{{ $t("BLOGS") }}</li>
        </ol>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 posts-list">
          <div v-for="item in items" :key="item" class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100">
              <div class="post-img position-relative overflow-hidden">
                <img
                  class="item-image"
                  :src="
                    item.media_manager
                      ? `/uploads/${item.media_manager.hash_name}`
                      : '/images/placeholder-thumb.png'
                  "
                />
                <span class="post-date">{{ item.created_at }}</span>
              </div>

              <div class="post-content d-flex flex-column">
                <h3 class="post-title">
                  {{ item.name }}
                </h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i>
                    <span class="ps-2">{{ item.name }}</span>
                  </div>
                </div>

                <p>
                  {{ item.description }}
                </p>

                <hr />

                <router-link
                  :to="`/blogs/${item.id}`"
                  class="readmore stretched-link"
                  ><span>{{ $t("Read More") }}</span
                  ><i class="bi bi-arrow-right"></i
                ></router-link>
              </div>
            </div>
          </div>
        </div>
        <!-- End blog posts list -->
        <div class="d-flex justify-content-center mt-4" v-if="pageCounts > 1">
          <paginate
            :prevText="''"
            :nextText="''"
            v-model="page"
            :pageCount="pageCounts"
            :clickHandler="getItems"
          >
          </paginate>
        </div>
        <!-- End blog pagination -->
      </div>
    </section>
    <!-- End Blog Section -->
  </div>
</template>

<script>
import { onMounted, reactive, ref, toRefs } from "vue";
import useVuelidate from "@vuelidate/core";
import { useI18n } from "vue-i18n";
import blogClient from "../../http-clients/web/blog-client";
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
      blogClient
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
.all-blog-container {
  .page-link:hover{
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

