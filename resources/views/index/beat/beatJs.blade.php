<script>
    jQuery(function () {
        //小火箭
        $(window).scroll(function () {
            if ((document.documentElement.scrollTop || document.body.scrollTop) > 0) {
                $("#backtop").show();
            } else {
                $("#backtop").hide();
            }
        });
        $("#backtop").click(function () {
            pageScroll();
        });

        function pageScroll() {
            $("#backtop").css("background-position-x", "-28px");
            window.scrollBy(0, -20);
            var scrolldelay = setTimeout(function () {
                pageScroll();
            }, 1);
            if (document.documentElement.scrollTop == 0 && document.body.scrollTop == 0) {
                $("#backtop").css("background-position-x", "0");
                clearTimeout(scrolldelay);
            }
        }

        //小火箭结束
        $(".collapsible_menu").hover(function () {
            $(this).addClass("expend");
            $("dd", this).show();
        }, function () {
            $(this).removeClass("expend");
            $("dd", this).hide();
        });
    })
</script>