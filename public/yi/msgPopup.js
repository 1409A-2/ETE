define("common/widgets/subject_header_c/javascript/msgPopup", ["require", "exports", "module", "dep/jquery.mCustomScrollbar.min", "dep/artTemplate/dist/template", "dep/jquery.cookie/jquery.cookie"], function (require) {
    function a(a) {
        return "PAI" === a.messageType ? !0 : "SYSTEM" === a.messageType && null != a.businessStatus && "C_USER_ACTIVE" !== a.businessStatus ? !0 : !1
    }

    function c() {
        _.hasClass("open") && _.find("li.lg_msg_item").removeClass("is_new")
    }

    var g = (require("dep/jquery.mCustomScrollbar.min")(jQuery), require("dep/artTemplate/dist/template"));
    require("dep/jquery.cookie/jquery.cookie"), g.helper("tjnoNoPager", function (a) {
        return 10 > a ? "000" + a : "00" + a
    }), g.helper("tjnoWithPager", function (a, c) {
        return (10 > c ? "0" + c : c) + (10 > a ? "0" + a : a)
    }), g.helper("formatText", function (a, c) {
        return a.length > c ? a.substr(0, c) + "..." : a
    }), g.helper("resolvePaiTopTemplate", function (a, c) {
        a = $.parseJSON(a);
        var _ = "PAI_C_PUSH" === c || "PAI_SERVICE_USER_EVALUATION" === c ? "PAI_" + c + "_FOR_TOP" : "PAI_" + c, P = g(_, a);
        return "PAI_SERVICE_USER_EVALUATION" !== c ? P.replace(/<\/?a[^>]*>/, "").replace(/<\/a[^>]*>/, "") : P
    });
    var _ = $(".msg_dropdown"), P = $("#headMsgAmount"), h = function () {
        _.data("unreaded") === !0 && (PASSPORT.util.rpc({
            params: {},
            url: lctx + "/message/clearNew.json",
            succ: function () {
            },
            fail: function () {
            }
        }), _.data("unreaded", !1))
    };
    $("#lgPopupMsgBody").length > 0 && PASSPORT.util.rpc({
        params: {},
        url: lctx + "/message/newMessageList.json",
        succ: function (c) {
            var h, S, y = $("#lgPopupMsgBody"), v = c.content.data;
            if (v.newMessageList && v.newMessageList.length > 0) {
                v.newMessageCount && (_.data("unreaded", !0), P.removeClass("hide").html(v.newMessageCount));
                for (var i = 0; i < v.newMessageList.length; i++)a(v.newMessageList[i]) || (h = v.newMessageList[i].content, h && "object" != typeof h && (S = $.parseJSON(h), S.companyShowName = S.companyShortName || S.companyName, v.newMessageList[i].content = S));
                y.html(g("TOP_MSG_TPL", c)), $(".lg_msg_pu_body").mCustomScrollbar({theme: "dark-2"})
            } else $("#lgPopupMsgBody").html('<div class="no_body"><p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p></div>')
        },
        fail: function () {
            $("#lgPopupMsgBody").html('<div class="no_body"><p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p></div>')
        }
    }), $(".msg_group").click(function (a) {
        a.stopImmediatePropagation(), h(), c(), _.toggleClass("open"), P.hide(200)
    }), $(document).click(function (a) {
        var g = $(a.target);
        g.parents(".lg_msg_popup").length > 0 || (c(), _.removeClass("open"))
    })
});