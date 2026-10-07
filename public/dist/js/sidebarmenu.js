/*
Template Name: Admin Template
Author: Wrappixel
File: js
*/
$(function() {
    "use strict";

    // 1. Dukung active class dari Blade & atur hirarki parent jika ada dropdown
    var element = $('ul#sidebarnav a.active');

    element.parentsUntil(".sidebar-nav").each(function (index) {
        if ($(this).is("li") && $(this).children("a").length !== 0) {
            $(this).parent("ul#sidebarnav").length === 0
                ? $(this).addClass("active")
                : $(this).addClass("selected");
        }
        else if (!$(this).is("ul") && $(this).children("a").length === 0) {
            $(this).addClass("selected");
        }
        else if ($(this).is("ul")) {
            $(this).addClass('in');
        }
    });

    // 2. Event click untuk toggle menu dropdown/accordion
    $('#sidebarnav a').on('click', function (e) {
        if (!$(this).hasClass("active")) {
            $("ul", $(this).parents("ul:first")).removeClass("in");
            $("a", $(this).parents("ul:first")).removeClass("active");
            
            $(this).next("ul").addClass("in");
            $(this).addClass("active");
        }
        else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents("ul:first").removeClass("active");
            $(this).next("ul").removeClass("in");
        }
    });

    $('#sidebarnav >li >a.has-arrow').on('click', function (e) {
        e.preventDefault();
    });
});