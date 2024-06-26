(() => {
    function vt(t) {
        t.directive("dialog", (e, i) => {
            i.value === "overlay"
                ? Me(e, t)
                : i.value === "panel"
                ? Fe(e, t)
                : i.value === "title"
                ? Re(e, t)
                : i.value === "description"
                ? Ve(e, t)
                : Le(e, t);
        }),
            t.magic("dialog", (e) => {
                let i = t.$data(e);
                return {
                    get open() {
                        return i.__isOpen;
                    },
                    get isOpen() {
                        return i.__isOpen;
                    },
                    close() {
                        i.__close();
                    },
                };
            });
    }
    function Le(t, e) {
        e.bind(t, {
            "x-data"() {
                return {
                    init() {
                        e.bound(t, "open") !== void 0 &&
                            e.effect(() => {
                                this.__isOpenState = e.bound(t, "open");
                            }),
                            e.bound(t, "initial-focus") !== void 0 &&
                                this.$watch("__isOpenState", () => {
                                    !this.__isOpenState ||
                                        setTimeout(() => {
                                            e.bound(t, "initial-focus").focus();
                                        }, 0);
                                });
                    },
                    __isOpenState: !1,
                    __close() {
                        e.bound(t, "open")
                            ? this.$dispatch("close")
                            : (this.__isOpenState = !1);
                    },
                    get __isOpen() {
                        return e.bound(t, "static", this.__isOpenState);
                    },
                };
            },
            "x-modelable": "__isOpenState",
            "x-id"() {
                return ["alpine-dialog-title", "alpine-dialog-description"];
            },
            "x-show"() {
                return this.__isOpen;
            },
            "x-trap.inert.noscroll"() {
                return this.__isOpen;
            },
            "@keydown.escape"() {
                this.__close();
            },
            ":aria-labelledby"() {
                return this.$id("alpine-dialog-title");
            },
            ":aria-describedby"() {
                return this.$id("alpine-dialog-description");
            },
            role: "dialog",
            "aria-modal": "true",
        });
    }
    function Me(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__isOpen === void 0 &&
                    console.warn(
                        '"x-dialog:overlay" is missing a parent element with "x-dialog".'
                    );
            },
            "x-show"() {
                return this.__isOpen;
            },
            "@click.prevent.stop"() {
                this.$data.__close();
            },
        });
    }
    function Fe(t, e) {
        e.bind(t, {
            "@click.outside"() {
                this.$data.__close();
            },
            "x-show"() {
                return this.$data.__isOpen;
            },
        });
    }
    function Re(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__isOpen === void 0 &&
                    console.warn(
                        '"x-dialog:title" is missing a parent element with "x-dialog".'
                    );
            },
            ":id"() {
                return this.$id("alpine-dialog-title");
            },
        });
    }
    function Ve(t, e) {
        e.bind(t, {
            ":id"() {
                return this.$id("alpine-dialog-description");
            },
        });
    }
    function gt(t) {
        t.directive("disclosure", (e, i) => {
            i.value
                ? i.value === "panel"
                    ? qe(e, t)
                    : i.value === "button" && je(e, t)
                : Ae(e, t);
        }),
            t.magic("disclosure", (e) => {
                let i = t.$data(e);
                return {
                    get isOpen() {
                        return i.__isOpen;
                    },
                    close() {
                        i.__close();
                    },
                };
            });
    }
    function Ae(t, e) {
        e.bind(t, {
            "x-modelable": "__isOpen",
            "x-data"() {
                return {
                    init() {
                        queueMicrotask(() => {
                            let i = Boolean(
                                e.bound(this.$el, "default-open", !1)
                            );
                            i && (this.__isOpen = i);
                        });
                    },
                    __isOpen: !1,
                    __close() {
                        this.__isOpen = !1;
                    },
                    __toggle() {
                        this.__isOpen = !this.__isOpen;
                    },
                };
            },
            "x-id"() {
                return ["alpine-disclosure-panel"];
            },
        });
    }
    function je(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$el.tagName.toLowerCase() === "button" &&
                    !this.$el.hasAttribute("type") &&
                    (this.$el.type = "button");
            },
            "@click"() {
                this.$data.__isOpen = !this.$data.__isOpen;
            },
            ":aria-expanded"() {
                return this.$data.__isOpen;
            },
            ":aria-controls"() {
                return this.$data.$id("alpine-disclosure-panel");
            },
            "@keydown.space.prevent.stop"() {
                this.$data.__toggle();
            },
            "@keydown.enter.prevent.stop"() {
                this.$data.__toggle();
            },
            "@keyup.space.prevent"() {},
        });
    }
    function qe(t, e) {
        e.bind(t, {
            "x-show"() {
                return this.$data.__isOpen;
            },
            ":id"() {
                return this.$data.$id("alpine-disclosure-panel");
            },
        });
    }
    var H = !1,
        U = !1,
        S = [];
    function $t(t) {
        We(t);
    }
    function We(t) {
        S.includes(t) || S.push(t), He();
    }
    function He() {
        !U && !H && ((H = !0), queueMicrotask(Ue));
    }
    function Ue() {
        (H = !1), (U = !0);
        for (let t = 0; t < S.length; t++) S[t]();
        (S.length = 0), (U = !1);
    }
    var x,
        h,
        m,
        z,
        Q = !0;
    function Et(t) {
        (Q = !1), t(), (Q = !0);
    }
    function Ot(t) {
        (x = t.reactive),
            (m = t.release),
            (h = (e) =>
                t.effect(e, {
                    scheduler: (i) => {
                        Q ? $t(i) : i();
                    },
                })),
            (z = t.raw);
    }
    function G(t) {
        h = t;
    }
    function wt(t) {
        let e = () => {};
        return [
            (n) => {
                let s = h(n);
                return (
                    t._x_effects ||
                        ((t._x_effects = new Set()),
                        (t._x_runEffects = () => {
                            t._x_effects.forEach((r) => r());
                        })),
                    t._x_effects.add(s),
                    (e = () => {
                        s !== void 0 && (t._x_effects.delete(s), m(s));
                    }),
                    s
                );
            },
            () => {
                e();
            },
        ];
    }
    var St = [],
        kt = [],
        Dt = [];
    function Kt(t) {
        Dt.push(t);
    }
    function N(t, e) {
        typeof e == "function"
            ? (t._x_cleanups || (t._x_cleanups = []), t._x_cleanups.push(e))
            : ((e = t), kt.push(e));
    }
    function Ct(t) {
        St.push(t);
    }
    function Tt(t, e, i) {
        t._x_attributeCleanups || (t._x_attributeCleanups = {}),
            t._x_attributeCleanups[e] || (t._x_attributeCleanups[e] = []),
            t._x_attributeCleanups[e].push(i);
    }
    function J(t, e) {
        !t._x_attributeCleanups ||
            Object.entries(t._x_attributeCleanups).forEach(([i, n]) => {
                (e === void 0 || e.includes(i)) &&
                    (n.forEach((s) => s()), delete t._x_attributeCleanups[i]);
            });
    }
    var X = new MutationObserver(Z),
        Y = !1;
    function tt() {
        X.observe(document, {
            subtree: !0,
            childList: !0,
            attributes: !0,
            attributeOldValue: !0,
        }),
            (Y = !0);
    }
    function Qe() {
        ze(), X.disconnect(), (Y = !1);
    }
    var k = [],
        et = !1;
    function ze() {
        (k = k.concat(X.takeRecords())),
            k.length &&
                !et &&
                ((et = !0),
                queueMicrotask(() => {
                    Ge(), (et = !1);
                }));
    }
    function Ge() {
        Z(k), (k.length = 0);
    }
    function p(t) {
        if (!Y) return t();
        Qe();
        let e = t();
        return tt(), e;
    }
    var it = !1,
        P = [];
    function Nt() {
        it = !0;
    }
    function Pt() {
        (it = !1), Z(P), (P = []);
    }
    function Z(t) {
        if (it) {
            P = P.concat(t);
            return;
        }
        let e = [],
            i = [],
            n = new Map(),
            s = new Map();
        for (let r = 0; r < t.length; r++)
            if (
                !t[r].target._x_ignoreMutationObserver &&
                (t[r].type === "childList" &&
                    (t[r].addedNodes.forEach(
                        (a) => a.nodeType === 1 && e.push(a)
                    ),
                    t[r].removedNodes.forEach(
                        (a) => a.nodeType === 1 && i.push(a)
                    )),
                t[r].type === "attributes")
            ) {
                let a = t[r].target,
                    o = t[r].attributeName,
                    l = t[r].oldValue,
                    u = () => {
                        n.has(a) || n.set(a, []),
                            n
                                .get(a)
                                .push({ name: o, value: a.getAttribute(o) });
                    },
                    f = () => {
                        s.has(a) || s.set(a, []), s.get(a).push(o);
                    };
                a.hasAttribute(o) && l === null
                    ? u()
                    : a.hasAttribute(o)
                    ? (f(), u())
                    : f();
            }
        s.forEach((r, a) => {
            J(a, r);
        }),
            n.forEach((r, a) => {
                St.forEach((o) => o(a, r));
            });
        for (let r of i)
            if (!e.includes(r) && (kt.forEach((a) => a(r)), r._x_cleanups))
                for (; r._x_cleanups.length; ) r._x_cleanups.pop()();
        e.forEach((r) => {
            (r._x_ignoreSelf = !0), (r._x_ignore = !0);
        });
        for (let r of e)
            i.includes(r) ||
                !r.isConnected ||
                (delete r._x_ignoreSelf,
                delete r._x_ignore,
                Dt.forEach((a) => a(r)),
                (r._x_ignore = !0),
                (r._x_ignoreSelf = !0));
        e.forEach((r) => {
            delete r._x_ignoreSelf, delete r._x_ignore;
        }),
            (e = null),
            (i = null),
            (n = null),
            (s = null);
    }
    function It(t) {
        return y(c(t));
    }
    function Bt(t, e, i) {
        return (
            (t._x_dataStack = [e, ...c(i || t)]),
            () => {
                t._x_dataStack = t._x_dataStack.filter((n) => n !== e);
            }
        );
    }
    function c(t) {
        return t._x_dataStack
            ? t._x_dataStack
            : typeof ShadowRoot == "function" && t instanceof ShadowRoot
            ? c(t.host)
            : t.parentNode
            ? c(t.parentNode)
            : [];
    }
    function y(t) {
        let e = new Proxy(
            {},
            {
                ownKeys: () =>
                    Array.from(new Set(t.flatMap((i) => Object.keys(i)))),
                has: (i, n) => t.some((s) => s.hasOwnProperty(n)),
                get: (i, n) =>
                    (t.find((s) => {
                        if (s.hasOwnProperty(n)) {
                            let r = Object.getOwnPropertyDescriptor(s, n);
                            if (
                                (r.get && r.get._x_alreadyBound) ||
                                (r.set && r.set._x_alreadyBound)
                            )
                                return !0;
                            if ((r.get || r.set) && r.enumerable) {
                                let a = r.get,
                                    o = r.set,
                                    l = r;
                                (a = a && a.bind(e)),
                                    (o = o && o.bind(e)),
                                    a && (a._x_alreadyBound = !0),
                                    o && (o._x_alreadyBound = !0),
                                    Object.defineProperty(s, n, {
                                        ...l,
                                        get: a,
                                        set: o,
                                    });
                            }
                            return !0;
                        }
                        return !1;
                    }) || {})[n],
                set: (i, n, s) => {
                    let r = t.find((a) => a.hasOwnProperty(n));
                    return r ? (r[n] = s) : (t[t.length - 1][n] = s), !0;
                },
            }
        );
        return e;
    }
    function Lt(t) {
        let e = (n) => typeof n == "object" && !Array.isArray(n) && n !== null,
            i = (n, s = "") => {
                Object.entries(Object.getOwnPropertyDescriptors(n)).forEach(
                    ([r, { value: a, enumerable: o }]) => {
                        if (o === !1 || a === void 0) return;
                        let l = s === "" ? r : `${s}.${r}`;
                        typeof a == "object" && a !== null && a._x_interceptor
                            ? (n[r] = a.initialize(t, l, r))
                            : e(a) &&
                              a !== n &&
                              !(a instanceof Element) &&
                              i(a, l);
                    }
                );
            };
        return i(t);
    }
    function I(t, e = () => {}) {
        let i = {
            initialValue: void 0,
            _x_interceptor: !0,
            initialize(n, s, r) {
                return t(
                    this.initialValue,
                    () => Je(n, s),
                    (a) => nt(n, s, a),
                    s,
                    r
                );
            },
        };
        return (
            e(i),
            (n) => {
                if (typeof n == "object" && n !== null && n._x_interceptor) {
                    let s = i.initialize.bind(i);
                    i.initialize = (r, a, o) => {
                        let l = n.initialize(r, a, o);
                        return (i.initialValue = l), s(r, a, o);
                    };
                } else i.initialValue = n;
                return i;
            }
        );
    }
    function Je(t, e) {
        return e.split(".").reduce((i, n) => i[n], t);
    }
    function nt(t, e, i) {
        if ((typeof e == "string" && (e = e.split(".")), e.length === 1))
            t[e[0]] = i;
        else {
            if (e.length === 0) throw error;
            return t[e[0]] || (t[e[0]] = {}), nt(t[e[0]], e.slice(1), i);
        }
    }
    var Mt = {};
    function Ft(t, e) {
        Mt[t] = e;
    }
    function Rt(t, e) {
        return (
            Object.entries(Mt).forEach(([i, n]) => {
                Object.defineProperty(t, `$${i}`, {
                    get() {
                        let [s, r] = st(e);
                        return (s = { interceptor: I, ...s }), N(e, r), n(e, s);
                    },
                    enumerable: !1,
                });
            }),
            t
        );
    }
    function Vt(t, e, i, ...n) {
        try {
            return i(...n);
        } catch (s) {
            v(s, t, e);
        }
    }
    function v(t, e, i = void 0) {
        Object.assign(t, { el: e, expression: i }),
            console.warn(
                `Alpine Expression Error: ${t.message}

${
    i
        ? 'Expression: "' +
          i +
          `"

`
        : ""
}`,
                e
            ),
            setTimeout(() => {
                throw t;
            }, 0);
    }
    var B = !0;
    function At(t) {
        let e = B;
        (B = !1), t(), (B = e);
    }
    function D(t, e, i = {}) {
        let n;
        return g(t, e)((s) => (n = s), i), n;
    }
    function g(...t) {
        return jt(...t);
    }
    var jt = Ze;
    function qt(t) {
        jt = t;
    }
    function Ze(t, e) {
        let i = {};
        Rt(i, t);
        let n = [i, ...c(t)];
        if (typeof e == "function") return Xe(n, e);
        let s = Ye(n, e, t);
        return Vt.bind(null, t, e, s);
    }
    function Xe(t, e) {
        return (i = () => {}, { scope: n = {}, params: s = [] } = {}) => {
            let r = e.apply(y([n, ...t]), s);
            L(i, r);
        };
    }
    var rt = {};
    function ti(t, e) {
        if (rt[t]) return rt[t];
        let i = Object.getPrototypeOf(async function () {}).constructor,
            n =
                /^[\n\s]*if.*\(.*\)/.test(t) || /^(let|const)\s/.test(t)
                    ? `(() => { ${t} })()`
                    : t,
            r = (() => {
                try {
                    return new i(
                        ["__self", "scope"],
                        `with (scope) { __self.result = ${n} }; __self.finished = true; return __self.result;`
                    );
                } catch (a) {
                    return v(a, e, t), Promise.resolve();
                }
            })();
        return (rt[t] = r), r;
    }
    function Ye(t, e, i) {
        let n = ti(e, i);
        return (s = () => {}, { scope: r = {}, params: a = [] } = {}) => {
            (n.result = void 0), (n.finished = !1);
            let o = y([r, ...t]);
            if (typeof n == "function") {
                let l = n(n, o).catch((u) => v(u, i, e));
                n.finished
                    ? (L(s, n.result, o, a, i), (n.result = void 0))
                    : l
                          .then((u) => {
                              L(s, u, o, a, i);
                          })
                          .catch((u) => v(u, i, e))
                          .finally(() => (n.result = void 0));
            }
        };
    }
    function L(t, e, i, n, s) {
        if (B && typeof e == "function") {
            let r = e.apply(i, n);
            r instanceof Promise
                ? r.then((a) => L(t, a, i, n)).catch((a) => v(a, s, e))
                : t(r);
        } else t(e);
    }
    var at = "x-";
    function Wt(t = "") {
        return at + t;
    }
    function Ht(t) {
        at = t;
    }
    var Ut = {};
    function M(t, e) {
        Ut[t] = e;
    }
    function K(t, e, i) {
        if (((e = Array.from(e)), t._x_virtualDirectives)) {
            let r = Object.entries(t._x_virtualDirectives).map(([o, l]) => ({
                    name: o,
                    value: l,
                })),
                a = ot(r);
            (r = r.map((o) =>
                a.find((l) => l.name === o.name)
                    ? { name: `x-bind:${o.name}`, value: `"${o.value}"` }
                    : o
            )),
                (e = e.concat(r));
        }
        let n = {};
        return e
            .map(zt((r, a) => (n[r] = a)))
            .filter(Qt)
            .map(ii(n, i))
            .sort(ni)
            .map((r) => ei(t, r));
    }
    function ot(t) {
        return Array.from(t)
            .map(zt())
            .filter((e) => !Qt(e));
    }
    var lt = !1,
        C = new Map(),
        Gt = Symbol();
    function Jt(t) {
        lt = !0;
        let e = Symbol();
        (Gt = e), C.set(e, []);
        let i = () => {
                for (; C.get(e).length; ) C.get(e).shift()();
                C.delete(e);
            },
            n = () => {
                (lt = !1), i();
            };
        t(i), n();
    }
    function st(t) {
        let e = [],
            i = (o) => e.push(o),
            [n, s] = wt(t);
        return (
            e.push(s),
            [
                {
                    Alpine: b,
                    effect: n,
                    cleanup: i,
                    evaluateLater: g.bind(g, t),
                    evaluate: D.bind(D, t),
                },
                () => e.forEach((o) => o()),
            ]
        );
    }
    function ei(t, e) {
        let i = () => {},
            n = Ut[e.type] || i,
            [s, r] = st(t);
        Tt(t, e.original, r);
        let a = () => {
            t._x_ignore ||
                t._x_ignoreSelf ||
                (n.inline && n.inline(t, e, s),
                (n = n.bind(n, t, e, s)),
                lt ? C.get(Gt).push(n) : n());
        };
        return (a.runCleanups = r), a;
    }
    function zt(t = () => {}) {
        return ({ name: e, value: i }) => {
            let { name: n, value: s } = Zt.reduce((r, a) => a(r), {
                name: e,
                value: i,
            });
            return n !== e && t(n, e), { name: n, value: s };
        };
    }
    var Zt = [];
    function Xt(t) {
        Zt.push(t);
    }
    function Qt({ name: t }) {
        return Yt().test(t);
    }
    var Yt = () => new RegExp(`^${at}([^:^.]+)\\b`);
    function ii(t, e) {
        return ({ name: i, value: n }) => {
            let s = i.match(Yt()),
                r = i.match(/:([a-zA-Z0-9\-:]+)/),
                a = i.match(/\.[^.\]]+(?=[^\]]*$)/g) || [],
                o = e || t[i] || i;
            return {
                type: s ? s[1] : null,
                value: r ? r[1] : null,
                modifiers: a.map((l) => l.replace(".", "")),
                expression: n,
                original: o,
            };
        };
    }
    var ut = "DEFAULT",
        F = [
            "ignore",
            "ref",
            "data",
            "id",
            "radio",
            "tabs",
            "switch",
            "disclosure",
            "menu",
            "listbox",
            "combobox",
            "bind",
            "init",
            "for",
            "mask",
            "model",
            "modelable",
            "transition",
            "show",
            "if",
            ut,
            "teleport",
        ];
    function ni(t, e) {
        let i = F.indexOf(t.type) === -1 ? ut : t.type,
            n = F.indexOf(e.type) === -1 ? ut : e.type;
        return F.indexOf(i) - F.indexOf(n);
    }
    function R(t, e, i = {}) {
        t.dispatchEvent(
            new CustomEvent(e, {
                detail: i,
                bubbles: !0,
                composed: !0,
                cancelable: !0,
            })
        );
    }
    var dt = [],
        ct = !1;
    function te(t = () => {}) {
        return (
            queueMicrotask(() => {
                ct ||
                    setTimeout(() => {
                        V();
                    });
            }),
            new Promise((e) => {
                dt.push(() => {
                    t(), e();
                });
            })
        );
    }
    function V() {
        for (ct = !1; dt.length; ) dt.shift()();
    }
    function ee() {
        ct = !0;
    }
    function _(t, e) {
        if (typeof ShadowRoot == "function" && t instanceof ShadowRoot) {
            Array.from(t.children).forEach((s) => _(s, e));
            return;
        }
        let i = !1;
        if ((e(t, () => (i = !0)), i)) return;
        let n = t.firstElementChild;
        for (; n; ) _(n, e, !1), (n = n.nextElementSibling);
    }
    function ie(t, ...e) {
        console.warn(`Alpine Warning: ${t}`, ...e);
    }
    function se() {
        document.body ||
            ie(
                "Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?"
            ),
            R(document, "alpine:init"),
            R(document, "alpine:initializing"),
            tt(),
            Kt((e) => $(e, _)),
            N((e) => si(e)),
            Ct((e, i) => {
                K(e, i).forEach((n) => n());
            });
        let t = (e) => !_t(e.parentElement, !0);
        Array.from(document.querySelectorAll(ne()))
            .filter(t)
            .forEach((e) => {
                $(e);
            }),
            R(document, "alpine:initialized");
    }
    var ft = [],
        re = [];
    function ae() {
        return ft.map((t) => t());
    }
    function ne() {
        return ft.concat(re).map((t) => t());
    }
    function oe(t) {
        ft.push(t);
    }
    function le(t) {
        re.push(t);
    }
    function _t(t, e = !1) {
        return A(t, (i) => {
            if ((e ? ne() : ae()).some((s) => i.matches(s))) return !0;
        });
    }
    function A(t, e) {
        if (!!t) {
            if (e(t)) return t;
            if (
                (t._x_teleportBack && (t = t._x_teleportBack),
                !!t.parentElement)
            )
                return A(t.parentElement, e);
        }
    }
    function ue(t) {
        return ae().some((e) => t.matches(e));
    }
    function $(t, e = _) {
        Jt(() => {
            e(t, (i, n) => {
                K(i, i.attributes).forEach((s) => s()), i._x_ignore && n();
            });
        });
    }
    function si(t) {
        _(t, (e) => J(e));
    }
    function j(t, e) {
        return Array.isArray(e)
            ? de(t, e.join(" "))
            : typeof e == "object" && e !== null
            ? ri(t, e)
            : typeof e == "function"
            ? j(t, e())
            : de(t, e);
    }
    function de(t, e) {
        let i = (r) => r.split(" ").filter(Boolean),
            n = (r) =>
                r
                    .split(" ")
                    .filter((a) => !t.classList.contains(a))
                    .filter(Boolean),
            s = (r) => (
                t.classList.add(...r),
                () => {
                    t.classList.remove(...r);
                }
            );
        return (e = e === !0 ? (e = "") : e || ""), s(n(e));
    }
    function ri(t, e) {
        let i = (o) => o.split(" ").filter(Boolean),
            n = Object.entries(e)
                .flatMap(([o, l]) => (l ? i(o) : !1))
                .filter(Boolean),
            s = Object.entries(e)
                .flatMap(([o, l]) => (l ? !1 : i(o)))
                .filter(Boolean),
            r = [],
            a = [];
        return (
            s.forEach((o) => {
                t.classList.contains(o) && (t.classList.remove(o), a.push(o));
            }),
            n.forEach((o) => {
                t.classList.contains(o) || (t.classList.add(o), r.push(o));
            }),
            () => {
                a.forEach((o) => t.classList.add(o)),
                    r.forEach((o) => t.classList.remove(o));
            }
        );
    }
    function E(t, e) {
        return typeof e == "object" && e !== null ? ai(t, e) : oi(t, e);
    }
    function ai(t, e) {
        let i = {};
        return (
            Object.entries(e).forEach(([n, s]) => {
                (i[n] = t.style[n]),
                    n.startsWith("--") || (n = li(n)),
                    t.style.setProperty(n, s);
            }),
            setTimeout(() => {
                t.style.length === 0 && t.removeAttribute("style");
            }),
            () => {
                E(t, i);
            }
        );
    }
    function oi(t, e) {
        let i = t.getAttribute("style", e);
        return (
            t.setAttribute("style", e),
            () => {
                t.setAttribute("style", i || "");
            }
        );
    }
    function li(t) {
        return t.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase();
    }
    function ht(t, e = () => {}) {
        let i = !1;
        return function () {
            i ? e.apply(this, arguments) : ((i = !0), t.apply(this, arguments));
        };
    }
    M(
        "transition",
        (t, { value: e, modifiers: i, expression: n }, { evaluate: s }) => {
            typeof n == "function" && (n = s(n)), n ? ui(t, n, e) : di(t, i, e);
        }
    );
    function ui(t, e, i) {
        ce(t, j, ""),
            {
                enter: (s) => {
                    t._x_transition.enter.during = s;
                },
                "enter-start": (s) => {
                    t._x_transition.enter.start = s;
                },
                "enter-end": (s) => {
                    t._x_transition.enter.end = s;
                },
                leave: (s) => {
                    t._x_transition.leave.during = s;
                },
                "leave-start": (s) => {
                    t._x_transition.leave.start = s;
                },
                "leave-end": (s) => {
                    t._x_transition.leave.end = s;
                },
            }[i](e);
    }
    function di(t, e, i) {
        ce(t, E);
        let n = !e.includes("in") && !e.includes("out") && !i,
            s = n || e.includes("in") || ["enter"].includes(i),
            r = n || e.includes("out") || ["leave"].includes(i);
        e.includes("in") &&
            !n &&
            (e = e.filter((Be, W) => W < e.indexOf("out"))),
            e.includes("out") &&
                !n &&
                (e = e.filter((Be, W) => W > e.indexOf("out")));
        let a = !e.includes("opacity") && !e.includes("scale"),
            o = a || e.includes("opacity"),
            l = a || e.includes("scale"),
            u = o ? 0 : 1,
            f = l ? T(e, "scale", 95) / 100 : 1,
            bt = T(e, "delay", 0),
            xt = T(e, "origin", "center"),
            mt = "opacity, transform",
            Pe = T(e, "duration", 150) / 1e3,
            Ie = T(e, "duration", 75) / 1e3,
            yt = "cubic-bezier(0.4, 0.0, 0.2, 1)";
        s &&
            ((t._x_transition.enter.during = {
                transformOrigin: xt,
                transitionDelay: bt,
                transitionProperty: mt,
                transitionDuration: `${Pe}s`,
                transitionTimingFunction: yt,
            }),
            (t._x_transition.enter.start = {
                opacity: u,
                transform: `scale(${f})`,
            }),
            (t._x_transition.enter.end = {
                opacity: 1,
                transform: "scale(1)",
            })),
            r &&
                ((t._x_transition.leave.during = {
                    transformOrigin: xt,
                    transitionDelay: bt,
                    transitionProperty: mt,
                    transitionDuration: `${Ie}s`,
                    transitionTimingFunction: yt,
                }),
                (t._x_transition.leave.start = {
                    opacity: 1,
                    transform: "scale(1)",
                }),
                (t._x_transition.leave.end = {
                    opacity: u,
                    transform: `scale(${f})`,
                }));
    }
    function ce(t, e, i = {}) {
        t._x_transition ||
            (t._x_transition = {
                enter: { during: i, start: i, end: i },
                leave: { during: i, start: i, end: i },
                in(n = () => {}, s = () => {}) {
                    q(
                        t,
                        e,
                        {
                            during: this.enter.during,
                            start: this.enter.start,
                            end: this.enter.end,
                        },
                        n,
                        s
                    );
                },
                out(n = () => {}, s = () => {}) {
                    q(
                        t,
                        e,
                        {
                            during: this.leave.during,
                            start: this.leave.start,
                            end: this.leave.end,
                        },
                        n,
                        s
                    );
                },
            });
    }
    window.Element.prototype._x_toggleAndCascadeWithTransitions = function (
        t,
        e,
        i,
        n
    ) {
        let s =
                document.visibilityState === "visible"
                    ? requestAnimationFrame
                    : setTimeout,
            r = () => s(i);
        if (e) {
            t._x_transition && (t._x_transition.enter || t._x_transition.leave)
                ? t._x_transition.enter &&
                  (Object.entries(t._x_transition.enter.during).length ||
                      Object.entries(t._x_transition.enter.start).length ||
                      Object.entries(t._x_transition.enter.end).length)
                    ? t._x_transition.in(i)
                    : r()
                : t._x_transition
                ? t._x_transition.in(i)
                : r();
            return;
        }
        (t._x_hidePromise = t._x_transition
            ? new Promise((a, o) => {
                  t._x_transition.out(
                      () => {},
                      () => a(n)
                  ),
                      t._x_transitioning.beforeCancel(() =>
                          o({ isFromCancelledTransition: !0 })
                      );
              })
            : Promise.resolve(n)),
            queueMicrotask(() => {
                let a = _e(t);
                a
                    ? (a._x_hideChildren || (a._x_hideChildren = []),
                      a._x_hideChildren.push(t))
                    : s(() => {
                          let o = (l) => {
                              let u = Promise.all([
                                  l._x_hidePromise,
                                  ...(l._x_hideChildren || []).map(o),
                              ]).then(([f]) => f());
                              return (
                                  delete l._x_hidePromise,
                                  delete l._x_hideChildren,
                                  u
                              );
                          };
                          o(t).catch((l) => {
                              if (!l.isFromCancelledTransition) throw l;
                          });
                      });
            });
    };
    function _e(t) {
        let e = t.parentNode;
        if (!!e) return e._x_hidePromise ? e : _e(e);
    }
    function q(
        t,
        e,
        { during: i, start: n, end: s } = {},
        r = () => {},
        a = () => {}
    ) {
        if (
            (t._x_transitioning && t._x_transitioning.cancel(),
            Object.keys(i).length === 0 &&
                Object.keys(n).length === 0 &&
                Object.keys(s).length === 0)
        ) {
            r(), a();
            return;
        }
        let o, l, u;
        ci(t, {
            start() {
                o = e(t, n);
            },
            during() {
                l = e(t, i);
            },
            before: r,
            end() {
                o(), (u = e(t, s));
            },
            after: a,
            cleanup() {
                l(), u();
            },
        });
    }
    function ci(t, e) {
        let i,
            n,
            s,
            r = ht(() => {
                p(() => {
                    (i = !0),
                        n || e.before(),
                        s || (e.end(), V()),
                        e.after(),
                        t.isConnected && e.cleanup(),
                        delete t._x_transitioning;
                });
            });
        (t._x_transitioning = {
            beforeCancels: [],
            beforeCancel(a) {
                this.beforeCancels.push(a);
            },
            cancel: ht(function () {
                for (; this.beforeCancels.length; )
                    this.beforeCancels.shift()();
                r();
            }),
            finish: r,
        }),
            p(() => {
                e.start(), e.during();
            }),
            ee(),
            requestAnimationFrame(() => {
                if (i) return;
                let a =
                        Number(
                            getComputedStyle(t)
                                .transitionDuration.replace(/,.*/, "")
                                .replace("s", "")
                        ) * 1e3,
                    o =
                        Number(
                            getComputedStyle(t)
                                .transitionDelay.replace(/,.*/, "")
                                .replace("s", "")
                        ) * 1e3;
                a === 0 &&
                    (a =
                        Number(
                            getComputedStyle(t).animationDuration.replace(
                                "s",
                                ""
                            )
                        ) * 1e3),
                    p(() => {
                        e.before();
                    }),
                    (n = !0),
                    requestAnimationFrame(() => {
                        i ||
                            (p(() => {
                                e.end();
                            }),
                            V(),
                            setTimeout(t._x_transitioning.finish, a + o),
                            (s = !0));
                    });
            });
    }
    function T(t, e, i) {
        if (t.indexOf(e) === -1) return i;
        let n = t[t.indexOf(e) + 1];
        if (!n || (e === "scale" && isNaN(n))) return i;
        if (e === "duration") {
            let s = n.match(/([0-9]+)ms/);
            if (s) return s[1];
        }
        return e === "origin" &&
            ["top", "right", "left", "center", "bottom"].includes(
                t[t.indexOf(e) + 2]
            )
            ? [n, t[t.indexOf(e) + 2]].join(" ")
            : n;
    }
    var pt = !1;
    function fe(t, e = () => {}) {
        return (...i) => (pt ? e(...i) : t(...i));
    }
    function he(t, e) {
        e._x_dataStack || (e._x_dataStack = t._x_dataStack),
            (pt = !0),
            fi(() => {
                _i(e);
            }),
            (pt = !1);
    }
    function _i(t) {
        let e = !1;
        $(t, (n, s) => {
            _(n, (r, a) => {
                if (e && ue(r)) return a();
                (e = !0), s(r, a);
            });
        });
    }
    function fi(t) {
        let e = h;
        G((i, n) => {
            let s = e(i);
            return m(s), () => {};
        }),
            t(),
            G(e);
    }
    function hi(t) {
        return [
            "disabled",
            "checked",
            "required",
            "readonly",
            "hidden",
            "open",
            "selected",
            "autofocus",
            "itemscope",
            "multiple",
            "novalidate",
            "allowfullscreen",
            "allowpaymentrequest",
            "formnovalidate",
            "autoplay",
            "controls",
            "loop",
            "muted",
            "playsinline",
            "default",
            "ismap",
            "reversed",
            "async",
            "defer",
            "nomodule",
        ].includes(t);
    }
    function pe(t, e, i) {
        if (t._x_bindings && t._x_bindings[e] !== void 0)
            return t._x_bindings[e];
        let n = t.getAttribute(e);
        return n === null
            ? typeof i == "function"
                ? i()
                : i
            : n === ""
            ? !0
            : hi(e)
            ? !![e, "true"].includes(n)
            : n;
    }
    function be(t, e) {
        var i;
        return function () {
            var n = this,
                s = arguments,
                r = function () {
                    (i = null), t.apply(n, s);
                };
            clearTimeout(i), (i = setTimeout(r, e));
        };
    }
    function xe(t, e) {
        let i;
        return function () {
            let n = this,
                s = arguments;
            i || (t.apply(n, s), (i = !0), setTimeout(() => (i = !1), e));
        };
    }
    function me(t) {
        t(b);
    }
    var O = {},
        ye = !1;
    function ve(t, e) {
        if ((ye || ((O = x(O)), (ye = !0)), e === void 0)) return O[t];
        (O[t] = e),
            typeof e == "object" &&
                e !== null &&
                e.hasOwnProperty("init") &&
                typeof e.init == "function" &&
                O[t].init(),
            Lt(O[t]);
    }
    var pi = {};
    function ge(t, e) {
        let i = typeof e != "function" ? () => e : e;
        t instanceof Element ? bi(t, i()) : (pi[t] = i);
    }
    function bi(t, e, i) {
        let n = [];
        for (; n.length; ) n.pop()();
        let s = Object.entries(e).map(([a, o]) => ({ name: a, value: o })),
            r = ot(s);
        (s = s.map((a) =>
            r.find((o) => o.name === a.name)
                ? { name: `x-bind:${a.name}`, value: `"${a.value}"` }
                : a
        )),
            K(t, s, i).map((a) => {
                n.push(a.runCleanups), a();
            });
    }
    var xi = {};
    function $e(t, e) {
        xi[t] = e;
    }
    var mi = {
            get reactive() {
                return x;
            },
            get release() {
                return m;
            },
            get effect() {
                return h;
            },
            get raw() {
                return z;
            },
            version: "3.10.5",
            flushAndStopDeferringMutations: Pt,
            dontAutoEvaluateFunctions: At,
            disableEffectScheduling: Et,
            setReactivityEngine: Ot,
            closestDataStack: c,
            skipDuringClone: fe,
            addRootSelector: oe,
            addInitSelector: le,
            addScopeToNode: Bt,
            deferMutations: Nt,
            mapAttributes: Xt,
            evaluateLater: g,
            setEvaluator: qt,
            mergeProxies: y,
            findClosest: A,
            closestRoot: _t,
            interceptor: I,
            transition: q,
            setStyles: E,
            mutateDom: p,
            directive: M,
            throttle: xe,
            debounce: be,
            evaluate: D,
            initTree: $,
            nextTick: te,
            prefixed: Wt,
            prefix: Ht,
            plugin: me,
            magic: Ft,
            store: ve,
            start: se,
            clone: he,
            bound: pe,
            $data: It,
            data: $e,
            bind: ge,
        },
        b = mi;
    function Ee(t, e) {
        return {
            searchableText: {},
            disabledKeys: [],
            activeKey: null,
            selectedKeys: [],
            orderedKeys: [],
            elsByKey: {},
            values: {},
            initItem(i, n, s) {
                let r = (Math.random() + 1).toString(36).substring(7);
                return (
                    (this.values[r] = n),
                    (this.elsByKey[r] = i),
                    this.orderedKeys.push(r),
                    (this.searchableText[r] = i.textContent
                        .trim()
                        .toLowerCase()),
                    s && this.disabledKeys.push(r),
                    r
                );
            },
            destroyItem(i) {
                let n = w(this.elsByKey, i);
                delete this.values[n],
                    delete this.elsByKey[n],
                    delete this.orderedKeys[this.orderedKeys.indexOf(n)],
                    delete this.searchableText[n],
                    delete this.disabledKeys[n],
                    this.reorderKeys();
            },
            reorderKeys() {
                this.orderedKeys.forEach((i) => {
                    let n = this.elsByKey[i];
                    n.isConnected || this.destroyItem(n);
                }),
                    (this.orderedKeys = this.orderedKeys
                        .slice()
                        .sort((i, n) => {
                            if (i === null || n === null) return 0;
                            let s = this.elsByKey[i],
                                r = this.elsByKey[n],
                                a = s.compareDocumentPosition(r);
                            return a & Node.DOCUMENT_POSITION_FOLLOWING
                                ? -1
                                : a & Node.DOCUMENT_POSITION_PRECEDING
                                ? 1
                                : 0;
                        }));
            },
            activeEl() {
                if (!!this.activeKey) return this.elsByKey[this.activeKey];
            },
            isActiveEl(i) {
                let n = w(this.elsByKey, i);
                if (!!n) return this.activeKey === n;
            },
            activateEl(i) {
                let n = w(this.elsByKey, i);
                !n || this.activateKey(n);
            },
            selectEl(i) {
                let n = w(this.elsByKey, i);
                !n || this.selectKey(n);
            },
            isSelectedEl(i) {
                let n = w(this.elsByKey, i);
                if (!!n) return this.isSelected(n);
            },
            isDisabledEl(i) {
                let n = w(this.elsByKey, i);
                if (!!n) return this.isDisabled(n);
            },
            get isScrollingTo() {
                return this.scrollingCount > 0;
            },
            scrollingCount: 0,
            activateAndScrollToKey(i) {
                this.scrollingCount++,
                    this.activateKey(i),
                    this.elsByKey[i].scrollIntoView({ block: "nearest" }),
                    setTimeout(() => {
                        this.scrollingCount--;
                    }, 25);
            },
            selectedValueOrValues() {
                return t ? this.selectedValues() : this.selectedValue();
            },
            selectedValues() {
                return this.selectedKeys.map((i) => this.values[i]);
            },
            selectedValue() {
                return this.selectedKeys[0]
                    ? this.values[this.selectedKeys[0]]
                    : null;
            },
            selectValue(i, n) {
                if (
                    (i || (i = t ? [] : null),
                    n || (n = (s, r) => s === r),
                    typeof n == "string")
                ) {
                    let s = n;
                    n = (r, a) => r[s] === a[s];
                }
                if (t) {
                    let s = [];
                    i.forEach((r) => {
                        for (let a in this.values)
                            n(this.values[a], r) &&
                                (s.includes(a) || s.push(a));
                    }),
                        this.selectExclusive(s);
                } else
                    for (let s in this.values)
                        i && n(this.values[s], i) && this.selectKey(s);
            },
            isDisabled(i) {
                return this.disabledKeys.includes(i);
            },
            get nonDisabledOrderedKeys() {
                return this.orderedKeys.filter((i) => !this.isDisabled(i));
            },
            selectKey(i) {
                this.isDisabled(i) ||
                    (t ? this.toggleSelected(i) : this.selectOnly(i));
            },
            toggleSelected(i) {
                this.selectedKeys.includes(i)
                    ? this.selectedKeys.splice(this.selectedKeys.indexOf(i), 1)
                    : this.selectedKeys.push(i);
            },
            selectOnly(i) {
                (this.selectedKeys = []), this.selectedKeys.push(i);
            },
            selectExclusive(i) {
                let n = [...i];
                for (let s = 0; s < this.selectedKeys.length; s++) {
                    if (i.includes(this.selectedKeys[s])) {
                        delete n[n.indexOf(this.selectedKeys[s])];
                        continue;
                    }
                    i.includes(this.selectedKeys[s]) ||
                        delete this.selectedKeys[s];
                }
                n.forEach((s) => {
                    this.selectedKeys.push(s);
                });
            },
            selectActive(i) {
                !this.activeKey || this.selectKey(this.activeKey);
            },
            isSelected(i) {
                return this.selectedKeys.includes(i);
            },
            firstSelectedKey() {
                return this.selectedKeys[0];
            },
            hasActive() {
                return !!this.activeKey;
            },
            isActiveKey(i) {
                return this.activeKey === i;
            },
            get active() {
                return this.hasActive() && this.values[this.activeKey];
            },
            activateSelectedOrFirst() {
                let i = this.firstSelectedKey();
                if (i) return this.activateKey(i);
                let n = this.firstKey();
                n && this.activateKey(n);
            },
            activateKey(i) {
                this.isDisabled(i) || (this.activeKey = i);
            },
            deactivate() {
                !this.activeKey ||
                    this.isScrollingTo ||
                    (this.activeKey = null);
            },
            nextKey() {
                if (!this.activeKey) return;
                let i = this.nonDisabledOrderedKeys.findIndex(
                    (n) => n === this.activeKey
                );
                return this.nonDisabledOrderedKeys[i + 1];
            },
            prevKey() {
                if (!this.activeKey) return;
                let i = this.nonDisabledOrderedKeys.findIndex(
                    (n) => n === this.activeKey
                );
                return this.nonDisabledOrderedKeys[i - 1];
            },
            firstKey() {
                return this.nonDisabledOrderedKeys[0];
            },
            lastKey() {
                return this.nonDisabledOrderedKeys[
                    this.nonDisabledOrderedKeys.length - 1
                ];
            },
            searchQuery: "",
            clearSearch: b.debounce(function () {
                this.searchQuery = "";
            }, 350),
            searchKey(i) {
                this.clearSearch(), (this.searchQuery += i);
                let n;
                for (let s in this.searchableText)
                    if (this.searchableText[s].startsWith(this.searchQuery)) {
                        n = s;
                        break;
                    }
                if (!!this.nonDisabledOrderedKeys.includes(n)) return n;
            },
            activateByKeyEvent(i) {
                this.reorderKeys();
                let n = this.hasActive(),
                    s;
                switch (i.key) {
                    case "Tab":
                    case "Backspace":
                    case "Delete":
                    case "Meta":
                        break;
                    case ["ArrowDown", "ArrowRight"][e === "vertical" ? 0 : 1]:
                        i.preventDefault(),
                            i.stopPropagation(),
                            (s = n ? this.nextKey() : this.firstKey());
                        break;
                    case ["ArrowUp", "ArrowLeft"][e === "vertical" ? 0 : 1]:
                        i.preventDefault(),
                            i.stopPropagation(),
                            (s = n ? this.prevKey() : this.lastKey());
                        break;
                    case "Home":
                    case "PageUp":
                        i.preventDefault(),
                            i.stopPropagation(),
                            (s = this.firstKey());
                        break;
                    case "End":
                    case "PageDown":
                        i.preventDefault(),
                            i.stopPropagation(),
                            (s = this.lastKey());
                        break;
                    default:
                        i.key.length === 1 && (s = this.searchKey(i.key));
                        break;
                }
                s && this.activateAndScrollToKey(s);
            },
        };
    }
    function w(t, e) {
        return Object.keys(t).find((i) => t[i] === e);
    }
    function we(t, e, i) {
        let n = Oe(e, i);
        n.forEach((a) => (a._x_hiddenInput = !0)),
            n.forEach((a) => (a._x_ignore = !0));
        let s = t.children,
            r = [];
        for (let a = 0; a < s.length; a++) {
            let o = s[a];
            if (o._x_hiddenInput) r.push(o);
            else break;
        }
        b.mutateDom(() => {
            r.forEach((a) => a.remove()),
                n.reverse().forEach((a) => t.prepend(a));
        });
    }
    function Oe(t, e, i = []) {
        if (yi(e)) for (let n in e) i = i.concat(Oe(`${t}[${n}]`, e[n]));
        else {
            let n = document.createElement("input");
            return (
                n.setAttribute("type", "hidden"),
                n.setAttribute("name", t),
                n.setAttribute("value", "" + e),
                [n]
            );
        }
        return i;
    }
    function yi(t) {
        return typeof t == "object" && t !== null;
    }
    function Se(t) {
        t.directive("listbox", (e, i) => {
            i.value
                ? i.value === "label"
                    ? gi(e, t)
                    : i.value === "button"
                    ? $i(e, t)
                    : i.value === "options"
                    ? Ei(e, t)
                    : i.value === "option" && Oi(e, t)
                : vi(e, t);
        }),
            t.magic("listbox", (e) => {
                let i = t.$data(e);
                return i.__ready
                    ? {
                          get isOpen() {
                              return i.__isOpen;
                          },
                          get isDisabled() {
                              return i.__isDisabled;
                          },
                          get selected() {
                              return i.__value;
                          },
                          get active() {
                              return i.__context.active;
                          },
                      }
                    : {
                          isDisabled: !1,
                          isOpen: !1,
                          selected: null,
                          active: null,
                      };
            }),
            t.magic("listboxOption", (e) => {
                let i = t.$data(e),
                    n = { isDisabled: !1, isSelected: !1, isActive: !1 };
                if (!i.__ready) return n;
                let s = t.findClosest(e, (a) => a.__optionKey);
                if (!s) return n;
                let r = i.__context;
                return {
                    get isActive() {
                        return r.isActiveEl(s);
                    },
                    get isSelected() {
                        return r.isSelectedEl(s);
                    },
                    get isDisabled() {
                        return r.isDisabledEl(s);
                    },
                };
            });
    }
    function vi(t, e) {
        e.bind(t, {
            "x-id"() {
                return [
                    "alpine-listbox-button",
                    "alpine-listbox-options",
                    "alpine-listbox-label",
                ];
            },
            "x-modelable": "__value",
            "x-data"() {
                return {
                    __ready: !1,
                    __value: null,
                    __isOpen: !1,
                    __context: void 0,
                    __isMultiple: void 0,
                    __isStatic: !1,
                    __isDisabled: void 0,
                    __compareBy: null,
                    __inputName: null,
                    __orientation: "vertical",
                    init() {
                        (this.__isMultiple = e.bound(t, "multiple", !1)),
                            (this.__isDisabled = e.bound(t, "disabled", !1)),
                            (this.__inputName = e.bound(t, "name", null)),
                            (this.__compareBy = e.bound(t, "by")),
                            (this.__orientation = e.bound(t, "horizontal", !1)
                                ? "horizontal"
                                : "vertical"),
                            (this.__context = Ee(
                                this.__isMultiple,
                                this.__orientation
                            ));
                        let i = e.bound(t, "default-value", null);
                        (this.__value = i),
                            queueMicrotask(() => {
                                (this.__ready = !0),
                                    queueMicrotask(() => {
                                        let n = !1;
                                        e.effect(() => {
                                            this.__context.selectedKeys,
                                                n === !1 ||
                                                n !==
                                                    JSON.stringify(this.__value)
                                                    ? this.__context.selectValue(
                                                          this.__value,
                                                          this.__compareBy
                                                      )
                                                    : (this.__value =
                                                          this.__context.selectedValueOrValues()),
                                                (n = JSON.stringify(
                                                    this.__value
                                                )),
                                                this.__inputName &&
                                                    we(
                                                        this.$el,
                                                        this.__inputName,
                                                        this.__value
                                                    );
                                        });
                                    });
                            });
                    },
                    __open() {
                        (this.__isOpen = !0),
                            this.__context.activateSelectedOrFirst(),
                            ((n) =>
                                requestAnimationFrame(() =>
                                    requestAnimationFrame(n)
                                ))(() =>
                                this.$refs.__options.focus({
                                    preventScroll: !0,
                                })
                            );
                    },
                    __close() {
                        (this.__isOpen = !1),
                            this.$nextTick(() =>
                                this.$refs.__button.focus({ preventScroll: !0 })
                            );
                    },
                };
            },
        });
    }
    function gi(t, e) {
        e.bind(t, {
            "x-ref": "__label",
            ":id"() {
                return this.$id("alpine-listbox-label");
            },
            "@click"() {
                this.$refs.__button.focus({ preventScroll: !0 });
            },
        });
    }
    function $i(t, e) {
        e.bind(t, {
            "x-ref": "__button",
            ":id"() {
                return this.$id("alpine-listbox-button");
            },
            "aria-haspopup": "true",
            ":aria-labelledby"() {
                return this.$id("alpine-listbox-label");
            },
            ":aria-expanded"() {
                return this.$data.__isOpen;
            },
            ":aria-controls"() {
                return (
                    this.$data.__isOpen && this.$id("alpine-listbox-options")
                );
            },
            "x-init"() {
                this.$el.tagName.toLowerCase() === "button" &&
                    !this.$el.hasAttribute("type") &&
                    (this.$el.type = "button");
            },
            "@click"() {
                this.$data.__open();
            },
            "@keydown"(i) {
                ["ArrowDown", "ArrowUp", "ArrowLeft", "ArrowRight"].includes(
                    i.key
                ) &&
                    (i.stopPropagation(),
                    i.preventDefault(),
                    this.$data.__open());
            },
            "@keydown.space.stop.prevent"() {
                this.$data.__open();
            },
            "@keydown.enter.stop.prevent"() {
                this.$data.__open();
            },
        });
    }
    function Ei(t, e) {
        e.bind(t, {
            "x-ref": "__options",
            ":id"() {
                return this.$id("alpine-listbox-options");
            },
            "x-init"() {
                this.$data.__isStatic = e.bound(this.$el, "static", !1);
            },
            "x-show"() {
                return this.$data.__isStatic ? !0 : this.$data.__isOpen;
            },
            "@click.outside"() {
                this.$data.__close();
            },
            "@keydown.escape.stop.prevent"() {
                this.$data.__close();
            },
            tabindex: "0",
            role: "listbox",
            ":aria-orientation"() {
                return this.$data.__orientation;
            },
            ":aria-labelledby"() {
                return this.$id("alpine-listbox-button");
            },
            ":aria-activedescendant"() {
                return (
                    this.__context.activeEl() && this.__context.activeEl().id
                );
            },
            "@focus"() {
                this.__context.activateSelectedOrFirst();
            },
            "x-trap"() {
                return this.$data.__isOpen;
            },
            "@keydown"(i) {
                this.__context.activateByKeyEvent(i);
            },
            "@keydown.enter.stop.prevent"() {
                this.__context.selectActive(),
                    this.$data.__isMultiple || this.$data.__close();
            },
            "@keydown.space.stop.prevent"() {
                this.__context.selectActive(),
                    this.$data.__isMultiple || this.$data.__close();
            },
        });
    }
    function Oi(t, e) {
        e.bind(t, () => ({
            ":id"() {
                return this.$id("alpine-listbox-option");
            },
            ":tabindex"() {
                return this.$listbox.isDisabled ? !1 : "-1";
            },
            role: "option",
            "x-init"() {
                queueMicrotask(() => {
                    let i = e.bound(t, "value"),
                        n = e.bound(t, "disabled");
                    t.__optionKey = this.$data.__context.initItem(t, i, n);
                });
            },
            ":aria-selected"() {
                return this.$listboxOption.isSelected;
            },
            "@click"() {
                this.$listboxOption.isDisabled ||
                    (this.$data.__context.selectEl(t),
                    this.$data.__isMultiple || this.$data.__close());
            },
            "@mousemove"() {
                this.$data.__context.activateEl(t);
            },
            "@mouseleave"() {
                this.$data.__context.deactivate();
            },
        }));
    }
    function ke(t) {
        t.directive("popover", (e, i) => {
            i.value
                ? i.value === "overlay"
                    ? Ki(e, t)
                    : i.value === "button"
                    ? Si(e, t)
                    : i.value === "panel"
                    ? ki(e, t)
                    : i.value === "group" && Di(e, t)
                : wi(e, t);
        }),
            t.magic("popover", (e) => {
                let i = t.$data(e);
                return {
                    get isOpen() {
                        return i.__isOpenState;
                    },
                    open() {
                        i.__open();
                    },
                    close() {
                        i.__close();
                    },
                };
            });
    }
    function wi(t, e) {
        e.bind(t, {
            "x-id"() {
                return ["alpine-popover-button", "alpine-popover-panel"];
            },
            "x-modelable": "__isOpenState",
            "x-data"() {
                return {
                    init() {
                        this.$data.__groupEl &&
                            this.$data.__groupEl.addEventListener(
                                "__close-others",
                                ({ detail: i }) => {
                                    i.el.isSameNode(this.$el) ||
                                        this.__close(!1);
                                }
                            );
                    },
                    __buttonEl: void 0,
                    __panelEl: void 0,
                    __isStatic: !1,
                    get __isOpen() {
                        return this.__isStatic ? !0 : this.__isOpenState;
                    },
                    __isOpenState: !1,
                    __open() {
                        (this.__isOpenState = !0),
                            this.$dispatch("__close-others", { el: this.$el });
                    },
                    __toggle() {
                        this.__isOpenState ? this.__close() : this.__open();
                    },
                    __close(i) {
                        this.__isStatic ||
                            ((this.__isOpenState = !1),
                            i !== !1 &&
                                ((i = i || this.$data.__buttonEl),
                                !document.activeElement.isSameNode(i) &&
                                    setTimeout(() => i.focus())));
                    },
                    __contains(i, n) {
                        return !!e.findClosest(n, (s) => s.isSameNode(i));
                    },
                };
            },
            "@keydown.escape.stop.prevent"() {
                this.__close();
            },
            "@focusin.window"() {
                if (this.$data.__groupEl) {
                    this.$data.__contains(
                        this.$data.__groupEl,
                        document.activeElement
                    ) || this.$data.__close(!1);
                    return;
                }
                this.$data.__contains(this.$el, document.activeElement) ||
                    this.$data.__close(!1);
            },
        });
    }
    function Si(t, e) {
        e.bind(t, {
            "x-ref": "button",
            ":id"() {
                return this.$id("alpine-popover-button");
            },
            ":aria-expanded"() {
                return this.$data.__isOpen;
            },
            ":aria-controls"() {
                return this.$data.__isOpen && this.$id("alpine-popover-panel");
            },
            "x-init"() {
                this.$el.tagName.toLowerCase() === "button" &&
                    !this.$el.hasAttribute("type") &&
                    (this.$el.type = "button"),
                    (this.$data.__buttonEl = this.$el);
            },
            "@click"() {
                this.$data.__toggle();
            },
            "@keydown.tab"(i) {
                if (!i.shiftKey && this.$data.__isOpen) {
                    let n = this.$focus.within(this.$data.__panelEl).getFirst();
                    n &&
                        (i.preventDefault(),
                        i.stopPropagation(),
                        this.$focus.focus(n));
                }
            },
            "@keyup.tab"(i) {
                if (this.$data.__isOpen) {
                    let n = this.$focus.previouslyFocused();
                    if (!n) return;
                    !this.$data.__buttonEl.contains(n) &&
                        !this.$data.__panelEl.contains(n) &&
                        n &&
                        this.$el.compareDocumentPosition(n) &
                            Node.DOCUMENT_POSITION_FOLLOWING &&
                        (i.preventDefault(),
                        i.stopPropagation(),
                        this.$focus.within(this.$data.__panelEl).last());
                }
            },
            "@keydown.space.stop.prevent"() {
                this.$data.__toggle();
            },
            "@keydown.enter.stop.prevent"() {
                this.$data.__toggle();
            },
            "@keyup.space.stop.prevent"() {},
        });
    }
    function ki(t, e) {
        e.bind(t, {
            "x-init"() {
                (this.$data.__isStatic = e.bound(this.$el, "static", !1)),
                    (this.$data.__panelEl = this.$el);
            },
            "x-effect"() {
                this.$data.__isOpen &&
                    e.bound(t, "focus") &&
                    this.$focus.first();
            },
            "x-ref": "panel",
            ":id"() {
                return this.$id("alpine-popover-panel");
            },
            "x-show"() {
                return this.$data.__isOpen;
            },
            "@mousedown.window"(i) {
                !this.$data.__isOpen ||
                    this.$data.__contains(this.$data.__buttonEl, i.target) ||
                    this.$data.__contains(this.$el, i.target) ||
                    this.$focus.focusable(i.target) ||
                    this.$data.__close();
            },
            "@keydown.tab"(i) {
                if (i.shiftKey && this.$focus.isFirst(i.target))
                    i.preventDefault(),
                        i.stopPropagation(),
                        e.bound(t, "focus")
                            ? this.$data.__close()
                            : this.$data.__buttonEl.focus();
                else if (!i.shiftKey && this.$focus.isLast(i.target)) {
                    i.preventDefault(), i.stopPropagation();
                    let n = this.$focus.within(document).all(),
                        s = n.indexOf(this.$data.__buttonEl);
                    n
                        .splice(s + 1)
                        .filter((a) => !this.$el.contains(a))[0]
                        .focus(),
                        e.bound(t, "focus") && this.$data.__close(!1);
                }
            },
        });
    }
    function Di(t, e) {
        e.bind(t, {
            "x-ref": "container",
            "x-data"() {
                return { __groupEl: this.$el };
            },
        });
    }
    function Ki(t, e) {
        e.bind(t, {
            "x-show"() {
                return this.$data.__isOpen;
            },
        });
    }
    function De(t) {
        t.directive("menu", (e, i) => {
            i.value
                ? i.value === "items"
                    ? Ni(e, t)
                    : i.value === "item"
                    ? Pi(e, t)
                    : i.value === "button" && Ti(e, t)
                : Ci(e, t);
        }),
            t.magic("menuItem", (e) => {
                let i = t.$data(e);
                return {
                    get isActive() {
                        return i.__activeEl == i.__itemEl;
                    },
                    get isDisabled() {
                        return e.__isDisabled.value;
                    },
                };
            });
    }
    function Ci(t, e) {
        e.bind(t, {
            "x-id"() {
                return ["alpine-menu-button", "alpine-menu-items"];
            },
            "x-modelable": "__isOpen",
            "x-data"() {
                return {
                    __itemEls: [],
                    __activeEl: null,
                    __isOpen: !1,
                    __open() {
                        (this.__isOpen = !0),
                            ((n) =>
                                requestAnimationFrame(() =>
                                    requestAnimationFrame(n)
                                ))(() =>
                                this.$refs.__items.focus({ preventScroll: !0 })
                            );
                    },
                    __close(i = !0) {
                        (this.__isOpen = !1),
                            i &&
                                this.$nextTick(() =>
                                    this.$refs.__button.focus({
                                        preventScroll: !0,
                                    })
                                );
                    },
                    __contains(i, n) {
                        return !!e.findClosest(n, (s) => s.isSameNode(i));
                    },
                };
            },
            "@focusin.window"() {
                this.$data.__contains(this.$el, document.activeElement) ||
                    this.$data.__close(!1);
            },
        });
    }
    function Ti(t, e) {
        e.bind(t, {
            "x-ref": "__button",
            "aria-haspopup": "true",
            ":aria-labelledby"() {
                return this.$id("alpine-menu-label");
            },
            ":id"() {
                return this.$id("alpine-menu-button");
            },
            ":aria-expanded"() {
                return this.$data.__isOpen;
            },
            ":aria-controls"() {
                return this.$data.__isOpen && this.$id("alpine-menu-items");
            },
            "x-init"() {
                this.$el.tagName.toLowerCase() === "button" &&
                    !this.$el.hasAttribute("type") &&
                    (this.$el.type = "button");
            },
            "@click"() {
                this.$data.__open();
            },
            "@keydown.down.stop.prevent"() {
                this.$data.__open();
            },
            "@keydown.up.stop.prevent"() {
                this.$data.__open(d.Alpine, last);
            },
            "@keydown.space.stop.prevent"() {
                this.$data.__open();
            },
            "@keydown.enter.stop.prevent"() {
                this.$data.__open();
            },
        });
    }
    function Ni(t, e) {
        e.bind(t, {
            "x-ref": "__items",
            "aria-orientation": "vertical",
            role: "menu",
            ":id"() {
                return this.$id("alpine-menu-items");
            },
            ":aria-labelledby"() {
                return this.$id("alpine-menu-button");
            },
            ":aria-activedescendant"() {
                return this.$data.__activeEl && this.$data.__activeEl.id;
            },
            "x-show"() {
                return this.$data.__isOpen;
            },
            tabindex: "0",
            "@click.outside"() {
                this.$data.__close();
            },
            "@keydown"(i) {
                d.search(e, this.$refs.__items, i.key, (n) => n.__activate());
            },
            "@keydown.down.stop.prevent"() {
                this.$data.__activeEl
                    ? d.next(e, this.$data.__activeEl, (i) => i.__activate())
                    : d.first(e, this.$refs.__items, (i) => i.__activate());
            },
            "@keydown.up.stop.prevent"() {
                this.$data.__activeEl
                    ? d.previous(e, this.$data.__activeEl, (i) =>
                          i.__activate()
                      )
                    : d.last(e, this.$refs.__items, (i) => i.__activate());
            },
            "@keydown.home.stop.prevent"() {
                d.first(e, this.$refs.__items, (i) => i.__activate());
            },
            "@keydown.end.stop.prevent"() {
                d.last(e, this.$refs.__items, (i) => i.__activate());
            },
            "@keydown.page-up.stop.prevent"() {
                d.first(e, this.$refs.__items, (i) => i.__activate());
            },
            "@keydown.page-down.stop.prevent"() {
                d.last(e, this.$refs.__items, (i) => i.__activate());
            },
            "@keydown.escape.stop.prevent"() {
                this.$data.__close();
            },
            "@keydown.space.stop.prevent"() {
                this.$data.__activeEl && this.$data.__activeEl.click();
            },
            "@keydown.enter.stop.prevent"() {
                this.$data.__activeEl && this.$data.__activeEl.click();
            },
            "@keyup.space.prevent"() {},
        });
    }
    function Pi(t, e) {
        e.bind(t, () => ({
            "x-data"() {
                return {
                    __itemEl: this.$el,
                    init() {
                        let i = e.raw(this.$data.__itemEls),
                            n = !1;
                        for (let s = 0; s < i.length; s++)
                            if (
                                i[s].compareDocumentPosition(this.$el) &
                                Node.DOCUMENT_POSITION_PRECEDING
                            ) {
                                i.splice(s, 0, this.$el), (n = !0);
                                break;
                            }
                        n || i.push(this.$el),
                            (this.$el.__activate = () => {
                                (this.$data.__activeEl = this.$el),
                                    this.$el.scrollIntoView({
                                        block: "nearest",
                                    });
                            }),
                            (this.$el.__deactivate = () => {
                                this.$data.__activeEl = null;
                            }),
                            (this.$el.__isDisabled = e.reactive({ value: !1 })),
                            queueMicrotask(() => {
                                this.$el.__isDisabled.value = e.bound(
                                    this.$el,
                                    "disabled",
                                    !1
                                );
                            });
                    },
                    destroy() {
                        let i = this.$data.__itemEls;
                        i.splice(i.indexOf(this.$el), 1);
                    },
                };
            },
            "x-id"() {
                return ["alpine-menu-item"];
            },
            ":id"() {
                return this.$id("alpine-menu-item");
            },
            ":tabindex"() {
                return this.$el.__isDisabled.value ? !1 : "-1";
            },
            role: "menuitem",
            "@mousemove"() {
                this.$el.__isDisabled.value ||
                    this.$menuItem.isActive ||
                    this.$el.__activate();
            },
            "@mouseleave"() {
                this.$el.__isDisabled.value ||
                    !this.$menuItem.isActive ||
                    this.$el.__deactivate();
            },
        }));
    }
    var d = {
        first(t, e, i = (s) => s, n = () => {}) {
            let s = t.$data(e).__itemEls[0];
            return s
                ? s.tagName.toLowerCase() === "template"
                    ? this.next(t, s, i)
                    : s.__isDisabled.value
                    ? this.next(t, s, i)
                    : i(s)
                : n();
        },
        last(t, e, i = (s) => s, n = () => {}) {
            let s = t.$data(e).__itemEls.slice(-1)[0];
            return s
                ? s.__isDisabled.value
                    ? this.previous(t, s, i)
                    : i(s)
                : n();
        },
        next(t, e, i = (s) => s, n = () => {}) {
            if (!e) return n();
            let s = t.$data(e).__itemEls,
                r = s[s.indexOf(e) + 1];
            return r
                ? r.__isDisabled.value || r.tagName.toLowerCase() === "template"
                    ? this.next(t, r, i, n)
                    : i(r)
                : n();
        },
        previous(t, e, i = (s) => s, n = () => {}) {
            if (!e) return n();
            let s = t.$data(e).__itemEls,
                r = s[s.indexOf(e) - 1];
            return r
                ? r.__isDisabled.value || r.tagName.toLowerCase() === "template"
                    ? this.previous(t, r, i, n)
                    : i(r)
                : n();
        },
        searchQuery: "",
        debouncedClearSearch: void 0,
        clearSearch(t) {
            this.debouncedClearSearch ||
                (this.debouncedClearSearch = t.debounce(function () {
                    this.searchQuery = "";
                }, 350)),
                this.debouncedClearSearch();
        },
        search(t, e, i, n) {
            if (i.length > 1) return;
            this.searchQuery += i;
            let r = t
                .raw(t.$data(e).__itemEls)
                .find((a) =>
                    a.textContent
                        .trim()
                        .toLowerCase()
                        .startsWith(this.searchQuery)
                );
            r && !r.__isDisabled.value && n(r), this.clearSearch(t);
        },
    };
    function Ke(t) {
        t.directive("switch", (e, i) => {
            i.value === "group"
                ? Ii(e, t)
                : i.value === "label"
                ? Li(e, t)
                : i.value === "description"
                ? Mi(e, t)
                : Bi(e, t);
        }),
            t.magic("switch", (e) => {
                let i = t.$data(e);
                return {
                    get isChecked() {
                        return i.__value === !0;
                    },
                };
            });
    }
    function Ii(t, e) {
        e.bind(t, {
            "x-id"() {
                return ["alpine-switch-label", "alpine-switch-description"];
            },
            "x-data"() {
                return {
                    __hasLabel: !1,
                    __hasDescription: !1,
                    __switchEl: void 0,
                };
            },
        });
    }
    function Bi(t, e) {
        e.bind(t, {
            "x-modelable": "__value",
            "x-data"() {
                return {
                    init() {
                        queueMicrotask(() => {
                            (this.__value = e.bound(
                                this.$el,
                                "default-checked",
                                !1
                            )),
                                (this.__inputName = e.bound(
                                    this.$el,
                                    "name",
                                    !1
                                )),
                                (this.__inputValue = e.bound(
                                    this.$el,
                                    "value",
                                    "on"
                                )),
                                (this.__inputId =
                                    "alpine-switch-" + Date.now());
                        });
                    },
                    __value: void 0,
                    __inputName: void 0,
                    __inputValue: void 0,
                    __inputId: void 0,
                    __toggle() {
                        this.__value = !this.__value;
                    },
                };
            },
            "x-effect"() {
                let i = this.__value;
                if (!this.__inputName) return;
                let n = this.$el.nextElementSibling;
                if (
                    (n && String(n.id) === String(this.__inputId) && n.remove(),
                    i)
                ) {
                    let s = document.createElement("input");
                    (s.type = "hidden"),
                        (s.value = this.__inputValue),
                        (s.name = this.__inputName),
                        (s.id = this.__inputId),
                        this.$el.after(s);
                }
            },
            "x-init"() {
                this.$el.tagName.toLowerCase() === "button" &&
                    !this.$el.hasAttribute("type") &&
                    (this.$el.type = "button"),
                    (this.$data.__switchEl = this.$el);
            },
            role: "switch",
            tabindex: "0",
            ":aria-checked"() {
                return !!this.__value;
            },
            ":aria-labelledby"() {
                return this.$data.__hasLabel && this.$id("alpine-switch-label");
            },
            ":aria-describedby"() {
                return (
                    this.$data.__hasDescription &&
                    this.$id("alpine-switch-description")
                );
            },
            "@click.prevent"() {
                this.__toggle();
            },
            "@keyup"(i) {
                i.key !== "Tab" && i.preventDefault(),
                    i.key === " " && this.__toggle();
            },
            "@keypress.prevent"() {},
        });
    }
    function Li(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__hasLabel = !0;
            },
            ":id"() {
                return this.$id("alpine-switch-label");
            },
            "@click"() {
                this.$data.__switchEl.click(),
                    this.$data.__switchEl.focus({ preventScroll: !0 });
            },
        });
    }
    function Mi(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__hasDescription = !0;
            },
            ":id"() {
                return this.$id("alpine-switch-description");
            },
        });
    }
    function Ce(t) {
        t.directive("radio", (e, i) => {
            i.value
                ? i.value === "option"
                    ? Ri(e, t)
                    : i.value === "label"
                    ? Vi(e, t)
                    : i.value === "description" && Ai(e, t)
                : Fi(e, t);
        }),
            t.magic("radioOption", (e) => {
                let i = t.$data(e);
                return {
                    get isActive() {
                        return i.__option === i.__active;
                    },
                    get isChecked() {
                        return i.__option === i.__value;
                    },
                    get isDisabled() {
                        let n = i.__disabled;
                        return i.__rootDisabled ? !0 : n;
                    },
                };
            });
    }
    function Fi(t, e) {
        e.bind(t, {
            "x-modelable": "__value",
            "x-data"() {
                return {
                    init() {
                        queueMicrotask(() => {
                            (this.__rootDisabled = e.bound(t, "disabled", !1)),
                                (this.__value = e.bound(
                                    this.$el,
                                    "default-value",
                                    !1
                                )),
                                (this.__inputName = e.bound(
                                    this.$el,
                                    "name",
                                    !1
                                )),
                                (this.__inputId = "alpine-radio-" + Date.now());
                        }),
                            this.$nextTick(() => {
                                let i = document.createTreeWalker(
                                    this.$el,
                                    NodeFilter.SHOW_ELEMENT,
                                    {
                                        acceptNode: (n) =>
                                            n.getAttribute("role") === "radio"
                                                ? NodeFilter.FILTER_REJECT
                                                : n.hasAttribute("role")
                                                ? NodeFilter.FILTER_SKIP
                                                : NodeFilter.FILTER_ACCEPT,
                                    },
                                    !1
                                );
                                for (; i.nextNode(); )
                                    i.currentNode.setAttribute("role", "none");
                            });
                    },
                    __value: void 0,
                    __active: void 0,
                    __rootEl: this.$el,
                    __optionValues: [],
                    __disabledOptions: new Set(),
                    __optionElsByValue: new Map(),
                    __hasLabel: !1,
                    __hasDescription: !1,
                    __rootDisabled: !1,
                    __inputName: void 0,
                    __inputId: void 0,
                    __change(i) {
                        this.__rootDisabled || (this.__value = i);
                    },
                    __addOption(i, n, s) {
                        let r = e.raw(this.__optionValues),
                            a = r.map((l) => this.__optionElsByValue.get(l)),
                            o = !1;
                        for (let l = 0; l < a.length; l++)
                            if (
                                a[l].compareDocumentPosition(n) &
                                Node.DOCUMENT_POSITION_PRECEDING
                            ) {
                                r.splice(l, 0, i),
                                    this.__optionElsByValue.set(i, n),
                                    (o = !0);
                                break;
                            }
                        o || (r.push(i), this.__optionElsByValue.set(i, n)),
                            s && this.__disabledOptions.add(i);
                    },
                    __isFirstOption(i) {
                        return this.__optionValues.indexOf(i) === 0;
                    },
                    __setActive(i) {
                        this.__active = i;
                    },
                    __focusOptionNext() {
                        let i = this.__active,
                            n = this.__optionValues.filter(
                                (r) => !this.__disabledOptions.has(r)
                            ),
                            s = n[this.__optionValues.indexOf(i) + 1];
                        (s = s || n[0]),
                            this.__optionElsByValue.get(s).focus(),
                            this.__change(s);
                    },
                    __focusOptionPrev() {
                        let i = this.__active,
                            n = this.__optionValues.filter(
                                (r) => !this.__disabledOptions.has(r)
                            ),
                            s = n[n.indexOf(i) - 1];
                        (s = s || n.slice(-1)[0]),
                            this.__optionElsByValue.get(s).focus(),
                            this.__change(s);
                    },
                };
            },
            "x-effect"() {
                let i = this.__value;
                if (!this.__inputName) return;
                let n = this.$el.nextElementSibling;
                if (
                    (n && String(n.id) === String(this.__inputId) && n.remove(),
                    i)
                ) {
                    let s = document.createElement("input");
                    (s.type = "hidden"),
                        (s.value = i),
                        (s.name = this.__inputName),
                        (s.id = this.__inputId),
                        this.$el.after(s);
                }
            },
            role: "radiogroup",
            "x-id"() {
                return ["alpine-radio-label", "alpine-radio-description"];
            },
            ":aria-labelledby"() {
                return this.__hasLabel && this.$id("alpine-radio-label");
            },
            ":aria-describedby"() {
                return (
                    this.__hasDescription &&
                    this.$id("alpine-radio-description")
                );
            },
            "@keydown.up.prevent.stop"() {
                this.__focusOptionPrev();
            },
            "@keydown.left.prevent.stop"() {
                this.__focusOptionPrev();
            },
            "@keydown.down.prevent.stop"() {
                this.__focusOptionNext();
            },
            "@keydown.right.prevent.stop"() {
                this.__focusOptionNext();
            },
        });
    }
    function Ri(t, e) {
        e.bind(t, {
            "x-data"() {
                return {
                    init() {
                        queueMicrotask(() => {
                            (this.__disabled = e.bound(t, "disabled", !1)),
                                (this.__option = e.bound(t, "value")),
                                this.$data.__addOption(
                                    this.__option,
                                    this.$el,
                                    this.__disabled
                                );
                        });
                    },
                    __option: void 0,
                    __disabled: !1,
                    __hasLabel: !1,
                    __hasDescription: !1,
                };
            },
            "x-id"() {
                return ["alpine-radio-label", "alpine-radio-description"];
            },
            role: "radio",
            ":aria-checked"() {
                return this.$radioOption.isChecked;
            },
            ":aria-disabled"() {
                return this.$radioOption.isDisabled;
            },
            ":aria-labelledby"() {
                return this.__hasLabel && this.$id("alpine-radio-label");
            },
            ":aria-describedby"() {
                return (
                    this.__hasDescription &&
                    this.$id("alpine-radio-description")
                );
            },
            ":tabindex"() {
                return this.$radioOption.isDisabled
                    ? -1
                    : this.$radioOption.isChecked ||
                      (!this.$data.__value &&
                          this.$data.__isFirstOption(this.$data.__option))
                    ? 0
                    : -1;
            },
            "@click"() {
                this.$radioOption.isDisabled ||
                    (this.$data.__change(this.$data.__option),
                    this.$el.focus());
            },
            "@focus"() {
                this.$radioOption.isDisabled ||
                    this.$data.__setActive(this.$data.__option);
            },
            "@blur"() {
                this.$data.__active === this.$data.__option &&
                    this.$data.__setActive(void 0);
            },
            "@keydown.space.stop.prevent"() {
                this.$data.__change(this.$data.__option);
            },
        });
    }
    function Vi(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__hasLabel = !0;
            },
            ":id"() {
                return this.$id("alpine-radio-label");
            },
        });
    }
    function Ai(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__hasDescription = !0;
            },
            ":id"() {
                return this.$id("alpine-radio-description");
            },
        });
    }
    function Te(t) {
        t.directive("tabs", (e, i) => {
            i.value
                ? i.value === "list"
                    ? qi(e, t)
                    : i.value === "tab"
                    ? Wi(e, t)
                    : i.value === "panels"
                    ? Hi(e, t)
                    : i.value === "panel" && Ui(e, t)
                : ji(e, t);
        }),
            t.magic("tab", (e) => {
                let i = t.$data(e);
                return {
                    get isSelected() {
                        return (
                            i.__selectedIndex === i.__tabs.indexOf(i.__tabEl)
                        );
                    },
                    get isDisabled() {
                        return i.__isDisabled;
                    },
                };
            }),
            t.magic("panel", (e) => {
                let i = t.$data(e);
                return {
                    get isSelected() {
                        return (
                            i.__selectedIndex ===
                            i.__panels.indexOf(i.__panelEl)
                        );
                    },
                };
            });
    }
    function ji(t, e) {
        e.bind(t, {
            "x-modelable": "__selectedIndex",
            "x-data"() {
                return {
                    init() {
                        queueMicrotask(() => {
                            let i =
                                    this.__selectedIndex ||
                                    Number(
                                        e.bound(this.$el, "default-index", 0)
                                    ),
                                n = this.__activeTabs(),
                                s = (r, a, o) => Math.min(Math.max(r, a), o);
                            (this.__selectedIndex = s(i, 0, n.length - 1)),
                                e.effect(() => {
                                    this.__manualActivation = e.bound(
                                        this.$el,
                                        "manual",
                                        !1
                                    );
                                });
                        });
                    },
                    __tabs: [],
                    __panels: [],
                    __selectedIndex: null,
                    __tabGroupEl: void 0,
                    __manualActivation: !1,
                    __addTab(i) {
                        this.__tabs.push(i);
                    },
                    __addPanel(i) {
                        this.__panels.push(i);
                    },
                    __selectTab(i) {
                        this.__selectedIndex = this.__tabs.indexOf(i);
                    },
                    __activeTabs() {
                        return this.__tabs.filter((i) => !i.__disabled);
                    },
                };
            },
        });
    }
    function qi(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$data.__tabGroupEl = this.$el;
            },
        });
    }
    function Wi(t, e) {
        e.bind(t, {
            "x-init"() {
                this.$el.tagName.toLowerCase() === "button" &&
                    !this.$el.hasAttribute("type") &&
                    (this.$el.type = "button");
            },
            "x-data"() {
                return {
                    init() {
                        (this.__tabEl = this.$el),
                            this.$data.__addTab(this.$el),
                            (this.__tabEl.__disabled = e.bound(
                                this.$el,
                                "disabled",
                                !1
                            )),
                            (this.__isDisabled = this.__tabEl.__disabled);
                    },
                    __tabEl: void 0,
                    __isDisabled: !1,
                };
            },
            "@click"() {
                this.$el.__disabled ||
                    (this.$data.__selectTab(this.$el), this.$el.focus());
            },
            "@keydown.enter.prevent.stop"() {
                this.__selectTab(this.$el);
            },
            "@keydown.space.prevent.stop"() {
                this.__selectTab(this.$el);
            },
            "@keydown.home.prevent.stop"() {
                this.$focus.within(this.$data.__activeTabs()).first();
            },
            "@keydown.page-up.prevent.stop"() {
                this.$focus.within(this.$data.__activeTabs()).first();
            },
            "@keydown.end.prevent.stop"() {
                this.$focus.within(this.$data.__activeTabs()).last();
            },
            "@keydown.page-down.prevent.stop"() {
                this.$focus.within(this.$data.__activeTabs()).last();
            },
            "@keydown.down.prevent.stop"() {
                this.$focus
                    .within(this.$data.__activeTabs())
                    .withWrapAround()
                    .next();
            },
            "@keydown.right.prevent.stop"() {
                this.$focus
                    .within(this.$data.__activeTabs())
                    .withWrapAround()
                    .next();
            },
            "@keydown.up.prevent.stop"() {
                this.$focus
                    .within(this.$data.__activeTabs())
                    .withWrapAround()
                    .prev();
            },
            "@keydown.left.prevent.stop"() {
                this.$focus
                    .within(this.$data.__activeTabs())
                    .withWrapAround()
                    .prev();
            },
            ":tabindex"() {
                return this.$tab.isSelected ? 0 : -1;
            },
            "@focus"() {
                if (this.$data.__manualActivation) this.$el.focus();
                else {
                    if (this.$el.__disabled) return;
                    this.$data.__selectTab(this.$el), this.$el.focus();
                }
            },
        });
    }
    function Hi(t, e) {
        e.bind(t, {});
    }
    function Ui(t, e) {
        e.bind(t, {
            ":tabindex"() {
                return this.$panel.isSelected ? 0 : -1;
            },
            "x-data"() {
                return {
                    init() {
                        (this.__panelEl = this.$el),
                            this.$data.__addPanel(this.$el);
                    },
                    __panelEl: void 0,
                };
            },
            "x-show"() {
                return this.$panel.isSelected;
            },
        });
    }
    function Ne(t) {
        vt(t), gt(t), Se(t), De(t), Ke(t), ke(t), Ce(t), Te(t);
    }
    document.addEventListener("alpine:init", () => {
        window.Alpine.plugin(Ne);
    });
})();
