(() => {
    var j = [
            "input",
            "select",
            "textarea",
            "a[href]",
            "button",
            "[tabindex]",
            "audio[controls]",
            "video[controls]",
            '[contenteditable]:not([contenteditable="false"])',
            "details>summary:first-of-type",
            "details",
        ],
        _ = j.join(","),
        A =
            typeof Element == "undefined"
                ? function () {}
                : Element.prototype.matches ||
                  Element.prototype.msMatchesSelector ||
                  Element.prototype.webkitMatchesSelector,
        G = function (e, t, a) {
            var u = Array.prototype.slice.apply(e.querySelectorAll(_));
            return t && A.call(e, _) && u.unshift(e), (u = u.filter(a)), u;
        },
        Z = function (e) {
            return e.contentEditable === "true";
        },
        M = function (e) {
            var t = parseInt(e.getAttribute("tabindex"), 10);
            return isNaN(t)
                ? Z(e) ||
                  ((e.nodeName === "AUDIO" ||
                      e.nodeName === "VIDEO" ||
                      e.nodeName === "DETAILS") &&
                      e.getAttribute("tabindex") === null)
                    ? 0
                    : e.tabIndex
                : t;
        },
        $ = function (e, t) {
            return e.tabIndex === t.tabIndex
                ? e.documentOrder - t.documentOrder
                : e.tabIndex - t.tabIndex;
        },
        C = function (e) {
            return e.tagName === "INPUT";
        },
        ee = function (e) {
            return C(e) && e.type === "hidden";
        },
        te = function (e) {
            var t =
                e.tagName === "DETAILS" &&
                Array.prototype.slice.apply(e.children).some(function (a) {
                    return a.tagName === "SUMMARY";
                });
            return t;
        },
        re = function (e, t) {
            for (var a = 0; a < e.length; a++)
                if (e[a].checked && e[a].form === t) return e[a];
        },
        ae = function (e) {
            if (!e.name) return !0;
            var t = e.form || e.ownerDocument,
                a = function (l) {
                    return t.querySelectorAll(
                        'input[type="radio"][name="' + l + '"]'
                    );
                },
                u;
            if (
                typeof window != "undefined" &&
                typeof window.CSS != "undefined" &&
                typeof window.CSS.escape == "function"
            )
                u = a(window.CSS.escape(e.name));
            else
                try {
                    u = a(e.name);
                } catch (s) {
                    return (
                        console.error(
                            "Looks like you have a radio button with a name attribute containing invalid CSS selector characters and need the CSS.escape polyfill: %s",
                            s.message
                        ),
                        !1
                    );
                }
            var r = re(u, e.form);
            return !r || r === e;
        },
        ne = function (e) {
            return C(e) && e.type === "radio";
        },
        ie = function (e) {
            return ne(e) && !ae(e);
        },
        ue = function (e, t) {
            if (getComputedStyle(e).visibility === "hidden") return !0;
            var a = A.call(e, "details>summary:first-of-type"),
                u = a ? e.parentElement : e;
            if (A.call(u, "details:not([open]) *")) return !0;
            if (!t || t === "full")
                for (; e; ) {
                    if (getComputedStyle(e).display === "none") return !0;
                    e = e.parentElement;
                }
            else if (t === "non-zero-area") {
                var r = e.getBoundingClientRect(),
                    s = r.width,
                    l = r.height;
                return s === 0 && l === 0;
            }
            return !1;
        },
        oe = function (e) {
            if (
                C(e) ||
                e.tagName === "SELECT" ||
                e.tagName === "TEXTAREA" ||
                e.tagName === "BUTTON"
            )
                for (var t = e.parentElement; t; ) {
                    if (t.tagName === "FIELDSET" && t.disabled) {
                        for (var a = 0; a < t.children.length; a++) {
                            var u = t.children.item(a);
                            if (u.tagName === "LEGEND") return !u.contains(e);
                        }
                        return !0;
                    }
                    t = t.parentElement;
                }
            return !1;
        },
        O = function (e, t) {
            return !(
                t.disabled ||
                ee(t) ||
                ue(t, e.displayCheck) ||
                te(t) ||
                oe(t)
            );
        },
        se = function (e, t) {
            return !(!O(e, t) || ie(t) || M(t) < 0);
        },
        q = function (e, t) {
            t = t || {};
            var a = [],
                u = [],
                r = G(e, t.includeContainer, se.bind(null, t));
            r.forEach(function (l, h) {
                var b = M(l);
                b === 0
                    ? a.push(l)
                    : u.push({ documentOrder: h, tabIndex: b, node: l });
            });
            var s = u
                .sort($)
                .map(function (l) {
                    return l.node;
                })
                .concat(a);
            return s;
        },
        W = function (e, t) {
            t = t || {};
            var a = G(e, t.includeContainer, O.bind(null, t));
            return a;
        };
    var ce = j.concat("iframe").join(","),
        k = function (e, t) {
            if (((t = t || {}), !e)) throw new Error("No node provided");
            return A.call(e, ce) === !1 ? !1 : O(t, e);
        };
    function B(i, e) {
        var t = Object.keys(i);
        if (Object.getOwnPropertySymbols) {
            var a = Object.getOwnPropertySymbols(i);
            e &&
                (a = a.filter(function (u) {
                    return Object.getOwnPropertyDescriptor(i, u).enumerable;
                })),
                t.push.apply(t, a);
        }
        return t;
    }
    function fe(i) {
        for (var e = 1; e < arguments.length; e++) {
            var t = arguments[e] != null ? arguments[e] : {};
            e % 2
                ? B(Object(t), !0).forEach(function (a) {
                      le(i, a, t[a]);
                  })
                : Object.getOwnPropertyDescriptors
                ? Object.defineProperties(
                      i,
                      Object.getOwnPropertyDescriptors(t)
                  )
                : B(Object(t)).forEach(function (a) {
                      Object.defineProperty(
                          i,
                          a,
                          Object.getOwnPropertyDescriptor(t, a)
                      );
                  });
        }
        return i;
    }
    function le(i, e, t) {
        return (
            e in i
                ? Object.defineProperty(i, e, {
                      value: t,
                      enumerable: !0,
                      configurable: !0,
                      writable: !0,
                  })
                : (i[e] = t),
            i
        );
    }
    var H = (function () {
            var i = [];
            return {
                activateTrap: function (t) {
                    if (i.length > 0) {
                        var a = i[i.length - 1];
                        a !== t && a.pause();
                    }
                    var u = i.indexOf(t);
                    u === -1 || i.splice(u, 1), i.push(t);
                },
                deactivateTrap: function (t) {
                    var a = i.indexOf(t);
                    a !== -1 && i.splice(a, 1),
                        i.length > 0 && i[i.length - 1].unpause();
                },
            };
        })(),
        de = function (e) {
            return (
                e.tagName &&
                e.tagName.toLowerCase() === "input" &&
                typeof e.select == "function"
            );
        },
        be = function (e) {
            return e.key === "Escape" || e.key === "Esc" || e.keyCode === 27;
        },
        ve = function (e) {
            return e.key === "Tab" || e.keyCode === 9;
        },
        U = function (e) {
            return setTimeout(e, 0);
        },
        L = function (e, t) {
            var a = -1;
            return (
                e.every(function (u, r) {
                    return t(u) ? ((a = r), !1) : !0;
                }),
                a
            );
        },
        D = function (e) {
            for (
                var t = arguments.length,
                    a = new Array(t > 1 ? t - 1 : 0),
                    u = 1;
                u < t;
                u++
            )
                a[u - 1] = arguments[u];
            return typeof e == "function" ? e.apply(void 0, a) : e;
        },
        K = function (e, t) {
            var a = document,
                u = fe(
                    {
                        returnFocusOnDeactivate: !0,
                        escapeDeactivates: !0,
                        delayInitialFocus: !0,
                    },
                    t
                ),
                r = {
                    containers: [],
                    tabbableGroups: [],
                    nodeFocusedBeforeActivation: null,
                    mostRecentlyFocusedNode: null,
                    active: !1,
                    paused: !1,
                    delayInitialFocusTimer: void 0,
                },
                s,
                l = function (n, o, c) {
                    return n && n[o] !== void 0 ? n[o] : u[c || o];
                },
                h = function (n) {
                    return r.containers.some(function (o) {
                        return o.contains(n);
                    });
                },
                b = function (n) {
                    var o = u[n];
                    if (!o) return null;
                    var c = o;
                    if (typeof o == "string" && ((c = a.querySelector(o)), !c))
                        throw new Error(
                            "`".concat(n, "` refers to no known node")
                        );
                    if (typeof o == "function" && ((c = o()), !c))
                        throw new Error(
                            "`".concat(n, "` did not return a node")
                        );
                    return c;
                },
                v = function () {
                    var n;
                    if (l({}, "initialFocus") === !1) return !1;
                    if (b("initialFocus") !== null) n = b("initialFocus");
                    else if (h(a.activeElement)) n = a.activeElement;
                    else {
                        var o = r.tabbableGroups[0],
                            c = o && o.firstTabbableNode;
                        n = c || b("fallbackFocus");
                    }
                    if (!n)
                        throw new Error(
                            "Your focus-trap needs to have at least one focusable element"
                        );
                    return n;
                },
                m = function () {
                    if (
                        ((r.tabbableGroups = r.containers
                            .map(function (n) {
                                var o = q(n);
                                if (o.length > 0)
                                    return {
                                        container: n,
                                        firstTabbableNode: o[0],
                                        lastTabbableNode: o[o.length - 1],
                                    };
                            })
                            .filter(function (n) {
                                return !!n;
                            })),
                        r.tabbableGroups.length <= 0 && !b("fallbackFocus"))
                    )
                        throw new Error(
                            "Your focus-trap must have at least one container with at least one tabbable node in it at all times"
                        );
                },
                p = function f(n) {
                    if (n !== !1 && n !== a.activeElement) {
                        if (!n || !n.focus) {
                            f(v());
                            return;
                        }
                        n.focus({ preventScroll: !!u.preventScroll }),
                            (r.mostRecentlyFocusedNode = n),
                            de(n) && n.select();
                    }
                },
                E = function (n) {
                    var o = b("setReturnFocus");
                    return o || n;
                },
                y = function (n) {
                    if (!h(n.target)) {
                        if (D(u.clickOutsideDeactivates, n)) {
                            s.deactivate({
                                returnFocus:
                                    u.returnFocusOnDeactivate && !k(n.target),
                            });
                            return;
                        }
                        D(u.allowOutsideClick, n) || n.preventDefault();
                    }
                },
                w = function (n) {
                    var o = h(n.target);
                    o || n.target instanceof Document
                        ? o && (r.mostRecentlyFocusedNode = n.target)
                        : (n.stopImmediatePropagation(),
                          p(r.mostRecentlyFocusedNode || v()));
                },
                Q = function (n) {
                    m();
                    var o = null;
                    if (r.tabbableGroups.length > 0) {
                        var c = L(r.tabbableGroups, function (S) {
                            var N = S.container;
                            return N.contains(n.target);
                        });
                        if (c < 0)
                            n.shiftKey
                                ? (o =
                                      r.tabbableGroups[
                                          r.tabbableGroups.length - 1
                                      ].lastTabbableNode)
                                : (o = r.tabbableGroups[0].firstTabbableNode);
                        else if (n.shiftKey) {
                            var d = L(r.tabbableGroups, function (S) {
                                var N = S.firstTabbableNode;
                                return n.target === N;
                            });
                            if (
                                (d < 0 &&
                                    r.tabbableGroups[c].container ===
                                        n.target &&
                                    (d = c),
                                d >= 0)
                            ) {
                                var g =
                                        d === 0
                                            ? r.tabbableGroups.length - 1
                                            : d - 1,
                                    F = r.tabbableGroups[g];
                                o = F.lastTabbableNode;
                            }
                        } else {
                            var T = L(r.tabbableGroups, function (S) {
                                var N = S.lastTabbableNode;
                                return n.target === N;
                            });
                            if (
                                (T < 0 &&
                                    r.tabbableGroups[c].container ===
                                        n.target &&
                                    (T = c),
                                T >= 0)
                            ) {
                                var X =
                                        T === r.tabbableGroups.length - 1
                                            ? 0
                                            : T + 1,
                                    J = r.tabbableGroups[X];
                                o = J.firstTabbableNode;
                            }
                        }
                    } else o = b("fallbackFocus");
                    o && (n.preventDefault(), p(o));
                },
                R = function (n) {
                    if (be(n) && D(u.escapeDeactivates) !== !1) {
                        n.preventDefault(), s.deactivate();
                        return;
                    }
                    if (ve(n)) {
                        Q(n);
                        return;
                    }
                },
                x = function (n) {
                    D(u.clickOutsideDeactivates, n) ||
                        h(n.target) ||
                        D(u.allowOutsideClick, n) ||
                        (n.preventDefault(), n.stopImmediatePropagation());
                },
                I = function () {
                    if (!!r.active)
                        return (
                            H.activateTrap(s),
                            (r.delayInitialFocusTimer = u.delayInitialFocus
                                ? U(function () {
                                      p(v());
                                  })
                                : p(v())),
                            a.addEventListener("focusin", w, !0),
                            a.addEventListener("mousedown", y, {
                                capture: !0,
                                passive: !1,
                            }),
                            a.addEventListener("touchstart", y, {
                                capture: !0,
                                passive: !1,
                            }),
                            a.addEventListener("click", x, {
                                capture: !0,
                                passive: !1,
                            }),
                            a.addEventListener("keydown", R, {
                                capture: !0,
                                passive: !1,
                            }),
                            s
                        );
                },
                P = function () {
                    if (!!r.active)
                        return (
                            a.removeEventListener("focusin", w, !0),
                            a.removeEventListener("mousedown", y, !0),
                            a.removeEventListener("touchstart", y, !0),
                            a.removeEventListener("click", x, !0),
                            a.removeEventListener("keydown", R, !0),
                            s
                        );
                };
            return (
                (s = {
                    activate: function (n) {
                        if (r.active) return this;
                        var o = l(n, "onActivate"),
                            c = l(n, "onPostActivate"),
                            d = l(n, "checkCanFocusTrap");
                        d || m(),
                            (r.active = !0),
                            (r.paused = !1),
                            (r.nodeFocusedBeforeActivation = a.activeElement),
                            o && o();
                        var g = function () {
                            d && m(), I(), c && c();
                        };
                        return d
                            ? (d(r.containers.concat()).then(g, g), this)
                            : (g(), this);
                    },
                    deactivate: function (n) {
                        if (!r.active) return this;
                        clearTimeout(r.delayInitialFocusTimer),
                            (r.delayInitialFocusTimer = void 0),
                            P(),
                            (r.active = !1),
                            (r.paused = !1),
                            H.deactivateTrap(s);
                        var o = l(n, "onDeactivate"),
                            c = l(n, "onPostDeactivate"),
                            d = l(n, "checkCanReturnFocus");
                        o && o();
                        var g = l(n, "returnFocus", "returnFocusOnDeactivate"),
                            F = function () {
                                U(function () {
                                    g && p(E(r.nodeFocusedBeforeActivation)),
                                        c && c();
                                });
                            };
                        return g && d
                            ? (d(E(r.nodeFocusedBeforeActivation)).then(F, F),
                              this)
                            : (F(), this);
                    },
                    pause: function () {
                        return r.paused || !r.active
                            ? this
                            : ((r.paused = !0), P(), this);
                    },
                    unpause: function () {
                        return !r.paused || !r.active
                            ? this
                            : ((r.paused = !1), m(), I(), this);
                    },
                    updateContainerElements: function (n) {
                        var o = [].concat(n).filter(Boolean);
                        return (
                            (r.containers = o.map(function (c) {
                                return typeof c == "string"
                                    ? a.querySelector(c)
                                    : c;
                            })),
                            r.active && m(),
                            this
                        );
                    },
                }),
                s.updateContainerElements(e),
                s
            );
        };
    function Y(i) {
        let e, t;
        window.addEventListener("focusin", () => {
            (e = t), (t = document.activeElement);
        }),
            i.magic("focus", (a) => {
                let u = a;
                return {
                    __noscroll: !1,
                    __wrapAround: !1,
                    within(r) {
                        return (u = r), this;
                    },
                    withoutScrolling() {
                        return (this.__noscroll = !0), this;
                    },
                    noscroll() {
                        return (this.__noscroll = !0), this;
                    },
                    withWrapAround() {
                        return (this.__wrapAround = !0), this;
                    },
                    wrap() {
                        return this.withWrapAround();
                    },
                    focusable(r) {
                        return k(r);
                    },
                    previouslyFocused() {
                        return e;
                    },
                    lastFocused() {
                        return e;
                    },
                    focused() {
                        return t;
                    },
                    focusables() {
                        return Array.isArray(u)
                            ? u
                            : W(u, { displayCheck: "none" });
                    },
                    all() {
                        return this.focusables();
                    },
                    isFirst(r) {
                        let s = this.all();
                        return s[0] && s[0].isSameNode(r);
                    },
                    isLast(r) {
                        let s = this.all();
                        return s.length && s.slice(-1)[0].isSameNode(r);
                    },
                    getFirst() {
                        return this.all()[0];
                    },
                    getLast() {
                        return this.all().slice(-1)[0];
                    },
                    getNext() {
                        let r = this.all(),
                            s = document.activeElement;
                        if (r.indexOf(s) !== -1)
                            return this.__wrapAround &&
                                r.indexOf(s) === r.length - 1
                                ? r[0]
                                : r[r.indexOf(s) + 1];
                    },
                    getPrevious() {
                        let r = this.all(),
                            s = document.activeElement;
                        if (r.indexOf(s) !== -1)
                            return this.__wrapAround && r.indexOf(s) === 0
                                ? r.slice(-1)[0]
                                : r[r.indexOf(s) - 1];
                    },
                    first() {
                        this.focus(this.getFirst());
                    },
                    last() {
                        this.focus(this.getLast());
                    },
                    next() {
                        this.focus(this.getNext());
                    },
                    previous() {
                        this.focus(this.getPrevious());
                    },
                    prev() {
                        return this.previous();
                    },
                    focus(r) {
                        !r ||
                            setTimeout(() => {
                                r.hasAttribute("tabindex") ||
                                    r.setAttribute("tabindex", "0"),
                                    r.focus({ preventScroll: this._noscroll });
                            });
                    },
                };
            }),
            i.directive(
                "trap",
                i.skipDuringClone(
                    (
                        a,
                        { expression: u, modifiers: r },
                        { effect: s, evaluateLater: l, cleanup: h }
                    ) => {
                        let b = l(u),
                            v = !1,
                            m = K(a, {
                                escapeDeactivates: !1,
                                allowOutsideClick: !0,
                                fallbackFocus: () => a,
                                initialFocus: a.querySelector("[autofocus]"),
                            }),
                            p = () => {},
                            E = () => {},
                            y = () => {
                                p(),
                                    (p = () => {}),
                                    E(),
                                    (E = () => {}),
                                    m.deactivate({
                                        returnFocus: !r.includes("noreturn"),
                                    });
                            };
                        s(() =>
                            b((w) => {
                                v !== w &&
                                    (w &&
                                        !v &&
                                        setTimeout(() => {
                                            r.includes("inert") && (p = V(a)),
                                                r.includes("noscroll") &&
                                                    (E = pe()),
                                                m.activate();
                                        }),
                                    !w && v && y(),
                                    (v = !!w));
                            })
                        ),
                            h(y);
                    },
                    (a, { expression: u, modifiers: r }, { evaluate: s }) => {
                        r.includes("inert") && s(u) && V(a);
                    }
                )
            );
    }
    function V(i) {
        let e = [];
        return (
            z(i, (t) => {
                let a = t.hasAttribute("aria-hidden");
                t.setAttribute("aria-hidden", "true"),
                    e.push(() => a || t.removeAttribute("aria-hidden"));
            }),
            () => {
                for (; e.length; ) e.pop()();
            }
        );
    }
    function z(i, e) {
        i.isSameNode(document.body) ||
            !i.parentNode ||
            Array.from(i.parentNode.children).forEach((t) => {
                t.isSameNode(i) || e(t), z(i.parentNode, e);
            });
    }
    function pe() {
        let i = document.documentElement.style.overflow,
            e = document.documentElement.style.paddingRight,
            t = window.innerWidth - document.documentElement.clientWidth;
        return (
            (document.documentElement.style.overflow = "hidden"),
            (document.documentElement.style.paddingRight = `${t}px`),
            () => {
                (document.documentElement.style.overflow = i),
                    (document.documentElement.style.paddingRight = e);
            }
        );
    }
    document.addEventListener("alpine:init", () => {
        window.Alpine.plugin(Y);
    });
})();
/*!
 * focus-trap 6.6.1
 * @license MIT, https://github.com/focus-trap/focus-trap/blob/master/LICENSE
 */
/*!
 * tabbable 5.2.1
 * @license MIT, https://github.com/focus-trap/tabbable/blob/master/LICENSE
 */
