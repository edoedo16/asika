$(function() {
	"use strict";
	new PerfectScrollbar(".header-message-list"), new PerfectScrollbar(".header-notifications-list"), $(".mobile-search-icon").on("click", function() {
		$(".search-bar").addClass("full-search-bar")
	}), $(".search-close").on("click", function() {
		$(".search-bar").removeClass("full-search-bar")
	}), $(".mobile-toggle-menu").on("click", function() {
		$(".wrapper").addClass("toggled")
	}), $(".toggle-icon").click(function() {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
			$(".wrapper").addClass("sidebar-hovered")
		}, function() {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	}), $(document).ready(function() {
		$(window).on("scroll", function() {
			$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
		}), $(".back-to-top").on("click", function() {
			return $("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	}), $(function() {
		for (var e = window.location, o = $(".metismenu li a").filter(function() {
				return this.href == e
			}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
	}), $(function() {
		$("#menu").metisMenu()
	}), $(".chat-toggle-btn").on("click", function() {
		$(".chat-wrapper").toggleClass("chat-toggled")
	}), $(".chat-toggle-btn-mobile").on("click", function() {
		$(".chat-wrapper").removeClass("chat-toggled")
	}), $(".email-toggle-btn").on("click", function() {
		$(".email-wrapper").toggleClass("email-toggled")
	}), $(".email-toggle-btn-mobile").on("click", function() {
		$(".email-wrapper").removeClass("email-toggled")
	}), $(".compose-mail-btn").on("click", function() {
		$(".compose-mail-popup").show()
	}), $(".compose-mail-close").on("click", function() {
		$(".compose-mail-popup").hide()
	}), $(".switcher-btn").on("click", function() {
		$(".switcher-wrapper").toggleClass("switcher-toggled")
	}), $(".close-switcher").on("click", function() {
		$(".switcher-wrapper").removeClass("switcher-toggled")
	}), 
	
	$("#lightmode").on("click", function() {
		$("html").attr("class", "light-theme")
	}),

	$("#darkmode").on("click", function() {
		$("html").attr("class", "dark-theme")
	}),

	$("#semidark").on("click", function() {
		$("html").attr("class", "semi-dark")
	}),

	$("#minimaltheme").on("click", function() {
		$("html").attr("class", "minimal-theme")
	})








});