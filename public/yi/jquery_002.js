define("dep/jquery.mCustomScrollbar.min",["require","exports","module","dep/jquery/dist/jquery","dep/jquery-ui-1.10.4.min","dep/jquery.mousewheel-3.0.6.min","dep/jquery.mousewheel-3.0.6.min"],function(require,exports,module){require("dep/jquery/dist/jquery"),require("dep/jquery-ui-1.10.4.min"),require("dep/jquery.mousewheel-3.0.6.min"),function(a){"undefined"!=typeof module&&module.exports?module.exports=a:a(jQuery,window,document)}(function(a){!function(c){var h="function"==typeof define&&define.amd,g="undefined"!=typeof module&&module.exports,v="https:"==document.location.protocol?"https:":"http:",_="cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js";h||(g?require("dep/jquery.mousewheel-3.0.6.min")(a):a.event.special.mousewheel||a("head").append(decodeURI("%3Cscript src="+v+"//"+_+"%3E%3C/script%3E"))),c()}(function(){var c,h="mCustomScrollbar",g="mCS",v=".mCustomScrollbar",_={setTop:0,setLeft:0,axis:"y",scrollbarPosition:"inside",scrollInertia:950,autoDraggerLength:!0,alwaysShowScrollbar:0,snapOffset:0,mouseWheel:{enable:!0,scrollAmount:"auto",axis:"y",deltaFactor:"auto",disableOver:["select","option","keygen","datalist","textarea"]},scrollButtons:{scrollType:"stepless",scrollAmount:"auto"},keyboard:{enable:!0,scrollType:"stepless",scrollAmount:"auto"},contentTouchScroll:25,documentTouchScroll:!0,advanced:{autoScrollOnFocus:"input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",updateOnContentResize:!0,updateOnImageLoad:"auto",autoUpdateTimeout:60},theme:"light",callbacks:{onTotalScrollOffset:0,onTotalScrollBackOffset:0,alwaysTriggerOffsets:!0}},w=0,S={},b=window.attachEvent&&!window.addEventListener?1:0,C=!1,y=["mCSB_dragger_onDrag","mCSB_scrollTools_onDrag","mCS_img_loaded","mCS_disabled","mCS_destroyed","mCS_no_scrollbar","mCS-autoHide","mCS-dir-rtl","mCS_no_scrollbar_y","mCS_no_scrollbar_x","mCS_y_hidden","mCS_x_hidden","mCSB_draggerContainer","mCSB_buttonUp","mCSB_buttonDown","mCSB_buttonLeft","mCSB_buttonRight"],B={init:function(c){var c=a.extend(!0,{},_,c),h=T.call(this);if(c.live){var b=c.liveSelector||this.selector||v,C=a(b);if("off"===c.live)return void M(b);S[b]=setTimeout(function(){C.mCustomScrollbar(c),"once"===c.live&&C.length&&M(b)},500)}else M(b);return c.setWidth=c.set_width?c.set_width:c.setWidth,c.setHeight=c.set_height?c.set_height:c.setHeight,c.axis=c.horizontalScroll?"x":O(c.axis),c.scrollInertia=c.scrollInertia>0&&c.scrollInertia<17?17:c.scrollInertia,"object"!=typeof c.mouseWheel&&1==c.mouseWheel&&(c.mouseWheel={enable:!0,scrollAmount:"auto",axis:"y",preventDefault:!1,deltaFactor:"auto",normalizeDelta:!1,invert:!1}),c.mouseWheel.scrollAmount=c.mouseWheelPixels?c.mouseWheelPixels:c.mouseWheel.scrollAmount,c.mouseWheel.normalizeDelta=c.advanced.normalizeMouseWheelDelta?c.advanced.normalizeMouseWheelDelta:c.mouseWheel.normalizeDelta,c.scrollButtons.scrollType=I(c.scrollButtons.scrollType),k(c),a(h).each(function(){var h=a(this);if(!h.data(g)){h.data(g,{idx:++w,opt:c,scrollRatio:{y:null,x:null},overflowed:null,contentReset:{y:null,x:null},bindEvents:!1,tweenRunning:!1,sequential:{},langDir:h.css("direction"),cbOffsets:null,trigger:null,poll:{size:{o:0,n:0},img:{o:0,n:0},change:{o:0,n:0}}});var d=h.data(g),o=d.opt,v=h.data("mcs-axis"),_=h.data("mcs-scrollbar-position"),S=h.data("mcs-theme");v&&(o.axis=v),_&&(o.scrollbarPosition=_),S&&(o.theme=S,k(o)),D.call(this),d&&o.callbacks.onCreate&&"function"==typeof o.callbacks.onCreate&&o.callbacks.onCreate.call(this),a("#mCSB_"+d.idx+"_container img:not(."+y[2]+")").addClass(y[2]),B.update.call(null,h)}})},update:function(c,h){var v=c||T.call(this);return a(v).each(function(){var c=a(this);if(c.data(g)){var d=c.data(g),o=d.opt,v=a("#mCSB_"+d.idx+"_container"),_=a("#mCSB_"+d.idx),w=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")];if(!v.length)return;d.tweenRunning&&st(c),h&&d&&o.callbacks.onBeforeUpdate&&"function"==typeof o.callbacks.onBeforeUpdate&&o.callbacks.onBeforeUpdate.call(this),c.hasClass(y[3])&&c.removeClass(y[3]),c.hasClass(y[4])&&c.removeClass(y[4]),_.css("max-height","none"),_.height()!==c.height()&&_.css("max-height",c.height()),R.call(this),"y"===o.axis||o.advanced.autoExpandHorizontalScroll||v.css("width",E(v)),d.overflowed=P.call(this),F.call(this),o.autoDraggerLength&&A.call(this),L.call(this),U.call(this);var S=[Math.abs(v[0].offsetTop),Math.abs(v[0].offsetLeft)];"x"!==o.axis&&(d.overflowed[0]?w[0].height()>w[0].parent().height()?H.call(this):(ct(c,S[0].toString(),{dir:"y",dur:0,overwrite:"none"}),d.contentReset.y=null):(H.call(this),"y"===o.axis?j.call(this):"yx"===o.axis&&d.overflowed[1]&&ct(c,S[1].toString(),{dir:"x",dur:0,overwrite:"none"}))),"y"!==o.axis&&(d.overflowed[1]?w[1].width()>w[1].parent().width()?H.call(this):(ct(c,S[1].toString(),{dir:"x",dur:0,overwrite:"none"}),d.contentReset.x=null):(H.call(this),"x"===o.axis?j.call(this):"yx"===o.axis&&d.overflowed[0]&&ct(c,S[0].toString(),{dir:"y",dur:0,overwrite:"none"}))),h&&d&&(2===h&&o.callbacks.onImageLoad&&"function"==typeof o.callbacks.onImageLoad?o.callbacks.onImageLoad.call(this):3===h&&o.callbacks.onSelectorChange&&"function"==typeof o.callbacks.onSelectorChange?o.callbacks.onSelectorChange.call(this):o.callbacks.onUpdate&&"function"==typeof o.callbacks.onUpdate&&o.callbacks.onUpdate.call(this)),it.call(this)}})},scrollTo:function(c,h){if("undefined"!=typeof c&&null!=c){var v=T.call(this);return a(v).each(function(){var v=a(this);if(v.data(g)){var d=v.data(g),o=d.opt,_={trigger:"external",scrollInertia:o.scrollInertia,scrollEasing:"mcsEaseInOut",moveDragger:!1,timeout:60,callbacks:!0,onStart:!0,onUpdate:!0,onComplete:!0},w=a.extend(!0,{},_,h),S=at.call(this,c),b=w.scrollInertia>0&&w.scrollInertia<17?17:w.scrollInertia;S[0]=nt.call(this,S[0],"y"),S[1]=nt.call(this,S[1],"x"),w.moveDragger&&(S[0]*=d.scrollRatio.y,S[1]*=d.scrollRatio.x),w.dur=xt()?0:b,setTimeout(function(){null!==S[0]&&"undefined"!=typeof S[0]&&"x"!==o.axis&&d.overflowed[0]&&(w.dir="y",w.overwrite="all",ct(v,S[0].toString(),w)),null!==S[1]&&"undefined"!=typeof S[1]&&"y"!==o.axis&&d.overflowed[1]&&(w.dir="x",w.overwrite="none",ct(v,S[1].toString(),w))},w.timeout)}})}},stop:function(){var c=T.call(this);return a(c).each(function(){var c=a(this);c.data(g)&&st(c)})},disable:function(r){var c=T.call(this);return a(c).each(function(){var c=a(this);if(c.data(g)){{c.data(g)}it.call(this,"remove"),j.call(this),r&&H.call(this),F.call(this,!0),c.addClass(y[3])}})},destroy:function(){var c=T.call(this);return a(c).each(function(){var v=a(this);if(v.data(g)){var d=v.data(g),o=d.opt,_=a("#mCSB_"+d.idx),w=a("#mCSB_"+d.idx+"_container"),S=a(".mCSB_"+d.idx+"_scrollbar");o.live&&M(o.liveSelector||a(c).selector),it.call(this,"remove"),j.call(this),H.call(this),v.removeData(g),ht(this,"mcs"),S.remove(),w.find("img."+y[2]).removeClass(y[2]),_.replaceWith(w.contents()),v.removeClass(h+" _"+g+"_"+d.idx+" "+y[6]+" "+y[7]+" "+y[5]+" "+y[3]).addClass(y[4])}})}},T=function(){return"object"!=typeof a(this)||a(this).length<1?v:this},k=function(c){var h=["rounded","rounded-dark","rounded-dots","rounded-dots-dark"],g=["rounded-dots","rounded-dots-dark","3d","3d-dark","3d-thick","3d-thick-dark","inset","inset-dark","inset-2","inset-2-dark","inset-3","inset-3-dark"],v=["minimal","minimal-dark"],_=["minimal","minimal-dark"],w=["minimal","minimal-dark"];c.autoDraggerLength=a.inArray(c.theme,h)>-1?!1:c.autoDraggerLength,c.autoExpandScrollbar=a.inArray(c.theme,g)>-1?!1:c.autoExpandScrollbar,c.scrollButtons.enable=a.inArray(c.theme,v)>-1?!1:c.scrollButtons.enable,c.autoHideScrollbar=a.inArray(c.theme,_)>-1?!0:c.autoHideScrollbar,c.scrollbarPosition=a.inArray(c.theme,w)>-1?"outside":c.scrollbarPosition},M=function(a){S[a]&&(clearTimeout(S[a]),ht(S,a))},O=function(a){return"yx"===a||"xy"===a||"auto"===a?"yx":"x"===a||"horizontal"===a?"x":"y"},I=function(a){return"stepped"===a||"pixels"===a||"step"===a||"click"===a?"stepped":"stepless"},D=function(){var c=a(this),d=c.data(g),o=d.opt,v=o.autoExpandScrollbar?" "+y[1]+"_expand":"",_=["<div id='mCSB_"+d.idx+"_scrollbar_vertical' class='mCSB_scrollTools mCSB_"+d.idx+"_scrollbar mCS-"+o.theme+" mCSB_scrollTools_vertical"+v+"'><div class='"+y[12]+"'><div id='mCSB_"+d.idx+"_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>","<div id='mCSB_"+d.idx+"_scrollbar_horizontal' class='mCSB_scrollTools mCSB_"+d.idx+"_scrollbar mCS-"+o.theme+" mCSB_scrollTools_horizontal"+v+"'><div class='"+y[12]+"'><div id='mCSB_"+d.idx+"_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"],w="yx"===o.axis?"mCSB_vertical_horizontal":"x"===o.axis?"mCSB_horizontal":"mCSB_vertical",S="yx"===o.axis?_[0]+_[1]:"x"===o.axis?_[1]:_[0],b="yx"===o.axis?"<div id='mCSB_"+d.idx+"_container_wrapper' class='mCSB_container_wrapper' />":"",C=o.autoHideScrollbar?" "+y[6]:"",B="x"!==o.axis&&"rtl"===d.langDir?" "+y[7]:"";o.setWidth&&c.css("width",o.setWidth),o.setHeight&&c.css("height",o.setHeight),o.setLeft="y"!==o.axis&&"rtl"===d.langDir?"989999px":o.setLeft,c.addClass(h+" _"+g+"_"+d.idx+C+B).wrapInner("<div id='mCSB_"+d.idx+"' class='mCustomScrollBox mCS-"+o.theme+" "+w+"'><div id='mCSB_"+d.idx+"_container' class='mCSB_container' style='position:relative; top:"+o.setTop+"; left:"+o.setLeft+";' dir="+d.langDir+" /></div>");var T=a("#mCSB_"+d.idx),k=a("#mCSB_"+d.idx+"_container");"y"===o.axis||o.advanced.autoExpandHorizontalScroll||k.css("width",E(k)),"outside"===o.scrollbarPosition?("static"===c.css("position")&&c.css("position","relative"),c.css("overflow","visible"),T.addClass("mCSB_outside").after(S)):(T.addClass("mCSB_inside").append(S),k.wrap(b)),W.call(this);var M=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")];M[0].css("min-height",M[0].height()),M[1].css("min-width",M[1].width())},E=function(c){var h=[c[0].scrollWidth,Math.max.apply(Math,c.children().map(function(){return a(this).outerWidth(!0)}).get())],g=c.parent().width();return h[0]>g?h[0]:h[1]>g?h[1]:"100%"},R=function(){var c=a(this),d=c.data(g),o=d.opt,h=a("#mCSB_"+d.idx+"_container");if(o.advanced.autoExpandHorizontalScroll&&"y"!==o.axis){h.css({width:"auto","min-width":0,"overflow-x":"scroll"});var v=Math.ceil(h[0].scrollWidth);3===o.advanced.autoExpandHorizontalScroll||2!==o.advanced.autoExpandHorizontalScroll&&v>h.parent().width()?h.css({width:v,"min-width":"100%","overflow-x":"inherit"}):h.css({"overflow-x":"inherit",position:"absolute"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({width:Math.ceil(h[0].getBoundingClientRect().right+.4)-Math.floor(h[0].getBoundingClientRect().left),"min-width":"100%",position:"relative"}).unwrap()}},W=function(){var c=a(this),d=c.data(g),o=d.opt,h=a(".mCSB_"+d.idx+"_scrollbar:first"),v=gt(o.scrollButtons.tabindex)?"tabindex='"+o.scrollButtons.tabindex+"'":"",_=["<a href='#' class='"+y[13]+"' oncontextmenu='return false;' "+v+" />","<a href='#' class='"+y[14]+"' oncontextmenu='return false;' "+v+" />","<a href='#' class='"+y[15]+"' oncontextmenu='return false;' "+v+" />","<a href='#' class='"+y[16]+"' oncontextmenu='return false;' "+v+" />"],w=["x"===o.axis?_[2]:_[0],"x"===o.axis?_[3]:_[1],_[2],_[3]];o.scrollButtons.enable&&h.prepend(w[0]).append(w[1]).next(".mCSB_scrollTools").prepend(w[2]).append(w[3])},A=function(){var c=a(this),d=c.data(g),h=a("#mCSB_"+d.idx),v=a("#mCSB_"+d.idx+"_container"),_=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")],w=[h.height()/v.outerHeight(!1),h.width()/v.outerWidth(!1)],l=[parseInt(_[0].css("min-height")),Math.round(w[0]*_[0].parent().height()),parseInt(_[1].css("min-width")),Math.round(w[1]*_[1].parent().width())],S=b&&l[1]<l[0]?l[0]:l[1],C=b&&l[3]<l[2]?l[2]:l[3];_[0].css({height:S,"max-height":_[0].parent().height()-10}).find(".mCSB_dragger_bar").css({"line-height":l[0]+"px"}),_[1].css({width:C,"max-width":_[1].parent().width()-10})},L=function(){var c=a(this),d=c.data(g),h=a("#mCSB_"+d.idx),v=a("#mCSB_"+d.idx+"_container"),_=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")],w=[v.outerHeight(!1)-h.height(),v.outerWidth(!1)-h.width()],S=[w[0]/(_[0].parent().height()-_[0].height()),w[1]/(_[1].parent().width()-_[1].width())];d.scrollRatio={y:S[0],x:S[1]}},z=function(a,c,h){var g=h?y[0]+"_expanded":"",v=a.closest(".mCSB_scrollTools");"active"===c?(a.toggleClass(y[0]+" "+g),v.toggleClass(y[1]),a[0]._draggable=a[0]._draggable?0:1):a[0]._draggable||("hide"===c?(a.removeClass(y[0]),v.removeClass(y[1])):(a.addClass(y[0]),v.addClass(y[1])))},P=function(){var c=a(this),d=c.data(g),h=a("#mCSB_"+d.idx),v=a("#mCSB_"+d.idx+"_container"),_=null==d.overflowed?v.height():v.outerHeight(!1),w=null==d.overflowed?v.width():v.outerWidth(!1),S=v[0].scrollHeight,b=v[0].scrollWidth;return S>_&&(_=S),b>w&&(w=b),[_>h.height(),w>h.width()]},H=function(){var c=a(this),d=c.data(g),o=d.opt,h=a("#mCSB_"+d.idx),v=a("#mCSB_"+d.idx+"_container"),_=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")];if(st(c),("x"!==o.axis&&!d.overflowed[0]||"y"===o.axis&&d.overflowed[0])&&(_[0].add(v).css("top",0),ct(c,"_resetY")),"y"!==o.axis&&!d.overflowed[1]||"x"===o.axis&&d.overflowed[1]){var w=dx=0;"rtl"===d.langDir&&(w=h.width()-v.outerWidth(!1),dx=Math.abs(w/d.scrollRatio.x)),v.css("left",w),_[1].css("left",dx),ct(c,"_resetX")}},U=function(){function c(){v=setTimeout(function(){a.event.special.mousewheel?(clearTimeout(v),Q.call(h[0])):c()},100)}var h=a(this),d=h.data(g),o=d.opt;if(!d.bindEvents){if(X.call(this),o.contentTouchScroll&&N.call(this),V.call(this),o.mouseWheel.enable){var v;c()}K.call(this),$.call(this),o.advanced.autoScrollOnFocus&&Z.call(this),o.scrollButtons.enable&&et.call(this),o.keyboard.enable&&tt.call(this),d.bindEvents=!0}},j=function(){var c=a(this),d=c.data(g),o=d.opt,h=g+"_"+d.idx,v=".mCSB_"+d.idx+"_scrollbar",_=a("#mCSB_"+d.idx+",#mCSB_"+d.idx+"_container,#mCSB_"+d.idx+"_container_wrapper,"+v+" ."+y[12]+",#mCSB_"+d.idx+"_dragger_vertical,#mCSB_"+d.idx+"_dragger_horizontal,"+v+">a"),w=a("#mCSB_"+d.idx+"_container");o.advanced.releaseDraggableSelectors&&_.add(a(o.advanced.releaseDraggableSelectors)),o.advanced.extraDraggableSelectors&&_.add(a(o.advanced.extraDraggableSelectors)),d.bindEvents&&(a(document).add(a(!G()||top.document)).unbind("."+h),_.each(function(){a(this).unbind("."+h)}),clearTimeout(c[0]._focusTimeout),ht(c[0],"_focusTimeout"),clearTimeout(d.sequential.step),ht(d.sequential,"step"),clearTimeout(w[0].onCompleteTimeout),ht(w[0],"onCompleteTimeout"),d.bindEvents=!1)},F=function(c){var h=a(this),d=h.data(g),o=d.opt,v=a("#mCSB_"+d.idx+"_container_wrapper"),_=v.length?v:a("#mCSB_"+d.idx+"_container"),w=[a("#mCSB_"+d.idx+"_scrollbar_vertical"),a("#mCSB_"+d.idx+"_scrollbar_horizontal")],S=[w[0].find(".mCSB_dragger"),w[1].find(".mCSB_dragger")];"x"!==o.axis&&(d.overflowed[0]&&!c?(w[0].add(S[0]).add(w[0].children("a")).css("display","block"),_.removeClass(y[8]+" "+y[10])):(o.alwaysShowScrollbar?(2!==o.alwaysShowScrollbar&&S[0].css("display","none"),_.removeClass(y[10])):(w[0].css("display","none"),_.addClass(y[10])),_.addClass(y[8]))),"y"!==o.axis&&(d.overflowed[1]&&!c?(w[1].add(S[1]).add(w[1].children("a")).css("display","block"),_.removeClass(y[9]+" "+y[11])):(o.alwaysShowScrollbar?(2!==o.alwaysShowScrollbar&&S[1].css("display","none"),_.removeClass(y[11])):(w[1].css("display","none"),_.addClass(y[11])),_.addClass(y[9]))),d.overflowed[0]||d.overflowed[1]?h.removeClass(y[5]):h.addClass(y[5])},Y=function(e){var t=e.type,o=e.target.ownerDocument!==document?[a(frameElement).offset().top,a(frameElement).offset().left]:null,c=G()&&e.target.ownerDocument!==top.document?[a(e.view.frameElement).offset().top,a(e.view.frameElement).offset().left]:[0,0];switch(t){case"pointerdown":case"MSPointerDown":case"pointermove":case"MSPointerMove":case"pointerup":case"MSPointerUp":return o?[e.originalEvent.pageY-o[0]+c[0],e.originalEvent.pageX-o[1]+c[1],!1]:[e.originalEvent.pageY,e.originalEvent.pageX,!1];case"touchstart":case"touchmove":case"touchend":var h=e.originalEvent.touches[0]||e.originalEvent.changedTouches[0],g=e.originalEvent.touches.length||e.originalEvent.changedTouches.length;return e.target.ownerDocument!==document?[h.screenY,h.screenX,g>1]:[h.pageY,h.pageX,g>1];default:return o?[e.pageY-o[0]+c[0],e.pageX-o[1]+c[1],!1]:[e.pageY,e.pageX,!1]}},X=function(){function c(a){var c=T.find("iframe");if(c.length){var h=a?"auto":"none";c.css("pointer-events",h)}}function h(a,c,h,x){if(T[0].idleTimer=o.scrollInertia<233?250:0,v.attr("id")===B[1])var g="x",_=(v[0].offsetLeft-c+x)*d.scrollRatio.x;else var g="y",_=(v[0].offsetTop-a+h)*d.scrollRatio.y;ct(S,_.toString(),{dir:g,drag:!0})}var v,_,w,S=a(this),d=S.data(g),o=d.opt,y=g+"_"+d.idx,B=["mCSB_"+d.idx+"_dragger_vertical","mCSB_"+d.idx+"_dragger_horizontal"],T=a("#mCSB_"+d.idx+"_container"),k=a("#"+B[0]+",#"+B[1]),M=o.advanced.releaseDraggableSelectors?k.add(a(o.advanced.releaseDraggableSelectors)):k,O=o.advanced.extraDraggableSelectors?a(!G()||top.document).add(a(o.advanced.extraDraggableSelectors)):a(!G()||top.document);k.bind("mousedown."+y+" touchstart."+y+" pointerdown."+y+" MSPointerDown."+y,function(e){if(e.stopImmediatePropagation(),e.preventDefault(),mt(e)){C=!0,b&&(document.onselectstart=function(){return!1}),c(!1),st(S),v=a(this);var h=v.offset(),g=Y(e)[0]-h.top,x=Y(e)[1]-h.left,y=v.height()+h.top,B=v.width()+h.left;y>g&&g>0&&B>x&&x>0&&(_=g,w=x),z(v,"active",o.autoExpandScrollbar)}}).bind("touchmove."+y,function(e){e.stopImmediatePropagation(),e.preventDefault();var a=v.offset(),c=Y(e)[0]-a.top,x=Y(e)[1]-a.left;h(_,w,c,x)}),a(document).add(O).bind("mousemove."+y+" pointermove."+y+" MSPointerMove."+y,function(e){if(v){var a=v.offset(),c=Y(e)[0]-a.top,x=Y(e)[1]-a.left;if(_===c&&w===x)return;h(_,w,c,x)}}).add(M).bind("mouseup."+y+" touchend."+y+" pointerup."+y+" MSPointerUp."+y,function(){v&&(z(v,"active",o.autoExpandScrollbar),v=null),C=!1,b&&(document.onselectstart=null),c(!0)})},N=function(){function h(e){if(!pt(e)||C||Y(e)[2])return void(c=0);c=1,L=0,z=0,y=1,P.removeClass("mCS_touch_action");var a=j.offset();B=Y(e)[0]-a.top,T=Y(e)[1]-a.left,J=[Y(e)[0],Y(e)[1]]}function v(e){if(pt(e)&&!C&&!Y(e)[2]&&(o.documentTouchScroll||e.preventDefault(),e.stopImmediatePropagation(),(!z||L)&&y)){I=ut();var a=U.offset(),c=Y(e)[0]-a.top,x=Y(e)[1]-a.left,h="mcsLinearOut";if(X.push(c),N.push(x),J[2]=Math.abs(Y(e)[0]-J[0]),J[3]=Math.abs(Y(e)[1]-J[1]),d.overflowed[0])var g=F[0].parent().height()-F[0].height(),v=B-c>0&&c-B>-(g*d.scrollRatio.y)&&(2*J[3]<J[2]||"yx"===o.axis);if(d.overflowed[1])var _=F[1].parent().width()-F[1].width(),w=T-x>0&&x-T>-(_*d.scrollRatio.x)&&(2*J[2]<J[3]||"yx"===o.axis);v||w?($||e.preventDefault(),L=1):(z=1,P.addClass("mCS_touch_action")),$&&e.preventDefault(),W="yx"===o.axis?[B-c,T-x]:"x"===o.axis?[null,T-x]:[B-c,null],j[0].idleTimer=250,d.overflowed[0]&&b(W[0],V,h,"y","all",!0),d.overflowed[1]&&b(W[1],V,h,"x",Q,!0)}}function _(e){if(!pt(e)||C||Y(e)[2])return void(c=0);c=1,e.stopImmediatePropagation(),st(P),O=ut();var a=U.offset();k=Y(e)[0]-a.top,M=Y(e)[1]-a.left,X=[],N=[]}function w(e){if(pt(e)&&!C&&!Y(e)[2]){y=0,e.stopImmediatePropagation(),L=0,z=0,D=ut();var a=U.offset(),c=Y(e)[0]-a.top,x=Y(e)[1]-a.left;if(!(D-I>30)){R=1e3/(D-O);var h="mcsEaseOut",g=2.5>R,v=g?[X[X.length-2],N[N.length-2]]:[0,0];E=g?[c-v[0],x-v[1]]:[c-k,x-M];var _=[Math.abs(E[0]),Math.abs(E[1])];R=g?[Math.abs(E[0]/4),Math.abs(E[1]/4)]:[R,R];var w=[Math.abs(j[0].offsetTop)-E[0]*S(_[0]/R[0],R[0]),Math.abs(j[0].offsetLeft)-E[1]*S(_[1]/R[1],R[1])];W="yx"===o.axis?[w[0],w[1]]:"x"===o.axis?[null,w[1]]:[w[0],null],A=[4*_[0]+o.scrollInertia,4*_[1]+o.scrollInertia];var B=parseInt(o.contentTouchScroll)||0;W[0]=_[0]>B?W[0]:0,W[1]=_[1]>B?W[1]:0,d.overflowed[0]&&b(W[0],A[0],h,"y",Q,!1),d.overflowed[1]&&b(W[1],A[1],h,"x",Q,!1)}}}function S(a,s){var r=[1.5*s,2*s,s/1.5,s/2];return a>90?s>4?r[0]:r[3]:a>60?s>3?r[3]:r[2]:a>30?s>8?r[1]:s>6?r[0]:s>4?s:r[2]:s>8?s:r[3]}function b(a,c,h,g,v,_){a&&ct(P,a.toString(),{dur:c,scrollEasing:h,dir:g,overwrite:v,drag:_})}var y,B,T,k,M,O,I,D,E,R,W,A,L,z,P=a(this),d=P.data(g),o=d.opt,H=g+"_"+d.idx,U=a("#mCSB_"+d.idx),j=a("#mCSB_"+d.idx+"_container"),F=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")],X=[],N=[],V=0,Q="yx"===o.axis?"none":"all",J=[],K=j.find("iframe"),Z=["touchstart."+H+" pointerdown."+H+" MSPointerDown."+H,"touchmove."+H+" pointermove."+H+" MSPointerMove."+H,"touchend."+H+" pointerup."+H+" MSPointerUp."+H],$=void 0!==document.body.style.touchAction;j.bind(Z[0],function(e){h(e)}).bind(Z[1],function(e){v(e)}),U.bind(Z[0],function(e){_(e)}).bind(Z[2],function(e){w(e)}),K.length&&K.each(function(){a(this).load(function(){G(this)&&a(this.contentDocument||this.contentWindow.document).bind(Z[0],function(e){h(e),_(e)}).bind(Z[1],function(e){v(e)}).bind(Z[2],function(e){w(e)})})})},V=function(){function h(){return window.getSelection?window.getSelection().toString():document.selection&&"Control"!=document.selection.type?document.selection.createRange().text:0}function v(a,c,s){S.type=s&&_?"stepped":"stepless",S.scrollAmount=10,ot(w,a,c,"mcsLinearOut",s?60:null)}var _,w=a(this),d=w.data(g),o=d.opt,S=d.sequential,b=g+"_"+d.idx,y=a("#mCSB_"+d.idx+"_container"),B=y.parent();y.bind("mousedown."+b,function(){c||_||(_=1,C=!0)}).add(document).bind("mousemove."+b,function(e){if(!c&&_&&h()){var a=y.offset(),g=Y(e)[0]-a.top+y[0].offsetTop,x=Y(e)[1]-a.left+y[0].offsetLeft;g>0&&g<B.height()&&x>0&&x<B.width()?S.step&&v("off",null,"stepped"):("x"!==o.axis&&d.overflowed[0]&&(0>g?v("on",38):g>B.height()&&v("on",40)),"y"!==o.axis&&d.overflowed[1]&&(0>x?v("on",37):x>B.width()&&v("on",39)))}}).bind("mouseup."+b+" dragend."+b,function(){c||(_&&(_=0,v("off",null)),C=!1)})},Q=function(){function c(e,c){if(st(h),!J(h,e.target)){var g="auto"!==o.mouseWheel.deltaFactor?parseInt(o.mouseWheel.deltaFactor):b&&e.deltaFactor<100?100:e.deltaFactor||100,v=o.scrollInertia;if("x"===o.axis||"x"===o.mouseWheel.axis)var S="x",C=[Math.round(g*d.scrollRatio.x),parseInt(o.mouseWheel.scrollAmount)],y="auto"!==o.mouseWheel.scrollAmount?C[1]:C[0]>=_.width()?.9*_.width():C[0],B=Math.abs(a("#mCSB_"+d.idx+"_container")[0].offsetLeft),T=w[1][0].offsetLeft,k=w[1].parent().width()-w[1].width(),M=e.deltaX||e.deltaY||c;else var S="y",C=[Math.round(g*d.scrollRatio.y),parseInt(o.mouseWheel.scrollAmount)],y="auto"!==o.mouseWheel.scrollAmount?C[1]:C[0]>=_.height()?.9*_.height():C[0],B=Math.abs(a("#mCSB_"+d.idx+"_container")[0].offsetTop),T=w[0][0].offsetTop,k=w[0].parent().height()-w[0].height(),M=e.deltaY||c;"y"===S&&!d.overflowed[0]||"x"===S&&!d.overflowed[1]||((o.mouseWheel.invert||e.webkitDirectionInvertedFromDevice)&&(M=-M),o.mouseWheel.normalizeDelta&&(M=0>M?-1:1),(M>0&&0!==T||0>M&&T!==k||o.mouseWheel.preventDefault)&&(e.stopImmediatePropagation(),e.preventDefault()),e.deltaFactor<2&&!o.mouseWheel.normalizeDelta&&(y=e.deltaFactor,v=17),ct(h,(B-M*y).toString(),{dir:S,dur:v}))}}if(a(this).data(g)){var h=a(this),d=h.data(g),o=d.opt,v=g+"_"+d.idx,_=a("#mCSB_"+d.idx),w=[a("#mCSB_"+d.idx+"_dragger_vertical"),a("#mCSB_"+d.idx+"_dragger_horizontal")],S=a("#mCSB_"+d.idx+"_container").find("iframe");S.length&&S.each(function(){a(this).load(function(){G(this)&&a(this.contentDocument||this.contentWindow.document).bind("mousewheel."+v,function(e,a){c(e,a)})})}),_.bind("mousewheel."+v,function(e,a){c(e,a)})}},G=function(a){var c=null;if(a){try{var h=a.contentDocument||a.contentWindow.document;c=h.body.innerHTML}catch(g){}return null!==c}try{var h=top.document;c=h.body.innerHTML}catch(g){}return null!==c},J=function(c,h){var v=h.nodeName.toLowerCase(),_=c.data(g).opt.mouseWheel.disableOver,w=["select","textarea"];return a.inArray(v,_)>-1&&!(a.inArray(v,w)>-1&&!a(h).is(":focus"))},K=function(){var c,h=a(this),d=h.data(g),v=g+"_"+d.idx,_=a("#mCSB_"+d.idx+"_container"),w=_.parent(),S=a(".mCSB_"+d.idx+"_scrollbar ."+y[12]);S.bind("mousedown."+v+" touchstart."+v+" pointerdown."+v+" MSPointerDown."+v,function(e){C=!0,a(e.target).hasClass("mCSB_dragger")||(c=1)}).bind("touchend."+v+" pointerup."+v+" MSPointerUp."+v,function(){C=!1}).bind("click."+v,function(e){if(c&&(c=0,a(e.target).hasClass(y[12])||a(e.target).hasClass("mCSB_draggerRail"))){st(h);var g=a(this),v=g.find(".mCSB_dragger");if(g.parent(".mCSB_scrollTools_horizontal").length>0){if(!d.overflowed[1])return;var S="x",b=e.pageX>v.offset().left?-1:1,C=Math.abs(_[0].offsetLeft)-.9*b*w.width()}else{if(!d.overflowed[0])return;var S="y",b=e.pageY>v.offset().top?-1:1,C=Math.abs(_[0].offsetTop)-.9*b*w.height()}ct(h,C.toString(),{dir:S,scrollEasing:"mcsEaseInOut"})}})},Z=function(){var c=a(this),d=c.data(g),o=d.opt,h=g+"_"+d.idx,v=a("#mCSB_"+d.idx+"_container"),_=v.parent();v.bind("focusin."+h,function(){var h=a(document.activeElement),g=v.find(".mCustomScrollBox").length,w=0;h.is(o.advanced.autoScrollOnFocus)&&(st(c),clearTimeout(c[0]._focusTimeout),c[0]._focusTimer=g?(w+17)*g:0,c[0]._focusTimeout=setTimeout(function(){var a=[vt(h)[0],vt(h)[1]],g=[v[0].offsetTop,v[0].offsetLeft],S=[g[0]+a[0]>=0&&g[0]+a[0]<_.height()-h.outerHeight(!1),g[1]+a[1]>=0&&g[0]+a[1]<_.width()-h.outerWidth(!1)],b="yx"!==o.axis||S[0]||S[1]?"all":"none";"x"===o.axis||S[0]||ct(c,a[0].toString(),{dir:"y",scrollEasing:"mcsEaseInOut",overwrite:b,dur:w}),"y"===o.axis||S[1]||ct(c,a[1].toString(),{dir:"x",scrollEasing:"mcsEaseInOut",overwrite:b,dur:w})},c[0]._focusTimer))})},$=function(){var c=a(this),d=c.data(g),h=g+"_"+d.idx,v=a("#mCSB_"+d.idx+"_container").parent();v.bind("scroll."+h,function(){(0!==v.scrollTop()||0!==v.scrollLeft())&&a(".mCSB_"+d.idx+"_scrollbar").css("visibility","hidden")})},et=function(){var c=a(this),d=c.data(g),o=d.opt,h=d.sequential,v=g+"_"+d.idx,_=".mCSB_"+d.idx+"_scrollbar",w=a(_+">a");w.bind("mousedown."+v+" touchstart."+v+" pointerdown."+v+" MSPointerDown."+v+" mouseup."+v+" touchend."+v+" pointerup."+v+" MSPointerUp."+v+" mouseout."+v+" pointerout."+v+" MSPointerOut."+v+" click."+v,function(e){function g(a,g){h.scrollAmount=o.scrollButtons.scrollAmount,ot(c,a,g)}if(e.preventDefault(),mt(e)){var v=a(this).attr("class");switch(h.type=o.scrollButtons.scrollType,e.type){case"mousedown":case"touchstart":case"pointerdown":case"MSPointerDown":if("stepped"===h.type)return;C=!0,d.tweenRunning=!1,g("on",v);break;case"mouseup":case"touchend":case"pointerup":case"MSPointerUp":case"mouseout":case"pointerout":case"MSPointerOut":if("stepped"===h.type)return;C=!1,h.dir&&g("off",v);break;case"click":if("stepped"!==h.type||d.tweenRunning)return;g("on",v)}}})},tt=function(){function c(e){function c(a,c){v.type=o.keyboard.scrollType,v.scrollAmount=o.keyboard.scrollAmount,"stepped"===v.type&&d.tweenRunning||ot(h,a,c)}switch(e.type){case"blur":d.tweenRunning&&v.dir&&c("off",null);break;case"keydown":case"keyup":var g=e.keyCode?e.keyCode:e.which,_="on";if("x"!==o.axis&&(38===g||40===g)||"y"!==o.axis&&(37===g||39===g)){if((38===g||40===g)&&!d.overflowed[0]||(37===g||39===g)&&!d.overflowed[1])return;"keyup"===e.type&&(_="off"),a(document.activeElement).is(C)||(e.preventDefault(),e.stopImmediatePropagation(),c(_,g))}else if(33===g||34===g){if((d.overflowed[0]||d.overflowed[1])&&(e.preventDefault(),e.stopImmediatePropagation()),"keyup"===e.type){st(h);var w=34===g?-1:1;if("x"===o.axis||"yx"===o.axis&&d.overflowed[1]&&!d.overflowed[0])var y="x",B=Math.abs(S[0].offsetLeft)-.9*w*b.width();else var y="y",B=Math.abs(S[0].offsetTop)-.9*w*b.height();ct(h,B.toString(),{dir:y,scrollEasing:"mcsEaseInOut"})}}else if((35===g||36===g)&&!a(document.activeElement).is(C)&&((d.overflowed[0]||d.overflowed[1])&&(e.preventDefault(),e.stopImmediatePropagation()),"keyup"===e.type)){if("x"===o.axis||"yx"===o.axis&&d.overflowed[1]&&!d.overflowed[0])var y="x",B=35===g?Math.abs(b.width()-S.outerWidth(!1)):0;else var y="y",B=35===g?Math.abs(b.height()-S.outerHeight(!1)):0;ct(h,B.toString(),{dir:y,scrollEasing:"mcsEaseInOut"})}}}var h=a(this),d=h.data(g),o=d.opt,v=d.sequential,_=g+"_"+d.idx,w=a("#mCSB_"+d.idx),S=a("#mCSB_"+d.idx+"_container"),b=S.parent(),C="input,textarea,select,datalist,keygen,[contenteditable='true']",y=S.find("iframe"),B=["blur."+_+" keydown."+_+" keyup."+_];y.length&&y.each(function(){a(this).load(function(){G(this)&&a(this.contentDocument||this.contentWindow.document).bind(B[0],function(e){c(e)})})}),w.attr("tabindex","0").bind(B[0],function(e){c(e)})},ot=function(c,h,v,e,s){function _(a){o.snapAmount&&(S.scrollAmount=o.snapAmount instanceof Array?"x"===S.dir[0]?o.snapAmount[1]:o.snapAmount[0]:o.snapAmount);var h="stepped"!==S.type,t=s?s:a?h?B/1.5:T:1e3/60,m=a?h?7.5:40:2.5,g=[Math.abs(b[0].offsetTop),Math.abs(b[0].offsetLeft)],v=[d.scrollRatio.y>10?10:d.scrollRatio.y,d.scrollRatio.x>10?10:d.scrollRatio.x],w="x"===S.dir[0]?g[1]+S.dir[1]*v[1]*m:g[0]+S.dir[1]*v[0]*m,C="x"===S.dir[0]?g[1]+S.dir[1]*parseInt(S.scrollAmount):g[0]+S.dir[1]*parseInt(S.scrollAmount),y="auto"!==S.scrollAmount?C:w,k=e?e:a?h?"mcsLinearOut":"mcsEaseInOut":"mcsLinear",M=a?!0:!1;return a&&17>t&&(y="x"===S.dir[0]?g[1]:g[0]),ct(c,y.toString(),{dir:S.dir[0],scrollEasing:k,dur:t,onComplete:M}),a?void(S.dir=!1):(clearTimeout(S.step),void(S.step=setTimeout(function(){_()},t)))}function w(){clearTimeout(S.step),ht(S,"step"),st(c)}var d=c.data(g),o=d.opt,S=d.sequential,b=a("#mCSB_"+d.idx+"_container"),C="stepped"===S.type?!0:!1,B=o.scrollInertia<26?26:o.scrollInertia,T=o.scrollInertia<1?17:o.scrollInertia;switch(h){case"on":if(S.dir=[v===y[16]||v===y[15]||39===v||37===v?"x":"y",v===y[13]||v===y[15]||38===v||37===v?-1:1],st(c),gt(v)&&"stepped"===S.type)return;_(C);break;case"off":w(),(C||d.tweenRunning&&S.dir)&&_(!0)}},at=function(c){var o=a(this).data(g).opt,h=[];return"function"==typeof c&&(c=c()),c instanceof Array?h=c.length>1?[c[0],c[1]]:"x"===o.axis?[null,c[0]]:[c[0],null]:(h[0]=c.y?c.y:c.x||"x"===o.axis?null:c,h[1]=c.x?c.x:c.y||"y"===o.axis?null:c),"function"==typeof h[0]&&(h[0]=h[0]()),"function"==typeof h[1]&&(h[1]=h[1]()),h},nt=function(c,h){if(null!=c&&"undefined"!=typeof c){var v=a(this),d=v.data(g),o=d.opt,_=a("#mCSB_"+d.idx+"_container"),w=_.parent(),t=typeof c;h||(h="x"===o.axis?"x":"y");var S="x"===h?_.outerWidth(!1):_.outerHeight(!1),b="x"===h?_[0].offsetLeft:_[0].offsetTop,C="x"===h?"left":"top";switch(t){case"function":return c();case"object":var y=c.jquery?c:a(c);if(!y.length)return;return"x"===h?vt(y)[1]:vt(y)[0];case"string":case"number":if(gt(c))return Math.abs(c);if(-1!==c.indexOf("%"))return Math.abs(S*parseInt(c)/100);if(-1!==c.indexOf("-="))return Math.abs(b-parseInt(c.split("-=")[1]));if(-1!==c.indexOf("+=")){var p=b+parseInt(c.split("+=")[1]);return p>=0?0:Math.abs(p)}if(-1!==c.indexOf("px")&&gt(c.split("px")[0]))return Math.abs(c.split("px")[0]);if("top"===c||"left"===c)return 0;if("bottom"===c)return Math.abs(w.height()-_.outerHeight(!1));if("right"===c)return Math.abs(w.width()-_.outerWidth(!1));if("first"===c||"last"===c){var y=_.find(":"+c);return"x"===h?vt(y)[1]:vt(y)[0]}return a(c).length?"x"===h?vt(a(c))[1]:vt(a(c))[0]:(_.css(C,c),void B.update.call(null,v[0]))}}},it=function(c){function h(){return clearTimeout(b[0].autoUpdate),0===S.parents("html").length?void(S=null):void(b[0].autoUpdate=setTimeout(function(){return o.advanced.updateOnSelectorChange&&(d.poll.change.n=_(),d.poll.change.n!==d.poll.change.o)?(d.poll.change.o=d.poll.change.n,void w(3)):o.advanced.updateOnContentResize&&(d.poll.size.n=S[0].scrollHeight+S[0].scrollWidth+b[0].offsetHeight+S[0].offsetHeight+S[0].offsetWidth,d.poll.size.n!==d.poll.size.o)?(d.poll.size.o=d.poll.size.n,void w(1)):!o.advanced.updateOnImageLoad||"auto"===o.advanced.updateOnImageLoad&&"y"===o.axis||(d.poll.img.n=b.find("img").length,d.poll.img.n===d.poll.img.o)?void((o.advanced.updateOnSelectorChange||o.advanced.updateOnContentResize||o.advanced.updateOnImageLoad)&&h()):(d.poll.img.o=d.poll.img.n,void b.find("img").each(function(){v(this)
}))},o.advanced.autoUpdateTimeout))}function v(c){function h(a,c){return function(){return c.apply(a,arguments)}}function g(){this.onload=null,a(c).addClass(y[2]),w(2)}if(a(c).hasClass(y[2]))return void w();var v=new Image;v.onload=h(v,g),v.src=c.src}function _(){o.advanced.updateOnSelectorChange===!0&&(o.advanced.updateOnSelectorChange="*");var a=0,c=b.find(o.advanced.updateOnSelectorChange);return o.advanced.updateOnSelectorChange&&c.length>0&&c.each(function(){a+=this.offsetHeight+this.offsetWidth}),a}function w(a){clearTimeout(b[0].autoUpdate),B.update.call(null,S[0],a)}var S=a(this),d=S.data(g),o=d.opt,b=a("#mCSB_"+d.idx+"_container");return c?(clearTimeout(b[0].autoUpdate),void ht(b[0],"autoUpdate")):void h()},lt=function(a,c,h){return Math.round(a/c)*c-h},st=function(c){var d=c.data(g),h=a("#mCSB_"+d.idx+"_container,#mCSB_"+d.idx+"_container_wrapper,#mCSB_"+d.idx+"_dragger_vertical,#mCSB_"+d.idx+"_dragger_horizontal");h.each(function(){ft.call(this)})},ct=function(c,h,v){function _(a){return d&&o.callbacks[a]&&"function"==typeof o.callbacks[a]}function w(){return[o.callbacks.alwaysTriggerOffsets||E>=R[0]+A,o.callbacks.alwaysTriggerOffsets||-L>=E]}function S(){var a=[B[0].offsetTop,B[0].offsetLeft],h=[I[0].offsetTop,I[0].offsetLeft],g=[B.outerHeight(!1),B.outerWidth(!1)],_=[y.height(),y.width()];c[0].mcs={content:B,top:a[0],left:a[1],draggerTop:h[0],draggerLeft:h[1],topPct:Math.round(100*Math.abs(a[0])/(Math.abs(g[0])-_[0])),leftPct:Math.round(100*Math.abs(a[1])/(Math.abs(g[1])-_[1])),direction:v.dir}}var d=c.data(g),o=d.opt,b={trigger:"internal",dir:"y",scrollEasing:"mcsEaseOut",drag:!1,dur:o.scrollInertia,overwrite:"all",callbacks:!0,onStart:!0,onUpdate:!0,onComplete:!0},v=a.extend(b,v),C=[v.dur,v.drag?0:v.dur],y=a("#mCSB_"+d.idx),B=a("#mCSB_"+d.idx+"_container"),T=B.parent(),k=o.callbacks.onTotalScrollOffset?at.call(c,o.callbacks.onTotalScrollOffset):[0,0],M=o.callbacks.onTotalScrollBackOffset?at.call(c,o.callbacks.onTotalScrollBackOffset):[0,0];if(d.trigger=v.trigger,(0!==T.scrollTop()||0!==T.scrollLeft())&&(a(".mCSB_"+d.idx+"_scrollbar").css("visibility","visible"),T.scrollTop(0).scrollLeft(0)),"_resetY"!==h||d.contentReset.y||(_("onOverflowYNone")&&o.callbacks.onOverflowYNone.call(c[0]),d.contentReset.y=1),"_resetX"!==h||d.contentReset.x||(_("onOverflowXNone")&&o.callbacks.onOverflowXNone.call(c[0]),d.contentReset.x=1),"_resetY"!==h&&"_resetX"!==h){if(!d.contentReset.y&&c[0].mcs||!d.overflowed[0]||(_("onOverflowY")&&o.callbacks.onOverflowY.call(c[0]),d.contentReset.x=null),!d.contentReset.x&&c[0].mcs||!d.overflowed[1]||(_("onOverflowX")&&o.callbacks.onOverflowX.call(c[0]),d.contentReset.x=null),o.snapAmount){var O=o.snapAmount instanceof Array?"x"===v.dir?o.snapAmount[1]:o.snapAmount[0]:o.snapAmount;h=lt(h,O,o.snapOffset)}switch(v.dir){case"x":var I=a("#mCSB_"+d.idx+"_dragger_horizontal"),D="left",E=B[0].offsetLeft,R=[y.width()-B.outerWidth(!1),I.parent().width()-I.width()],W=[h,0===h?0:h/d.scrollRatio.x],A=k[1],L=M[1],P=A>0?A/d.scrollRatio.x:0,H=L>0?L/d.scrollRatio.x:0;break;case"y":var I=a("#mCSB_"+d.idx+"_dragger_vertical"),D="top",E=B[0].offsetTop,R=[y.height()-B.outerHeight(!1),I.parent().height()-I.height()],W=[h,0===h?0:h/d.scrollRatio.y],A=k[0],L=M[0],P=A>0?A/d.scrollRatio.y:0,H=L>0?L/d.scrollRatio.y:0}W[1]<0||0===W[0]&&0===W[1]?W=[0,0]:W[1]>=R[1]?W=[R[0],R[1]]:W[0]=-W[0],c[0].mcs||(S(),_("onInit")&&o.callbacks.onInit.call(c[0])),clearTimeout(B[0].onCompleteTimeout),dt(I[0],D,Math.round(W[1]),C[1],v.scrollEasing),(d.tweenRunning||!(0===E&&W[0]>=0||E===R[0]&&W[0]<=R[0]))&&dt(B[0],D,Math.round(W[0]),C[0],v.scrollEasing,v.overwrite,{onStart:function(){v.callbacks&&v.onStart&&!d.tweenRunning&&(_("onScrollStart")&&(S(),o.callbacks.onScrollStart.call(c[0])),d.tweenRunning=!0,z(I),d.cbOffsets=w())},onUpdate:function(){v.callbacks&&v.onUpdate&&_("whileScrolling")&&(S(),o.callbacks.whileScrolling.call(c[0]))},onComplete:function(){if(v.callbacks&&v.onComplete){"yx"===o.axis&&clearTimeout(B[0].onCompleteTimeout);var t=B[0].idleTimer||0;B[0].onCompleteTimeout=setTimeout(function(){_("onScroll")&&(S(),o.callbacks.onScroll.call(c[0])),_("onTotalScroll")&&W[1]>=R[1]-P&&d.cbOffsets[0]&&(S(),o.callbacks.onTotalScroll.call(c[0])),_("onTotalScrollBack")&&W[1]<=H&&d.cbOffsets[1]&&(S(),o.callbacks.onTotalScrollBack.call(c[0])),d.tweenRunning=!1,B[0].idleTimer=0,z(I,"hide")},t)}}})}},dt=function(a,c,h,g,v,_,w){function S(){A.stop||(E||M.call(),E=ut()-D,b(),E>=A.time&&(A.time=E>A.time?E+T-(E-A.time):E+T-1,A.time<E+1&&(A.time=E+1)),A.time<g?A.id=k(S):I.call())}function b(){g>0?(A.currVal=B(A.time,R,L,g,v),W[c]=Math.round(A.currVal)+"px"):W[c]=h+"px",O.call()}function C(){T=1e3/60,A.time=E+T,k=window.requestAnimationFrame?window.requestAnimationFrame:function(f){return b(),setTimeout(f,.01)},A.id=k(S)}function y(){null!=A.id&&(window.requestAnimationFrame?window.cancelAnimationFrame(A.id):clearTimeout(A.id),A.id=null)}function B(t,a,c,d,h){switch(h){case"linear":case"mcsLinear":return c*t/d+a;case"mcsLinearOut":return t/=d,t--,c*Math.sqrt(1-t*t)+a;case"easeInOutSmooth":return t/=d/2,1>t?c/2*t*t+a:(t--,-c/2*(t*(t-2)-1)+a);case"easeInOutStrong":return t/=d/2,1>t?c/2*Math.pow(2,10*(t-1))+a:(t--,c/2*(-Math.pow(2,-10*t)+2)+a);case"easeInOut":case"mcsEaseInOut":return t/=d/2,1>t?c/2*t*t*t+a:(t-=2,c/2*(t*t*t+2)+a);case"easeOutSmooth":return t/=d,t--,-c*(t*t*t*t-1)+a;case"easeOutStrong":return c*(-Math.pow(2,-10*t/d)+1)+a;case"easeOut":case"mcsEaseOut":default:var ts=(t/=d)*t,g=ts*t;return a+c*(.499999999999997*g*ts+-2.5*ts*ts+5.5*g+-6.5*ts+4*t)}}a._mTween||(a._mTween={top:{},left:{}});var T,k,w=w||{},M=w.onStart||function(){},O=w.onUpdate||function(){},I=w.onComplete||function(){},D=ut(),E=0,R=a.offsetTop,W=a.style,A=a._mTween[c];"left"===c&&(R=a.offsetLeft);var L=h-R;A.stop=0,"none"!==_&&y(),C()},ut=function(){return window.performance&&window.performance.now?window.performance.now():window.performance&&window.performance.webkitNow?window.performance.webkitNow():Date.now?Date.now():(new Date).getTime()},ft=function(){var a=this;a._mTween||(a._mTween={top:{},left:{}});for(var c=["top","left"],i=0;i<c.length;i++){var h=c[i];a._mTween[h].id&&(window.requestAnimationFrame?window.cancelAnimationFrame(a._mTween[h].id):clearTimeout(a._mTween[h].id),a._mTween[h].id=null,a._mTween[h].stop=1)}},ht=function(a,m){try{delete a[m]}catch(e){a[m]=null}},mt=function(e){return!(e.which&&1!==e.which)},pt=function(e){var t=e.originalEvent.pointerType;return!(t&&"touch"!==t&&2!==t)},gt=function(a){return!isNaN(parseFloat(a))&&isFinite(a)},vt=function(a){var p=a.parents(".mCSB_container");return[a.offset().top-p.offset().top,a.offset().left-p.offset().left]},xt=function(){function a(){var a=["webkit","moz","ms","o"];if("hidden"in document)return"hidden";for(var i=0;i<a.length;i++)if(a[i]+"Hidden"in document)return a[i]+"Hidden";return null}var c=a();return c?document[c]:!1};a.fn[h]=function(c){return B[c]?B[c].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof c&&c?void a.error("Method "+c+" does not exist"):B.init.apply(this,arguments)},a[h]=function(c){return B[c]?B[c].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof c&&c?void a.error("Method "+c+" does not exist"):B.init.apply(this,arguments)},a[h].defaults=_,window[h]=!0,a(window).load(function(){a(v)[h](),a.extend(a.expr[":"],{mcsInView:a.expr[":"].mcsInView||function(c){var h,g,v=a(c),_=v.parents(".mCSB_container");if(_.length)return h=_.parent(),g=[_[0].offsetTop,_[0].offsetLeft],g[0]+vt(v)[0]>=0&&g[0]+vt(v)[0]<h.height()-v.outerHeight(!1)&&g[1]+vt(v)[1]>=0&&g[1]+vt(v)[1]<h.width()-v.outerWidth(!1)},mcsOverflow:a.expr[":"].mcsOverflow||function(c){var d=a(c).data(g);if(d)return d.overflowed[0]||d.overflowed[1]}})})})})});