/*!dep/jquery/dist/jquery.js*/
;
!function (a, c) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = a.document ? c(a, !0) : function (a) {
        if (!a.document)throw new Error("jQuery requires a window with a document");
        return c(a)
    } : c(a)
}("undefined" != typeof window ? window : this, function (a, c) {
    function h(a) {
        var c = "length"in a && a.length, h = xt.type(a);
        return "function" === h || xt.isWindow(a) ? !1 : 1 === a.nodeType && c ? !0 : "array" === h || 0 === c || "number" == typeof c && c > 0 && c - 1 in a
    }

    function g(a, c, h) {
        if (xt.isFunction(c))return xt.grep(a, function (a, i) {
            return !!c.call(a, i, a) !== h
        });
        if (c.nodeType)return xt.grep(a, function (a) {
            return a === c !== h
        });
        if ("string" == typeof c) {
            if (At.test(c))return xt.filter(c, a, h);
            c = xt.filter(c, a)
        }
        return xt.grep(a, function (a) {
            return xt.inArray(a, c) >= 0 !== h
        })
    }

    function v(a, c) {
        do a = a[c]; while (a && 1 !== a.nodeType);
        return a
    }

    function y(a) {
        var c = Ft[a] = {};
        return xt.each(a.match(Mt) || [], function (a, h) {
            c[h] = !0
        }), c
    }

    function b() {
        jt.addEventListener ? (jt.removeEventListener("DOMContentLoaded", w, !1), a.removeEventListener("load", w, !1)) : (jt.detachEvent("onreadystatechange", w), a.detachEvent("onload", w))
    }

    function w() {
        (jt.addEventListener || "load" === event.type || "complete" === jt.readyState) && (b(), xt.ready())
    }

    function T(a, c, h) {
        if (void 0 === h && 1 === a.nodeType) {
            var g = "data-" + c.replace(Rt, "-$1").toLowerCase();
            if (h = a.getAttribute(g), "string" == typeof h) {
                try {
                    h = "true" === h ? !0 : "false" === h ? !1 : "null" === h ? null : +h + "" === h ? +h : Pt.test(h) ? xt.parseJSON(h) : h
                } catch (e) {
                }
                xt.data(a, c, h)
            } else h = void 0
        }
        return h
    }

    function C(a) {
        var c;
        for (c in a)if (("data" !== c || !xt.isEmptyObject(a[c])) && "toJSON" !== c)return !1;
        return !0
    }

    function N(a, c, h, g) {
        if (xt.acceptData(a)) {
            var v, y, b = xt.expando, w = a.nodeType, T = w ? xt.cache : a, C = w ? a[b] : a[b] && b;
            if (C && T[C] && (g || T[C].data) || void 0 !== h || "string" != typeof c)return C || (C = w ? a[b] = ct.pop() || xt.guid++ : b), T[C] || (T[C] = w ? {} : {toJSON: xt.noop}), ("object" == typeof c || "function" == typeof c) && (g ? T[C] = xt.extend(T[C], c) : T[C].data = xt.extend(T[C].data, c)), y = T[C], g || (y.data || (y.data = {}), y = y.data), void 0 !== h && (y[xt.camelCase(c)] = h), "string" == typeof c ? (v = y[c], null == v && (v = y[xt.camelCase(c)])) : v = y, v
        }
    }

    function E(a, c, h) {
        if (xt.acceptData(a)) {
            var g, i, v = a.nodeType, y = v ? xt.cache : a, b = v ? a[xt.expando] : xt.expando;
            if (y[b]) {
                if (c && (g = h ? y[b] : y[b].data)) {
                    xt.isArray(c) ? c = c.concat(xt.map(c, xt.camelCase)) : c in g ? c = [c] : (c = xt.camelCase(c), c = c in g ? [c] : c.split(" ")), i = c.length;
                    for (; i--;)delete g[c[i]];
                    if (h ? !C(g) : !xt.isEmptyObject(g))return
                }
                (h || (delete y[b].data, C(y[b]))) && (v ? xt.cleanData([a], !0) : yt.deleteExpando || y != y.window ? delete y[b] : y[b] = null)
            }
        }
    }

    function k() {
        return !0
    }

    function S() {
        return !1
    }

    function A() {
        try {
            return jt.activeElement
        } catch (a) {
        }
    }

    function D(a) {
        var c = Qt.split("|"), h = a.createDocumentFragment();
        if (h.createElement)for (; c.length;)h.createElement(c.pop());
        return h
    }

    function j(a, c) {
        var h, g, i = 0, v = typeof a.getElementsByTagName !== Bt ? a.getElementsByTagName(c || "*") : typeof a.querySelectorAll !== Bt ? a.querySelectorAll(c || "*") : void 0;
        if (!v)for (v = [], h = a.childNodes || a; null != (g = h[i]); i++)!c || xt.nodeName(g, c) ? v.push(g) : xt.merge(v, j(g, c));
        return void 0 === c || c && xt.nodeName(a, c) ? xt.merge([a], v) : v
    }

    function L(a) {
        Xt.test(a.type) && (a.defaultChecked = a.checked)
    }

    function H(a, c) {
        return xt.nodeName(a, "table") && xt.nodeName(11 !== c.nodeType ? c : c.firstChild, "tr") ? a.getElementsByTagName("tbody")[0] || a.appendChild(a.ownerDocument.createElement("tbody")) : a
    }

    function _(a) {
        return a.type = (null !== xt.find.attr(a, "type")) + "/" + a.type, a
    }

    function M(a) {
        var c = ln.exec(a.type);
        return c ? a.type = c[1] : a.removeAttribute("type"), a
    }

    function F(a, c) {
        for (var h, i = 0; null != (h = a[i]); i++)xt._data(h, "globalEval", !c || xt._data(c[i], "globalEval"))
    }

    function O(a, c) {
        if (1 === c.nodeType && xt.hasData(a)) {
            var h, i, l, g = xt._data(a), v = xt._data(c, g), y = g.events;
            if (y) {
                delete v.handle, v.events = {};
                for (h in y)for (i = 0, l = y[h].length; l > i; i++)xt.event.add(c, h, y[h][i])
            }
            v.data && (v.data = xt.extend({}, v.data))
        }
    }

    function B(a, c) {
        var h, e, g;
        if (1 === c.nodeType) {
            if (h = c.nodeName.toLowerCase(), !yt.noCloneEvent && c[xt.expando]) {
                g = xt._data(c);
                for (e in g.events)xt.removeEvent(c, e, g.handle);
                c.removeAttribute(xt.expando)
            }
            "script" === h && c.text !== a.text ? (_(c).text = a.text, M(c)) : "object" === h ? (c.parentNode && (c.outerHTML = a.outerHTML), yt.html5Clone && a.innerHTML && !xt.trim(c.innerHTML) && (c.innerHTML = a.innerHTML)) : "input" === h && Xt.test(a.type) ? (c.defaultChecked = c.checked = a.checked, c.value !== a.value && (c.value = a.value)) : "option" === h ? c.defaultSelected = c.selected = a.defaultSelected : ("input" === h || "textarea" === h) && (c.defaultValue = a.defaultValue)
        }
    }

    function P(c, h) {
        var g, v = xt(h.createElement(c)).appendTo(h.body), y = a.getDefaultComputedStyle && (g = a.getDefaultComputedStyle(v[0])) ? g.display : xt.css(v[0], "display");
        return v.detach(), y
    }

    function R(a) {
        var c = jt, h = mn[a];
        return h || (h = P(a, c), "none" !== h && h || (hn = (hn || xt("<iframe frameborder='0' width='0' height='0'/>")).appendTo(c.documentElement), c = (hn[0].contentWindow || hn[0].contentDocument).document, c.write(), c.close(), h = P(a, c), hn.detach()), mn[a] = h), h
    }

    function W(a, c) {
        return {
            get: function () {
                var h = a();
                if (null != h)return h ? void delete this.get : (this.get = c).apply(this, arguments)
            }
        }
    }

    function $(a, c) {
        if (c in a)return c;
        for (var h = c.charAt(0).toUpperCase() + c.slice(1), g = c, i = An.length; i--;)if (c = An[i] + h, c in a)return c;
        return g
    }

    function z(a, c) {
        for (var h, g, v, y = [], b = 0, w = a.length; w > b; b++)g = a[b], g.style && (y[b] = xt._data(g, "olddisplay"), h = g.style.display, c ? (y[b] || "none" !== h || (g.style.display = ""), "" === g.style.display && zt(g) && (y[b] = xt._data(g, "olddisplay", R(g.nodeName)))) : (v = zt(g), (h && "none" !== h || !v) && xt._data(g, "olddisplay", v ? h : xt.css(g, "display"))));
        for (b = 0; w > b; b++)g = a[b], g.style && (c && "none" !== g.style.display && "" !== g.style.display || (g.style.display = c ? y[b] || "" : "none"));
        return a
    }

    function I(a, c, h) {
        var g = Nn.exec(c);
        return g ? Math.max(0, g[1] - (h || 0)) + (g[2] || "px") : c
    }

    function X(a, c, h, g, v) {
        for (var i = h === (g ? "border" : "content") ? 4 : "width" === c ? 1 : 0, y = 0; 4 > i; i += 2)"margin" === h && (y += xt.css(a, h + $t[i], !0, v)), g ? ("content" === h && (y -= xt.css(a, "padding" + $t[i], !0, v)), "margin" !== h && (y -= xt.css(a, "border" + $t[i] + "Width", !0, v))) : (y += xt.css(a, "padding" + $t[i], !0, v), "padding" !== h && (y += xt.css(a, "border" + $t[i] + "Width", !0, v)));
        return y
    }

    function U(a, c, h) {
        var g = !0, v = "width" === c ? a.offsetWidth : a.offsetHeight, y = gn(a), b = yt.boxSizing && "border-box" === xt.css(a, "boxSizing", !1, y);
        if (0 >= v || null == v) {
            if (v = vn(a, c, y), (0 > v || null == v) && (v = a.style[c]), bn.test(v))return v;
            g = b && (yt.boxSizingReliable() || v === a.style[c]), v = parseFloat(v) || 0
        }
        return v + X(a, c, h || (b ? "border" : "content"), g, y) + "px"
    }

    function V(a, c, h, g, v) {
        return new V.prototype.init(a, c, h, g, v)
    }

    function J() {
        return setTimeout(function () {
            Dn = void 0
        }), Dn = xt.now()
    }

    function Y(a, c) {
        var h, g = {height: a}, i = 0;
        for (c = c ? 1 : 0; 4 > i; i += 2 - c)h = $t[i], g["margin" + h] = g["padding" + h] = a;
        return c && (g.opacity = g.width = a), g
    }

    function G(a, c, h) {
        for (var g, v = (Mn[c] || []).concat(Mn["*"]), y = 0, b = v.length; b > y; y++)if (g = v[y].call(h, c, a))return g
    }

    function Q(a, c, h) {
        var g, v, y, b, w, T, C, N, E = this, k = {}, S = a.style, A = a.nodeType && zt(a), D = xt._data(a, "fxshow");
        h.queue || (w = xt._queueHooks(a, "fx"), null == w.unqueued && (w.unqueued = 0, T = w.empty.fire, w.empty.fire = function () {
            w.unqueued || T()
        }), w.unqueued++, E.always(function () {
            E.always(function () {
                w.unqueued--, xt.queue(a, "fx").length || w.empty.fire()
            })
        })), 1 === a.nodeType && ("height"in c || "width"in c) && (h.overflow = [S.overflow, S.overflowX, S.overflowY], C = xt.css(a, "display"), N = "none" === C ? xt._data(a, "olddisplay") || R(a.nodeName) : C, "inline" === N && "none" === xt.css(a, "float") && (yt.inlineBlockNeedsLayout && "inline" !== R(a.nodeName) ? S.zoom = 1 : S.display = "inline-block")), h.overflow && (S.overflow = "hidden", yt.shrinkWrapBlocks() || E.always(function () {
            S.overflow = h.overflow[0], S.overflowX = h.overflow[1], S.overflowY = h.overflow[2]
        }));
        for (g in c)if (v = c[g], Ln.exec(v)) {
            if (delete c[g], y = y || "toggle" === v, v === (A ? "hide" : "show")) {
                if ("show" !== v || !D || void 0 === D[g])continue;
                A = !0
            }
            k[g] = D && D[g] || xt.style(a, g)
        } else C = void 0;
        if (xt.isEmptyObject(k))"inline" === ("none" === C ? R(a.nodeName) : C) && (S.display = C); else {
            D ? "hidden"in D && (A = D.hidden) : D = xt._data(a, "fxshow", {}), y && (D.hidden = !A), A ? xt(a).show() : E.done(function () {
                xt(a).hide()
            }), E.done(function () {
                var c;
                xt._removeData(a, "fxshow");
                for (c in k)xt.style(a, c, k[c])
            });
            for (g in k)b = G(A ? D[g] : 0, g, E), g in D || (D[g] = b.start, A && (b.end = b.start, b.start = "width" === g || "height" === g ? 1 : 0))
        }
    }

    function K(a, c) {
        var h, g, v, y, b;
        for (h in a)if (g = xt.camelCase(h), v = c[g], y = a[h], xt.isArray(y) && (v = y[1], y = a[h] = y[0]), h !== g && (a[g] = y, delete a[h]), b = xt.cssHooks[g], b && "expand"in b) {
            y = b.expand(y), delete a[g];
            for (h in y)h in a || (a[h] = y[h], c[h] = v)
        } else c[g] = v
    }

    function Z(a, c, h) {
        var g, v, y = 0, b = _n.length, w = xt.Deferred().always(function () {
            delete T.elem
        }), T = function () {
            if (v)return !1;
            for (var c = Dn || J(), h = Math.max(0, C.startTime + C.duration - c), g = h / C.duration || 0, y = 1 - g, b = 0, T = C.tweens.length; T > b; b++)C.tweens[b].run(y);
            return w.notifyWith(a, [C, y, h]), 1 > y && T ? h : (w.resolveWith(a, [C]), !1)
        }, C = w.promise({
            elem: a,
            props: xt.extend({}, c),
            opts: xt.extend(!0, {specialEasing: {}}, h),
            originalProperties: c,
            originalOptions: h,
            startTime: Dn || J(),
            duration: h.duration,
            tweens: [],
            createTween: function (c, h) {
                var g = xt.Tween(a, C.opts, c, h, C.opts.specialEasing[c] || C.opts.easing);
                return C.tweens.push(g), g
            },
            stop: function (c) {
                var h = 0, g = c ? C.tweens.length : 0;
                if (v)return this;
                for (v = !0; g > h; h++)C.tweens[h].run(1);
                return c ? w.resolveWith(a, [C, c]) : w.rejectWith(a, [C, c]), this
            }
        }), N = C.props;
        for (K(N, C.opts.specialEasing); b > y; y++)if (g = _n[y].call(C, a, N, C.opts))return g;
        return xt.map(N, G, C), xt.isFunction(C.opts.start) && C.opts.start.call(a, C), xt.fx.timer(xt.extend(T, {
            elem: a,
            anim: C,
            queue: C.opts.queue
        })), C.progress(C.opts.progress).done(C.opts.done, C.opts.complete).fail(C.opts.fail).always(C.opts.always)
    }

    function et(a) {
        return function (c, h) {
            "string" != typeof c && (h = c, c = "*");
            var g, i = 0, v = c.toLowerCase().match(Mt) || [];
            if (xt.isFunction(h))for (; g = v[i++];)"+" === g.charAt(0) ? (g = g.slice(1) || "*", (a[g] = a[g] || []).unshift(h)) : (a[g] = a[g] || []).push(h)
        }
    }

    function tt(a, c, h, g) {
        function v(w) {
            var T;
            return y[w] = !0, xt.each(a[w] || [], function (a, w) {
                var C = w(c, h, g);
                return "string" != typeof C || b || y[C] ? b ? !(T = C) : void 0 : (c.dataTypes.unshift(C), v(C), !1)
            }), T
        }

        var y = {}, b = a === ar;
        return v(c.dataTypes[0]) || !y["*"] && v("*")
    }

    function nt(a, c) {
        var h, g, v = xt.ajaxSettings.flatOptions || {};
        for (g in c)void 0 !== c[g] && ((v[g] ? a : h || (h = {}))[g] = c[g]);
        return h && xt.extend(!0, a, h), a
    }

    function it(s, a, c) {
        for (var h, g, v, y, b = s.contents, w = s.dataTypes; "*" === w[0];)w.shift(), void 0 === g && (g = s.mimeType || a.getResponseHeader("Content-Type"));
        if (g)for (y in b)if (b[y] && b[y].test(g)) {
            w.unshift(y);
            break
        }
        if (w[0]in c)v = w[0]; else {
            for (y in c) {
                if (!w[0] || s.converters[y + " " + w[0]]) {
                    v = y;
                    break
                }
                h || (h = y)
            }
            v = v || h
        }
        return v ? (v !== w[0] && w.unshift(v), c[v]) : void 0
    }

    function ot(s, a, c, h) {
        var g, v, y, b, w, T = {}, C = s.dataTypes.slice();
        if (C[1])for (y in s.converters)T[y.toLowerCase()] = s.converters[y];
        for (v = C.shift(); v;)if (s.responseFields[v] && (c[s.responseFields[v]] = a), !w && h && s.dataFilter && (a = s.dataFilter(a, s.dataType)), w = v, v = C.shift())if ("*" === v)v = w; else if ("*" !== w && w !== v) {
            if (y = T[w + " " + v] || T["* " + v], !y)for (g in T)if (b = g.split(" "), b[1] === v && (y = T[w + " " + b[0]] || T["* " + b[0]])) {
                y === !0 ? y = T[g] : T[g] !== !0 && (v = b[0], C.unshift(b[1]));
                break
            }
            if (y !== !0)if (y && s["throws"])a = y(a); else try {
                a = y(a)
            } catch (e) {
                return {state: "parsererror", error: y ? e : "No conversion from " + w + " to " + v}
            }
        }
        return {state: "success", data: a}
    }

    function at(a, c, h, g) {
        var v;
        if (xt.isArray(c))xt.each(c, function (i, c) {
            h || lr.test(a) ? g(a, c) : at(a + "[" + ("object" == typeof c ? i : "") + "]", c, h, g)
        }); else if (h || "object" !== xt.type(c))g(a, c); else for (v in c)at(a + "[" + v + "]", c[v], h, g)
    }

    function st() {
        try {
            return new a.XMLHttpRequest
        } catch (e) {
        }
    }

    function ut() {
        try {
            return new a.ActiveXObject("Microsoft.XMLHTTP")
        } catch (e) {
        }
    }

    function lt(a) {
        return xt.isWindow(a) ? a : 9 === a.nodeType ? a.defaultView || a.parentWindow : !1
    }

    var ct = [], dt = ct.slice, ft = ct.concat, pt = ct.push, ht = ct.indexOf, mt = {}, gt = mt.toString, vt = mt.hasOwnProperty, yt = {}, bt = "1.11.3", xt = function (a, c) {
        return new xt.fn.init(a, c)
    }, wt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, Tt = /^-ms-/, Ct = /-([\da-z])/gi, Nt = function (a, c) {
        return c.toUpperCase()
    };
    xt.fn = xt.prototype = {
        jquery: bt, constructor: xt, selector: "", length: 0, toArray: function () {
            return dt.call(this)
        }, get: function (a) {
            return null != a ? 0 > a ? this[a + this.length] : this[a] : dt.call(this)
        }, pushStack: function (a) {
            var c = xt.merge(this.constructor(), a);
            return c.prevObject = this, c.context = this.context, c
        }, each: function (a, c) {
            return xt.each(this, a, c)
        }, map: function (a) {
            return this.pushStack(xt.map(this, function (c, i) {
                return a.call(c, i, c)
            }))
        }, slice: function () {
            return this.pushStack(dt.apply(this, arguments))
        }, first: function () {
            return this.eq(0)
        }, last: function () {
            return this.eq(-1)
        }, eq: function (i) {
            var a = this.length, c = +i + (0 > i ? a : 0);
            return this.pushStack(c >= 0 && a > c ? [this[c]] : [])
        }, end: function () {
            return this.prevObject || this.constructor(null)
        }, push: pt, sort: ct.sort, splice: ct.splice
    }, xt.extend = xt.fn.extend = function () {
        var a, c, h, g, v, y, b = arguments[0] || {}, i = 1, w = arguments.length, T = !1;
        for ("boolean" == typeof b && (T = b, b = arguments[i] || {}, i++), "object" == typeof b || xt.isFunction(b) || (b = {}), i === w && (b = this, i--); w > i; i++)if (null != (v = arguments[i]))for (g in v)a = b[g], h = v[g], b !== h && (T && h && (xt.isPlainObject(h) || (c = xt.isArray(h))) ? (c ? (c = !1, y = a && xt.isArray(a) ? a : []) : y = a && xt.isPlainObject(a) ? a : {}, b[g] = xt.extend(T, y, h)) : void 0 !== h && (b[g] = h));
        return b
    }, xt.extend({
        expando: "jQuery" + (bt + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (a) {
            throw new Error(a)
        }, noop: function () {
        }, isFunction: function (a) {
            return "function" === xt.type(a)
        }, isArray: Array.isArray || function (a) {
            return "array" === xt.type(a)
        }, isWindow: function (a) {
            return null != a && a == a.window
        }, isNumeric: function (a) {
            return !xt.isArray(a) && a - parseFloat(a) + 1 >= 0
        }, isEmptyObject: function (a) {
            var c;
            for (c in a)return !1;
            return !0
        }, isPlainObject: function (a) {
            var c;
            if (!a || "object" !== xt.type(a) || a.nodeType || xt.isWindow(a))return !1;
            try {
                if (a.constructor && !vt.call(a, "constructor") && !vt.call(a.constructor.prototype, "isPrototypeOf"))return !1
            } catch (e) {
                return !1
            }
            if (yt.ownLast)for (c in a)return vt.call(a, c);
            for (c in a);
            return void 0 === c || vt.call(a, c)
        }, type: function (a) {
            return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? mt[gt.call(a)] || "object" : typeof a
        }, globalEval: function (c) {
            c && xt.trim(c) && (a.execScript || function (c) {
                a.eval.call(a, c)
            })(c)
        }, camelCase: function (a) {
            return a.replace(Tt, "ms-").replace(Ct, Nt)
        }, nodeName: function (a, c) {
            return a.nodeName && a.nodeName.toLowerCase() === c.toLowerCase()
        }, each: function (a, c, g) {
            var v, i = 0, y = a.length, b = h(a);
            if (g) {
                if (b)for (; y > i && (v = c.apply(a[i], g), v !== !1); i++); else for (i in a)if (v = c.apply(a[i], g), v === !1)break
            } else if (b)for (; y > i && (v = c.call(a[i], i, a[i]), v !== !1); i++); else for (i in a)if (v = c.call(a[i], i, a[i]), v === !1)break;
            return a
        }, trim: function (a) {
            return null == a ? "" : (a + "").replace(wt, "")
        }, makeArray: function (a, c) {
            var g = c || [];
            return null != a && (h(Object(a)) ? xt.merge(g, "string" == typeof a ? [a] : a) : pt.call(g, a)), g
        }, inArray: function (a, c, i) {
            var h;
            if (c) {
                if (ht)return ht.call(c, a, i);
                for (h = c.length, i = i ? 0 > i ? Math.max(0, h + i) : i : 0; h > i; i++)if (i in c && c[i] === a)return i
            }
            return -1
        }, merge: function (a, c) {
            for (var h = +c.length, g = 0, i = a.length; h > g;)a[i++] = c[g++];
            if (h !== h)for (; void 0 !== c[g];)a[i++] = c[g++];
            return a.length = i, a
        }, grep: function (a, c, h) {
            for (var g, v = [], i = 0, y = a.length, b = !h; y > i; i++)g = !c(a[i], i), g !== b && v.push(a[i]);
            return v
        }, map: function (a, c, g) {
            var v, i = 0, y = a.length, b = h(a), w = [];
            if (b)for (; y > i; i++)v = c(a[i], i, g), null != v && w.push(v); else for (i in a)v = c(a[i], i, g), null != v && w.push(v);
            return ft.apply([], w)
        }, guid: 1, proxy: function (a, c) {
            var h, g, v;
            return "string" == typeof c && (v = a[c], c = a, a = v), xt.isFunction(a) ? (h = dt.call(arguments, 2), g = function () {
                return a.apply(c || this, h.concat(dt.call(arguments)))
            }, g.guid = a.guid = a.guid || xt.guid++, g) : void 0
        }, now: function () {
            return +new Date
        }, support: yt
    }), xt.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (i, a) {
        mt["[object " + a + "]"] = a.toLowerCase()
    });
    var Et = function (a) {
        function c(a, c, h, g) {
            var v, y, m, b, i, w, T, C, E, S;
            if ((c ? c.ownerDocument || c : et) !== U && X(c), c = c || U, h = h || [], b = c.nodeType, "string" != typeof a || !a || 1 !== b && 9 !== b && 11 !== b)return h;
            if (!g && J) {
                if (11 !== b && (v = qt.exec(a)))if (m = v[1]) {
                    if (9 === b) {
                        if (y = c.getElementById(m), !y || !y.parentNode)return h;
                        if (y.id === m)return h.push(y), h
                    } else if (c.ownerDocument && (y = c.ownerDocument.getElementById(m)) && K(c, y) && y.id === m)return h.push(y), h
                } else {
                    if (v[2])return pt.apply(h, c.getElementsByTagName(a)), h;
                    if ((m = v[3]) && M.getElementsByClassName)return pt.apply(h, c.getElementsByClassName(m)), h
                }
                if (M.qsa && (!Y || !Y.test(a))) {
                    if (C = T = Z, E = c, S = 1 !== b && a, 1 === b && "object" !== c.nodeName.toLowerCase()) {
                        for (w = P(a), (T = c.getAttribute("id")) ? C = T.replace(Mt, "\\$&") : c.setAttribute("id", C), C = "[id='" + C + "'] ", i = w.length; i--;)w[i] = C + k(w[i]);
                        E = _t.test(a) && N(c.parentNode) || c, S = w.join(",")
                    }
                    if (S)try {
                        return pt.apply(h, E.querySelectorAll(S)), h
                    } catch (A) {
                    } finally {
                        T || c.removeAttribute("id")
                    }
                }
            }
            return W(a.replace(Ct, "$1"), c, h, g)
        }

        function h() {
            function a(h, g) {
                return c.push(h + " ") > F.cacheLength && delete a[c.shift()], a[h + " "] = g
            }

            var c = [];
            return a
        }

        function g(a) {
            return a[Z] = !0, a
        }

        function v(a) {
            var c = U.createElement("div");
            try {
                return !!a(c)
            } catch (e) {
                return !1
            } finally {
                c.parentNode && c.parentNode.removeChild(c), c = null
            }
        }

        function y(a, c) {
            for (var h = a.split("|"), i = a.length; i--;)F.attrHandle[h[i]] = c
        }

        function b(a, c) {
            var h = c && a, g = h && 1 === a.nodeType && 1 === c.nodeType && (~c.sourceIndex || ut) - (~a.sourceIndex || ut);
            if (g)return g;
            if (h)for (; h = h.nextSibling;)if (h === c)return -1;
            return a ? 1 : -1
        }

        function w(a) {
            return function (c) {
                var h = c.nodeName.toLowerCase();
                return "input" === h && c.type === a
            }
        }

        function T(a) {
            return function (c) {
                var h = c.nodeName.toLowerCase();
                return ("input" === h || "button" === h) && c.type === a
            }
        }

        function C(a) {
            return g(function (c) {
                return c = +c, g(function (h, g) {
                    for (var v, y = a([], h.length, c), i = y.length; i--;)h[v = y[i]] && (h[v] = !(g[v] = h[v]))
                })
            })
        }

        function N(a) {
            return a && "undefined" != typeof a.getElementsByTagName && a
        }

        function E() {
        }

        function k(a) {
            for (var i = 0, c = a.length, h = ""; c > i; i++)h += a[i].value;
            return h
        }

        function S(a, c, h) {
            var g = c.dir, v = h && "parentNode" === g, y = nt++;
            return c.first ? function (c, h, y) {
                for (; c = c[g];)if (1 === c.nodeType || v)return a(c, h, y)
            } : function (c, h, b) {
                var w, T, C = [tt, y];
                if (b) {
                    for (; c = c[g];)if ((1 === c.nodeType || v) && a(c, h, b))return !0
                } else for (; c = c[g];)if (1 === c.nodeType || v) {
                    if (T = c[Z] || (c[Z] = {}), (w = T[g]) && w[0] === tt && w[1] === y)return C[2] = w[2];
                    if (T[g] = C, C[2] = a(c, h, b))return !0
                }
            }
        }

        function A(a) {
            return a.length > 1 ? function (c, h, g) {
                for (var i = a.length; i--;)if (!a[i](c, h, g))return !1;
                return !0
            } : a[0]
        }

        function D(a, h, g) {
            for (var i = 0, v = h.length; v > i; i++)c(a, h[i], g);
            return g
        }

        function j(a, c, h, g, v) {
            for (var y, b = [], i = 0, w = a.length, T = null != c; w > i; i++)(y = a[i]) && (!h || h(y, g, v)) && (b.push(y), T && c.push(i));
            return b
        }

        function L(a, c, h, v, y, b) {
            return v && !v[Z] && (v = L(v)), y && !y[Z] && (y = L(y, b)), g(function (g, b, w, T) {
                var C, i, N, E = [], k = [], S = b.length, A = g || D(c || "*", w.nodeType ? [w] : w, []), L = !a || !g && c ? A : j(A, E, a, w, T), H = h ? y || (g ? a : S || v) ? [] : b : L;
                if (h && h(L, H, w, T), v)for (C = j(H, k), v(C, [], w, T), i = C.length; i--;)(N = C[i]) && (H[k[i]] = !(L[k[i]] = N));
                if (g) {
                    if (y || a) {
                        if (y) {
                            for (C = [], i = H.length; i--;)(N = H[i]) && C.push(L[i] = N);
                            y(null, H = [], C, T)
                        }
                        for (i = H.length; i--;)(N = H[i]) && (C = y ? mt(g, N) : E[i]) > -1 && (g[C] = !(b[C] = N))
                    }
                } else H = j(H === b ? H.splice(S, H.length) : H), y ? y(null, b, H, T) : pt.apply(b, H)
            })
        }

        function H(a) {
            for (var c, h, g, v = a.length, y = F.relative[a[0].type], b = y || F.relative[" "], i = y ? 1 : 0, w = S(function (a) {
                return a === c
            }, b, !0), T = S(function (a) {
                return mt(c, a) > -1
            }, b, !0), C = [function (a, h, g) {
                var v = !y && (g || h !== $) || ((c = h).nodeType ? w(a, h, g) : T(a, h, g));
                return c = null, v
            }]; v > i; i++)if (h = F.relative[a[i].type])C = [S(A(C), h)]; else {
                if (h = F.filter[a[i].type].apply(null, a[i].matches), h[Z]) {
                    for (g = ++i; v > g && !F.relative[a[g].type]; g++);
                    return L(i > 1 && A(C), i > 1 && k(a.slice(0, i - 1).concat({value: " " === a[i - 2].type ? "*" : ""})).replace(Ct, "$1"), h, g > i && H(a.slice(i, g)), v > g && H(a = a.slice(g)), v > g && k(a))
                }
                C.push(h)
            }
            return A(C)
        }

        function _(a, h) {
            var v = h.length > 0, y = a.length > 0, b = function (g, b, w, T, C) {
                var N, E, k, S = 0, i = "0", A = g && [], D = [], L = $, H = g || y && F.find.TAG("*", C), _ = tt += null == L ? 1 : Math.random() || .1, M = H.length;
                for (C && ($ = b !== U && b); i !== M && null != (N = H[i]); i++) {
                    if (y && N) {
                        for (E = 0; k = a[E++];)if (k(N, b, w)) {
                            T.push(N);
                            break
                        }
                        C && (tt = _)
                    }
                    v && ((N = !k && N) && S--, g && A.push(N))
                }
                if (S += i, v && i !== S) {
                    for (E = 0; k = h[E++];)k(A, D, b, w);
                    if (g) {
                        if (S > 0)for (; i--;)A[i] || D[i] || (D[i] = dt.call(T));
                        D = j(D)
                    }
                    pt.apply(T, D), C && !g && D.length > 0 && S + h.length > 1 && c.uniqueSort(T)
                }
                return C && (tt = _, $ = L), A
            };
            return v ? g(b) : b
        }

        var i, M, F, O, B, P, R, W, $, z, I, X, U, V, J, Y, G, Q, K, Z = "sizzle" + 1 * new Date, et = a.document, tt = 0, nt = 0, it = h(), ot = h(), at = h(), st = function (a, c) {
            return a === c && (I = !0), 0
        }, ut = 1 << 31, lt = {}.hasOwnProperty, ct = [], dt = ct.pop, ft = ct.push, pt = ct.push, ht = ct.slice, mt = function (a, c) {
            for (var i = 0, h = a.length; h > i; i++)if (a[i] === c)return i;
            return -1
        }, gt = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", vt = "[\\x20\\t\\r\\n\\f]", yt = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", bt = yt.replace("w", "w#"), xt = "\\[" + vt + "*(" + yt + ")(?:" + vt + "*([*^$|!~]?=)" + vt + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + bt + "))|)" + vt + "*\\]", wt = ":(" + yt + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + xt + ")*)|.*)\\)|)", Tt = new RegExp(vt + "+", "g"), Ct = new RegExp("^" + vt + "+|((?:^|[^\\\\])(?:\\\\.)*)" + vt + "+$", "g"), Nt = new RegExp("^" + vt + "*," + vt + "*"), Et = new RegExp("^" + vt + "*([>+~]|" + vt + ")" + vt + "*"), kt = new RegExp("=" + vt + "*([^\\]'\"]*?)" + vt + "*\\]", "g"), St = new RegExp(wt), At = new RegExp("^" + bt + "$"), Dt = {
            ID: new RegExp("^#(" + yt + ")"),
            CLASS: new RegExp("^\\.(" + yt + ")"),
            TAG: new RegExp("^(" + yt.replace("w", "w*") + ")"),
            ATTR: new RegExp("^" + xt),
            PSEUDO: new RegExp("^" + wt),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + vt + "*(even|odd|(([+-]|)(\\d*)n|)" + vt + "*(?:([+-]|)" + vt + "*(\\d+)|))" + vt + "*\\)|)", "i"),
            bool: new RegExp("^(?:" + gt + ")$", "i"),
            needsContext: new RegExp("^" + vt + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + vt + "*((?:-\\d)?\\d*)" + vt + "*\\)|)(?=[^-]|$)", "i")
        }, jt = /^(?:input|select|textarea|button)$/i, Lt = /^h\d$/i, Ht = /^[^{]+\{\s*\[native \w/, qt = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, _t = /[+~]/, Mt = /'|\\/g, Ft = new RegExp("\\\\([\\da-f]{1,6}" + vt + "?|(" + vt + ")|.)", "ig"), Ot = function (a, c, h) {
            var g = "0x" + c - 65536;
            return g !== g || h ? c : 0 > g ? String.fromCharCode(g + 65536) : String.fromCharCode(g >> 10 | 55296, 1023 & g | 56320)
        }, Bt = function () {
            X()
        };
        try {
            pt.apply(ct = ht.call(et.childNodes), et.childNodes), ct[et.childNodes.length].nodeType
        } catch (e) {
            pt = {
                apply: ct.length ? function (a, c) {
                    ft.apply(a, ht.call(c))
                } : function (a, c) {
                    for (var h = a.length, i = 0; a[h++] = c[i++];);
                    a.length = h - 1
                }
            }
        }
        M = c.support = {}, B = c.isXML = function (a) {
            var c = a && (a.ownerDocument || a).documentElement;
            return c ? "HTML" !== c.nodeName : !1
        }, X = c.setDocument = function (a) {
            var c, h, g = a ? a.ownerDocument || a : et;
            return g !== U && 9 === g.nodeType && g.documentElement ? (U = g, V = g.documentElement, h = g.defaultView, h && h !== h.top && (h.addEventListener ? h.addEventListener("unload", Bt, !1) : h.attachEvent && h.attachEvent("onunload", Bt)), J = !B(g), M.attributes = v(function (a) {
                return a.className = "i", !a.getAttribute("className")
            }), M.getElementsByTagName = v(function (a) {
                return a.appendChild(g.createComment("")), !a.getElementsByTagName("*").length
            }), M.getElementsByClassName = Ht.test(g.getElementsByClassName), M.getById = v(function (a) {
                return V.appendChild(a).id = Z, !g.getElementsByName || !g.getElementsByName(Z).length
            }), M.getById ? (F.find.ID = function (a, c) {
                if ("undefined" != typeof c.getElementById && J) {
                    var m = c.getElementById(a);
                    return m && m.parentNode ? [m] : []
                }
            }, F.filter.ID = function (a) {
                var c = a.replace(Ft, Ot);
                return function (a) {
                    return a.getAttribute("id") === c
                }
            }) : (delete F.find.ID, F.filter.ID = function (a) {
                var c = a.replace(Ft, Ot);
                return function (a) {
                    var h = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id");
                    return h && h.value === c
                }
            }), F.find.TAG = M.getElementsByTagName ? function (a, c) {
                return "undefined" != typeof c.getElementsByTagName ? c.getElementsByTagName(a) : M.qsa ? c.querySelectorAll(a) : void 0
            } : function (a, c) {
                var h, g = [], i = 0, v = c.getElementsByTagName(a);
                if ("*" === a) {
                    for (; h = v[i++];)1 === h.nodeType && g.push(h);
                    return g
                }
                return v
            }, F.find.CLASS = M.getElementsByClassName && function (a, c) {
                return J ? c.getElementsByClassName(a) : void 0
            }, G = [], Y = [], (M.qsa = Ht.test(g.querySelectorAll)) && (v(function (a) {
                V.appendChild(a).innerHTML = "<a id='" + Z + "'></a><select id='" + Z + "-\f]' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && Y.push("[*^$]=" + vt + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || Y.push("\\[" + vt + "*(?:value|" + gt + ")"), a.querySelectorAll("[id~=" + Z + "-]").length || Y.push("~="), a.querySelectorAll(":checked").length || Y.push(":checked"), a.querySelectorAll("a#" + Z + "+*").length || Y.push(".#.+[+~]")
            }), v(function (a) {
                var c = g.createElement("input");
                c.setAttribute("type", "hidden"), a.appendChild(c).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && Y.push("name" + vt + "*[*^$|!~]?="), a.querySelectorAll(":enabled").length || Y.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), Y.push(",.*:")
            })), (M.matchesSelector = Ht.test(Q = V.matches || V.webkitMatchesSelector || V.mozMatchesSelector || V.oMatchesSelector || V.msMatchesSelector)) && v(function (a) {
                M.disconnectedMatch = Q.call(a, "div"), Q.call(a, "[s!='']:x"), G.push("!=", wt)
            }), Y = Y.length && new RegExp(Y.join("|")), G = G.length && new RegExp(G.join("|")), c = Ht.test(V.compareDocumentPosition), K = c || Ht.test(V.contains) ? function (a, c) {
                var h = 9 === a.nodeType ? a.documentElement : a, g = c && c.parentNode;
                return a === g || !(!g || 1 !== g.nodeType || !(h.contains ? h.contains(g) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(g)))
            } : function (a, c) {
                if (c)for (; c = c.parentNode;)if (c === a)return !0;
                return !1
            }, st = c ? function (a, c) {
                if (a === c)return I = !0, 0;
                var h = !a.compareDocumentPosition - !c.compareDocumentPosition;
                return h ? h : (h = (a.ownerDocument || a) === (c.ownerDocument || c) ? a.compareDocumentPosition(c) : 1, 1 & h || !M.sortDetached && c.compareDocumentPosition(a) === h ? a === g || a.ownerDocument === et && K(et, a) ? -1 : c === g || c.ownerDocument === et && K(et, c) ? 1 : z ? mt(z, a) - mt(z, c) : 0 : 4 & h ? -1 : 1)
            } : function (a, c) {
                if (a === c)return I = !0, 0;
                var h, i = 0, v = a.parentNode, y = c.parentNode, w = [a], T = [c];
                if (!v || !y)return a === g ? -1 : c === g ? 1 : v ? -1 : y ? 1 : z ? mt(z, a) - mt(z, c) : 0;
                if (v === y)return b(a, c);
                for (h = a; h = h.parentNode;)w.unshift(h);
                for (h = c; h = h.parentNode;)T.unshift(h);
                for (; w[i] === T[i];)i++;
                return i ? b(w[i], T[i]) : w[i] === et ? -1 : T[i] === et ? 1 : 0
            }, g) : U
        }, c.matches = function (a, h) {
            return c(a, null, null, h)
        }, c.matchesSelector = function (a, h) {
            if ((a.ownerDocument || a) !== U && X(a), h = h.replace(kt, "='$1']"), !(!M.matchesSelector || !J || G && G.test(h) || Y && Y.test(h)))try {
                var g = Q.call(a, h);
                if (g || M.disconnectedMatch || a.document && 11 !== a.document.nodeType)return g
            } catch (e) {
            }
            return c(h, U, null, [a]).length > 0
        }, c.contains = function (a, c) {
            return (a.ownerDocument || a) !== U && X(a), K(a, c)
        }, c.attr = function (a, c) {
            (a.ownerDocument || a) !== U && X(a);
            var h = F.attrHandle[c.toLowerCase()], g = h && lt.call(F.attrHandle, c.toLowerCase()) ? h(a, c, !J) : void 0;
            return void 0 !== g ? g : M.attributes || !J ? a.getAttribute(c) : (g = a.getAttributeNode(c)) && g.specified ? g.value : null
        }, c.error = function (a) {
            throw new Error("Syntax error, unrecognized expression: " + a)
        }, c.uniqueSort = function (a) {
            var c, h = [], g = 0, i = 0;
            if (I = !M.detectDuplicates, z = !M.sortStable && a.slice(0), a.sort(st), I) {
                for (; c = a[i++];)c === a[i] && (g = h.push(i));
                for (; g--;)a.splice(h[g], 1)
            }
            return z = null, a
        }, O = c.getText = function (a) {
            var c, h = "", i = 0, g = a.nodeType;
            if (g) {
                if (1 === g || 9 === g || 11 === g) {
                    if ("string" == typeof a.textContent)return a.textContent;
                    for (a = a.firstChild; a; a = a.nextSibling)h += O(a)
                } else if (3 === g || 4 === g)return a.nodeValue
            } else for (; c = a[i++];)h += O(c);
            return h
        }, F = c.selectors = {
            cacheLength: 50,
            createPseudo: g,
            match: Dt,
            attrHandle: {},
            find: {},
            relative: {
                ">": {dir: "parentNode", first: !0},
                " ": {dir: "parentNode"},
                "+": {dir: "previousSibling", first: !0},
                "~": {dir: "previousSibling"}
            },
            preFilter: {
                ATTR: function (a) {
                    return a[1] = a[1].replace(Ft, Ot), a[3] = (a[3] || a[4] || a[5] || "").replace(Ft, Ot), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4)
                }, CHILD: function (a) {
                    return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || c.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && c.error(a[0]), a
                }, PSEUDO: function (a) {
                    var c, h = !a[6] && a[2];
                    return Dt.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : h && St.test(h) && (c = P(h, !0)) && (c = h.indexOf(")", h.length - c) - h.length) && (a[0] = a[0].slice(0, c), a[2] = h.slice(0, c)), a.slice(0, 3))
                }
            },
            filter: {
                TAG: function (a) {
                    var c = a.replace(Ft, Ot).toLowerCase();
                    return "*" === a ? function () {
                        return !0
                    } : function (a) {
                        return a.nodeName && a.nodeName.toLowerCase() === c
                    }
                }, CLASS: function (a) {
                    var c = it[a + " "];
                    return c || (c = new RegExp("(^|" + vt + ")" + a + "(" + vt + "|$)")) && it(a, function (a) {
                            return c.test("string" == typeof a.className && a.className || "undefined" != typeof a.getAttribute && a.getAttribute("class") || "")
                        })
                }, ATTR: function (a, h, g) {
                    return function (v) {
                        var y = c.attr(v, a);
                        return null == y ? "!=" === h : h ? (y += "", "=" === h ? y === g : "!=" === h ? y !== g : "^=" === h ? g && 0 === y.indexOf(g) : "*=" === h ? g && y.indexOf(g) > -1 : "$=" === h ? g && y.slice(-g.length) === g : "~=" === h ? (" " + y.replace(Tt, " ") + " ").indexOf(g) > -1 : "|=" === h ? y === g || y.slice(0, g.length + 1) === g + "-" : !1) : !0
                    }
                }, CHILD: function (a, c, h, g, v) {
                    var y = "nth" !== a.slice(0, 3), b = "last" !== a.slice(-4), w = "of-type" === c;
                    return 1 === g && 0 === v ? function (a) {
                        return !!a.parentNode
                    } : function (c, h, T) {
                        var C, N, E, k, S, A, D = y !== b ? "nextSibling" : "previousSibling", j = c.parentNode, L = w && c.nodeName.toLowerCase(), H = !T && !w;
                        if (j) {
                            if (y) {
                                for (; D;) {
                                    for (E = c; E = E[D];)if (w ? E.nodeName.toLowerCase() === L : 1 === E.nodeType)return !1;
                                    A = D = "only" === a && !A && "nextSibling"
                                }
                                return !0
                            }
                            if (A = [b ? j.firstChild : j.lastChild], b && H) {
                                for (N = j[Z] || (j[Z] = {}), C = N[a] || [], S = C[0] === tt && C[1], k = C[0] === tt && C[2], E = S && j.childNodes[S]; E = ++S && E && E[D] || (k = S = 0) || A.pop();)if (1 === E.nodeType && ++k && E === c) {
                                    N[a] = [tt, S, k];
                                    break
                                }
                            } else if (H && (C = (c[Z] || (c[Z] = {}))[a]) && C[0] === tt)k = C[1]; else for (; (E = ++S && E && E[D] || (k = S = 0) || A.pop()) && ((w ? E.nodeName.toLowerCase() !== L : 1 !== E.nodeType) || !++k || (H && ((E[Z] || (E[Z] = {}))[a] = [tt, k]), E !== c)););
                            return k -= v, k === g || k % g === 0 && k / g >= 0
                        }
                    }
                }, PSEUDO: function (a, h) {
                    var v, y = F.pseudos[a] || F.setFilters[a.toLowerCase()] || c.error("unsupported pseudo: " + a);
                    return y[Z] ? y(h) : y.length > 1 ? (v = [a, a, "", h], F.setFilters.hasOwnProperty(a.toLowerCase()) ? g(function (a, c) {
                        for (var g, v = y(a, h), i = v.length; i--;)g = mt(a, v[i]), a[g] = !(c[g] = v[i])
                    }) : function (a) {
                        return y(a, 0, v)
                    }) : y
                }
            },
            pseudos: {
                not: g(function (a) {
                    var c = [], h = [], v = R(a.replace(Ct, "$1"));
                    return v[Z] ? g(function (a, c, h, g) {
                        for (var y, b = v(a, null, g, []), i = a.length; i--;)(y = b[i]) && (a[i] = !(c[i] = y))
                    }) : function (a, g, y) {
                        return c[0] = a, v(c, null, y, h), c[0] = null, !h.pop()
                    }
                }), has: g(function (a) {
                    return function (h) {
                        return c(a, h).length > 0
                    }
                }), contains: g(function (a) {
                    return a = a.replace(Ft, Ot), function (c) {
                        return (c.textContent || c.innerText || O(c)).indexOf(a) > -1
                    }
                }), lang: g(function (a) {
                    return At.test(a || "") || c.error("unsupported lang: " + a), a = a.replace(Ft, Ot).toLowerCase(), function (c) {
                        var h;
                        do if (h = J ? c.lang : c.getAttribute("xml:lang") || c.getAttribute("lang"))return h = h.toLowerCase(), h === a || 0 === h.indexOf(a + "-"); while ((c = c.parentNode) && 1 === c.nodeType);
                        return !1
                    }
                }), target: function (c) {
                    var h = a.location && a.location.hash;
                    return h && h.slice(1) === c.id
                }, root: function (a) {
                    return a === V
                }, focus: function (a) {
                    return a === U.activeElement && (!U.hasFocus || U.hasFocus()) && !!(a.type || a.href || ~a.tabIndex)
                }, enabled: function (a) {
                    return a.disabled === !1
                }, disabled: function (a) {
                    return a.disabled === !0
                }, checked: function (a) {
                    var c = a.nodeName.toLowerCase();
                    return "input" === c && !!a.checked || "option" === c && !!a.selected
                }, selected: function (a) {
                    return a.parentNode && a.parentNode.selectedIndex, a.selected === !0
                }, empty: function (a) {
                    for (a = a.firstChild; a; a = a.nextSibling)if (a.nodeType < 6)return !1;
                    return !0
                }, parent: function (a) {
                    return !F.pseudos.empty(a)
                }, header: function (a) {
                    return Lt.test(a.nodeName)
                }, input: function (a) {
                    return jt.test(a.nodeName)
                }, button: function (a) {
                    var c = a.nodeName.toLowerCase();
                    return "input" === c && "button" === a.type || "button" === c
                }, text: function (a) {
                    var c;
                    return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (c = a.getAttribute("type")) || "text" === c.toLowerCase())
                }, first: C(function () {
                    return [0]
                }), last: C(function (a, c) {
                    return [c - 1]
                }), eq: C(function (a, c, h) {
                    return [0 > h ? h + c : h]
                }), even: C(function (a, c) {
                    for (var i = 0; c > i; i += 2)a.push(i);
                    return a
                }), odd: C(function (a, c) {
                    for (var i = 1; c > i; i += 2)a.push(i);
                    return a
                }), lt: C(function (a, c, h) {
                    for (var i = 0 > h ? h + c : h; --i >= 0;)a.push(i);
                    return a
                }), gt: C(function (a, c, h) {
                    for (var i = 0 > h ? h + c : h; ++i < c;)a.push(i);
                    return a
                })
            }
        }, F.pseudos.nth = F.pseudos.eq;
        for (i in{radio: !0, checkbox: !0, file: !0, password: !0, image: !0})F.pseudos[i] = w(i);
        for (i in{submit: !0, reset: !0})F.pseudos[i] = T(i);
        return E.prototype = F.filters = F.pseudos, F.setFilters = new E, P = c.tokenize = function (a, h) {
            var g, v, y, b, w, T, C, N = ot[a + " "];
            if (N)return h ? 0 : N.slice(0);
            for (w = a, T = [], C = F.preFilter; w;) {
                (!g || (v = Nt.exec(w))) && (v && (w = w.slice(v[0].length) || w), T.push(y = [])), g = !1, (v = Et.exec(w)) && (g = v.shift(), y.push({
                    value: g,
                    type: v[0].replace(Ct, " ")
                }), w = w.slice(g.length));
                for (b in F.filter)!(v = Dt[b].exec(w)) || C[b] && !(v = C[b](v)) || (g = v.shift(), y.push({
                    value: g,
                    type: b,
                    matches: v
                }), w = w.slice(g.length));
                if (!g)break
            }
            return h ? w.length : w ? c.error(a) : ot(a, T).slice(0)
        }, R = c.compile = function (a, c) {
            var i, h = [], g = [], v = at[a + " "];
            if (!v) {
                for (c || (c = P(a)), i = c.length; i--;)v = H(c[i]), v[Z] ? h.push(v) : g.push(v);
                v = at(a, _(g, h)), v.selector = a
            }
            return v
        }, W = c.select = function (a, c, h, g) {
            var i, v, y, b, w, T = "function" == typeof a && a, C = !g && P(a = T.selector || a);
            if (h = h || [], 1 === C.length) {
                if (v = C[0] = C[0].slice(0), v.length > 2 && "ID" === (y = v[0]).type && M.getById && 9 === c.nodeType && J && F.relative[v[1].type]) {
                    if (c = (F.find.ID(y.matches[0].replace(Ft, Ot), c) || [])[0], !c)return h;
                    T && (c = c.parentNode), a = a.slice(v.shift().value.length)
                }
                for (i = Dt.needsContext.test(a) ? 0 : v.length; i-- && (y = v[i], !F.relative[b = y.type]);)if ((w = F.find[b]) && (g = w(y.matches[0].replace(Ft, Ot), _t.test(v[0].type) && N(c.parentNode) || c))) {
                    if (v.splice(i, 1), a = g.length && k(v), !a)return pt.apply(h, g), h;
                    break
                }
            }
            return (T || R(a, C))(g, c, !J, h, _t.test(a) && N(c.parentNode) || c), h
        }, M.sortStable = Z.split("").sort(st).join("") === Z, M.detectDuplicates = !!I, X(), M.sortDetached = v(function (a) {
            return 1 & a.compareDocumentPosition(U.createElement("div"))
        }), v(function (a) {
            return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href")
        }) || y("type|href|height|width", function (a, c, h) {
            return h ? void 0 : a.getAttribute(c, "type" === c.toLowerCase() ? 1 : 2)
        }), M.attributes && v(function (a) {
            return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value")
        }) || y("value", function (a, c, h) {
            return h || "input" !== a.nodeName.toLowerCase() ? void 0 : a.defaultValue
        }), v(function (a) {
            return null == a.getAttribute("disabled")
        }) || y(gt, function (a, c, h) {
            var g;
            return h ? void 0 : a[c] === !0 ? c.toLowerCase() : (g = a.getAttributeNode(c)) && g.specified ? g.value : null
        }), c
    }(a);
    xt.find = Et, xt.expr = Et.selectors, xt.expr[":"] = xt.expr.pseudos, xt.unique = Et.uniqueSort, xt.text = Et.getText, xt.isXMLDoc = Et.isXML, xt.contains = Et.contains;
    var kt = xt.expr.match.needsContext, St = /^<(\w+)\s*\/?>(?:<\/\1>|)$/, At = /^.[^:#\[\.,]*$/;
    xt.filter = function (a, c, h) {
        var g = c[0];
        return h && (a = ":not(" + a + ")"), 1 === c.length && 1 === g.nodeType ? xt.find.matchesSelector(g, a) ? [g] : [] : xt.find.matches(a, xt.grep(c, function (a) {
            return 1 === a.nodeType
        }))
    }, xt.fn.extend({
        find: function (a) {
            var i, c = [], h = this, g = h.length;
            if ("string" != typeof a)return this.pushStack(xt(a).filter(function () {
                for (i = 0; g > i; i++)if (xt.contains(h[i], this))return !0
            }));
            for (i = 0; g > i; i++)xt.find(a, h[i], c);
            return c = this.pushStack(g > 1 ? xt.unique(c) : c), c.selector = this.selector ? this.selector + " " + a : a, c
        }, filter: function (a) {
            return this.pushStack(g(this, a || [], !1))
        }, not: function (a) {
            return this.pushStack(g(this, a || [], !0))
        }, is: function (a) {
            return !!g(this, "string" == typeof a && kt.test(a) ? xt(a) : a || [], !1).length
        }
    });
    var Dt, jt = a.document, Lt = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, Ht = xt.fn.init = function (a, c) {
        var h, g;
        if (!a)return this;
        if ("string" == typeof a) {
            if (h = "<" === a.charAt(0) && ">" === a.charAt(a.length - 1) && a.length >= 3 ? [null, a, null] : Lt.exec(a), !h || !h[1] && c)return !c || c.jquery ? (c || Dt).find(a) : this.constructor(c).find(a);
            if (h[1]) {
                if (c = c instanceof xt ? c[0] : c, xt.merge(this, xt.parseHTML(h[1], c && c.nodeType ? c.ownerDocument || c : jt, !0)), St.test(h[1]) && xt.isPlainObject(c))for (h in c)xt.isFunction(this[h]) ? this[h](c[h]) : this.attr(h, c[h]);
                return this
            }
            if (g = jt.getElementById(h[2]), g && g.parentNode) {
                if (g.id !== h[2])return Dt.find(a);
                this.length = 1, this[0] = g
            }
            return this.context = jt, this.selector = a, this
        }
        return a.nodeType ? (this.context = this[0] = a, this.length = 1, this) : xt.isFunction(a) ? "undefined" != typeof Dt.ready ? Dt.ready(a) : a(xt) : (void 0 !== a.selector && (this.selector = a.selector, this.context = a.context), xt.makeArray(a, this))
    };
    Ht.prototype = xt.fn, Dt = xt(jt);
    var qt = /^(?:parents|prev(?:Until|All))/, _t = {children: !0, contents: !0, next: !0, prev: !0};
    xt.extend({
        dir: function (a, c, h) {
            for (var g = [], v = a[c]; v && 9 !== v.nodeType && (void 0 === h || 1 !== v.nodeType || !xt(v).is(h));)1 === v.nodeType && g.push(v), v = v[c];
            return g
        }, sibling: function (n, a) {
            for (var r = []; n; n = n.nextSibling)1 === n.nodeType && n !== a && r.push(n);
            return r
        }
    }), xt.fn.extend({
        has: function (a) {
            var i, c = xt(a, this), h = c.length;
            return this.filter(function () {
                for (i = 0; h > i; i++)if (xt.contains(this, c[i]))return !0
            })
        }, closest: function (a, c) {
            for (var h, i = 0, l = this.length, g = [], v = kt.test(a) || "string" != typeof a ? xt(a, c || this.context) : 0; l > i; i++)for (h = this[i]; h && h !== c; h = h.parentNode)if (h.nodeType < 11 && (v ? v.index(h) > -1 : 1 === h.nodeType && xt.find.matchesSelector(h, a))) {
                g.push(h);
                break
            }
            return this.pushStack(g.length > 1 ? xt.unique(g) : g)
        }, index: function (a) {
            return a ? "string" == typeof a ? xt.inArray(this[0], xt(a)) : xt.inArray(a.jquery ? a[0] : a, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        }, add: function (a, c) {
            return this.pushStack(xt.unique(xt.merge(this.get(), xt(a, c))))
        }, addBack: function (a) {
            return this.add(null == a ? this.prevObject : this.prevObject.filter(a))
        }
    }), xt.each({
        parent: function (a) {
            var c = a.parentNode;
            return c && 11 !== c.nodeType ? c : null
        }, parents: function (a) {
            return xt.dir(a, "parentNode")
        }, parentsUntil: function (a, i, c) {
            return xt.dir(a, "parentNode", c)
        }, next: function (a) {
            return v(a, "nextSibling")
        }, prev: function (a) {
            return v(a, "previousSibling")
        }, nextAll: function (a) {
            return xt.dir(a, "nextSibling")
        }, prevAll: function (a) {
            return xt.dir(a, "previousSibling")
        }, nextUntil: function (a, i, c) {
            return xt.dir(a, "nextSibling", c)
        }, prevUntil: function (a, i, c) {
            return xt.dir(a, "previousSibling", c)
        }, siblings: function (a) {
            return xt.sibling((a.parentNode || {}).firstChild, a)
        }, children: function (a) {
            return xt.sibling(a.firstChild)
        }, contents: function (a) {
            return xt.nodeName(a, "iframe") ? a.contentDocument || a.contentWindow.document : xt.merge([], a.childNodes)
        }
    }, function (a, c) {
        xt.fn[a] = function (h, g) {
            var v = xt.map(this, c, h);
            return "Until" !== a.slice(-5) && (g = h), g && "string" == typeof g && (v = xt.filter(g, v)), this.length > 1 && (_t[a] || (v = xt.unique(v)), qt.test(a) && (v = v.reverse())), this.pushStack(v)
        }
    });
    var Mt = /\S+/g, Ft = {};
    xt.Callbacks = function (a) {
        a = "string" == typeof a ? Ft[a] || y(a) : xt.extend({}, a);
        var c, h, g, v, b, w, T = [], C = !a.once && [], N = function (y) {
            for (h = a.memory && y, g = !0, b = w || 0, w = 0, v = T.length, c = !0; T && v > b; b++)if (T[b].apply(y[0], y[1]) === !1 && a.stopOnFalse) {
                h = !1;
                break
            }
            c = !1, T && (C ? C.length && N(C.shift()) : h ? T = [] : E.disable())
        }, E = {
            add: function () {
                if (T) {
                    var g = T.length;
                    !function y(c) {
                        xt.each(c, function (c, h) {
                            var g = xt.type(h);
                            "function" === g ? a.unique && E.has(h) || T.push(h) : h && h.length && "string" !== g && y(h)
                        })
                    }(arguments), c ? v = T.length : h && (w = g, N(h))
                }
                return this
            }, remove: function () {
                return T && xt.each(arguments, function (a, h) {
                    for (var g; (g = xt.inArray(h, T, g)) > -1;)T.splice(g, 1), c && (v >= g && v--, b >= g && b--)
                }), this
            }, has: function (a) {
                return a ? xt.inArray(a, T) > -1 : !(!T || !T.length)
            }, empty: function () {
                return T = [], v = 0, this
            }, disable: function () {
                return T = C = h = void 0, this
            }, disabled: function () {
                return !T
            }, lock: function () {
                return C = void 0, h || E.disable(), this
            }, locked: function () {
                return !C
            }, fireWith: function (a, h) {
                return !T || g && !C || (h = h || [], h = [a, h.slice ? h.slice() : h], c ? C.push(h) : N(h)), this
            }, fire: function () {
                return E.fireWith(this, arguments), this
            }, fired: function () {
                return !!g
            }
        };
        return E
    }, xt.extend({
        Deferred: function (a) {
            var c = [["resolve", "done", xt.Callbacks("once memory"), "resolved"], ["reject", "fail", xt.Callbacks("once memory"), "rejected"], ["notify", "progress", xt.Callbacks("memory")]], h = "pending", g = {
                state: function () {
                    return h
                }, always: function () {
                    return v.done(arguments).fail(arguments), this
                }, then: function () {
                    var a = arguments;
                    return xt.Deferred(function (h) {
                        xt.each(c, function (i, c) {
                            var y = xt.isFunction(a[i]) && a[i];
                            v[c[1]](function () {
                                var a = y && y.apply(this, arguments);
                                a && xt.isFunction(a.promise) ? a.promise().done(h.resolve).fail(h.reject).progress(h.notify) : h[c[0] + "With"](this === g ? h.promise() : this, y ? [a] : arguments)
                            })
                        }), a = null
                    }).promise()
                }, promise: function (a) {
                    return null != a ? xt.extend(a, g) : g
                }
            }, v = {};
            return g.pipe = g.then, xt.each(c, function (i, a) {
                var y = a[2], b = a[3];
                g[a[1]] = y.add, b && y.add(function () {
                    h = b
                }, c[1 ^ i][2].disable, c[2][2].lock), v[a[0]] = function () {
                    return v[a[0] + "With"](this === v ? g : this, arguments), this
                }, v[a[0] + "With"] = y.fireWith
            }), g.promise(v), a && a.call(v, v), v
        }, when: function (a) {
            var c, h, g, i = 0, v = dt.call(arguments), y = v.length, b = 1 !== y || a && xt.isFunction(a.promise) ? y : 0, w = 1 === b ? a : xt.Deferred(), T = function (i, a, h) {
                return function (g) {
                    a[i] = this, h[i] = arguments.length > 1 ? dt.call(arguments) : g, h === c ? w.notifyWith(a, h) : --b || w.resolveWith(a, h)
                }
            };
            if (y > 1)for (c = new Array(y), h = new Array(y), g = new Array(y); y > i; i++)v[i] && xt.isFunction(v[i].promise) ? v[i].promise().done(T(i, g, v)).fail(w.reject).progress(T(i, h, c)) : --b;
            return b || w.resolveWith(g, v), w.promise()
        }
    });
    var Ot;
    xt.fn.ready = function (a) {
        return xt.ready.promise().done(a), this
    }, xt.extend({
        isReady: !1, readyWait: 1, holdReady: function (a) {
            a ? xt.readyWait++ : xt.ready(!0)
        }, ready: function (a) {
            if (a === !0 ? !--xt.readyWait : !xt.isReady) {
                if (!jt.body)return setTimeout(xt.ready);
                xt.isReady = !0, a !== !0 && --xt.readyWait > 0 || (Ot.resolveWith(jt, [xt]), xt.fn.triggerHandler && (xt(jt).triggerHandler("ready"), xt(jt).off("ready")))
            }
        }
    }), xt.ready.promise = function (c) {
        if (!Ot)if (Ot = xt.Deferred(), "complete" === jt.readyState)setTimeout(xt.ready); else if (jt.addEventListener)jt.addEventListener("DOMContentLoaded", w, !1), a.addEventListener("load", w, !1); else {
            jt.attachEvent("onreadystatechange", w), a.attachEvent("onload", w);
            var h = !1;
            try {
                h = null == a.frameElement && jt.documentElement
            } catch (e) {
            }
            h && h.doScroll && !function g() {
                if (!xt.isReady) {
                    try {
                        h.doScroll("left")
                    } catch (e) {
                        return setTimeout(g, 50)
                    }
                    b(), xt.ready()
                }
            }()
        }
        return Ot.promise(c)
    };
    var i, Bt = "undefined";
    for (i in xt(yt))break;
    yt.ownLast = "0" !== i, yt.inlineBlockNeedsLayout = !1, xt(function () {
        var a, c, h, g;
        h = jt.getElementsByTagName("body")[0], h && h.style && (c = jt.createElement("div"), g = jt.createElement("div"), g.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", h.appendChild(g).appendChild(c), typeof c.style.zoom !== Bt && (c.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1", yt.inlineBlockNeedsLayout = a = 3 === c.offsetWidth, a && (h.style.zoom = 1)), h.removeChild(g))
    }), function () {
        var a = jt.createElement("div");
        if (null == yt.deleteExpando) {
            yt.deleteExpando = !0;
            try {
                delete a.test
            } catch (e) {
                yt.deleteExpando = !1
            }
        }
        a = null
    }(), xt.acceptData = function (a) {
        var c = xt.noData[(a.nodeName + " ").toLowerCase()], h = +a.nodeType || 1;
        return 1 !== h && 9 !== h ? !1 : !c || c !== !0 && a.getAttribute("classid") === c
    };
    var Pt = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, Rt = /([A-Z])/g;
    xt.extend({
        cache: {},
        noData: {"applet ": !0, "embed ": !0, "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},
        hasData: function (a) {
            return a = a.nodeType ? xt.cache[a[xt.expando]] : a[xt.expando], !!a && !C(a)
        },
        data: function (a, c, h) {
            return N(a, c, h)
        },
        removeData: function (a, c) {
            return E(a, c)
        },
        _data: function (a, c, h) {
            return N(a, c, h, !0)
        },
        _removeData: function (a, c) {
            return E(a, c, !0)
        }
    }), xt.fn.extend({
        data: function (a, c) {
            var i, h, g, v = this[0], y = v && v.attributes;
            if (void 0 === a) {
                if (this.length && (g = xt.data(v), 1 === v.nodeType && !xt._data(v, "parsedAttrs"))) {
                    for (i = y.length; i--;)y[i] && (h = y[i].name, 0 === h.indexOf("data-") && (h = xt.camelCase(h.slice(5)), T(v, h, g[h])));
                    xt._data(v, "parsedAttrs", !0)
                }
                return g
            }
            return "object" == typeof a ? this.each(function () {
                xt.data(this, a)
            }) : arguments.length > 1 ? this.each(function () {
                xt.data(this, a, c)
            }) : v ? T(v, a, xt.data(v, a)) : void 0
        }, removeData: function (a) {
            return this.each(function () {
                xt.removeData(this, a)
            })
        }
    }), xt.extend({
        queue: function (a, c, h) {
            var g;
            return a ? (c = (c || "fx") + "queue", g = xt._data(a, c), h && (!g || xt.isArray(h) ? g = xt._data(a, c, xt.makeArray(h)) : g.push(h)), g || []) : void 0
        }, dequeue: function (a, c) {
            c = c || "fx";
            var h = xt.queue(a, c), g = h.length, v = h.shift(), y = xt._queueHooks(a, c), b = function () {
                xt.dequeue(a, c)
            };
            "inprogress" === v && (v = h.shift(), g--), v && ("fx" === c && h.unshift("inprogress"), delete y.stop, v.call(a, b, y)), !g && y && y.empty.fire()
        }, _queueHooks: function (a, c) {
            var h = c + "queueHooks";
            return xt._data(a, h) || xt._data(a, h, {
                    empty: xt.Callbacks("once memory").add(function () {
                        xt._removeData(a, c + "queue"), xt._removeData(a, h)
                    })
                })
        }
    }), xt.fn.extend({
        queue: function (a, c) {
            var h = 2;
            return "string" != typeof a && (c = a, a = "fx", h--), arguments.length < h ? xt.queue(this[0], a) : void 0 === c ? this : this.each(function () {
                var h = xt.queue(this, a, c);
                xt._queueHooks(this, a), "fx" === a && "inprogress" !== h[0] && xt.dequeue(this, a)
            })
        }, dequeue: function (a) {
            return this.each(function () {
                xt.dequeue(this, a)
            })
        }, clearQueue: function (a) {
            return this.queue(a || "fx", [])
        }, promise: function (a, c) {
            var h, g = 1, v = xt.Deferred(), y = this, i = this.length, b = function () {
                --g || v.resolveWith(y, [y])
            };
            for ("string" != typeof a && (c = a, a = void 0), a = a || "fx"; i--;)h = xt._data(y[i], a + "queueHooks"), h && h.empty && (g++, h.empty.add(b));
            return b(), v.promise(c)
        }
    });
    var Wt = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, $t = ["Top", "Right", "Bottom", "Left"], zt = function (a, c) {
        return a = c || a, "none" === xt.css(a, "display") || !xt.contains(a.ownerDocument, a)
    }, It = xt.access = function (a, c, h, g, v, y, b) {
        var i = 0, w = a.length, T = null == h;
        if ("object" === xt.type(h)) {
            v = !0;
            for (i in h)xt.access(a, c, i, h[i], !0, y, b)
        } else if (void 0 !== g && (v = !0, xt.isFunction(g) || (b = !0), T && (b ? (c.call(a, g), c = null) : (T = c, c = function (a, c, h) {
                return T.call(xt(a), h)
            })), c))for (; w > i; i++)c(a[i], h, b ? g : g.call(a[i], i, c(a[i], h)));
        return v ? a : T ? c.call(a) : w ? c(a[0], h) : y
    }, Xt = /^(?:checkbox|radio)$/i;
    !function () {
        var a = jt.createElement("input"), c = jt.createElement("div"), h = jt.createDocumentFragment();
        if (c.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", yt.leadingWhitespace = 3 === c.firstChild.nodeType, yt.tbody = !c.getElementsByTagName("tbody").length, yt.htmlSerialize = !!c.getElementsByTagName("link").length, yt.html5Clone = "<:nav></:nav>" !== jt.createElement("nav").cloneNode(!0).outerHTML, a.type = "checkbox", a.checked = !0, h.appendChild(a), yt.appendChecked = a.checked, c.innerHTML = "<textarea>x</textarea>", yt.noCloneChecked = !!c.cloneNode(!0).lastChild.defaultValue, h.appendChild(c), c.innerHTML = "<input type='radio' checked='checked' name='t'/>", yt.checkClone = c.cloneNode(!0).cloneNode(!0).lastChild.checked, yt.noCloneEvent = !0, c.attachEvent && (c.attachEvent("onclick", function () {
                yt.noCloneEvent = !1
            }), c.cloneNode(!0).click()), null == yt.deleteExpando) {
            yt.deleteExpando = !0;
            try {
                delete c.test
            } catch (e) {
                yt.deleteExpando = !1
            }
        }
    }(), function () {
        var i, c, h = jt.createElement("div");
        for (i in{
            submit: !0,
            change: !0,
            focusin: !0
        })c = "on" + i, (yt[i + "Bubbles"] = c in a) || (h.setAttribute(c, "t"), yt[i + "Bubbles"] = h.attributes[c].expando === !1);
        h = null
    }();
    var Ut = /^(?:input|select|textarea)$/i, Vt = /^key/, Jt = /^(?:mouse|pointer|contextmenu)|click/, Yt = /^(?:focusinfocus|focusoutblur)$/, Gt = /^([^.]*)(?:\.(.+)|)$/;
    xt.event = {
        global: {},
        add: function (a, c, h, g, v) {
            var y, b, t, w, T, C, N, E, k, S, A, D = xt._data(a);
            if (D) {
                for (h.handler && (w = h, h = w.handler, v = w.selector), h.guid || (h.guid = xt.guid++), (b = D.events) || (b = D.events = {}), (C = D.handle) || (C = D.handle = function (e) {
                    return typeof xt === Bt || e && xt.event.triggered === e.type ? void 0 : xt.event.dispatch.apply(C.elem, arguments)
                }, C.elem = a), c = (c || "").match(Mt) || [""], t = c.length; t--;)y = Gt.exec(c[t]) || [], k = A = y[1], S = (y[2] || "").split(".").sort(), k && (T = xt.event.special[k] || {}, k = (v ? T.delegateType : T.bindType) || k, T = xt.event.special[k] || {}, N = xt.extend({
                    type: k,
                    origType: A,
                    data: g,
                    handler: h,
                    guid: h.guid,
                    selector: v,
                    needsContext: v && xt.expr.match.needsContext.test(v),
                    namespace: S.join(".")
                }, w), (E = b[k]) || (E = b[k] = [], E.delegateCount = 0, T.setup && T.setup.call(a, g, S, C) !== !1 || (a.addEventListener ? a.addEventListener(k, C, !1) : a.attachEvent && a.attachEvent("on" + k, C))), T.add && (T.add.call(a, N), N.handler.guid || (N.handler.guid = h.guid)), v ? E.splice(E.delegateCount++, 0, N) : E.push(N), xt.event.global[k] = !0);
                a = null
            }
        },
        remove: function (a, c, h, g, v) {
            var y, b, w, T, t, C, N, E, k, S, A, D = xt.hasData(a) && xt._data(a);
            if (D && (C = D.events)) {
                for (c = (c || "").match(Mt) || [""], t = c.length; t--;)if (w = Gt.exec(c[t]) || [], k = A = w[1], S = (w[2] || "").split(".").sort(), k) {
                    for (N = xt.event.special[k] || {}, k = (g ? N.delegateType : N.bindType) || k, E = C[k] || [], w = w[2] && new RegExp("(^|\\.)" + S.join("\\.(?:.*\\.|)") + "(\\.|$)"), T = y = E.length; y--;)b = E[y], !v && A !== b.origType || h && h.guid !== b.guid || w && !w.test(b.namespace) || g && g !== b.selector && ("**" !== g || !b.selector) || (E.splice(y, 1), b.selector && E.delegateCount--, N.remove && N.remove.call(a, b));
                    T && !E.length && (N.teardown && N.teardown.call(a, S, D.handle) !== !1 || xt.removeEvent(a, k, D.handle), delete C[k])
                } else for (k in C)xt.event.remove(a, k + c[t], h, g, !0);
                xt.isEmptyObject(C) && (delete D.handle, xt._removeData(a, "events"))
            }
        },
        trigger: function (c, h, g, v) {
            var y, b, w, T, C, N, i, E = [g || jt], k = vt.call(c, "type") ? c.type : c, S = vt.call(c, "namespace") ? c.namespace.split(".") : [];
            if (w = N = g = g || jt, 3 !== g.nodeType && 8 !== g.nodeType && !Yt.test(k + xt.event.triggered) && (k.indexOf(".") >= 0 && (S = k.split("."), k = S.shift(), S.sort()), b = k.indexOf(":") < 0 && "on" + k, c = c[xt.expando] ? c : new xt.Event(k, "object" == typeof c && c), c.isTrigger = v ? 2 : 3, c.namespace = S.join("."), c.namespace_re = c.namespace ? new RegExp("(^|\\.)" + S.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, c.result = void 0, c.target || (c.target = g), h = null == h ? [c] : xt.makeArray(h, [c]), C = xt.event.special[k] || {}, v || !C.trigger || C.trigger.apply(g, h) !== !1)) {
                if (!v && !C.noBubble && !xt.isWindow(g)) {
                    for (T = C.delegateType || k, Yt.test(T + k) || (w = w.parentNode); w; w = w.parentNode)E.push(w), N = w;
                    N === (g.ownerDocument || jt) && E.push(N.defaultView || N.parentWindow || a)
                }
                for (i = 0; (w = E[i++]) && !c.isPropagationStopped();)c.type = i > 1 ? T : C.bindType || k, y = (xt._data(w, "events") || {})[c.type] && xt._data(w, "handle"), y && y.apply(w, h), y = b && w[b], y && y.apply && xt.acceptData(w) && (c.result = y.apply(w, h), c.result === !1 && c.preventDefault());
                if (c.type = k, !v && !c.isDefaultPrevented() && (!C._default || C._default.apply(E.pop(), h) === !1) && xt.acceptData(g) && b && g[k] && !xt.isWindow(g)) {
                    N = g[b], N && (g[b] = null), xt.event.triggered = k;
                    try {
                        g[k]()
                    } catch (e) {
                    }
                    xt.event.triggered = void 0, N && (g[b] = N)
                }
                return c.result
            }
        },
        dispatch: function (a) {
            a = xt.event.fix(a);
            var i, c, h, g, v, y = [], b = dt.call(arguments), w = (xt._data(this, "events") || {})[a.type] || [], T = xt.event.special[a.type] || {};
            if (b[0] = a, a.delegateTarget = this, !T.preDispatch || T.preDispatch.call(this, a) !== !1) {
                for (y = xt.event.handlers.call(this, a, w), i = 0; (g = y[i++]) && !a.isPropagationStopped();)for (a.currentTarget = g.elem, v = 0; (h = g.handlers[v++]) && !a.isImmediatePropagationStopped();)(!a.namespace_re || a.namespace_re.test(h.namespace)) && (a.handleObj = h, a.data = h.data, c = ((xt.event.special[h.origType] || {}).handle || h.handler).apply(g.elem, b), void 0 !== c && (a.result = c) === !1 && (a.preventDefault(), a.stopPropagation()));
                return T.postDispatch && T.postDispatch.call(this, a), a.result
            }
        },
        handlers: function (a, c) {
            var h, g, v, i, y = [], b = c.delegateCount, w = a.target;
            if (b && w.nodeType && (!a.button || "click" !== a.type))for (; w != this; w = w.parentNode || this)if (1 === w.nodeType && (w.disabled !== !0 || "click" !== a.type)) {
                for (v = [], i = 0; b > i; i++)g = c[i], h = g.selector + " ", void 0 === v[h] && (v[h] = g.needsContext ? xt(h, this).index(w) >= 0 : xt.find(h, this, null, [w]).length), v[h] && v.push(g);
                v.length && y.push({elem: w, handlers: v})
            }
            return b < c.length && y.push({elem: this, handlers: c.slice(b)}), y
        },
        fix: function (a) {
            if (a[xt.expando])return a;
            var i, c, h, g = a.type, v = a, y = this.fixHooks[g];
            for (y || (this.fixHooks[g] = y = Jt.test(g) ? this.mouseHooks : Vt.test(g) ? this.keyHooks : {}), h = y.props ? this.props.concat(y.props) : this.props, a = new xt.Event(v), i = h.length; i--;)c = h[i], a[c] = v[c];
            return a.target || (a.target = v.srcElement || jt), 3 === a.target.nodeType && (a.target = a.target.parentNode), a.metaKey = !!a.metaKey, y.filter ? y.filter(a, v) : a
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "), filter: function (a, c) {
                return null == a.which && (a.which = null != c.charCode ? c.charCode : c.keyCode), a
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function (a, c) {
                var h, g, v, y = c.button, b = c.fromElement;
                return null == a.pageX && null != c.clientX && (g = a.target.ownerDocument || jt, v = g.documentElement, h = g.body, a.pageX = c.clientX + (v && v.scrollLeft || h && h.scrollLeft || 0) - (v && v.clientLeft || h && h.clientLeft || 0), a.pageY = c.clientY + (v && v.scrollTop || h && h.scrollTop || 0) - (v && v.clientTop || h && h.clientTop || 0)), !a.relatedTarget && b && (a.relatedTarget = b === a.target ? c.toElement : b), a.which || void 0 === y || (a.which = 1 & y ? 1 : 2 & y ? 3 : 4 & y ? 2 : 0), a
            }
        },
        special: {
            load: {noBubble: !0}, focus: {
                trigger: function () {
                    if (this !== A() && this.focus)try {
                        return this.focus(), !1
                    } catch (e) {
                    }
                }, delegateType: "focusin"
            }, blur: {
                trigger: function () {
                    return this === A() && this.blur ? (this.blur(), !1) : void 0
                }, delegateType: "focusout"
            }, click: {
                trigger: function () {
                    return xt.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                }, _default: function (a) {
                    return xt.nodeName(a.target, "a")
                }
            }, beforeunload: {
                postDispatch: function (a) {
                    void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result)
                }
            }
        },
        simulate: function (a, c, h, g) {
            var e = xt.extend(new xt.Event, h, {type: a, isSimulated: !0, originalEvent: {}});
            g ? xt.event.trigger(e, null, c) : xt.event.dispatch.call(c, e), e.isDefaultPrevented() && h.preventDefault()
        }
    }, xt.removeEvent = jt.removeEventListener ? function (a, c, h) {
        a.removeEventListener && a.removeEventListener(c, h, !1)
    } : function (a, c, h) {
        var g = "on" + c;
        a.detachEvent && (typeof a[g] === Bt && (a[g] = null), a.detachEvent(g, h))
    }, xt.Event = function (a, c) {
        return this instanceof xt.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? k : S) : this.type = a, c && xt.extend(this, c), this.timeStamp = a && a.timeStamp || xt.now(), void(this[xt.expando] = !0)) : new xt.Event(a, c)
    }, xt.Event.prototype = {
        isDefaultPrevented: S,
        isPropagationStopped: S,
        isImmediatePropagationStopped: S,
        preventDefault: function () {
            var e = this.originalEvent;
            this.isDefaultPrevented = k, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
        },
        stopPropagation: function () {
            var e = this.originalEvent;
            this.isPropagationStopped = k, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
        },
        stopImmediatePropagation: function () {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = k, e && e.stopImmediatePropagation && e.stopImmediatePropagation(), this.stopPropagation()
        }
    }, xt.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function (a, c) {
        xt.event.special[a] = {
            delegateType: c, bindType: c, handle: function (a) {
                var h, g = this, v = a.relatedTarget, y = a.handleObj;
                return (!v || v !== g && !xt.contains(g, v)) && (a.type = y.origType, h = y.handler.apply(this, arguments), a.type = c), h
            }
        }
    }), yt.submitBubbles || (xt.event.special.submit = {
        setup: function () {
            return xt.nodeName(this, "form") ? !1 : void xt.event.add(this, "click._submit keypress._submit", function (e) {
                var a = e.target, c = xt.nodeName(a, "input") || xt.nodeName(a, "button") ? a.form : void 0;
                c && !xt._data(c, "submitBubbles") && (xt.event.add(c, "submit._submit", function (a) {
                    a._submit_bubble = !0
                }), xt._data(c, "submitBubbles", !0))
            })
        }, postDispatch: function (a) {
            a._submit_bubble && (delete a._submit_bubble, this.parentNode && !a.isTrigger && xt.event.simulate("submit", this.parentNode, a, !0))
        }, teardown: function () {
            return xt.nodeName(this, "form") ? !1 : void xt.event.remove(this, "._submit")
        }
    }), yt.changeBubbles || (xt.event.special.change = {
        setup: function () {
            return Ut.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (xt.event.add(this, "propertychange._change", function (a) {
                "checked" === a.originalEvent.propertyName && (this._just_changed = !0)
            }), xt.event.add(this, "click._change", function (a) {
                this._just_changed && !a.isTrigger && (this._just_changed = !1), xt.event.simulate("change", this, a, !0)
            })), !1) : void xt.event.add(this, "beforeactivate._change", function (e) {
                var a = e.target;
                Ut.test(a.nodeName) && !xt._data(a, "changeBubbles") && (xt.event.add(a, "change._change", function (a) {
                    !this.parentNode || a.isSimulated || a.isTrigger || xt.event.simulate("change", this.parentNode, a, !0)
                }), xt._data(a, "changeBubbles", !0))
            })
        }, handle: function (a) {
            var c = a.target;
            return this !== c || a.isSimulated || a.isTrigger || "radio" !== c.type && "checkbox" !== c.type ? a.handleObj.handler.apply(this, arguments) : void 0
        }, teardown: function () {
            return xt.event.remove(this, "._change"), !Ut.test(this.nodeName)
        }
    }), yt.focusinBubbles || xt.each({focus: "focusin", blur: "focusout"}, function (a, c) {
        var h = function (a) {
            xt.event.simulate(c, a.target, xt.event.fix(a), !0)
        };
        xt.event.special[c] = {
            setup: function () {
                var g = this.ownerDocument || this, v = xt._data(g, c);
                v || g.addEventListener(a, h, !0), xt._data(g, c, (v || 0) + 1)
            }, teardown: function () {
                var g = this.ownerDocument || this, v = xt._data(g, c) - 1;
                v ? xt._data(g, c, v) : (g.removeEventListener(a, h, !0), xt._removeData(g, c))
            }
        }
    }), xt.fn.extend({
        on: function (a, c, h, g, v) {
            var y, b;
            if ("object" == typeof a) {
                "string" != typeof c && (h = h || c, c = void 0);
                for (y in a)this.on(y, c, h, a[y], v);
                return this
            }
            if (null == h && null == g ? (g = c, h = c = void 0) : null == g && ("string" == typeof c ? (g = h, h = void 0) : (g = h, h = c, c = void 0)), g === !1)g = S; else if (!g)return this;
            return 1 === v && (b = g, g = function (a) {
                return xt().off(a), b.apply(this, arguments)
            }, g.guid = b.guid || (b.guid = xt.guid++)), this.each(function () {
                xt.event.add(this, a, g, h, c)
            })
        }, one: function (a, c, h, g) {
            return this.on(a, c, h, g, 1)
        }, off: function (a, c, h) {
            var g, v;
            if (a && a.preventDefault && a.handleObj)return g = a.handleObj, xt(a.delegateTarget).off(g.namespace ? g.origType + "." + g.namespace : g.origType, g.selector, g.handler), this;
            if ("object" == typeof a) {
                for (v in a)this.off(v, c, a[v]);
                return this
            }
            return (c === !1 || "function" == typeof c) && (h = c, c = void 0), h === !1 && (h = S), this.each(function () {
                xt.event.remove(this, a, h, c)
            })
        }, trigger: function (a, c) {
            return this.each(function () {
                xt.event.trigger(a, c, this)
            })
        }, triggerHandler: function (a, c) {
            var h = this[0];
            return h ? xt.event.trigger(a, c, h, !0) : void 0
        }
    });
    var Qt = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video", Kt = / jQuery\d+="(?:null|\d+)"/g, Zt = new RegExp("<(?:" + Qt + ")[\\s/>]", "i"), en = /^\s+/, tn = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, nn = /<([\w:]+)/, rn = /<tbody/i, on = /<|&#?\w+;/, an = /<(?:script|style|link)/i, sn = /checked\s*(?:[^=]|=\s*.checked.)/i, un = /^$|\/(?:java|ecma)script/i, ln = /^true\/(.*)/, cn = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g, dn = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: yt.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
    }, fn = D(jt), pn = fn.appendChild(jt.createElement("div"));
    dn.optgroup = dn.option, dn.tbody = dn.tfoot = dn.colgroup = dn.caption = dn.thead, dn.th = dn.td, xt.extend({
        clone: function (a, c, h) {
            var g, v, y, i, b, w = xt.contains(a.ownerDocument, a);
            if (yt.html5Clone || xt.isXMLDoc(a) || !Zt.test("<" + a.nodeName + ">") ? y = a.cloneNode(!0) : (pn.innerHTML = a.outerHTML, pn.removeChild(y = pn.firstChild)), !(yt.noCloneEvent && yt.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || xt.isXMLDoc(a)))for (g = j(y), b = j(a), i = 0; null != (v = b[i]); ++i)g[i] && B(v, g[i]);
            if (c)if (h)for (b = b || j(a), g = g || j(y), i = 0; null != (v = b[i]); i++)O(v, g[i]); else O(a, y);
            return g = j(y, "script"), g.length > 0 && F(g, !w && j(a, "script")), g = b = v = null, y
        }, buildFragment: function (a, c, h, g) {
            for (var v, y, b, w, T, C, N, l = a.length, E = D(c), k = [], i = 0; l > i; i++)if (y = a[i], y || 0 === y)if ("object" === xt.type(y))xt.merge(k, y.nodeType ? [y] : y); else if (on.test(y)) {
                for (w = w || E.appendChild(c.createElement("div")), T = (nn.exec(y) || ["", ""])[1].toLowerCase(), N = dn[T] || dn._default, w.innerHTML = N[1] + y.replace(tn, "<$1></$2>") + N[2], v = N[0]; v--;)w = w.lastChild;
                if (!yt.leadingWhitespace && en.test(y) && k.push(c.createTextNode(en.exec(y)[0])), !yt.tbody)for (y = "table" !== T || rn.test(y) ? "<table>" !== N[1] || rn.test(y) ? 0 : w : w.firstChild, v = y && y.childNodes.length; v--;)xt.nodeName(C = y.childNodes[v], "tbody") && !C.childNodes.length && y.removeChild(C);
                for (xt.merge(k, w.childNodes), w.textContent = ""; w.firstChild;)w.removeChild(w.firstChild);
                w = E.lastChild
            } else k.push(c.createTextNode(y));
            for (w && E.removeChild(w), yt.appendChecked || xt.grep(j(k, "input"), L), i = 0; y = k[i++];)if ((!g || -1 === xt.inArray(y, g)) && (b = xt.contains(y.ownerDocument, y), w = j(E.appendChild(y), "script"), b && F(w), h))for (v = 0; y = w[v++];)un.test(y.type || "") && h.push(y);
            return w = null, E
        }, cleanData: function (a, c) {
            for (var h, g, v, y, i = 0, b = xt.expando, w = xt.cache, T = yt.deleteExpando, C = xt.event.special; null != (h = a[i]); i++)if ((c || xt.acceptData(h)) && (v = h[b], y = v && w[v])) {
                if (y.events)for (g in y.events)C[g] ? xt.event.remove(h, g) : xt.removeEvent(h, g, y.handle);
                w[v] && (delete w[v], T ? delete h[b] : typeof h.removeAttribute !== Bt ? h.removeAttribute(b) : h[b] = null, ct.push(v))
            }
        }
    }), xt.fn.extend({
        text: function (a) {
            return It(this, function (a) {
                return void 0 === a ? xt.text(this) : this.empty().append((this[0] && this[0].ownerDocument || jt).createTextNode(a))
            }, null, a, arguments.length)
        }, append: function () {
            return this.domManip(arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var c = H(this, a);
                    c.appendChild(a)
                }
            })
        }, prepend: function () {
            return this.domManip(arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var c = H(this, a);
                    c.insertBefore(a, c.firstChild)
                }
            })
        }, before: function () {
            return this.domManip(arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this)
            })
        }, after: function () {
            return this.domManip(arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this.nextSibling)
            })
        }, remove: function (a, c) {
            for (var h, g = a ? xt.filter(a, this) : this, i = 0; null != (h = g[i]); i++)c || 1 !== h.nodeType || xt.cleanData(j(h)), h.parentNode && (c && xt.contains(h.ownerDocument, h) && F(j(h, "script")), h.parentNode.removeChild(h));
            return this
        }, empty: function () {
            for (var a, i = 0; null != (a = this[i]); i++) {
                for (1 === a.nodeType && xt.cleanData(j(a, !1)); a.firstChild;)a.removeChild(a.firstChild);
                a.options && xt.nodeName(a, "select") && (a.options.length = 0)
            }
            return this
        }, clone: function (a, c) {
            return a = null == a ? !1 : a, c = null == c ? a : c, this.map(function () {
                return xt.clone(this, a, c)
            })
        }, html: function (a) {
            return It(this, function (a) {
                var c = this[0] || {}, i = 0, l = this.length;
                if (void 0 === a)return 1 === c.nodeType ? c.innerHTML.replace(Kt, "") : void 0;
                if (!("string" != typeof a || an.test(a) || !yt.htmlSerialize && Zt.test(a) || !yt.leadingWhitespace && en.test(a) || dn[(nn.exec(a) || ["", ""])[1].toLowerCase()])) {
                    a = a.replace(tn, "<$1></$2>");
                    try {
                        for (; l > i; i++)c = this[i] || {}, 1 === c.nodeType && (xt.cleanData(j(c, !1)), c.innerHTML = a);
                        c = 0
                    } catch (e) {
                    }
                }
                c && this.empty().append(a)
            }, null, a, arguments.length)
        }, replaceWith: function () {
            var a = arguments[0];
            return this.domManip(arguments, function (c) {
                a = this.parentNode, xt.cleanData(j(this)), a && a.replaceChild(c, this)
            }), a && (a.length || a.nodeType) ? this : this.remove()
        }, detach: function (a) {
            return this.remove(a, !0)
        }, domManip: function (a, c) {
            a = ft.apply([], a);
            var h, g, v, y, b, w, i = 0, l = this.length, T = this, C = l - 1, N = a[0], E = xt.isFunction(N);
            if (E || l > 1 && "string" == typeof N && !yt.checkClone && sn.test(N))return this.each(function (h) {
                var g = T.eq(h);
                E && (a[0] = N.call(this, h, g.html())), g.domManip(a, c)
            });
            if (l && (w = xt.buildFragment(a, this[0].ownerDocument, !1, this), h = w.firstChild, 1 === w.childNodes.length && (w = h), h)) {
                for (y = xt.map(j(w, "script"), _), v = y.length; l > i; i++)g = w, i !== C && (g = xt.clone(g, !0, !0), v && xt.merge(y, j(g, "script"))), c.call(this[i], g, i);
                if (v)for (b = y[y.length - 1].ownerDocument, xt.map(y, M), i = 0; v > i; i++)g = y[i], un.test(g.type || "") && !xt._data(g, "globalEval") && xt.contains(b, g) && (g.src ? xt._evalUrl && xt._evalUrl(g.src) : xt.globalEval((g.text || g.textContent || g.innerHTML || "").replace(cn, "")));
                w = h = null
            }
            return this
        }
    }), xt.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (a, c) {
        xt.fn[a] = function (a) {
            for (var h, i = 0, g = [], v = xt(a), y = v.length - 1; y >= i; i++)h = i === y ? this : this.clone(!0), xt(v[i])[c](h), pt.apply(g, h.get());
            return this.pushStack(g)
        }
    });
    var hn, mn = {};
    !function () {
        var a;
        yt.shrinkWrapBlocks = function () {
            if (null != a)return a;
            a = !1;
            var c, h, g;
            return h = jt.getElementsByTagName("body")[0], h && h.style ? (c = jt.createElement("div"), g = jt.createElement("div"), g.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", h.appendChild(g).appendChild(c), typeof c.style.zoom !== Bt && (c.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1", c.appendChild(jt.createElement("div")).style.width = "5px", a = 3 !== c.offsetWidth), h.removeChild(g), a) : void 0
        }
    }();
    var gn, vn, yn = /^margin/, bn = new RegExp("^(" + Wt + ")(?!px)[a-z%]+$", "i"), xn = /^(top|right|bottom|left)$/;
    a.getComputedStyle ? (gn = function (c) {
        return c.ownerDocument.defaultView.opener ? c.ownerDocument.defaultView.getComputedStyle(c, null) : a.getComputedStyle(c, null)
    }, vn = function (a, c, h) {
        var g, v, y, b, w = a.style;
        return h = h || gn(a), b = h ? h.getPropertyValue(c) || h[c] : void 0, h && ("" !== b || xt.contains(a.ownerDocument, a) || (b = xt.style(a, c)), bn.test(b) && yn.test(c) && (g = w.width, v = w.minWidth, y = w.maxWidth, w.minWidth = w.maxWidth = w.width = b, b = h.width, w.width = g, w.minWidth = v, w.maxWidth = y)), void 0 === b ? b : b + ""
    }) : jt.documentElement.currentStyle && (gn = function (a) {
        return a.currentStyle
    }, vn = function (a, c, h) {
        var g, v, y, b, w = a.style;
        return h = h || gn(a), b = h ? h[c] : void 0, null == b && w && w[c] && (b = w[c]), bn.test(b) && !xn.test(c) && (g = w.left, v = a.runtimeStyle, y = v && v.left, y && (v.left = a.currentStyle.left), w.left = "fontSize" === c ? "1em" : b, b = w.pixelLeft + "px", w.left = g, y && (v.left = y)), void 0 === b ? b : b + "" || "auto"
    }), function () {
        function c() {
            var c, h, g, v;
            h = jt.getElementsByTagName("body")[0], h && h.style && (c = jt.createElement("div"), g = jt.createElement("div"), g.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", h.appendChild(g).appendChild(c), c.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", y = b = !1, T = !0, a.getComputedStyle && (y = "1%" !== (a.getComputedStyle(c, null) || {}).top, b = "4px" === (a.getComputedStyle(c, null) || {width: "4px"}).width, v = c.appendChild(jt.createElement("div")), v.style.cssText = c.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", v.style.marginRight = v.style.width = "0", c.style.width = "1px", T = !parseFloat((a.getComputedStyle(v, null) || {}).marginRight), c.removeChild(v)), c.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", v = c.getElementsByTagName("td"), v[0].style.cssText = "margin:0;border:0;padding:0;display:none", w = 0 === v[0].offsetHeight, w && (v[0].style.display = "", v[1].style.display = "none", w = 0 === v[0].offsetHeight), h.removeChild(g))
        }

        var h, g, v, y, b, w, T;
        h = jt.createElement("div"), h.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", v = h.getElementsByTagName("a")[0], g = v && v.style, g && (g.cssText = "float:left;opacity:.5", yt.opacity = "0.5" === g.opacity, yt.cssFloat = !!g.cssFloat, h.style.backgroundClip = "content-box", h.cloneNode(!0).style.backgroundClip = "", yt.clearCloneStyle = "content-box" === h.style.backgroundClip, yt.boxSizing = "" === g.boxSizing || "" === g.MozBoxSizing || "" === g.WebkitBoxSizing, xt.extend(yt, {
            reliableHiddenOffsets: function () {
                return null == w && c(), w
            }, boxSizingReliable: function () {
                return null == b && c(), b
            }, pixelPosition: function () {
                return null == y && c(), y
            }, reliableMarginRight: function () {
                return null == T && c(), T
            }
        }))
    }(), xt.swap = function (a, c, h, g) {
        var v, y, b = {};
        for (y in c)b[y] = a.style[y], a.style[y] = c[y];
        v = h.apply(a, g || []);
        for (y in c)a.style[y] = b[y];
        return v
    };
    var wn = /alpha\([^)]*\)/i, Tn = /opacity\s*=\s*([^)]*)/, Cn = /^(none|table(?!-c[ea]).+)/, Nn = new RegExp("^(" + Wt + ")(.*)$", "i"), En = new RegExp("^([+-])=(" + Wt + ")", "i"), kn = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }, Sn = {letterSpacing: "0", fontWeight: "400"}, An = ["Webkit", "O", "Moz", "ms"];
    xt.extend({
        cssHooks: {
            opacity: {
                get: function (a, c) {
                    if (c) {
                        var h = vn(a, "opacity");
                        return "" === h ? "1" : h
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {"float": yt.cssFloat ? "cssFloat" : "styleFloat"},
        style: function (a, c, h, g) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var v, y, b, w = xt.camelCase(c), T = a.style;
                if (c = xt.cssProps[w] || (xt.cssProps[w] = $(T, w)), b = xt.cssHooks[c] || xt.cssHooks[w], void 0 === h)return b && "get"in b && void 0 !== (v = b.get(a, !1, g)) ? v : T[c];
                if (y = typeof h, "string" === y && (v = En.exec(h)) && (h = (v[1] + 1) * v[2] + parseFloat(xt.css(a, c)), y = "number"), null != h && h === h && ("number" !== y || xt.cssNumber[w] || (h += "px"), yt.clearCloneStyle || "" !== h || 0 !== c.indexOf("background") || (T[c] = "inherit"), !(b && "set"in b && void 0 === (h = b.set(a, h, g)))))try {
                    T[c] = h
                } catch (e) {
                }
            }
        },
        css: function (a, c, h, g) {
            var v, y, b, w = xt.camelCase(c);
            return c = xt.cssProps[w] || (xt.cssProps[w] = $(a.style, w)), b = xt.cssHooks[c] || xt.cssHooks[w], b && "get"in b && (y = b.get(a, !0, h)), void 0 === y && (y = vn(a, c, g)), "normal" === y && c in Sn && (y = Sn[c]), "" === h || h ? (v = parseFloat(y), h === !0 || xt.isNumeric(v) ? v || 0 : y) : y
        }
    }), xt.each(["height", "width"], function (i, a) {
        xt.cssHooks[a] = {
            get: function (c, h, g) {
                return h ? Cn.test(xt.css(c, "display")) && 0 === c.offsetWidth ? xt.swap(c, kn, function () {
                    return U(c, a, g)
                }) : U(c, a, g) : void 0
            }, set: function (c, h, g) {
                var v = g && gn(c);
                return I(c, h, g ? X(c, a, g, yt.boxSizing && "border-box" === xt.css(c, "boxSizing", !1, v), v) : 0)
            }
        }
    }), yt.opacity || (xt.cssHooks.opacity = {
        get: function (a, c) {
            return Tn.test((c && a.currentStyle ? a.currentStyle.filter : a.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : c ? "1" : ""
        }, set: function (a, c) {
            var h = a.style, g = a.currentStyle, v = xt.isNumeric(c) ? "alpha(opacity=" + 100 * c + ")" : "", y = g && g.filter || h.filter || "";
            h.zoom = 1, (c >= 1 || "" === c) && "" === xt.trim(y.replace(wn, "")) && h.removeAttribute && (h.removeAttribute("filter"), "" === c || g && !g.filter) || (h.filter = wn.test(y) ? y.replace(wn, v) : y + " " + v)
        }
    }), xt.cssHooks.marginRight = W(yt.reliableMarginRight, function (a, c) {
        return c ? xt.swap(a, {display: "inline-block"}, vn, [a, "marginRight"]) : void 0
    }), xt.each({margin: "", padding: "", border: "Width"}, function (a, c) {
        xt.cssHooks[a + c] = {
            expand: function (h) {
                for (var i = 0, g = {}, v = "string" == typeof h ? h.split(" ") : [h]; 4 > i; i++)g[a + $t[i] + c] = v[i] || v[i - 2] || v[0];
                return g
            }
        }, yn.test(a) || (xt.cssHooks[a + c].set = I)
    }), xt.fn.extend({
        css: function (a, c) {
            return It(this, function (a, c, h) {
                var g, v, y = {}, i = 0;
                if (xt.isArray(c)) {
                    for (g = gn(a), v = c.length; v > i; i++)y[c[i]] = xt.css(a, c[i], !1, g);
                    return y
                }
                return void 0 !== h ? xt.style(a, c, h) : xt.css(a, c)
            }, a, c, arguments.length > 1)
        }, show: function () {
            return z(this, !0)
        }, hide: function () {
            return z(this)
        }, toggle: function (a) {
            return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function () {
                zt(this) ? xt(this).show() : xt(this).hide()
            })
        }
    }), xt.Tween = V, V.prototype = {
        constructor: V, init: function (a, c, h, g, v, y) {
            this.elem = a, this.prop = h, this.easing = v || "swing", this.options = c, this.start = this.now = this.cur(), this.end = g, this.unit = y || (xt.cssNumber[h] ? "" : "px")
        }, cur: function () {
            var a = V.propHooks[this.prop];
            return a && a.get ? a.get(this) : V.propHooks._default.get(this)
        }, run: function (a) {
            var c, h = V.propHooks[this.prop];
            return this.pos = c = this.options.duration ? xt.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : a, this.now = (this.end - this.start) * c + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), h && h.set ? h.set(this) : V.propHooks._default.set(this), this
        }
    }, V.prototype.init.prototype = V.prototype, V.propHooks = {
        _default: {
            get: function (a) {
                var c;
                return null == a.elem[a.prop] || a.elem.style && null != a.elem.style[a.prop] ? (c = xt.css(a.elem, a.prop, ""), c && "auto" !== c ? c : 0) : a.elem[a.prop]
            }, set: function (a) {
                xt.fx.step[a.prop] ? xt.fx.step[a.prop](a) : a.elem.style && (null != a.elem.style[xt.cssProps[a.prop]] || xt.cssHooks[a.prop]) ? xt.style(a.elem, a.prop, a.now + a.unit) : a.elem[a.prop] = a.now
            }
        }
    }, V.propHooks.scrollTop = V.propHooks.scrollLeft = {
        set: function (a) {
            a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now)
        }
    }, xt.easing = {
        linear: function (p) {
            return p
        }, swing: function (p) {
            return .5 - Math.cos(p * Math.PI) / 2
        }
    }, xt.fx = V.prototype.init, xt.fx.step = {};
    var Dn, jn, Ln = /^(?:toggle|show|hide)$/, Hn = new RegExp("^(?:([+-])=|)(" + Wt + ")([a-z%]*)$", "i"), qn = /queueHooks$/, _n = [Q], Mn = {
        "*": [function (a, c) {
            var h = this.createTween(a, c), g = h.cur(), v = Hn.exec(c), y = v && v[3] || (xt.cssNumber[a] ? "" : "px"), b = (xt.cssNumber[a] || "px" !== y && +g) && Hn.exec(xt.css(h.elem, a)), w = 1, T = 20;
            if (b && b[3] !== y) {
                y = y || b[3], v = v || [], b = +g || 1;
                do w = w || ".5", b /= w, xt.style(h.elem, a, b + y); while (w !== (w = h.cur() / g) && 1 !== w && --T)
            }
            return v && (b = h.start = +b || +g || 0, h.unit = y, h.end = v[1] ? b + (v[1] + 1) * v[2] : +v[2]), h
        }]
    };
    xt.Animation = xt.extend(Z, {
        tweener: function (a, c) {
            xt.isFunction(a) ? (c = a, a = ["*"]) : a = a.split(" ");
            for (var h, g = 0, v = a.length; v > g; g++)h = a[g], Mn[h] = Mn[h] || [], Mn[h].unshift(c)
        }, prefilter: function (a, c) {
            c ? _n.unshift(a) : _n.push(a)
        }
    }), xt.speed = function (a, c, h) {
        var g = a && "object" == typeof a ? xt.extend({}, a) : {
            complete: h || !h && c || xt.isFunction(a) && a,
            duration: a,
            easing: h && c || c && !xt.isFunction(c) && c
        };
        return g.duration = xt.fx.off ? 0 : "number" == typeof g.duration ? g.duration : g.duration in xt.fx.speeds ? xt.fx.speeds[g.duration] : xt.fx.speeds._default, (null == g.queue || g.queue === !0) && (g.queue = "fx"), g.old = g.complete, g.complete = function () {
            xt.isFunction(g.old) && g.old.call(this), g.queue && xt.dequeue(this, g.queue)
        }, g
    }, xt.fn.extend({
        fadeTo: function (a, c, h, g) {
            return this.filter(zt).css("opacity", 0).show().end().animate({opacity: c}, a, h, g)
        }, animate: function (a, c, h, g) {
            var v = xt.isEmptyObject(a), y = xt.speed(c, h, g), b = function () {
                var c = Z(this, xt.extend({}, a), y);
                (v || xt._data(this, "finish")) && c.stop(!0)
            };
            return b.finish = b, v || y.queue === !1 ? this.each(b) : this.queue(y.queue, b)
        }, stop: function (a, c, h) {
            var g = function (a) {
                var c = a.stop;
                delete a.stop, c(h)
            };
            return "string" != typeof a && (h = c, c = a, a = void 0), c && a !== !1 && this.queue(a || "fx", []), this.each(function () {
                var c = !0, v = null != a && a + "queueHooks", y = xt.timers, b = xt._data(this);
                if (v)b[v] && b[v].stop && g(b[v]); else for (v in b)b[v] && b[v].stop && qn.test(v) && g(b[v]);
                for (v = y.length; v--;)y[v].elem !== this || null != a && y[v].queue !== a || (y[v].anim.stop(h), c = !1, y.splice(v, 1));
                (c || !h) && xt.dequeue(this, a)
            })
        }, finish: function (a) {
            return a !== !1 && (a = a || "fx"), this.each(function () {
                var c, h = xt._data(this), g = h[a + "queue"], v = h[a + "queueHooks"], y = xt.timers, b = g ? g.length : 0;
                for (h.finish = !0, xt.queue(this, a, []), v && v.stop && v.stop.call(this, !0), c = y.length; c--;)y[c].elem === this && y[c].queue === a && (y[c].anim.stop(!0), y.splice(c, 1));
                for (c = 0; b > c; c++)g[c] && g[c].finish && g[c].finish.call(this);
                delete h.finish
            })
        }
    }), xt.each(["toggle", "show", "hide"], function (i, a) {
        var c = xt.fn[a];
        xt.fn[a] = function (h, g, v) {
            return null == h || "boolean" == typeof h ? c.apply(this, arguments) : this.animate(Y(a, !0), h, g, v)
        }
    }), xt.each({
        slideDown: Y("show"),
        slideUp: Y("hide"),
        slideToggle: Y("toggle"),
        fadeIn: {opacity: "show"},
        fadeOut: {opacity: "hide"},
        fadeToggle: {opacity: "toggle"}
    }, function (a, c) {
        xt.fn[a] = function (a, h, g) {
            return this.animate(c, a, h, g)
        }
    }), xt.timers = [], xt.fx.tick = function () {
        var a, c = xt.timers, i = 0;
        for (Dn = xt.now(); i < c.length; i++)a = c[i], a() || c[i] !== a || c.splice(i--, 1);
        c.length || xt.fx.stop(), Dn = void 0
    }, xt.fx.timer = function (a) {
        xt.timers.push(a), a() ? xt.fx.start() : xt.timers.pop()
    }, xt.fx.interval = 13, xt.fx.start = function () {
        jn || (jn = setInterval(xt.fx.tick, xt.fx.interval))
    }, xt.fx.stop = function () {
        clearInterval(jn), jn = null
    }, xt.fx.speeds = {slow: 600, fast: 200, _default: 400}, xt.fn.delay = function (a, c) {
        return a = xt.fx ? xt.fx.speeds[a] || a : a, c = c || "fx", this.queue(c, function (c, h) {
            var g = setTimeout(c, a);
            h.stop = function () {
                clearTimeout(g)
            }
        })
    }, function () {
        var a, c, h, g, v;
        c = jt.createElement("div"), c.setAttribute("className", "t"), c.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", g = c.getElementsByTagName("a")[0], h = jt.createElement("select"), v = h.appendChild(jt.createElement("option")), a = c.getElementsByTagName("input")[0], g.style.cssText = "top:1px", yt.getSetAttribute = "t" !== c.className, yt.style = /top/.test(g.getAttribute("style")), yt.hrefNormalized = "/a" === g.getAttribute("href"), yt.checkOn = !!a.value, yt.optSelected = v.selected, yt.enctype = !!jt.createElement("form").enctype, h.disabled = !0, yt.optDisabled = !v.disabled, a = jt.createElement("input"), a.setAttribute("value", ""), yt.input = "" === a.getAttribute("value"), a.value = "t", a.setAttribute("type", "radio"), yt.radioValue = "t" === a.value
    }();
    var Fn = /\r/g;
    xt.fn.extend({
        val: function (a) {
            var c, h, g, v = this[0];
            {
                if (arguments.length)return g = xt.isFunction(a), this.each(function (i) {
                    var h;
                    1 === this.nodeType && (h = g ? a.call(this, i, xt(this).val()) : a, null == h ? h = "" : "number" == typeof h ? h += "" : xt.isArray(h) && (h = xt.map(h, function (a) {
                        return null == a ? "" : a + ""
                    })), c = xt.valHooks[this.type] || xt.valHooks[this.nodeName.toLowerCase()], c && "set"in c && void 0 !== c.set(this, h, "value") || (this.value = h))
                });
                if (v)return c = xt.valHooks[v.type] || xt.valHooks[v.nodeName.toLowerCase()], c && "get"in c && void 0 !== (h = c.get(v, "value")) ? h : (h = v.value, "string" == typeof h ? h.replace(Fn, "") : null == h ? "" : h)
            }
        }
    }), xt.extend({
        valHooks: {
            option: {
                get: function (a) {
                    var c = xt.find.attr(a, "value");
                    return null != c ? c : xt.trim(xt.text(a))
                }
            }, select: {
                get: function (a) {
                    for (var c, h, g = a.options, v = a.selectedIndex, y = "select-one" === a.type || 0 > v, b = y ? null : [], w = y ? v + 1 : g.length, i = 0 > v ? w : y ? v : 0; w > i; i++)if (h = g[i], !(!h.selected && i !== v || (yt.optDisabled ? h.disabled : null !== h.getAttribute("disabled")) || h.parentNode.disabled && xt.nodeName(h.parentNode, "optgroup"))) {
                        if (c = xt(h).val(), y)return c;
                        b.push(c)
                    }
                    return b
                }, set: function (a, c) {
                    for (var h, g, v = a.options, y = xt.makeArray(c), i = v.length; i--;)if (g = v[i], xt.inArray(xt.valHooks.option.get(g), y) >= 0)try {
                        g.selected = h = !0
                    } catch (b) {
                        g.scrollHeight
                    } else g.selected = !1;
                    return h || (a.selectedIndex = -1), v
                }
            }
        }
    }), xt.each(["radio", "checkbox"], function () {
        xt.valHooks[this] = {
            set: function (a, c) {
                return xt.isArray(c) ? a.checked = xt.inArray(xt(a).val(), c) >= 0 : void 0
            }
        }, yt.checkOn || (xt.valHooks[this].get = function (a) {
            return null === a.getAttribute("value") ? "on" : a.value
        })
    });
    var On, Bn, Pn = xt.expr.attrHandle, Rn = /^(?:checked|selected)$/i, Wn = yt.getSetAttribute, $n = yt.input;
    xt.fn.extend({
        attr: function (a, c) {
            return It(this, xt.attr, a, c, arguments.length > 1)
        }, removeAttr: function (a) {
            return this.each(function () {
                xt.removeAttr(this, a)
            })
        }
    }), xt.extend({
        attr: function (a, c, h) {
            var g, v, y = a.nodeType;
            if (a && 3 !== y && 8 !== y && 2 !== y)return typeof a.getAttribute === Bt ? xt.prop(a, c, h) : (1 === y && xt.isXMLDoc(a) || (c = c.toLowerCase(), g = xt.attrHooks[c] || (xt.expr.match.bool.test(c) ? Bn : On)), void 0 === h ? g && "get"in g && null !== (v = g.get(a, c)) ? v : (v = xt.find.attr(a, c), null == v ? void 0 : v) : null !== h ? g && "set"in g && void 0 !== (v = g.set(a, h, c)) ? v : (a.setAttribute(c, h + ""), h) : void xt.removeAttr(a, c))
        }, removeAttr: function (a, c) {
            var h, g, i = 0, v = c && c.match(Mt);
            if (v && 1 === a.nodeType)for (; h = v[i++];)g = xt.propFix[h] || h, xt.expr.match.bool.test(h) ? $n && Wn || !Rn.test(h) ? a[g] = !1 : a[xt.camelCase("default-" + h)] = a[g] = !1 : xt.attr(a, h, ""), a.removeAttribute(Wn ? h : g)
        }, attrHooks: {
            type: {
                set: function (a, c) {
                    if (!yt.radioValue && "radio" === c && xt.nodeName(a, "input")) {
                        var h = a.value;
                        return a.setAttribute("type", c), h && (a.value = h), c
                    }
                }
            }
        }
    }), Bn = {
        set: function (a, c, h) {
            return c === !1 ? xt.removeAttr(a, h) : $n && Wn || !Rn.test(h) ? a.setAttribute(!Wn && xt.propFix[h] || h, h) : a[xt.camelCase("default-" + h)] = a[h] = !0, h
        }
    }, xt.each(xt.expr.match.bool.source.match(/\w+/g), function (i, a) {
        var c = Pn[a] || xt.find.attr;
        Pn[a] = $n && Wn || !Rn.test(a) ? function (a, h, g) {
            var v, y;
            return g || (y = Pn[h], Pn[h] = v, v = null != c(a, h, g) ? h.toLowerCase() : null, Pn[h] = y), v
        } : function (a, c, h) {
            return h ? void 0 : a[xt.camelCase("default-" + c)] ? c.toLowerCase() : null
        }
    }), $n && Wn || (xt.attrHooks.value = {
        set: function (a, c, h) {
            return xt.nodeName(a, "input") ? void(a.defaultValue = c) : On && On.set(a, c, h)
        }
    }), Wn || (On = {
        set: function (a, c, h) {
            var g = a.getAttributeNode(h);
            return g || a.setAttributeNode(g = a.ownerDocument.createAttribute(h)), g.value = c += "", "value" === h || c === a.getAttribute(h) ? c : void 0
        }
    }, Pn.id = Pn.name = Pn.coords = function (a, c, h) {
        var g;
        return h ? void 0 : (g = a.getAttributeNode(c)) && "" !== g.value ? g.value : null
    }, xt.valHooks.button = {
        get: function (a, c) {
            var h = a.getAttributeNode(c);
            return h && h.specified ? h.value : void 0
        }, set: On.set
    }, xt.attrHooks.contenteditable = {
        set: function (a, c, h) {
            On.set(a, "" === c ? !1 : c, h)
        }
    }, xt.each(["width", "height"], function (i, a) {
        xt.attrHooks[a] = {
            set: function (c, h) {
                return "" === h ? (c.setAttribute(a, "auto"), h) : void 0
            }
        }
    })), yt.style || (xt.attrHooks.style = {
        get: function (a) {
            return a.style.cssText || void 0
        }, set: function (a, c) {
            return a.style.cssText = c + ""
        }
    });
    var zn = /^(?:input|select|textarea|button|object)$/i, In = /^(?:a|area)$/i;
    xt.fn.extend({
        prop: function (a, c) {
            return It(this, xt.prop, a, c, arguments.length > 1)
        }, removeProp: function (a) {
            return a = xt.propFix[a] || a, this.each(function () {
                try {
                    this[a] = void 0, delete this[a]
                } catch (e) {
                }
            })
        }
    }), xt.extend({
        propFix: {"for": "htmlFor", "class": "className"}, prop: function (a, c, h) {
            var g, v, y, b = a.nodeType;
            if (a && 3 !== b && 8 !== b && 2 !== b)return y = 1 !== b || !xt.isXMLDoc(a), y && (c = xt.propFix[c] || c, v = xt.propHooks[c]), void 0 !== h ? v && "set"in v && void 0 !== (g = v.set(a, h, c)) ? g : a[c] = h : v && "get"in v && null !== (g = v.get(a, c)) ? g : a[c]
        }, propHooks: {
            tabIndex: {
                get: function (a) {
                    var c = xt.find.attr(a, "tabindex");
                    return c ? parseInt(c, 10) : zn.test(a.nodeName) || In.test(a.nodeName) && a.href ? 0 : -1
                }
            }
        }
    }), yt.hrefNormalized || xt.each(["href", "src"], function (i, a) {
        xt.propHooks[a] = {
            get: function (c) {
                return c.getAttribute(a, 4)
            }
        }
    }), yt.optSelected || (xt.propHooks.selected = {
        get: function (a) {
            var c = a.parentNode;
            return c && (c.selectedIndex, c.parentNode && c.parentNode.selectedIndex), null
        }
    }), xt.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        xt.propFix[this.toLowerCase()] = this
    }), yt.enctype || (xt.propFix.enctype = "encoding");
    var Xn = /[\t\r\n\f]/g;
    xt.fn.extend({
        addClass: function (a) {
            var c, h, g, v, y, b, i = 0, w = this.length, T = "string" == typeof a && a;
            if (xt.isFunction(a))return this.each(function (c) {
                xt(this).addClass(a.call(this, c, this.className))
            });
            if (T)for (c = (a || "").match(Mt) || []; w > i; i++)if (h = this[i], g = 1 === h.nodeType && (h.className ? (" " + h.className + " ").replace(Xn, " ") : " ")) {
                for (y = 0; v = c[y++];)g.indexOf(" " + v + " ") < 0 && (g += v + " ");
                b = xt.trim(g), h.className !== b && (h.className = b)
            }
            return this
        }, removeClass: function (a) {
            var c, h, g, v, y, b, i = 0, w = this.length, T = 0 === arguments.length || "string" == typeof a && a;
            if (xt.isFunction(a))return this.each(function (c) {
                xt(this).removeClass(a.call(this, c, this.className))
            });
            if (T)for (c = (a || "").match(Mt) || []; w > i; i++)if (h = this[i], g = 1 === h.nodeType && (h.className ? (" " + h.className + " ").replace(Xn, " ") : "")) {
                for (y = 0; v = c[y++];)for (; g.indexOf(" " + v + " ") >= 0;)g = g.replace(" " + v + " ", " ");
                b = a ? xt.trim(g) : "", h.className !== b && (h.className = b)
            }
            return this
        }, toggleClass: function (a, c) {
            var h = typeof a;
            return "boolean" == typeof c && "string" === h ? c ? this.addClass(a) : this.removeClass(a) : this.each(xt.isFunction(a) ? function (i) {
                xt(this).toggleClass(a.call(this, i, this.className, c), c)
            } : function () {
                if ("string" === h)for (var c, i = 0, g = xt(this), v = a.match(Mt) || []; c = v[i++];)g.hasClass(c) ? g.removeClass(c) : g.addClass(c); else(h === Bt || "boolean" === h) && (this.className && xt._data(this, "__className__", this.className), this.className = this.className || a === !1 ? "" : xt._data(this, "__className__") || "")
            })
        }, hasClass: function (a) {
            for (var c = " " + a + " ", i = 0, l = this.length; l > i; i++)if (1 === this[i].nodeType && (" " + this[i].className + " ").replace(Xn, " ").indexOf(c) >= 0)return !0;
            return !1
        }
    }), xt.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (i, a) {
        xt.fn[a] = function (c, h) {
            return arguments.length > 0 ? this.on(a, null, c, h) : this.trigger(a)
        }
    }), xt.fn.extend({
        hover: function (a, c) {
            return this.mouseenter(a).mouseleave(c || a)
        }, bind: function (a, c, h) {
            return this.on(a, null, c, h)
        }, unbind: function (a, c) {
            return this.off(a, null, c)
        }, delegate: function (a, c, h, g) {
            return this.on(c, a, h, g)
        }, undelegate: function (a, c, h) {
            return 1 === arguments.length ? this.off(a, "**") : this.off(c, a || "**", h)
        }
    });
    var Un = xt.now(), Vn = /\?/, Jn = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    xt.parseJSON = function (c) {
        if (a.JSON && a.JSON.parse)return a.JSON.parse(c + "");
        var h, g = null, v = xt.trim(c + "");
        return v && !xt.trim(v.replace(Jn, function (a, c, v, y) {
            return h && c && (g = 0), 0 === g ? a : (h = v || c, g += !y - !v, "")
        })) ? Function("return " + v)() : xt.error("Invalid JSON: " + c)
    }, xt.parseXML = function (c) {
        var h, g;
        if (!c || "string" != typeof c)return null;
        try {
            a.DOMParser ? (g = new DOMParser, h = g.parseFromString(c, "text/xml")) : (h = new ActiveXObject("Microsoft.XMLDOM"), h.async = "false", h.loadXML(c))
        } catch (e) {
            h = void 0
        }
        return h && h.documentElement && !h.getElementsByTagName("parsererror").length || xt.error("Invalid XML: " + c), h
    };
    var Yn, Gn, Qn = /#.*$/, rts = /([?&])_=[^&]*/, Kn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm, Zn = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, er = /^(?:GET|HEAD)$/, tr = /^\/\//, nr = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, rr = {}, ar = {}, sr = "*/".concat("*");
    try {
        Gn = location.href
    } catch (e) {
        Gn = jt.createElement("a"), Gn.href = "", Gn = Gn.href
    }
    Yn = nr.exec(Gn.toLowerCase()) || [], xt.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Gn,
            type: "GET",
            isLocal: Zn.test(Yn[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": sr,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {xml: /xml/, html: /html/, json: /json/},
            responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
            converters: {"* text": String, "text html": !0, "text json": xt.parseJSON, "text xml": xt.parseXML},
            flatOptions: {url: !0, context: !0}
        },
        ajaxSetup: function (a, c) {
            return c ? nt(nt(a, xt.ajaxSettings), c) : nt(xt.ajaxSettings, a)
        },
        ajaxPrefilter: et(rr),
        ajaxTransport: et(ar),
        ajax: function (a, c) {
            function h(a, c, h, g) {
                var C, D, j, H, M, F = c;
                2 !== L && (L = 2, b && clearTimeout(b), T = void 0, y = g || "", _.readyState = a > 0 ? 4 : 0, C = a >= 200 && 300 > a || 304 === a, h && (H = it(s, _, h)), H = ot(s, H, _, C), C ? (s.ifModified && (M = _.getResponseHeader("Last-Modified"), M && (xt.lastModified[v] = M), M = _.getResponseHeader("etag"), M && (xt.etag[v] = M)), 204 === a || "HEAD" === s.type ? F = "nocontent" : 304 === a ? F = "notmodified" : (F = H.state, D = H.data, j = H.error, C = !j)) : (j = F, (a || !F) && (F = "error", 0 > a && (a = 0))), _.status = a, _.statusText = (c || F) + "", C ? k.resolveWith(N, [D, F, _]) : k.rejectWith(N, [_, F, j]), _.statusCode(A), A = void 0, w && E.trigger(C ? "ajaxSuccess" : "ajaxError", [_, s, C ? D : j]), S.fireWith(N, [_, F]), w && (E.trigger("ajaxComplete", [_, s]), --xt.active || xt.event.trigger("ajaxStop")))
            }

            "object" == typeof a && (c = a, a = void 0), c = c || {};
            var g, i, v, y, b, w, T, C, s = xt.ajaxSetup({}, c), N = s.context || s, E = s.context && (N.nodeType || N.jquery) ? xt(N) : xt.event, k = xt.Deferred(), S = xt.Callbacks("once memory"), A = s.statusCode || {}, D = {}, j = {}, L = 0, H = "canceled", _ = {
                readyState: 0,
                getResponseHeader: function (a) {
                    var c;
                    if (2 === L) {
                        if (!C)for (C = {}; c = Kn.exec(y);)C[c[1].toLowerCase()] = c[2];
                        c = C[a.toLowerCase()]
                    }
                    return null == c ? null : c
                },
                getAllResponseHeaders: function () {
                    return 2 === L ? y : null
                },
                setRequestHeader: function (a, c) {
                    var h = a.toLowerCase();
                    return L || (a = j[h] = j[h] || a, D[a] = c), this
                },
                overrideMimeType: function (a) {
                    return L || (s.mimeType = a), this
                },
                statusCode: function (a) {
                    var c;
                    if (a)if (2 > L)for (c in a)A[c] = [A[c], a[c]]; else _.always(a[_.status]);
                    return this
                },
                abort: function (a) {
                    var c = a || H;
                    return T && T.abort(c), h(0, c), this
                }
            };
            if (k.promise(_).complete = S.add, _.success = _.done, _.error = _.fail, s.url = ((a || s.url || Gn) + "").replace(Qn, "").replace(tr, Yn[1] + "//"), s.type = c.method || c.type || s.method || s.type, s.dataTypes = xt.trim(s.dataType || "*").toLowerCase().match(Mt) || [""], null == s.crossDomain && (g = nr.exec(s.url.toLowerCase()), s.crossDomain = !(!g || g[1] === Yn[1] && g[2] === Yn[2] && (g[3] || ("http:" === g[1] ? "80" : "443")) === (Yn[3] || ("http:" === Yn[1] ? "80" : "443")))), s.data && s.processData && "string" != typeof s.data && (s.data = xt.param(s.data, s.traditional)), tt(rr, s, c, _), 2 === L)return _;
            w = xt.event && s.global, w && 0 === xt.active++ && xt.event.trigger("ajaxStart"), s.type = s.type.toUpperCase(), s.hasContent = !er.test(s.type), v = s.url, s.hasContent || (s.data && (v = s.url += (Vn.test(v) ? "&" : "?") + s.data, delete s.data), s.cache === !1 && (s.url = rts.test(v) ? v.replace(rts, "$1_=" + Un++) : v + (Vn.test(v) ? "&" : "?") + "_=" + Un++)), s.ifModified && (xt.lastModified[v] && _.setRequestHeader("If-Modified-Since", xt.lastModified[v]), xt.etag[v] && _.setRequestHeader("If-None-Match", xt.etag[v])), (s.data && s.hasContent && s.contentType !== !1 || c.contentType) && _.setRequestHeader("Content-Type", s.contentType), _.setRequestHeader("Accept", s.dataTypes[0] && s.accepts[s.dataTypes[0]] ? s.accepts[s.dataTypes[0]] + ("*" !== s.dataTypes[0] ? ", " + sr + "; q=0.01" : "") : s.accepts["*"]);
            for (i in s.headers)_.setRequestHeader(i, s.headers[i]);
            if (s.beforeSend && (s.beforeSend.call(N, _, s) === !1 || 2 === L))return _.abort();
            H = "abort";
            for (i in{success: 1, error: 1, complete: 1})_[i](s[i]);
            if (T = tt(ar, s, c, _)) {
                _.readyState = 1, w && E.trigger("ajaxSend", [_, s]), s.async && s.timeout > 0 && (b = setTimeout(function () {
                    _.abort("timeout")
                }, s.timeout));
                try {
                    L = 1, T.send(D, h)
                } catch (e) {
                    if (!(2 > L))throw e;
                    h(-1, e)
                }
            } else h(-1, "No Transport");
            return _
        },
        getJSON: function (a, c, h) {
            return xt.get(a, c, h, "json")
        },
        getScript: function (a, c) {
            return xt.get(a, void 0, c, "script")
        }
    }), xt.each(["get", "post"], function (i, a) {
        xt[a] = function (c, h, g, v) {
            return xt.isFunction(h) && (v = v || g, g = h, h = void 0), xt.ajax({
                url: c,
                type: a,
                dataType: v,
                data: h,
                success: g
            })
        }
    }), xt._evalUrl = function (a) {
        return xt.ajax({url: a, type: "GET", dataType: "script", async: !1, global: !1, "throws": !0})
    }, xt.fn.extend({
        wrapAll: function (a) {
            if (xt.isFunction(a))return this.each(function (i) {
                xt(this).wrapAll(a.call(this, i))
            });
            if (this[0]) {
                var c = xt(a, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && c.insertBefore(this[0]), c.map(function () {
                    for (var a = this; a.firstChild && 1 === a.firstChild.nodeType;)a = a.firstChild;
                    return a
                }).append(this)
            }
            return this
        }, wrapInner: function (a) {
            return this.each(xt.isFunction(a) ? function (i) {
                xt(this).wrapInner(a.call(this, i))
            } : function () {
                var c = xt(this), h = c.contents();
                h.length ? h.wrapAll(a) : c.append(a)
            })
        }, wrap: function (a) {
            var c = xt.isFunction(a);
            return this.each(function (i) {
                xt(this).wrapAll(c ? a.call(this, i) : a)
            })
        }, unwrap: function () {
            return this.parent().each(function () {
                xt.nodeName(this, "body") || xt(this).replaceWith(this.childNodes)
            }).end()
        }
    }), xt.expr.filters.hidden = function (a) {
        return a.offsetWidth <= 0 && a.offsetHeight <= 0 || !yt.reliableHiddenOffsets() && "none" === (a.style && a.style.display || xt.css(a, "display"))
    }, xt.expr.filters.visible = function (a) {
        return !xt.expr.filters.hidden(a)
    };
    var ur = /%20/g, lr = /\[\]$/, cr = /\r?\n/g, dr = /^(?:submit|button|image|reset|file)$/i, fr = /^(?:input|select|textarea|keygen)/i;
    xt.param = function (a, c) {
        var h, s = [], g = function (a, c) {
            c = xt.isFunction(c) ? c() : null == c ? "" : c, s[s.length] = encodeURIComponent(a) + "=" + encodeURIComponent(c)
        };
        if (void 0 === c && (c = xt.ajaxSettings && xt.ajaxSettings.traditional), xt.isArray(a) || a.jquery && !xt.isPlainObject(a))xt.each(a, function () {
            g(this.name, this.value)
        }); else for (h in a)at(h, a[h], c, g);
        return s.join("&").replace(ur, "+")
    }, xt.fn.extend({
        serialize: function () {
            return xt.param(this.serializeArray())
        }, serializeArray: function () {
            return this.map(function () {
                var a = xt.prop(this, "elements");
                return a ? xt.makeArray(a) : this
            }).filter(function () {
                var a = this.type;
                return this.name && !xt(this).is(":disabled") && fr.test(this.nodeName) && !dr.test(a) && (this.checked || !Xt.test(a))
            }).map(function (i, a) {
                var c = xt(this).val();
                return null == c ? null : xt.isArray(c) ? xt.map(c, function (c) {
                    return {name: a.name, value: c.replace(cr, "\r\n")}
                }) : {name: a.name, value: c.replace(cr, "\r\n")}
            }).get()
        }
    }), xt.ajaxSettings.xhr = void 0 !== a.ActiveXObject ? function () {
        return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && st() || ut()
    } : st;
    var pr = 0, hr = {}, mr = xt.ajaxSettings.xhr();
    a.attachEvent && a.attachEvent("onunload", function () {
        for (var a in hr)hr[a](void 0, !0)
    }), yt.cors = !!mr && "withCredentials"in mr, mr = yt.ajax = !!mr, mr && xt.ajaxTransport(function (a) {
        if (!a.crossDomain || yt.cors) {
            var c;
            return {
                send: function (h, g) {
                    var i, v = a.xhr(), y = ++pr;
                    if (v.open(a.type, a.url, a.async, a.username, a.password), a.xhrFields)for (i in a.xhrFields)v[i] = a.xhrFields[i];
                    a.mimeType && v.overrideMimeType && v.overrideMimeType(a.mimeType), a.crossDomain || h["X-Requested-With"] || (h["X-Requested-With"] = "XMLHttpRequest");
                    for (i in h)void 0 !== h[i] && v.setRequestHeader(i, h[i] + "");
                    v.send(a.hasContent && a.data || null), c = function (h, b) {
                        var w, T, C;
                        if (c && (b || 4 === v.readyState))if (delete hr[y], c = void 0, v.onreadystatechange = xt.noop, b)4 !== v.readyState && v.abort(); else {
                            C = {}, w = v.status, "string" == typeof v.responseText && (C.text = v.responseText);
                            try {
                                T = v.statusText
                            } catch (e) {
                                T = ""
                            }
                            w || !a.isLocal || a.crossDomain ? 1223 === w && (w = 204) : w = C.text ? 200 : 404
                        }
                        C && g(w, T, C, v.getAllResponseHeaders())
                    }, a.async ? 4 === v.readyState ? setTimeout(c) : v.onreadystatechange = hr[y] = c : c()
                }, abort: function () {
                    c && c(void 0, !0)
                }
            }
        }
    }), xt.ajaxSetup({
        accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
        contents: {script: /(?:java|ecma)script/},
        converters: {
            "text script": function (a) {
                return xt.globalEval(a), a
            }
        }
    }), xt.ajaxPrefilter("script", function (s) {
        void 0 === s.cache && (s.cache = !1), s.crossDomain && (s.type = "GET", s.global = !1)
    }), xt.ajaxTransport("script", function (s) {
        if (s.crossDomain) {
            var a, c = jt.head || xt("head")[0] || jt.documentElement;
            return {
                send: function (h, g) {
                    a = jt.createElement("script"), a.async = !0, s.scriptCharset && (a.charset = s.scriptCharset), a.src = s.url, a.onload = a.onreadystatechange = function (c, h) {
                        (h || !a.readyState || /loaded|complete/.test(a.readyState)) && (a.onload = a.onreadystatechange = null, a.parentNode && a.parentNode.removeChild(a), a = null, h || g(200, "success"))
                    }, c.insertBefore(a, c.firstChild)
                }, abort: function () {
                    a && a.onload(void 0, !0)
                }
            }
        }
    });
    var gr = [], vr = /(=)\?(?=&|$)|\?\?/;
    xt.ajaxSetup({
        jsonp: "callback", jsonpCallback: function () {
            var a = gr.pop() || xt.expando + "_" + Un++;
            return this[a] = !0, a
        }
    }), xt.ajaxPrefilter("json jsonp", function (s, c, h) {
        var g, v, y, b = s.jsonp !== !1 && (vr.test(s.url) ? "url" : "string" == typeof s.data && !(s.contentType || "").indexOf("application/x-www-form-urlencoded") && vr.test(s.data) && "data");
        return b || "jsonp" === s.dataTypes[0] ? (g = s.jsonpCallback = xt.isFunction(s.jsonpCallback) ? s.jsonpCallback() : s.jsonpCallback, b ? s[b] = s[b].replace(vr, "$1" + g) : s.jsonp !== !1 && (s.url += (Vn.test(s.url) ? "&" : "?") + s.jsonp + "=" + g), s.converters["script json"] = function () {
            return y || xt.error(g + " was not called"), y[0]
        }, s.dataTypes[0] = "json", v = a[g], a[g] = function () {
            y = arguments
        }, h.always(function () {
            a[g] = v, s[g] && (s.jsonpCallback = c.jsonpCallback, gr.push(g)), y && xt.isFunction(v) && v(y[0]), y = v = void 0
        }), "script") : void 0
    }), xt.parseHTML = function (a, c, h) {
        if (!a || "string" != typeof a)return null;
        "boolean" == typeof c && (h = c, c = !1), c = c || jt;
        var g = St.exec(a), v = !h && [];
        return g ? [c.createElement(g[1])] : (g = xt.buildFragment([a], c, v), v && v.length && xt(v).remove(), xt.merge([], g.childNodes))
    };
    var yr = xt.fn.load;
    xt.fn.load = function (a, c, h) {
        if ("string" != typeof a && yr)return yr.apply(this, arguments);
        var g, v, y, b = this, w = a.indexOf(" ");
        return w >= 0 && (g = xt.trim(a.slice(w, a.length)), a = a.slice(0, w)), xt.isFunction(c) ? (h = c, c = void 0) : c && "object" == typeof c && (y = "POST"), b.length > 0 && xt.ajax({
            url: a,
            type: y,
            dataType: "html",
            data: c
        }).done(function (a) {
            v = arguments, b.html(g ? xt("<div>").append(xt.parseHTML(a)).find(g) : a)
        }).complete(h && function (a, c) {
            b.each(h, v || [a.responseText, c, a])
        }), this
    }, xt.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (i, a) {
        xt.fn[a] = function (c) {
            return this.on(a, c)
        }
    }), xt.expr.filters.animated = function (a) {
        return xt.grep(xt.timers, function (c) {
            return a === c.elem
        }).length
    };
    var br = a.document.documentElement;
    xt.offset = {
        setOffset: function (a, c, i) {
            var h, g, v, y, b, w, T, C = xt.css(a, "position"), N = xt(a), E = {};
            "static" === C && (a.style.position = "relative"), b = N.offset(), v = xt.css(a, "top"), w = xt.css(a, "left"), T = ("absolute" === C || "fixed" === C) && xt.inArray("auto", [v, w]) > -1, T ? (h = N.position(), y = h.top, g = h.left) : (y = parseFloat(v) || 0, g = parseFloat(w) || 0), xt.isFunction(c) && (c = c.call(a, i, b)), null != c.top && (E.top = c.top - b.top + y), null != c.left && (E.left = c.left - b.left + g), "using"in c ? c.using.call(a, E) : N.css(E)
        }
    }, xt.fn.extend({
        offset: function (a) {
            if (arguments.length)return void 0 === a ? this : this.each(function (i) {
                xt.offset.setOffset(this, a, i)
            });
            var c, h, g = {top: 0, left: 0}, v = this[0], y = v && v.ownerDocument;
            if (y)return c = y.documentElement, xt.contains(c, v) ? (typeof v.getBoundingClientRect !== Bt && (g = v.getBoundingClientRect()), h = lt(y), {
                top: g.top + (h.pageYOffset || c.scrollTop) - (c.clientTop || 0),
                left: g.left + (h.pageXOffset || c.scrollLeft) - (c.clientLeft || 0)
            }) : g
        }, position: function () {
            if (this[0]) {
                var a, c, h = {top: 0, left: 0}, g = this[0];
                return "fixed" === xt.css(g, "position") ? c = g.getBoundingClientRect() : (a = this.offsetParent(), c = this.offset(), xt.nodeName(a[0], "html") || (h = a.offset()), h.top += xt.css(a[0], "borderTopWidth", !0), h.left += xt.css(a[0], "borderLeftWidth", !0)), {
                    top: c.top - h.top - xt.css(g, "marginTop", !0),
                    left: c.left - h.left - xt.css(g, "marginLeft", !0)
                }
            }
        }, offsetParent: function () {
            return this.map(function () {
                for (var a = this.offsetParent || br; a && !xt.nodeName(a, "html") && "static" === xt.css(a, "position");)a = a.offsetParent;
                return a || br
            })
        }
    }), xt.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (a, c) {
        var h = /Y/.test(c);
        xt.fn[a] = function (g) {
            return It(this, function (a, g, v) {
                var y = lt(a);
                return void 0 === v ? y ? c in y ? y[c] : y.document.documentElement[g] : a[g] : void(y ? y.scrollTo(h ? xt(y).scrollLeft() : v, h ? v : xt(y).scrollTop()) : a[g] = v)
            }, a, g, arguments.length, null)
        }
    }), xt.each(["top", "left"], function (i, a) {
        xt.cssHooks[a] = W(yt.pixelPosition, function (c, h) {
            return h ? (h = vn(c, a), bn.test(h) ? xt(c).position()[a] + "px" : h) : void 0
        })
    }), xt.each({Height: "height", Width: "width"}, function (a, c) {
        xt.each({padding: "inner" + a, content: c, "": "outer" + a}, function (h, g) {
            xt.fn[g] = function (g, v) {
                var y = arguments.length && (h || "boolean" != typeof g), b = h || (g === !0 || v === !0 ? "margin" : "border");
                return It(this, function (c, h, g) {
                    var v;
                    return xt.isWindow(c) ? c.document.documentElement["client" + a] : 9 === c.nodeType ? (v = c.documentElement, Math.max(c.body["scroll" + a], v["scroll" + a], c.body["offset" + a], v["offset" + a], v["client" + a])) : void 0 === g ? xt.css(c, h, b) : xt.style(c, h, g, b)
                }, c, y ? g : void 0, y, null)
            }
        })
    }), xt.fn.size = function () {
        return this.length
    }, xt.fn.andSelf = xt.fn.addBack, "function" == typeof define && define.amd && define("dep/jquery/dist/jquery", ["require"], function () {
        return xt
    });
    var xr = a.jQuery, wr = a.$;
    return xt.noConflict = function (c) {
        return a.$ === xt && (a.$ = wr), c && a.jQuery === xt && (a.jQuery = xr), xt
    }, typeof c === Bt && (a.jQuery = a.$ = xt), xt
});
/*!dep/jquery-ui-1.10.4.min.js*/
;
define("dep/jquery-ui-1.10.4.min", ["require", "exports", "module", "dep/jquery/dist/jquery"], function (require) {
    require("dep/jquery/dist/jquery"), function (e, t) {
        function i(t, i) {
            var s, a, o, r = t.nodeName.toLowerCase();
            return "area" === r ? (s = t.parentNode, a = s.name, t.href && a && "map" === s.nodeName.toLowerCase() ? (o = e("img[usemap=#" + a + "]")[0], !!o && n(o)) : !1) : (/input|select|textarea|button|object/.test(r) ? !t.disabled : "a" === r ? t.href || i : i) && n(t)
        }

        function n(t) {
            return e.expr.filters.visible(t) && !e(t).parents().addBack().filter(function () {
                    return "hidden" === e.css(this, "visibility")
                }).length
        }

        var s = 0, a = /^ui-id-\d+$/;
        e.ui = e.ui || {}, e.extend(e.ui, {
            version: "1.10.4",
            keyCode: {
                BACKSPACE: 8,
                COMMA: 188,
                DELETE: 46,
                DOWN: 40,
                END: 35,
                ENTER: 13,
                ESCAPE: 27,
                HOME: 36,
                LEFT: 37,
                NUMPAD_ADD: 107,
                NUMPAD_DECIMAL: 110,
                NUMPAD_DIVIDE: 111,
                NUMPAD_ENTER: 108,
                NUMPAD_MULTIPLY: 106,
                NUMPAD_SUBTRACT: 109,
                PAGE_DOWN: 34,
                PAGE_UP: 33,
                PERIOD: 190,
                RIGHT: 39,
                SPACE: 32,
                TAB: 9,
                UP: 38
            }
        }), e.fn.extend({
            focus: function (t) {
                return function (i, n) {
                    return "number" == typeof i ? this.each(function () {
                        var t = this;
                        setTimeout(function () {
                            e(t).focus(), n && n.call(t)
                        }, i)
                    }) : t.apply(this, arguments)
                }
            }(e.fn.focus), scrollParent: function () {
                var t;
                return t = e.ui.ie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? this.parents().filter(function () {
                    return /(relative|absolute|fixed)/.test(e.css(this, "position")) && /(auto|scroll)/.test(e.css(this, "overflow") + e.css(this, "overflow-y") + e.css(this, "overflow-x"))
                }).eq(0) : this.parents().filter(function () {
                    return /(auto|scroll)/.test(e.css(this, "overflow") + e.css(this, "overflow-y") + e.css(this, "overflow-x"))
                }).eq(0), /fixed/.test(this.css("position")) || !t.length ? e(document) : t
            }, zIndex: function (i) {
                if (i !== t)return this.css("zIndex", i);
                if (this.length)for (var n, s, a = e(this[0]); a.length && a[0] !== document;) {
                    if (n = a.css("position"), ("absolute" === n || "relative" === n || "fixed" === n) && (s = parseInt(a.css("zIndex"), 10), !isNaN(s) && 0 !== s))return s;
                    a = a.parent()
                }
                return 0
            }, uniqueId: function () {
                return this.each(function () {
                    this.id || (this.id = "ui-id-" + ++s)
                })
            }, removeUniqueId: function () {
                return this.each(function () {
                    a.test(this.id) && e(this).removeAttr("id")
                })
            }
        }), e.extend(e.expr[":"], {
            data: e.expr.createPseudo ? e.expr.createPseudo(function (t) {
                return function (i) {
                    return !!e.data(i, t)
                }
            }) : function (t, i, n) {
                return !!e.data(t, n[3])
            }, focusable: function (t) {
                return i(t, !isNaN(e.attr(t, "tabindex")))
            }, tabbable: function (t) {
                var n = e.attr(t, "tabindex"), s = isNaN(n);
                return (s || n >= 0) && i(t, !s)
            }
        }), e("<a>").outerWidth(1).jquery || e.each(["Width", "Height"], function (i, n) {
            function s(t, i, n, s) {
                return e.each(a, function () {
                    i -= parseFloat(e.css(t, "padding" + this)) || 0, n && (i -= parseFloat(e.css(t, "border" + this + "Width")) || 0), s && (i -= parseFloat(e.css(t, "margin" + this)) || 0)
                }), i
            }

            var a = "Width" === n ? ["Left", "Right"] : ["Top", "Bottom"], o = n.toLowerCase(), r = {
                innerWidth: e.fn.innerWidth,
                innerHeight: e.fn.innerHeight,
                outerWidth: e.fn.outerWidth,
                outerHeight: e.fn.outerHeight
            };
            e.fn["inner" + n] = function (i) {
                return i === t ? r["inner" + n].call(this) : this.each(function () {
                    e(this).css(o, s(this, i) + "px")
                })
            }, e.fn["outer" + n] = function (t, i) {
                return "number" != typeof t ? r["outer" + n].call(this, t) : this.each(function () {
                    e(this).css(o, s(this, t, !0, i) + "px")
                })
            }
        }), e.fn.addBack || (e.fn.addBack = function (e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }), e("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (e.fn.removeData = function (t) {
            return function (i) {
                return arguments.length ? t.call(this, e.camelCase(i)) : t.call(this)
            }
        }(e.fn.removeData)), e.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), e.support.selectstart = "onselectstart"in document.createElement("div"), e.fn.extend({
            disableSelection: function () {
                return this.bind((e.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function (e) {
                    e.preventDefault()
                })
            }, enableSelection: function () {
                return this.unbind(".ui-disableSelection")
            }
        }), e.extend(e.ui, {
            plugin: {
                add: function (t, i, n) {
                    var s, a = e.ui[t].prototype;
                    for (s in n)a.plugins[s] = a.plugins[s] || [], a.plugins[s].push([i, n[s]])
                }, call: function (e, t, i) {
                    var n, s = e.plugins[t];
                    if (s && e.element[0].parentNode && 11 !== e.element[0].parentNode.nodeType)for (n = 0; s.length > n; n++)e.options[s[n][0]] && s[n][1].apply(e.element, i)
                }
            }, hasScroll: function (t, i) {
                if ("hidden" === e(t).css("overflow"))return !1;
                var n = i && "left" === i ? "scrollLeft" : "scrollTop", s = !1;
                return t[n] > 0 ? !0 : (t[n] = 1, s = t[n] > 0, t[n] = 0, s)
            }
        })
    }(jQuery), function (t, e) {
        var i = 0, s = Array.prototype.slice, n = t.cleanData;
        t.cleanData = function (e) {
            for (var i, s = 0; null != (i = e[s]); s++)try {
                t(i).triggerHandler("remove")
            } catch (o) {
            }
            n(e)
        }, t.widget = function (i, s, n) {
            var o, a, r, h, l = {}, c = i.split(".")[0];
            i = i.split(".")[1], o = c + "-" + i, n || (n = s, s = t.Widget), t.expr[":"][o.toLowerCase()] = function (e) {
                return !!t.data(e, o)
            }, t[c] = t[c] || {}, a = t[c][i], r = t[c][i] = function (t, i) {
                return this._createWidget ? (arguments.length && this._createWidget(t, i), e) : new r(t, i)
            }, t.extend(r, a, {
                version: n.version,
                _proto: t.extend({}, n),
                _childConstructors: []
            }), h = new s, h.options = t.widget.extend({}, h.options), t.each(n, function (i, n) {
                return t.isFunction(n) ? (l[i] = function () {
                    var t = function () {
                        return s.prototype[i].apply(this, arguments)
                    }, e = function (t) {
                        return s.prototype[i].apply(this, t)
                    };
                    return function () {
                        var i, s = this._super, o = this._superApply;
                        return this._super = t, this._superApply = e, i = n.apply(this, arguments), this._super = s, this._superApply = o, i
                    }
                }(), e) : (l[i] = n, e)
            }), r.prototype = t.widget.extend(h, {widgetEventPrefix: a ? h.widgetEventPrefix || i : i}, l, {
                constructor: r,
                namespace: c,
                widgetName: i,
                widgetFullName: o
            }), a ? (t.each(a._childConstructors, function (e, i) {
                var s = i.prototype;
                t.widget(s.namespace + "." + s.widgetName, r, i._proto)
            }), delete a._childConstructors) : s._childConstructors.push(r), t.widget.bridge(i, r)
        }, t.widget.extend = function (i) {
            for (var n, o, a = s.call(arguments, 1), r = 0, h = a.length; h > r; r++)for (n in a[r])o = a[r][n], a[r].hasOwnProperty(n) && o !== e && (i[n] = t.isPlainObject(o) ? t.isPlainObject(i[n]) ? t.widget.extend({}, i[n], o) : t.widget.extend({}, o) : o);
            return i
        }, t.widget.bridge = function (i, n) {
            var o = n.prototype.widgetFullName || i;
            t.fn[i] = function (a) {
                var r = "string" == typeof a, h = s.call(arguments, 1), l = this;
                return a = !r && h.length ? t.widget.extend.apply(null, [a].concat(h)) : a, this.each(r ? function () {
                    var s, n = t.data(this, o);
                    return n ? t.isFunction(n[a]) && "_" !== a.charAt(0) ? (s = n[a].apply(n, h), s !== n && s !== e ? (l = s && s.jquery ? l.pushStack(s.get()) : s, !1) : e) : t.error("no such method '" + a + "' for " + i + " widget instance") : t.error("cannot call methods on " + i + " prior to initialization; attempted to call method '" + a + "'")
                } : function () {
                    var e = t.data(this, o);
                    e ? e.option(a || {})._init() : t.data(this, o, new n(a, this))
                }), l
            }
        }, t.Widget = function () {
        }, t.Widget._childConstructors = [], t.Widget.prototype = {
            widgetName: "widget",
            widgetEventPrefix: "",
            defaultElement: "<div>",
            options: {disabled: !1, create: null},
            _createWidget: function (e, s) {
                s = t(s || this.defaultElement || this)[0], this.element = t(s), this.uuid = i++, this.eventNamespace = "." + this.widgetName + this.uuid, this.options = t.widget.extend({}, this.options, this._getCreateOptions(), e), this.bindings = t(), this.hoverable = t(), this.focusable = t(), s !== this && (t.data(s, this.widgetFullName, this), this._on(!0, this.element, {
                    remove: function (t) {
                        t.target === s && this.destroy()
                    }
                }), this.document = t(s.style ? s.ownerDocument : s.document || s), this.window = t(this.document[0].defaultView || this.document[0].parentWindow)), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
            },
            _getCreateOptions: t.noop,
            _getCreateEventData: t.noop,
            _create: t.noop,
            _init: t.noop,
            destroy: function () {
                this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(t.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
            },
            _destroy: t.noop,
            widget: function () {
                return this.element
            },
            option: function (i, s) {
                var n, o, a, r = i;
                if (0 === arguments.length)return t.widget.extend({}, this.options);
                if ("string" == typeof i)if (r = {}, n = i.split("."), i = n.shift(), n.length) {
                    for (o = r[i] = t.widget.extend({}, this.options[i]), a = 0; n.length - 1 > a; a++)o[n[a]] = o[n[a]] || {}, o = o[n[a]];
                    if (i = n.pop(), 1 === arguments.length)return o[i] === e ? null : o[i];
                    o[i] = s
                } else {
                    if (1 === arguments.length)return this.options[i] === e ? null : this.options[i];
                    r[i] = s
                }
                return this._setOptions(r), this
            },
            _setOptions: function (t) {
                var e;
                for (e in t)this._setOption(e, t[e]);
                return this
            },
            _setOption: function (t, e) {
                return this.options[t] = e, "disabled" === t && (this.widget().toggleClass(this.widgetFullName + "-disabled ui-state-disabled", !!e).attr("aria-disabled", e), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")), this
            },
            enable: function () {
                return this._setOption("disabled", !1)
            },
            disable: function () {
                return this._setOption("disabled", !0)
            },
            _on: function (i, s, n) {
                var o, a = this;
                "boolean" != typeof i && (n = s, s = i, i = !1), n ? (s = o = t(s), this.bindings = this.bindings.add(s)) : (n = s, s = this.element, o = this.widget()), t.each(n, function (n, r) {
                    function h() {
                        return i || a.options.disabled !== !0 && !t(this).hasClass("ui-state-disabled") ? ("string" == typeof r ? a[r] : r).apply(a, arguments) : e
                    }

                    "string" != typeof r && (h.guid = r.guid = r.guid || h.guid || t.guid++);
                    var l = n.match(/^(\w+)\s*(.*)$/), c = l[1] + a.eventNamespace, u = l[2];
                    u ? o.delegate(u, c, h) : s.bind(c, h)
                })
            },
            _off: function (t, e) {
                e = (e || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, t.unbind(e).undelegate(e)
            },
            _delay: function (t, e) {
                function i() {
                    return ("string" == typeof t ? s[t] : t).apply(s, arguments)
                }

                var s = this;
                return setTimeout(i, e || 0)
            },
            _hoverable: function (e) {
                this.hoverable = this.hoverable.add(e), this._on(e, {
                    mouseenter: function (e) {
                        t(e.currentTarget).addClass("ui-state-hover")
                    }, mouseleave: function (e) {
                        t(e.currentTarget).removeClass("ui-state-hover")
                    }
                })
            },
            _focusable: function (e) {
                this.focusable = this.focusable.add(e), this._on(e, {
                    focusin: function (e) {
                        t(e.currentTarget).addClass("ui-state-focus")
                    }, focusout: function (e) {
                        t(e.currentTarget).removeClass("ui-state-focus")
                    }
                })
            },
            _trigger: function (e, i, s) {
                var n, o, a = this.options[e];
                if (s = s || {}, i = t.Event(i), i.type = (e === this.widgetEventPrefix ? e : this.widgetEventPrefix + e).toLowerCase(), i.target = this.element[0], o = i.originalEvent)for (n in o)n in i || (i[n] = o[n]);
                return this.element.trigger(i, s), !(t.isFunction(a) && a.apply(this.element[0], [i].concat(s)) === !1 || i.isDefaultPrevented())
            }
        }, t.each({show: "fadeIn", hide: "fadeOut"}, function (e, i) {
            t.Widget.prototype["_" + e] = function (s, n, o) {
                "string" == typeof n && (n = {effect: n});
                var a, r = n ? n === !0 || "number" == typeof n ? i : n.effect || i : e;
                n = n || {}, "number" == typeof n && (n = {duration: n}), a = !t.isEmptyObject(n), n.complete = o, n.delay && s.delay(n.delay), a && t.effects && t.effects.effect[r] ? s[e](n) : r !== e && s[r] ? s[r](n.duration, n.easing, o) : s.queue(function (i) {
                    t(this)[e](), o && o.call(s[0]), i()
                })
            }
        })
    }(jQuery), function (t) {
        var e = !1;
        t(document).mouseup(function () {
            e = !1
        }), t.widget("ui.mouse", {
            version: "1.10.4",
            options: {cancel: "input,textarea,button,select,option", distance: 1, delay: 0},
            _mouseInit: function () {
                var e = this;
                this.element.bind("mousedown." + this.widgetName, function (t) {
                    return e._mouseDown(t)
                }).bind("click." + this.widgetName, function (i) {
                    return !0 === t.data(i.target, e.widgetName + ".preventClickEvent") ? (t.removeData(i.target, e.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : void 0
                }), this.started = !1
            },
            _mouseDestroy: function () {
                this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && t(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
            },
            _mouseDown: function (i) {
                if (!e) {
                    this._mouseStarted && this._mouseUp(i), this._mouseDownEvent = i;
                    var s = this, n = 1 === i.which, a = "string" == typeof this.options.cancel && i.target.nodeName ? t(i.target).closest(this.options.cancel).length : !1;
                    return n && !a && this._mouseCapture(i) ? (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function () {
                        s.mouseDelayMet = !0
                    }, this.options.delay)), this._mouseDistanceMet(i) && this._mouseDelayMet(i) && (this._mouseStarted = this._mouseStart(i) !== !1, !this._mouseStarted) ? (i.preventDefault(), !0) : (!0 === t.data(i.target, this.widgetName + ".preventClickEvent") && t.removeData(i.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function (t) {
                        return s._mouseMove(t)
                    }, this._mouseUpDelegate = function (t) {
                        return s._mouseUp(t)
                    }, t(document).bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), i.preventDefault(), e = !0, !0)) : !0
                }
            },
            _mouseMove: function (e) {
                return t.ui.ie && (!document.documentMode || 9 > document.documentMode) && !e.button ? this._mouseUp(e) : this._mouseStarted ? (this._mouseDrag(e), e.preventDefault()) : (this._mouseDistanceMet(e) && this._mouseDelayMet(e) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, e) !== !1, this._mouseStarted ? this._mouseDrag(e) : this._mouseUp(e)), !this._mouseStarted)
            },
            _mouseUp: function (e) {
                return t(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, e.target === this._mouseDownEvent.target && t.data(e.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(e)), !1
            },
            _mouseDistanceMet: function (t) {
                return Math.max(Math.abs(this._mouseDownEvent.pageX - t.pageX), Math.abs(this._mouseDownEvent.pageY - t.pageY)) >= this.options.distance
            },
            _mouseDelayMet: function () {
                return this.mouseDelayMet
            },
            _mouseStart: function () {
            },
            _mouseDrag: function () {
            },
            _mouseStop: function () {
            },
            _mouseCapture: function () {
                return !0
            }
        })
    }(jQuery), function (t, e) {
        function i(t, e, i) {
            return [parseFloat(t[0]) * (p.test(t[0]) ? e / 100 : 1), parseFloat(t[1]) * (p.test(t[1]) ? i / 100 : 1)]
        }

        function s(e, i) {
            return parseInt(t.css(e, i), 10) || 0
        }

        function n(e) {
            var i = e[0];
            return 9 === i.nodeType ? {
                width: e.width(),
                height: e.height(),
                offset: {top: 0, left: 0}
            } : t.isWindow(i) ? {
                width: e.width(),
                height: e.height(),
                offset: {top: e.scrollTop(), left: e.scrollLeft()}
            } : i.preventDefault ? {
                width: 0,
                height: 0,
                offset: {top: i.pageY, left: i.pageX}
            } : {width: e.outerWidth(), height: e.outerHeight(), offset: e.offset()}
        }

        t.ui = t.ui || {};
        var a, o = Math.max, r = Math.abs, l = Math.round, h = /left|center|right/, c = /top|center|bottom/, u = /[\+\-]\d+(\.[\d]+)?%?/, d = /^\w+/, p = /%$/, f = t.fn.position;
        t.position = {
            scrollbarWidth: function () {
                if (a !== e)return a;
                var i, s, n = t("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"), o = n.children()[0];
                return t("body").append(n), i = o.offsetWidth, n.css("overflow", "scroll"), s = o.offsetWidth, i === s && (s = n[0].clientWidth), n.remove(), a = i - s
            }, getScrollInfo: function (e) {
                var i = e.isWindow || e.isDocument ? "" : e.element.css("overflow-x"), s = e.isWindow || e.isDocument ? "" : e.element.css("overflow-y"), n = "scroll" === i || "auto" === i && e.width < e.element[0].scrollWidth, a = "scroll" === s || "auto" === s && e.height < e.element[0].scrollHeight;
                return {width: a ? t.position.scrollbarWidth() : 0, height: n ? t.position.scrollbarWidth() : 0}
            }, getWithinInfo: function (e) {
                var i = t(e || window), s = t.isWindow(i[0]), n = !!i[0] && 9 === i[0].nodeType;
                return {
                    element: i,
                    isWindow: s,
                    isDocument: n,
                    offset: i.offset() || {left: 0, top: 0},
                    scrollLeft: i.scrollLeft(),
                    scrollTop: i.scrollTop(),
                    width: s ? i.width() : i.outerWidth(),
                    height: s ? i.height() : i.outerHeight()
                }
            }
        }, t.fn.position = function (e) {
            if (!e || !e.of)return f.apply(this, arguments);
            e = t.extend({}, e);
            var a, p, g, m, v, _, b = t(e.of), y = t.position.getWithinInfo(e.within), w = t.position.getScrollInfo(y), k = (e.collision || "flip").split(" "), D = {};
            return _ = n(b), b[0].preventDefault && (e.at = "left top"), p = _.width, g = _.height, m = _.offset, v = t.extend({}, m), t.each(["my", "at"], function () {
                var t, i, s = (e[this] || "").split(" ");
                1 === s.length && (s = h.test(s[0]) ? s.concat(["center"]) : c.test(s[0]) ? ["center"].concat(s) : ["center", "center"]), s[0] = h.test(s[0]) ? s[0] : "center", s[1] = c.test(s[1]) ? s[1] : "center", t = u.exec(s[0]), i = u.exec(s[1]), D[this] = [t ? t[0] : 0, i ? i[0] : 0], e[this] = [d.exec(s[0])[0], d.exec(s[1])[0]]
            }), 1 === k.length && (k[1] = k[0]), "right" === e.at[0] ? v.left += p : "center" === e.at[0] && (v.left += p / 2), "bottom" === e.at[1] ? v.top += g : "center" === e.at[1] && (v.top += g / 2), a = i(D.at, p, g), v.left += a[0], v.top += a[1], this.each(function () {
                var n, h, c = t(this), u = c.outerWidth(), d = c.outerHeight(), f = s(this, "marginLeft"), _ = s(this, "marginTop"), x = u + f + s(this, "marginRight") + w.width, C = d + _ + s(this, "marginBottom") + w.height, I = t.extend({}, v), P = i(D.my, c.outerWidth(), c.outerHeight());
                "right" === e.my[0] ? I.left -= u : "center" === e.my[0] && (I.left -= u / 2), "bottom" === e.my[1] ? I.top -= d : "center" === e.my[1] && (I.top -= d / 2), I.left += P[0], I.top += P[1], t.support.offsetFractions || (I.left = l(I.left), I.top = l(I.top)), n = {
                    marginLeft: f,
                    marginTop: _
                }, t.each(["left", "top"], function (i, s) {
                    t.ui.position[k[i]] && t.ui.position[k[i]][s](I, {
                        targetWidth: p,
                        targetHeight: g,
                        elemWidth: u,
                        elemHeight: d,
                        collisionPosition: n,
                        collisionWidth: x,
                        collisionHeight: C,
                        offset: [a[0] + P[0], a[1] + P[1]],
                        my: e.my,
                        at: e.at,
                        within: y,
                        elem: c
                    })
                }), e.using && (h = function (t) {
                    var i = m.left - I.left, s = i + p - u, n = m.top - I.top, a = n + g - d, l = {
                        target: {
                            element: b,
                            left: m.left,
                            top: m.top,
                            width: p,
                            height: g
                        },
                        element: {element: c, left: I.left, top: I.top, width: u, height: d},
                        horizontal: 0 > s ? "left" : i > 0 ? "right" : "center",
                        vertical: 0 > a ? "top" : n > 0 ? "bottom" : "middle"
                    };
                    u > p && p > r(i + s) && (l.horizontal = "center"), d > g && g > r(n + a) && (l.vertical = "middle"), l.important = o(r(i), r(s)) > o(r(n), r(a)) ? "horizontal" : "vertical", e.using.call(this, t, l)
                }), c.offset(t.extend(I, {using: h}))
            })
        }, t.ui.position = {
            fit: {
                left: function (t, e) {
                    var i, s = e.within, n = s.isWindow ? s.scrollLeft : s.offset.left, a = s.width, r = t.left - e.collisionPosition.marginLeft, l = n - r, h = r + e.collisionWidth - a - n;
                    e.collisionWidth > a ? l > 0 && 0 >= h ? (i = t.left + l + e.collisionWidth - a - n, t.left += l - i) : t.left = h > 0 && 0 >= l ? n : l > h ? n + a - e.collisionWidth : n : l > 0 ? t.left += l : h > 0 ? t.left -= h : t.left = o(t.left - r, t.left)
                }, top: function (t, e) {
                    var i, s = e.within, n = s.isWindow ? s.scrollTop : s.offset.top, a = e.within.height, r = t.top - e.collisionPosition.marginTop, l = n - r, h = r + e.collisionHeight - a - n;
                    e.collisionHeight > a ? l > 0 && 0 >= h ? (i = t.top + l + e.collisionHeight - a - n, t.top += l - i) : t.top = h > 0 && 0 >= l ? n : l > h ? n + a - e.collisionHeight : n : l > 0 ? t.top += l : h > 0 ? t.top -= h : t.top = o(t.top - r, t.top)
                }
            }, flip: {
                left: function (t, e) {
                    var i, s, n = e.within, a = n.offset.left + n.scrollLeft, o = n.width, l = n.isWindow ? n.scrollLeft : n.offset.left, h = t.left - e.collisionPosition.marginLeft, c = h - l, u = h + e.collisionWidth - o - l, d = "left" === e.my[0] ? -e.elemWidth : "right" === e.my[0] ? e.elemWidth : 0, p = "left" === e.at[0] ? e.targetWidth : "right" === e.at[0] ? -e.targetWidth : 0, f = -2 * e.offset[0];
                    0 > c ? (i = t.left + d + p + f + e.collisionWidth - o - a, (0 > i || r(c) > i) && (t.left += d + p + f)) : u > 0 && (s = t.left - e.collisionPosition.marginLeft + d + p + f - l, (s > 0 || u > r(s)) && (t.left += d + p + f))
                }, top: function (t, e) {
                    var i, s, n = e.within, a = n.offset.top + n.scrollTop, o = n.height, l = n.isWindow ? n.scrollTop : n.offset.top, h = t.top - e.collisionPosition.marginTop, c = h - l, u = h + e.collisionHeight - o - l, d = "top" === e.my[1], p = d ? -e.elemHeight : "bottom" === e.my[1] ? e.elemHeight : 0, f = "top" === e.at[1] ? e.targetHeight : "bottom" === e.at[1] ? -e.targetHeight : 0, g = -2 * e.offset[1];
                    0 > c ? (s = t.top + p + f + g + e.collisionHeight - o - a, t.top + p + f + g > c && (0 > s || r(c) > s) && (t.top += p + f + g)) : u > 0 && (i = t.top - e.collisionPosition.marginTop + p + f + g - l, t.top + p + f + g > u && (i > 0 || u > r(i)) && (t.top += p + f + g))
                }
            }, flipfit: {
                left: function () {
                    t.ui.position.flip.left.apply(this, arguments), t.ui.position.fit.left.apply(this, arguments)
                }, top: function () {
                    t.ui.position.flip.top.apply(this, arguments), t.ui.position.fit.top.apply(this, arguments)
                }
            }
        }, function () {
            var e, i, s, n, a, o = document.getElementsByTagName("body")[0], r = document.createElement("div");
            e = document.createElement(o ? "div" : "body"), s = {
                visibility: "hidden",
                width: 0,
                height: 0,
                border: 0,
                margin: 0,
                background: "none"
            }, o && t.extend(s, {position: "absolute", left: "-1000px", top: "-1000px"});
            for (a in s)e.style[a] = s[a];
            e.appendChild(r), i = o || document.documentElement, i.insertBefore(e, i.firstChild), r.style.cssText = "position: absolute; left: 10.7432222px;", n = t(r).offset().left, t.support.offsetFractions = n > 10 && 11 > n, e.innerHTML = "", i.removeChild(e)
        }()
    }(jQuery), function (e) {
        var t = 0, i = {}, a = {};
        i.height = i.paddingTop = i.paddingBottom = i.borderTopWidth = i.borderBottomWidth = "hide", a.height = a.paddingTop = a.paddingBottom = a.borderTopWidth = a.borderBottomWidth = "show", e.widget("ui.accordion", {
            version: "1.10.4",
            options: {
                active: 0,
                animate: {},
                collapsible: !1,
                event: "click",
                header: "> li > :first-child,> :not(li):even",
                heightStyle: "auto",
                icons: {activeHeader: "ui-icon-triangle-1-s", header: "ui-icon-triangle-1-e"},
                activate: null,
                beforeActivate: null
            },
            _create: function () {
                var t = this.options;
                this.prevShow = this.prevHide = e(), this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role", "tablist"), t.collapsible || t.active !== !1 && null != t.active || (t.active = 0), this._processPanels(), 0 > t.active && (t.active += this.headers.length), this._refresh()
            },
            _getCreateEventData: function () {
                return {
                    header: this.active,
                    panel: this.active.length ? this.active.next() : e(),
                    content: this.active.length ? this.active.next() : e()
                }
            },
            _createIcons: function () {
                var t = this.options.icons;
                t && (e("<span>").addClass("ui-accordion-header-icon ui-icon " + t.header).prependTo(this.headers), this.active.children(".ui-accordion-header-icon").removeClass(t.header).addClass(t.activeHeader), this.headers.addClass("ui-accordion-icons"))
            },
            _destroyIcons: function () {
                this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()
            },
            _destroy: function () {
                var e;
                this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"), this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-helper-reset ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").each(function () {
                    /^ui-accordion/.test(this.id) && this.removeAttribute("id")
                }), this._destroyIcons(), e = this.headers.next().css("display", "").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").each(function () {
                    /^ui-accordion/.test(this.id) && this.removeAttribute("id")
                }), "content" !== this.options.heightStyle && e.css("height", "")
            },
            _setOption: function (e, t) {
                return "active" === e ? void this._activate(t) : ("event" === e && (this.options.event && this._off(this.headers, this.options.event), this._setupEvents(t)), this._super(e, t), "collapsible" !== e || t || this.options.active !== !1 || this._activate(0), "icons" === e && (this._destroyIcons(), t && this._createIcons()), void("disabled" === e && this.headers.add(this.headers.next()).toggleClass("ui-state-disabled", !!t)))
            },
            _keydown: function (t) {
                if (!t.altKey && !t.ctrlKey) {
                    var i = e.ui.keyCode, a = this.headers.length, s = this.headers.index(t.target), n = !1;
                    switch (t.keyCode) {
                        case i.RIGHT:
                        case i.DOWN:
                            n = this.headers[(s + 1) % a];
                            break;
                        case i.LEFT:
                        case i.UP:
                            n = this.headers[(s - 1 + a) % a];
                            break;
                        case i.SPACE:
                        case i.ENTER:
                            this._eventHandler(t);
                            break;
                        case i.HOME:
                            n = this.headers[0];
                            break;
                        case i.END:
                            n = this.headers[a - 1]
                    }
                    n && (e(t.target).attr("tabIndex", -1), e(n).attr("tabIndex", 0), n.focus(), t.preventDefault())
                }
            },
            _panelKeyDown: function (t) {
                t.keyCode === e.ui.keyCode.UP && t.ctrlKey && e(t.currentTarget).prev().focus()
            },
            refresh: function () {
                var t = this.options;
                this._processPanels(), t.active === !1 && t.collapsible === !0 || !this.headers.length ? (t.active = !1, this.active = e()) : t.active === !1 ? this._activate(0) : this.active.length && !e.contains(this.element[0], this.active[0]) ? this.headers.length === this.headers.find(".ui-state-disabled").length ? (t.active = !1, this.active = e()) : this._activate(Math.max(0, t.active - 1)) : t.active = this.headers.index(this.active), this._destroyIcons(), this._refresh()
            },
            _processPanels: function () {
                this.headers = this.element.find(this.options.header).addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-all"), this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide()
            },
            _refresh: function () {
                var i, a = this.options, s = a.heightStyle, n = this.element.parent(), r = this.accordionId = "ui-accordion-" + (this.element.attr("id") || ++t);
                this.active = this._findActive(a.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"), this.active.next().addClass("ui-accordion-content-active").show(), this.headers.attr("role", "tab").each(function (t) {
                    var i = e(this), a = i.attr("id"), s = i.next(), n = s.attr("id");
                    a || (a = r + "-header-" + t, i.attr("id", a)), n || (n = r + "-panel-" + t, s.attr("id", n)), i.attr("aria-controls", n), s.attr("aria-labelledby", a)
                }).next().attr("role", "tabpanel"), this.headers.not(this.active).attr({
                    "aria-selected": "false",
                    "aria-expanded": "false",
                    tabIndex: -1
                }).next().attr({"aria-hidden": "true"}).hide(), this.active.length ? this.active.attr({
                    "aria-selected": "true",
                    "aria-expanded": "true",
                    tabIndex: 0
                }).next().attr({"aria-hidden": "false"}) : this.headers.eq(0).attr("tabIndex", 0), this._createIcons(), this._setupEvents(a.event), "fill" === s ? (i = n.height(), this.element.siblings(":visible").each(function () {
                    var t = e(this), a = t.css("position");
                    "absolute" !== a && "fixed" !== a && (i -= t.outerHeight(!0))
                }), this.headers.each(function () {
                    i -= e(this).outerHeight(!0)
                }), this.headers.next().each(function () {
                    e(this).height(Math.max(0, i - e(this).innerHeight() + e(this).height()))
                }).css("overflow", "auto")) : "auto" === s && (i = 0, this.headers.next().each(function () {
                    i = Math.max(i, e(this).css("height", "").height())
                }).height(i))
            },
            _activate: function (t) {
                var i = this._findActive(t)[0];
                i !== this.active[0] && (i = i || this.active[0], this._eventHandler({
                    target: i,
                    currentTarget: i,
                    preventDefault: e.noop
                }))
            },
            _findActive: function (t) {
                return "number" == typeof t ? this.headers.eq(t) : e()
            },
            _setupEvents: function (t) {
                var i = {keydown: "_keydown"};
                t && e.each(t.split(" "), function (e, t) {
                    i[t] = "_eventHandler"
                }), this._off(this.headers.add(this.headers.next())), this._on(this.headers, i), this._on(this.headers.next(), {keydown: "_panelKeyDown"}), this._hoverable(this.headers), this._focusable(this.headers)
            },
            _eventHandler: function (t) {
                var i = this.options, a = this.active, s = e(t.currentTarget), n = s[0] === a[0], r = n && i.collapsible, o = r ? e() : s.next(), h = a.next(), d = {
                    oldHeader: a,
                    oldPanel: h,
                    newHeader: r ? e() : s,
                    newPanel: o
                };
                t.preventDefault(), n && !i.collapsible || this._trigger("beforeActivate", t, d) === !1 || (i.active = r ? !1 : this.headers.index(s), this.active = n ? e() : s, this._toggle(d), a.removeClass("ui-accordion-header-active ui-state-active"), i.icons && a.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header), n || (s.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"), i.icons && s.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader), s.next().addClass("ui-accordion-content-active")))
            },
            _toggle: function (t) {
                var i = t.newPanel, a = this.prevShow.length ? this.prevShow : t.oldPanel;
                this.prevShow.add(this.prevHide).stop(!0, !0), this.prevShow = i, this.prevHide = a, this.options.animate ? this._animate(i, a, t) : (a.hide(), i.show(), this._toggleComplete(t)), a.attr({"aria-hidden": "true"}), a.prev().attr("aria-selected", "false"), i.length && a.length ? a.prev().attr({
                    tabIndex: -1,
                    "aria-expanded": "false"
                }) : i.length && this.headers.filter(function () {
                    return 0 === e(this).attr("tabIndex")
                }).attr("tabIndex", -1), i.attr("aria-hidden", "false").prev().attr({
                    "aria-selected": "true",
                    tabIndex: 0,
                    "aria-expanded": "true"
                })
            },
            _animate: function (e, t, s) {
                var n, r, o, h = this, d = 0, c = e.length && (!t.length || e.index() < t.index()), l = this.options.animate || {}, u = c && l.down || l, g = function () {
                    h._toggleComplete(s)
                };
                return "number" == typeof u && (o = u), "string" == typeof u && (r = u), r = r || u.easing || l.easing, o = o || u.duration || l.duration, t.length ? e.length ? (n = e.show().outerHeight(), t.animate(i, {
                    duration: o,
                    easing: r,
                    step: function (e, t) {
                        t.now = Math.round(e)
                    }
                }), void e.hide().animate(a, {
                    duration: o, easing: r, complete: g, step: function (e, i) {
                        i.now = Math.round(e), "height" !== i.prop ? d += i.now : "content" !== h.options.heightStyle && (i.now = Math.round(n - t.outerHeight() - d), d = 0)
                    }
                })) : t.animate(i, o, r, g) : e.animate(a, o, r, g)
            },
            _toggleComplete: function (e) {
                var t = e.oldPanel;
                t.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"), t.length && (t.parent()[0].className = t.parent()[0].className), this._trigger("activate", null, e)
            }
        })
    }(jQuery), function (e) {
        e.widget("ui.autocomplete", {
            version: "1.10.4",
            defaultElement: "<input>",
            options: {
                appendTo: null,
                autoFocus: !1,
                delay: 300,
                minLength: 1,
                position: {my: "left top", at: "left bottom", collision: "none"},
                source: null,
                change: null,
                close: null,
                focus: null,
                open: null,
                response: null,
                search: null,
                select: null
            },
            requestIndex: 0,
            pending: 0,
            _create: function () {
                var t, i, s, n = this.element[0].nodeName.toLowerCase(), a = "textarea" === n, o = "input" === n;
                this.isMultiLine = a ? !0 : o ? !1 : this.element.prop("isContentEditable"), this.valueMethod = this.element[a || o ? "val" : "text"], this.isNewMenu = !0, this.element.addClass("ui-autocomplete-input").attr("autocomplete", "off"), this._on(this.element, {
                    keydown: function (n) {
                        if (this.element.prop("readOnly"))return t = !0, s = !0, void(i = !0);
                        t = !1, s = !1, i = !1;
                        var a = e.ui.keyCode;
                        switch (n.keyCode) {
                            case a.PAGE_UP:
                                t = !0, this._move("previousPage", n);
                                break;
                            case a.PAGE_DOWN:
                                t = !0, this._move("nextPage", n);
                                break;
                            case a.UP:
                                t = !0, this._keyEvent("previous", n);
                                break;
                            case a.DOWN:
                                t = !0, this._keyEvent("next", n);
                                break;
                            case a.ENTER:
                            case a.NUMPAD_ENTER:
                                this.menu.active && (t = !0, n.preventDefault(), this.menu.select(n));
                                break;
                            case a.TAB:
                                this.menu.active && this.menu.select(n);
                                break;
                            case a.ESCAPE:
                                this.menu.element.is(":visible") && (this._value(this.term), this.close(n), n.preventDefault());
                                break;
                            default:
                                i = !0, this._searchTimeout(n)
                        }
                    }, keypress: function (s) {
                        if (t)return t = !1, void((!this.isMultiLine || this.menu.element.is(":visible")) && s.preventDefault());
                        if (!i) {
                            var n = e.ui.keyCode;
                            switch (s.keyCode) {
                                case n.PAGE_UP:
                                    this._move("previousPage", s);
                                    break;
                                case n.PAGE_DOWN:
                                    this._move("nextPage", s);
                                    break;
                                case n.UP:
                                    this._keyEvent("previous", s);
                                    break;
                                case n.DOWN:
                                    this._keyEvent("next", s)
                            }
                        }
                    }, input: function (e) {
                        return s ? (s = !1, void e.preventDefault()) : void this._searchTimeout(e)
                    }, focus: function () {
                        this.selectedItem = null, this.previous = this._value()
                    }, blur: function (e) {
                        return this.cancelBlur ? void delete this.cancelBlur : (clearTimeout(this.searching), this.close(e), void this._change(e))
                    }
                }), this._initSource(), this.menu = e("<ul>").addClass("ui-autocomplete ui-front").appendTo(this._appendTo()).menu({role: null}).hide().data("ui-menu"), this._on(this.menu.element, {
                    mousedown: function (t) {
                        t.preventDefault(), this.cancelBlur = !0, this._delay(function () {
                            delete this.cancelBlur
                        });
                        var i = this.menu.element[0];
                        e(t.target).closest(".ui-menu-item").length || this._delay(function () {
                            var t = this;
                            this.document.one("mousedown", function (s) {
                                s.target === t.element[0] || s.target === i || e.contains(i, s.target) || t.close()
                            })
                        })
                    }, menufocus: function (t, i) {
                        if (this.isNewMenu && (this.isNewMenu = !1, t.originalEvent && /^mouse/.test(t.originalEvent.type)))return this.menu.blur(), void this.document.one("mousemove", function () {
                            e(t.target).trigger(t.originalEvent)
                        });
                        var s = i.item.data("ui-autocomplete-item");
                        !1 !== this._trigger("focus", t, {item: s}) ? t.originalEvent && /^key/.test(t.originalEvent.type) && this._value(s.value) : this.liveRegion.text(s.value)
                    }, menuselect: function (e, t) {
                        var i = t.item.data("ui-autocomplete-item"), s = this.previous;
                        this.element[0] !== this.document[0].activeElement && (this.element.focus(), this.previous = s, this._delay(function () {
                            this.previous = s, this.selectedItem = i
                        })), !1 !== this._trigger("select", e, {item: i}) && this._value(i.value), this.term = this._value(), this.close(e), this.selectedItem = i
                    }
                }), this.liveRegion = e("<span>", {
                    role: "status",
                    "aria-live": "polite"
                }).addClass("ui-helper-hidden-accessible").insertBefore(this.element), this._on(this.window, {
                    beforeunload: function () {
                        this.element.removeAttr("autocomplete")
                    }
                })
            },
            _destroy: function () {
                clearTimeout(this.searching), this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete"), this.menu.element.remove(), this.liveRegion.remove()
            },
            _setOption: function (e, t) {
                this._super(e, t), "source" === e && this._initSource(), "appendTo" === e && this.menu.element.appendTo(this._appendTo()), "disabled" === e && t && this.xhr && this.xhr.abort()
            },
            _appendTo: function () {
                var t = this.options.appendTo;
                return t && (t = t.jquery || t.nodeType ? e(t) : this.document.find(t).eq(0)), t || (t = this.element.closest(".ui-front")), t.length || (t = this.document[0].body), t
            },
            _initSource: function () {
                var t, i, s = this;
                e.isArray(this.options.source) ? (t = this.options.source, this.source = function (i, s) {
                    s(e.ui.autocomplete.filter(t, i.term))
                }) : "string" == typeof this.options.source ? (i = this.options.source, this.source = function (t, n) {
                    s.xhr && s.xhr.abort(), s.xhr = e.ajax({
                        url: i, data: t, dataType: "json", success: function (e) {
                            n(e)
                        }, error: function () {
                            n([])
                        }
                    })
                }) : this.source = this.options.source
            },
            _searchTimeout: function (e) {
                clearTimeout(this.searching), this.searching = this._delay(function () {
                    this.term !== this._value() && (this.selectedItem = null, this.search(null, e))
                }, this.options.delay)
            },
            search: function (e, t) {
                return e = null != e ? e : this._value(), this.term = this._value(), e.length < this.options.minLength ? this.close(t) : this._trigger("search", t) !== !1 ? this._search(e) : void 0
            },
            _search: function (e) {
                this.pending++, this.element.addClass("ui-autocomplete-loading"), this.cancelSearch = !1, this.source({term: e}, this._response())
            },
            _response: function () {
                var t = ++this.requestIndex;
                return e.proxy(function (e) {
                    t === this.requestIndex && this.__response(e), this.pending--, this.pending || this.element.removeClass("ui-autocomplete-loading")
                }, this)
            },
            __response: function (e) {
                e && (e = this._normalize(e)), this._trigger("response", null, {content: e}), !this.options.disabled && e && e.length && !this.cancelSearch ? (this._suggest(e), this._trigger("open")) : this._close()
            },
            close: function (e) {
                this.cancelSearch = !0, this._close(e)
            },
            _close: function (e) {
                this.menu.element.is(":visible") && (this.menu.element.hide(), this.menu.blur(), this.isNewMenu = !0, this._trigger("close", e))
            },
            _change: function (e) {
                this.previous !== this._value() && this._trigger("change", e, {item: this.selectedItem})
            },
            _normalize: function (t) {
                return t.length && t[0].label && t[0].value ? t : e.map(t, function (t) {
                    return "string" == typeof t ? {label: t, value: t} : e.extend({
                        label: t.label || t.value,
                        value: t.value || t.label
                    }, t)
                })
            },
            _suggest: function (t) {
                var i = this.menu.element.empty();
                this._renderMenu(i, t), this.isNewMenu = !0, this.menu.refresh(), i.show(), this._resizeMenu(), i.position(e.extend({of: this.element}, this.options.position)), this.options.autoFocus && this.menu.next()
            },
            _resizeMenu: function () {
                var e = this.menu.element;
                e.outerWidth(Math.max(e.width("").outerWidth() + 1, this.element.outerWidth()))
            },
            _renderMenu: function (t, i) {
                var s = this;
                e.each(i, function (e, i) {
                    s._renderItemData(t, i)
                })
            },
            _renderItemData: function (e, t) {
                return this._renderItem(e, t).data("ui-autocomplete-item", t)
            },
            _renderItem: function (t, i) {
                return e("<li>").append(e("<a>").text(i.label)).appendTo(t)
            },
            _move: function (e, t) {
                return this.menu.element.is(":visible") ? this.menu.isFirstItem() && /^previous/.test(e) || this.menu.isLastItem() && /^next/.test(e) ? (this._value(this.term), void this.menu.blur()) : void this.menu[e](t) : void this.search(null, t)
            },
            widget: function () {
                return this.menu.element
            },
            _value: function () {
                return this.valueMethod.apply(this.element, arguments)
            },
            _keyEvent: function (e, t) {
                (!this.isMultiLine || this.menu.element.is(":visible")) && (this._move(e, t), t.preventDefault())
            }
        }), e.extend(e.ui.autocomplete, {
            escapeRegex: function (e) {
                return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
            }, filter: function (t, i) {
                var s = RegExp(e.ui.autocomplete.escapeRegex(i), "i");
                return e.grep(t, function (e) {
                    return s.test(e.label || e.value || e)
                })
            }
        }), e.widget("ui.autocomplete", e.ui.autocomplete, {
            options: {
                messages: {
                    noResults: "No search results.",
                    results: function (e) {
                        return e + (e > 1 ? " results are" : " result is") + " available, use up and down arrow keys to navigate."
                    }
                }
            }, __response: function (e) {
                var t;
                this._superApply(arguments), this.options.disabled || this.cancelSearch || (t = e && e.length ? this.options.messages.results(e.length) : this.options.messages.noResults, this.liveRegion.text(t))
            }
        })
    }(jQuery), function (e) {
        var t, i = "ui-button ui-widget ui-state-default ui-corner-all", n = "ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only", s = function () {
            var t = e(this);
            setTimeout(function () {
                t.find(":ui-button").button("refresh")
            }, 1)
        }, a = function (t) {
            var i = t.name, n = t.form, s = e([]);
            return i && (i = i.replace(/'/g, "\\'"), s = n ? e(n).find("[name='" + i + "']") : e("[name='" + i + "']", t.ownerDocument).filter(function () {
                return !this.form
            })), s
        };
        e.widget("ui.button", {
            version: "1.10.4",
            defaultElement: "<button>",
            options: {disabled: null, text: !0, label: null, icons: {primary: null, secondary: null}},
            _create: function () {
                this.element.closest("form").unbind("reset" + this.eventNamespace).bind("reset" + this.eventNamespace, s), "boolean" != typeof this.options.disabled ? this.options.disabled = !!this.element.prop("disabled") : this.element.prop("disabled", this.options.disabled), this._determineButtonType(), this.hasTitle = !!this.buttonElement.attr("title");
                var n = this, o = this.options, r = "checkbox" === this.type || "radio" === this.type, h = r ? "" : "ui-state-active";
                null === o.label && (o.label = "input" === this.type ? this.buttonElement.val() : this.buttonElement.html()), this._hoverable(this.buttonElement), this.buttonElement.addClass(i).attr("role", "button").bind("mouseenter" + this.eventNamespace, function () {
                    o.disabled || this === t && e(this).addClass("ui-state-active")
                }).bind("mouseleave" + this.eventNamespace, function () {
                    o.disabled || e(this).removeClass(h)
                }).bind("click" + this.eventNamespace, function (e) {
                    o.disabled && (e.preventDefault(), e.stopImmediatePropagation())
                }), this._on({
                    focus: function () {
                        this.buttonElement.addClass("ui-state-focus")
                    }, blur: function () {
                        this.buttonElement.removeClass("ui-state-focus")
                    }
                }), r && this.element.bind("change" + this.eventNamespace, function () {
                    n.refresh()
                }), "checkbox" === this.type ? this.buttonElement.bind("click" + this.eventNamespace, function () {
                    return o.disabled ? !1 : void 0
                }) : "radio" === this.type ? this.buttonElement.bind("click" + this.eventNamespace, function () {
                    if (o.disabled)return !1;
                    e(this).addClass("ui-state-active"), n.buttonElement.attr("aria-pressed", "true");
                    var t = n.element[0];
                    a(t).not(t).map(function () {
                        return e(this).button("widget")[0]
                    }).removeClass("ui-state-active").attr("aria-pressed", "false")
                }) : (this.buttonElement.bind("mousedown" + this.eventNamespace, function () {
                    return o.disabled ? !1 : (e(this).addClass("ui-state-active"), t = this, void n.document.one("mouseup", function () {
                        t = null
                    }))
                }).bind("mouseup" + this.eventNamespace, function () {
                    return o.disabled ? !1 : void e(this).removeClass("ui-state-active")
                }).bind("keydown" + this.eventNamespace, function (t) {
                    return o.disabled ? !1 : void((t.keyCode === e.ui.keyCode.SPACE || t.keyCode === e.ui.keyCode.ENTER) && e(this).addClass("ui-state-active"))
                }).bind("keyup" + this.eventNamespace + " blur" + this.eventNamespace, function () {
                    e(this).removeClass("ui-state-active")
                }), this.buttonElement.is("a") && this.buttonElement.keyup(function (t) {
                    t.keyCode === e.ui.keyCode.SPACE && e(this).click()
                })), this._setOption("disabled", o.disabled), this._resetButton()
            },
            _determineButtonType: function () {
                var e, t, i;
                this.type = this.element.is("[type=checkbox]") ? "checkbox" : this.element.is("[type=radio]") ? "radio" : this.element.is("input") ? "input" : "button", "checkbox" === this.type || "radio" === this.type ? (e = this.element.parents().last(), t = "label[for='" + this.element.attr("id") + "']", this.buttonElement = e.find(t), this.buttonElement.length || (e = e.length ? e.siblings() : this.element.siblings(), this.buttonElement = e.filter(t), this.buttonElement.length || (this.buttonElement = e.find(t))), this.element.addClass("ui-helper-hidden-accessible"), i = this.element.is(":checked"), i && this.buttonElement.addClass("ui-state-active"), this.buttonElement.prop("aria-pressed", i)) : this.buttonElement = this.element
            },
            widget: function () {
                return this.buttonElement
            },
            _destroy: function () {
                this.element.removeClass("ui-helper-hidden-accessible"), this.buttonElement.removeClass(i + " ui-state-active " + n).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html()), this.hasTitle || this.buttonElement.removeAttr("title")
            },
            _setOption: function (e, t) {
                return this._super(e, t), "disabled" === e ? (this.element.prop("disabled", !!t), void(t && this.buttonElement.removeClass("ui-state-focus"))) : void this._resetButton()
            },
            refresh: function () {
                var t = this.element.is("input, button") ? this.element.is(":disabled") : this.element.hasClass("ui-button-disabled");
                t !== this.options.disabled && this._setOption("disabled", t), "radio" === this.type ? a(this.element[0]).each(function () {
                    e(this).is(":checked") ? e(this).button("widget").addClass("ui-state-active").attr("aria-pressed", "true") : e(this).button("widget").removeClass("ui-state-active").attr("aria-pressed", "false")
                }) : "checkbox" === this.type && (this.element.is(":checked") ? this.buttonElement.addClass("ui-state-active").attr("aria-pressed", "true") : this.buttonElement.removeClass("ui-state-active").attr("aria-pressed", "false"))
            },
            _resetButton: function () {
                if ("input" === this.type)return void(this.options.label && this.element.val(this.options.label));
                var t = this.buttonElement.removeClass(n), i = e("<span></span>", this.document[0]).addClass("ui-button-text").html(this.options.label).appendTo(t.empty()).text(), s = this.options.icons, a = s.primary && s.secondary, o = [];
                s.primary || s.secondary ? (this.options.text && o.push("ui-button-text-icon" + (a ? "s" : s.primary ? "-primary" : "-secondary")), s.primary && t.prepend("<span class='ui-button-icon-primary ui-icon " + s.primary + "'></span>"), s.secondary && t.append("<span class='ui-button-icon-secondary ui-icon " + s.secondary + "'></span>"), this.options.text || (o.push(a ? "ui-button-icons-only" : "ui-button-icon-only"), this.hasTitle || t.attr("title", e.trim(i)))) : o.push("ui-button-text-only"), t.addClass(o.join(" "))
            }
        }), e.widget("ui.buttonset", {
            version: "1.10.4",
            options: {items: "button, input[type=button], input[type=submit], input[type=reset], input[type=checkbox], input[type=radio], a, :data(ui-button)"},
            _create: function () {
                this.element.addClass("ui-buttonset")
            },
            _init: function () {
                this.refresh()
            },
            _setOption: function (e, t) {
                "disabled" === e && this.buttons.button("option", e, t), this._super(e, t)
            },
            refresh: function () {
                var t = "rtl" === this.element.css("direction");
                this.buttons = this.element.find(this.options.items).filter(":ui-button").button("refresh").end().not(":ui-button").button().end().map(function () {
                    return e(this).button("widget")[0]
                }).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(t ? "ui-corner-right" : "ui-corner-left").end().filter(":last").addClass(t ? "ui-corner-left" : "ui-corner-right").end().end()
            },
            _destroy: function () {
                this.element.removeClass("ui-buttonset"), this.buttons.map(function () {
                    return e(this).button("widget")[0]
                }).removeClass("ui-corner-left ui-corner-right").end().button("destroy")
            }
        })
    }(jQuery), function (e, t) {
        function i() {
            this._curInst = null, this._keyEvent = !1, this._disabledInputs = [], this._datepickerShowing = !1, this._inDialog = !1, this._mainDivId = "ui-datepicker-div", this._inlineClass = "ui-datepicker-inline", this._appendClass = "ui-datepicker-append", this._triggerClass = "ui-datepicker-trigger", this._dialogClass = "ui-datepicker-dialog", this._disableClass = "ui-datepicker-disabled", this._unselectableClass = "ui-datepicker-unselectable", this._currentClass = "ui-datepicker-current-day", this._dayOverClass = "ui-datepicker-days-cell-over", this.regional = [], this.regional[""] = {
                closeText: "Done",
                prevText: "Prev",
                nextText: "Next",
                currentText: "Today",
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                weekHeader: "Wk",
                dateFormat: "mm/dd/yy",
                firstDay: 0,
                isRTL: !1,
                showMonthAfterYear: !1,
                yearSuffix: ""
            }, this._defaults = {
                showOn: "focus",
                showAnim: "fadeIn",
                showOptions: {},
                defaultDate: null,
                appendText: "",
                buttonText: "...",
                buttonImage: "",
                buttonImageOnly: !1,
                hideIfNoPrevNext: !1,
                navigationAsDateFormat: !1,
                gotoCurrent: !1,
                changeMonth: !1,
                changeYear: !1,
                yearRange: "c-10:c+10",
                showOtherMonths: !1,
                selectOtherMonths: !1,
                showWeek: !1,
                calculateWeek: this.iso8601Week,
                shortYearCutoff: "+10",
                minDate: null,
                maxDate: null,
                duration: "fast",
                beforeShowDay: null,
                beforeShow: null,
                onSelect: null,
                onChangeMonthYear: null,
                onClose: null,
                numberOfMonths: 1,
                showCurrentAtPos: 0,
                stepMonths: 1,
                stepBigMonths: 12,
                altField: "",
                altFormat: "",
                constrainInput: !0,
                showButtonPanel: !1,
                autoSize: !1,
                disabled: !1
            }, e.extend(this._defaults, this.regional[""]), this.dpDiv = a(e("<div id='" + this._mainDivId + "' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))
        }

        function a(t) {
            var i = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";
            return t.delegate(i, "mouseout", function () {
                e(this).removeClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && e(this).removeClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && e(this).removeClass("ui-datepicker-next-hover")
            }).delegate(i, "mouseover", function () {
                e.datepicker._isDisabledDatepicker(n.inline ? t.parent()[0] : n.input[0]) || (e(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"), e(this).addClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && e(this).addClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && e(this).addClass("ui-datepicker-next-hover"))
            })
        }

        function s(t, i) {
            e.extend(t, i);
            for (var a in i)null == i[a] && (t[a] = i[a]);
            return t
        }

        e.extend(e.ui, {datepicker: {version: "1.10.4"}});
        var n, r = "datepicker";
        e.extend(i.prototype, {
            markerClassName: "hasDatepicker",
            maxRows: 4,
            _widgetDatepicker: function () {
                return this.dpDiv
            },
            setDefaults: function (e) {
                return s(this._defaults, e || {}), this
            },
            _attachDatepicker: function (t, i) {
                var a, s, n;
                a = t.nodeName.toLowerCase(), s = "div" === a || "span" === a, t.id || (this.uuid += 1, t.id = "dp" + this.uuid), n = this._newInst(e(t), s), n.settings = e.extend({}, i || {}), "input" === a ? this._connectDatepicker(t, n) : s && this._inlineDatepicker(t, n)
            },
            _newInst: function (t, i) {
                var s = t[0].id.replace(/([^A-Za-z0-9_\-])/g, "\\\\$1");
                return {
                    id: s,
                    input: t,
                    selectedDay: 0,
                    selectedMonth: 0,
                    selectedYear: 0,
                    drawMonth: 0,
                    drawYear: 0,
                    inline: i,
                    dpDiv: i ? a(e("<div class='" + this._inlineClass + " ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) : this.dpDiv
                }
            },
            _connectDatepicker: function (t, i) {
                var a = e(t);
                i.append = e([]), i.trigger = e([]), a.hasClass(this.markerClassName) || (this._attachments(a, i), a.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp), this._autoSize(i), e.data(t, r, i), i.settings.disabled && this._disableDatepicker(t))
            },
            _attachments: function (t, i) {
                var a, s, n, r = this._get(i, "appendText"), o = this._get(i, "isRTL");
                i.append && i.append.remove(), r && (i.append = e("<span class='" + this._appendClass + "'>" + r + "</span>"), t[o ? "before" : "after"](i.append)), t.unbind("focus", this._showDatepicker), i.trigger && i.trigger.remove(), a = this._get(i, "showOn"), ("focus" === a || "both" === a) && t.focus(this._showDatepicker), ("button" === a || "both" === a) && (s = this._get(i, "buttonText"), n = this._get(i, "buttonImage"), i.trigger = e(this._get(i, "buttonImageOnly") ? e("<img/>").addClass(this._triggerClass).attr({
                    src: n,
                    alt: s,
                    title: s
                }) : e("<button type='button'></button>").addClass(this._triggerClass).html(n ? e("<img/>").attr({
                    src: n,
                    alt: s,
                    title: s
                }) : s)), t[o ? "before" : "after"](i.trigger), i.trigger.click(function () {
                    return e.datepicker._datepickerShowing && e.datepicker._lastInput === t[0] ? e.datepicker._hideDatepicker() : e.datepicker._datepickerShowing && e.datepicker._lastInput !== t[0] ? (e.datepicker._hideDatepicker(), e.datepicker._showDatepicker(t[0])) : e.datepicker._showDatepicker(t[0]), !1
                }))
            },
            _autoSize: function (e) {
                if (this._get(e, "autoSize") && !e.inline) {
                    var t, i, a, s, n = new Date(2009, 11, 20), r = this._get(e, "dateFormat");
                    r.match(/[DM]/) && (t = function (e) {
                        for (i = 0, a = 0, s = 0; e.length > s; s++)e[s].length > i && (i = e[s].length, a = s);
                        return a
                    }, n.setMonth(t(this._get(e, r.match(/MM/) ? "monthNames" : "monthNamesShort"))), n.setDate(t(this._get(e, r.match(/DD/) ? "dayNames" : "dayNamesShort")) + 20 - n.getDay())), e.input.attr("size", this._formatDate(e, n).length)
                }
            },
            _inlineDatepicker: function (t, i) {
                var a = e(t);
                a.hasClass(this.markerClassName) || (a.addClass(this.markerClassName).append(i.dpDiv), e.data(t, r, i), this._setDate(i, this._getDefaultDate(i), !0), this._updateDatepicker(i), this._updateAlternate(i), i.settings.disabled && this._disableDatepicker(t), i.dpDiv.css("display", "block"))
            },
            _dialogDatepicker: function (t, i, a, n, o) {
                var u, h, c, l, d, p = this._dialogInst;
                return p || (this.uuid += 1, u = "dp" + this.uuid, this._dialogInput = e("<input type='text' id='" + u + "' style='position: absolute; top: -100px; width: 0px;'/>"), this._dialogInput.keydown(this._doKeyDown), e("body").append(this._dialogInput), p = this._dialogInst = this._newInst(this._dialogInput, !1), p.settings = {}, e.data(this._dialogInput[0], r, p)), s(p.settings, n || {}), i = i && i.constructor === Date ? this._formatDate(p, i) : i, this._dialogInput.val(i), this._pos = o ? o.length ? o : [o.pageX, o.pageY] : null, this._pos || (h = document.documentElement.clientWidth, c = document.documentElement.clientHeight, l = document.documentElement.scrollLeft || document.body.scrollLeft, d = document.documentElement.scrollTop || document.body.scrollTop, this._pos = [h / 2 - 100 + l, c / 2 - 150 + d]), this._dialogInput.css("left", this._pos[0] + 20 + "px").css("top", this._pos[1] + "px"), p.settings.onSelect = a, this._inDialog = !0, this.dpDiv.addClass(this._dialogClass), this._showDatepicker(this._dialogInput[0]), e.blockUI && e.blockUI(this.dpDiv), e.data(this._dialogInput[0], r, p), this
            },
            _destroyDatepicker: function (t) {
                var i, a = e(t), s = e.data(t, r);
                a.hasClass(this.markerClassName) && (i = t.nodeName.toLowerCase(), e.removeData(t, r), "input" === i ? (s.append.remove(), s.trigger.remove(), a.removeClass(this.markerClassName).unbind("focus", this._showDatepicker).unbind("keydown", this._doKeyDown).unbind("keypress", this._doKeyPress).unbind("keyup", this._doKeyUp)) : ("div" === i || "span" === i) && a.removeClass(this.markerClassName).empty())
            },
            _enableDatepicker: function (t) {
                var i, a, s = e(t), n = e.data(t, r);
                s.hasClass(this.markerClassName) && (i = t.nodeName.toLowerCase(), "input" === i ? (t.disabled = !1, n.trigger.filter("button").each(function () {
                    this.disabled = !1
                }).end().filter("img").css({
                    opacity: "1.0",
                    cursor: ""
                })) : ("div" === i || "span" === i) && (a = s.children("." + this._inlineClass), a.children().removeClass("ui-state-disabled"), a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !1)), this._disabledInputs = e.map(this._disabledInputs, function (e) {
                    return e === t ? null : e
                }))
            },
            _disableDatepicker: function (t) {
                var i, a, s = e(t), n = e.data(t, r);
                s.hasClass(this.markerClassName) && (i = t.nodeName.toLowerCase(), "input" === i ? (t.disabled = !0, n.trigger.filter("button").each(function () {
                    this.disabled = !0
                }).end().filter("img").css({
                    opacity: "0.5",
                    cursor: "default"
                })) : ("div" === i || "span" === i) && (a = s.children("." + this._inlineClass), a.children().addClass("ui-state-disabled"), a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !0)), this._disabledInputs = e.map(this._disabledInputs, function (e) {
                    return e === t ? null : e
                }), this._disabledInputs[this._disabledInputs.length] = t)
            },
            _isDisabledDatepicker: function (e) {
                if (!e)return !1;
                for (var t = 0; this._disabledInputs.length > t; t++)if (this._disabledInputs[t] === e)return !0;
                return !1
            },
            _getInst: function (t) {
                try {
                    return e.data(t, r)
                } catch (i) {
                    throw"Missing instance data for this datepicker"
                }
            },
            _optionDatepicker: function (i, a, n) {
                var r, o, u, h, c = this._getInst(i);
                return 2 === arguments.length && "string" == typeof a ? "defaults" === a ? e.extend({}, e.datepicker._defaults) : c ? "all" === a ? e.extend({}, c.settings) : this._get(c, a) : null : (r = a || {}, "string" == typeof a && (r = {}, r[a] = n), c && (this._curInst === c && this._hideDatepicker(), o = this._getDateDatepicker(i, !0), u = this._getMinMaxDate(c, "min"), h = this._getMinMaxDate(c, "max"), s(c.settings, r), null !== u && r.dateFormat !== t && r.minDate === t && (c.settings.minDate = this._formatDate(c, u)), null !== h && r.dateFormat !== t && r.maxDate === t && (c.settings.maxDate = this._formatDate(c, h)), "disabled"in r && (r.disabled ? this._disableDatepicker(i) : this._enableDatepicker(i)), this._attachments(e(i), c), this._autoSize(c), this._setDate(c, o), this._updateAlternate(c), this._updateDatepicker(c)), t)
            },
            _changeDatepicker: function (e, t, i) {
                this._optionDatepicker(e, t, i)
            },
            _refreshDatepicker: function (e) {
                var t = this._getInst(e);
                t && this._updateDatepicker(t)
            },
            _setDateDatepicker: function (e, t) {
                var i = this._getInst(e);
                i && (this._setDate(i, t), this._updateDatepicker(i), this._updateAlternate(i))
            },
            _getDateDatepicker: function (e, t) {
                var i = this._getInst(e);
                return i && !i.inline && this._setDateFromField(i, t), i ? this._getDate(i) : null
            },
            _doKeyDown: function (t) {
                var i, a, s, n = e.datepicker._getInst(t.target), r = !0, o = n.dpDiv.is(".ui-datepicker-rtl");
                if (n._keyEvent = !0, e.datepicker._datepickerShowing)switch (t.keyCode) {
                    case 9:
                        e.datepicker._hideDatepicker(), r = !1;
                        break;
                    case 13:
                        return s = e("td." + e.datepicker._dayOverClass + ":not(." + e.datepicker._currentClass + ")", n.dpDiv), s[0] && e.datepicker._selectDay(t.target, n.selectedMonth, n.selectedYear, s[0]), i = e.datepicker._get(n, "onSelect"), i ? (a = e.datepicker._formatDate(n), i.apply(n.input ? n.input[0] : null, [a, n])) : e.datepicker._hideDatepicker(), !1;
                    case 27:
                        e.datepicker._hideDatepicker();
                        break;
                    case 33:
                        e.datepicker._adjustDate(t.target, t.ctrlKey ? -e.datepicker._get(n, "stepBigMonths") : -e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 34:
                        e.datepicker._adjustDate(t.target, t.ctrlKey ? +e.datepicker._get(n, "stepBigMonths") : +e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 35:
                        (t.ctrlKey || t.metaKey) && e.datepicker._clearDate(t.target), r = t.ctrlKey || t.metaKey;
                        break;
                    case 36:
                        (t.ctrlKey || t.metaKey) && e.datepicker._gotoToday(t.target), r = t.ctrlKey || t.metaKey;
                        break;
                    case 37:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, o ? 1 : -1, "D"), r = t.ctrlKey || t.metaKey, t.originalEvent.altKey && e.datepicker._adjustDate(t.target, t.ctrlKey ? -e.datepicker._get(n, "stepBigMonths") : -e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 38:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, -7, "D"), r = t.ctrlKey || t.metaKey;
                        break;
                    case 39:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, o ? -1 : 1, "D"), r = t.ctrlKey || t.metaKey, t.originalEvent.altKey && e.datepicker._adjustDate(t.target, t.ctrlKey ? +e.datepicker._get(n, "stepBigMonths") : +e.datepicker._get(n, "stepMonths"), "M");
                        break;
                    case 40:
                        (t.ctrlKey || t.metaKey) && e.datepicker._adjustDate(t.target, 7, "D"), r = t.ctrlKey || t.metaKey;
                        break;
                    default:
                        r = !1
                } else 36 === t.keyCode && t.ctrlKey ? e.datepicker._showDatepicker(this) : r = !1;
                r && (t.preventDefault(), t.stopPropagation())
            },
            _doKeyPress: function (i) {
                var a, s, n = e.datepicker._getInst(i.target);
                return e.datepicker._get(n, "constrainInput") ? (a = e.datepicker._possibleChars(e.datepicker._get(n, "dateFormat")), s = String.fromCharCode(null == i.charCode ? i.keyCode : i.charCode), i.ctrlKey || i.metaKey || " " > s || !a || a.indexOf(s) > -1) : t
            },
            _doKeyUp: function (t) {
                var i, a = e.datepicker._getInst(t.target);
                if (a.input.val() !== a.lastVal)try {
                    i = e.datepicker.parseDate(e.datepicker._get(a, "dateFormat"), a.input ? a.input.val() : null, e.datepicker._getFormatConfig(a)), i && (e.datepicker._setDateFromField(a), e.datepicker._updateAlternate(a), e.datepicker._updateDatepicker(a))
                } catch (s) {
                }
                return !0
            },
            _showDatepicker: function (t) {
                if (t = t.target || t, "input" !== t.nodeName.toLowerCase() && (t = e("input", t.parentNode)[0]), !e.datepicker._isDisabledDatepicker(t) && e.datepicker._lastInput !== t) {
                    var i, a, n, r, o, u, h;
                    i = e.datepicker._getInst(t), e.datepicker._curInst && e.datepicker._curInst !== i && (e.datepicker._curInst.dpDiv.stop(!0, !0), i && e.datepicker._datepickerShowing && e.datepicker._hideDatepicker(e.datepicker._curInst.input[0])), a = e.datepicker._get(i, "beforeShow"), n = a ? a.apply(t, [t, i]) : {}, n !== !1 && (s(i.settings, n), i.lastVal = null, e.datepicker._lastInput = t, e.datepicker._setDateFromField(i), e.datepicker._inDialog && (t.value = ""), e.datepicker._pos || (e.datepicker._pos = e.datepicker._findPos(t), e.datepicker._pos[1] += t.offsetHeight), r = !1, e(t).parents().each(function () {
                        return r |= "fixed" === e(this).css("position"), !r
                    }), o = {
                        left: e.datepicker._pos[0],
                        top: e.datepicker._pos[1]
                    }, e.datepicker._pos = null, i.dpDiv.empty(), i.dpDiv.css({
                        position: "absolute",
                        display: "block",
                        top: "-1000px"
                    }), e.datepicker._updateDatepicker(i), o = e.datepicker._checkOffset(i, o, r), i.dpDiv.css({
                        position: e.datepicker._inDialog && e.blockUI ? "static" : r ? "fixed" : "absolute",
                        display: "none",
                        left: o.left + "px",
                        top: o.top + "px"
                    }), i.inline || (u = e.datepicker._get(i, "showAnim"), h = e.datepicker._get(i, "duration"), i.dpDiv.zIndex(e(t).zIndex() + 1), e.datepicker._datepickerShowing = !0, e.effects && e.effects.effect[u] ? i.dpDiv.show(u, e.datepicker._get(i, "showOptions"), h) : i.dpDiv[u || "show"](u ? h : null), e.datepicker._shouldFocusInput(i) && i.input.focus(), e.datepicker._curInst = i))
                }
            },
            _updateDatepicker: function (t) {
                this.maxRows = 4, n = t, t.dpDiv.empty().append(this._generateHTML(t)), this._attachHandlers(t), t.dpDiv.find("." + this._dayOverClass + " a").mouseover();
                var i, a = this._getNumberOfMonths(t), s = a[1], r = 17;
                t.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""), s > 1 && t.dpDiv.addClass("ui-datepicker-multi-" + s).css("width", r * s + "em"), t.dpDiv[(1 !== a[0] || 1 !== a[1] ? "add" : "remove") + "Class"]("ui-datepicker-multi"), t.dpDiv[(this._get(t, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl"), t === e.datepicker._curInst && e.datepicker._datepickerShowing && e.datepicker._shouldFocusInput(t) && t.input.focus(), t.yearshtml && (i = t.yearshtml, setTimeout(function () {
                    i === t.yearshtml && t.yearshtml && t.dpDiv.find("select.ui-datepicker-year:first").replaceWith(t.yearshtml), i = t.yearshtml = null
                }, 0))
            },
            _shouldFocusInput: function (e) {
                return e.input && e.input.is(":visible") && !e.input.is(":disabled") && !e.input.is(":focus")
            },
            _checkOffset: function (t, i, a) {
                var s = t.dpDiv.outerWidth(), n = t.dpDiv.outerHeight(), r = t.input ? t.input.outerWidth() : 0, o = t.input ? t.input.outerHeight() : 0, u = document.documentElement.clientWidth + (a ? 0 : e(document).scrollLeft()), h = document.documentElement.clientHeight + (a ? 0 : e(document).scrollTop());
                return i.left -= this._get(t, "isRTL") ? s - r : 0, i.left -= a && i.left === t.input.offset().left ? e(document).scrollLeft() : 0, i.top -= a && i.top === t.input.offset().top + o ? e(document).scrollTop() : 0, i.left -= Math.min(i.left, i.left + s > u && u > s ? Math.abs(i.left + s - u) : 0), i.top -= Math.min(i.top, i.top + n > h && h > n ? Math.abs(n + o) : 0), i
            },
            _findPos: function (t) {
                for (var i, a = this._getInst(t), s = this._get(a, "isRTL"); t && ("hidden" === t.type || 1 !== t.nodeType || e.expr.filters.hidden(t));)t = t[s ? "previousSibling" : "nextSibling"];
                return i = e(t).offset(), [i.left, i.top]
            },
            _hideDatepicker: function (t) {
                var i, a, s, n, o = this._curInst;
                !o || t && o !== e.data(t, r) || this._datepickerShowing && (i = this._get(o, "showAnim"), a = this._get(o, "duration"), s = function () {
                    e.datepicker._tidyDialog(o)
                }, e.effects && (e.effects.effect[i] || e.effects[i]) ? o.dpDiv.hide(i, e.datepicker._get(o, "showOptions"), a, s) : o.dpDiv["slideDown" === i ? "slideUp" : "fadeIn" === i ? "fadeOut" : "hide"](i ? a : null, s), i || s(), this._datepickerShowing = !1, n = this._get(o, "onClose"), n && n.apply(o.input ? o.input[0] : null, [o.input ? o.input.val() : "", o]), this._lastInput = null, this._inDialog && (this._dialogInput.css({
                    position: "absolute",
                    left: "0",
                    top: "-100px"
                }), e.blockUI && (e.unblockUI(), e("body").append(this.dpDiv))), this._inDialog = !1)
            },
            _tidyDialog: function (e) {
                e.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")
            },
            _checkExternalClick: function (t) {
                if (e.datepicker._curInst) {
                    var i = e(t.target), a = e.datepicker._getInst(i[0]);
                    (i[0].id !== e.datepicker._mainDivId && 0 === i.parents("#" + e.datepicker._mainDivId).length && !i.hasClass(e.datepicker.markerClassName) && !i.closest("." + e.datepicker._triggerClass).length && e.datepicker._datepickerShowing && (!e.datepicker._inDialog || !e.blockUI) || i.hasClass(e.datepicker.markerClassName) && e.datepicker._curInst !== a) && e.datepicker._hideDatepicker()
                }
            },
            _adjustDate: function (t, i, a) {
                var s = e(t), n = this._getInst(s[0]);
                this._isDisabledDatepicker(s[0]) || (this._adjustInstDate(n, i + ("M" === a ? this._get(n, "showCurrentAtPos") : 0), a), this._updateDatepicker(n))
            },
            _gotoToday: function (t) {
                var i, a = e(t), s = this._getInst(a[0]);
                this._get(s, "gotoCurrent") && s.currentDay ? (s.selectedDay = s.currentDay, s.drawMonth = s.selectedMonth = s.currentMonth, s.drawYear = s.selectedYear = s.currentYear) : (i = new Date, s.selectedDay = i.getDate(), s.drawMonth = s.selectedMonth = i.getMonth(), s.drawYear = s.selectedYear = i.getFullYear()), this._notifyChange(s), this._adjustDate(a)
            },
            _selectMonthYear: function (t, i, a) {
                var s = e(t), n = this._getInst(s[0]);
                n["selected" + ("M" === a ? "Month" : "Year")] = n["draw" + ("M" === a ? "Month" : "Year")] = parseInt(i.options[i.selectedIndex].value, 10), this._notifyChange(n), this._adjustDate(s)
            },
            _selectDay: function (t, i, a, s) {
                var n, r = e(t);
                e(s).hasClass(this._unselectableClass) || this._isDisabledDatepicker(r[0]) || (n = this._getInst(r[0]), n.selectedDay = n.currentDay = e("a", s).html(), n.selectedMonth = n.currentMonth = i, n.selectedYear = n.currentYear = a, this._selectDate(t, this._formatDate(n, n.currentDay, n.currentMonth, n.currentYear)))
            },
            _clearDate: function (t) {
                var i = e(t);
                this._selectDate(i, "")
            },
            _selectDate: function (t, i) {
                var a, s = e(t), n = this._getInst(s[0]);
                i = null != i ? i : this._formatDate(n), n.input && n.input.val(i), this._updateAlternate(n), a = this._get(n, "onSelect"), a ? a.apply(n.input ? n.input[0] : null, [i, n]) : n.input && n.input.trigger("change"), n.inline ? this._updateDatepicker(n) : (this._hideDatepicker(), this._lastInput = n.input[0], "object" != typeof n.input[0] && n.input.focus(), this._lastInput = null)
            },
            _updateAlternate: function (t) {
                var i, a, s, n = this._get(t, "altField");
                n && (i = this._get(t, "altFormat") || this._get(t, "dateFormat"), a = this._getDate(t), s = this.formatDate(i, a, this._getFormatConfig(t)), e(n).each(function () {
                    e(this).val(s)
                }))
            },
            noWeekends: function (e) {
                var t = e.getDay();
                return [t > 0 && 6 > t, ""]
            },
            iso8601Week: function (e) {
                var t, i = new Date(e.getTime());
                return i.setDate(i.getDate() + 4 - (i.getDay() || 7)), t = i.getTime(), i.setMonth(0), i.setDate(1), Math.floor(Math.round((t - i) / 864e5) / 7) + 1
            },
            parseDate: function (i, a, s) {
                if (null == i || null == a)throw"Invalid arguments";
                if (a = "object" == typeof a ? "" + a : a + "", "" === a)return null;
                var n, r, o, u, h = 0, c = (s ? s.shortYearCutoff : null) || this._defaults.shortYearCutoff, l = "string" != typeof c ? c : (new Date).getFullYear() % 100 + parseInt(c, 10), d = (s ? s.dayNamesShort : null) || this._defaults.dayNamesShort, p = (s ? s.dayNames : null) || this._defaults.dayNames, g = (s ? s.monthNamesShort : null) || this._defaults.monthNamesShort, m = (s ? s.monthNames : null) || this._defaults.monthNames, f = -1, v = -1, _ = -1, b = -1, y = !1, w = function (e) {
                    var t = i.length > n + 1 && i.charAt(n + 1) === e;
                    return t && n++, t
                }, k = function (e) {
                    var t = w(e), i = "@" === e ? 14 : "!" === e ? 20 : "y" === e && t ? 4 : "o" === e ? 3 : 2, s = RegExp("^\\d{1," + i + "}"), n = a.substring(h).match(s);
                    if (!n)throw"Missing number at position " + h;
                    return h += n[0].length, parseInt(n[0], 10)
                }, D = function (i, s, n) {
                    var r = -1, o = e.map(w(i) ? n : s, function (e, t) {
                        return [[t, e]]
                    }).sort(function (e, t) {
                        return -(e[1].length - t[1].length)
                    });
                    if (e.each(o, function (e, i) {
                            var s = i[1];
                            return a.substr(h, s.length).toLowerCase() === s.toLowerCase() ? (r = i[0], h += s.length, !1) : t
                        }), -1 !== r)return r + 1;
                    throw"Unknown name at position " + h
                }, C = function () {
                    if (a.charAt(h) !== i.charAt(n))throw"Unexpected literal at position " + h;
                    h++
                };
                for (n = 0; i.length > n; n++)if (y)"'" !== i.charAt(n) || w("'") ? C() : y = !1; else switch (i.charAt(n)) {
                    case"d":
                        _ = k("d");
                        break;
                    case"D":
                        D("D", d, p);
                        break;
                    case"o":
                        b = k("o");
                        break;
                    case"m":
                        v = k("m");
                        break;
                    case"M":
                        v = D("M", g, m);
                        break;
                    case"y":
                        f = k("y");
                        break;
                    case"@":
                        u = new Date(k("@")), f = u.getFullYear(), v = u.getMonth() + 1, _ = u.getDate();
                        break;
                    case"!":
                        u = new Date((k("!") - this._ticksTo1970) / 1e4), f = u.getFullYear(), v = u.getMonth() + 1, _ = u.getDate();
                        break;
                    case"'":
                        w("'") ? C() : y = !0;
                        break;
                    default:
                        C()
                }
                if (a.length > h && (o = a.substr(h), !/^\s+/.test(o)))throw"Extra/unparsed characters found in date: " + o;
                if (-1 === f ? f = (new Date).getFullYear() : 100 > f && (f += (new Date).getFullYear() - (new Date).getFullYear() % 100 + (l >= f ? 0 : -100)), b > -1)for (v = 1, _ = b; r = this._getDaysInMonth(f, v - 1), !(r >= _);)v++, _ -= r;
                if (u = this._daylightSavingAdjust(new Date(f, v - 1, _)), u.getFullYear() !== f || u.getMonth() + 1 !== v || u.getDate() !== _)throw"Invalid date";
                return u
            },
            ATOM: "yy-mm-dd",
            COOKIE: "D, dd M yy",
            ISO_8601: "yy-mm-dd",
            RFC_822: "D, d M y",
            RFC_850: "DD, dd-M-y",
            RFC_1036: "D, d M y",
            RFC_1123: "D, d M yy",
            RFC_2822: "D, d M yy",
            RSS: "D, d M y",
            TICKS: "!",
            TIMESTAMP: "@",
            W3C: "yy-mm-dd",
            _ticksTo1970: 864e9 * (718685 + Math.floor(492.5) - Math.floor(19.7) + Math.floor(4.925)),
            formatDate: function (e, t, i) {
                if (!t)return "";
                var a, s = (i ? i.dayNamesShort : null) || this._defaults.dayNamesShort, n = (i ? i.dayNames : null) || this._defaults.dayNames, r = (i ? i.monthNamesShort : null) || this._defaults.monthNamesShort, o = (i ? i.monthNames : null) || this._defaults.monthNames, u = function (t) {
                    var i = e.length > a + 1 && e.charAt(a + 1) === t;
                    return i && a++, i
                }, h = function (e, t, i) {
                    var a = "" + t;
                    if (u(e))for (; i > a.length;)a = "0" + a;
                    return a
                }, c = function (e, t, i, a) {
                    return u(e) ? a[t] : i[t]
                }, l = "", d = !1;
                if (t)for (a = 0; e.length > a; a++)if (d)"'" !== e.charAt(a) || u("'") ? l += e.charAt(a) : d = !1; else switch (e.charAt(a)) {
                    case"d":
                        l += h("d", t.getDate(), 2);
                        break;
                    case"D":
                        l += c("D", t.getDay(), s, n);
                        break;
                    case"o":
                        l += h("o", Math.round((new Date(t.getFullYear(), t.getMonth(), t.getDate()).getTime() - new Date(t.getFullYear(), 0, 0).getTime()) / 864e5), 3);
                        break;
                    case"m":
                        l += h("m", t.getMonth() + 1, 2);
                        break;
                    case"M":
                        l += c("M", t.getMonth(), r, o);
                        break;
                    case"y":
                        l += u("y") ? t.getFullYear() : (10 > t.getYear() % 100 ? "0" : "") + t.getYear() % 100;
                        break;
                    case"@":
                        l += t.getTime();
                        break;
                    case"!":
                        l += 1e4 * t.getTime() + this._ticksTo1970;
                        break;
                    case"'":
                        u("'") ? l += "'" : d = !0;
                        break;
                    default:
                        l += e.charAt(a)
                }
                return l
            },
            _possibleChars: function (e) {
                var t, i = "", a = !1, s = function (i) {
                    var a = e.length > t + 1 && e.charAt(t + 1) === i;
                    return a && t++, a
                };
                for (t = 0; e.length > t; t++)if (a)"'" !== e.charAt(t) || s("'") ? i += e.charAt(t) : a = !1; else switch (e.charAt(t)) {
                    case"d":
                    case"m":
                    case"y":
                    case"@":
                        i += "0123456789";
                        break;
                    case"D":
                    case"M":
                        return null;
                    case"'":
                        s("'") ? i += "'" : a = !0;
                        break;
                    default:
                        i += e.charAt(t)
                }
                return i
            },
            _get: function (e, i) {
                return e.settings[i] !== t ? e.settings[i] : this._defaults[i]
            },
            _setDateFromField: function (e, t) {
                if (e.input.val() !== e.lastVal) {
                    var i = this._get(e, "dateFormat"), a = e.lastVal = e.input ? e.input.val() : null, s = this._getDefaultDate(e), n = s, r = this._getFormatConfig(e);
                    try {
                        n = this.parseDate(i, a, r) || s
                    } catch (o) {
                        a = t ? "" : a
                    }
                    e.selectedDay = n.getDate(), e.drawMonth = e.selectedMonth = n.getMonth(), e.drawYear = e.selectedYear = n.getFullYear(), e.currentDay = a ? n.getDate() : 0, e.currentMonth = a ? n.getMonth() : 0, e.currentYear = a ? n.getFullYear() : 0, this._adjustInstDate(e)
                }
            },
            _getDefaultDate: function (e) {
                return this._restrictMinMax(e, this._determineDate(e, this._get(e, "defaultDate"), new Date))
            },
            _determineDate: function (t, i, a) {
                var s = function (e) {
                    var t = new Date;
                    return t.setDate(t.getDate() + e), t
                }, n = function (i) {
                    try {
                        return e.datepicker.parseDate(e.datepicker._get(t, "dateFormat"), i, e.datepicker._getFormatConfig(t))
                    } catch (a) {
                    }
                    for (var s = (i.toLowerCase().match(/^c/) ? e.datepicker._getDate(t) : null) || new Date, n = s.getFullYear(), r = s.getMonth(), o = s.getDate(), u = /([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g, h = u.exec(i); h;) {
                        switch (h[2] || "d") {
                            case"d":
                            case"D":
                                o += parseInt(h[1], 10);
                                break;
                            case"w":
                            case"W":
                                o += 7 * parseInt(h[1], 10);
                                break;
                            case"m":
                            case"M":
                                r += parseInt(h[1], 10), o = Math.min(o, e.datepicker._getDaysInMonth(n, r));
                                break;
                            case"y":
                            case"Y":
                                n += parseInt(h[1], 10), o = Math.min(o, e.datepicker._getDaysInMonth(n, r))
                        }
                        h = u.exec(i)
                    }
                    return new Date(n, r, o)
                }, r = null == i || "" === i ? a : "string" == typeof i ? n(i) : "number" == typeof i ? isNaN(i) ? a : s(i) : new Date(i.getTime());
                return r = r && "Invalid Date" == "" + r ? a : r, r && (r.setHours(0), r.setMinutes(0), r.setSeconds(0), r.setMilliseconds(0)), this._daylightSavingAdjust(r)
            },
            _daylightSavingAdjust: function (e) {
                return e ? (e.setHours(e.getHours() > 12 ? e.getHours() + 2 : 0), e) : null
            },
            _setDate: function (e, t, i) {
                var a = !t, s = e.selectedMonth, n = e.selectedYear, r = this._restrictMinMax(e, this._determineDate(e, t, new Date));
                e.selectedDay = e.currentDay = r.getDate(), e.drawMonth = e.selectedMonth = e.currentMonth = r.getMonth(), e.drawYear = e.selectedYear = e.currentYear = r.getFullYear(), s === e.selectedMonth && n === e.selectedYear || i || this._notifyChange(e), this._adjustInstDate(e), e.input && e.input.val(a ? "" : this._formatDate(e))
            },
            _getDate: function (e) {
                var t = !e.currentYear || e.input && "" === e.input.val() ? null : this._daylightSavingAdjust(new Date(e.currentYear, e.currentMonth, e.currentDay));
                return t
            },
            _attachHandlers: function (t) {
                var i = this._get(t, "stepMonths"), a = "#" + t.id.replace(/\\\\/g, "\\");
                t.dpDiv.find("[data-handler]").map(function () {
                    var t = {
                        prev: function () {
                            e.datepicker._adjustDate(a, -i, "M")
                        }, next: function () {
                            e.datepicker._adjustDate(a, +i, "M")
                        }, hide: function () {
                            e.datepicker._hideDatepicker()
                        }, today: function () {
                            e.datepicker._gotoToday(a)
                        }, selectDay: function () {
                            return e.datepicker._selectDay(a, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this), !1
                        }, selectMonth: function () {
                            return e.datepicker._selectMonthYear(a, this, "M"), !1
                        }, selectYear: function () {
                            return e.datepicker._selectMonthYear(a, this, "Y"), !1
                        }
                    };
                    e(this).bind(this.getAttribute("data-event"), t[this.getAttribute("data-handler")])
                })
            },
            _generateHTML: function (e) {
                var t, i, a, s, n, r, o, u, h, c, l, d, p, g, m, f, v, _, b, y, w, k, D, C, I, x, P, T, M, S, z, A, H, W, E, N, O, F, R, j = new Date, L = this._daylightSavingAdjust(new Date(j.getFullYear(), j.getMonth(), j.getDate())), Y = this._get(e, "isRTL"), B = this._get(e, "showButtonPanel"), K = this._get(e, "hideIfNoPrevNext"), U = this._get(e, "navigationAsDateFormat"), q = this._getNumberOfMonths(e), V = this._get(e, "showCurrentAtPos"), Q = this._get(e, "stepMonths"), X = 1 !== q[0] || 1 !== q[1], $ = this._daylightSavingAdjust(e.currentDay ? new Date(e.currentYear, e.currentMonth, e.currentDay) : new Date(9999, 9, 9)), G = this._getMinMaxDate(e, "min"), J = this._getMinMaxDate(e, "max"), Z = e.drawMonth - V, te = e.drawYear;
                if (0 > Z && (Z += 12, te--), J)for (t = this._daylightSavingAdjust(new Date(J.getFullYear(), J.getMonth() - q[0] * q[1] + 1, J.getDate())), t = G && G > t ? G : t; this._daylightSavingAdjust(new Date(te, Z, 1)) > t;)Z--, 0 > Z && (Z = 11, te--);
                for (e.drawMonth = Z, e.drawYear = te, i = this._get(e, "prevText"), i = U ? this.formatDate(i, this._daylightSavingAdjust(new Date(te, Z - Q, 1)), this._getFormatConfig(e)) : i, a = this._canAdjustMonth(e, -1, te, Z) ? "<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>" : K ? "" : "<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>", s = this._get(e, "nextText"), s = U ? this.formatDate(s, this._daylightSavingAdjust(new Date(te, Z + Q, 1)), this._getFormatConfig(e)) : s, n = this._canAdjustMonth(e, 1, te, Z) ? "<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='" + s + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + s + "</span></a>" : K ? "" : "<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='" + s + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + s + "</span></a>", r = this._get(e, "currentText"), o = this._get(e, "gotoCurrent") && e.currentDay ? $ : L, r = U ? this.formatDate(r, o, this._getFormatConfig(e)) : r, u = e.inline ? "" : "<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>" + this._get(e, "closeText") + "</button>", h = B ? "<div class='ui-datepicker-buttonpane ui-widget-content'>" + (Y ? u : "") + (this._isInRange(e, o) ? "<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>" + r + "</button>" : "") + (Y ? "" : u) + "</div>" : "", c = parseInt(this._get(e, "firstDay"), 10), c = isNaN(c) ? 0 : c, l = this._get(e, "showWeek"), d = this._get(e, "dayNames"), p = this._get(e, "dayNamesMin"), g = this._get(e, "monthNames"), m = this._get(e, "monthNamesShort"), f = this._get(e, "beforeShowDay"), v = this._get(e, "showOtherMonths"), _ = this._get(e, "selectOtherMonths"), b = this._getDefaultDate(e), y = "", k = 0; q[0] > k; k++) {
                    for (D = "", this.maxRows = 4, C = 0; q[1] > C; C++) {
                        if (I = this._daylightSavingAdjust(new Date(te, Z, e.selectedDay)), x = " ui-corner-all", P = "", X) {
                            if (P += "<div class='ui-datepicker-group", q[1] > 1)switch (C) {
                                case 0:
                                    P += " ui-datepicker-group-first", x = " ui-corner-" + (Y ? "right" : "left");
                                    break;
                                case q[1] - 1:
                                    P += " ui-datepicker-group-last", x = " ui-corner-" + (Y ? "left" : "right");
                                    break;
                                default:
                                    P += " ui-datepicker-group-middle", x = ""
                            }
                            P += "'>"
                        }
                        for (P += "<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix" + x + "'>" + (/all|left/.test(x) && 0 === k ? Y ? n : a : "") + (/all|right/.test(x) && 0 === k ? Y ? a : n : "") + this._generateMonthYearHeader(e, Z, te, G, J, k > 0 || C > 0, g, m) + "</div><table class='ui-datepicker-calendar'><thead><tr>", T = l ? "<th class='ui-datepicker-week-col'>" + this._get(e, "weekHeader") + "</th>" : "", w = 0; 7 > w; w++)M = (w + c) % 7, T += "<th" + ((w + c + 6) % 7 >= 5 ? " class='ui-datepicker-week-end'" : "") + "><span title='" + d[M] + "'>" + p[M] + "</span></th>";
                        for (P += T + "</tr></thead><tbody>", S = this._getDaysInMonth(te, Z), te === e.selectedYear && Z === e.selectedMonth && (e.selectedDay = Math.min(e.selectedDay, S)), z = (this._getFirstDayOfMonth(te, Z) - c + 7) % 7, A = Math.ceil((z + S) / 7), H = X && this.maxRows > A ? this.maxRows : A, this.maxRows = H, W = this._daylightSavingAdjust(new Date(te, Z, 1 - z)), E = 0; H > E; E++) {
                            for (P += "<tr>", N = l ? "<td class='ui-datepicker-week-col'>" + this._get(e, "calculateWeek")(W) + "</td>" : "", w = 0; 7 > w; w++)O = f ? f.apply(e.input ? e.input[0] : null, [W]) : [!0, ""], F = W.getMonth() !== Z, R = F && !_ || !O[0] || G && G > W || J && W > J, N += "<td class='" + ((w + c + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (F ? " ui-datepicker-other-month" : "") + (W.getTime() === I.getTime() && Z === e.selectedMonth && e._keyEvent || b.getTime() === W.getTime() && b.getTime() === I.getTime() ? " " + this._dayOverClass : "") + (R ? " " + this._unselectableClass + " ui-state-disabled" : "") + (F && !v ? "" : " " + O[1] + (W.getTime() === $.getTime() ? " " + this._currentClass : "") + (W.getTime() === L.getTime() ? " ui-datepicker-today" : "")) + "'" + (F && !v || !O[2] ? "" : " title='" + O[2].replace(/'/g, "&#39;") + "'") + (R ? "" : " data-handler='selectDay' data-event='click' data-month='" + W.getMonth() + "' data-year='" + W.getFullYear() + "'") + ">" + (F && !v ? "&#xa0;" : R ? "<span class='ui-state-default'>" + W.getDate() + "</span>" : "<a class='ui-state-default" + (W.getTime() === L.getTime() ? " ui-state-highlight" : "") + (W.getTime() === $.getTime() ? " ui-state-active" : "") + (F ? " ui-priority-secondary" : "") + "' href='#'>" + W.getDate() + "</a>") + "</td>", W.setDate(W.getDate() + 1), W = this._daylightSavingAdjust(W);
                            P += N + "</tr>"
                        }
                        Z++, Z > 11 && (Z = 0, te++), P += "</tbody></table>" + (X ? "</div>" + (q[0] > 0 && C === q[1] - 1 ? "<div class='ui-datepicker-row-break'></div>" : "") : ""), D += P
                    }
                    y += D
                }
                return y += h, e._keyEvent = !1, y
            },
            _generateMonthYearHeader: function (e, t, i, a, s, n, r, o) {
                var u, h, c, l, d, p, g, m, f = this._get(e, "changeMonth"), v = this._get(e, "changeYear"), _ = this._get(e, "showMonthAfterYear"), b = "<div class='ui-datepicker-title'>", y = "";
                if (n || !f)y += "<span class='ui-datepicker-month'>" + r[t] + "</span>"; else {
                    for (u = a && a.getFullYear() === i, h = s && s.getFullYear() === i, y += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>", c = 0; 12 > c; c++)(!u || c >= a.getMonth()) && (!h || s.getMonth() >= c) && (y += "<option value='" + c + "'" + (c === t ? " selected='selected'" : "") + ">" + o[c] + "</option>");
                    y += "</select>"
                }
                if (_ || (b += y + (!n && f && v ? "" : "&#xa0;")), !e.yearshtml)if (e.yearshtml = "", n || !v)b += "<span class='ui-datepicker-year'>" + i + "</span>"; else {
                    for (l = this._get(e, "yearRange").split(":"), d = (new Date).getFullYear(), p = function (e) {
                        var t = e.match(/c[+\-].*/) ? i + parseInt(e.substring(1), 10) : e.match(/[+\-].*/) ? d + parseInt(e, 10) : parseInt(e, 10);
                        return isNaN(t) ? d : t
                    }, g = p(l[0]), m = Math.max(g, p(l[1] || "")), g = a ? Math.max(g, a.getFullYear()) : g, m = s ? Math.min(m, s.getFullYear()) : m, e.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>"; m >= g; g++)e.yearshtml += "<option value='" + g + "'" + (g === i ? " selected='selected'" : "") + ">" + g + "</option>";
                    e.yearshtml += "</select>", b += e.yearshtml, e.yearshtml = null
                }
                return b += this._get(e, "yearSuffix"), _ && (b += (!n && f && v ? "" : "&#xa0;") + y), b += "</div>"
            },
            _adjustInstDate: function (e, t, i) {
                var a = e.drawYear + ("Y" === i ? t : 0), s = e.drawMonth + ("M" === i ? t : 0), n = Math.min(e.selectedDay, this._getDaysInMonth(a, s)) + ("D" === i ? t : 0), r = this._restrictMinMax(e, this._daylightSavingAdjust(new Date(a, s, n)));
                e.selectedDay = r.getDate(), e.drawMonth = e.selectedMonth = r.getMonth(), e.drawYear = e.selectedYear = r.getFullYear(), ("M" === i || "Y" === i) && this._notifyChange(e)
            },
            _restrictMinMax: function (e, t) {
                var i = this._getMinMaxDate(e, "min"), a = this._getMinMaxDate(e, "max"), s = i && i > t ? i : t;
                return a && s > a ? a : s
            },
            _notifyChange: function (e) {
                var t = this._get(e, "onChangeMonthYear");
                t && t.apply(e.input ? e.input[0] : null, [e.selectedYear, e.selectedMonth + 1, e])
            },
            _getNumberOfMonths: function (e) {
                var t = this._get(e, "numberOfMonths");
                return null == t ? [1, 1] : "number" == typeof t ? [1, t] : t
            },
            _getMinMaxDate: function (e, t) {
                return this._determineDate(e, this._get(e, t + "Date"), null)
            },
            _getDaysInMonth: function (e, t) {
                return 32 - this._daylightSavingAdjust(new Date(e, t, 32)).getDate()
            },
            _getFirstDayOfMonth: function (e, t) {
                return new Date(e, t, 1).getDay()
            },
            _canAdjustMonth: function (e, t, i, a) {
                var s = this._getNumberOfMonths(e), n = this._daylightSavingAdjust(new Date(i, a + (0 > t ? t : s[0] * s[1]), 1));
                return 0 > t && n.setDate(this._getDaysInMonth(n.getFullYear(), n.getMonth())), this._isInRange(e, n)
            },
            _isInRange: function (e, t) {
                var i, a, s = this._getMinMaxDate(e, "min"), n = this._getMinMaxDate(e, "max"), r = null, o = null, u = this._get(e, "yearRange");
                return u && (i = u.split(":"), a = (new Date).getFullYear(), r = parseInt(i[0], 10), o = parseInt(i[1], 10), i[0].match(/[+\-].*/) && (r += a), i[1].match(/[+\-].*/) && (o += a)), (!s || t.getTime() >= s.getTime()) && (!n || t.getTime() <= n.getTime()) && (!r || t.getFullYear() >= r) && (!o || o >= t.getFullYear())
            },
            _getFormatConfig: function (e) {
                var t = this._get(e, "shortYearCutoff");
                return t = "string" != typeof t ? t : (new Date).getFullYear() % 100 + parseInt(t, 10), {
                    shortYearCutoff: t,
                    dayNamesShort: this._get(e, "dayNamesShort"),
                    dayNames: this._get(e, "dayNames"),
                    monthNamesShort: this._get(e, "monthNamesShort"),
                    monthNames: this._get(e, "monthNames")
                }
            },
            _formatDate: function (e, t, i, a) {
                t || (e.currentDay = e.selectedDay, e.currentMonth = e.selectedMonth, e.currentYear = e.selectedYear);
                var s = t ? "object" == typeof t ? t : this._daylightSavingAdjust(new Date(a, i, t)) : this._daylightSavingAdjust(new Date(e.currentYear, e.currentMonth, e.currentDay));
                return this.formatDate(this._get(e, "dateFormat"), s, this._getFormatConfig(e))
            }
        }), e.fn.datepicker = function (t) {
            if (!this.length)return this;
            e.datepicker.initialized || (e(document).mousedown(e.datepicker._checkExternalClick), e.datepicker.initialized = !0), 0 === e("#" + e.datepicker._mainDivId).length && e("body").append(e.datepicker.dpDiv);
            var i = Array.prototype.slice.call(arguments, 1);
            return "string" != typeof t || "isDisabled" !== t && "getDate" !== t && "widget" !== t ? "option" === t && 2 === arguments.length && "string" == typeof arguments[1] ? e.datepicker["_" + t + "Datepicker"].apply(e.datepicker, [this[0]].concat(i)) : this.each(function () {
                "string" == typeof t ? e.datepicker["_" + t + "Datepicker"].apply(e.datepicker, [this].concat(i)) : e.datepicker._attachDatepicker(this, t)
            }) : e.datepicker["_" + t + "Datepicker"].apply(e.datepicker, [this[0]].concat(i))
        }, e.datepicker = new i, e.datepicker.initialized = !1, e.datepicker.uuid = (new Date).getTime(), e.datepicker.version = "1.10.4"
    }(jQuery), function (e) {
        var t = {
            buttons: !0,
            height: !0,
            maxHeight: !0,
            maxWidth: !0,
            minHeight: !0,
            minWidth: !0,
            width: !0
        }, i = {maxHeight: !0, maxWidth: !0, minHeight: !0, minWidth: !0};
        e.widget("ui.dialog", {
            version: "1.10.4",
            options: {
                appendTo: "body",
                autoOpen: !0,
                buttons: [],
                closeOnEscape: !0,
                closeText: "close",
                dialogClass: "",
                draggable: !0,
                hide: null,
                height: "auto",
                maxHeight: null,
                maxWidth: null,
                minHeight: 150,
                minWidth: 150,
                modal: !1,
                position: {
                    my: "center", at: "center", of: window, collision: "fit", using: function (t) {
                        var i = e(this).css(t).offset().top;
                        0 > i && e(this).css("top", t.top - i)
                    }
                },
                resizable: !0,
                show: null,
                title: null,
                width: 300,
                beforeClose: null,
                close: null,
                drag: null,
                dragStart: null,
                dragStop: null,
                focus: null,
                open: null,
                resize: null,
                resizeStart: null,
                resizeStop: null
            },
            _create: function () {
                this.originalCss = {
                    display: this.element[0].style.display,
                    width: this.element[0].style.width,
                    minHeight: this.element[0].style.minHeight,
                    maxHeight: this.element[0].style.maxHeight,
                    height: this.element[0].style.height
                }, this.originalPosition = {
                    parent: this.element.parent(),
                    index: this.element.parent().children().index(this.element)
                }, this.originalTitle = this.element.attr("title"), this.options.title = this.options.title || this.originalTitle, this._createWrapper(), this.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(this.uiDialog), this._createTitlebar(), this._createButtonPane(), this.options.draggable && e.fn.draggable && this._makeDraggable(), this.options.resizable && e.fn.resizable && this._makeResizable(), this._isOpen = !1
            },
            _init: function () {
                this.options.autoOpen && this.open()
            },
            _appendTo: function () {
                var t = this.options.appendTo;
                return t && (t.jquery || t.nodeType) ? e(t) : this.document.find(t || "body").eq(0)
            },
            _destroy: function () {
                var e, t = this.originalPosition;
                this._destroyOverlay(), this.element.removeUniqueId().removeClass("ui-dialog-content ui-widget-content").css(this.originalCss).detach(), this.uiDialog.stop(!0, !0).remove(), this.originalTitle && this.element.attr("title", this.originalTitle), e = t.parent.children().eq(t.index), e.length && e[0] !== this.element[0] ? e.before(this.element) : t.parent.append(this.element)
            },
            widget: function () {
                return this.uiDialog
            },
            disable: e.noop,
            enable: e.noop,
            close: function (t) {
                var i, a = this;
                if (this._isOpen && this._trigger("beforeClose", t) !== !1) {
                    if (this._isOpen = !1, this._destroyOverlay(), !this.opener.filter(":focusable").focus().length)try {
                        i = this.document[0].activeElement, i && "body" !== i.nodeName.toLowerCase() && e(i).blur()
                    } catch (s) {
                    }
                    this._hide(this.uiDialog, this.options.hide, function () {
                        a._trigger("close", t)
                    })
                }
            },
            isOpen: function () {
                return this._isOpen
            },
            moveToTop: function () {
                this._moveToTop()
            },
            _moveToTop: function (e, t) {
                var i = !!this.uiDialog.nextAll(":visible").insertBefore(this.uiDialog).length;
                return i && !t && this._trigger("focus", e), i
            },
            open: function () {
                var t = this;
                return this._isOpen ? void(this._moveToTop() && this._focusTabbable()) : (this._isOpen = !0, this.opener = e(this.document[0].activeElement), this._size(), this._position(), this._createOverlay(), this._moveToTop(null, !0), this._show(this.uiDialog, this.options.show, function () {
                    t._focusTabbable(), t._trigger("focus")
                }), void this._trigger("open"))
            },
            _focusTabbable: function () {
                var e = this.element.find("[autofocus]");
                e.length || (e = this.element.find(":tabbable")), e.length || (e = this.uiDialogButtonPane.find(":tabbable")), e.length || (e = this.uiDialogTitlebarClose.filter(":tabbable")), e.length || (e = this.uiDialog), e.eq(0).focus()
            },
            _keepFocus: function (t) {
                function i() {
                    var t = this.document[0].activeElement, i = this.uiDialog[0] === t || e.contains(this.uiDialog[0], t);
                    i || this._focusTabbable()
                }

                t.preventDefault(), i.call(this), this._delay(i)
            },
            _createWrapper: function () {
                this.uiDialog = e("<div>").addClass("ui-dialog ui-widget ui-widget-content ui-corner-all ui-front " + this.options.dialogClass).hide().attr({
                    tabIndex: -1,
                    role: "dialog"
                }).appendTo(this._appendTo()), this._on(this.uiDialog, {
                    keydown: function (t) {
                        if (this.options.closeOnEscape && !t.isDefaultPrevented() && t.keyCode && t.keyCode === e.ui.keyCode.ESCAPE)return t.preventDefault(), void this.close(t);
                        if (t.keyCode === e.ui.keyCode.TAB) {
                            var i = this.uiDialog.find(":tabbable"), a = i.filter(":first"), s = i.filter(":last");
                            t.target !== s[0] && t.target !== this.uiDialog[0] || t.shiftKey ? t.target !== a[0] && t.target !== this.uiDialog[0] || !t.shiftKey || (s.focus(1), t.preventDefault()) : (a.focus(1), t.preventDefault())
                        }
                    }, mousedown: function (e) {
                        this._moveToTop(e) && this._focusTabbable()
                    }
                }), this.element.find("[aria-describedby]").length || this.uiDialog.attr({"aria-describedby": this.element.uniqueId().attr("id")})
            },
            _createTitlebar: function () {
                var t;
                this.uiDialogTitlebar = e("<div>").addClass("ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix").prependTo(this.uiDialog), this._on(this.uiDialogTitlebar, {
                    mousedown: function (t) {
                        e(t.target).closest(".ui-dialog-titlebar-close") || this.uiDialog.focus()
                    }
                }), this.uiDialogTitlebarClose = e("<button type='button'></button>").button({
                    label: this.options.closeText,
                    icons: {primary: "ui-icon-closethick"},
                    text: !1
                }).addClass("ui-dialog-titlebar-close").appendTo(this.uiDialogTitlebar), this._on(this.uiDialogTitlebarClose, {
                    click: function (e) {
                        e.preventDefault(), this.close(e)
                    }
                }), t = e("<span>").uniqueId().addClass("ui-dialog-title").prependTo(this.uiDialogTitlebar), this._title(t), this.uiDialog.attr({"aria-labelledby": t.attr("id")})
            },
            _title: function (e) {
                this.options.title || e.html("&#160;"), e.text(this.options.title)
            },
            _createButtonPane: function () {
                this.uiDialogButtonPane = e("<div>").addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"), this.uiButtonSet = e("<div>").addClass("ui-dialog-buttonset").appendTo(this.uiDialogButtonPane), this._createButtons()
            },
            _createButtons: function () {
                var t = this, i = this.options.buttons;
                return this.uiDialogButtonPane.remove(), this.uiButtonSet.empty(), e.isEmptyObject(i) || e.isArray(i) && !i.length ? void this.uiDialog.removeClass("ui-dialog-buttons") : (e.each(i, function (i, a) {
                    var s, n;
                    a = e.isFunction(a) ? {
                        click: a,
                        text: i
                    } : a, a = e.extend({type: "button"}, a), s = a.click, a.click = function () {
                        s.apply(t.element[0], arguments)
                    }, n = {
                        icons: a.icons,
                        text: a.showText
                    }, delete a.icons, delete a.showText, e("<button></button>", a).button(n).appendTo(t.uiButtonSet)
                }), this.uiDialog.addClass("ui-dialog-buttons"), void this.uiDialogButtonPane.appendTo(this.uiDialog))
            },
            _makeDraggable: function () {
                function t(e) {
                    return {position: e.position, offset: e.offset}
                }

                var i = this, a = this.options;
                this.uiDialog.draggable({
                    cancel: ".ui-dialog-content, .ui-dialog-titlebar-close",
                    handle: ".ui-dialog-titlebar",
                    containment: "document",
                    start: function (a, s) {
                        e(this).addClass("ui-dialog-dragging"), i._blockFrames(), i._trigger("dragStart", a, t(s))
                    },
                    drag: function (e, a) {
                        i._trigger("drag", e, t(a))
                    },
                    stop: function (s, n) {
                        a.position = [n.position.left - i.document.scrollLeft(), n.position.top - i.document.scrollTop()], e(this).removeClass("ui-dialog-dragging"), i._unblockFrames(), i._trigger("dragStop", s, t(n))
                    }
                })
            },
            _makeResizable: function () {
                function t(e) {
                    return {
                        originalPosition: e.originalPosition,
                        originalSize: e.originalSize,
                        position: e.position,
                        size: e.size
                    }
                }

                var i = this, a = this.options, s = a.resizable, n = this.uiDialog.css("position"), r = "string" == typeof s ? s : "n,e,s,w,se,sw,ne,nw";
                this.uiDialog.resizable({
                    cancel: ".ui-dialog-content",
                    containment: "document",
                    alsoResize: this.element,
                    maxWidth: a.maxWidth,
                    maxHeight: a.maxHeight,
                    minWidth: a.minWidth,
                    minHeight: this._minHeight(),
                    handles: r,
                    start: function (a, s) {
                        e(this).addClass("ui-dialog-resizing"), i._blockFrames(), i._trigger("resizeStart", a, t(s))
                    },
                    resize: function (e, a) {
                        i._trigger("resize", e, t(a))
                    },
                    stop: function (s, n) {
                        a.height = e(this).height(), a.width = e(this).width(), e(this).removeClass("ui-dialog-resizing"), i._unblockFrames(), i._trigger("resizeStop", s, t(n))
                    }
                }).css("position", n)
            },
            _minHeight: function () {
                var e = this.options;
                return "auto" === e.height ? e.minHeight : Math.min(e.minHeight, e.height)
            },
            _position: function () {
                var e = this.uiDialog.is(":visible");
                e || this.uiDialog.show(), this.uiDialog.position(this.options.position), e || this.uiDialog.hide()
            },
            _setOptions: function (a) {
                var s = this, n = !1, r = {};
                e.each(a, function (e, a) {
                    s._setOption(e, a), e in t && (n = !0), e in i && (r[e] = a)
                }), n && (this._size(), this._position()), this.uiDialog.is(":data(ui-resizable)") && this.uiDialog.resizable("option", r)
            },
            _setOption: function (e, t) {
                var i, a, s = this.uiDialog;
                "dialogClass" === e && s.removeClass(this.options.dialogClass).addClass(t), "disabled" !== e && (this._super(e, t), "appendTo" === e && this.uiDialog.appendTo(this._appendTo()), "buttons" === e && this._createButtons(), "closeText" === e && this.uiDialogTitlebarClose.button({label: "" + t}), "draggable" === e && (i = s.is(":data(ui-draggable)"), i && !t && s.draggable("destroy"), !i && t && this._makeDraggable()), "position" === e && this._position(), "resizable" === e && (a = s.is(":data(ui-resizable)"), a && !t && s.resizable("destroy"), a && "string" == typeof t && s.resizable("option", "handles", t), a || t === !1 || this._makeResizable()), "title" === e && this._title(this.uiDialogTitlebar.find(".ui-dialog-title")))
            },
            _size: function () {
                var e, t, i, a = this.options;
                this.element.show().css({
                    width: "auto",
                    minHeight: 0,
                    maxHeight: "none",
                    height: 0
                }), a.minWidth > a.width && (a.width = a.minWidth), e = this.uiDialog.css({
                    height: "auto",
                    width: a.width
                }).outerHeight(), t = Math.max(0, a.minHeight - e), i = "number" == typeof a.maxHeight ? Math.max(0, a.maxHeight - e) : "none", "auto" === a.height ? this.element.css({
                    minHeight: t,
                    maxHeight: i,
                    height: "auto"
                }) : this.element.height(Math.max(0, a.height - e)), this.uiDialog.is(":data(ui-resizable)") && this.uiDialog.resizable("option", "minHeight", this._minHeight())
            },
            _blockFrames: function () {
                this.iframeBlocks = this.document.find("iframe").map(function () {
                    var t = e(this);
                    return e("<div>").css({
                        position: "absolute",
                        width: t.outerWidth(),
                        height: t.outerHeight()
                    }).appendTo(t.parent()).offset(t.offset())[0]
                })
            },
            _unblockFrames: function () {
                this.iframeBlocks && (this.iframeBlocks.remove(), delete this.iframeBlocks)
            },
            _allowInteraction: function (t) {
                return e(t.target).closest(".ui-dialog").length ? !0 : !!e(t.target).closest(".ui-datepicker").length
            },
            _createOverlay: function () {
                if (this.options.modal) {
                    var t = this, i = this.widgetFullName;
                    e.ui.dialog.overlayInstances || this._delay(function () {
                        e.ui.dialog.overlayInstances && this.document.bind("focusin.dialog", function (a) {
                            t._allowInteraction(a) || (a.preventDefault(), e(".ui-dialog:visible:last .ui-dialog-content").data(i)._focusTabbable())
                        })
                    }), this.overlay = e("<div>").addClass("ui-widget-overlay ui-front").appendTo(this._appendTo()), this._on(this.overlay, {mousedown: "_keepFocus"}), e.ui.dialog.overlayInstances++
                }
            },
            _destroyOverlay: function () {
                this.options.modal && this.overlay && (e.ui.dialog.overlayInstances--, e.ui.dialog.overlayInstances || this.document.unbind("focusin.dialog"), this.overlay.remove(), this.overlay = null)
            }
        }), e.ui.dialog.overlayInstances = 0, e.uiBackCompat !== !1 && e.widget("ui.dialog", e.ui.dialog, {
            _position: function () {
                var t, i = this.options.position, a = [], s = [0, 0];
                i ? (("string" == typeof i || "object" == typeof i && "0"in i) && (a = i.split ? i.split(" ") : [i[0], i[1]], 1 === a.length && (a[1] = a[0]), e.each(["left", "top"], function (e, t) {
                    +a[e] === a[e] && (s[e] = a[e], a[e] = t)
                }), i = {
                    my: a[0] + (0 > s[0] ? s[0] : "+" + s[0]) + " " + a[1] + (0 > s[1] ? s[1] : "+" + s[1]),
                    at: a.join(" ")
                }), i = e.extend({}, e.ui.dialog.prototype.options.position, i)) : i = e.ui.dialog.prototype.options.position, t = this.uiDialog.is(":visible"), t || this.uiDialog.show(), this.uiDialog.position(i), t || this.uiDialog.hide()
            }
        })
    }(jQuery), function (t) {
        t.widget("ui.draggable", t.ui.mouse, {
            version: "1.10.4",
            widgetEventPrefix: "drag",
            options: {
                addClasses: !0,
                appendTo: "parent",
                axis: !1,
                connectToSortable: !1,
                containment: !1,
                cursor: "auto",
                cursorAt: !1,
                grid: !1,
                handle: !1,
                helper: "original",
                iframeFix: !1,
                opacity: !1,
                refreshPositions: !1,
                revert: !1,
                revertDuration: 500,
                scope: "default",
                scroll: !0,
                scrollSensitivity: 20,
                scrollSpeed: 20,
                snap: !1,
                snapMode: "both",
                snapTolerance: 20,
                stack: !1,
                zIndex: !1,
                drag: null,
                start: null,
                stop: null
            },
            _create: function () {
                "original" !== this.options.helper || /^(?:r|a|f)/.test(this.element.css("position")) || (this.element[0].style.position = "relative"), this.options.addClasses && this.element.addClass("ui-draggable"), this.options.disabled && this.element.addClass("ui-draggable-disabled"), this._mouseInit()
            },
            _destroy: function () {
                this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"), this._mouseDestroy()
            },
            _mouseCapture: function (e) {
                var i = this.options;
                return this.helper || i.disabled || t(e.target).closest(".ui-resizable-handle").length > 0 ? !1 : (this.handle = this._getHandle(e), this.handle ? (t(i.iframeFix === !0 ? "iframe" : i.iframeFix).each(function () {
                    t("<div class='ui-draggable-iframeFix' style='background: #fff;'></div>").css({
                        width: this.offsetWidth + "px",
                        height: this.offsetHeight + "px",
                        position: "absolute",
                        opacity: "0.001",
                        zIndex: 1e3
                    }).css(t(this).offset()).appendTo("body")
                }), !0) : !1)
            },
            _mouseStart: function (e) {
                var i = this.options;
                return this.helper = this._createHelper(e), this.helper.addClass("ui-draggable-dragging"), this._cacheHelperProportions(), t.ui.ddmanager && (t.ui.ddmanager.current = this), this._cacheMargins(), this.cssPosition = this.helper.css("position"), this.scrollParent = this.helper.scrollParent(), this.offsetParent = this.helper.offsetParent(), this.offsetParentCssPosition = this.offsetParent.css("position"), this.offset = this.positionAbs = this.element.offset(), this.offset = {
                    top: this.offset.top - this.margins.top,
                    left: this.offset.left - this.margins.left
                }, this.offset.scroll = !1, t.extend(this.offset, {
                    click: {
                        left: e.pageX - this.offset.left,
                        top: e.pageY - this.offset.top
                    }, parent: this._getParentOffset(), relative: this._getRelativeOffset()
                }), this.originalPosition = this.position = this._generatePosition(e), this.originalPageX = e.pageX, this.originalPageY = e.pageY, i.cursorAt && this._adjustOffsetFromHelper(i.cursorAt), this._setContainment(), this._trigger("start", e) === !1 ? (this._clear(), !1) : (this._cacheHelperProportions(), t.ui.ddmanager && !i.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e), this._mouseDrag(e, !0), t.ui.ddmanager && t.ui.ddmanager.dragStart(this, e), !0)
            },
            _mouseDrag: function (e, i) {
                if ("fixed" === this.offsetParentCssPosition && (this.offset.parent = this._getParentOffset()), this.position = this._generatePosition(e), this.positionAbs = this._convertPositionTo("absolute"), !i) {
                    var s = this._uiHash();
                    if (this._trigger("drag", e, s) === !1)return this._mouseUp({}), !1;
                    this.position = s.position
                }
                return this.options.axis && "y" === this.options.axis || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && "x" === this.options.axis || (this.helper[0].style.top = this.position.top + "px"), t.ui.ddmanager && t.ui.ddmanager.drag(this, e), !1
            },
            _mouseStop: function (e) {
                var i = this, s = !1;
                return t.ui.ddmanager && !this.options.dropBehaviour && (s = t.ui.ddmanager.drop(this, e)), this.dropped && (s = this.dropped, this.dropped = !1), "original" !== this.options.helper || t.contains(this.element[0].ownerDocument, this.element[0]) ? ("invalid" === this.options.revert && !s || "valid" === this.options.revert && s || this.options.revert === !0 || t.isFunction(this.options.revert) && this.options.revert.call(this.element, s) ? t(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function () {
                    i._trigger("stop", e) !== !1 && i._clear()
                }) : this._trigger("stop", e) !== !1 && this._clear(), !1) : !1
            },
            _mouseUp: function (e) {
                return t("div.ui-draggable-iframeFix").each(function () {
                    this.parentNode.removeChild(this)
                }), t.ui.ddmanager && t.ui.ddmanager.dragStop(this, e), t.ui.mouse.prototype._mouseUp.call(this, e)
            },
            cancel: function () {
                return this.helper.is(".ui-draggable-dragging") ? this._mouseUp({}) : this._clear(), this
            },
            _getHandle: function (e) {
                return this.options.handle ? !!t(e.target).closest(this.element.find(this.options.handle)).length : !0
            },
            _createHelper: function (e) {
                var i = this.options, s = t.isFunction(i.helper) ? t(i.helper.apply(this.element[0], [e])) : "clone" === i.helper ? this.element.clone().removeAttr("id") : this.element;
                return s.parents("body").length || s.appendTo("parent" === i.appendTo ? this.element[0].parentNode : i.appendTo), s[0] === this.element[0] || /(fixed|absolute)/.test(s.css("position")) || s.css("position", "absolute"), s
            },
            _adjustOffsetFromHelper: function (e) {
                "string" == typeof e && (e = e.split(" ")), t.isArray(e) && (e = {
                    left: +e[0],
                    top: +e[1] || 0
                }), "left"in e && (this.offset.click.left = e.left + this.margins.left), "right"in e && (this.offset.click.left = this.helperProportions.width - e.right + this.margins.left), "top"in e && (this.offset.click.top = e.top + this.margins.top), "bottom"in e && (this.offset.click.top = this.helperProportions.height - e.bottom + this.margins.top)
            },
            _getParentOffset: function () {
                var e = this.offsetParent.offset();
                return "absolute" === this.cssPosition && this.scrollParent[0] !== document && t.contains(this.scrollParent[0], this.offsetParent[0]) && (e.left += this.scrollParent.scrollLeft(), e.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === document.body || this.offsetParent[0].tagName && "html" === this.offsetParent[0].tagName.toLowerCase() && t.ui.ie) && (e = {
                    top: 0,
                    left: 0
                }), {
                    top: e.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                    left: e.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
                }
            },
            _getRelativeOffset: function () {
                if ("relative" === this.cssPosition) {
                    var t = this.element.position();
                    return {
                        top: t.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                        left: t.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                    }
                }
                return {top: 0, left: 0}
            },
            _cacheMargins: function () {
                this.margins = {
                    left: parseInt(this.element.css("marginLeft"), 10) || 0,
                    top: parseInt(this.element.css("marginTop"), 10) || 0,
                    right: parseInt(this.element.css("marginRight"), 10) || 0,
                    bottom: parseInt(this.element.css("marginBottom"), 10) || 0
                }
            },
            _cacheHelperProportions: function () {
                this.helperProportions = {width: this.helper.outerWidth(), height: this.helper.outerHeight()}
            },
            _setContainment: function () {
                var e, i, s, n = this.options;
                return n.containment ? "window" === n.containment ? void(this.containment = [t(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, t(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, t(window).scrollLeft() + t(window).width() - this.helperProportions.width - this.margins.left, t(window).scrollTop() + (t(window).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]) : "document" === n.containment ? void(this.containment = [0, 0, t(document).width() - this.helperProportions.width - this.margins.left, (t(document).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]) : n.containment.constructor === Array ? void(this.containment = n.containment) : ("parent" === n.containment && (n.containment = this.helper[0].parentNode), i = t(n.containment), s = i[0], void(s && (e = "hidden" !== i.css("overflow"), this.containment = [(parseInt(i.css("borderLeftWidth"), 10) || 0) + (parseInt(i.css("paddingLeft"), 10) || 0), (parseInt(i.css("borderTopWidth"), 10) || 0) + (parseInt(i.css("paddingTop"), 10) || 0), (e ? Math.max(s.scrollWidth, s.offsetWidth) : s.offsetWidth) - (parseInt(i.css("borderRightWidth"), 10) || 0) - (parseInt(i.css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (e ? Math.max(s.scrollHeight, s.offsetHeight) : s.offsetHeight) - (parseInt(i.css("borderBottomWidth"), 10) || 0) - (parseInt(i.css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom], this.relative_container = i))) : void(this.containment = null)
            },
            _convertPositionTo: function (e, i) {
                i || (i = this.position);
                var s = "absolute" === e ? 1 : -1, n = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent;
                return this.offset.scroll || (this.offset.scroll = {
                    top: n.scrollTop(),
                    left: n.scrollLeft()
                }), {
                    top: i.top + this.offset.relative.top * s + this.offset.parent.top * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : this.offset.scroll.top) * s,
                    left: i.left + this.offset.relative.left * s + this.offset.parent.left * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : this.offset.scroll.left) * s
                }
            },
            _generatePosition: function (e) {
                var i, s, n, a, o = this.options, r = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent, l = e.pageX, h = e.pageY;
                return this.offset.scroll || (this.offset.scroll = {
                    top: r.scrollTop(),
                    left: r.scrollLeft()
                }), this.originalPosition && (this.containment && (this.relative_container ? (s = this.relative_container.offset(), i = [this.containment[0] + s.left, this.containment[1] + s.top, this.containment[2] + s.left, this.containment[3] + s.top]) : i = this.containment, e.pageX - this.offset.click.left < i[0] && (l = i[0] + this.offset.click.left), e.pageY - this.offset.click.top < i[1] && (h = i[1] + this.offset.click.top), e.pageX - this.offset.click.left > i[2] && (l = i[2] + this.offset.click.left), e.pageY - this.offset.click.top > i[3] && (h = i[3] + this.offset.click.top)), o.grid && (n = o.grid[1] ? this.originalPageY + Math.round((h - this.originalPageY) / o.grid[1]) * o.grid[1] : this.originalPageY, h = i ? n - this.offset.click.top >= i[1] || n - this.offset.click.top > i[3] ? n : n - this.offset.click.top >= i[1] ? n - o.grid[1] : n + o.grid[1] : n, a = o.grid[0] ? this.originalPageX + Math.round((l - this.originalPageX) / o.grid[0]) * o.grid[0] : this.originalPageX, l = i ? a - this.offset.click.left >= i[0] || a - this.offset.click.left > i[2] ? a : a - this.offset.click.left >= i[0] ? a - o.grid[0] : a + o.grid[0] : a)), {
                    top: h - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : this.offset.scroll.top),
                    left: l - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : this.offset.scroll.left)
                }
            },
            _clear: function () {
                this.helper.removeClass("ui-draggable-dragging"), this.helper[0] === this.element[0] || this.cancelHelperRemoval || this.helper.remove(), this.helper = null, this.cancelHelperRemoval = !1
            },
            _trigger: function (e, i, s) {
                return s = s || this._uiHash(), t.ui.plugin.call(this, e, [i, s]), "drag" === e && (this.positionAbs = this._convertPositionTo("absolute")), t.Widget.prototype._trigger.call(this, e, i, s)
            },
            plugins: {},
            _uiHash: function () {
                return {
                    helper: this.helper,
                    position: this.position,
                    originalPosition: this.originalPosition,
                    offset: this.positionAbs
                }
            }
        }), t.ui.plugin.add("draggable", "connectToSortable", {
            start: function (e, i) {
                var s = t(this).data("ui-draggable"), n = s.options, a = t.extend({}, i, {item: s.element});
                s.sortables = [], t(n.connectToSortable).each(function () {
                    var i = t.data(this, "ui-sortable");
                    i && !i.options.disabled && (s.sortables.push({
                        instance: i,
                        shouldRevert: i.options.revert
                    }), i.refreshPositions(), i._trigger("activate", e, a))
                })
            }, stop: function (e, i) {
                var s = t(this).data("ui-draggable"), n = t.extend({}, i, {item: s.element});
                t.each(s.sortables, function () {
                    this.instance.isOver ? (this.instance.isOver = 0, s.cancelHelperRemoval = !0, this.instance.cancelHelperRemoval = !1, this.shouldRevert && (this.instance.options.revert = this.shouldRevert), this.instance._mouseStop(e), this.instance.options.helper = this.instance.options._helper, "original" === s.options.helper && this.instance.currentItem.css({
                        top: "auto",
                        left: "auto"
                    })) : (this.instance.cancelHelperRemoval = !1, this.instance._trigger("deactivate", e, n))
                })
            }, drag: function (e, i) {
                var s = t(this).data("ui-draggable"), n = this;
                t.each(s.sortables, function () {
                    var a = !1, o = this;
                    this.instance.positionAbs = s.positionAbs, this.instance.helperProportions = s.helperProportions, this.instance.offset.click = s.offset.click, this.instance._intersectsWith(this.instance.containerCache) && (a = !0, t.each(s.sortables, function () {
                        return this.instance.positionAbs = s.positionAbs, this.instance.helperProportions = s.helperProportions, this.instance.offset.click = s.offset.click, this !== o && this.instance._intersectsWith(this.instance.containerCache) && t.contains(o.instance.element[0], this.instance.element[0]) && (a = !1), a
                    })), a ? (this.instance.isOver || (this.instance.isOver = 1, this.instance.currentItem = t(n).clone().removeAttr("id").appendTo(this.instance.element).data("ui-sortable-item", !0), this.instance.options._helper = this.instance.options.helper, this.instance.options.helper = function () {
                        return i.helper[0]
                    }, e.target = this.instance.currentItem[0], this.instance._mouseCapture(e, !0), this.instance._mouseStart(e, !0, !0), this.instance.offset.click.top = s.offset.click.top, this.instance.offset.click.left = s.offset.click.left, this.instance.offset.parent.left -= s.offset.parent.left - this.instance.offset.parent.left, this.instance.offset.parent.top -= s.offset.parent.top - this.instance.offset.parent.top, s._trigger("toSortable", e), s.dropped = this.instance.element, s.currentItem = s.element, this.instance.fromOutside = s), this.instance.currentItem && this.instance._mouseDrag(e)) : this.instance.isOver && (this.instance.isOver = 0, this.instance.cancelHelperRemoval = !0, this.instance.options.revert = !1, this.instance._trigger("out", e, this.instance._uiHash(this.instance)), this.instance._mouseStop(e, !0), this.instance.options.helper = this.instance.options._helper, this.instance.currentItem.remove(), this.instance.placeholder && this.instance.placeholder.remove(), s._trigger("fromSortable", e), s.dropped = !1)
                })
            }
        }), t.ui.plugin.add("draggable", "cursor", {
            start: function () {
                var e = t("body"), i = t(this).data("ui-draggable").options;
                e.css("cursor") && (i._cursor = e.css("cursor")), e.css("cursor", i.cursor)
            }, stop: function () {
                var e = t(this).data("ui-draggable").options;
                e._cursor && t("body").css("cursor", e._cursor)
            }
        }), t.ui.plugin.add("draggable", "opacity", {
            start: function (e, i) {
                var s = t(i.helper), n = t(this).data("ui-draggable").options;
                s.css("opacity") && (n._opacity = s.css("opacity")), s.css("opacity", n.opacity)
            }, stop: function (e, i) {
                var s = t(this).data("ui-draggable").options;
                s._opacity && t(i.helper).css("opacity", s._opacity)
            }
        }), t.ui.plugin.add("draggable", "scroll", {
            start: function () {
                var e = t(this).data("ui-draggable");
                e.scrollParent[0] !== document && "HTML" !== e.scrollParent[0].tagName && (e.overflowOffset = e.scrollParent.offset())
            }, drag: function (e) {
                var i = t(this).data("ui-draggable"), s = i.options, n = !1;
                i.scrollParent[0] !== document && "HTML" !== i.scrollParent[0].tagName ? (s.axis && "x" === s.axis || (i.overflowOffset.top + i.scrollParent[0].offsetHeight - e.pageY < s.scrollSensitivity ? i.scrollParent[0].scrollTop = n = i.scrollParent[0].scrollTop + s.scrollSpeed : e.pageY - i.overflowOffset.top < s.scrollSensitivity && (i.scrollParent[0].scrollTop = n = i.scrollParent[0].scrollTop - s.scrollSpeed)), s.axis && "y" === s.axis || (i.overflowOffset.left + i.scrollParent[0].offsetWidth - e.pageX < s.scrollSensitivity ? i.scrollParent[0].scrollLeft = n = i.scrollParent[0].scrollLeft + s.scrollSpeed : e.pageX - i.overflowOffset.left < s.scrollSensitivity && (i.scrollParent[0].scrollLeft = n = i.scrollParent[0].scrollLeft - s.scrollSpeed))) : (s.axis && "x" === s.axis || (e.pageY - t(document).scrollTop() < s.scrollSensitivity ? n = t(document).scrollTop(t(document).scrollTop() - s.scrollSpeed) : t(window).height() - (e.pageY - t(document).scrollTop()) < s.scrollSensitivity && (n = t(document).scrollTop(t(document).scrollTop() + s.scrollSpeed))), s.axis && "y" === s.axis || (e.pageX - t(document).scrollLeft() < s.scrollSensitivity ? n = t(document).scrollLeft(t(document).scrollLeft() - s.scrollSpeed) : t(window).width() - (e.pageX - t(document).scrollLeft()) < s.scrollSensitivity && (n = t(document).scrollLeft(t(document).scrollLeft() + s.scrollSpeed)))), n !== !1 && t.ui.ddmanager && !s.dropBehaviour && t.ui.ddmanager.prepareOffsets(i, e)
            }
        }), t.ui.plugin.add("draggable", "snap", {
            start: function () {
                var e = t(this).data("ui-draggable"), i = e.options;
                e.snapElements = [], t(i.snap.constructor !== String ? i.snap.items || ":data(ui-draggable)" : i.snap).each(function () {
                    var i = t(this), s = i.offset();
                    this !== e.element[0] && e.snapElements.push({
                        item: this,
                        width: i.outerWidth(),
                        height: i.outerHeight(),
                        top: s.top,
                        left: s.left
                    })
                })
            }, drag: function (e, i) {
                var s, n, a, o, r, l, h, c, u, d, p = t(this).data("ui-draggable"), g = p.options, f = g.snapTolerance, m = i.offset.left, v = m + p.helperProportions.width, _ = i.offset.top, b = _ + p.helperProportions.height;
                for (u = p.snapElements.length - 1; u >= 0; u--)r = p.snapElements[u].left, l = r + p.snapElements[u].width, h = p.snapElements[u].top, c = h + p.snapElements[u].height, r - f > v || m > l + f || h - f > b || _ > c + f || !t.contains(p.snapElements[u].item.ownerDocument, p.snapElements[u].item) ? (p.snapElements[u].snapping && p.options.snap.release && p.options.snap.release.call(p.element, e, t.extend(p._uiHash(), {snapItem: p.snapElements[u].item})), p.snapElements[u].snapping = !1) : ("inner" !== g.snapMode && (s = f >= Math.abs(h - b), n = f >= Math.abs(c - _), a = f >= Math.abs(r - v), o = f >= Math.abs(l - m), s && (i.position.top = p._convertPositionTo("relative", {
                    top: h - p.helperProportions.height,
                    left: 0
                }).top - p.margins.top), n && (i.position.top = p._convertPositionTo("relative", {
                    top: c,
                    left: 0
                }).top - p.margins.top), a && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: r - p.helperProportions.width
                }).left - p.margins.left), o && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: l
                }).left - p.margins.left)), d = s || n || a || o, "outer" !== g.snapMode && (s = f >= Math.abs(h - _), n = f >= Math.abs(c - b), a = f >= Math.abs(r - m), o = f >= Math.abs(l - v), s && (i.position.top = p._convertPositionTo("relative", {
                    top: h,
                    left: 0
                }).top - p.margins.top), n && (i.position.top = p._convertPositionTo("relative", {
                    top: c - p.helperProportions.height,
                    left: 0
                }).top - p.margins.top), a && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: r
                }).left - p.margins.left), o && (i.position.left = p._convertPositionTo("relative", {
                    top: 0,
                    left: l - p.helperProportions.width
                }).left - p.margins.left)), !p.snapElements[u].snapping && (s || n || a || o || d) && p.options.snap.snap && p.options.snap.snap.call(p.element, e, t.extend(p._uiHash(), {snapItem: p.snapElements[u].item})), p.snapElements[u].snapping = s || n || a || o || d)
            }
        }), t.ui.plugin.add("draggable", "stack", {
            start: function () {
                var e, i = this.data("ui-draggable").options, s = t.makeArray(t(i.stack)).sort(function (e, i) {
                    return (parseInt(t(e).css("zIndex"), 10) || 0) - (parseInt(t(i).css("zIndex"), 10) || 0)
                });
                s.length && (e = parseInt(t(s[0]).css("zIndex"), 10) || 0, t(s).each(function (i) {
                    t(this).css("zIndex", e + i)
                }), this.css("zIndex", e + s.length))
            }
        }), t.ui.plugin.add("draggable", "zIndex", {
            start: function (e, i) {
                var s = t(i.helper), n = t(this).data("ui-draggable").options;
                s.css("zIndex") && (n._zIndex = s.css("zIndex")), s.css("zIndex", n.zIndex)
            }, stop: function (e, i) {
                var s = t(this).data("ui-draggable").options;
                s._zIndex && t(i.helper).css("zIndex", s._zIndex)
            }
        })
    }(jQuery), function (t) {
        function e(t, e, i) {
            return t > e && e + i > t
        }

        t.widget("ui.droppable", {
            version: "1.10.4",
            widgetEventPrefix: "drop",
            options: {
                accept: "*",
                activeClass: !1,
                addClasses: !0,
                greedy: !1,
                hoverClass: !1,
                scope: "default",
                tolerance: "intersect",
                activate: null,
                deactivate: null,
                drop: null,
                out: null,
                over: null
            },
            _create: function () {
                var e, i = this.options, s = i.accept;
                this.isover = !1, this.isout = !0, this.accept = t.isFunction(s) ? s : function (t) {
                    return t.is(s)
                }, this.proportions = function () {
                    return arguments.length ? void(e = arguments[0]) : e ? e : e = {
                        width: this.element[0].offsetWidth,
                        height: this.element[0].offsetHeight
                    }
                }, t.ui.ddmanager.droppables[i.scope] = t.ui.ddmanager.droppables[i.scope] || [], t.ui.ddmanager.droppables[i.scope].push(this), i.addClasses && this.element.addClass("ui-droppable")
            },
            _destroy: function () {
                for (var e = 0, i = t.ui.ddmanager.droppables[this.options.scope]; i.length > e; e++)i[e] === this && i.splice(e, 1);
                this.element.removeClass("ui-droppable ui-droppable-disabled")
            },
            _setOption: function (e, i) {
                "accept" === e && (this.accept = t.isFunction(i) ? i : function (t) {
                    return t.is(i)
                }), t.Widget.prototype._setOption.apply(this, arguments)
            },
            _activate: function (e) {
                var i = t.ui.ddmanager.current;
                this.options.activeClass && this.element.addClass(this.options.activeClass), i && this._trigger("activate", e, this.ui(i))
            },
            _deactivate: function (e) {
                var i = t.ui.ddmanager.current;
                this.options.activeClass && this.element.removeClass(this.options.activeClass), i && this._trigger("deactivate", e, this.ui(i))
            },
            _over: function (e) {
                var i = t.ui.ddmanager.current;
                i && (i.currentItem || i.element)[0] !== this.element[0] && this.accept.call(this.element[0], i.currentItem || i.element) && (this.options.hoverClass && this.element.addClass(this.options.hoverClass), this._trigger("over", e, this.ui(i)))
            },
            _out: function (e) {
                var i = t.ui.ddmanager.current;
                i && (i.currentItem || i.element)[0] !== this.element[0] && this.accept.call(this.element[0], i.currentItem || i.element) && (this.options.hoverClass && this.element.removeClass(this.options.hoverClass), this._trigger("out", e, this.ui(i)))
            },
            _drop: function (e, i) {
                var s = i || t.ui.ddmanager.current, n = !1;
                return s && (s.currentItem || s.element)[0] !== this.element[0] ? (this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function () {
                    var e = t.data(this, "ui-droppable");
                    return e.options.greedy && !e.options.disabled && e.options.scope === s.options.scope && e.accept.call(e.element[0], s.currentItem || s.element) && t.ui.intersect(s, t.extend(e, {offset: e.element.offset()}), e.options.tolerance) ? (n = !0, !1) : void 0
                }), n ? !1 : this.accept.call(this.element[0], s.currentItem || s.element) ? (this.options.activeClass && this.element.removeClass(this.options.activeClass), this.options.hoverClass && this.element.removeClass(this.options.hoverClass), this._trigger("drop", e, this.ui(s)), this.element) : !1) : !1
            },
            ui: function (t) {
                return {
                    draggable: t.currentItem || t.element,
                    helper: t.helper,
                    position: t.position,
                    offset: t.positionAbs
                }
            }
        }), t.ui.intersect = function (t, i, s) {
            if (!i.offset)return !1;
            var n, a, o = (t.positionAbs || t.position.absolute).left, r = (t.positionAbs || t.position.absolute).top, l = o + t.helperProportions.width, h = r + t.helperProportions.height, c = i.offset.left, u = i.offset.top, d = c + i.proportions().width, p = u + i.proportions().height;
            switch (s) {
                case"fit":
                    return o >= c && d >= l && r >= u && p >= h;
                case"intersect":
                    return o + t.helperProportions.width / 2 > c && d > l - t.helperProportions.width / 2 && r + t.helperProportions.height / 2 > u && p > h - t.helperProportions.height / 2;
                case"pointer":
                    return n = (t.positionAbs || t.position.absolute).left + (t.clickOffset || t.offset.click).left, a = (t.positionAbs || t.position.absolute).top + (t.clickOffset || t.offset.click).top, e(a, u, i.proportions().height) && e(n, c, i.proportions().width);
                case"touch":
                    return (r >= u && p >= r || h >= u && p >= h || u > r && h > p) && (o >= c && d >= o || l >= c && d >= l || c > o && l > d);
                default:
                    return !1
            }
        }, t.ui.ddmanager = {
            current: null, droppables: {"default": []}, prepareOffsets: function (e, i) {
                var s, n, a = t.ui.ddmanager.droppables[e.options.scope] || [], o = i ? i.type : null, r = (e.currentItem || e.element).find(":data(ui-droppable)").addBack();
                t:for (s = 0; a.length > s; s++)if (!(a[s].options.disabled || e && !a[s].accept.call(a[s].element[0], e.currentItem || e.element))) {
                    for (n = 0; r.length > n; n++)if (r[n] === a[s].element[0]) {
                        a[s].proportions().height = 0;
                        continue t
                    }
                    a[s].visible = "none" !== a[s].element.css("display"), a[s].visible && ("mousedown" === o && a[s]._activate.call(a[s], i), a[s].offset = a[s].element.offset(), a[s].proportions({
                        width: a[s].element[0].offsetWidth,
                        height: a[s].element[0].offsetHeight
                    }))
                }
            }, drop: function (e, i) {
                var s = !1;
                return t.each((t.ui.ddmanager.droppables[e.options.scope] || []).slice(), function () {
                    this.options && (!this.options.disabled && this.visible && t.ui.intersect(e, this, this.options.tolerance) && (s = this._drop.call(this, i) || s), !this.options.disabled && this.visible && this.accept.call(this.element[0], e.currentItem || e.element) && (this.isout = !0, this.isover = !1, this._deactivate.call(this, i)))
                }), s
            }, dragStart: function (e, i) {
                e.element.parentsUntil("body").bind("scroll.droppable", function () {
                    e.options.refreshPositions || t.ui.ddmanager.prepareOffsets(e, i)
                })
            }, drag: function (e, i) {
                e.options.refreshPositions && t.ui.ddmanager.prepareOffsets(e, i), t.each(t.ui.ddmanager.droppables[e.options.scope] || [], function () {
                    if (!this.options.disabled && !this.greedyChild && this.visible) {
                        var s, n, a, o = t.ui.intersect(e, this, this.options.tolerance), r = !o && this.isover ? "isout" : o && !this.isover ? "isover" : null;
                        r && (this.options.greedy && (n = this.options.scope, a = this.element.parents(":data(ui-droppable)").filter(function () {
                            return t.data(this, "ui-droppable").options.scope === n
                        }), a.length && (s = t.data(a[0], "ui-droppable"), s.greedyChild = "isover" === r)), s && "isover" === r && (s.isover = !1, s.isout = !0, s._out.call(s, i)), this[r] = !0, this["isout" === r ? "isover" : "isout"] = !1, this["isover" === r ? "_over" : "_out"].call(this, i), s && "isout" === r && (s.isout = !1, s.isover = !0, s._over.call(s, i)))
                    }
                })
            }, dragStop: function (e, i) {
                e.element.parentsUntil("body").unbind("scroll.droppable"), e.options.refreshPositions || t.ui.ddmanager.prepareOffsets(e, i)
            }
        }
    }(jQuery), function (t, e) {
        var i = "ui-effects-";
        t.effects = {effect: {}}, function (t, e) {
            function i(t, e, i) {
                var s = u[e.type] || {};
                return null == t ? i || !e.def ? null : e.def : (t = s.floor ? ~~t : parseFloat(t), isNaN(t) ? e.def : s.mod ? (t + s.mod) % s.mod : 0 > t ? 0 : t > s.max ? s.max : t)
            }

            function s(i) {
                var s = h(), n = s._rgba = [];
                return i = i.toLowerCase(), f(l, function (t, a) {
                    var o, r = a.re.exec(i), l = r && a.parse(r), h = a.space || "rgba";
                    return l ? (o = s[h](l), s[c[h].cache] = o[c[h].cache], n = s._rgba = o._rgba, !1) : e
                }), n.length ? ("0,0,0,0" === n.join() && t.extend(n, a.transparent), s) : a[i]
            }

            function n(t, e, i) {
                return i = (i + 1) % 1, 1 > 6 * i ? t + 6 * (e - t) * i : 1 > 2 * i ? e : 2 > 3 * i ? t + 6 * (e - t) * (2 / 3 - i) : t
            }

            var a, o = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor", r = /^([\-+])=\s*(\d+\.?\d*)/, l = [{
                re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                parse: function (t) {
                    return [t[1], t[2], t[3], t[4]]
                }
            }, {
                re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                parse: function (t) {
                    return [2.55 * t[1], 2.55 * t[2], 2.55 * t[3], t[4]]
                }
            }, {
                re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/, parse: function (t) {
                    return [parseInt(t[1], 16), parseInt(t[2], 16), parseInt(t[3], 16)]
                }
            }, {
                re: /#([a-f0-9])([a-f0-9])([a-f0-9])/, parse: function (t) {
                    return [parseInt(t[1] + t[1], 16), parseInt(t[2] + t[2], 16), parseInt(t[3] + t[3], 16)]
                }
            }, {
                re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                space: "hsla",
                parse: function (t) {
                    return [t[1], t[2] / 100, t[3] / 100, t[4]]
                }
            }], h = t.Color = function (e, i, s, n) {
                return new t.Color.fn.parse(e, i, s, n)
            }, c = {
                rgba: {
                    props: {
                        red: {idx: 0, type: "byte"},
                        green: {idx: 1, type: "byte"},
                        blue: {idx: 2, type: "byte"}
                    }
                },
                hsla: {
                    props: {
                        hue: {idx: 0, type: "degrees"},
                        saturation: {idx: 1, type: "percent"},
                        lightness: {idx: 2, type: "percent"}
                    }
                }
            }, u = {
                "byte": {floor: !0, max: 255},
                percent: {max: 1},
                degrees: {mod: 360, floor: !0}
            }, d = h.support = {}, p = t("<p>")[0], f = t.each;
            p.style.cssText = "background-color:rgba(1,1,1,.5)", d.rgba = p.style.backgroundColor.indexOf("rgba") > -1, f(c, function (t, e) {
                e.cache = "_" + t, e.props.alpha = {idx: 3, type: "percent", def: 1}
            }), h.fn = t.extend(h.prototype, {
                parse: function (n, o, r, l) {
                    if (n === e)return this._rgba = [null, null, null, null], this;
                    (n.jquery || n.nodeType) && (n = t(n).css(o), o = e);
                    var u = this, d = t.type(n), p = this._rgba = [];
                    return o !== e && (n = [n, o, r, l], d = "array"), "string" === d ? this.parse(s(n) || a._default) : "array" === d ? (f(c.rgba.props, function (t, e) {
                        p[e.idx] = i(n[e.idx], e)
                    }), this) : "object" === d ? (n instanceof h ? f(c, function (t, e) {
                        n[e.cache] && (u[e.cache] = n[e.cache].slice())
                    }) : f(c, function (e, s) {
                        var a = s.cache;
                        f(s.props, function (t, e) {
                            if (!u[a] && s.to) {
                                if ("alpha" === t || null == n[t])return;
                                u[a] = s.to(u._rgba)
                            }
                            u[a][e.idx] = i(n[t], e, !0)
                        }), u[a] && 0 > t.inArray(null, u[a].slice(0, 3)) && (u[a][3] = 1, s.from && (u._rgba = s.from(u[a])))
                    }), this) : e
                }, is: function (t) {
                    var i = h(t), s = !0, n = this;
                    return f(c, function (t, a) {
                        var o, r = i[a.cache];
                        return r && (o = n[a.cache] || a.to && a.to(n._rgba) || [], f(a.props, function (t, i) {
                            return null != r[i.idx] ? s = r[i.idx] === o[i.idx] : e
                        })), s
                    }), s
                }, _space: function () {
                    var t = [], e = this;
                    return f(c, function (i, s) {
                        e[s.cache] && t.push(i)
                    }), t.pop()
                }, transition: function (t, e) {
                    var s = h(t), n = s._space(), a = c[n], o = 0 === this.alpha() ? h("transparent") : this, r = o[a.cache] || a.to(o._rgba), l = r.slice();
                    return s = s[a.cache], f(a.props, function (t, n) {
                        var a = n.idx, o = r[a], h = s[a], c = u[n.type] || {};
                        null !== h && (null === o ? l[a] = h : (c.mod && (h - o > c.mod / 2 ? o += c.mod : o - h > c.mod / 2 && (o -= c.mod)), l[a] = i((h - o) * e + o, n)))
                    }), this[n](l)
                }, blend: function (e) {
                    if (1 === this._rgba[3])return this;
                    var i = this._rgba.slice(), s = i.pop(), n = h(e)._rgba;
                    return h(t.map(i, function (t, e) {
                        return (1 - s) * n[e] + s * t
                    }))
                }, toRgbaString: function () {
                    var e = "rgba(", i = t.map(this._rgba, function (t, e) {
                        return null == t ? e > 2 ? 1 : 0 : t
                    });
                    return 1 === i[3] && (i.pop(), e = "rgb("), e + i.join() + ")"
                }, toHslaString: function () {
                    var e = "hsla(", i = t.map(this.hsla(), function (t, e) {
                        return null == t && (t = e > 2 ? 1 : 0), e && 3 > e && (t = Math.round(100 * t) + "%"), t
                    });
                    return 1 === i[3] && (i.pop(), e = "hsl("), e + i.join() + ")"
                }, toHexString: function (e) {
                    var i = this._rgba.slice(), s = i.pop();
                    return e && i.push(~~(255 * s)), "#" + t.map(i, function (t) {
                        return t = (t || 0).toString(16), 1 === t.length ? "0" + t : t
                    }).join("")
                }, toString: function () {
                    return 0 === this._rgba[3] ? "transparent" : this.toRgbaString()
                }
            }), h.fn.parse.prototype = h.fn, c.hsla.to = function (t) {
                if (null == t[0] || null == t[1] || null == t[2])return [null, null, null, t[3]];
                var e, i, s = t[0] / 255, n = t[1] / 255, a = t[2] / 255, o = t[3], r = Math.max(s, n, a), l = Math.min(s, n, a), h = r - l, c = r + l, u = .5 * c;
                return e = l === r ? 0 : s === r ? 60 * (n - a) / h + 360 : n === r ? 60 * (a - s) / h + 120 : 60 * (s - n) / h + 240, i = 0 === h ? 0 : .5 >= u ? h / c : h / (2 - c), [Math.round(e) % 360, i, u, null == o ? 1 : o]
            }, c.hsla.from = function (t) {
                if (null == t[0] || null == t[1] || null == t[2])return [null, null, null, t[3]];
                var e = t[0] / 360, i = t[1], s = t[2], a = t[3], o = .5 >= s ? s * (1 + i) : s + i - s * i, r = 2 * s - o;
                return [Math.round(255 * n(r, o, e + 1 / 3)), Math.round(255 * n(r, o, e)), Math.round(255 * n(r, o, e - 1 / 3)), a]
            }, f(c, function (s, n) {
                var a = n.props, o = n.cache, l = n.to, c = n.from;
                h.fn[s] = function (s) {
                    if (l && !this[o] && (this[o] = l(this._rgba)), s === e)return this[o].slice();
                    var n, r = t.type(s), u = "array" === r || "object" === r ? s : arguments, d = this[o].slice();
                    return f(a, function (t, e) {
                        var s = u["object" === r ? t : e.idx];
                        null == s && (s = d[e.idx]), d[e.idx] = i(s, e)
                    }), c ? (n = h(c(d)), n[o] = d, n) : h(d)
                }, f(a, function (e, i) {
                    h.fn[e] || (h.fn[e] = function (n) {
                        var a, o = t.type(n), l = "alpha" === e ? this._hsla ? "hsla" : "rgba" : s, h = this[l](), c = h[i.idx];
                        return "undefined" === o ? c : ("function" === o && (n = n.call(this, c), o = t.type(n)), null == n && i.empty ? this : ("string" === o && (a = r.exec(n), a && (n = c + parseFloat(a[2]) * ("+" === a[1] ? 1 : -1))), h[i.idx] = n, this[l](h)))
                    })
                })
            }), h.hook = function (e) {
                var i = e.split(" ");
                f(i, function (e, i) {
                    t.cssHooks[i] = {
                        set: function (e, n) {
                            var a, o, r = "";
                            if ("transparent" !== n && ("string" !== t.type(n) || (a = s(n)))) {
                                if (n = h(a || n), !d.rgba && 1 !== n._rgba[3]) {
                                    for (o = "backgroundColor" === i ? e.parentNode : e; ("" === r || "transparent" === r) && o && o.style;)try {
                                        r = t.css(o, "backgroundColor"), o = o.parentNode
                                    } catch (l) {
                                    }
                                    n = n.blend(r && "transparent" !== r ? r : "_default")
                                }
                                n = n.toRgbaString()
                            }
                            try {
                                e.style[i] = n
                            } catch (l) {
                            }
                        }
                    }, t.fx.step[i] = function (e) {
                        e.colorInit || (e.start = h(e.elem, i), e.end = h(e.end), e.colorInit = !0), t.cssHooks[i].set(e.elem, e.start.transition(e.end, e.pos))
                    }
                })
            }, h.hook(o), t.cssHooks.borderColor = {
                expand: function (t) {
                    var e = {};
                    return f(["Top", "Right", "Bottom", "Left"], function (i, s) {
                        e["border" + s + "Color"] = t
                    }), e
                }
            }, a = t.Color.names = {
                aqua: "#00ffff",
                black: "#000000",
                blue: "#0000ff",
                fuchsia: "#ff00ff",
                gray: "#808080",
                green: "#008000",
                lime: "#00ff00",
                maroon: "#800000",
                navy: "#000080",
                olive: "#808000",
                purple: "#800080",
                red: "#ff0000",
                silver: "#c0c0c0",
                teal: "#008080",
                white: "#ffffff",
                yellow: "#ffff00",
                transparent: [null, null, null, 0],
                _default: "#ffffff"
            }
        }(jQuery), function () {
            function i(e) {
                var i, s, n = e.ownerDocument.defaultView ? e.ownerDocument.defaultView.getComputedStyle(e, null) : e.currentStyle, a = {};
                if (n && n.length && n[0] && n[n[0]])for (s = n.length; s--;)i = n[s], "string" == typeof n[i] && (a[t.camelCase(i)] = n[i]); else for (i in n)"string" == typeof n[i] && (a[i] = n[i]);
                return a
            }

            function s(e, i) {
                var s, n, o = {};
                for (s in i)n = i[s], e[s] !== n && (a[s] || (t.fx.step[s] || !isNaN(parseFloat(n))) && (o[s] = n));
                return o
            }

            var n = ["add", "remove", "toggle"], a = {
                border: 1,
                borderBottom: 1,
                borderColor: 1,
                borderLeft: 1,
                borderRight: 1,
                borderTop: 1,
                borderWidth: 1,
                margin: 1,
                padding: 1
            };
            t.each(["borderLeftStyle", "borderRightStyle", "borderBottomStyle", "borderTopStyle"], function (e, i) {
                t.fx.step[i] = function (t) {
                    ("none" !== t.end && !t.setAttr || 1 === t.pos && !t.setAttr) && (jQuery.style(t.elem, i, t.end), t.setAttr = !0)
                }
            }), t.fn.addBack || (t.fn.addBack = function (t) {
                return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
            }), t.effects.animateClass = function (e, a, o, r) {
                var l = t.speed(a, o, r);
                return this.queue(function () {
                    var a, o = t(this), r = o.attr("class") || "", h = l.children ? o.find("*").addBack() : o;
                    h = h.map(function () {
                        var e = t(this);
                        return {el: e, start: i(this)}
                    }), a = function () {
                        t.each(n, function (t, i) {
                            e[i] && o[i + "Class"](e[i])
                        })
                    }, a(), h = h.map(function () {
                        return this.end = i(this.el[0]), this.diff = s(this.start, this.end), this
                    }), o.attr("class", r), h = h.map(function () {
                        var e = this, i = t.Deferred(), s = t.extend({}, l, {
                            queue: !1, complete: function () {
                                i.resolve(e)
                            }
                        });
                        return this.el.animate(this.diff, s), i.promise()
                    }), t.when.apply(t, h.get()).done(function () {
                        a(), t.each(arguments, function () {
                            var e = this.el;
                            t.each(this.diff, function (t) {
                                e.css(t, "")
                            })
                        }), l.complete.call(o[0])
                    })
                })
            }, t.fn.extend({
                addClass: function (e) {
                    return function (i, s, n, a) {
                        return s ? t.effects.animateClass.call(this, {add: i}, s, n, a) : e.apply(this, arguments)
                    }
                }(t.fn.addClass), removeClass: function (e) {
                    return function (i, s, n, a) {
                        return arguments.length > 1 ? t.effects.animateClass.call(this, {remove: i}, s, n, a) : e.apply(this, arguments)
                    }
                }(t.fn.removeClass), toggleClass: function (i) {
                    return function (s, n, a, o, r) {
                        return "boolean" == typeof n || n === e ? a ? t.effects.animateClass.call(this, n ? {add: s} : {remove: s}, a, o, r) : i.apply(this, arguments) : t.effects.animateClass.call(this, {toggle: s}, n, a, o)
                    }
                }(t.fn.toggleClass), switchClass: function (e, i, s, n, a) {
                    return t.effects.animateClass.call(this, {add: i, remove: e}, s, n, a)
                }
            })
        }(), function () {
            function s(e, i, s, n) {
                return t.isPlainObject(e) && (i = e, e = e.effect), e = {effect: e}, null == i && (i = {}), t.isFunction(i) && (n = i, s = null, i = {}), ("number" == typeof i || t.fx.speeds[i]) && (n = s, s = i, i = {}), t.isFunction(s) && (n = s, s = null), i && t.extend(e, i), s = s || i.duration, e.duration = t.fx.off ? 0 : "number" == typeof s ? s : s in t.fx.speeds ? t.fx.speeds[s] : t.fx.speeds._default, e.complete = n || i.complete, e
            }

            function n(e) {
                return !e || "number" == typeof e || t.fx.speeds[e] ? !0 : "string" != typeof e || t.effects.effect[e] ? t.isFunction(e) ? !0 : "object" != typeof e || e.effect ? !1 : !0 : !0
            }

            t.extend(t.effects, {
                version: "1.10.4", save: function (t, e) {
                    for (var s = 0; e.length > s; s++)null !== e[s] && t.data(i + e[s], t[0].style[e[s]])
                }, restore: function (t, s) {
                    var n, a;
                    for (a = 0; s.length > a; a++)null !== s[a] && (n = t.data(i + s[a]), n === e && (n = ""), t.css(s[a], n))
                }, setMode: function (t, e) {
                    return "toggle" === e && (e = t.is(":hidden") ? "show" : "hide"), e
                }, getBaseline: function (t, e) {
                    var i, s;
                    switch (t[0]) {
                        case"top":
                            i = 0;
                            break;
                        case"middle":
                            i = .5;
                            break;
                        case"bottom":
                            i = 1;
                            break;
                        default:
                            i = t[0] / e.height
                    }
                    switch (t[1]) {
                        case"left":
                            s = 0;
                            break;
                        case"center":
                            s = .5;
                            break;
                        case"right":
                            s = 1;
                            break;
                        default:
                            s = t[1] / e.width
                    }
                    return {x: s, y: i}
                }, createWrapper: function (e) {
                    if (e.parent().is(".ui-effects-wrapper"))return e.parent();
                    var i = {
                        width: e.outerWidth(!0),
                        height: e.outerHeight(!0),
                        "float": e.css("float")
                    }, s = t("<div></div>").addClass("ui-effects-wrapper").css({
                        fontSize: "100%",
                        background: "transparent",
                        border: "none",
                        margin: 0,
                        padding: 0
                    }), n = {width: e.width(), height: e.height()}, a = document.activeElement;
                    try {
                        a.id
                    } catch (o) {
                        a = document.body
                    }
                    return e.wrap(s), (e[0] === a || t.contains(e[0], a)) && t(a).focus(), s = e.parent(), "static" === e.css("position") ? (s.css({position: "relative"}), e.css({position: "relative"})) : (t.extend(i, {
                        position: e.css("position"),
                        zIndex: e.css("z-index")
                    }), t.each(["top", "left", "bottom", "right"], function (t, s) {
                        i[s] = e.css(s), isNaN(parseInt(i[s], 10)) && (i[s] = "auto")
                    }), e.css({
                        position: "relative",
                        top: 0,
                        left: 0,
                        right: "auto",
                        bottom: "auto"
                    })), e.css(n), s.css(i).show()
                }, removeWrapper: function (e) {
                    var i = document.activeElement;
                    return e.parent().is(".ui-effects-wrapper") && (e.parent().replaceWith(e), (e[0] === i || t.contains(e[0], i)) && t(i).focus()), e
                }, setTransition: function (e, i, s, n) {
                    return n = n || {}, t.each(i, function (t, i) {
                        var a = e.cssUnit(i);
                        a[0] > 0 && (n[i] = a[0] * s + a[1])
                    }), n
                }
            }), t.fn.extend({
                effect: function () {
                    function e(e) {
                        function s() {
                            t.isFunction(a) && a.call(n[0]), t.isFunction(e) && e()
                        }

                        var n = t(this), a = i.complete, r = i.mode;
                        (n.is(":hidden") ? "hide" === r : "show" === r) ? (n[r](), s()) : o.call(n[0], i, s)
                    }

                    var i = s.apply(this, arguments), n = i.mode, a = i.queue, o = t.effects.effect[i.effect];
                    return t.fx.off || !o ? n ? this[n](i.duration, i.complete) : this.each(function () {
                        i.complete && i.complete.call(this)
                    }) : a === !1 ? this.each(e) : this.queue(a || "fx", e)
                }, show: function (t) {
                    return function (e) {
                        if (n(e))return t.apply(this, arguments);
                        var i = s.apply(this, arguments);
                        return i.mode = "show", this.effect.call(this, i)
                    }
                }(t.fn.show), hide: function (t) {
                    return function (e) {
                        if (n(e))return t.apply(this, arguments);
                        var i = s.apply(this, arguments);
                        return i.mode = "hide", this.effect.call(this, i)
                    }
                }(t.fn.hide), toggle: function (t) {
                    return function (e) {
                        if (n(e) || "boolean" == typeof e)return t.apply(this, arguments);
                        var i = s.apply(this, arguments);
                        return i.mode = "toggle", this.effect.call(this, i)
                    }
                }(t.fn.toggle), cssUnit: function (e) {
                    var i = this.css(e), s = [];
                    return t.each(["em", "px", "%", "pt"], function (t, e) {
                        i.indexOf(e) > 0 && (s = [parseFloat(i), e])
                    }), s
                }
            })
        }(), function () {
            var e = {};
            t.each(["Quad", "Cubic", "Quart", "Quint", "Expo"], function (t, i) {
                e[i] = function (e) {
                    return Math.pow(e, t + 2)
                }
            }), t.extend(e, {
                Sine: function (t) {
                    return 1 - Math.cos(t * Math.PI / 2)
                }, Circ: function (t) {
                    return 1 - Math.sqrt(1 - t * t)
                }, Elastic: function (t) {
                    return 0 === t || 1 === t ? t : -Math.pow(2, 8 * (t - 1)) * Math.sin((80 * (t - 1) - 7.5) * Math.PI / 15)
                }, Back: function (t) {
                    return t * t * (3 * t - 2)
                }, Bounce: function (t) {
                    for (var e, i = 4; ((e = Math.pow(2, --i)) - 1) / 11 > t;);
                    return 1 / Math.pow(4, 3 - i) - 7.5625 * Math.pow((3 * e - 2) / 22 - t, 2)
                }
            }), t.each(e, function (e, i) {
                t.easing["easeIn" + e] = i, t.easing["easeOut" + e] = function (t) {
                    return 1 - i(1 - t)
                }, t.easing["easeInOut" + e] = function (t) {
                    return .5 > t ? i(2 * t) / 2 : 1 - i(-2 * t + 2) / 2
                }
            })
        }()
    }(jQuery), function (t) {
        var e = /up|down|vertical/, i = /up|left|vertical|horizontal/;
        t.effects.effect.blind = function (s, n) {
            var a, o, r, l = t(this), h = ["position", "top", "bottom", "left", "right", "height", "width"], c = t.effects.setMode(l, s.mode || "hide"), u = s.direction || "up", d = e.test(u), p = d ? "height" : "width", f = d ? "top" : "left", g = i.test(u), m = {}, v = "show" === c;
            l.parent().is(".ui-effects-wrapper") ? t.effects.save(l.parent(), h) : t.effects.save(l, h), l.show(), a = t.effects.createWrapper(l).css({overflow: "hidden"}), o = a[p](), r = parseFloat(a.css(f)) || 0, m[p] = v ? o : 0, g || (l.css(d ? "bottom" : "right", 0).css(d ? "top" : "left", "auto").css({position: "absolute"}), m[f] = v ? r : o + r), v && (a.css(p, 0), g || a.css(f, r + o)), a.animate(m, {
                duration: s.duration,
                easing: s.easing,
                queue: !1,
                complete: function () {
                    "hide" === c && l.hide(), t.effects.restore(l, h), t.effects.removeWrapper(l), n()
                }
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.bounce = function (e, i) {
            var s, n, a, o = t(this), r = ["position", "top", "bottom", "left", "right", "height", "width"], l = t.effects.setMode(o, e.mode || "effect"), h = "hide" === l, c = "show" === l, u = e.direction || "up", d = e.distance, p = e.times || 5, f = 2 * p + (c || h ? 1 : 0), g = e.duration / f, m = e.easing, v = "up" === u || "down" === u ? "top" : "left", _ = "up" === u || "left" === u, b = o.queue(), y = b.length;
            for ((c || h) && r.push("opacity"), t.effects.save(o, r), o.show(), t.effects.createWrapper(o), d || (d = o["top" === v ? "outerHeight" : "outerWidth"]() / 3), c && (a = {opacity: 1}, a[v] = 0, o.css("opacity", 0).css(v, _ ? 2 * -d : 2 * d).animate(a, g, m)), h && (d /= Math.pow(2, p - 1)), a = {}, a[v] = 0, s = 0; p > s; s++)n = {}, n[v] = (_ ? "-=" : "+=") + d, o.animate(n, g, m).animate(a, g, m), d = h ? 2 * d : d / 2;
            h && (n = {opacity: 0}, n[v] = (_ ? "-=" : "+=") + d, o.animate(n, g, m)), o.queue(function () {
                h && o.hide(), t.effects.restore(o, r), t.effects.removeWrapper(o), i()
            }), y > 1 && b.splice.apply(b, [1, 0].concat(b.splice(y, f + 1))), o.dequeue()
        }
    }(jQuery), function (t) {
        t.effects.effect.clip = function (e, i) {
            var s, n, a, o = t(this), r = ["position", "top", "bottom", "left", "right", "height", "width"], l = t.effects.setMode(o, e.mode || "hide"), h = "show" === l, c = e.direction || "vertical", u = "vertical" === c, d = u ? "height" : "width", p = u ? "top" : "left", f = {};
            t.effects.save(o, r), o.show(), s = t.effects.createWrapper(o).css({overflow: "hidden"}), n = "IMG" === o[0].tagName ? s : o, a = n[d](), h && (n.css(d, 0), n.css(p, a / 2)), f[d] = h ? a : 0, f[p] = h ? 0 : a / 2, n.animate(f, {
                queue: !1,
                duration: e.duration,
                easing: e.easing,
                complete: function () {
                    h || o.hide(), t.effects.restore(o, r), t.effects.removeWrapper(o), i()
                }
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.drop = function (e, i) {
            var s, n = t(this), a = ["position", "top", "bottom", "left", "right", "opacity", "height", "width"], o = t.effects.setMode(n, e.mode || "hide"), r = "show" === o, l = e.direction || "left", h = "up" === l || "down" === l ? "top" : "left", c = "up" === l || "left" === l ? "pos" : "neg", u = {opacity: r ? 1 : 0};
            t.effects.save(n, a), n.show(), t.effects.createWrapper(n), s = e.distance || n["top" === h ? "outerHeight" : "outerWidth"](!0) / 2, r && n.css("opacity", 0).css(h, "pos" === c ? -s : s), u[h] = (r ? "pos" === c ? "+=" : "-=" : "pos" === c ? "-=" : "+=") + s, n.animate(u, {
                queue: !1, duration: e.duration, easing: e.easing, complete: function () {
                    "hide" === o && n.hide(), t.effects.restore(n, a), t.effects.removeWrapper(n), i()
                }
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.explode = function (e, i) {
            function s() {
                b.push(this), b.length === u * d && n()
            }

            function n() {
                p.css({visibility: "visible"}), t(b).remove(), g || p.hide(), i()
            }

            var a, o, r, l, h, c, u = e.pieces ? Math.round(Math.sqrt(e.pieces)) : 3, d = u, p = t(this), f = t.effects.setMode(p, e.mode || "hide"), g = "show" === f, m = p.show().css("visibility", "hidden").offset(), v = Math.ceil(p.outerWidth() / d), _ = Math.ceil(p.outerHeight() / u), b = [];
            for (a = 0; u > a; a++)for (l = m.top + a * _, c = a - (u - 1) / 2, o = 0; d > o; o++)r = m.left + o * v, h = o - (d - 1) / 2, p.clone().appendTo("body").wrap("<div></div>").css({
                position: "absolute",
                visibility: "visible",
                left: -o * v,
                top: -a * _
            }).parent().addClass("ui-effects-explode").css({
                position: "absolute",
                overflow: "hidden",
                width: v,
                height: _,
                left: r + (g ? h * v : 0),
                top: l + (g ? c * _ : 0),
                opacity: g ? 0 : 1
            }).animate({
                left: r + (g ? 0 : h * v),
                top: l + (g ? 0 : c * _),
                opacity: g ? 1 : 0
            }, e.duration || 500, e.easing, s)
        }
    }(jQuery), function (t) {
        t.effects.effect.fade = function (e, i) {
            var s = t(this), n = t.effects.setMode(s, e.mode || "toggle");
            s.animate({opacity: n}, {queue: !1, duration: e.duration, easing: e.easing, complete: i})
        }
    }(jQuery), function (t) {
        t.effects.effect.fold = function (e, i) {
            var s, n, a = t(this), o = ["position", "top", "bottom", "left", "right", "height", "width"], r = t.effects.setMode(a, e.mode || "hide"), l = "show" === r, h = "hide" === r, c = e.size || 15, u = /([0-9]+)%/.exec(c), d = !!e.horizFirst, p = l !== d, f = p ? ["width", "height"] : ["height", "width"], g = e.duration / 2, m = {}, v = {};
            t.effects.save(a, o), a.show(), s = t.effects.createWrapper(a).css({overflow: "hidden"}), n = p ? [s.width(), s.height()] : [s.height(), s.width()], u && (c = parseInt(u[1], 10) / 100 * n[h ? 0 : 1]), l && s.css(d ? {
                height: 0,
                width: c
            } : {
                height: c,
                width: 0
            }), m[f[0]] = l ? n[0] : c, v[f[1]] = l ? n[1] : 0, s.animate(m, g, e.easing).animate(v, g, e.easing, function () {
                h && a.hide(), t.effects.restore(a, o), t.effects.removeWrapper(a), i()
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.highlight = function (e, i) {
            var s = t(this), n = ["backgroundImage", "backgroundColor", "opacity"], a = t.effects.setMode(s, e.mode || "show"), o = {backgroundColor: s.css("backgroundColor")};
            "hide" === a && (o.opacity = 0), t.effects.save(s, n), s.show().css({
                backgroundImage: "none",
                backgroundColor: e.color || "#ffff99"
            }).animate(o, {
                queue: !1, duration: e.duration, easing: e.easing, complete: function () {
                    "hide" === a && s.hide(), t.effects.restore(s, n), i()
                }
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.pulsate = function (e, i) {
            var s, n = t(this), a = t.effects.setMode(n, e.mode || "show"), o = "show" === a, r = "hide" === a, l = o || "hide" === a, h = 2 * (e.times || 5) + (l ? 1 : 0), c = e.duration / h, u = 0, d = n.queue(), p = d.length;
            for ((o || !n.is(":visible")) && (n.css("opacity", 0).show(), u = 1), s = 1; h > s; s++)n.animate({opacity: u}, c, e.easing), u = 1 - u;
            n.animate({opacity: u}, c, e.easing), n.queue(function () {
                r && n.hide(), i()
            }), p > 1 && d.splice.apply(d, [1, 0].concat(d.splice(p, h + 1))), n.dequeue()
        }
    }(jQuery), function (t) {
        t.effects.effect.puff = function (e, i) {
            var s = t(this), n = t.effects.setMode(s, e.mode || "hide"), a = "hide" === n, o = parseInt(e.percent, 10) || 150, r = o / 100, l = {
                height: s.height(),
                width: s.width(),
                outerHeight: s.outerHeight(),
                outerWidth: s.outerWidth()
            };
            t.extend(e, {
                effect: "scale",
                queue: !1,
                fade: !0,
                mode: n,
                complete: i,
                percent: a ? o : 100,
                from: a ? l : {
                    height: l.height * r,
                    width: l.width * r,
                    outerHeight: l.outerHeight * r,
                    outerWidth: l.outerWidth * r
                }
            }), s.effect(e)
        }, t.effects.effect.scale = function (e, i) {
            var s = t(this), n = t.extend(!0, {}, e), a = t.effects.setMode(s, e.mode || "effect"), o = parseInt(e.percent, 10) || (0 === parseInt(e.percent, 10) ? 0 : "hide" === a ? 0 : 100), r = e.direction || "both", l = e.origin, h = {
                height: s.height(),
                width: s.width(),
                outerHeight: s.outerHeight(),
                outerWidth: s.outerWidth()
            }, c = {y: "horizontal" !== r ? o / 100 : 1, x: "vertical" !== r ? o / 100 : 1};
            n.effect = "size", n.queue = !1, n.complete = i, "effect" !== a && (n.origin = l || ["middle", "center"], n.restore = !0), n.from = e.from || ("show" === a ? {
                height: 0,
                width: 0,
                outerHeight: 0,
                outerWidth: 0
            } : h), n.to = {
                height: h.height * c.y,
                width: h.width * c.x,
                outerHeight: h.outerHeight * c.y,
                outerWidth: h.outerWidth * c.x
            }, n.fade && ("show" === a && (n.from.opacity = 0, n.to.opacity = 1), "hide" === a && (n.from.opacity = 1, n.to.opacity = 0)), s.effect(n)
        }, t.effects.effect.size = function (e, i) {
            var s, n, a, o = t(this), r = ["position", "top", "bottom", "left", "right", "width", "height", "overflow", "opacity"], l = ["position", "top", "bottom", "left", "right", "overflow", "opacity"], h = ["width", "height", "overflow"], c = ["fontSize"], u = ["borderTopWidth", "borderBottomWidth", "paddingTop", "paddingBottom"], d = ["borderLeftWidth", "borderRightWidth", "paddingLeft", "paddingRight"], p = t.effects.setMode(o, e.mode || "effect"), f = e.restore || "effect" !== p, g = e.scale || "both", m = e.origin || ["middle", "center"], v = o.css("position"), _ = f ? r : l, b = {
                height: 0,
                width: 0,
                outerHeight: 0,
                outerWidth: 0
            };
            "show" === p && o.show(), s = {
                height: o.height(),
                width: o.width(),
                outerHeight: o.outerHeight(),
                outerWidth: o.outerWidth()
            }, "toggle" === e.mode && "show" === p ? (o.from = e.to || b, o.to = e.from || s) : (o.from = e.from || ("show" === p ? b : s), o.to = e.to || ("hide" === p ? b : s)), a = {
                from: {
                    y: o.from.height / s.height,
                    x: o.from.width / s.width
                }, to: {y: o.to.height / s.height, x: o.to.width / s.width}
            }, ("box" === g || "both" === g) && (a.from.y !== a.to.y && (_ = _.concat(u), o.from = t.effects.setTransition(o, u, a.from.y, o.from), o.to = t.effects.setTransition(o, u, a.to.y, o.to)), a.from.x !== a.to.x && (_ = _.concat(d), o.from = t.effects.setTransition(o, d, a.from.x, o.from), o.to = t.effects.setTransition(o, d, a.to.x, o.to))), ("content" === g || "both" === g) && a.from.y !== a.to.y && (_ = _.concat(c).concat(h), o.from = t.effects.setTransition(o, c, a.from.y, o.from), o.to = t.effects.setTransition(o, c, a.to.y, o.to)), t.effects.save(o, _), o.show(), t.effects.createWrapper(o), o.css("overflow", "hidden").css(o.from), m && (n = t.effects.getBaseline(m, s), o.from.top = (s.outerHeight - o.outerHeight()) * n.y, o.from.left = (s.outerWidth - o.outerWidth()) * n.x, o.to.top = (s.outerHeight - o.to.outerHeight) * n.y, o.to.left = (s.outerWidth - o.to.outerWidth) * n.x), o.css(o.from), ("content" === g || "both" === g) && (u = u.concat(["marginTop", "marginBottom"]).concat(c), d = d.concat(["marginLeft", "marginRight"]), h = r.concat(u).concat(d), o.find("*[width]").each(function () {
                var i = t(this), s = {
                    height: i.height(),
                    width: i.width(),
                    outerHeight: i.outerHeight(),
                    outerWidth: i.outerWidth()
                };
                f && t.effects.save(i, h), i.from = {
                    height: s.height * a.from.y,
                    width: s.width * a.from.x,
                    outerHeight: s.outerHeight * a.from.y,
                    outerWidth: s.outerWidth * a.from.x
                }, i.to = {
                    height: s.height * a.to.y,
                    width: s.width * a.to.x,
                    outerHeight: s.height * a.to.y,
                    outerWidth: s.width * a.to.x
                }, a.from.y !== a.to.y && (i.from = t.effects.setTransition(i, u, a.from.y, i.from), i.to = t.effects.setTransition(i, u, a.to.y, i.to)), a.from.x !== a.to.x && (i.from = t.effects.setTransition(i, d, a.from.x, i.from), i.to = t.effects.setTransition(i, d, a.to.x, i.to)), i.css(i.from), i.animate(i.to, e.duration, e.easing, function () {
                    f && t.effects.restore(i, h)
                })
            })), o.animate(o.to, {
                queue: !1, duration: e.duration, easing: e.easing, complete: function () {
                    0 === o.to.opacity && o.css("opacity", o.from.opacity), "hide" === p && o.hide(), t.effects.restore(o, _), f || ("static" === v ? o.css({
                        position: "relative",
                        top: o.to.top,
                        left: o.to.left
                    }) : t.each(["top", "left"], function (t, e) {
                        o.css(e, function (e, i) {
                            var s = parseInt(i, 10), n = t ? o.to.left : o.to.top;
                            return "auto" === i ? n + "px" : s + n + "px"
                        })
                    })), t.effects.removeWrapper(o), i()
                }
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.shake = function (e, i) {
            var s, n = t(this), a = ["position", "top", "bottom", "left", "right", "height", "width"], o = t.effects.setMode(n, e.mode || "effect"), r = e.direction || "left", l = e.distance || 20, h = e.times || 3, c = 2 * h + 1, u = Math.round(e.duration / c), d = "up" === r || "down" === r ? "top" : "left", p = "up" === r || "left" === r, f = {}, g = {}, m = {}, v = n.queue(), _ = v.length;
            for (t.effects.save(n, a), n.show(), t.effects.createWrapper(n), f[d] = (p ? "-=" : "+=") + l, g[d] = (p ? "+=" : "-=") + 2 * l, m[d] = (p ? "-=" : "+=") + 2 * l, n.animate(f, u, e.easing), s = 1; h > s; s++)n.animate(g, u, e.easing).animate(m, u, e.easing);
            n.animate(g, u, e.easing).animate(f, u / 2, e.easing).queue(function () {
                "hide" === o && n.hide(), t.effects.restore(n, a), t.effects.removeWrapper(n), i()
            }), _ > 1 && v.splice.apply(v, [1, 0].concat(v.splice(_, c + 1))), n.dequeue()
        }
    }(jQuery), function (t) {
        t.effects.effect.slide = function (e, i) {
            var s, n = t(this), a = ["position", "top", "bottom", "left", "right", "width", "height"], o = t.effects.setMode(n, e.mode || "show"), r = "show" === o, l = e.direction || "left", h = "up" === l || "down" === l ? "top" : "left", c = "up" === l || "left" === l, u = {};
            t.effects.save(n, a), n.show(), s = e.distance || n["top" === h ? "outerHeight" : "outerWidth"](!0), t.effects.createWrapper(n).css({overflow: "hidden"}), r && n.css(h, c ? isNaN(s) ? "-" + s : -s : s), u[h] = (r ? c ? "+=" : "-=" : c ? "-=" : "+=") + s, n.animate(u, {
                queue: !1,
                duration: e.duration,
                easing: e.easing,
                complete: function () {
                    "hide" === o && n.hide(), t.effects.restore(n, a), t.effects.removeWrapper(n), i()
                }
            })
        }
    }(jQuery), function (t) {
        t.effects.effect.transfer = function (e, i) {
            var s = t(this), n = t(e.to), a = "fixed" === n.css("position"), o = t("body"), r = a ? o.scrollTop() : 0, l = a ? o.scrollLeft() : 0, h = n.offset(), c = {
                top: h.top - r,
                left: h.left - l,
                height: n.innerHeight(),
                width: n.innerWidth()
            }, u = s.offset(), d = t("<div class='ui-effects-transfer'></div>").appendTo(document.body).addClass(e.className).css({
                top: u.top - r,
                left: u.left - l,
                height: s.innerHeight(),
                width: s.innerWidth(),
                position: a ? "fixed" : "absolute"
            }).animate(c, e.duration, e.easing, function () {
                d.remove(), i()
            })
        }
    }(jQuery), function (t) {
        t.widget("ui.menu", {
            version: "1.10.4",
            defaultElement: "<ul>",
            delay: 300,
            options: {
                icons: {submenu: "ui-icon-carat-1-e"},
                menus: "ul",
                position: {my: "left top", at: "right top"},
                role: "menu",
                blur: null,
                focus: null,
                select: null
            },
            _create: function () {
                this.activeMenu = this.element, this.mouseHandled = !1, this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content ui-corner-all").toggleClass("ui-menu-icons", !!this.element.find(".ui-icon").length).attr({
                    role: this.options.role,
                    tabIndex: 0
                }).bind("click" + this.eventNamespace, t.proxy(function (t) {
                    this.options.disabled && t.preventDefault()
                }, this)), this.options.disabled && this.element.addClass("ui-state-disabled").attr("aria-disabled", "true"), this._on({
                    "mousedown .ui-menu-item > a": function (t) {
                        t.preventDefault()
                    }, "click .ui-state-disabled > a": function (t) {
                        t.preventDefault()
                    }, "click .ui-menu-item:has(a)": function (e) {
                        var i = t(e.target).closest(".ui-menu-item");
                        !this.mouseHandled && i.not(".ui-state-disabled").length && (this.select(e), e.isPropagationStopped() || (this.mouseHandled = !0), i.has(".ui-menu").length ? this.expand(e) : !this.element.is(":focus") && t(this.document[0].activeElement).closest(".ui-menu").length && (this.element.trigger("focus", [!0]), this.active && 1 === this.active.parents(".ui-menu").length && clearTimeout(this.timer)))
                    }, "mouseenter .ui-menu-item": function (e) {
                        var i = t(e.currentTarget);
                        i.siblings().children(".ui-state-active").removeClass("ui-state-active"), this.focus(e, i)
                    }, mouseleave: "collapseAll", "mouseleave .ui-menu": "collapseAll", focus: function (t, e) {
                        var i = this.active || this.element.children(".ui-menu-item").eq(0);
                        e || this.focus(t, i)
                    }, blur: function (e) {
                        this._delay(function () {
                            t.contains(this.element[0], this.document[0].activeElement) || this.collapseAll(e)
                        })
                    }, keydown: "_keydown"
                }), this.refresh(), this._on(this.document, {
                    click: function (e) {
                        t(e.target).closest(".ui-menu").length || this.collapseAll(e), this.mouseHandled = !1
                    }
                })
            },
            _destroy: function () {
                this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeClass("ui-menu ui-widget ui-widget-content ui-corner-all ui-menu-icons").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show(), this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").children("a").removeUniqueId().removeClass("ui-corner-all ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function () {
                    var e = t(this);
                    e.data("ui-menu-submenu-carat") && e.remove()
                }), this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content")
            },
            _keydown: function (e) {
                function i(t) {
                    return t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
                }

                var s, n, a, o, r, l = !0;
                switch (e.keyCode) {
                    case t.ui.keyCode.PAGE_UP:
                        this.previousPage(e);
                        break;
                    case t.ui.keyCode.PAGE_DOWN:
                        this.nextPage(e);
                        break;
                    case t.ui.keyCode.HOME:
                        this._move("first", "first", e);
                        break;
                    case t.ui.keyCode.END:
                        this._move("last", "last", e);
                        break;
                    case t.ui.keyCode.UP:
                        this.previous(e);
                        break;
                    case t.ui.keyCode.DOWN:
                        this.next(e);
                        break;
                    case t.ui.keyCode.LEFT:
                        this.collapse(e);
                        break;
                    case t.ui.keyCode.RIGHT:
                        this.active && !this.active.is(".ui-state-disabled") && this.expand(e);
                        break;
                    case t.ui.keyCode.ENTER:
                    case t.ui.keyCode.SPACE:
                        this._activate(e);
                        break;
                    case t.ui.keyCode.ESCAPE:
                        this.collapse(e);
                        break;
                    default:
                        l = !1, n = this.previousFilter || "", a = String.fromCharCode(e.keyCode), o = !1, clearTimeout(this.filterTimer), a === n ? o = !0 : a = n + a, r = RegExp("^" + i(a), "i"), s = this.activeMenu.children(".ui-menu-item").filter(function () {
                            return r.test(t(this).children("a").text())
                        }), s = o && -1 !== s.index(this.active.next()) ? this.active.nextAll(".ui-menu-item") : s, s.length || (a = String.fromCharCode(e.keyCode), r = RegExp("^" + i(a), "i"), s = this.activeMenu.children(".ui-menu-item").filter(function () {
                            return r.test(t(this).children("a").text())
                        })), s.length ? (this.focus(e, s), s.length > 1 ? (this.previousFilter = a, this.filterTimer = this._delay(function () {
                            delete this.previousFilter
                        }, 1e3)) : delete this.previousFilter) : delete this.previousFilter
                }
                l && e.preventDefault()
            },
            _activate: function (t) {
                this.active.is(".ui-state-disabled") || (this.active.children("a[aria-haspopup='true']").length ? this.expand(t) : this.select(t))
            },
            refresh: function () {
                var e, i = this.options.icons.submenu, s = this.element.find(this.options.menus);
                this.element.toggleClass("ui-menu-icons", !!this.element.find(".ui-icon").length), s.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-corner-all").hide().attr({
                    role: this.options.role,
                    "aria-hidden": "true",
                    "aria-expanded": "false"
                }).each(function () {
                    var e = t(this), s = e.prev("a"), n = t("<span>").addClass("ui-menu-icon ui-icon " + i).data("ui-menu-submenu-carat", !0);
                    s.attr("aria-haspopup", "true").prepend(n), e.attr("aria-labelledby", s.attr("id"))
                }), e = s.add(this.element), e.children(":not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role", "presentation").children("a").uniqueId().addClass("ui-corner-all").attr({
                    tabIndex: -1,
                    role: this._itemRole()
                }), e.children(":not(.ui-menu-item)").each(function () {
                    var e = t(this);
                    /[^\-\u2014\u2013\s]/.test(e.text()) || e.addClass("ui-widget-content ui-menu-divider")
                }), e.children(".ui-state-disabled").attr("aria-disabled", "true"), this.active && !t.contains(this.element[0], this.active[0]) && this.blur()
            },
            _itemRole: function () {
                return {menu: "menuitem", listbox: "option"}[this.options.role]
            },
            _setOption: function (t, e) {
                "icons" === t && this.element.find(".ui-menu-icon").removeClass(this.options.icons.submenu).addClass(e.submenu), this._super(t, e)
            },
            focus: function (t, e) {
                var i, s;
                this.blur(t, t && "focus" === t.type), this._scrollIntoView(e), this.active = e.first(), s = this.active.children("a").addClass("ui-state-focus"), this.options.role && this.element.attr("aria-activedescendant", s.attr("id")), this.active.parent().closest(".ui-menu-item").children("a:first").addClass("ui-state-active"), t && "keydown" === t.type ? this._close() : this.timer = this._delay(function () {
                    this._close()
                }, this.delay), i = e.children(".ui-menu"), i.length && t && /^mouse/.test(t.type) && this._startOpening(i), this.activeMenu = e.parent(), this._trigger("focus", t, {item: e})
            },
            _scrollIntoView: function (e) {
                var i, s, n, a, o, r;
                this._hasScroll() && (i = parseFloat(t.css(this.activeMenu[0], "borderTopWidth")) || 0, s = parseFloat(t.css(this.activeMenu[0], "paddingTop")) || 0, n = e.offset().top - this.activeMenu.offset().top - i - s, a = this.activeMenu.scrollTop(), o = this.activeMenu.height(), r = e.height(), 0 > n ? this.activeMenu.scrollTop(a + n) : n + r > o && this.activeMenu.scrollTop(a + n - o + r))
            },
            blur: function (t, e) {
                e || clearTimeout(this.timer), this.active && (this.active.children("a").removeClass("ui-state-focus"), this.active = null, this._trigger("blur", t, {item: this.active}))
            },
            _startOpening: function (t) {
                clearTimeout(this.timer), "true" === t.attr("aria-hidden") && (this.timer = this._delay(function () {
                    this._close(), this._open(t)
                }, this.delay))
            },
            _open: function (e) {
                var i = t.extend({of: this.active}, this.options.position);
                clearTimeout(this.timer), this.element.find(".ui-menu").not(e.parents(".ui-menu")).hide().attr("aria-hidden", "true"), e.show().removeAttr("aria-hidden").attr("aria-expanded", "true").position(i)
            },
            collapseAll: function (e, i) {
                clearTimeout(this.timer), this.timer = this._delay(function () {
                    var s = i ? this.element : t(e && e.target).closest(this.element.find(".ui-menu"));
                    s.length || (s = this.element), this._close(s), this.blur(e), this.activeMenu = s
                }, this.delay)
            },
            _close: function (t) {
                t || (t = this.active ? this.active.parent() : this.element), t.find(".ui-menu").hide().attr("aria-hidden", "true").attr("aria-expanded", "false").end().find("a.ui-state-active").removeClass("ui-state-active")
            },
            collapse: function (t) {
                var e = this.active && this.active.parent().closest(".ui-menu-item", this.element);
                e && e.length && (this._close(), this.focus(t, e))
            },
            expand: function (t) {
                var e = this.active && this.active.children(".ui-menu ").children(".ui-menu-item").first();
                e && e.length && (this._open(e.parent()), this._delay(function () {
                    this.focus(t, e)
                }))
            },
            next: function (t) {
                this._move("next", "first", t)
            },
            previous: function (t) {
                this._move("prev", "last", t)
            },
            isFirstItem: function () {
                return this.active && !this.active.prevAll(".ui-menu-item").length
            },
            isLastItem: function () {
                return this.active && !this.active.nextAll(".ui-menu-item").length
            },
            _move: function (t, e, i) {
                var s;
                this.active && (s = "first" === t || "last" === t ? this.active["first" === t ? "prevAll" : "nextAll"](".ui-menu-item").eq(-1) : this.active[t + "All"](".ui-menu-item").eq(0)), s && s.length && this.active || (s = this.activeMenu.children(".ui-menu-item")[e]()), this.focus(i, s)
            },
            nextPage: function (e) {
                var i, s, n;
                return this.active ? void(this.isLastItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.nextAll(".ui-menu-item").each(function () {
                    return i = t(this), 0 > i.offset().top - s - n
                }), this.focus(e, i)) : this.focus(e, this.activeMenu.children(".ui-menu-item")[this.active ? "last" : "first"]()))) : void this.next(e)
            },
            previousPage: function (e) {
                var i, s, n;
                return this.active ? void(this.isFirstItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.prevAll(".ui-menu-item").each(function () {
                    return i = t(this), i.offset().top - s + n > 0
                }), this.focus(e, i)) : this.focus(e, this.activeMenu.children(".ui-menu-item").first()))) : void this.next(e)
            },
            _hasScroll: function () {
                return this.element.outerHeight() < this.element.prop("scrollHeight")
            },
            select: function (e) {
                this.active = this.active || t(e.target).closest(".ui-menu-item");
                var i = {item: this.active};
                this.active.has(".ui-menu").length || this.collapseAll(e, !0), this._trigger("select", e, i)
            }
        })
    }(jQuery), function (t, e) {
        t.widget("ui.progressbar", {
            version: "1.10.4",
            options: {max: 100, value: 0, change: null, complete: null},
            min: 0,
            _create: function () {
                this.oldValue = this.options.value = this._constrainedValue(), this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({
                    role: "progressbar",
                    "aria-valuemin": this.min
                }), this.valueDiv = t("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element), this._refreshValue()
            },
            _destroy: function () {
                this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"), this.valueDiv.remove()
            },
            value: function (t) {
                return t === e ? this.options.value : (this.options.value = this._constrainedValue(t), this._refreshValue(), e)
            },
            _constrainedValue: function (t) {
                return t === e && (t = this.options.value), this.indeterminate = t === !1, "number" != typeof t && (t = 0), this.indeterminate ? !1 : Math.min(this.options.max, Math.max(this.min, t))
            },
            _setOptions: function (t) {
                var e = t.value;
                delete t.value, this._super(t), this.options.value = this._constrainedValue(e), this._refreshValue()
            },
            _setOption: function (t, e) {
                "max" === t && (e = Math.max(this.min, e)), this._super(t, e)
            },
            _percentage: function () {
                return this.indeterminate ? 100 : 100 * (this.options.value - this.min) / (this.options.max - this.min)
            },
            _refreshValue: function () {
                var e = this.options.value, i = this._percentage();
                this.valueDiv.toggle(this.indeterminate || e > this.min).toggleClass("ui-corner-right", e === this.options.max).width(i.toFixed(0) + "%"), this.element.toggleClass("ui-progressbar-indeterminate", this.indeterminate), this.indeterminate ? (this.element.removeAttr("aria-valuenow"), this.overlayDiv || (this.overlayDiv = t("<div class='ui-progressbar-overlay'></div>").appendTo(this.valueDiv))) : (this.element.attr({
                    "aria-valuemax": this.options.max,
                    "aria-valuenow": e
                }), this.overlayDiv && (this.overlayDiv.remove(), this.overlayDiv = null)), this.oldValue !== e && (this.oldValue = e, this._trigger("change")), e === this.options.max && this._trigger("complete")
            }
        })
    }(jQuery), function (t) {
        function e(t) {
            return parseInt(t, 10) || 0
        }

        function i(t) {
            return !isNaN(parseInt(t, 10))
        }

        t.widget("ui.resizable", t.ui.mouse, {
            version: "1.10.4",
            widgetEventPrefix: "resize",
            options: {
                alsoResize: !1,
                animate: !1,
                animateDuration: "slow",
                animateEasing: "swing",
                aspectRatio: !1,
                autoHide: !1,
                containment: !1,
                ghost: !1,
                grid: !1,
                handles: "e,s,se",
                helper: !1,
                maxHeight: null,
                maxWidth: null,
                minHeight: 10,
                minWidth: 10,
                zIndex: 90,
                resize: null,
                start: null,
                stop: null
            },
            _create: function () {
                var e, i, s, n, a, o = this, r = this.options;
                if (this.element.addClass("ui-resizable"), t.extend(this, {
                        _aspectRatio: !!r.aspectRatio,
                        aspectRatio: r.aspectRatio,
                        originalElement: this.element,
                        _proportionallyResizeElements: [],
                        _helper: r.helper || r.ghost || r.animate ? r.helper || "ui-resizable-helper" : null
                    }), this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i) && (this.element.wrap(t("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({
                        position: this.element.css("position"),
                        width: this.element.outerWidth(),
                        height: this.element.outerHeight(),
                        top: this.element.css("top"),
                        left: this.element.css("left")
                    })), this.element = this.element.parent().data("ui-resizable", this.element.data("ui-resizable")), this.elementIsWrapper = !0, this.element.css({
                        marginLeft: this.originalElement.css("marginLeft"),
                        marginTop: this.originalElement.css("marginTop"),
                        marginRight: this.originalElement.css("marginRight"),
                        marginBottom: this.originalElement.css("marginBottom")
                    }), this.originalElement.css({
                        marginLeft: 0,
                        marginTop: 0,
                        marginRight: 0,
                        marginBottom: 0
                    }), this.originalResizeStyle = this.originalElement.css("resize"), this.originalElement.css("resize", "none"), this._proportionallyResizeElements.push(this.originalElement.css({
                        position: "static",
                        zoom: 1,
                        display: "block"
                    })), this.originalElement.css({margin: this.originalElement.css("margin")}), this._proportionallyResize()), this.handles = r.handles || (t(".ui-resizable-handle", this.element).length ? {
                        n: ".ui-resizable-n",
                        e: ".ui-resizable-e",
                        s: ".ui-resizable-s",
                        w: ".ui-resizable-w",
                        se: ".ui-resizable-se",
                        sw: ".ui-resizable-sw",
                        ne: ".ui-resizable-ne",
                        nw: ".ui-resizable-nw"
                    } : "e,s,se"), this.handles.constructor === String)for ("all" === this.handles && (this.handles = "n,e,s,w,se,sw,ne,nw"), e = this.handles.split(","), this.handles = {}, i = 0; e.length > i; i++)s = t.trim(e[i]), a = "ui-resizable-" + s, n = t("<div class='ui-resizable-handle " + a + "'></div>"), n.css({zIndex: r.zIndex}), "se" === s && n.addClass("ui-icon ui-icon-gripsmall-diagonal-se"), this.handles[s] = ".ui-resizable-" + s, this.element.append(n);
                this._renderAxis = function (e) {
                    var i, s, n, a;
                    e = e || this.element;
                    for (i in this.handles)this.handles[i].constructor === String && (this.handles[i] = t(this.handles[i], this.element).show()), this.elementIsWrapper && this.originalElement[0].nodeName.match(/textarea|input|select|button/i) && (s = t(this.handles[i], this.element), a = /sw|ne|nw|se|n|s/.test(i) ? s.outerHeight() : s.outerWidth(), n = ["padding", /ne|nw|n/.test(i) ? "Top" : /se|sw|s/.test(i) ? "Bottom" : /^e$/.test(i) ? "Right" : "Left"].join(""), e.css(n, a), this._proportionallyResize()), t(this.handles[i]).length
                }, this._renderAxis(this.element), this._handles = t(".ui-resizable-handle", this.element).disableSelection(), this._handles.mouseover(function () {
                    o.resizing || (this.className && (n = this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)), o.axis = n && n[1] ? n[1] : "se")
                }), r.autoHide && (this._handles.hide(), t(this.element).addClass("ui-resizable-autohide").mouseenter(function () {
                    r.disabled || (t(this).removeClass("ui-resizable-autohide"), o._handles.show())
                }).mouseleave(function () {
                    r.disabled || o.resizing || (t(this).addClass("ui-resizable-autohide"), o._handles.hide())
                })), this._mouseInit()
            },
            _destroy: function () {
                this._mouseDestroy();
                var e, i = function (e) {
                    t(e).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").removeData("ui-resizable").unbind(".resizable").find(".ui-resizable-handle").remove()
                };
                return this.elementIsWrapper && (i(this.element), e = this.element, this.originalElement.css({
                    position: e.css("position"),
                    width: e.outerWidth(),
                    height: e.outerHeight(),
                    top: e.css("top"),
                    left: e.css("left")
                }).insertAfter(e), e.remove()), this.originalElement.css("resize", this.originalResizeStyle), i(this.originalElement), this
            },
            _mouseCapture: function (e) {
                var i, s, n = !1;
                for (i in this.handles)s = t(this.handles[i])[0], (s === e.target || t.contains(s, e.target)) && (n = !0);
                return !this.options.disabled && n
            },
            _mouseStart: function (i) {
                var s, n, a, o = this.options, r = this.element.position(), h = this.element;
                return this.resizing = !0, /absolute/.test(h.css("position")) ? h.css({
                    position: "absolute",
                    top: h.css("top"),
                    left: h.css("left")
                }) : h.is(".ui-draggable") && h.css({
                    position: "absolute",
                    top: r.top,
                    left: r.left
                }), this._renderProxy(), s = e(this.helper.css("left")), n = e(this.helper.css("top")), o.containment && (s += t(o.containment).scrollLeft() || 0, n += t(o.containment).scrollTop() || 0), this.offset = this.helper.offset(), this.position = {
                    left: s,
                    top: n
                }, this.size = this._helper ? {
                    width: this.helper.width(),
                    height: this.helper.height()
                } : {width: h.width(), height: h.height()}, this.originalSize = this._helper ? {
                    width: h.outerWidth(),
                    height: h.outerHeight()
                } : {width: h.width(), height: h.height()}, this.originalPosition = {
                    left: s,
                    top: n
                }, this.sizeDiff = {
                    width: h.outerWidth() - h.width(),
                    height: h.outerHeight() - h.height()
                }, this.originalMousePosition = {
                    left: i.pageX,
                    top: i.pageY
                }, this.aspectRatio = "number" == typeof o.aspectRatio ? o.aspectRatio : this.originalSize.width / this.originalSize.height || 1, a = t(".ui-resizable-" + this.axis).css("cursor"), t("body").css("cursor", "auto" === a ? this.axis + "-resize" : a), h.addClass("ui-resizable-resizing"), this._propagate("start", i), !0
            },
            _mouseDrag: function (e) {
                var i, s = this.helper, n = {}, a = this.originalMousePosition, o = this.axis, r = this.position.top, h = this.position.left, l = this.size.width, c = this.size.height, u = e.pageX - a.left || 0, d = e.pageY - a.top || 0, p = this._change[o];
                return p ? (i = p.apply(this, [e, u, d]), this._updateVirtualBoundaries(e.shiftKey), (this._aspectRatio || e.shiftKey) && (i = this._updateRatio(i, e)), i = this._respectSize(i, e), this._updateCache(i), this._propagate("resize", e), this.position.top !== r && (n.top = this.position.top + "px"), this.position.left !== h && (n.left = this.position.left + "px"), this.size.width !== l && (n.width = this.size.width + "px"), this.size.height !== c && (n.height = this.size.height + "px"), s.css(n), !this._helper && this._proportionallyResizeElements.length && this._proportionallyResize(), t.isEmptyObject(n) || this._trigger("resize", e, this.ui()), !1) : !1
            },
            _mouseStop: function (e) {
                this.resizing = !1;
                var i, s, n, a, o, r, h, l = this.options, c = this;
                return this._helper && (i = this._proportionallyResizeElements, s = i.length && /textarea/i.test(i[0].nodeName), n = s && t.ui.hasScroll(i[0], "left") ? 0 : c.sizeDiff.height, a = s ? 0 : c.sizeDiff.width, o = {
                    width: c.helper.width() - a,
                    height: c.helper.height() - n
                }, r = parseInt(c.element.css("left"), 10) + (c.position.left - c.originalPosition.left) || null, h = parseInt(c.element.css("top"), 10) + (c.position.top - c.originalPosition.top) || null, l.animate || this.element.css(t.extend(o, {
                    top: h,
                    left: r
                })), c.helper.height(c.size.height), c.helper.width(c.size.width), this._helper && !l.animate && this._proportionallyResize()), t("body").css("cursor", "auto"), this.element.removeClass("ui-resizable-resizing"), this._propagate("stop", e), this._helper && this.helper.remove(), !1
            },
            _updateVirtualBoundaries: function (t) {
                var e, s, n, a, o, r = this.options;
                o = {
                    minWidth: i(r.minWidth) ? r.minWidth : 0,
                    maxWidth: i(r.maxWidth) ? r.maxWidth : 1 / 0,
                    minHeight: i(r.minHeight) ? r.minHeight : 0,
                    maxHeight: i(r.maxHeight) ? r.maxHeight : 1 / 0
                }, (this._aspectRatio || t) && (e = o.minHeight * this.aspectRatio, n = o.minWidth / this.aspectRatio, s = o.maxHeight * this.aspectRatio, a = o.maxWidth / this.aspectRatio, e > o.minWidth && (o.minWidth = e), n > o.minHeight && (o.minHeight = n), o.maxWidth > s && (o.maxWidth = s), o.maxHeight > a && (o.maxHeight = a)), this._vBoundaries = o
            },
            _updateCache: function (t) {
                this.offset = this.helper.offset(), i(t.left) && (this.position.left = t.left), i(t.top) && (this.position.top = t.top), i(t.height) && (this.size.height = t.height), i(t.width) && (this.size.width = t.width)
            },
            _updateRatio: function (t) {
                var e = this.position, s = this.size, n = this.axis;
                return i(t.height) ? t.width = t.height * this.aspectRatio : i(t.width) && (t.height = t.width / this.aspectRatio), "sw" === n && (t.left = e.left + (s.width - t.width), t.top = null), "nw" === n && (t.top = e.top + (s.height - t.height), t.left = e.left + (s.width - t.width)), t
            },
            _respectSize: function (t) {
                var e = this._vBoundaries, s = this.axis, n = i(t.width) && e.maxWidth && e.maxWidth < t.width, a = i(t.height) && e.maxHeight && e.maxHeight < t.height, o = i(t.width) && e.minWidth && e.minWidth > t.width, r = i(t.height) && e.minHeight && e.minHeight > t.height, h = this.originalPosition.left + this.originalSize.width, l = this.position.top + this.size.height, c = /sw|nw|w/.test(s), u = /nw|ne|n/.test(s);
                return o && (t.width = e.minWidth), r && (t.height = e.minHeight), n && (t.width = e.maxWidth), a && (t.height = e.maxHeight), o && c && (t.left = h - e.minWidth), n && c && (t.left = h - e.maxWidth), r && u && (t.top = l - e.minHeight), a && u && (t.top = l - e.maxHeight), t.width || t.height || t.left || !t.top ? t.width || t.height || t.top || !t.left || (t.left = null) : t.top = null, t
            },
            _proportionallyResize: function () {
                if (this._proportionallyResizeElements.length) {
                    var t, e, i, s, n, a = this.helper || this.element;
                    for (t = 0; this._proportionallyResizeElements.length > t; t++) {
                        if (n = this._proportionallyResizeElements[t], !this.borderDif)for (this.borderDif = [], i = [n.css("borderTopWidth"), n.css("borderRightWidth"), n.css("borderBottomWidth"), n.css("borderLeftWidth")], s = [n.css("paddingTop"), n.css("paddingRight"), n.css("paddingBottom"), n.css("paddingLeft")], e = 0; i.length > e; e++)this.borderDif[e] = (parseInt(i[e], 10) || 0) + (parseInt(s[e], 10) || 0);
                        n.css({
                            height: a.height() - this.borderDif[0] - this.borderDif[2] || 0,
                            width: a.width() - this.borderDif[1] - this.borderDif[3] || 0
                        })
                    }
                }
            },
            _renderProxy: function () {
                var e = this.element, i = this.options;
                this.elementOffset = e.offset(), this._helper ? (this.helper = this.helper || t("<div style='overflow:hidden;'></div>"), this.helper.addClass(this._helper).css({
                    width: this.element.outerWidth() - 1,
                    height: this.element.outerHeight() - 1,
                    position: "absolute",
                    left: this.elementOffset.left + "px",
                    top: this.elementOffset.top + "px",
                    zIndex: ++i.zIndex
                }), this.helper.appendTo("body").disableSelection()) : this.helper = this.element
            },
            _change: {
                e: function (t, e) {
                    return {width: this.originalSize.width + e}
                }, w: function (t, e) {
                    var i = this.originalSize, s = this.originalPosition;
                    return {left: s.left + e, width: i.width - e}
                }, n: function (t, e, i) {
                    var s = this.originalSize, n = this.originalPosition;
                    return {top: n.top + i, height: s.height - i}
                }, s: function (t, e, i) {
                    return {height: this.originalSize.height + i}
                }, se: function (e, i, s) {
                    return t.extend(this._change.s.apply(this, arguments), this._change.e.apply(this, [e, i, s]))
                }, sw: function (e, i, s) {
                    return t.extend(this._change.s.apply(this, arguments), this._change.w.apply(this, [e, i, s]))
                }, ne: function (e, i, s) {
                    return t.extend(this._change.n.apply(this, arguments), this._change.e.apply(this, [e, i, s]))
                }, nw: function (e, i, s) {
                    return t.extend(this._change.n.apply(this, arguments), this._change.w.apply(this, [e, i, s]))
                }
            },
            _propagate: function (e, i) {
                t.ui.plugin.call(this, e, [i, this.ui()]), "resize" !== e && this._trigger(e, i, this.ui())
            },
            plugins: {},
            ui: function () {
                return {
                    originalElement: this.originalElement,
                    element: this.element,
                    helper: this.helper,
                    position: this.position,
                    size: this.size,
                    originalSize: this.originalSize,
                    originalPosition: this.originalPosition
                }
            }
        }), t.ui.plugin.add("resizable", "animate", {
            stop: function (e) {
                var i = t(this).data("ui-resizable"), s = i.options, n = i._proportionallyResizeElements, a = n.length && /textarea/i.test(n[0].nodeName), o = a && t.ui.hasScroll(n[0], "left") ? 0 : i.sizeDiff.height, r = a ? 0 : i.sizeDiff.width, h = {
                    width: i.size.width - r,
                    height: i.size.height - o
                }, l = parseInt(i.element.css("left"), 10) + (i.position.left - i.originalPosition.left) || null, c = parseInt(i.element.css("top"), 10) + (i.position.top - i.originalPosition.top) || null;
                i.element.animate(t.extend(h, c && l ? {top: c, left: l} : {}), {
                    duration: s.animateDuration, easing: s.animateEasing, step: function () {
                        var s = {
                            width: parseInt(i.element.css("width"), 10),
                            height: parseInt(i.element.css("height"), 10),
                            top: parseInt(i.element.css("top"), 10),
                            left: parseInt(i.element.css("left"), 10)
                        };
                        n && n.length && t(n[0]).css({
                            width: s.width,
                            height: s.height
                        }), i._updateCache(s), i._propagate("resize", e)
                    }
                })
            }
        }), t.ui.plugin.add("resizable", "containment", {
            start: function () {
                var i, s, n, a, o, r, h, l = t(this).data("ui-resizable"), c = l.options, u = l.element, d = c.containment, p = d instanceof t ? d.get(0) : /parent/.test(d) ? u.parent().get(0) : d;
                p && (l.containerElement = t(p), /document/.test(d) || d === document ? (l.containerOffset = {
                    left: 0,
                    top: 0
                }, l.containerPosition = {left: 0, top: 0}, l.parentData = {
                    element: t(document),
                    left: 0,
                    top: 0,
                    width: t(document).width(),
                    height: t(document).height() || document.body.parentNode.scrollHeight
                }) : (i = t(p), s = [], t(["Top", "Right", "Left", "Bottom"]).each(function (t, n) {
                    s[t] = e(i.css("padding" + n))
                }), l.containerOffset = i.offset(), l.containerPosition = i.position(), l.containerSize = {
                    height: i.innerHeight() - s[3],
                    width: i.innerWidth() - s[1]
                }, n = l.containerOffset, a = l.containerSize.height, o = l.containerSize.width, r = t.ui.hasScroll(p, "left") ? p.scrollWidth : o, h = t.ui.hasScroll(p) ? p.scrollHeight : a, l.parentData = {
                    element: p,
                    left: n.left,
                    top: n.top,
                    width: r,
                    height: h
                }))
            }, resize: function (e) {
                var i, s, n, a, o = t(this).data("ui-resizable"), r = o.options, h = o.containerOffset, l = o.position, c = o._aspectRatio || e.shiftKey, u = {
                    top: 0,
                    left: 0
                }, d = o.containerElement;
                d[0] !== document && /static/.test(d.css("position")) && (u = h), l.left < (o._helper ? h.left : 0) && (o.size.width = o.size.width + (o._helper ? o.position.left - h.left : o.position.left - u.left), c && (o.size.height = o.size.width / o.aspectRatio), o.position.left = r.helper ? h.left : 0), l.top < (o._helper ? h.top : 0) && (o.size.height = o.size.height + (o._helper ? o.position.top - h.top : o.position.top), c && (o.size.width = o.size.height * o.aspectRatio), o.position.top = o._helper ? h.top : 0), o.offset.left = o.parentData.left + o.position.left, o.offset.top = o.parentData.top + o.position.top, i = Math.abs((o._helper ? o.offset.left - u.left : o.offset.left - u.left) + o.sizeDiff.width), s = Math.abs((o._helper ? o.offset.top - u.top : o.offset.top - h.top) + o.sizeDiff.height), n = o.containerElement.get(0) === o.element.parent().get(0), a = /relative|absolute/.test(o.containerElement.css("position")), n && a && (i -= Math.abs(o.parentData.left)), i + o.size.width >= o.parentData.width && (o.size.width = o.parentData.width - i, c && (o.size.height = o.size.width / o.aspectRatio)), s + o.size.height >= o.parentData.height && (o.size.height = o.parentData.height - s, c && (o.size.width = o.size.height * o.aspectRatio))
            }, stop: function () {
                var e = t(this).data("ui-resizable"), i = e.options, s = e.containerOffset, n = e.containerPosition, a = e.containerElement, o = t(e.helper), r = o.offset(), h = o.outerWidth() - e.sizeDiff.width, l = o.outerHeight() - e.sizeDiff.height;
                e._helper && !i.animate && /relative/.test(a.css("position")) && t(this).css({
                    left: r.left - n.left - s.left,
                    width: h,
                    height: l
                }), e._helper && !i.animate && /static/.test(a.css("position")) && t(this).css({
                    left: r.left - n.left - s.left,
                    width: h,
                    height: l
                })
            }
        }), t.ui.plugin.add("resizable", "alsoResize", {
            start: function () {
                var e = t(this).data("ui-resizable"), i = e.options, s = function (e) {
                    t(e).each(function () {
                        var e = t(this);
                        e.data("ui-resizable-alsoresize", {
                            width: parseInt(e.width(), 10),
                            height: parseInt(e.height(), 10),
                            left: parseInt(e.css("left"), 10),
                            top: parseInt(e.css("top"), 10)
                        })
                    })
                };
                "object" != typeof i.alsoResize || i.alsoResize.parentNode ? s(i.alsoResize) : i.alsoResize.length ? (i.alsoResize = i.alsoResize[0], s(i.alsoResize)) : t.each(i.alsoResize, function (t) {
                    s(t)
                })
            }, resize: function (e, i) {
                var s = t(this).data("ui-resizable"), n = s.options, a = s.originalSize, o = s.originalPosition, r = {
                    height: s.size.height - a.height || 0,
                    width: s.size.width - a.width || 0,
                    top: s.position.top - o.top || 0,
                    left: s.position.left - o.left || 0
                }, h = function (e, s) {
                    t(e).each(function () {
                        var e = t(this), n = t(this).data("ui-resizable-alsoresize"), a = {}, o = s && s.length ? s : e.parents(i.originalElement[0]).length ? ["width", "height"] : ["width", "height", "top", "left"];
                        t.each(o, function (t, e) {
                            var i = (n[e] || 0) + (r[e] || 0);
                            i && i >= 0 && (a[e] = i || null)
                        }), e.css(a)
                    })
                };
                "object" != typeof n.alsoResize || n.alsoResize.nodeType ? h(n.alsoResize) : t.each(n.alsoResize, function (t, e) {
                    h(t, e)
                })
            }, stop: function () {
                t(this).removeData("resizable-alsoresize")
            }
        }), t.ui.plugin.add("resizable", "ghost", {
            start: function () {
                var e = t(this).data("ui-resizable"), i = e.options, s = e.size;
                e.ghost = e.originalElement.clone(), e.ghost.css({
                    opacity: .25,
                    display: "block",
                    position: "relative",
                    height: s.height,
                    width: s.width,
                    margin: 0,
                    left: 0,
                    top: 0
                }).addClass("ui-resizable-ghost").addClass("string" == typeof i.ghost ? i.ghost : ""), e.ghost.appendTo(e.helper)
            }, resize: function () {
                var e = t(this).data("ui-resizable");
                e.ghost && e.ghost.css({position: "relative", height: e.size.height, width: e.size.width})
            }, stop: function () {
                var e = t(this).data("ui-resizable");
                e.ghost && e.helper && e.helper.get(0).removeChild(e.ghost.get(0))
            }
        }), t.ui.plugin.add("resizable", "grid", {
            resize: function () {
                var e = t(this).data("ui-resizable"), i = e.options, s = e.size, n = e.originalSize, a = e.originalPosition, o = e.axis, r = "number" == typeof i.grid ? [i.grid, i.grid] : i.grid, h = r[0] || 1, l = r[1] || 1, c = Math.round((s.width - n.width) / h) * h, u = Math.round((s.height - n.height) / l) * l, d = n.width + c, p = n.height + u, f = i.maxWidth && d > i.maxWidth, g = i.maxHeight && p > i.maxHeight, m = i.minWidth && i.minWidth > d, v = i.minHeight && i.minHeight > p;
                i.grid = r, m && (d += h), v && (p += l), f && (d -= h), g && (p -= l), /^(se|s|e)$/.test(o) ? (e.size.width = d, e.size.height = p) : /^(ne)$/.test(o) ? (e.size.width = d, e.size.height = p, e.position.top = a.top - u) : /^(sw)$/.test(o) ? (e.size.width = d, e.size.height = p, e.position.left = a.left - c) : (p - l > 0 ? (e.size.height = p, e.position.top = a.top - u) : (e.size.height = l, e.position.top = a.top + n.height - l), d - h > 0 ? (e.size.width = d, e.position.left = a.left - c) : (e.size.width = h, e.position.left = a.left + n.width - h))
            }
        })
    }(jQuery), function (t) {
        t.widget("ui.selectable", t.ui.mouse, {
            version: "1.10.4",
            options: {
                appendTo: "body",
                autoRefresh: !0,
                distance: 0,
                filter: "*",
                tolerance: "touch",
                selected: null,
                selecting: null,
                start: null,
                stop: null,
                unselected: null,
                unselecting: null
            },
            _create: function () {
                var e, i = this;
                this.element.addClass("ui-selectable"), this.dragged = !1, this.refresh = function () {
                    e = t(i.options.filter, i.element[0]), e.addClass("ui-selectee"), e.each(function () {
                        var e = t(this), i = e.offset();
                        t.data(this, "selectable-item", {
                            element: this,
                            $element: e,
                            left: i.left,
                            top: i.top,
                            right: i.left + e.outerWidth(),
                            bottom: i.top + e.outerHeight(),
                            startselected: !1,
                            selected: e.hasClass("ui-selected"),
                            selecting: e.hasClass("ui-selecting"),
                            unselecting: e.hasClass("ui-unselecting")
                        })
                    })
                }, this.refresh(), this.selectees = e.addClass("ui-selectee"), this._mouseInit(), this.helper = t("<div class='ui-selectable-helper'></div>")
            },
            _destroy: function () {
                this.selectees.removeClass("ui-selectee").removeData("selectable-item"), this.element.removeClass("ui-selectable ui-selectable-disabled"), this._mouseDestroy()
            },
            _mouseStart: function (e) {
                var i = this, s = this.options;
                this.opos = [e.pageX, e.pageY], this.options.disabled || (this.selectees = t(s.filter, this.element[0]), this._trigger("start", e), t(s.appendTo).append(this.helper), this.helper.css({
                    left: e.pageX,
                    top: e.pageY,
                    width: 0,
                    height: 0
                }), s.autoRefresh && this.refresh(), this.selectees.filter(".ui-selected").each(function () {
                    var s = t.data(this, "selectable-item");
                    s.startselected = !0, e.metaKey || e.ctrlKey || (s.$element.removeClass("ui-selected"), s.selected = !1, s.$element.addClass("ui-unselecting"), s.unselecting = !0, i._trigger("unselecting", e, {unselecting: s.element}))
                }), t(e.target).parents().addBack().each(function () {
                    var s, n = t.data(this, "selectable-item");
                    return n ? (s = !e.metaKey && !e.ctrlKey || !n.$element.hasClass("ui-selected"), n.$element.removeClass(s ? "ui-unselecting" : "ui-selected").addClass(s ? "ui-selecting" : "ui-unselecting"), n.unselecting = !s, n.selecting = s, n.selected = s, s ? i._trigger("selecting", e, {selecting: n.element}) : i._trigger("unselecting", e, {unselecting: n.element}), !1) : void 0
                }))
            },
            _mouseDrag: function (e) {
                if (this.dragged = !0, !this.options.disabled) {
                    var i, s = this, n = this.options, a = this.opos[0], o = this.opos[1], r = e.pageX, l = e.pageY;
                    return a > r && (i = r, r = a, a = i), o > l && (i = l, l = o, o = i), this.helper.css({
                        left: a,
                        top: o,
                        width: r - a,
                        height: l - o
                    }), this.selectees.each(function () {
                        var i = t.data(this, "selectable-item"), h = !1;
                        i && i.element !== s.element[0] && ("touch" === n.tolerance ? h = !(i.left > r || a > i.right || i.top > l || o > i.bottom) : "fit" === n.tolerance && (h = i.left > a && r > i.right && i.top > o && l > i.bottom), h ? (i.selected && (i.$element.removeClass("ui-selected"), i.selected = !1), i.unselecting && (i.$element.removeClass("ui-unselecting"), i.unselecting = !1), i.selecting || (i.$element.addClass("ui-selecting"), i.selecting = !0, s._trigger("selecting", e, {selecting: i.element}))) : (i.selecting && ((e.metaKey || e.ctrlKey) && i.startselected ? (i.$element.removeClass("ui-selecting"), i.selecting = !1, i.$element.addClass("ui-selected"), i.selected = !0) : (i.$element.removeClass("ui-selecting"), i.selecting = !1, i.startselected && (i.$element.addClass("ui-unselecting"), i.unselecting = !0), s._trigger("unselecting", e, {unselecting: i.element}))), i.selected && (e.metaKey || e.ctrlKey || i.startselected || (i.$element.removeClass("ui-selected"), i.selected = !1, i.$element.addClass("ui-unselecting"), i.unselecting = !0, s._trigger("unselecting", e, {unselecting: i.element})))))
                    }), !1
                }
            },
            _mouseStop: function (e) {
                var i = this;
                return this.dragged = !1, t(".ui-unselecting", this.element[0]).each(function () {
                    var s = t.data(this, "selectable-item");
                    s.$element.removeClass("ui-unselecting"), s.unselecting = !1, s.startselected = !1, i._trigger("unselected", e, {unselected: s.element})
                }), t(".ui-selecting", this.element[0]).each(function () {
                    var s = t.data(this, "selectable-item");
                    s.$element.removeClass("ui-selecting").addClass("ui-selected"), s.selecting = !1, s.selected = !0, s.startselected = !0, i._trigger("selected", e, {selected: s.element})
                }), this._trigger("stop", e), this.helper.remove(), !1
            }
        })
    }(jQuery), function (t) {
        var e = 5;
        t.widget("ui.slider", t.ui.mouse, {
            version: "1.10.4",
            widgetEventPrefix: "slide",
            options: {
                animate: !1,
                distance: 0,
                max: 100,
                min: 0,
                orientation: "horizontal",
                range: !1,
                step: 1,
                value: 0,
                values: null,
                change: null,
                slide: null,
                start: null,
                stop: null
            },
            _create: function () {
                this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget ui-widget-content ui-corner-all"), this._refresh(), this._setOption("disabled", this.options.disabled), this._animateOff = !1
            },
            _refresh: function () {
                this._createRange(), this._createHandles(), this._setupEvents(), this._refreshValue()
            },
            _createHandles: function () {
                var e, i, s = this.options, n = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"), a = "<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>", o = [];
                for (i = s.values && s.values.length || 1, n.length > i && (n.slice(i).remove(), n = n.slice(0, i)), e = n.length; i > e; e++)o.push(a);
                this.handles = n.add(t(o.join("")).appendTo(this.element)), this.handle = this.handles.eq(0), this.handles.each(function (e) {
                    t(this).data("ui-slider-handle-index", e)
                })
            },
            _createRange: function () {
                var e = this.options, i = "";
                e.range ? (e.range === !0 && (e.values ? e.values.length && 2 !== e.values.length ? e.values = [e.values[0], e.values[0]] : t.isArray(e.values) && (e.values = e.values.slice(0)) : e.values = [this._valueMin(), this._valueMin()]), this.range && this.range.length ? this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({
                    left: "",
                    bottom: ""
                }) : (this.range = t("<div></div>").appendTo(this.element), i = "ui-slider-range ui-widget-header ui-corner-all"), this.range.addClass(i + ("min" === e.range || "max" === e.range ? " ui-slider-range-" + e.range : ""))) : (this.range && this.range.remove(), this.range = null)
            },
            _setupEvents: function () {
                var t = this.handles.add(this.range).filter("a");
                this._off(t), this._on(t, this._handleEvents), this._hoverable(t), this._focusable(t)
            },
            _destroy: function () {
                this.handles.remove(), this.range && this.range.remove(), this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"), this._mouseDestroy()
            },
            _mouseCapture: function (e) {
                var i, s, n, a, o, r, l, h, u = this, c = this.options;
                return c.disabled ? !1 : (this.elementSize = {
                    width: this.element.outerWidth(),
                    height: this.element.outerHeight()
                }, this.elementOffset = this.element.offset(), i = {
                    x: e.pageX,
                    y: e.pageY
                }, s = this._normValueFromMouse(i), n = this._valueMax() - this._valueMin() + 1, this.handles.each(function (e) {
                    var i = Math.abs(s - u.values(e));
                    (n > i || n === i && (e === u._lastChangedValue || u.values(e) === c.min)) && (n = i, a = t(this), o = e)
                }), r = this._start(e, o), r === !1 ? !1 : (this._mouseSliding = !0, this._handleIndex = o, a.addClass("ui-state-active").focus(), l = a.offset(), h = !t(e.target).parents().addBack().is(".ui-slider-handle"), this._clickOffset = h ? {
                    left: 0,
                    top: 0
                } : {
                    left: e.pageX - l.left - a.width() / 2,
                    top: e.pageY - l.top - a.height() / 2 - (parseInt(a.css("borderTopWidth"), 10) || 0) - (parseInt(a.css("borderBottomWidth"), 10) || 0) + (parseInt(a.css("marginTop"), 10) || 0)
                }, this.handles.hasClass("ui-state-hover") || this._slide(e, o, s), this._animateOff = !0, !0))
            },
            _mouseStart: function () {
                return !0
            },
            _mouseDrag: function (t) {
                var e = {x: t.pageX, y: t.pageY}, i = this._normValueFromMouse(e);
                return this._slide(t, this._handleIndex, i), !1
            },
            _mouseStop: function (t) {
                return this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(t, this._handleIndex), this._change(t, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1
            },
            _detectOrientation: function () {
                this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal"
            },
            _normValueFromMouse: function (t) {
                var e, i, s, n, a;
                return "horizontal" === this.orientation ? (e = this.elementSize.width, i = t.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (e = this.elementSize.height, i = t.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), s = i / e, s > 1 && (s = 1), 0 > s && (s = 0), "vertical" === this.orientation && (s = 1 - s), n = this._valueMax() - this._valueMin(), a = this._valueMin() + s * n, this._trimAlignValue(a)
            },
            _start: function (t, e) {
                var i = {handle: this.handles[e], value: this.value()};
                return this.options.values && this.options.values.length && (i.value = this.values(e), i.values = this.values()), this._trigger("start", t, i)
            },
            _slide: function (t, e, i) {
                var s, n, a;
                this.options.values && this.options.values.length ? (s = this.values(e ? 0 : 1), 2 === this.options.values.length && this.options.range === !0 && (0 === e && i > s || 1 === e && s > i) && (i = s), i !== this.values(e) && (n = this.values(), n[e] = i, a = this._trigger("slide", t, {
                    handle: this.handles[e],
                    value: i,
                    values: n
                }), s = this.values(e ? 0 : 1), a !== !1 && this.values(e, i))) : i !== this.value() && (a = this._trigger("slide", t, {
                    handle: this.handles[e],
                    value: i
                }), a !== !1 && this.value(i))
            },
            _stop: function (t, e) {
                var i = {handle: this.handles[e], value: this.value()};
                this.options.values && this.options.values.length && (i.value = this.values(e), i.values = this.values()), this._trigger("stop", t, i)
            },
            _change: function (t, e) {
                if (!this._keySliding && !this._mouseSliding) {
                    var i = {handle: this.handles[e], value: this.value()};
                    this.options.values && this.options.values.length && (i.value = this.values(e), i.values = this.values()), this._lastChangedValue = e, this._trigger("change", t, i)
                }
            },
            value: function (t) {
                return arguments.length ? (this.options.value = this._trimAlignValue(t), this._refreshValue(), void this._change(null, 0)) : this._value()
            },
            values: function (e, i) {
                var s, n, a;
                if (arguments.length > 1)return this.options.values[e] = this._trimAlignValue(i), this._refreshValue(), void this._change(null, e);
                if (!arguments.length)return this._values();
                if (!t.isArray(arguments[0]))return this.options.values && this.options.values.length ? this._values(e) : this.value();
                for (s = this.options.values, n = arguments[0], a = 0; s.length > a; a += 1)s[a] = this._trimAlignValue(n[a]), this._change(null, a);
                this._refreshValue()
            },
            _setOption: function (e, i) {
                var s, n = 0;
                switch ("range" === e && this.options.range === !0 && ("min" === i ? (this.options.value = this._values(0), this.options.values = null) : "max" === i && (this.options.value = this._values(this.options.values.length - 1), this.options.values = null)), t.isArray(this.options.values) && (n = this.options.values.length), t.Widget.prototype._setOption.apply(this, arguments), e) {
                    case"orientation":
                        this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue();
                        break;
                    case"value":
                        this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
                        break;
                    case"values":
                        for (this._animateOff = !0, this._refreshValue(), s = 0; n > s; s += 1)this._change(null, s);
                        this._animateOff = !1;
                        break;
                    case"min":
                    case"max":
                        this._animateOff = !0, this._refreshValue(), this._animateOff = !1;
                        break;
                    case"range":
                        this._animateOff = !0, this._refresh(), this._animateOff = !1
                }
            },
            _value: function () {
                var t = this.options.value;
                return t = this._trimAlignValue(t)
            },
            _values: function (t) {
                var e, i, s;
                if (arguments.length)return e = this.options.values[t], e = this._trimAlignValue(e);
                if (this.options.values && this.options.values.length) {
                    for (i = this.options.values.slice(), s = 0; i.length > s; s += 1)i[s] = this._trimAlignValue(i[s]);
                    return i
                }
                return []
            },
            _trimAlignValue: function (t) {
                if (this._valueMin() >= t)return this._valueMin();
                if (t >= this._valueMax())return this._valueMax();
                var e = this.options.step > 0 ? this.options.step : 1, i = (t - this._valueMin()) % e, s = t - i;
                return 2 * Math.abs(i) >= e && (s += i > 0 ? e : -e), parseFloat(s.toFixed(5))
            },
            _valueMin: function () {
                return this.options.min
            },
            _valueMax: function () {
                return this.options.max
            },
            _refreshValue: function () {
                var e, i, s, n, a, o = this.options.range, r = this.options, l = this, h = this._animateOff ? !1 : r.animate, u = {};
                this.options.values && this.options.values.length ? this.handles.each(function (s) {
                    i = 100 * ((l.values(s) - l._valueMin()) / (l._valueMax() - l._valueMin())), u["horizontal" === l.orientation ? "left" : "bottom"] = i + "%", t(this).stop(1, 1)[h ? "animate" : "css"](u, r.animate), l.options.range === !0 && ("horizontal" === l.orientation ? (0 === s && l.range.stop(1, 1)[h ? "animate" : "css"]({left: i + "%"}, r.animate), 1 === s && l.range[h ? "animate" : "css"]({width: i - e + "%"}, {
                        queue: !1,
                        duration: r.animate
                    })) : (0 === s && l.range.stop(1, 1)[h ? "animate" : "css"]({bottom: i + "%"}, r.animate), 1 === s && l.range[h ? "animate" : "css"]({height: i - e + "%"}, {
                        queue: !1,
                        duration: r.animate
                    }))), e = i
                }) : (s = this.value(), n = this._valueMin(), a = this._valueMax(), i = a !== n ? 100 * ((s - n) / (a - n)) : 0, u["horizontal" === this.orientation ? "left" : "bottom"] = i + "%", this.handle.stop(1, 1)[h ? "animate" : "css"](u, r.animate), "min" === o && "horizontal" === this.orientation && this.range.stop(1, 1)[h ? "animate" : "css"]({width: i + "%"}, r.animate), "max" === o && "horizontal" === this.orientation && this.range[h ? "animate" : "css"]({width: 100 - i + "%"}, {
                    queue: !1,
                    duration: r.animate
                }), "min" === o && "vertical" === this.orientation && this.range.stop(1, 1)[h ? "animate" : "css"]({height: i + "%"}, r.animate), "max" === o && "vertical" === this.orientation && this.range[h ? "animate" : "css"]({height: 100 - i + "%"}, {
                    queue: !1,
                    duration: r.animate
                }))
            },
            _handleEvents: {
                keydown: function (i) {
                    var s, n, a, o, r = t(i.target).data("ui-slider-handle-index");
                    switch (i.keyCode) {
                        case t.ui.keyCode.HOME:
                        case t.ui.keyCode.END:
                        case t.ui.keyCode.PAGE_UP:
                        case t.ui.keyCode.PAGE_DOWN:
                        case t.ui.keyCode.UP:
                        case t.ui.keyCode.RIGHT:
                        case t.ui.keyCode.DOWN:
                        case t.ui.keyCode.LEFT:
                            if (i.preventDefault(), !this._keySliding && (this._keySliding = !0, t(i.target).addClass("ui-state-active"), s = this._start(i, r), s === !1))return
                    }
                    switch (o = this.options.step, n = a = this.options.values && this.options.values.length ? this.values(r) : this.value(), i.keyCode) {
                        case t.ui.keyCode.HOME:
                            a = this._valueMin();
                            break;
                        case t.ui.keyCode.END:
                            a = this._valueMax();
                            break;
                        case t.ui.keyCode.PAGE_UP:
                            a = this._trimAlignValue(n + (this._valueMax() - this._valueMin()) / e);
                            break;
                        case t.ui.keyCode.PAGE_DOWN:
                            a = this._trimAlignValue(n - (this._valueMax() - this._valueMin()) / e);
                            break;
                        case t.ui.keyCode.UP:
                        case t.ui.keyCode.RIGHT:
                            if (n === this._valueMax())return;
                            a = this._trimAlignValue(n + o);
                            break;
                        case t.ui.keyCode.DOWN:
                        case t.ui.keyCode.LEFT:
                            if (n === this._valueMin())return;
                            a = this._trimAlignValue(n - o)
                    }
                    this._slide(i, r, a)
                }, click: function (t) {
                    t.preventDefault()
                }, keyup: function (e) {
                    var i = t(e.target).data("ui-slider-handle-index");
                    this._keySliding && (this._keySliding = !1, this._stop(e, i), this._change(e, i), t(e.target).removeClass("ui-state-active"))
                }
            }
        })
    }(jQuery), function (t) {
        function e(t, e, i) {
            return t > e && e + i > t
        }

        function i(t) {
            return /left|right/.test(t.css("float")) || /inline|table-cell/.test(t.css("display"))
        }

        t.widget("ui.sortable", t.ui.mouse, {
            version: "1.10.4",
            widgetEventPrefix: "sort",
            ready: !1,
            options: {
                appendTo: "parent",
                axis: !1,
                connectWith: !1,
                containment: !1,
                cursor: "auto",
                cursorAt: !1,
                dropOnEmpty: !0,
                forcePlaceholderSize: !1,
                forceHelperSize: !1,
                grid: !1,
                handle: !1,
                helper: "original",
                items: "> *",
                opacity: !1,
                placeholder: !1,
                revert: !1,
                scroll: !0,
                scrollSensitivity: 20,
                scrollSpeed: 20,
                scope: "default",
                tolerance: "intersect",
                zIndex: 1e3,
                activate: null,
                beforeStop: null,
                change: null,
                deactivate: null,
                out: null,
                over: null,
                receive: null,
                remove: null,
                sort: null,
                start: null,
                stop: null,
                update: null
            },
            _create: function () {
                var t = this.options;
                this.containerCache = {}, this.element.addClass("ui-sortable"), this.refresh(), this.floating = this.items.length ? "x" === t.axis || i(this.items[0].item) : !1, this.offset = this.element.offset(), this._mouseInit(), this.ready = !0
            },
            _destroy: function () {
                this.element.removeClass("ui-sortable ui-sortable-disabled"), this._mouseDestroy();
                for (var t = this.items.length - 1; t >= 0; t--)this.items[t].item.removeData(this.widgetName + "-item");
                return this
            },
            _setOption: function (e, i) {
                "disabled" === e ? (this.options[e] = i, this.widget().toggleClass("ui-sortable-disabled", !!i)) : t.Widget.prototype._setOption.apply(this, arguments)
            },
            _mouseCapture: function (e, i) {
                var s = null, n = !1, o = this;
                return this.reverting ? !1 : this.options.disabled || "static" === this.options.type ? !1 : (this._refreshItems(e), t(e.target).parents().each(function () {
                    return t.data(this, o.widgetName + "-item") === o ? (s = t(this), !1) : void 0
                }), t.data(e.target, o.widgetName + "-item") === o && (s = t(e.target)), s && (!this.options.handle || i || (t(this.options.handle, s).find("*").addBack().each(function () {
                    this === e.target && (n = !0)
                }), n)) ? (this.currentItem = s, this._removeCurrentsFromItems(), !0) : !1)
            },
            _mouseStart: function (e, i, s) {
                var n, o, a = this.options;
                if (this.currentContainer = this, this.refreshPositions(), this.helper = this._createHelper(e), this._cacheHelperProportions(), this._cacheMargins(), this.scrollParent = this.helper.scrollParent(), this.offset = this.currentItem.offset(), this.offset = {
                        top: this.offset.top - this.margins.top,
                        left: this.offset.left - this.margins.left
                    }, t.extend(this.offset, {
                        click: {left: e.pageX - this.offset.left, top: e.pageY - this.offset.top},
                        parent: this._getParentOffset(),
                        relative: this._getRelativeOffset()
                    }), this.helper.css("position", "absolute"), this.cssPosition = this.helper.css("position"), this.originalPosition = this._generatePosition(e), this.originalPageX = e.pageX, this.originalPageY = e.pageY, a.cursorAt && this._adjustOffsetFromHelper(a.cursorAt), this.domPosition = {
                        prev: this.currentItem.prev()[0],
                        parent: this.currentItem.parent()[0]
                    }, this.helper[0] !== this.currentItem[0] && this.currentItem.hide(), this._createPlaceholder(), a.containment && this._setContainment(), a.cursor && "auto" !== a.cursor && (o = this.document.find("body"), this.storedCursor = o.css("cursor"), o.css("cursor", a.cursor), this.storedStylesheet = t("<style>*{ cursor: " + a.cursor + " !important; }</style>").appendTo(o)), a.opacity && (this.helper.css("opacity") && (this._storedOpacity = this.helper.css("opacity")), this.helper.css("opacity", a.opacity)), a.zIndex && (this.helper.css("zIndex") && (this._storedZIndex = this.helper.css("zIndex")), this.helper.css("zIndex", a.zIndex)), this.scrollParent[0] !== document && "HTML" !== this.scrollParent[0].tagName && (this.overflowOffset = this.scrollParent.offset()), this._trigger("start", e, this._uiHash()), this._preserveHelperProportions || this._cacheHelperProportions(), !s)for (n = this.containers.length - 1; n >= 0; n--)this.containers[n]._trigger("activate", e, this._uiHash(this));
                return t.ui.ddmanager && (t.ui.ddmanager.current = this), t.ui.ddmanager && !a.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e), this.dragging = !0, this.helper.addClass("ui-sortable-helper"), this._mouseDrag(e), !0
            },
            _mouseDrag: function (e) {
                var i, s, n, o, a = this.options, r = !1;
                for (this.position = this._generatePosition(e), this.positionAbs = this._convertPositionTo("absolute"), this.lastPositionAbs || (this.lastPositionAbs = this.positionAbs), this.options.scroll && (this.scrollParent[0] !== document && "HTML" !== this.scrollParent[0].tagName ? (this.overflowOffset.top + this.scrollParent[0].offsetHeight - e.pageY < a.scrollSensitivity ? this.scrollParent[0].scrollTop = r = this.scrollParent[0].scrollTop + a.scrollSpeed : e.pageY - this.overflowOffset.top < a.scrollSensitivity && (this.scrollParent[0].scrollTop = r = this.scrollParent[0].scrollTop - a.scrollSpeed), this.overflowOffset.left + this.scrollParent[0].offsetWidth - e.pageX < a.scrollSensitivity ? this.scrollParent[0].scrollLeft = r = this.scrollParent[0].scrollLeft + a.scrollSpeed : e.pageX - this.overflowOffset.left < a.scrollSensitivity && (this.scrollParent[0].scrollLeft = r = this.scrollParent[0].scrollLeft - a.scrollSpeed)) : (e.pageY - t(document).scrollTop() < a.scrollSensitivity ? r = t(document).scrollTop(t(document).scrollTop() - a.scrollSpeed) : t(window).height() - (e.pageY - t(document).scrollTop()) < a.scrollSensitivity && (r = t(document).scrollTop(t(document).scrollTop() + a.scrollSpeed)), e.pageX - t(document).scrollLeft() < a.scrollSensitivity ? r = t(document).scrollLeft(t(document).scrollLeft() - a.scrollSpeed) : t(window).width() - (e.pageX - t(document).scrollLeft()) < a.scrollSensitivity && (r = t(document).scrollLeft(t(document).scrollLeft() + a.scrollSpeed))), r !== !1 && t.ui.ddmanager && !a.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e)), this.positionAbs = this._convertPositionTo("absolute"), this.options.axis && "y" === this.options.axis || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && "x" === this.options.axis || (this.helper[0].style.top = this.position.top + "px"), i = this.items.length - 1; i >= 0; i--)if (s = this.items[i], n = s.item[0], o = this._intersectsWithPointer(s), o && s.instance === this.currentContainer && n !== this.currentItem[0] && this.placeholder[1 === o ? "next" : "prev"]()[0] !== n && !t.contains(this.placeholder[0], n) && ("semi-dynamic" === this.options.type ? !t.contains(this.element[0], n) : !0)) {
                    if (this.direction = 1 === o ? "down" : "up", "pointer" !== this.options.tolerance && !this._intersectsWithSides(s))break;
                    this._rearrange(e, s), this._trigger("change", e, this._uiHash());
                    break
                }
                return this._contactContainers(e), t.ui.ddmanager && t.ui.ddmanager.drag(this, e), this._trigger("sort", e, this._uiHash()), this.lastPositionAbs = this.positionAbs, !1
            },
            _mouseStop: function (e, i) {
                if (e) {
                    if (t.ui.ddmanager && !this.options.dropBehaviour && t.ui.ddmanager.drop(this, e), this.options.revert) {
                        var s = this, n = this.placeholder.offset(), o = this.options.axis, a = {};
                        o && "x" !== o || (a.left = n.left - this.offset.parent.left - this.margins.left + (this.offsetParent[0] === document.body ? 0 : this.offsetParent[0].scrollLeft)), o && "y" !== o || (a.top = n.top - this.offset.parent.top - this.margins.top + (this.offsetParent[0] === document.body ? 0 : this.offsetParent[0].scrollTop)), this.reverting = !0, t(this.helper).animate(a, parseInt(this.options.revert, 10) || 500, function () {
                            s._clear(e)
                        })
                    } else this._clear(e, i);
                    return !1
                }
            },
            cancel: function () {
                if (this.dragging) {
                    this._mouseUp({target: null}), "original" === this.options.helper ? this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper") : this.currentItem.show();
                    for (var e = this.containers.length - 1; e >= 0; e--)this.containers[e]._trigger("deactivate", null, this._uiHash(this)), this.containers[e].containerCache.over && (this.containers[e]._trigger("out", null, this._uiHash(this)), this.containers[e].containerCache.over = 0)
                }
                return this.placeholder && (this.placeholder[0].parentNode && this.placeholder[0].parentNode.removeChild(this.placeholder[0]), "original" !== this.options.helper && this.helper && this.helper[0].parentNode && this.helper.remove(), t.extend(this, {
                    helper: null,
                    dragging: !1,
                    reverting: !1,
                    _noFinalSort: null
                }), this.domPosition.prev ? t(this.domPosition.prev).after(this.currentItem) : t(this.domPosition.parent).prepend(this.currentItem)), this
            },
            serialize: function (e) {
                var i = this._getItemsAsjQuery(e && e.connected), s = [];
                return e = e || {}, t(i).each(function () {
                    var i = (t(e.item || this).attr(e.attribute || "id") || "").match(e.expression || /(.+)[\-=_](.+)/);
                    i && s.push((e.key || i[1] + "[]") + "=" + (e.key && e.expression ? i[1] : i[2]))
                }), !s.length && e.key && s.push(e.key + "="), s.join("&")
            },
            toArray: function (e) {
                var i = this._getItemsAsjQuery(e && e.connected), s = [];
                return e = e || {}, i.each(function () {
                    s.push(t(e.item || this).attr(e.attribute || "id") || "")
                }), s
            },
            _intersectsWith: function (t) {
                var e = this.positionAbs.left, i = e + this.helperProportions.width, s = this.positionAbs.top, n = s + this.helperProportions.height, o = t.left, a = o + t.width, r = t.top, h = r + t.height, l = this.offset.click.top, c = this.offset.click.left, u = "x" === this.options.axis || s + l > r && h > s + l, d = "y" === this.options.axis || e + c > o && a > e + c, p = u && d;
                return "pointer" === this.options.tolerance || this.options.forcePointerForContainers || "pointer" !== this.options.tolerance && this.helperProportions[this.floating ? "width" : "height"] > t[this.floating ? "width" : "height"] ? p : e + this.helperProportions.width / 2 > o && a > i - this.helperProportions.width / 2 && s + this.helperProportions.height / 2 > r && h > n - this.helperProportions.height / 2
            },
            _intersectsWithPointer: function (t) {
                var i = "x" === this.options.axis || e(this.positionAbs.top + this.offset.click.top, t.top, t.height), s = "y" === this.options.axis || e(this.positionAbs.left + this.offset.click.left, t.left, t.width), n = i && s, o = this._getDragVerticalDirection(), a = this._getDragHorizontalDirection();
                return n ? this.floating ? a && "right" === a || "down" === o ? 2 : 1 : o && ("down" === o ? 2 : 1) : !1
            },
            _intersectsWithSides: function (t) {
                var i = e(this.positionAbs.top + this.offset.click.top, t.top + t.height / 2, t.height), s = e(this.positionAbs.left + this.offset.click.left, t.left + t.width / 2, t.width), n = this._getDragVerticalDirection(), o = this._getDragHorizontalDirection();
                return this.floating && o ? "right" === o && s || "left" === o && !s : n && ("down" === n && i || "up" === n && !i)
            },
            _getDragVerticalDirection: function () {
                var t = this.positionAbs.top - this.lastPositionAbs.top;
                return 0 !== t && (t > 0 ? "down" : "up")
            },
            _getDragHorizontalDirection: function () {
                var t = this.positionAbs.left - this.lastPositionAbs.left;
                return 0 !== t && (t > 0 ? "right" : "left")
            },
            refresh: function (t) {
                return this._refreshItems(t), this.refreshPositions(), this
            },
            _connectWith: function () {
                var t = this.options;
                return t.connectWith.constructor === String ? [t.connectWith] : t.connectWith
            },
            _getItemsAsjQuery: function (e) {
                function i() {
                    r.push(this)
                }

                var s, n, o, a, r = [], h = [], l = this._connectWith();
                if (l && e)for (s = l.length - 1; s >= 0; s--)for (o = t(l[s]), n = o.length - 1; n >= 0; n--)a = t.data(o[n], this.widgetFullName), a && a !== this && !a.options.disabled && h.push([t.isFunction(a.options.items) ? a.options.items.call(a.element) : t(a.options.items, a.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), a]);
                for (h.push([t.isFunction(this.options.items) ? this.options.items.call(this.element, null, {
                    options: this.options,
                    item: this.currentItem
                }) : t(this.options.items, this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), this]), s = h.length - 1; s >= 0; s--)h[s][0].each(i);
                return t(r)
            },
            _removeCurrentsFromItems: function () {
                var e = this.currentItem.find(":data(" + this.widgetName + "-item)");
                this.items = t.grep(this.items, function (t) {
                    for (var i = 0; e.length > i; i++)if (e[i] === t.item[0])return !1;
                    return !0
                })
            },
            _refreshItems: function (e) {
                this.items = [], this.containers = [this];
                var i, s, n, o, a, r, h, l, c = this.items, u = [[t.isFunction(this.options.items) ? this.options.items.call(this.element[0], e, {item: this.currentItem}) : t(this.options.items, this.element), this]], d = this._connectWith();
                if (d && this.ready)for (i = d.length - 1; i >= 0; i--)for (n = t(d[i]), s = n.length - 1; s >= 0; s--)o = t.data(n[s], this.widgetFullName), o && o !== this && !o.options.disabled && (u.push([t.isFunction(o.options.items) ? o.options.items.call(o.element[0], e, {item: this.currentItem}) : t(o.options.items, o.element), o]), this.containers.push(o));
                for (i = u.length - 1; i >= 0; i--)for (a = u[i][1], r = u[i][0], s = 0, l = r.length; l > s; s++)h = t(r[s]), h.data(this.widgetName + "-item", a), c.push({
                    item: h,
                    instance: a,
                    width: 0,
                    height: 0,
                    left: 0,
                    top: 0
                })
            },
            refreshPositions: function (e) {
                this.offsetParent && this.helper && (this.offset.parent = this._getParentOffset());
                var i, s, n, o;
                for (i = this.items.length - 1; i >= 0; i--)s = this.items[i], s.instance !== this.currentContainer && this.currentContainer && s.item[0] !== this.currentItem[0] || (n = this.options.toleranceElement ? t(this.options.toleranceElement, s.item) : s.item, e || (s.width = n.outerWidth(), s.height = n.outerHeight()), o = n.offset(), s.left = o.left, s.top = o.top);
                if (this.options.custom && this.options.custom.refreshContainers)this.options.custom.refreshContainers.call(this); else for (i = this.containers.length - 1; i >= 0; i--)o = this.containers[i].element.offset(), this.containers[i].containerCache.left = o.left, this.containers[i].containerCache.top = o.top, this.containers[i].containerCache.width = this.containers[i].element.outerWidth(), this.containers[i].containerCache.height = this.containers[i].element.outerHeight();
                return this
            },
            _createPlaceholder: function (e) {
                e = e || this;
                var i, s = e.options;
                s.placeholder && s.placeholder.constructor !== String || (i = s.placeholder, s.placeholder = {
                    element: function () {
                        var s = e.currentItem[0].nodeName.toLowerCase(), n = t("<" + s + ">", e.document[0]).addClass(i || e.currentItem[0].className + " ui-sortable-placeholder").removeClass("ui-sortable-helper");
                        return "tr" === s ? e.currentItem.children().each(function () {
                            t("<td>&#160;</td>", e.document[0]).attr("colspan", t(this).attr("colspan") || 1).appendTo(n)
                        }) : "img" === s && n.attr("src", e.currentItem.attr("src")), i || n.css("visibility", "hidden"), n
                    }, update: function (t, n) {
                        (!i || s.forcePlaceholderSize) && (n.height() || n.height(e.currentItem.innerHeight() - parseInt(e.currentItem.css("paddingTop") || 0, 10) - parseInt(e.currentItem.css("paddingBottom") || 0, 10)), n.width() || n.width(e.currentItem.innerWidth() - parseInt(e.currentItem.css("paddingLeft") || 0, 10) - parseInt(e.currentItem.css("paddingRight") || 0, 10)))
                    }
                }), e.placeholder = t(s.placeholder.element.call(e.element, e.currentItem)), e.currentItem.after(e.placeholder), s.placeholder.update(e, e.placeholder)
            },
            _contactContainers: function (s) {
                var n, o, a, r, h, l, c, u, d, p, f = null, g = null;
                for (n = this.containers.length - 1; n >= 0; n--)if (!t.contains(this.currentItem[0], this.containers[n].element[0]))if (this._intersectsWith(this.containers[n].containerCache)) {
                    if (f && t.contains(this.containers[n].element[0], f.element[0]))continue;
                    f = this.containers[n], g = n
                } else this.containers[n].containerCache.over && (this.containers[n]._trigger("out", s, this._uiHash(this)), this.containers[n].containerCache.over = 0);
                if (f)if (1 === this.containers.length)this.containers[g].containerCache.over || (this.containers[g]._trigger("over", s, this._uiHash(this)), this.containers[g].containerCache.over = 1); else {
                    for (a = 1e4, r = null, p = f.floating || i(this.currentItem), h = p ? "left" : "top", l = p ? "width" : "height", c = this.positionAbs[h] + this.offset.click[h], o = this.items.length - 1; o >= 0; o--)t.contains(this.containers[g].element[0], this.items[o].item[0]) && this.items[o].item[0] !== this.currentItem[0] && (!p || e(this.positionAbs.top + this.offset.click.top, this.items[o].top, this.items[o].height)) && (u = this.items[o].item.offset()[h], d = !1, Math.abs(u - c) > Math.abs(u + this.items[o][l] - c) && (d = !0, u += this.items[o][l]), a > Math.abs(u - c) && (a = Math.abs(u - c), r = this.items[o], this.direction = d ? "up" : "down"));
                    if (!r && !this.options.dropOnEmpty)return;
                    if (this.currentContainer === this.containers[g])return;
                    r ? this._rearrange(s, r, null, !0) : this._rearrange(s, null, this.containers[g].element, !0), this._trigger("change", s, this._uiHash()), this.containers[g]._trigger("change", s, this._uiHash(this)), this.currentContainer = this.containers[g], this.options.placeholder.update(this.currentContainer, this.placeholder), this.containers[g]._trigger("over", s, this._uiHash(this)), this.containers[g].containerCache.over = 1
                }
            },
            _createHelper: function (e) {
                var i = this.options, s = t.isFunction(i.helper) ? t(i.helper.apply(this.element[0], [e, this.currentItem])) : "clone" === i.helper ? this.currentItem.clone() : this.currentItem;
                return s.parents("body").length || t("parent" !== i.appendTo ? i.appendTo : this.currentItem[0].parentNode)[0].appendChild(s[0]), s[0] === this.currentItem[0] && (this._storedCSS = {
                    width: this.currentItem[0].style.width,
                    height: this.currentItem[0].style.height,
                    position: this.currentItem.css("position"),
                    top: this.currentItem.css("top"),
                    left: this.currentItem.css("left")
                }), (!s[0].style.width || i.forceHelperSize) && s.width(this.currentItem.width()), (!s[0].style.height || i.forceHelperSize) && s.height(this.currentItem.height()), s
            },
            _adjustOffsetFromHelper: function (e) {
                "string" == typeof e && (e = e.split(" ")), t.isArray(e) && (e = {
                    left: +e[0],
                    top: +e[1] || 0
                }), "left"in e && (this.offset.click.left = e.left + this.margins.left), "right"in e && (this.offset.click.left = this.helperProportions.width - e.right + this.margins.left), "top"in e && (this.offset.click.top = e.top + this.margins.top), "bottom"in e && (this.offset.click.top = this.helperProportions.height - e.bottom + this.margins.top)
            },
            _getParentOffset: function () {
                this.offsetParent = this.helper.offsetParent();
                var e = this.offsetParent.offset();
                return "absolute" === this.cssPosition && this.scrollParent[0] !== document && t.contains(this.scrollParent[0], this.offsetParent[0]) && (e.left += this.scrollParent.scrollLeft(), e.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === document.body || this.offsetParent[0].tagName && "html" === this.offsetParent[0].tagName.toLowerCase() && t.ui.ie) && (e = {
                    top: 0,
                    left: 0
                }), {
                    top: e.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                    left: e.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
                }
            },
            _getRelativeOffset: function () {
                if ("relative" === this.cssPosition) {
                    var t = this.currentItem.position();
                    return {
                        top: t.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                        left: t.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                    }
                }
                return {top: 0, left: 0}
            },
            _cacheMargins: function () {
                this.margins = {
                    left: parseInt(this.currentItem.css("marginLeft"), 10) || 0,
                    top: parseInt(this.currentItem.css("marginTop"), 10) || 0
                }
            },
            _cacheHelperProportions: function () {
                this.helperProportions = {width: this.helper.outerWidth(), height: this.helper.outerHeight()}
            },
            _setContainment: function () {
                var e, i, s, n = this.options;
                "parent" === n.containment && (n.containment = this.helper[0].parentNode), ("document" === n.containment || "window" === n.containment) && (this.containment = [0 - this.offset.relative.left - this.offset.parent.left, 0 - this.offset.relative.top - this.offset.parent.top, t("document" === n.containment ? document : window).width() - this.helperProportions.width - this.margins.left, (t("document" === n.containment ? document : window).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]), /^(document|window|parent)$/.test(n.containment) || (e = t(n.containment)[0], i = t(n.containment).offset(), s = "hidden" !== t(e).css("overflow"), this.containment = [i.left + (parseInt(t(e).css("borderLeftWidth"), 10) || 0) + (parseInt(t(e).css("paddingLeft"), 10) || 0) - this.margins.left, i.top + (parseInt(t(e).css("borderTopWidth"), 10) || 0) + (parseInt(t(e).css("paddingTop"), 10) || 0) - this.margins.top, i.left + (s ? Math.max(e.scrollWidth, e.offsetWidth) : e.offsetWidth) - (parseInt(t(e).css("borderLeftWidth"), 10) || 0) - (parseInt(t(e).css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left, i.top + (s ? Math.max(e.scrollHeight, e.offsetHeight) : e.offsetHeight) - (parseInt(t(e).css("borderTopWidth"), 10) || 0) - (parseInt(t(e).css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top])
            },
            _convertPositionTo: function (e, i) {
                i || (i = this.position);
                var s = "absolute" === e ? 1 : -1, n = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent, o = /(html|body)/i.test(n[0].tagName);
                return {
                    top: i.top + this.offset.relative.top * s + this.offset.parent.top * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : o ? 0 : n.scrollTop()) * s,
                    left: i.left + this.offset.relative.left * s + this.offset.parent.left * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : o ? 0 : n.scrollLeft()) * s
                }
            },
            _generatePosition: function (e) {
                var i, s, n = this.options, o = e.pageX, a = e.pageY, r = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent, h = /(html|body)/i.test(r[0].tagName);
                return "relative" !== this.cssPosition || this.scrollParent[0] !== document && this.scrollParent[0] !== this.offsetParent[0] || (this.offset.relative = this._getRelativeOffset()), this.originalPosition && (this.containment && (e.pageX - this.offset.click.left < this.containment[0] && (o = this.containment[0] + this.offset.click.left), e.pageY - this.offset.click.top < this.containment[1] && (a = this.containment[1] + this.offset.click.top), e.pageX - this.offset.click.left > this.containment[2] && (o = this.containment[2] + this.offset.click.left), e.pageY - this.offset.click.top > this.containment[3] && (a = this.containment[3] + this.offset.click.top)), n.grid && (i = this.originalPageY + Math.round((a - this.originalPageY) / n.grid[1]) * n.grid[1], a = this.containment ? i - this.offset.click.top >= this.containment[1] && i - this.offset.click.top <= this.containment[3] ? i : i - this.offset.click.top >= this.containment[1] ? i - n.grid[1] : i + n.grid[1] : i, s = this.originalPageX + Math.round((o - this.originalPageX) / n.grid[0]) * n.grid[0], o = this.containment ? s - this.offset.click.left >= this.containment[0] && s - this.offset.click.left <= this.containment[2] ? s : s - this.offset.click.left >= this.containment[0] ? s - n.grid[0] : s + n.grid[0] : s)), {
                    top: a - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : h ? 0 : r.scrollTop()),
                    left: o - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : h ? 0 : r.scrollLeft())
                }
            },
            _rearrange: function (t, e, i, s) {
                i ? i[0].appendChild(this.placeholder[0]) : e.item[0].parentNode.insertBefore(this.placeholder[0], "down" === this.direction ? e.item[0] : e.item[0].nextSibling), this.counter = this.counter ? ++this.counter : 1;
                var n = this.counter;
                this._delay(function () {
                    n === this.counter && this.refreshPositions(!s)
                })
            },
            _clear: function (t, e) {
                function i(t, e, i) {
                    return function (s) {
                        i._trigger(t, s, e._uiHash(e))
                    }
                }

                this.reverting = !1;
                var s, n = [];
                if (!this._noFinalSort && this.currentItem.parent().length && this.placeholder.before(this.currentItem), this._noFinalSort = null, this.helper[0] === this.currentItem[0]) {
                    for (s in this._storedCSS)("auto" === this._storedCSS[s] || "static" === this._storedCSS[s]) && (this._storedCSS[s] = "");
                    this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")
                } else this.currentItem.show();
                for (this.fromOutside && !e && n.push(function (t) {
                    this._trigger("receive", t, this._uiHash(this.fromOutside))
                }), !this.fromOutside && this.domPosition.prev === this.currentItem.prev().not(".ui-sortable-helper")[0] && this.domPosition.parent === this.currentItem.parent()[0] || e || n.push(function (t) {
                    this._trigger("update", t, this._uiHash())
                }), this !== this.currentContainer && (e || (n.push(function (t) {
                    this._trigger("remove", t, this._uiHash())
                }), n.push(function (t) {
                    return function (e) {
                        t._trigger("receive", e, this._uiHash(this))
                    }
                }.call(this, this.currentContainer)), n.push(function (t) {
                    return function (e) {
                        t._trigger("update", e, this._uiHash(this))
                    }
                }.call(this, this.currentContainer)))), s = this.containers.length - 1; s >= 0; s--)e || n.push(i("deactivate", this, this.containers[s])), this.containers[s].containerCache.over && (n.push(i("out", this, this.containers[s])), this.containers[s].containerCache.over = 0);
                if (this.storedCursor && (this.document.find("body").css("cursor", this.storedCursor), this.storedStylesheet.remove()), this._storedOpacity && this.helper.css("opacity", this._storedOpacity), this._storedZIndex && this.helper.css("zIndex", "auto" === this._storedZIndex ? "" : this._storedZIndex), this.dragging = !1, this.cancelHelperRemoval) {
                    if (!e) {
                        for (this._trigger("beforeStop", t, this._uiHash()), s = 0; n.length > s; s++)n[s].call(this, t);
                        this._trigger("stop", t, this._uiHash())
                    }
                    return this.fromOutside = !1, !1
                }
                if (e || this._trigger("beforeStop", t, this._uiHash()), this.placeholder[0].parentNode.removeChild(this.placeholder[0]), this.helper[0] !== this.currentItem[0] && this.helper.remove(), this.helper = null, !e) {
                    for (s = 0; n.length > s; s++)n[s].call(this, t);
                    this._trigger("stop", t, this._uiHash())
                }
                return this.fromOutside = !1, !0
            },
            _trigger: function () {
                t.Widget.prototype._trigger.apply(this, arguments) === !1 && this.cancel()
            },
            _uiHash: function (e) {
                var i = e || this;
                return {
                    helper: i.helper,
                    placeholder: i.placeholder || t([]),
                    position: i.position,
                    originalPosition: i.originalPosition,
                    offset: i.positionAbs,
                    item: i.currentItem,
                    sender: e ? e.element : null
                }
            }
        })
    }(jQuery), function (t) {
        function e(t) {
            return function () {
                var e = this.element.val();
                t.apply(this, arguments), this._refresh(), e !== this.element.val() && this._trigger("change")
            }
        }

        t.widget("ui.spinner", {
            version: "1.10.4",
            defaultElement: "<input>",
            widgetEventPrefix: "spin",
            options: {
                culture: null,
                icons: {down: "ui-icon-triangle-1-s", up: "ui-icon-triangle-1-n"},
                incremental: !0,
                max: null,
                min: null,
                numberFormat: null,
                page: 10,
                step: 1,
                change: null,
                spin: null,
                start: null,
                stop: null
            },
            _create: function () {
                this._setOption("max", this.options.max), this._setOption("min", this.options.min), this._setOption("step", this.options.step), "" !== this.value() && this._value(this.element.val(), !0), this._draw(), this._on(this._events), this._refresh(), this._on(this.window, {
                    beforeunload: function () {
                        this.element.removeAttr("autocomplete")
                    }
                })
            },
            _getCreateOptions: function () {
                var e = {}, i = this.element;
                return t.each(["min", "max", "step"], function (t, s) {
                    var n = i.attr(s);
                    void 0 !== n && n.length && (e[s] = n)
                }), e
            },
            _events: {
                keydown: function (t) {
                    this._start(t) && this._keydown(t) && t.preventDefault()
                }, keyup: "_stop", focus: function () {
                    this.previous = this.element.val()
                }, blur: function (t) {
                    return this.cancelBlur ? void delete this.cancelBlur : (this._stop(), this._refresh(), void(this.previous !== this.element.val() && this._trigger("change", t)))
                }, mousewheel: function (t, e) {
                    if (e) {
                        if (!this.spinning && !this._start(t))return !1;
                        this._spin((e > 0 ? 1 : -1) * this.options.step, t), clearTimeout(this.mousewheelTimer), this.mousewheelTimer = this._delay(function () {
                            this.spinning && this._stop(t)
                        }, 100), t.preventDefault()
                    }
                }, "mousedown .ui-spinner-button": function (e) {
                    function i() {
                        var t = this.element[0] === this.document[0].activeElement;
                        t || (this.element.focus(), this.previous = s, this._delay(function () {
                            this.previous = s
                        }))
                    }

                    var s;
                    s = this.element[0] === this.document[0].activeElement ? this.previous : this.element.val(), e.preventDefault(), i.call(this), this.cancelBlur = !0, this._delay(function () {
                        delete this.cancelBlur, i.call(this)
                    }), this._start(e) !== !1 && this._repeat(null, t(e.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, e)
                }, "mouseup .ui-spinner-button": "_stop", "mouseenter .ui-spinner-button": function (e) {
                    return t(e.currentTarget).hasClass("ui-state-active") ? this._start(e) === !1 ? !1 : void this._repeat(null, t(e.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, e) : void 0
                }, "mouseleave .ui-spinner-button": "_stop"
            },
            _draw: function () {
                var t = this.uiSpinner = this.element.addClass("ui-spinner-input").attr("autocomplete", "off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml());
                this.element.attr("role", "spinbutton"), this.buttons = t.find(".ui-spinner-button").attr("tabIndex", -1).button().removeClass("ui-corner-all"), this.buttons.height() > Math.ceil(.5 * t.height()) && t.height() > 0 && t.height(t.height()), this.options.disabled && this.disable()
            },
            _keydown: function (e) {
                var i = this.options, s = t.ui.keyCode;
                switch (e.keyCode) {
                    case s.UP:
                        return this._repeat(null, 1, e), !0;
                    case s.DOWN:
                        return this._repeat(null, -1, e), !0;
                    case s.PAGE_UP:
                        return this._repeat(null, i.page, e), !0;
                    case s.PAGE_DOWN:
                        return this._repeat(null, -i.page, e), !0
                }
                return !1
            },
            _uiSpinnerHtml: function () {
                return "<span class='ui-spinner ui-widget ui-widget-content ui-corner-all'></span>"
            },
            _buttonHtml: function () {
                return "<a class='ui-spinner-button ui-spinner-up ui-corner-tr'><span class='ui-icon " + this.options.icons.up + "'>&#9650;</span></a><a class='ui-spinner-button ui-spinner-down ui-corner-br'><span class='ui-icon " + this.options.icons.down + "'>&#9660;</span></a>"
            },
            _start: function (t) {
                return this.spinning || this._trigger("start", t) !== !1 ? (this.counter || (this.counter = 1), this.spinning = !0, !0) : !1
            },
            _repeat: function (t, e, i) {
                t = t || 500, clearTimeout(this.timer), this.timer = this._delay(function () {
                    this._repeat(40, e, i)
                }, t), this._spin(e * this.options.step, i)
            },
            _spin: function (t, e) {
                var i = this.value() || 0;
                this.counter || (this.counter = 1), i = this._adjustValue(i + t * this._increment(this.counter)), this.spinning && this._trigger("spin", e, {value: i}) === !1 || (this._value(i), this.counter++)
            },
            _increment: function (e) {
                var i = this.options.incremental;
                return i ? t.isFunction(i) ? i(e) : Math.floor(e * e * e / 5e4 - e * e / 500 + 17 * e / 200 + 1) : 1
            },
            _precision: function () {
                var t = this._precisionOf(this.options.step);
                return null !== this.options.min && (t = Math.max(t, this._precisionOf(this.options.min))), t
            },
            _precisionOf: function (t) {
                var e = "" + t, i = e.indexOf(".");
                return -1 === i ? 0 : e.length - i - 1
            },
            _adjustValue: function (t) {
                var e, i, s = this.options;
                return e = null !== s.min ? s.min : 0, i = t - e, i = Math.round(i / s.step) * s.step, t = e + i, t = parseFloat(t.toFixed(this._precision())), null !== s.max && t > s.max ? s.max : null !== s.min && s.min > t ? s.min : t
            },
            _stop: function (t) {
                this.spinning && (clearTimeout(this.timer), clearTimeout(this.mousewheelTimer), this.counter = 0, this.spinning = !1, this._trigger("stop", t))
            },
            _setOption: function (t, e) {
                if ("culture" === t || "numberFormat" === t) {
                    var i = this._parse(this.element.val());
                    return this.options[t] = e, void this.element.val(this._format(i))
                }
                ("max" === t || "min" === t || "step" === t) && "string" == typeof e && (e = this._parse(e)), "icons" === t && (this.buttons.first().find(".ui-icon").removeClass(this.options.icons.up).addClass(e.up), this.buttons.last().find(".ui-icon").removeClass(this.options.icons.down).addClass(e.down)), this._super(t, e), "disabled" === t && (e ? (this.element.prop("disabled", !0), this.buttons.button("disable")) : (this.element.prop("disabled", !1), this.buttons.button("enable")))
            },
            _setOptions: e(function (t) {
                this._super(t), this._value(this.element.val())
            }),
            _parse: function (t) {
                return "string" == typeof t && "" !== t && (t = window.Globalize && this.options.numberFormat ? Globalize.parseFloat(t, 10, this.options.culture) : +t), "" === t || isNaN(t) ? null : t
            },
            _format: function (t) {
                return "" === t ? "" : window.Globalize && this.options.numberFormat ? Globalize.format(t, this.options.numberFormat, this.options.culture) : t
            },
            _refresh: function () {
                this.element.attr({
                    "aria-valuemin": this.options.min,
                    "aria-valuemax": this.options.max,
                    "aria-valuenow": this._parse(this.element.val())
                })
            },
            _value: function (t, e) {
                var i;
                "" !== t && (i = this._parse(t), null !== i && (e || (i = this._adjustValue(i)), t = this._format(i))), this.element.val(t), this._refresh()
            },
            _destroy: function () {
                this.element.removeClass("ui-spinner-input").prop("disabled", !1).removeAttr("autocomplete").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"), this.uiSpinner.replaceWith(this.element)
            },
            stepUp: e(function (t) {
                this._stepUp(t)
            }),
            _stepUp: function (t) {
                this._start() && (this._spin((t || 1) * this.options.step), this._stop())
            },
            stepDown: e(function (t) {
                this._stepDown(t)
            }),
            _stepDown: function (t) {
                this._start() && (this._spin((t || 1) * -this.options.step), this._stop())
            },
            pageUp: e(function (t) {
                this._stepUp((t || 1) * this.options.page)
            }),
            pageDown: e(function (t) {
                this._stepDown((t || 1) * this.options.page)
            }),
            value: function (t) {
                return arguments.length ? void e(this._value).call(this, t) : this._parse(this.element.val())
            },
            widget: function () {
                return this.uiSpinner
            }
        })
    }(jQuery), function (t, e) {
        function i() {
            return ++n
        }

        function s(t) {
            return t = t.cloneNode(!1), t.hash.length > 1 && decodeURIComponent(t.href.replace(a, "")) === decodeURIComponent(location.href.replace(a, ""))
        }

        var n = 0, a = /#.*$/;
        t.widget("ui.tabs", {
            version: "1.10.4",
            delay: 300,
            options: {
                active: null,
                collapsible: !1,
                event: "click",
                heightStyle: "content",
                hide: null,
                show: null,
                activate: null,
                beforeActivate: null,
                beforeLoad: null,
                load: null
            },
            _create: function () {
                var e = this, i = this.options;
                this.running = !1, this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all").toggleClass("ui-tabs-collapsible", i.collapsible).delegate(".ui-tabs-nav > li", "mousedown" + this.eventNamespace, function (e) {
                    t(this).is(".ui-state-disabled") && e.preventDefault()
                }).delegate(".ui-tabs-anchor", "focus" + this.eventNamespace, function () {
                    t(this).closest("li").is(".ui-state-disabled") && this.blur()
                }), this._processTabs(), i.active = this._initialActive(), t.isArray(i.disabled) && (i.disabled = t.unique(i.disabled.concat(t.map(this.tabs.filter(".ui-state-disabled"), function (t) {
                    return e.tabs.index(t)
                }))).sort()), this.active = this.options.active !== !1 && this.anchors.length ? this._findActive(i.active) : t(), this._refresh(), this.active.length && this.load(i.active)
            },
            _initialActive: function () {
                var i = this.options.active, s = this.options.collapsible, n = location.hash.substring(1);
                return null === i && (n && this.tabs.each(function (s, a) {
                    return t(a).attr("aria-controls") === n ? (i = s, !1) : e
                }), null === i && (i = this.tabs.index(this.tabs.filter(".ui-tabs-active"))), (null === i || -1 === i) && (i = this.tabs.length ? 0 : !1)), i !== !1 && (i = this.tabs.index(this.tabs.eq(i)), -1 === i && (i = s ? !1 : 0)), !s && i === !1 && this.anchors.length && (i = 0), i
            },
            _getCreateEventData: function () {
                return {tab: this.active, panel: this.active.length ? this._getPanelForTab(this.active) : t()}
            },
            _tabKeydown: function (i) {
                var s = t(this.document[0].activeElement).closest("li"), n = this.tabs.index(s), a = !0;
                if (!this._handlePageNav(i)) {
                    switch (i.keyCode) {
                        case t.ui.keyCode.RIGHT:
                        case t.ui.keyCode.DOWN:
                            n++;
                            break;
                        case t.ui.keyCode.UP:
                        case t.ui.keyCode.LEFT:
                            a = !1, n--;
                            break;
                        case t.ui.keyCode.END:
                            n = this.anchors.length - 1;
                            break;
                        case t.ui.keyCode.HOME:
                            n = 0;
                            break;
                        case t.ui.keyCode.SPACE:
                            return i.preventDefault(), clearTimeout(this.activating), this._activate(n), e;
                        case t.ui.keyCode.ENTER:
                            return i.preventDefault(), clearTimeout(this.activating), this._activate(n === this.options.active ? !1 : n), e;
                        default:
                            return
                    }
                    i.preventDefault(), clearTimeout(this.activating), n = this._focusNextTab(n, a), i.ctrlKey || (s.attr("aria-selected", "false"), this.tabs.eq(n).attr("aria-selected", "true"), this.activating = this._delay(function () {
                        this.option("active", n)
                    }, this.delay))
                }
            },
            _panelKeydown: function (e) {
                this._handlePageNav(e) || e.ctrlKey && e.keyCode === t.ui.keyCode.UP && (e.preventDefault(), this.active.focus())
            },
            _handlePageNav: function (i) {
                return i.altKey && i.keyCode === t.ui.keyCode.PAGE_UP ? (this._activate(this._focusNextTab(this.options.active - 1, !1)), !0) : i.altKey && i.keyCode === t.ui.keyCode.PAGE_DOWN ? (this._activate(this._focusNextTab(this.options.active + 1, !0)), !0) : e
            },
            _findNextTab: function (e, i) {
                function s() {
                    return e > n && (e = 0), 0 > e && (e = n), e
                }

                for (var n = this.tabs.length - 1; -1 !== t.inArray(s(), this.options.disabled);)e = i ? e + 1 : e - 1;
                return e
            },
            _focusNextTab: function (t, e) {
                return t = this._findNextTab(t, e), this.tabs.eq(t).focus(), t
            },
            _setOption: function (t, i) {
                return "active" === t ? (this._activate(i), e) : "disabled" === t ? (this._setupDisabled(i), e) : (this._super(t, i), "collapsible" === t && (this.element.toggleClass("ui-tabs-collapsible", i), i || this.options.active !== !1 || this._activate(0)), "event" === t && this._setupEvents(i), "heightStyle" === t && this._setupHeightStyle(i), e)
            },
            _tabId: function (t) {
                return t.attr("aria-controls") || "ui-tabs-" + i()
            },
            _sanitizeSelector: function (t) {
                return t ? t.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g, "\\$&") : ""
            },
            refresh: function () {
                var e = this.options, i = this.tablist.children(":has(a[href])");
                e.disabled = t.map(i.filter(".ui-state-disabled"), function (t) {
                    return i.index(t)
                }), this._processTabs(), e.active !== !1 && this.anchors.length ? this.active.length && !t.contains(this.tablist[0], this.active[0]) ? this.tabs.length === e.disabled.length ? (e.active = !1, this.active = t()) : this._activate(this._findNextTab(Math.max(0, e.active - 1), !1)) : e.active = this.tabs.index(this.active) : (e.active = !1, this.active = t()), this._refresh()
            },
            _refresh: function () {
                this._setupDisabled(this.options.disabled), this._setupEvents(this.options.event), this._setupHeightStyle(this.options.heightStyle), this.tabs.not(this.active).attr({
                    "aria-selected": "false",
                    tabIndex: -1
                }), this.panels.not(this._getPanelForTab(this.active)).hide().attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }), this.active.length ? (this.active.addClass("ui-tabs-active ui-state-active").attr({
                    "aria-selected": "true",
                    tabIndex: 0
                }), this._getPanelForTab(this.active).show().attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                })) : this.tabs.eq(0).attr("tabIndex", 0)
            },
            _processTabs: function () {
                var e = this;
                this.tablist = this._getList().addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").attr("role", "tablist"), this.tabs = this.tablist.find("> li:has(a[href])").addClass("ui-state-default ui-corner-top").attr({
                    role: "tab",
                    tabIndex: -1
                }), this.anchors = this.tabs.map(function () {
                    return t("a", this)[0]
                }).addClass("ui-tabs-anchor").attr({
                    role: "presentation",
                    tabIndex: -1
                }), this.panels = t(), this.anchors.each(function (i, n) {
                    var a, o, r, h = t(n).uniqueId().attr("id"), l = t(n).closest("li"), c = l.attr("aria-controls");
                    s(n) ? (a = n.hash, o = e.element.find(e._sanitizeSelector(a))) : (r = e._tabId(l), a = "#" + r, o = e.element.find(a), o.length || (o = e._createPanel(r), o.insertAfter(e.panels[i - 1] || e.tablist)), o.attr("aria-live", "polite")), o.length && (e.panels = e.panels.add(o)), c && l.data("ui-tabs-aria-controls", c), l.attr({
                        "aria-controls": a.substring(1),
                        "aria-labelledby": h
                    }), o.attr("aria-labelledby", h)
                }), this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").attr("role", "tabpanel")
            },
            _getList: function () {
                return this.tablist || this.element.find("ol,ul").eq(0)
            },
            _createPanel: function (e) {
                return t("<div>").attr("id", e).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy", !0)
            },
            _setupDisabled: function (e) {
                t.isArray(e) && (e.length ? e.length === this.anchors.length && (e = !0) : e = !1);
                for (var i, s = 0; i = this.tabs[s]; s++)e === !0 || -1 !== t.inArray(s, e) ? t(i).addClass("ui-state-disabled").attr("aria-disabled", "true") : t(i).removeClass("ui-state-disabled").removeAttr("aria-disabled");
                this.options.disabled = e
            },
            _setupEvents: function (e) {
                var i = {
                    click: function (t) {
                        t.preventDefault()
                    }
                };
                e && t.each(e.split(" "), function (t, e) {
                    i[e] = "_eventHandler"
                }), this._off(this.anchors.add(this.tabs).add(this.panels)), this._on(this.anchors, i), this._on(this.tabs, {keydown: "_tabKeydown"}), this._on(this.panels, {keydown: "_panelKeydown"}), this._focusable(this.tabs), this._hoverable(this.tabs)
            },
            _setupHeightStyle: function (e) {
                var i, s = this.element.parent();
                "fill" === e ? (i = s.height(), i -= this.element.outerHeight() - this.element.height(), this.element.siblings(":visible").each(function () {
                    var e = t(this), s = e.css("position");
                    "absolute" !== s && "fixed" !== s && (i -= e.outerHeight(!0))
                }), this.element.children().not(this.panels).each(function () {
                    i -= t(this).outerHeight(!0)
                }), this.panels.each(function () {
                    t(this).height(Math.max(0, i - t(this).innerHeight() + t(this).height()))
                }).css("overflow", "auto")) : "auto" === e && (i = 0, this.panels.each(function () {
                    i = Math.max(i, t(this).height("").height())
                }).height(i))
            },
            _eventHandler: function (e) {
                var i = this.options, s = this.active, n = t(e.currentTarget), a = n.closest("li"), o = a[0] === s[0], r = o && i.collapsible, h = r ? t() : this._getPanelForTab(a), l = s.length ? this._getPanelForTab(s) : t(), c = {
                    oldTab: s,
                    oldPanel: l,
                    newTab: r ? t() : a,
                    newPanel: h
                };
                e.preventDefault(), a.hasClass("ui-state-disabled") || a.hasClass("ui-tabs-loading") || this.running || o && !i.collapsible || this._trigger("beforeActivate", e, c) === !1 || (i.active = r ? !1 : this.tabs.index(a), this.active = o ? t() : a, this.xhr && this.xhr.abort(), l.length || h.length || t.error("jQuery UI Tabs: Mismatching fragment identifier."), h.length && this.load(this.tabs.index(a), e), this._toggle(e, c))
            },
            _toggle: function (e, i) {
                function s() {
                    a.running = !1, a._trigger("activate", e, i)
                }

                function n() {
                    i.newTab.closest("li").addClass("ui-tabs-active ui-state-active"), o.length && a.options.show ? a._show(o, a.options.show, s) : (o.show(), s())
                }

                var a = this, o = i.newPanel, r = i.oldPanel;
                this.running = !0, r.length && this.options.hide ? this._hide(r, this.options.hide, function () {
                    i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"), n()
                }) : (i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"), r.hide(), n()), r.attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }), i.oldTab.attr("aria-selected", "false"), o.length && r.length ? i.oldTab.attr("tabIndex", -1) : o.length && this.tabs.filter(function () {
                    return 0 === t(this).attr("tabIndex")
                }).attr("tabIndex", -1), o.attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                }), i.newTab.attr({"aria-selected": "true", tabIndex: 0})
            },
            _activate: function (e) {
                var i, s = this._findActive(e);
                s[0] !== this.active[0] && (s.length || (s = this.active), i = s.find(".ui-tabs-anchor")[0], this._eventHandler({
                    target: i,
                    currentTarget: i,
                    preventDefault: t.noop
                }))
            },
            _findActive: function (e) {
                return e === !1 ? t() : this.tabs.eq(e)
            },
            _getIndex: function (t) {
                return "string" == typeof t && (t = this.anchors.index(this.anchors.filter("[href$='" + t + "']"))), t
            },
            _destroy: function () {
                this.xhr && this.xhr.abort(), this.element.removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible"), this.tablist.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").removeAttr("role"), this.anchors.removeClass("ui-tabs-anchor").removeAttr("role").removeAttr("tabIndex").removeUniqueId(), this.tabs.add(this.panels).each(function () {
                    t.data(this, "ui-tabs-destroy") ? t(this).remove() : t(this).removeClass("ui-state-default ui-state-active ui-state-disabled ui-corner-top ui-corner-bottom ui-widget-content ui-tabs-active ui-tabs-panel").removeAttr("tabIndex").removeAttr("aria-live").removeAttr("aria-busy").removeAttr("aria-selected").removeAttr("aria-labelledby").removeAttr("aria-hidden").removeAttr("aria-expanded").removeAttr("role")
                }), this.tabs.each(function () {
                    var e = t(this), i = e.data("ui-tabs-aria-controls");
                    i ? e.attr("aria-controls", i).removeData("ui-tabs-aria-controls") : e.removeAttr("aria-controls")
                }), this.panels.show(), "content" !== this.options.heightStyle && this.panels.css("height", "")
            },
            enable: function (i) {
                var s = this.options.disabled;
                s !== !1 && (i === e ? s = !1 : (i = this._getIndex(i), s = t.isArray(s) ? t.map(s, function (t) {
                    return t !== i ? t : null
                }) : t.map(this.tabs, function (t, e) {
                    return e !== i ? e : null
                })), this._setupDisabled(s))
            },
            disable: function (i) {
                var s = this.options.disabled;
                if (s !== !0) {
                    if (i === e)s = !0; else {
                        if (i = this._getIndex(i), -1 !== t.inArray(i, s))return;
                        s = t.isArray(s) ? t.merge([i], s).sort() : [i]
                    }
                    this._setupDisabled(s)
                }
            },
            load: function (e, i) {
                e = this._getIndex(e);
                var n = this, a = this.tabs.eq(e), o = a.find(".ui-tabs-anchor"), r = this._getPanelForTab(a), h = {
                    tab: a,
                    panel: r
                };
                s(o[0]) || (this.xhr = t.ajax(this._ajaxSettings(o, i, h)), this.xhr && "canceled" !== this.xhr.statusText && (a.addClass("ui-tabs-loading"), r.attr("aria-busy", "true"), this.xhr.success(function (t) {
                    setTimeout(function () {
                        r.html(t), n._trigger("load", i, h)
                    }, 1)
                }).complete(function (t, e) {
                    setTimeout(function () {
                        "abort" === e && n.panels.stop(!1, !0), a.removeClass("ui-tabs-loading"), r.removeAttr("aria-busy"), t === n.xhr && delete n.xhr
                    }, 1)
                })))
            },
            _ajaxSettings: function (e, i, s) {
                var n = this;
                return {
                    url: e.attr("href"), beforeSend: function (e, a) {
                        return n._trigger("beforeLoad", i, t.extend({jqXHR: e, ajaxSettings: a}, s))
                    }
                }
            },
            _getPanelForTab: function (e) {
                var i = t(e).attr("aria-controls");
                return this.element.find(this._sanitizeSelector("#" + i))
            }
        })
    }(jQuery), function (t) {
        function e(e, i) {
            var s = (e.attr("aria-describedby") || "").split(/\s+/);
            s.push(i), e.data("ui-tooltip-id", i).attr("aria-describedby", t.trim(s.join(" ")))
        }

        function i(e) {
            var i = e.data("ui-tooltip-id"), s = (e.attr("aria-describedby") || "").split(/\s+/), n = t.inArray(i, s);
            -1 !== n && s.splice(n, 1), e.removeData("ui-tooltip-id"), s = t.trim(s.join(" ")), s ? e.attr("aria-describedby", s) : e.removeAttr("aria-describedby")
        }

        var s = 0;
        t.widget("ui.tooltip", {
            version: "1.10.4", options: {
                content: function () {
                    var e = t(this).attr("title") || "";
                    return t("<a>").text(e).html()
                },
                hide: !0,
                items: "[title]:not([disabled])",
                position: {my: "left top+15", at: "left bottom", collision: "flipfit flip"},
                show: !0,
                tooltipClass: null,
                track: !1,
                close: null,
                open: null
            }, _create: function () {
                this._on({
                    mouseover: "open",
                    focusin: "open"
                }), this.tooltips = {}, this.parents = {}, this.options.disabled && this._disable()
            }, _setOption: function (e, i) {
                var s = this;
                return "disabled" === e ? (this[i ? "_disable" : "_enable"](), void(this.options[e] = i)) : (this._super(e, i), void("content" === e && t.each(this.tooltips, function (t, e) {
                    s._updateContent(e)
                })))
            }, _disable: function () {
                var e = this;
                t.each(this.tooltips, function (i, s) {
                    var n = t.Event("blur");
                    n.target = n.currentTarget = s[0], e.close(n, !0)
                }), this.element.find(this.options.items).addBack().each(function () {
                    var e = t(this);
                    e.is("[title]") && e.data("ui-tooltip-title", e.attr("title")).attr("title", "")
                })
            }, _enable: function () {
                this.element.find(this.options.items).addBack().each(function () {
                    var e = t(this);
                    e.data("ui-tooltip-title") && e.attr("title", e.data("ui-tooltip-title"))
                })
            }, open: function (e) {
                var i = this, s = t(e ? e.target : this.element).closest(this.options.items);
                s.length && !s.data("ui-tooltip-id") && (s.attr("title") && s.data("ui-tooltip-title", s.attr("title")), s.data("ui-tooltip-open", !0), e && "mouseover" === e.type && s.parents().each(function () {
                    var e, s = t(this);
                    s.data("ui-tooltip-open") && (e = t.Event("blur"), e.target = e.currentTarget = this, i.close(e, !0)), s.attr("title") && (s.uniqueId(), i.parents[this.id] = {
                        element: this,
                        title: s.attr("title")
                    }, s.attr("title", ""))
                }), this._updateContent(s, e))
            }, _updateContent: function (t, e) {
                var i, s = this.options.content, n = this, o = e ? e.type : null;
                return "string" == typeof s ? this._open(e, t, s) : (i = s.call(t[0], function (i) {
                    t.data("ui-tooltip-open") && n._delay(function () {
                        e && (e.type = o), this._open(e, t, i)
                    })
                }), void(i && this._open(e, t, i)))
            }, _open: function (i, s, n) {
                function o(t) {
                    l.of = t, a.is(":hidden") || a.position(l)
                }

                var a, r, h, l = t.extend({}, this.options.position);
                if (n) {
                    if (a = this._find(s), a.length)return void a.find(".ui-tooltip-content").html(n);
                    s.is("[title]") && (i && "mouseover" === i.type ? s.attr("title", "") : s.removeAttr("title")), a = this._tooltip(s), e(s, a.attr("id")), a.find(".ui-tooltip-content").html(n), this.options.track && i && /^mouse/.test(i.type) ? (this._on(this.document, {mousemove: o}), o(i)) : a.position(t.extend({of: s}, this.options.position)), a.hide(), this._show(a, this.options.show), this.options.show && this.options.show.delay && (h = this.delayedShow = setInterval(function () {
                        a.is(":visible") && (o(l.of), clearInterval(h))
                    }, t.fx.interval)), this._trigger("open", i, {tooltip: a}), r = {
                        keyup: function (e) {
                            if (e.keyCode === t.ui.keyCode.ESCAPE) {
                                var i = t.Event(e);
                                i.currentTarget = s[0], this.close(i, !0)
                            }
                        }, remove: function () {
                            this._removeTooltip(a)
                        }
                    }, i && "mouseover" !== i.type || (r.mouseleave = "close"), i && "focusin" !== i.type || (r.focusout = "close"), this._on(!0, s, r)
                }
            }, close: function (e) {
                var s = this, n = t(e ? e.currentTarget : this.element), o = this._find(n);
                this.closing || (clearInterval(this.delayedShow), n.data("ui-tooltip-title") && n.attr("title", n.data("ui-tooltip-title")), i(n), o.stop(!0), this._hide(o, this.options.hide, function () {
                    s._removeTooltip(t(this))
                }), n.removeData("ui-tooltip-open"), this._off(n, "mouseleave focusout keyup"), n[0] !== this.element[0] && this._off(n, "remove"), this._off(this.document, "mousemove"), e && "mouseleave" === e.type && t.each(this.parents, function (e, i) {
                    t(i.element).attr("title", i.title), delete s.parents[e]
                }), this.closing = !0, this._trigger("close", e, {tooltip: o}), this.closing = !1)
            }, _tooltip: function (e) {
                var i = "ui-tooltip-" + s++, n = t("<div>").attr({
                    id: i,
                    role: "tooltip"
                }).addClass("ui-tooltip ui-widget ui-corner-all ui-widget-content " + (this.options.tooltipClass || ""));
                return t("<div>").addClass("ui-tooltip-content").appendTo(n), n.appendTo(this.document[0].body), this.tooltips[i] = e, n
            }, _find: function (e) {
                var i = e.data("ui-tooltip-id");
                return i ? t("#" + i) : t()
            }, _removeTooltip: function (t) {
                t.remove(), delete this.tooltips[t.attr("id")]
            }, _destroy: function () {
                var e = this;
                t.each(this.tooltips, function (i, s) {
                    var n = t.Event("blur");
                    n.target = n.currentTarget = s[0], e.close(n, !0), t("#" + i).remove(), s.data("ui-tooltip-title") && (s.attr("title", s.data("ui-tooltip-title")), s.removeData("ui-tooltip-title"))
                })
            }
        })
    }(jQuery)
});
/*!dep/artTemplate/dist/template.js*/
;
!function () {
    function a(a) {
        return a.replace(t, "").replace(u, ",").replace(b, "").replace(w, "").replace(x, "").split(/^$|,+/)
    }

    function c(a) {
        return "'" + a.replace(/('|\\)/g, "\\$1").replace(/\r/g, "\\r").replace(/\n/g, "\\n") + "'"
    }

    function $($, d) {
        function e(a) {
            return m += a.split(/\n/).length - 1, y && (a = a.replace(/\s+/g, " ").replace(/<!--.*?-->/g, "")), a && (a = s[1] + c(a) + s[2] + "\n"), a
        }

        function f(c) {
            var $ = m;
            if (v ? c = v(c, d) : g && (c = c.replace(/\n/g, function () {
                    return m++, "$line=" + m + ";"
                })), 0 === c.indexOf("=")) {
                var e = l && !/^=[=#]/.test(c);
                if (c = c.replace(/^=[=#]?|[\s;]*$/g, ""), e) {
                    var f = c.replace(/\s*\([^\)]+\)/, "");
                    n[f] || /^(include|print)$/.test(f) || (c = "$escape(" + c + ")")
                } else c = "$string(" + c + ")";
                c = s[1] + c + s[2]
            }
            return g && (c = "$line=" + $ + ";" + c), r(a(c), function (a) {
                if (a && !p[a]) {
                    var c;
                    c = "print" === a ? u : "include" === a ? b : n[a] ? "$utils." + a : o[a] ? "$helpers." + a : "$data." + a, w += a + "=" + c + ",", p[a] = !0
                }
            }), c + "\n"
        }

        var g = d.debug, h = d.openTag, i = d.closeTag, v = d.parser, y = d.compress, l = d.escape, m = 1, p = {
            $data: 1,
            $filename: 1,
            $utils: 1,
            $helpers: 1,
            $out: 1,
            $line: 1
        }, q = "".trim, s = q ? ["$out='';", "$out+=", ";", "$out"] : ["$out=[];", "$out.push(", ");", "$out.join('')"], t = q ? "$out+=text;return $out;" : "$out.push(text);", u = "function(){var text=''.concat.apply('',arguments);" + t + "}", b = "function(filename,data){data=data||$data;var text=$utils.$include(filename,data,$filename);" + t + "}", w = "'use strict';var $utils=this,$helpers=$utils.$helpers," + (g ? "$line=0," : ""), x = s[0], T = "return new String(" + s[3] + ");";
        r($.split(h), function (a) {
            a = a.split(i);
            var c = a[0], $ = a[1];
            1 === a.length ? x += e(c) : (x += f(c), $ && (x += e($)))
        });
        var j = w + x + T;
        g && (j = "try{" + j + "}catch(e){throw {filename:$filename,name:'Render Error',message:e.message,line:$line,source:" + c($) + ".split(/\\n/)[$line-1].replace(/^\\s+/,'')};}");
        try {
            var k = new Function("$data", "$filename", j);
            return k.prototype = n, k
        } catch (E) {
            throw E.temp = "function anonymous($data,$filename) {" + j + "}", E
        }
    }

    var d = function (a, c) {
        return "string" == typeof c ? q(c, {filename: a}) : g(a, c)
    };
    d.version = "3.0.0", d.config = function (a, c) {
        e[a] = c
    };
    var e = d.defaults = {
        openTag: "<%",
        closeTag: "%>",
        escape: !0,
        cache: !0,
        compress: !1,
        parser: null
    }, f = d.cache = {};
    d.render = function (a, c) {
        return q(a, c)
    };
    var g = d.renderFile = function (a, c) {
        var $ = d.get(a) || p({filename: a, name: "Render Error", message: "Template not found"});
        return c ? $(c) : $
    };
    d.get = function (a) {
        var c;
        if (f[a])c = f[a]; else if ("object" == typeof document) {
            var $ = document.getElementById(a);
            if ($) {
                var d = ($.value || $.innerHTML).replace(/^\s*|\s*$/g, "");
                c = q(d, {filename: a})
            }
        }
        return c
    };
    var h = function (a, c) {
        return "string" != typeof a && (c = typeof a, "number" === c ? a += "" : a = "function" === c ? h(a.call(a)) : ""), a
    }, i = {"<": "&#60;", ">": "&#62;", '"': "&#34;", "'": "&#39;", "&": "&#38;"}, v = function (a) {
        return i[a]
    }, y = function (a) {
        return h(a).replace(/&(?![\w#]+;)|[<>"']/g, v)
    }, l = Array.isArray || function (a) {
            return "[object Array]" === {}.toString.call(a)
        }, m = function (a, c) {
        var $, d;
        if (l(a))for ($ = 0, d = a.length; d > $; $++)c.call(a, a[$], $, a); else for ($ in a)c.call(a, a[$], $)
    }, n = d.utils = {$helpers: {}, $include: g, $string: h, $escape: y, $each: m};
    d.helper = function (a, c) {
        o[a] = c
    };
    var o = d.helpers = n.$helpers;
    d.onerror = function (a) {
        var c = "Template Error\n\n";
        for (var $ in a)c += "<" + $ + ">\n" + a[$] + "\n\n";
        "object" == typeof console && console.error(c)
    };
    var p = function (a) {
        return d.onerror(a), function () {
            return "{Template Error}"
        }
    }, q = d.compile = function (a, c) {
        function d($) {
            try {
                return new i($, h) + ""
            } catch (d) {
                return c.debug ? p(d)() : (c.debug = !0, q(a, c)($))
            }
        }

        c = c || {};
        for (var g in e)void 0 === c[g] && (c[g] = e[g]);
        var h = c.filename;
        try {
            var i = $(a, c)
        } catch (v) {
            return v.filename = h || "anonymous", v.name = "Syntax Error", p(v)
        }
        return d.prototype = i.prototype, d.toString = function () {
            return i.toString()
        }, h && c.cache && (f[h] = d), d
    }, r = n.$each, s = "break,case,catch,continue,debugger,default,delete,do,else,false,finally,for,function,if,in,instanceof,new,null,return,switch,this,throw,true,try,typeof,var,void,while,with,abstract,boolean,byte,char,class,const,double,enum,export,extends,final,float,goto,implements,import,int,interface,long,native,package,private,protected,public,short,static,super,synchronized,throws,transient,volatile,arguments,let,yield,undefined", t = /\/\*[\w\W]*?\*\/|\/\/[^\n]*\n|\/\/[^\n]*$|"(?:[^"\\]|\\[\w\W])*"|'(?:[^'\\]|\\[\w\W])*'|\s*\.\s*[$\w\.]+/g, u = /[^\w$]+/g, b = new RegExp(["\\b" + s.replace(/,/g, "\\b|\\b") + "\\b"].join("|"), "g"), w = /^\d[^,]*|,\d[^,]*/g, x = /^,+|,+$/g;
    e.openTag = "{{", e.closeTag = "}}";
    var T = function (a, c) {
        var $ = c.split(":"), d = $.shift(), e = $.join(":") || "";
        return e && (e = ", " + e), "$helpers." + d + "(" + a + e + ")"
    };
    e.parser = function (a, c) {
        a = a.replace(/^\s/, "");
        var $ = a.split(" "), e = $.shift(), f = $.join(" ");
        switch (e) {
            case"if":
                a = "if(" + f + "){";
                break;
            case"else":
                $ = "if" === $.shift() ? " if(" + $.join(" ") + ")" : "", a = "}else" + $ + "{";
                break;
            case"/if":
                a = "}";
                break;
            case"each":
                var g = $[0] || "$data", h = $[1] || "as", i = $[2] || "$value", v = $[3] || "$index", y = i + "," + v;
                "as" !== h && (g = "[]"), a = "$each(" + g + ",function(" + y + "){";
                break;
            case"/each":
                a = "});";
                break;
            case"echo":
                a = "print(" + f + ");";
                break;
            case"print":
            case"include":
                a = e + "(" + $.join(",") + ");";
                break;
            default:
                if (-1 !== f.indexOf("|")) {
                    var l = c.escape;
                    0 === a.indexOf("#") && (a = a.substr(1), l = !1);
                    for (var m = 0, n = a.split("|"), o = n.length, p = l ? "$escape" : "$string", q = p + "(" + n[m++] + ")"; o > m; m++)q = T(q, n[m]);
                    a = "=#" + q
                } else a = d.helpers[e] ? "=#" + e + "(" + $.join(",") + ");" : "=" + a
        }
        return a
    }, "function" == typeof define ? define("dep/artTemplate/dist/template", ["require"], function () {
        return d
    }) : "undefined" != typeof exports ? module.exports = d : this.template = d
}();
/*!common/static/js/common.js*/
;
define("common/static/js/common", ["require", "exports", "module", "dep/jquery-ui-1.10.4.min", "dep/artTemplate/dist/template"], function (require, exports) {
    function a(a) {
        var i, c, F;
        if (null == a || "" == a)return 0;
        for (c = a.length, i = 0; i < a.length; i++)F = a.charCodeAt(i), F > 255 && c++;
        return c
    }

    function c(a) {
        var c = a.toLocaleDateString().replace(/\//g, "-"), F = a.toTimeString().slice(0, 8);
        return c + " " + F
    }

    function F(a, c) {
        $(a).autocomplete({
            source: function (a, F) {
                "" != $.trim(a.term) ? $.ajax({
                    url: z,
                    dataType: "jsonp",
                    jsonp: "suggestback",
                    data: {input: a.term, type: c, num: 10},
                    success: function (a) {
                        if (a)if (a[P[c]] && a[P[c]].length) {
                            for (var g = a[P[c]], h = [], i = 0, l = g.length; l > i; i++)h.push(g[i].cont);
                            F(h)
                        } else F(""); else F("")
                    }
                }) : F("")
            }
        })
    }

    function g(a) {
        var s = "";
        return 0 == a.length ? "" : (s = a.replace(/&/g, "&amp;"), s = s.replace(/</g, "&lt;"), s = s.replace(/>/g, "&gt;"), s = s.replace(/ /g, "&nbsp;"), s = s.replace(/\'/g, "&#39;"), s = s.replace(/\"/g, "&quot;"))
    }

    function h(a) {
        for (var c in a)return !1;
        return !0
    }

    function v(a) {
        if (a = a.get(0), a.dataset)return a.dataset;
        for (var c, F = [], g = {}, h = a.attributes, i = 0; i < h.length; i++)if ("data-" == h[i].name.slice(0, 5)) {
            F = h[i].name.split("-");
            for (var v = 1; v < F.length; v++)v > 1 ? c += F[v].slice(0, 1).toUpperCase() + F[v].slice(1) : c = F[v];
            g[c] = h[i].value
        }
        return g
    }

    function D(a) {
        var c = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
        return c.test(a)
    }

    function b(a) {
        var c = new RegExp("(^|&)" + a + "=([^&]*)(&|$)", "i"), r = window.location.search.substr(1).match(c);
        return null != r ? unescape(r[2]) : null
    }

    require("dep/jquery-ui-1.10.4.min");
    var y = require("dep/artTemplate/dist/template"), E = !",".split(/,/).length, w = E && !window.XMLHttpRequest, j = !!window.XDomainRequest, C = E && !0, I = E && !w && !j && !C;
    !function () {
        for (var a = function () {
        }, c = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"], F = c.length, g = window.console || {}; F--;)g[c[F]] = g[c[F]] || a
    }();
    var T = function (a, c) {
        a = String(a);
        var F = Array.prototype.slice.call(arguments, 1), g = Object.prototype.toString;
        return F.length ? (F = 1 == F.length && null !== c && /\[object Array\]|\[object Object\]/.test(g.call(c)) ? c : F, a.replace(/#\{(.+?)\}/g, function (a, c) {
            var h = F[c];
            return "[object Function]" == g.call(h) && (h = h(c)), "undefined" == typeof h ? "" : h
        })) : a
    }, A = function (a, c) {
        a.type = a.type || "POST", a.data = a.data || {}, a.url = a.url || "", a.dataType = a.dataType || "json", $.ajax(a).done(function (a) {
            return a.state && 304 == a.state ? void console.log("未登录") : void(1 == a.success ? c && c(a) : console.log("Error:" + a.message))
        }).fail(function () {
            console.log("请求失败，请重试")
        })
    }, S = function (a, c, F, g) {
        F = void 0 == F ? null : F, a.tId && clearTimeout(a.tId), a.tId = setTimeout(function () {
            a.apply(F, c)
        }, g ? g : 140)
    }, M = {
        config: {
            ajax: {},
            template: {
                head: '<div class="msg-input"><textarea name="message"> </textarea><p><span class="error-tip"></span><input class="btn-send" type="button" value="发送"/></p></div><ul class="msg-history">',
                liSys: '<li class="msg-system"><img src="#{headPic}" alt="头像"/><p class="msg-content"><span class="user-name">#{viewName}：</span>#{content}</p><p class="date">#{createTime}</p></li>',
                liLeft: '<li class=""><img src="' + lctx + '/#{headPic}" alt="头像"/><p class="msg-content"><span class="user-name">#{viewName}：</span>#{content}</p><p class="date">#{createTime}</p></li>',
                liMe: '<li class="msg-dialog-me"><img src="' + lctx + '/#{headPic}" alt="头像"/><p class="msg-content"><span class="user-name">#{viewName}：</span>#{content}</p><p class="date">#{createTime}</p></li>',
                foot: '</ul><div class="msg-bottom"><input class="btn-more" type="button" value="加载更多"/><p class="no-more hide">-- 以上为全部历史消息 --</p></div>'
            },
            pagination: {startPage: 0, totalPage: 0, pageSize: 10}
        }, init: function () {
            this.initEvent()
        }, initEvent: function () {
            var F = this;
            $(document).on("click", "input.btn-message", function () {
                var a = $(this).parent().parent().next(".message-box"), c = a.next(".resume-details"), g = $(this).parent().parent().parent();
                return "none" == a.css("display") && a.find(".error-tip").hide(), a.attr("data-init") ? (a.stop().slideToggle(), c.slideUp(), !1) : (F.requestMsg(a), g.removeClass("new"), void F.updateNewTip(a))
            }), $(document).on("input keyup change", "textarea", function () {
                $(this).next().find(".error-tip").html("").hide()
            }), $(document).on("click", "input.btn-send", function () {
                function g() {
                    if (console.log("send suc"), b.find("li").length < 1) {
                        var a = $("#inviteNav").find('li[data-type="communicating"]').find("span.number"), g = parseInt(a.html());
                        a.html(++g)
                    }
                    var h = c(new Date);
                    b.prepend(T(F.config.template.liMe, {
                        viewName: "我",
                        headPic: headPic,
                        createTime: h,
                        content: w
                    })), D.val("")
                }

                var h = $(this), v = h.parent().parent().parent(".message-box"), D = h.parent().prev(), b = h.parent().parent().next(".msg-history"), y = v.attr("data-receiver-id"), E = v.attr("data-invite-id"), w = $.trim($(D).val());
                return "" == w ? (h.prev().html("不能为空").show(), !1) : a(w) > 500 ? (h.prev().html("最多输入500字").show(), !1) : void F.sendMsg(y, E, w, g)
            }), $(document).on("click", "input.btn-delete", function () {
                function a() {
                    c.parent().fadeOut("normal", function () {
                        $(this).remove()
                    })
                }

                var c = $(this), g = c.attr("data-message-id");
                F.deleteMsg(g, a)
            }), $(document).on("click", "input.btn-more", function () {
                var a = $(this).parent().parent(".message-box");
                F.loadMsgs(a)
            })
        }, updateNewTip: function (a) {
            var c = a.attr("data-invite-id");
            A({url: this.config.ajax.updateNewTip, data: {inviteId: c}})
        }, sendMsg: function (a, c, F, g) {
            var h = this.config.ajax.send, v = {
                url: h,
                data: {text: "{receiveId:" + a + ",inviteId:" + c + ',content:"' + F + '"}'}
            };
            A(v, g)
        }, deleteMsg: function (a, c) {
            var F = this.config.ajax.del;
            A({url: F, data: {id: a}}, c)
        }, loadMsgs: function (a) {
            function c(c) {
                for (var v = F.config.template, D = v.liSys, b = v.liLeft, y = v.liMe, E = [], w = c.content, i = 0, l = w.length; l > i; i++)E.push(w[i].sendId == h ? T(y, w[i]) : -1 == w[i].sendId ? T(D, w[i]) : T(b, w[i]));
                a.find("ul.msg-history").append(E.join("")), g > l && (a.find("input.btn-more").addClass("hide"), a.find("p.no-more").removeClass("hide")), a.slideDown(), a.next(".resume-details").slideUp()
            }

            var F = this, g = this.config.pagination.pageSize, h = a.attr("data-receiver-id"), v = a.attr("data-invite-id"), D = a.find("ul.msg-history").find("li").length, b = this.config.ajax.list;
            A({url: b, data: {start: D, pageSize: g, inviteId: v}}, c)
        }, requestMsg: function (a) {
            function c(c) {
                a.attr("data-init", "1");
                var v = F.config.template, D = v.liSys, b = v.liLeft, y = v.liMe, E = [];
                E.push(v.head);
                for (var w = c.content, i = 0, l = w.length; l > i; i++)E.push(w[i].sendId == h ? T(y, w[i]) : -1 == w[i].sendId ? T(D, w[i]) : T(b, w[i]));
                E.push(v.foot), a.append(E.join("")), g > l && (a.find("input.btn-more").addClass("hide"), a.find("p.no-more").removeClass("hide")), a.slideDown(), a.next(".resume-details").slideUp()
            }

            var F = this, g = this.config.pagination.pageSize, h = a.attr("data-receiver-id"), v = a.attr("data-invite-id"), D = a.find("ul.msg-history").find("li").length;
            A({url: F.config.ajax.list, data: {start: D, pageSize: g, inviteId: v}}, c)
        }
    }, z = "http://suggest.lagou.com/suggestion", P = ["", "POSITION", "COMPANY"], N = y.helper("dateFormat", function (a, c) {
        var F = a.split(" "), g = F[0].split("-"), h = g[1], v = g[2], D = F[1].lastIndexOf(":"), b = F[1].substr(0, D), c = h + "月" + v + "日 " + b;
        return c
    }), O = function (a) {
        return /^@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(a)
    };
    exports.htmlEncodeByRegExp = g, exports.renderTemplate = T, exports.isIE = E, exports.isIE6 = w, exports.isIE7 = I, exports.isIE8 = j, exports.isIE9 = C, exports.autoComplete = F, exports.sendAjax = A, exports.dataset = v, exports.isEmpty = h, exports.Message = M, exports.throttle = S, exports.getUrlParam = b, exports.isEmail = D, exports.getStringLen = a, exports.templateHelper = N, exports.validMailSuffix = O
});
/*!dep/ajaxfileupload.js*/
;
define("dep/ajaxfileupload", ["require", "exports", "module", "dep/jquery/dist/jquery"], function (require) {
    require("dep/jquery/dist/jquery"), jQuery.extend({
        handleError: function (s, a, c, e) {
            s.error && s.error.call(s.context || s, a, c, e), s.global && (s.context ? jQuery(s.context) : jQuery.event).trigger("ajaxError", [a, s, e])
        }, createUploadIframe: function (a, c) {
            var y = "jUploadFrame" + a, j = '<iframe id="' + y + '" name="' + y + '" style="position:absolute; top:-9999px; left:-9999px"';
            return window.ActiveXObject && ("boolean" == typeof c ? j += ' src="javascript:false"' : "string" == typeof c && (j += ' src="' + c + '"')), j += " />", jQuery(j).appendTo(document.body), jQuery("#" + y).get(0)
        }, createUploadForm: function (a, c, y) {
            var j = "jUploadForm" + a, Q = "jUploadFile" + a, v = jQuery('<form  action="" method="POST" name="' + j + '" id="' + j + '" enctype="multipart/form-data"></form>');
            if (y)for (var i in y)jQuery('<input type="hidden" name="' + i + '" value="' + y[i] + '" />').appendTo(v);
            var g = jQuery("#" + c), b = jQuery(g).clone();
            return jQuery(g).attr("id", Q), jQuery(g).before(b), jQuery(g).appendTo(v), jQuery(v).css("position", "absolute"), jQuery(v).css("top", "-1200px"), jQuery(v).css("left", "-1200px"), jQuery(v).appendTo("body"), v
        }, ajaxFileUpload: function (s) {
            function a() {
                var a = "jUploadFile" + c, y = jQuery("#" + a), j = jQuery("#" + s.fileElementId);
                jQuery(j).before(y), j.remove(), y.attr("id", s.fileElementId)
            }

            s = jQuery.extend({}, jQuery.ajaxSettings, s);
            var c = (new Date).getTime(), y = jQuery.createUploadForm(c, s.fileElementId, "undefined" == typeof s.data ? !1 : s.data), j = (jQuery.createUploadIframe(c, s.secureuri), "jUploadFrame" + c), Q = "jUploadForm" + c;
            s.global && !jQuery.active++ && jQuery.event.trigger("ajaxStart");
            var v = !1, g = {};
            s.global && jQuery.event.trigger("ajaxSend", [g, s]);
            var b = function (c) {
                var Q = document.getElementById(j);
                try {
                    Q.contentWindow ? (g.responseText = Q.contentWindow.document.body ? Q.contentWindow.document.body.innerHTML : null, g.responseXML = Q.contentWindow.document.XMLDocument ? Q.contentWindow.document.XMLDocument : Q.contentWindow.document) : Q.contentDocument && (g.responseText = Q.contentDocument.document.body ? Q.contentDocument.document.body.innerHTML : null, g.responseXML = Q.contentDocument.document.XMLDocument ? Q.contentDocument.document.XMLDocument : Q.contentDocument.document)
                } catch (e) {
                    jQuery.handleError(s, g, null, e)
                }
                if (g || "timeout" == c) {
                    v = !0;
                    var b;
                    try {
                        if (b = "timeout" != c ? "success" : "error", "error" != b) {
                            var h = jQuery.uploadHttpData(g, s.dataType);
                            h.success || a(), s.success && s.success(h, b), s.global && jQuery.event.trigger("ajaxSuccess", [g, s])
                        } else jQuery.handleError(s, g, b)
                    } catch (e) {
                        b = "error", a(), jQuery.handleError(s, g, b, e)
                    }
                    s.global && jQuery.event.trigger("ajaxComplete", [g, s]), s.global && !--jQuery.active && jQuery.event.trigger("ajaxStop"), s.complete && s.complete(g, b), jQuery(Q).unbind(), setTimeout(function () {
                        try {
                            jQuery(Q).remove(), jQuery(y).remove()
                        } catch (e) {
                            jQuery.handleError(s, g, null, e)
                        }
                    }, 100), g = null
                }
            };
            s.timeout > 0 && setTimeout(function () {
                v || b("timeout")
            }, s.timeout);
            try {
                var y = jQuery("#" + Q);
                jQuery(y).attr("action", s.url), jQuery(y).attr("method", "POST"), jQuery(y).attr("target", j), y.encoding ? jQuery(y).attr("encoding", "multipart/form-data") : jQuery(y).attr("enctype", "multipart/form-data"), jQuery(y).submit()
            } catch (e) {
                jQuery.handleError(s, g, null, e)
            }
            return jQuery("#" + j).load(b), {
                abort: function () {
                }
            }
        }, uploadHttpData: function (r, a) {
            var c = !a;
            return c = "xml" == a || c ? r.responseXML : r.responseText, "script" == a && jQuery.globalEval(c), "json" == a && (c = jQuery.parseJSON(jQuery(c).text())), "html" == a && jQuery("<div>").html(c).evalScripts(), c
        }
    })
});
/*!dep/jquery-colorbox/jquery.colorbox-min.js*/
;
define("dep/jquery-colorbox/jquery.colorbox-min", ["require", "exports", "module", "dep/jquery/dist/jquery"], function (require) {
    require("dep/jquery/dist/jquery"), function (t, e, i) {
        function n(i, n, o) {
            var r = e.createElement(i);
            return n && (r.id = Z + n), o && (r.style.cssText = o), t(r)
        }

        function o() {
            return i.innerHeight ? i.innerHeight : t(i).height()
        }

        function r(e, i) {
            i !== Object(i) && (i = {}), this.cache = {}, this.el = e, this.value = function (e) {
                var n;
                return void 0 === this.cache[e] && (n = t(this.el).attr("data-cbox-" + e), void 0 !== n ? this.cache[e] = n : void 0 !== i[e] ? this.cache[e] = i[e] : void 0 !== X[e] && (this.cache[e] = X[e])), this.cache[e]
            }, this.get = function (e) {
                var i = this.value(e);
                return t.isFunction(i) ? i.call(this.el, this) : i
            }
        }

        function h(t) {
            var e = W.length, i = (A + t) % e;
            return 0 > i ? e + i : i
        }

        function a(t, e) {
            return Math.round((/%/.test(t) ? ("x" === e ? E.width() : o()) / 100 : 1) * parseInt(t, 10))
        }

        function s(t, e) {
            return t.get("photo") || t.get("photoRegex").test(e)
        }

        function l(t, e) {
            return t.get("retinaUrl") && i.devicePixelRatio > 1 ? e.replace(t.get("photoRegex"), t.get("retinaSuffix")) : e
        }

        function d(t) {
            "contains"in x[0] && !x[0].contains(t.target) && t.target !== v[0] && (t.stopPropagation(), x.focus())
        }

        function c(t) {
            c.str !== t && (x.add(v).removeClass(c.str).addClass(t), c.str = t)
        }

        function g(e) {
            A = 0, e && e !== !1 && "nofollow" !== e ? (W = t("." + te).filter(function () {
                var i = t.data(this, Y), n = new r(this, i);
                return n.get("rel") === e
            }), A = W.index(O.el), -1 === A && (W = W.add(O.el), A = W.length - 1)) : W = t(O.el)
        }

        function u(i) {
            t(e).trigger(i), ae.triggerHandler(i)
        }

        function f(i) {
            var o;
            if (!G) {
                if (o = t(i).data(Y), O = new r(i, o), g(O.get("rel")), !$) {
                    $ = q = !0, c(O.get("className")), x.css({
                        visibility: "hidden",
                        display: "block",
                        opacity: ""
                    }), I = n(se, "LoadedContent", "width:0; height:0; overflow:hidden; visibility:hidden"), b.css({
                        width: "",
                        height: ""
                    }).append(I), _ = T.height() + k.height() + b.outerHeight(!0) - b.height(), D = C.width() + H.width() + b.outerWidth(!0) - b.width(), N = I.outerHeight(!0), z = I.outerWidth(!0);
                    var h = a(O.get("initialWidth"), "x"), s = a(O.get("initialHeight"), "y"), l = O.get("maxWidth"), f = O.get("maxHeight");
                    O.w = Math.max((l !== !1 ? Math.min(h, a(l, "x")) : h) - z - D, 0), O.h = Math.max((f !== !1 ? Math.min(s, a(f, "y")) : s) - N - _, 0), I.css({
                        width: "",
                        height: O.h
                    }), J.position(), u(ee), O.get("onOpen"), B.add(j).hide(), x.focus(), O.get("trapFocus") && e.addEventListener && (e.addEventListener("focus", d, !0), ae.one(re, function () {
                        e.removeEventListener("focus", d, !0)
                    })), O.get("returnFocus") && ae.one(re, function () {
                        t(O.el).focus()
                    })
                }
                var p = parseFloat(O.get("opacity"));
                v.css({
                    opacity: p === p ? p : "",
                    cursor: O.get("overlayClose") ? "pointer" : "",
                    visibility: "visible"
                }).show(), O.get("closeButton") ? P.html(O.get("close")).appendTo(b) : P.appendTo("<div/>"), w()
            }
        }

        function p() {
            x || (V = !1, E = t(i), x = n(se).attr({
                id: Y,
                "class": t.support.opacity === !1 ? Z + "IE" : "",
                role: "dialog",
                tabindex: "-1"
            }).hide(), v = n(se, "Overlay").hide(), L = t([n(se, "LoadingOverlay")[0], n(se, "LoadingGraphic")[0]]), y = n(se, "Wrapper"), b = n(se, "Content").append(j = n(se, "Title"), F = n(se, "Current"), K = t('<button type="button"/>').attr({id: Z + "Previous"}), S = t('<button type="button"/>').attr({id: Z + "Next"}), R = n("button", "Slideshow"), L), P = t('<button type="button"/>').attr({id: Z + "Close"}), y.append(n(se).append(n(se, "TopLeft"), T = n(se, "TopCenter"), n(se, "TopRight")), n(se, !1, "clear:left").append(C = n(se, "MiddleLeft"), b, H = n(se, "MiddleRight")), n(se, !1, "clear:left").append(n(se, "BottomLeft"), k = n(se, "BottomCenter"), n(se, "BottomRight"))).find("div div").css({"float": "left"}), M = n(se, !1, "position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;"), B = S.add(K).add(F).add(R)), e.body && !x.parent().length && t(e.body).append(v, x.append(y, M))
        }

        function m() {
            function i(t) {
                t.which > 1 || t.shiftKey || t.altKey || t.metaKey || t.ctrlKey || (t.preventDefault(), f(this))
            }

            return x ? (V || (V = !0, S.click(function () {
                J.next()
            }), K.click(function () {
                J.prev()
            }), P.click(function () {
                J.close()
            }), v.click(function () {
                O.get("overlayClose") && J.close()
            }), t(e).bind("keydown." + Z, function (t) {
                var e = t.keyCode;
                $ && O.get("escKey") && 27 === e && (t.preventDefault(), J.close()), $ && O.get("arrowKey") && W[1] && !t.altKey && (37 === e ? (t.preventDefault(), K.click()) : 39 === e && (t.preventDefault(), S.click()))
            }), t.isFunction(t.fn.on) ? t(e).on("click." + Z, "." + te, i) : t("." + te).live("click." + Z, i)), !0) : !1
        }

        function w() {
            var e, o, r, h = J.prep, d = ++le;
            if (q = !0, U = !1, u(he), u(ie), O.get("onLoad"), O.h = O.get("height") ? a(O.get("height"), "y") - N - _ : O.get("innerHeight") && a(O.get("innerHeight"), "y"), O.w = O.get("width") ? a(O.get("width"), "x") - z - D : O.get("innerWidth") && a(O.get("innerWidth"), "x"), O.mw = O.w, O.mh = O.h, O.get("maxWidth") && (O.mw = a(O.get("maxWidth"), "x") - z - D, O.mw = O.w && O.w < O.mw ? O.w : O.mw), O.get("maxHeight") && (O.mh = a(O.get("maxHeight"), "y") - N - _, O.mh = O.h && O.h < O.mh ? O.h : O.mh), e = O.get("href"), Q = setTimeout(function () {
                    L.show()
                }, 100), O.get("inline")) {
                var c = t(e);
                r = t("<div>").hide().insertBefore(c), ae.one(he, function () {
                    r.replaceWith(c)
                }), h(c)
            } else O.get("iframe") ? h(" ") : O.get("html") ? h(O.get("html")) : s(O, e) ? (e = l(O, e), U = O.get("createImg"), t(U).addClass(Z + "Photo").bind("error." + Z, function () {
                h(n(se, "Error").html(O.get("imgError")))
            }).one("load", function () {
                d === le && setTimeout(function () {
                    var e;
                    O.get("retinaImage") && i.devicePixelRatio > 1 && (U.height = U.height / i.devicePixelRatio, U.width = U.width / i.devicePixelRatio), O.get("scalePhotos") && (o = function () {
                        U.height -= U.height * e, U.width -= U.width * e
                    }, O.mw && U.width > O.mw && (e = (U.width - O.mw) / U.width, o()), O.mh && U.height > O.mh && (e = (U.height - O.mh) / U.height, o())), O.h && (U.style.marginTop = Math.max(O.mh - U.height, 0) / 2 + "px"), W[1] && (O.get("loop") || W[A + 1]) && (U.style.cursor = "pointer", t(U).bind("click." + Z, function () {
                        J.next()
                    })), U.style.width = U.width + "px", U.style.height = U.height + "px", h(U)
                }, 1)
            }), U.src = e) : e && M.load(e, O.get("data"), function (e, i) {
                d === le && h("error" === i ? n(se, "Error").html(O.get("xhrError")) : t(this).contents())
            })
        }

        var v, x, y, b, T, C, H, k, W, E, I, M, L, j, F, R, S, K, P, B, O, _, D, N, z, A, U, $, q, G, Q, J, V, X = {
            html: !1,
            photo: !1,
            iframe: !1,
            inline: !1,
            transition: "elastic",
            speed: 300,
            fadeOut: 300,
            width: !1,
            initialWidth: "600",
            innerWidth: !1,
            maxWidth: !1,
            height: !1,
            initialHeight: "450",
            innerHeight: !1,
            maxHeight: !1,
            scalePhotos: !0,
            scrolling: !0,
            opacity: .9,
            preloading: !0,
            className: !1,
            overlayClose: !0,
            escKey: !0,
            arrowKey: !0,
            top: !1,
            bottom: !1,
            left: !1,
            right: !1,
            fixed: !1,
            data: void 0,
            closeButton: !0,
            fastIframe: !0,
            open: !1,
            reposition: !0,
            loop: !0,
            slideshow: !1,
            slideshowAuto: !0,
            slideshowSpeed: 2500,
            slideshowStart: "start slideshow",
            slideshowStop: "stop slideshow",
            photoRegex: /\.(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,
            retinaImage: !1,
            retinaUrl: !1,
            retinaSuffix: "@2x.$1",
            current: "image {current} of {total}",
            previous: "previous",
            next: "next",
            close: "close",
            xhrError: "This content failed to load.",
            imgError: "This image failed to load.",
            returnFocus: !0,
            trapFocus: !0,
            onOpen: !1,
            onLoad: !1,
            onComplete: !1,
            onCleanup: !1,
            onClosed: !1,
            rel: function () {
                return this.rel
            },
            href: function () {
                return t(this).attr("href")
            },
            title: function () {
                return this.title
            },
            createImg: function () {
                var e = new Image, i = t(this).data("cbox-img-attrs");
                return "object" == typeof i && t.each(i, function (t, i) {
                    e[t] = i
                }), e
            },
            createIframe: function () {
                var i = e.createElement("iframe"), n = t(this).data("cbox-iframe-attrs");
                return "object" == typeof n && t.each(n, function (t, e) {
                    i[t] = e
                }), "frameBorder"in i && (i.frameBorder = 0), "allowTransparency"in i && (i.allowTransparency = "true"), i.name = (new Date).getTime(), i.allowFullscreen = !0, i
            }
        }, Y = "colorbox", Z = "cbox", te = Z + "Element", ee = Z + "_open", ie = Z + "_load", ne = Z + "_complete", oe = Z + "_cleanup", re = Z + "_closed", he = Z + "_purge", ae = t("<a/>"), se = "div", le = 0, de = {}, ce = function () {
            function t() {
                clearTimeout(h)
            }

            function e() {
                (O.get("loop") || W[A + 1]) && (t(), h = setTimeout(J.next, O.get("slideshowSpeed")))
            }

            function i() {
                R.html(O.get("slideshowStop")).unbind(s).one(s, n), ae.bind(ne, e).bind(ie, t), x.removeClass(a + "off").addClass(a + "on")
            }

            function n() {
                t(), ae.unbind(ne, e).unbind(ie, t), R.html(O.get("slideshowStart")).unbind(s).one(s, function () {
                    J.next(), i()
                }), x.removeClass(a + "on").addClass(a + "off")
            }

            function o() {
                r = !1, R.hide(), t(), ae.unbind(ne, e).unbind(ie, t), x.removeClass(a + "off " + a + "on")
            }

            var r, h, a = Z + "Slideshow_", s = "click." + Z;
            return function () {
                r ? O.get("slideshow") || (ae.unbind(oe, o), o()) : O.get("slideshow") && W[1] && (r = !0, ae.one(oe, o), O.get("slideshowAuto") ? i() : n(), R.show())
            }
        }();
        t[Y] || (t(p), J = t.fn[Y] = t[Y] = function (e, i) {
            var n, o = this;
            return e = e || {}, t.isFunction(o) && (o = t("<a/>"), e.open = !0), o[0] ? (p(), m() && (i && (e.onComplete = i), o.each(function () {
                var i = t.data(this, Y) || {};
                t.data(this, Y, t.extend(i, e))
            }).addClass(te), n = new r(o[0], e), n.get("open") && f(o[0])), o) : o
        }, J.position = function (e, i) {
            function n() {
                T[0].style.width = k[0].style.width = b[0].style.width = parseInt(x[0].style.width, 10) - D + "px", b[0].style.height = C[0].style.height = H[0].style.height = parseInt(x[0].style.height, 10) - _ + "px"
            }

            var r, h, s, l = 0, d = 0, c = x.offset();
            if (E.unbind("resize." + Z), x.css({
                    top: -9e4,
                    left: -9e4
                }), h = E.scrollTop(), s = E.scrollLeft(), O.get("fixed") ? (c.top -= h, c.left -= s, x.css({position: "fixed"})) : (l = h, d = s, x.css({position: "absolute"})), d += O.get("right") !== !1 ? Math.max(E.width() - O.w - z - D - a(O.get("right"), "x"), 0) : O.get("left") !== !1 ? a(O.get("left"), "x") : Math.round(Math.max(E.width() - O.w - z - D, 0) / 2), l += O.get("bottom") !== !1 ? Math.max(o() - O.h - N - _ - a(O.get("bottom"), "y"), 0) : O.get("top") !== !1 ? a(O.get("top"), "y") : Math.round(Math.max(o() - O.h - N - _, 0) / 2), x.css({
                    top: c.top,
                    left: c.left,
                    visibility: "visible"
                }), y[0].style.width = y[0].style.height = "9999px", r = {
                    width: O.w + z + D,
                    height: O.h + N + _,
                    top: l,
                    left: d
                }, e) {
                var g = 0;
                t.each(r, function (t) {
                    return r[t] !== de[t] ? void(g = e) : void 0
                }), e = g
            }
            de = r, e || x.css(r), x.dequeue().animate(r, {
                duration: e || 0, complete: function () {
                    n(), q = !1, y[0].style.width = O.w + z + D + "px", y[0].style.height = O.h + N + _ + "px", O.get("reposition") && setTimeout(function () {
                        E.bind("resize." + Z, J.position)
                    }, 1), t.isFunction(i) && i()
                }, step: n
            })
        }, J.resize = function (t) {
            var e;
            $ && (t = t || {}, t.width && (O.w = a(t.width, "x") - z - D), t.innerWidth && (O.w = a(t.innerWidth, "x")), I.css({width: O.w}), t.height && (O.h = a(t.height, "y") - N - _), t.innerHeight && (O.h = a(t.innerHeight, "y")), t.innerHeight || t.height || (e = I.scrollTop(), I.css({height: "auto"}), O.h = I.height()), I.css({height: O.h}), e && I.scrollTop(e), J.position("none" === O.get("transition") ? 0 : O.get("speed")))
        }, J.prep = function (i) {
            function o() {
                return O.w = O.w || I.width(), O.w = O.mw && O.mw < O.w ? O.mw : O.w, O.w
            }

            function a() {
                return O.h = O.h || I.height(), O.h = O.mh && O.mh < O.h ? O.mh : O.h, O.h
            }

            if ($) {
                var d, g = "none" === O.get("transition") ? 0 : O.get("speed");
                I.remove(), I = n(se, "LoadedContent").append(i), I.hide().appendTo(M.show()).css({
                    width: o(),
                    overflow: O.get("scrolling") ? "auto" : "hidden"
                }).css({height: a()}).prependTo(b), M.hide(), t(U).css({"float": "none"}), c(O.get("className")), d = function () {
                    function i() {
                        t.support.opacity === !1 && x[0].style.removeAttribute("filter")
                    }

                    var n, o, a = W.length;
                    $ && (o = function () {
                        clearTimeout(Q), L.hide(), u(ne), O.get("onComplete")
                    }, j.html(O.get("title")).show(), I.show(), a > 1 ? ("string" == typeof O.get("current") && F.html(O.get("current").replace("{current}", A + 1).replace("{total}", a)).show(), S[O.get("loop") || a - 1 > A ? "show" : "hide"]().html(O.get("next")), K[O.get("loop") || A ? "show" : "hide"]().html(O.get("previous")), ce(), O.get("preloading") && t.each([h(-1), h(1)], function () {
                        var i, n = W[this], o = new r(n, t.data(n, Y)), h = o.get("href");
                        h && s(o, h) && (h = l(o, h), i = e.createElement("img"), i.src = h)
                    })) : B.hide(), O.get("iframe") ? (n = O.get("createIframe"), O.get("scrolling") || (n.scrolling = "no"), t(n).attr({
                        src: O.get("href"),
                        "class": Z + "Iframe"
                    }).one("load", o).appendTo(I), ae.one(he, function () {
                        n.src = "//about:blank"
                    }), O.get("fastIframe") && t(n).trigger("load")) : o(), "fade" === O.get("transition") ? x.fadeTo(g, 1, i) : i())
                }, "fade" === O.get("transition") ? x.fadeTo(g, 0, function () {
                    J.position(0, d)
                }) : J.position(g, d)
            }
        }, J.next = function () {
            !q && W[1] && (O.get("loop") || W[A + 1]) && (A = h(1), f(W[A]))
        }, J.prev = function () {
            !q && W[1] && (O.get("loop") || A) && (A = h(-1), f(W[A]))
        }, J.close = function () {
            $ && !G && (G = !0, $ = !1, u(oe), O.get("onCleanup"), E.unbind("." + Z), v.fadeTo(O.get("fadeOut") || 0, 0), x.stop().fadeTo(O.get("fadeOut") || 0, 0, function () {
                x.hide(), v.hide(), u(he), I.remove(), setTimeout(function () {
                    G = !1, u(re), O.get("onClosed")
                }, 1)
            }))
        }, J.remove = function () {
            x && (x.stop(), t[Y].close(), x.stop(!1, !0).remove(), v.remove(), G = !1, x = null, t("." + te).removeData(Y).removeClass(te), t(e).unbind("click." + Z).unbind("keydown." + Z))
        }, J.element = function () {
            return t(O.el)
        }, J.settings = X)
    }(jQuery, document, window)
});
/*!talents/page/center/center.js*/
;
define("talents/page/center/center", ["require", "exports", "module", "common/static/js/common", "dep/ajaxfileupload", "dep/jquery-colorbox/jquery.colorbox-min", "dep/artTemplate/dist/template"], function (require) {
    var a = require("common/static/js/common");
    require("dep/ajaxfileupload"), require("dep/jquery-colorbox/jquery.colorbox-min");
    var c = require("dep/artTemplate/dist/template");
    $(function () {
        var h = {
            cookie: {tip: "paiCenterTip"},
            ajaxUrl: {
                uploadTimes: "/feedback/canUpload.json",
                uploadOffer: "/feedback/uploadOffer",
                uploadOfferAndTakingWork: "/feedback/uploadOfferAndTakingWork",
                myRewards: "/feedback/queryMyRewards.json",
                hasRewards: "/feedback/hasMyReward.json",

                dealInvite: "/talent/dealInvite.json"
            }
        }, v = {
            init: function () {
                this.checkStandard(), this.messageFilling(), this.invitationNum(), this.cancel_apply()
            }, progress: function (a) {
                var c = $(".m-progress .item:eq(" + (a - 1) + ")");
                c.children("i").css("background", "url(/static/images/center/progress.png) 0 0 no-repeat"), c.prevAll(".item").children("i").css("background", "url(/static/images/center/progress.png) 0 0 no-repeat"), c.prevAll(".arrow").css("background", "url(/static/images/center/progress.png) 0 -38px no-repeat"), c.nextAll(".item").children("i").css("background", "url(/static/images/center/progress.png) -38px 0 no-repeat"), c.nextAll(".arrow").css("background", "url(/static/images/center/progress.png) 0 -52px no-repeat");
                var h;
                $(".m-progress .stepEle").hover(function () {
                    $(this).nextAll(".tip").show(), clearTimeout(h), $(this).parent().siblings(".item").children(".tip").hide()
                }, function () {
                    var a = $(this);
                    h = setTimeout(function () {
                        a.nextAll(".tip").hide()
                    }, 500)
                }), $(".m-progress .tip").hover(function () {
                    clearTimeout(h)
                }, function () {
                    var a = $(this);
                    h = setTimeout(function () {
                        a.hide()
                    }, 500)
                })
            }, cancel_apply: function () {
                $(".cancel-apply").on("click", function () {
                    $(".cancel-panel").fadeIn()
                }), $(".cancel-panel").find(".close-icon").on("click", function () {
                    $(".cancel-panel").fadeOut()
                }), $(".btn-abolish-send").on("click", function () {
                    var a = $("input[name=cancelReason]:checked").val();
                    var re_token=$("input[name=reason_token]").val();
                    var beat_id=$("#beat_id").val();

                    if (!a) {
                        var c = "请选择取消上场原因";
                        return $(".cancel-panel").find(".error-tip").html(c).show(), !1
                    }
                    if ("其他" == a) {
                        var h = $("#otherRefuse").val();
                        if (h.length > 15) {
                            var c = "其他原因字数不超过15字";
                            return $(".cancel-panel").find(".error-tip").html(c).show(), !1
                        }
                        if (0 == h.length) {
                            var c = "其他原因不能为空";
                            return $(".cancel-panel").find(".error-tip").html(c).show(), !1
                        }
                        a = h
                    } else a = $("input[name=cancelReason]:checked").val();

                    $.ajax({
                        method: "post",
                        type: "json",
                        url: "beatReason",
                        data: {reason: a,_token:re_token,beat_id:beat_id},
                        success: function () {
                            window.location.href = window.location.href
                        },
                        fail: function (a) {
                            console.log(a)
                        }
                    })
                }), $("#otherRefuse").on("keyup change input", function () {
                    var a = $(this).val();
                    if (a.length > 15) {
                        var c = "其他原因字数不超过15字";
                        $(".cancel-panel").find(".error-tip").html(c).show()
                    } else if (0 == a.length) {
                        var c = "其他原因不能为空";
                        $(".cancel-panel").find(".error-tip").html(c).show()
                    } else $(".cancel-panel").find(".error-tip").hide()
                }), $(".cancel-panel").find('label, input[name="radio"]').on("click", function () {
                    var a = $(this), c = a.siblings("input").val();
                    "其他" == c ? $("#otherRefuse").fadeIn().css("display", "block") : $("#otherRefuse").fadeOut(), $(".cancel-panel").find(".error-tip").hide()
                })
            }, countdown: function (a) {
                var c = parseInt(a), h = 0, v = 0, g = 0, b = function () {
                    c > 0 ? (h = Math.floor(c / 86400), v = Math.floor(c / 3600) - 24 * h, g = Math.ceil(c / 60) - 24 * h * 60 - 60 * v, 9 >= g && (g = "0" + g)) : (g = "00", clearInterval(k))
                }, y = function () {
                    b(), $("#day_show").html(h ? h : "00"), $("#hour_show").html(v ? v : "00"), $("#minute_show").html(g), c -= 1
                };
                y();
                var k = setInterval(y, 1e3)
            }, checkStandard: function () {
                $("#m-progress-ft").on("click", function () {
                    $.colorbox({innerWidth: "502px", title: "人工审核标准", inline: !0, href: "#check-standard"})
                });
                var a = $(".dynamic-content");
                a.on("click", "dd", function () {
                    $(this).toggleClass("selected").siblings("dd").attr("class", ""), $(this).parent().next().val("")
                }), a.on("keyup", ".other-reason", function () {
                    var a = $(this).val().length, c = $(this).nextAll(".sub-fail-tip"), h = $(this).prev().find(".selected");
                    a > 0 && h.length > 0 && h.attr("class", ""), a > 15 ? c.text("字数不能超过15个").show() : c.text("").hide()
                }), a.on("click", ".accept", function () {
                    var a = $(this), c = a.attr("positionId");
                    $.ajax({
                        url: ctx + h.ajaxUrl.dealInvite,
                        data: {status: 3, positionId: c},
                        type: "POST",
                        async: !1,
                        success: function (c) {
                            if (c.success) {
                                a.attr("disabled", !0), a.next().hide(), a.addClass("bg-color-gray"), a.val("已接受");
                                var h = a.parents(".details").next().find("a");
                                h.attr("href", h.attr("href").replace("chat", "accepted"))
                            }
                        },
                        error: function () {
                            console.log(h.ajax.dealInvite + "调用出错")
                        }
                    })
                }), a.on("click", ".btn-refuse", function () {
                    var a = $(this), c = a.parents(".refuse-reasons-tip"), v = c.find("dd.selected").length, g = c.find(".other-reason").val(), b = c.find(".sub-fail-tip");
                    if (v || g) {
                        if (b.text())return;
                        var y, k = $(this).attr("positionId"), T = $(this).parents(".refuse-reasons-tip").find("dd.selected").index();
                        switch (T) {
                            case 0:
                                y = "行业不感兴趣";
                                break;
                            case 1:
                                y = "公司了解太少";
                                break;
                            case 2:
                                y = "工作地点不满意";
                                break;
                            case 3:
                                y = "工作内容不感兴趣";
                                break;
                            case 4:
                                y = "薪资不满意";
                                break;
                            case 5:
                                y = "已有满意offer";
                                break;
                            case 1 == !!g:
                                y = g, T = 6
                        }
                        $.ajax({
                            url: ctx + h.ajaxUrl.dealInvite,
                            data: {status: 4, positionId: k, operOption: T + 1, optionReason: y},
                            type: "POST",
                            async: !1,
                            success: function (c) {
                                if (c.success) {
                                    a.parents(".buttons").find(".refuse-reasons-tip").hide(), $(".mask").hide(), a.parents(".buttons").find(".refuse").hide();
                                    var h = a.parents(".buttons").find(".accept");
                                    h.attr("disabled", !0), h.addClass("bg-color-gray"), h.val("已拒绝");
                                    var v = a.parents(".details").next().find("a");
                                    v.attr("href", v.attr("href").replace("chat", "refused"))
                                }
                            },
                            error: function () {
                                console.log(h.ajax.dealInvite + "调用出错")
                            }
                        })
                    } else b.text("请选择原因").show()
                }), a.on("click", ".refuse", function () {
                    $(this).next().show(), $(".mask").show()
                }), $("body").on("click", ".mask", function () {
                    $(".refuse-reasons-tip, .mask").hide(), $("dd.selected").attr("class", ""), $(".other-reason").val("")
                })
            }, messageFilling: function (a, g) {
                a || (a = "1"), g || (g = "10");
                var b = (parseInt(a) - 1) * g + "";
                $.ajax({
                    url: ctx + h.ajaxUrl.dynamicMessages,
                    data: {index: b, pageSize: g},
                    type: "GET",
                    async: !1,
                    success: function (h) {

                    },
                    error: function () {

                    }
                })
            }, invitationNum: function () {
                $.ajax({
                    url: ctx + h.ajaxUrl.invitationNum,
                    type: "GET",
                    async: !1,
                    dataType: "json",
                    success: function (a) {
                        if (a.success) {
                            var c = a.content, h = c.auctionServiceUser;
                            $("#consultant-head-img").html('<img src="' + lctx + "/" + h.headpic + '" width="100" height="100" border="0" />'), $(".consultant-name").text(h.name);
                            var g = function () {
                                var a = parseInt(c.fromTime);
                                v.countdown(a)
                            }, b = function () {
                                $("#weixin-id").text(h.weixin), $("#phone-id").text(h.phone), $("#email-id").text(h.email), $("#qq-id").text(h.qq)
                            }, y = function () {
                                $("#wait-num").text(c.wait), $("#arrange-num").text(c.arrange), $("#will-refuse-num").text(c.willRefuse)
                            };
                            switch (c.applyUserStatus) {
                                case"complete":
                                    v.progress(1), $(".head-portrait-info2, .my-invitation-title, .my-invitation-content").hide(), c.leadTime ? ($(".time-start").text("预约上场时间" + c.leadTime), $(".time-start").find(".left").text("还有"), g()) : $(".countdown").hide(), $(".head-portrait-info1").show(), $(".cancel-apply-panel").show();
                                    break;
                                case"hasNoSchedule":
                                    v.progress(2), c.leadTime ? ($(".time-start").text("预约上场时间" + c.leadTime), $(".time-start").find(".left").text("还有"), g()) : $(".countdown").hide(), b(), $(".my-invitation-title, .my-invitation-content").hide(), $(".cancel-apply-panel").show();
                                    break;
                                case"schedule":
                                    v.progress(2), $(".time-start").text(c.leadTime + " 开始接受邀约"), $(".time-start").find(".left").text("还有"), g(), b(), y(), $(".cancel-apply-panel").hide();
                                    break;
                                case"court":
                                    v.progress(3), $(".countdown .time-start").text(c.leadTime + " 下场结束拍卖"), g(), b(), y(), $(".cancel-apply-panel").hide();
                                    break;
                                case"reward":
                                    $(".countdown .time-start").text(c.leadTime + " 下场结束拍卖"), g(), b(), y(), v.progress(4), $("#day_show, #hour_show, #minute_show").addClass("gray"), $(".cancel-apply-panel").hide()
                            }
                        }
                    },
                    error: function () {

                    }
                })
            }, initPager: function (c, h, g) {
                c = Number(c), c || (c = 1), h || (h = 10), g = Number(g), g || (g = 1);
                var b = "", y = document.createElement("div");
                if (y.className = "pager", 0 !== g) {
                    c > g && (c = g), 1 > c && (c = 1), 1 == c ? (b += '<a href="javascript:void(0);" class="begin_end disabled" data-index="1">首页</a>', b += '<a href="javascript:void(0);" class="filpper disabled">上一页</a>') : (b += '<a href="javascript:void(0);" class="begin_end" data-index="1">首页</a>', b += '<a href="javascript:void(0);" class="filpper" data-index="' + (c - 1) + '">上一页</a>');
                    var k = 1;
                    c > 4 && (k = c - 1, b += '<a href="javascript:void(0);" class="page_no" data-index="1">1</a>', b += '<a href="javascript:void(0);" class="page_no" data-index="2">2</a>', b += "<span>&hellip;</span>");
                    var T = c + 1;
                    T > g && (T = g);
                    for (var i = k; T >= i; i++)b += c == i ? '<a href="javascript:void(0);" class="page_no current" data-index="' + i + '">' + i + "</a>" : '<a href="javascript:void(0);" class="page_no" data-index="' + i + '">' + i + "</a>";
                    g - 2 > T && (b += "<span>&hellip;</span>"), g - 1 > T && (b += '<a href="javascript:void(0);" class="page_no" data-index="' + (g - 1) + '">' + (g - 1) + "</a>"), g > T && (b += '<a href="javascript:void(0);" class="page_no" data-index="' + g + '">' + g + "</a>"), c == g ? (b += '<a href="javascript:void(0);" class="filpper next disabled">下一页</a>', b += '<a href="javascript:void(0);" class="begin_end disabled" data-index="' + g + '">尾页</a>') : (b += '<a href="javascript:void(0);" class="filpper next" data-index="' + (c + 1) + '">下一页</a>', b += '<a href="javascript:void(0);" class="begin_end" data-index="' + g + '">尾页</a>')
                }
                y.innerHTML = b, $(y).on("click", "a", function () {
                    if ($(this).is("a")) {
                        var c = a.dataset($(this));
                        if ($(this).hasClass("disabled"))return;
                        c.index && v.messageFilling(String(c.index), String(h))
                    }
                });
                var w = $(".m-pager");
                w.innerHTML = "", w.html(y)
            }
        };
        v.init()
    })
});
/*!talents/page/intro/intro.js*/
;
define("talents/page/intro/intro", ["require", "exports", "module"], function () {
    $(function () {
        $("a.btn-apply,a.btn-code").on("click", function () {
            window.location.href = ctx + "/talent/basicInfo.html"
        })
    }), $(function () {
        function a(a) {
            $("html,body").animate({scrollTop: $(a).offset().top}, 1e3)
        }

        $(".nav-faq").on("click", function () {
            $(".faq-content").show(), $(".nav-faq").addClass("nav-selected"), $(".content").hide(), $(".nav-strategy").removeClass("nav-selected")
        }), $(".nav-strategy").on("click", function () {
            $(".faq-content").hide(), $(".nav-strategy").addClass("nav-selected"), $(".content").show(), $(".nav-faq").removeClass("nav-selected")
        });
        var c;
        $(".faq-content").on("click", ".faq", function () {
            if (c) {
                var a = $(this).find("h2").text() != c.find("h2").text(), h = "block" == c.find(".answer").css("display");
                a && h && (c.find(".answer").slideToggle(100), c.find(".icon-right").toggleClass("icon-right-toggle"), c.toggleClass("faq-click"))
            }
            $(this).find(".answer").slideToggle(100), $(this).find(".icon-right").toggleClass("icon-right-toggle"), $(this).toggleClass("faq-click"), c = $(this)
        });
        var h = window.location.href, g = h.indexOf("#");
        if (-1 !== g) {
            var v = h.substr(g);
            v && v.indexOf("-") && ($(".nav-strategy").trigger("click"), a(v))
        }
    }), $(function () {
        function a(a) {
            var c = parseInt(y.css("left")) + a;
            M = Math.abs(c / w), 5 == M && (M = 1), a = a > 0 ? "+=" + a : "-=" + Math.abs(a), y.animate({left: a}, 300, function () {
                A && (w = $(document.body).width(), y.css("left", -w * M), A = !1), c > -w ? y.css("left", -$(document.body).width() * z) : -w * z > c && y.css("left", -$(document.body).width())
            })
        }

        function c() {
            C.eq(O - 1).addClass("on").siblings().removeClass("on")
        }

        function h() {
            b = setTimeout(function () {
                I.trigger("click"), h()
            }, j)
        }

        function g() {
            clearTimeout(b)
        }

        function v() {
            $(".hot").animate({top: "-=10px"}, 300).animate({top: "+=10px"}, 300).animate({top: "-=10px"}, 300).animate({top: "+=10px"}, 300), setTimeout(v, 2e3)
        }

        var b, w = $(document.body).width(), k = $(".m-carousel"), y = $(".m-carousel .list"), C = $(".m-carousel .buttons span"), T = $(".m-carousel .prev"), I = $(".m-carousel .next"), M = 1, O = 1, z = 4, j = 5e3, A = !1;
        I.on("click", function () {
            y.is(":animated") || (4 == O ? O = 1 : O += 1, a(-w), c())
        }), T.on("click", function () {
            y.is(":animated") || (1 == O ? O = 4 : O -= 1, a(w), c())
        }), C.each(function () {
            $(this).bind("click", function () {
                if (!y.is(":animated") && "on" != $(this).attr("class")) {
                    var h = parseInt($(this).attr("index")), g = -w * (h - O);
                    a(g), O = h, c()
                }
            })
        }), k.hover(g, h), h(), $(window).on("resize", function () {
            A = !0, y.is(":animated") || (w = $(document.body).width(), y.css("left", -w * M), A = !1)
        }), v()
    })
});
/*!dep/jquery.cookie/jquery.cookie.js*/
;
!function (c) {
    "function" == typeof define && define.amd ? define("dep/jquery.cookie/jquery.cookie", ["dep/jquery/dist/jquery"], c) : c("object" == typeof exports ? require("dep/jquery/dist/jquery") : jQuery)
}(function (c) {
    function a(s) {
        return h.raw ? s : encodeURIComponent(s)
    }

    function j(s) {
        return h.raw ? s : decodeURIComponent(s)
    }

    function y(c) {
        return a(h.json ? JSON.stringify(c) : String(c))
    }

    function k(s) {
        0 === s.indexOf('"') && (s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return s = decodeURIComponent(s.replace(g, " ")), h.json ? JSON.parse(s) : s
        } catch (e) {
        }
    }

    function v(s, a) {
        var j = h.raw ? s : k(s);
        return c.isFunction(a) ? a(j) : j
    }

    var g = /\+/g, h = c.cookie = function (k, g, C) {
        if (void 0 !== g && !c.isFunction(g)) {
            if (C = c.extend({}, h.defaults, C), "number" == typeof C.expires) {
                var w = C.expires, t = C.expires = new Date;
                t.setTime(+t + 864e5 * w)
            }
            return document.cookie = [a(k), "=", y(g), C.expires ? "; expires=" + C.expires.toUTCString() : "", C.path ? "; path=" + C.path : "", C.domain ? "; domain=" + C.domain : "", C.secure ? "; secure" : ""].join("")
        }
        for (var S = k ? void 0 : {}, U = document.cookie ? document.cookie.split("; ") : [], i = 0, l = U.length; l > i; i++) {
            var b = U[i].split("="), I = j(b.shift()), O = b.join("=");
            if (k && k === I) {
                S = v(O, g);
                break
            }
            k || void 0 === (O = v(O)) || (S[I] = O)
        }
        return S
    };
    h.defaults = {}, c.removeCookie = function (a, j) {
        return void 0 === c.cookie(a) ? !1 : (c.cookie(a, "", c.extend({}, j, {expires: -1})), !c.cookie(a))
    }
});
/*!common/static/js/feedback.js*/
;
define("common/static/js/feedback", ["require", "exports", "module"], function () {
    $(function () {
        var a = $("#feedback-con"), c = $(".pfb-close"), k = $("#feedback-icon"), v = $("#product-fb"), C = $(".ensure"), b = {
            hide: function (a) {
                a.fadeOut()
            }, show: function (a) {
                a.fadeIn()
            }, setCountdown: function (a, c) {
                var k = this, v = setTimeout(function () {
                    0 == a && (clearTimeout(v), c.addClass("dn")), k.setCountdown(a - 1, c)
                }, 1e3)
            }, valid: function (c) {
                var k = this, v = $.trim(c.find("textarea").val()), C = v.length, h = $.trim(c.find("input").val()), g = document.URL, w = /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/, j = !1, T = a.find(".error"), i = T.find("i"), y = h.length, z = !0;
                ("" == v || C > 200) && (T.removeClass("dn").find("span").text("你还没填任何反馈呢"), i.addClass("txt"), k.setCountdown(3, T), z = !1), "" != h && (j = w.test(h)), j || "" == h || (T.removeClass("dn").find("span").text("请输入有效的邮箱地址"), i.hasClass("txt") && i.removeClass("txt"), k.setCountdown(3, T), z = !1), j && y > 100 && (T.removeClass("dn").find("span").text("请输入100字以内的邮箱地址"), i.hasClass("txt") && i.removeClass("txt"), k.setCountdown(3, T), z = !1), z && $.ajax({
                    url: "http://service.lagou.com/feedback",
                    type: "POST",
                    data: {
                        userId: global.usertoken,
                        content: v,
                        loginEmail: global.email,
                        feedbackEmail: h,
                        feedbackPage: g
                    },
                    dataType: "jsonp",
                    jsonp: "callback"
                }).done(function (c) {
                    c.success ? (b.hide(a), $("#product-fk .fk-suc").removeClass("dn"), k.setCountdown(3, $("#product-fk .fk-suc"))) : alert(c.msg)
                })
            }
        };
        k.click(function () {
            v.find("input").val("").end().find("textarea").val(""), $.ajax({
                url: "http://service.lagou.com/feedback/check",
                type: "POST",
                data: {loginEmail: global.email, userId: global.usertoken},
                dataType: "jsonp",
                jsonp: "callback"
            }).done(function (c) {
                if (c.success)b.show(a); else {
                    var v = k.find(".fk-limit");
                    v.removeClass("dn"), b.setCountdown(3, v)
                }
            })
        }), c.click(function () {
            b.hide(a)
        }), C.click(function () {
            b.valid(v)
        })
    })
});
/*!common/static/js/usertrack/track.js*/
;
define("common/static/js/usertrack/track", ["require", "exports", "module"], function () {
    !function (a) {
        "use strict";
        function c(a, c) {
            var I = window.location.href;
            I = encodeURIComponent(encodeURIComponent(I));
            var r = document.referrer;
            r = encodeURIComponent(encodeURIComponent(r)), c = encodeURIComponent(encodeURIComponent(c));
            new Image
        }

        function I() {
            var a = new Date, c = (parseInt(a.getTime()), window.location.href);
            c = encodeURIComponent(encodeURIComponent(c));
            new Image
        }

        var w = 0, U = 0;
        "undefined" != typeof paiUserId && void 0 != paiUserId && null != paiUserId && "" != paiUserId && (w = paiUserId);
        var v = "click_track";
        a(document).on("click", "." + v, function () {
            var I = a(this).attr("event-name");
            c(1, I)
        }), window.trackMonitor = function (a) {
            c(1, a)
        }, a(window).load(function () {
            var a = new Date;
            U = parseInt(a.getTime()), c(2, "")
        }), a(window).unload(function () {
            I()
        });
        var C = navigator.userAgent;
        C.indexOf("Chrome") > 0 && a(window).bind("beforeunload", function () {
            I()
        })
    }(jQuery)
});