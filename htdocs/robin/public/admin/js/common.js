function headerbg() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $("header").addClass("header-bg");
    } else {
        $("header").removeClass("header-bg");
    }
}

$(window).scroll(function() {
    headerbg();
});


$("#menuShow").on('click', function(e) {
    $('#menubox').toggleClass('menu-slide');
});
$("#menuClose").on('click', function(e) {
    $('#menubox').toggleClass('menu-slide');
});


$(window).resize(function() {
    if ($(window).width() <= 1024) {
        $(".top-dropdown .dropdown-toggle").removeAttr("data-toggle");
    } else {
        $(".top-dropdown .dropdown-toggle").attr("data-toggle", "dropdown");
    }
});

if ($(window).width() <= 1024) {
    $(".top-dropdown .dropdown-toggle").removeAttr("data-toggle");
} else {
    $(".top-dropdown .dropdown-toggle").attr("data-toggle", "dropdown");
}

$("#showUser").on('click', function(e) {
    $('.chat-user-box').toggle();
    $(this).children('i.fas').toggleClass('fa-users fa-times')
});

$("#showSearch").on('click', function(e) {
    $('.header-search').toggle();
});

$(".security-input").keyup(function() {
    console.log(this.value.length);
    if (this.value.length == this.maxLength) {
        $(this).next('.security-input').focus();
    } else {
        $(this).prev('.security-input').focus();
    }
});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var headerHeight = $("header").outerHeight();
    var footerHeight = $("footer").outerHeight();
    var winHeight = window.innerHeight;
    var mainHeight = winHeight - headerHeight - footerHeight;
    $("main").css("min-height", mainHeight);
});

/* =====Increase Descrese========== */
$(".inc-btn").click(function() {
    var get_val = parseInt($(this).parent().prev("input.form-control").val());
    get_val = get_val + 1;
    $(this).parent().prev("input.form-control").val(get_val)
});

$(".dec-btn").click(function() {
    var dec_val = parseInt($(this).parent().next("input.form-control").val());
    if (dec_val <= 0) {
        return false;
    } else {
        dec_val = dec_val - 1;
        $(this).parent().next("input.form-control").val(dec_val)
    }
});
/* =====Increase Descrese End========== */


$(document).ready(function() {
    /* Toggle Header User info Drop Down */
    $(document).on("click", ".user_top_box ", function() {
        $(".user_top_box .dropdown-menu").toggleClass("show");
    });

    $(document).click(function(e) {
        if (!$(e.target).is(".head-drop-down, .head-drop-down *, .user_top_box, .user_top_box *")) {
            $(".user_top_box .dropdown-menu").removeClass('show');
        }
    });

    / ============Nice Scroll============= /
    // var nice = $("html").niceScroll();
    // $(".scroll-section, .sidebar").niceScroll({
    //     cursorborder: "",
    //     cursorcolor: "#f1592a",
    //     boxzoom: false

    // });




});

// animation

(function($) {
    $.fn.visible = function(partial) {

        var $t = $(this),
            $w = $(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height(),
            _top = $t.offset().top,
            _bottom = _top + $t.height(),
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

    };

})(jQuery);

var win = $(window);

var allMods = $(".animate_top, .animate_left, .animate_right");

allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
        el.addClass("already-visible");
    }
});

win.scroll(function(event) {

    allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("come-in");
        }
    });

});