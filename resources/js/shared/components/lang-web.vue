<template>
  <div class="d-flex justify-content-end">
    <li
      :style="props.page == 'home' ? 'border-color:#525151' : 'border-color:#6e6c6c'"
      class="web-lang-container"
    >
      <a v-if="$i18n.locale == 'ar'" @click.prevent="changeLang('en')" href="#">
        <img src="/images/english.png" /> English
      </a>
      <a v-if="$i18n.locale == 'en'" @click.prevent="changeLang('ar')" href="#">
        عربية <img src="/images/ar.png" />
      </a>
    </li>
  </div>
</template>
<script>
import LangUtil from "../utils/lang-util";
export default {
  setup(props, context) {
    const lang = LangUtil.setup();
    function changeLang(locale) {
      lang.changeWebLang(locale);
    }
    return { changeLang, props: props };
  },
  props: ["page"],
};
</script>
<style lang="scss">
.web-lang-container {
  display: flex;
  a {
    margin: 5px 0;

    color: #fff;
    &:hover {
      color: var(--color-primary);
    }
  }
  body[dir="ltr"] & {
    justify-content: flex-end;
    a {
      font-size: 11px;
    }
  }
  body[dir="rtl"] & {
    a {
      font-size: 12px;
    }
  }
  border-bottom: 1px solid;
  color: #fff;
  top: 2px;
  right: 0;
  width: 100%;
  position: absolute;
  font-size: 13px;
  list-style: none;
  img {
    margin: 0 16px;
    position: relative;
    bottom: 2px;
    width: 20px;
    height: 13px;
  }
}

@media (max-width: 1279px) {
  .dropdown a {
    color: rgba(255, 255, 255, 0.7) !important;
  }
}
</style>
