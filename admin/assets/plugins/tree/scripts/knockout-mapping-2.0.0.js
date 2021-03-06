// Knockout Mapping plugin v2.1.2
// (c) 2012 Steven Sanderson, Roy Jacobs - http://knockoutjs.com/
// License: MIT (http://www.opensource.org/licenses/mit-license.php)

(function (e) {
    "function" === typeof require && "object" === typeof exports && "object" === typeof module ? e(require("knockout"), exports) : "function" === typeof define && define.amd ? define(["knockout", "exports"], e) : e(ko, ko.mapping = {})
})(function (e, f) {
    function J(a, b) {
        var c = f.getType, d, l = {
            include: !0, 
            ignore: !0, 
            copy: !0
        }, h, g, k = 1, p = arguments.length;
        for ("object" !== c(a) && (a = {}); k < p; k++) for (d in b = arguments[k], "object" !== c(b) && (b = {}), b) {
            h = a[d];
            g = b[d];
            if ("constructor" !== d && l[d] && "array" !== c(g)) {
                if ("string" !== c(g)) throw Error("ko.mapping.defaultOptions()." +
                    d + " should be an array or string.");
                g = [g]
            }
            switch (c(g)) {
                case "object":
                    h = "object" === c(h) ? h : {};                    
                    a[d] = J(h, g);
                    break;
                case "array":
                    h = "array" === c(h) ? h : [];
                    a[d] = e.utils.arrayGetDistinctValues(e.utils.arrayPushAll(h, g));
                    break;
                default:
                    a[d] = g
            } 
        }
        return a
    }
    function i() {
        var a = e.utils.arrayPushAll([{}, q], arguments);
        return a = J.apply(this, a)
    }
    function O(a, b) {
        var c = e.dependentObservable;
        e.dependentObservable = function (b, c, d) {
            d = d || {};            
            b && "object" == typeof b && (d = b);
            var f = d.deferEvaluation, p = !1, z = function (b) {
                return w({
                    read: function () {
                        p ||
                        (e.utils.arrayRemoveItem(a, b), p = !0);
                        return b.apply(b, arguments)
                    }, 
                    write: function (a) {
                        return b(a)
                    }, 
                    deferEvaluation: !0
                })
            };            
            d.deferEvaluation = !0;
            b = new w(b, c, d);
            f || (b = z(b), a.push(b));
            return b
        };        
        e.dependentObservable.fn = w.fn;
        e.computed = e.dependentObservable;
        var d = b();
        e.dependentObservable = c;
        e.computed = e.dependentObservable;
        return d
    }
    function C(a, b, c, d, l, h) {
        var g = e.utils.unwrapObservable(b) instanceof Array;
        void 0 !== d && f.isMapped(a) && (c = e.utils.unwrapObservable(a)[r], h = d = "");
        var d = d || "", h = h || "", k = function (a) {
            var b;
            if (d === "") b = c[a];
            else if (b = c[d]) b = b[a];
            return b
        }, p = function () {
            return k("create") instanceof Function
        }, z = function (a) {
            return O(D, function () {
                return k("create")({
                    data: a || b, 
                    parent: l
                })
            })
        }, o = function () {
            return k("update") instanceof Function
        }, m = function (a, c) {
            var d = {
                data: c || b, 
                parent: l, 
                target: e.utils.unwrapObservable(a)
            };            
            if (e.isWriteableObservable(a)) d.observable = a;
            return k("update")(d)
        }, v = u.get(b);
        if (v) return v;
        if (g) {
            var g = [], j = (v = k("key") instanceof Function) ? k("key") : function (a) {
                return a
            };            
            e.isObservable(a) ||
            (a = e.observableArray([]), a.mappedRemove = function (b) {
                var c = typeof b == "function" ? b : function (a) {
                    return a === j(b)
                };                
                return a.remove(function (a) {
                    return c(j(a))
                })
            }, a.mappedRemoveAll = function (b) {
                var c = A(b, j);
                return a.remove(function (a) {
                    return e.utils.arrayIndexOf(c, j(a)) != -1
                })
            }, a.mappedDestroy = function (b) {
                var c = typeof b == "function" ? b : function (a) {
                    return a === j(b)
                };                
                return a.destroy(function (a) {
                    return c(j(a))
                })
            }, a.mappedDestroyAll = function (b) {
                var c = A(b, j);
                return a.destroy(function (a) {
                    return e.utils.arrayIndexOf(c,
                        j(a)) != -1
                })
            }, a.mappedIndexOf = function (b) {
                var c = A(a(), j), b = j(b);
                return e.utils.arrayIndexOf(c, b)
            }, a.mappedCreate = function (b) {
                if (a.mappedIndexOf(b) !== -1) throw Error("There already is an object with the key that you specified.");
                var c = p() ? z(b) : b;
                if (o()) {
                    b = m(c, b);
                    e.isWriteableObservable(c) ? c(b) : c = b
                }
                a.push(c);
                return c
            });
            var n = A(e.utils.unwrapObservable(a), j).sort(), i = A(b, j);
            v && i.sort();
            for (var v = e.utils.compareArrays(n, i), n = {}, i = [], q = 0, y = v.length; q < y; q++) {
                var x = v[q], s, t = E(h, b, q);
                switch (x.status) {
                    case "added":
                        var B =
                        F(e.utils.unwrapObservable(b), x.value, j);
                        s = C(void 0, B, c, d, a, t);
                        p() || (s = e.utils.unwrapObservable(s));
                        t = K(e.utils.unwrapObservable(b), B, n);
                        i[t] = s;
                        n[t] = !0;
                        break;
                    case "retained":
                        B = F(e.utils.unwrapObservable(b), x.value, j);
                        s = F(a, x.value, j);
                        C(s, B, c, d, a, t);
                        t = K(e.utils.unwrapObservable(b), B, n);
                        i[t] = s;
                        n[t] = !0;
                        break;
                    case "deleted":
                        s = F(a, x.value, j)
                }
                g.push({
                    event: x.status, 
                    item: s
                })
            }
            a(i);
            var w = k("arrayChanged");
            w instanceof Function && e.utils.arrayForEach(g, function (a) {
                w(a.event, a.item)
            })
        } else if (G(b)) {
            a = e.utils.unwrapObservable(a);
            if (!a) {
                if (p()) return n = z(), o() && (n = m(n)), n;
                if (o()) return m(n);
                a = {}
            }
            o() && (a = m(a));
            u.save(b, a);
            L(b, function (d) {
                var f = E(h, b, d);
                if (e.utils.arrayIndexOf(c.ignore, f) == -1) if (e.utils.arrayIndexOf(c.copy, f) != -1) a[d] = b[d];
                    else {
                        var g = u.get(b[d]) || C(a[d], b[d], c, d, a, f);
                        if (e.isWriteableObservable(a[d])) a[d](e.utils.unwrapObservable(g)); else a[d] = g;
                        c.mappedProperties[f] = true
                    }
            })
        } else switch (f.getType(b)) {
            case "function":
                o() ? e.isWriteableObservable(b) ? (b(m(b)), a = b) : a = m(b) : a = b;
                break;
            default:
                e.isWriteableObservable(a) ?
                o() ? a(m(a)) : a(e.utils.unwrapObservable(b)) : (a = p() ? z() : e.observable(e.utils.unwrapObservable(b)), o() && a(m(a)))
        }
        return a
    }
    function K(a, b, c) {
        for (var d = 0, e = a.length; d < e; d++) if (!0 !== c[d] && a[d] === b) return d; return null
    }
    function M(a, b) {
        var c;
        b && (c = b(a));
        "undefined" === f.getType(c) && (c = a);
        return e.utils.unwrapObservable(c)
    }
    function F(a, b, c) {
        a = e.utils.arrayFilter(e.utils.unwrapObservable(a), function (a) {
            return M(a, c) === b
        });
        if (0 == a.length) throw Error("When calling ko.update*, the key '" + b + "' was not found!");
        if (1 < a.length && G(a[0])) throw Error("When calling ko.update*, the key '" + b + "' was not unique!");
        return a[0]
    }
    function A(a, b) {
        return e.utils.arrayMap(e.utils.unwrapObservable(a), function (a) {
            return b ? M(a, b) : a
        })
    }
    function L(a, b) {
        if (a instanceof Array) for (var c = 0; c < a.length; c++) b(c); else for (c in a) b(c)
    }
    function G(a) {
        var b = f.getType(a);
        return ("object" === b || "array" === b) && null !== a && "undefined" !== b
    }
    function E(a, b, c) {
        var d = a || "";
        b instanceof Array ? a && (d += "[" + c + "]") : (a && (d += "."), d += c);
        return d
    }
    function H(a, b,
        c, d, l) {
        void 0 !== d && f.isMapped(a) && (c = i(e.utils.unwrapObservable(a)[r], c), d = "");
        void 0 === d && (u = new N);
        var d = d || "", h, g = e.utils.unwrapObservable(a);
        if (!G(g)) return b(a, l);
        b(a, l);
        h = g instanceof Array ? [] : {};    
        u.save(a, h);
        var k = l;
        L(g, function (a) {
            if (!(c.ignore && e.utils.arrayIndexOf(c.ignore, a) != -1)) {
                var i = g[a], o = E(d, g, a);
                if (!(e.utils.arrayIndexOf(c.copy, a) === -1 && e.utils.arrayIndexOf(c.include, a) === -1 && c.mappedProperties && !c.mappedProperties[o] && !(g instanceof Array))) {
                    l = E(k, g, a);
                    switch (f.getType(e.utils.unwrapObservable(i))) {
                        case "object": case "array": case "undefined":
                            var m =
                            u.get(i);
                            h[a] = f.getType(m) !== "undefined" ? m : H(i, b, c, o, l);
                            break;
                        default:
                            h[a] = b(i, l)
                    } 
                } 
            } 
        });
        return h
    }
    function N() {
        var a = [], b = [];
        this.save = function (c, d) {
            var f = e.utils.arrayIndexOf(a, c);
            0 <= f ? b[f] = d : (a.push(c), b.push(d))
        };    
        this.get = function (c) {
            c = e.utils.arrayIndexOf(a, c);
            return 0 <= c ? b[c] : void 0
        }
    }
    var r = "__ko_mapping__", w = e.dependentObservable, I = 0, D, u, y = {
        include: ["_destroy"], 
        ignore: [], 
        copy: []
    }, q = y;
    f.isMapped = function (a) {
        return (a = e.utils.unwrapObservable(a)) && a[r]
    };
    f.fromJS = function (a) {
        if (0 == arguments.length) throw Error("When calling ko.fromJS, pass the object you want to convert.");
        window.setTimeout(function () {
            I = 0
        }, 0);
        I++ || (D = [], u = new N);
        var b, c;
        2 == arguments.length && (arguments[1][r] ? c = arguments[1] : b = arguments[1]);
        3 == arguments.length && (b = arguments[1], c = arguments[2]);
        b = c ? i(c[r], b) : i(b);
        b.mappedProperties = b.mappedProperties || {};    
        var d = C(c, a, b);
        c && (d = c);
        --I || window.setTimeout(function () {
            for (; D.length; ) {
                var a = D.pop();
                a && a()
            }
        }, 0);
        d[r] = i(d[r], b);
        return d
    };
    f.fromJSON = function (a) {
        var b = e.utils.parseJson(a);
        arguments[0] = b;
        return f.fromJS.apply(this, arguments)
    };
    f.updateFromJS = function () {
        throw Error("ko.mapping.updateFromJS, use ko.mapping.fromJS instead. Please note that the order of parameters is different!");
    };
    f.updateFromJSON = function () {
        throw Error("ko.mapping.updateFromJSON, use ko.mapping.fromJSON instead. Please note that the order of parameters is different!");
    };
    f.toJS = function (a, b) {
        if (0 == arguments.length) throw Error("When calling ko.mapping.toJS, pass the object you want to convert.");
        b = i(a[r], b);
        return H(a, function (a) {
            return e.utils.unwrapObservable(a)
        }, b)
    };
    f.toJSON = function (a, b) {
        var c = f.toJS(a, b);
        return e.utils.stringifyJson(c)
    };
    f.visitModel = function (a, b, c) {
        if (0 == arguments.length) throw Error("When calling ko.mapping.visitModel, pass the object you want to visit.");
        c = i(a[r], c);
        return H(a, b, c)
    };
    f.defaultOptions = function () {
        if (0 < arguments.length) q = arguments[0]; else return q
    };
    f.resetDefaultOptions = function () {
        q = {
            include: y.include.slice(0), 
            ignore: y.ignore.slice(0), 
            copy: y.copy.slice(0)
        }
    };
    f.getType = function (a) {
        if (a && "object" === typeof a) {
            if (a.constructor == (new Date).constructor) return "date";
            if (a.constructor == [].constructor) return "array"
        }
        return typeof a
    } 
});