! function() {
    function e(e) {
        e = new Date(e.valueOf() - 6e4 * e.getTimezoneOffset());
        var n = e.toISOString().replace("Z", "");
        return n.substring(n.indexOf("T") + 1)
    }

    function n() {
        var e, n = 0,
            o = arguments;
        return o[0].replace(/(%?%[sdifoO])/g, function(t) {
            if (3 === t.length) return t;
            if (e = o[++n], null == e) return "" + e;
            switch (t.charAt(1)) {
                case "s":
                    return e;
                case "d":
                case "i":
                    return "number" == typeof e ? Math.floor(e) : "NaN";
                case "f":
                    return "number" == typeof e ? e : "NaN";
                default:
                    return "string" == typeof e ? v.quote(e) : v.getString(e)
            }
        })
    }

    function o() {
        for (; h.childNodes.length > b;) h.removeChild(h.firstChild)
    }

   

    function r(e) {
        m.style.display = e ? "block" : "none"
    }
}();