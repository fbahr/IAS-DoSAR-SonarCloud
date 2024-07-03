! function(e) {
    var t = {};

    function n(o) {
        if (t[o]) return t[o].exports;
        var r = t[o] = {
            i: o,
            l: !1,
            exports: {}
        };
        return e[o].call(r.exports, r, r.exports, n), r.l = !0, r.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, o) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: o
        })
    }, n.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, n.t = function(e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var o = Object.create(null);
        if (n.r(o), Object.defineProperty(o, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var r in e) n.d(o, r, function(t) {
                return e[t]
            }.bind(null, r));
        return o
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "/", n(n.s = 0)
}({
        0: function(e, t, n) {
            n(1), n(5), n(21), n(23), n(25), e.exports = n(27)
        },
        1: function(e, t) {
                ! function(e) {
                    "use strict";
                    e("#side-menu").metisMenu(), e("#vertical-menu-btn").on("click", (function(t) {
                            t.preventDefault(), e("body").toggleClass("sidebar-enable"), e(window).width() >= 992 ? e("body").toggleClass("vertical-collpsed") : e("body").removeClass("vertical-collpsed")
                        })), e("#sidebar-menu a").each((function() {
                            var t = window.location.href.split(/[?#]/)[0];
                            this.href == t && (e(this).addClass("active"), e(this).parent().addClass("mm-active"), e(this).parent().parent().addClass("mm-show"), e(this).parent().parent().prev().addClass("mm-active"), e(this).parent().parent().parent().addClass("mm-active"), e(this).parent().parent().parent().parent().addClass("mm-show"), e(this).parent().parent().parent().parent().parent().addClass("mm-active"))
                        })), e(".navbar-nav a").each((function() {
                            var t = window.location.href.split(/[?#]/)[0];
                            this.href == t && (e(this).addClass("active"), e(this).parent().addClass("active"), e(this).parent().parent().addClass("active"), e(this).parent().parent().parent().addClass("active"), e(this).parent().parent().parent().parent().addClass("active"), e(this).parent().parent().parent().parent().parent().addClass("active"))
                        })),
                        function() {
                            function t() {
                                document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || (console.log("pressed"), e("body").removeClass("fullscreen-enable"))
                            }
                            e('[data-toggle="fullscreen"]').on("click", (function(t) {
                                t.preventDefault(), e("body").toggleClass("fullscreen-enable"), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
                            })), document.addEventListener("fullscreenchange", t), document.addEventListener("webkitfullscreenchange", t), document.addEventListener("mozfullscreenchange", t)
                        }(), e(".right-bar-toggle").on("click", (function(t) {
                            e("body").toggleClass("right-bar-enabled")
                        })), e(document).on("click", "body", (function(t) {
                            e(t.target).closest(".right-bar-toggle, .right-bar").length > 0 || e("body").removeClass("right-bar-enabled")
                        })), e(".dropdown-menu a.dropdown-toggle").on("click", (function(t) {
                            return e(this).next().hasClass("show") || e(this).parents(".dropdown-menu").first().find(".show").removeClass("show"), e(this).next(".dropdown-menu").toggleClass("show"), !1
                        })), e((function() {
                            e('[data-toggle="tooltip"]').tooltip()
                        })), e((function() {
                            e('[data-toggle="popover"]').popover()
                        })),
                        function() {
                            if (window.sessionStorage) {
                                var t = sessionStorage.getItem("is_visited");
                                t ? (e(".right-bar input:checkbox").prop("checked", !1), e("#" + t).prop("checked", !0)) : sessionStorage.setItem("is_visited", "light-mode-switch")
                            }
                        }(), e(window).on("load", (function() {
                            e("#status").fadeOut(), e("#preloader").delay(350).fadeOut("slow")
                        })), Waves.init()
                }(jQuer * Connection #0 to host academy.htb left intact
y)},21:function(e,t){},23:function(e,t){},25:function(e,t){},27:function(e,t){},5:function(e,t){}}); 
