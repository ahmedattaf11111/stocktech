import { inject } from "vue";
import { useI18n } from "vue-i18n";

export default {
    key: "LANG",
    set(lang) {
        localStorage.setItem(this.key, lang);
    },
    get() {
        return localStorage.getItem(this.key) ? localStorage.getItem(this.key) : "en";
    },
    isRtl() {
        var lang = localStorage.getItem(this.key) ? localStorage.getItem(this.key) : "en";
        return lang == "ar";
    },
    isArabic() {
        return this.get() == 'ar';
    },
    isEnglish() {
        return this.get() == 'en';
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const store = inject("store");
        const self = this;
        function changeAdminLang(lang) {
            self.set(locale.value = lang);
            store.dir = locale.value == "ar" ? "rtl" : "ltr";
            store.showPageLoader = true;
            setTimeout(() => {
                if (lang == "ar") {
                    $("#body").attr("dir", "rtl");
                    $("#core").attr("href", "/vendors/styles/core-rtl.css");
                    $("#style").attr("href", "/vendors/styles/style-rtl.css");
                } else if (lang == "en") {
                    $("#body").attr("dir", "ltr");
                    $("#core").attr("href", "/vendors/styles/core.css");
                    $("#style").attr("href", "/vendors/styles/style.css");

                }
            }, 500)
            setTimeout(() => {
                store.showPageLoader = false;
            }, 2000)
        }
        function changeWebLang(lang) {
            self.set(locale.value = lang);
            store.dir = locale.value == "ar" ? "rtl" : "ltr";
            store.showPageLoader = true;
            setTimeout(() => {
                if (lang == "ar") {
                    $("#body").attr("dir", "rtl");
                    $("#bootstrap").attr("href", "/web/assets/vendor/bootstrap/css/bootstrap.min-rtl.css");
                    $("#icon").attr("href", "/web/assets/vendor/bootstrap-icons/bootstrap-icons-rtl.css");
                    $("#all").attr("href", "/web/assets/vendor/fontawesome-free/css/all.min-rtl.css");
                    $("#aos").attr("href", "/web/assets/vendor/aos/aos-rtl.css");
                    $("#glightbox").attr("href", "/web/assets/vendor/glightbox/css/glightbox.min-rtl.css");
                    $("#swiper").attr("href", "/web/assets/vendor/swiper/swiper-bundle.min-rtl.css");
                    $("#main").attr("href", "/web/assets/css/main-rtl.css");
                } else if (lang == "en") {
                    $("#body").attr("dir", "ltr");
                    $("#bootstrap").attr("href", "/web/assets/vendor/bootstrap/css/bootstrap.min.css");
                    $("#icon").attr("href", "/web/assets/vendor/bootstrap-icons/bootstrap-icons.css");
                    $("#all").attr("href", "/web/assets/vendor/fontawesome-free/css/all.min.css");
                    $("#aos").attr("href", "/web/assets/vendor/aos/aos.css");
                    $("#glightbox").attr("href", "/web/assets/vendor/glightbox/css/glightbox.min.css");
                    $("#swiper").attr("href", "/web/assets/vendor/swiper/swiper-bundle.min.css");
                    $("#main").attr("href", "/web/assets/css/main.css");
                }
            }, 500)
            setTimeout(() => {
                store.showPageLoader = false;
            }, 2000)
        }
        return { changeAdminLang,changeWebLang };
    }

}