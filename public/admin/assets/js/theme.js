"use strict"; var rtl_flag = !1, dark_flag = !1; function layout_change_default() {
      let t = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; layout_change(t); var e = document.querySelector('.theme-layout .btn[data-value="default"]'); e && e.classList.add("active"),
            window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", e => { layout_change(t = e.matches ? "dark" : "light") })
} function layout_theme_contrast_change(e) {
      document.querySelector("true" === e ? "html" : "body").setAttribute("data-pc-theme_contrast", e); var t = document.querySelector(".theme-contrast .btn.active"), t = (t && t.classList.remove("active"),
            document.querySelector(`.theme-contrast .btn[data-value='${e}']`)); t && t.classList.add("active")
} function layout_caption_change(e) { "true" == e ? document.getElementsByTagName("html")[0].setAttribute("data-pc-sidebar-caption", "true") : document.getElementsByTagName("html")[0].setAttribute("data-pc-sidebar-caption", "false"); var t = document.querySelector(".theme-nav-caption .btn.active"), t = (t && t.classList.remove("active"), document.querySelector(`.theme-nav-caption .btn[data-value='${e}']`)); t && t.classList.add("active") } function preset_change(e) { document.getElementsByTagName("html")[0].setAttribute("class", e), document.querySelector(".pct-offcanvas") && (document.querySelector(".preset-color > a.active").classList.remove("active"), document.querySelector(".preset-color > a[data-value='" + e + "']").classList.add("active")) } function main_layout_change(e) { var t; document.getElementsByTagName("html")[0].setAttribute("data-pc-layout", e), document.querySelector(".pct-offcanvas") && ((t = document.querySelector(".theme-main-layout > a.active")) && t.classList.remove("active"), t = document.querySelector(".theme-main-layout > a[data-value='" + e + "']")) && t.classList.add("active") } function layout_rtl_change(e) { var t, a = document.getElementsByTagName("html")[0]; "true" === e ? (rtl_flag = !0, a.setAttribute("data-pc-direction", "rtl"), a.setAttribute("dir", "rtl"), a.setAttribute("lang", "ar"), (t = document.querySelector(".theme-direction .btn.active")) && t.classList.remove("active"), (e = document.querySelector(".theme-direction .btn[data-value='true']")) && e.classList.add("active")) : (rtl_flag = !1, a.setAttribute("data-pc-direction", "ltr"), a.setAttribute("dir", "ltr"), a.removeAttribute("lang"), (t = document.querySelector(".theme-direction .btn.active")) && t.classList.remove("active"), (e = document.querySelector(".theme-direction .btn[data-value='false']")) && e.classList.add("active")) } function layout_change(e) { document.getElementsByTagName("html")[0].setAttribute("data-pc-theme", e); var t = document.querySelector('.theme-layout .btn[data-value="default"]'), t = (t && t.classList.remove("active"), "dark" === e), a = (dark_flag = t) ? "../assets/images/logo-white.svg" : "../assets/images/logo-dark.svg"; function c(e) { e = document.querySelector(e); e && e.setAttribute("src", a) } c(".pc-sidebar .m-header .logo-lg"), c(".navbar-brand .logo-lg"), c(".auth-main.v1 .auth-sidefooter img"), c(".footer-top .footer-logo"); e = document.querySelector(".theme-layout .btn.active"), e && e.classList.remove("active"), e = document.querySelector(`.theme-layout .btn[data-value='${t ? "false" : "true"}']`); e && e.classList.add("active") } function change_box_container(e) {
      var t = document.querySelector(".pc-content"), a = document.querySelector(".footer-wrapper"); t && a && ("true" === e ? (t.classList.add("container"), a.classList.add("container"), a.classList.remove("container-fluid")) : (t.classList.remove("container"), a.classList.remove("container"), a.classList.add("container-fluid")), (t = document.querySelector(".theme-container .btn.active")) && t.classList.remove("active"),
            a = document.querySelector(`.theme-container .btn[data-value='${e}']`)) && a.classList.add("active")
}
document.addEventListener("DOMContentLoaded", function () { "undefined" != typeof Storage && layout_change(localStorage.getItem("theme")) }),
      document.addEventListener("DOMContentLoaded", function () {
            if (document.querySelectorAll(".preset-color")) {
                  for (var e = document.querySelectorAll(".preset-color > a"), t = 0; t < e.length; t++)e[t].addEventListener("click", function (e) { e = e.target; preset_change((e = "I" == e.tagName ? e.parentNode : e).getAttribute("data-value")) }); for (var a = document.querySelectorAll(".theme-layout .btn"), c = 0; c < a.length; c++)a[c] && a[c].addEventListener("click", function (e) {
                        e.stopPropagation(); e = e.target; "true" == (e = "SPAN" == e.tagName ? e.parentNode : e).getAttribute("data-value") ? (localStorage.setItem("theme", "light"), document.documentElement.setAttribute("data-theme", "light")) : (localStorage.setItem("theme", "dark"),
                              document.documentElement.setAttribute("data-theme", "dark"))
                  })
            } document.querySelector(".pct-body") && new SimpleBar(document.querySelector(".pct-body")); var o = document.querySelector("#layoutreset"); o && o.addEventListener("click", function (e) { localStorage.clear(), location.reload(), localStorage.setItem("layout", "vertical") })
      });