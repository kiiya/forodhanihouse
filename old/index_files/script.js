!function(){"use strict";$(document).ready(function(){function a(a){r.empty(),g.removeClass("noInfo");var b=u[a];b?(r.text(b),$(p).hide(),$(q).fadeIn("fast"),$(r).fadeIn("fast")):(g.addClass("noInfo"),$(q).fadeOut("fast"),$(r).fadeOut("fast"))}$(window).width();$("[data-target=external], [data-target=blank]").on("click",function(){var a=$(this).attr("href");return window.open(a),!1});var b=$("#messages_flash"),c=b.find(".fermer");c.removeAttr("onclick").on({click:function(){return b.fadeOut("slow",function(){b.remove()}),!1}});var d=$(".toggleNav"),e=$(".navigation ul.level_0");d.click(function(){return e.slideToggle("fast"),!1});var f=$(".datepicker");f.pikaday({displayFormat:"DD/MM/YYYY",outputFormat:"unix",placeholder:"DD/MM/YYYY",forcePikaday:!0,classes:"calendar",showTodayButton:!1,showClearButton:!1,todayButtonText:"Today",clearButtonText:"Clear"});var g=$(".block-carousel"),h=$("#big-carousel"),i=$("#big-carousel").find(".item"),j=i.size()-1,k=$("#big-carousel-controls"),l=k.find(".control.play"),m=k.find(".control.pause"),n=k.find(".control.prev"),o=k.find(".control.next"),p=k.find(".control.info"),q=k.find(".control.infoclose"),r=$("#big-carousel-caption"),s=!0,t=5e3;0==j&&(g.addClass("singleItem"),s=!1),h.owlCarousel({loop:!0,responsiveClass:!0,nav:!1,dots:!1,center:!0,autoplay:s,autoplaySpeed:t,autoplayTimeout:t,autoplayHoverPause:!1,responsive:{0:{items:1}}});var u=i.map(function(){return $(this).find("img").attr("alt")}).get();a(0),h.on("changed.owl.carousel",function(b){var c=b.item.index-1;c>j&&(c=0),a(c)}),s?(l.hide(),m.show()):(m.hide(),l.show()),n.on("click",function(){return h.trigger("prev.owl.carousel"),!1}),o.on("click",function(){return h.trigger("next.owl.carousel"),!1}),l.on("click",function(){return $(this).hide(),m.show(),h.trigger("play.owl.autoplay",[t,t]),!1}),m.on("click",function(){return $(this).hide(),l.show(),console.log(h.trigger("stop.owl.autoplay")),h.trigger("stop.owl.autoplay"),!1}),p.on("click",function(){return $(this).hide(),q.show(),r.fadeIn("fast"),!1}),q.on("click",function(){return $(this).hide(),p.show(),r.fadeOut("fast"),!1})})}();