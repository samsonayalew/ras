(function() {
   var f = void 0, 
   h = null, i =!1, l, m = this; 
   function n(a) {
      for(var a = a.split("."), 
      b = m, c; c = a.shift(); )if(b[c] != h)b = b[c]; 
      else return h;
      return b}0
   function aa(a) {
      var b = typeof a; 
      if("object" == b)if(a) {
         if(a instanceof Array)return"array"; 
         if(a instanceof Object)return b; 
         var c = Object.prototype.toString.call(a); 
         if("[object Window]" == c)return"object"; 
         if("[object Array]" == c || "number" == typeof a.length && "undefined" != typeof a.splice && "undefined" != typeof a.propertyIsEnumerable &&!a.propertyIsEnumerable("splice"))return"array"; 
         if("[object Function]" == c || "undefined" != typeof a.call && "undefined" != typeof a.propertyIsEnumerable &&!a.propertyIsEnumerable("call"))return"function"}
      else return"null"; 
      else if("function" == b && "undefined" == typeof a.call)return"object"; 
      return b}
   function p(a) {
      return"string" == typeof a}
   var q = "closure_uid_" + Math.floor(2147483648 * Math.random()).toString(36), 
   ba = 0; 
   function ca(a, b, c) {
      return a.call.apply(a.bind, 
      arguments)}
   function da(a, b, c) {
      if(!a)throw Error(); 
      if(2 < arguments.length) {
         var d = Array.prototype.slice.call(arguments, 
         2); 
         return function() {
            var c = Array.prototype.slice.call(arguments); 
            Array.prototype.unshift.apply(c, 
            d); 
            return a.apply(b, 
            c)}
         }
      return function() {
         return a.apply(b, 
         arguments)}
      }
   function r(a, b, c) {
      r = Function.prototype.bind &&- 1 != Function.prototype.bind.toString().indexOf("native code") ? ca : da; 
      return r.apply(h, arguments)}
   function u(a, b) {
      var c = a.split("."), 
      d = m; 
      !(c[0]in d) && d.execScript && d.execScript("var " + c[0]); 
      for(var e; c.length && (e = c.shift()); )!c.length && b !== f ? d[e] = b : d = d[e] ? d[e] : d[e] = {
         }
      }
   function v(a, b) {
      function c() {
         }
      c.prototype = b.prototype; 
      a.m = b.prototype; 
      a.prototype = new c}
   Function.prototype.bind = Function.prototype.bind || function(a, 
   b) {
      if(1 < arguments.length) {
         var c = Array.prototype.slice.call(arguments, 
         1); 
         c.unshift(this, 
         a); 
         return r.apply(h, 
         c)}
      return r(this, 
      a)}; 
   var w = Array.prototype, 
   x = w.indexOf ? function(a, b, c) {
      return w.indexOf.call(a, b, c)}
   : function(a, b, c) {
      c = c == h ? 0 : 0 > c ? Math.max(0, 
      a.length + c) : c; 
      if(p(a))return!p(b) || 1 != b.length ?- 1 : a.indexOf(b, 
      c); 
      for(; c < a.length; c++)if(c in a && a[c] === b)return c; 
      return - 1}
   , y = w.forEach ? function(a, b, c) {
      w.forEach.call(a, b, c)}
   : function(a, b, c) {
      for(var d = a.length, 
      e = p(a) ? a.split("") : a, 
      g = 0; g < d; g++)g in e && b.call(c, e[g], g, a)}; 
   function ea(a, b, c) {
      return 2 >= arguments.length ? w.slice.call(a, 
      b) : w.slice.call(a, b, c)}; 
   var z, A, B, C; 
   function E() {
      return m.navigator ? m.navigator.userAgent : h}
   C = B = A = z = i; 
   var F; 
   if(F = E()) {
      var fa = m.navigator; 
      z = 0 == F.indexOf("Opera"); 
      A =!z &&- 1 != F.indexOf("MSIE"); 
      B =!z &&- 1 != F.indexOf("WebKit"); 
      C =!z &&!B && "Gecko" == fa.product}
   var G = A, H = C, ga = B, I; 
   a : {
      var J = "", 
      K; 
      if(z && m.opera)var L = m.opera.version, 
      J = "function" == typeof L ? L() : L; 
      else if(H ? K = /rv\:([^\);]+)(\)|;
      ) / : G ? K = /MSIE\s+([^\);
      ] + )(\) | ; 
      ) / : ga && (K = /WebKit\/(\S+)/),K)var ha=K.exec(E()),J=ha?ha[1]:"";if(G){var M,ia=m.document;M=ia?ia.documentMode:f;if(M>parseFloat(J)){I=String(M);break a}}I=J}var ja=I,ka={}; function la(a){if(!ka[a]){for(var b=0,c=String(ja).replace(/^[\s\xa0]+|[\s\xa0]+$/g,"").split("."),d=String(a).replace(/^[\s\xa0]+|[\s\xa0]+$/g,"").split("."),e=Math.max(c.length,d.length),g=0;
      0 == b && g < e; 
      g++) {
         var k = c[g] || "", 
         j = d[g] || "", 
         D = RegExp("(\\d*)(\\D*)", 
         "g"), Ca = RegExp("(\\d*)(\\D*)", "g"); 
         do {
            var s = D.exec(k) || ["", 
            "", 
            ""], 
            t = Ca.exec(j) || ["", 
            "", 
            ""]; 
            if(0 == s[0].length && 0 == t[0].length)break; 
            b = ((0 == s[1].length ? 0 : parseInt(s[1], 
            10)) < (0 == t[1].length ? 0 : parseInt(t[1], 
            10)) ?- 1 : (0 == s[1].length ? 0 : parseInt(s[1], 
            10)) > (0 == t[1].length ? 0 : parseInt(t[1], 
            10)) ? 1 : 0) || ((0 == s[2].length) < (0 == t[2].length) ?- 1 : (0 == s[2].length) > (0 == t[2].length) ? 1 : 0) || (s[2] < t[2] ?- 1 : s[2] > t[2] ? 1 : 0)}
         while(0 == b)}
      ka[a] = 0 <= b}
   }
var ma = {
   }; 
function na() {
   return ma[9] || (ma[9] = G &&!!document.documentMode && 9 <= document.documentMode)}; 
!G || na(); 
!H &&!G || G && na() || H && la("1.9.1"); 
G && la("9"); 
function oa(a, b, c) {
   var d = document, 
   c = c || d, a = a && "*" != a ? a.toUpperCase() : ""; 
   if(c.querySelectorAll && c.querySelector && (a || b))return c.querySelectorAll(a + (b ? "." + b : "")); 
   if(b && c.getElementsByClassName) {
      c = c.getElementsByClassName(b); 
      if(a) {
         for(var d = {
            }
         , e = 0, g = 0, k; k = c[g]; g++)a == k.nodeName && (d[e++] = k); 
         d.length = e; 
         return d}
      return c}
   c = c.getElementsByTagName(a || "*"); 
   if(b) {
      d = {
         }; 
      for(g = e = 0; k = c[g]; g++)a = k.className, 
      "function" == typeof a.split && 0 <= x(a.split(/\s+/),b)&&(d[e++]=k);
      d.length = e; 
      return d}
   return c}; 
function pa() {
   }; 
function N() {
   this.a = []; 
   this.d = {
      }
   }
v(N, pa); 
N.prototype.f = 1; 
N.prototype.c = 0; 
N.prototype.h = function(a, b) {
   var c = this.d[a]; 
   if(c) {
      this.c++; 
      for(var d = ea(arguments, 
      1), e = 0, g = c.length; e < g; e++) {
         var k = c[e]; 
         this.a[k + 1].apply(this.a[k + 2], 
         d)}
      this.c--; 
      if(this.b && 0 == this.c)for(; c = this.b.pop(); )if(0 != this.c)this.b || (this.b = []), 
      this.b.push(c); 
      else if(d = this.a[c]) {
         if(d = this.d[d])e = x(d, 
         c), 0 <= e && w.splice.call(d, e, 1); 
         delete this.a[c]; 
         delete this.a[c + 1]; 
         delete this.a[c + 2]}
      }
   }; 
var qa = RegExp("^(?:([^:/?#.]+):)?(?://(?:([^/?#]*)@)?([\\w\\d\\-\\u0100-\\uffff.%]*)(?::([0-9]+))?)?([^?#]+)?(?:\\?([^#]*))?(?:#(.*))?$"); 
function ra(a) {
   if(O) {
      O = i; 
      var b = m.location; 
      if(b) {
         var c = b.href; 
         if(c && (c = (c = ra(c)[3] || h) && decodeURIComponent(c)) && c != b.hostname)throw O =!0, 
         Error(); 
         }
      }
   return a.match(qa)}
var O = ga; 
function sa(a, b, c) {
   if("array" == aa(b))for(var d = 0; d < b.length; d++)sa(a, 
   String(b[d]), c); 
   else b != h && c.push("&", 
   a, "" === b ? "" : "=", encodeURIComponent(String(b)))}; 
var P = n("yt.dom.getNextId_"); 
if(!P) {
   P = function() {
      return++ta}; 
   u("yt.dom.getNextId_", P); 
   var ta = 0}; 
function Q(a) {
   if(a = a || window.event) {
      for(var b in a)b in ua || (this[b] = a[b]); 
      this.scale = a.scale; 
      this.rotation = a.rotation; 
      if((b = a.target || a.srcElement) && 3 == b.nodeType)b = b.parentNode; 
      this.target = b; 
      if(b = a.relatedTarget)try {
         b = b.nodeName && b}
      catch(c) {
         b = h}
      else"mouseover" == this.type ? b = a.fromElement : "mouseout" == this.type && (b = a.toElement); 
      this.relatedTarget = b; 
      this.clientX = a.clientX != f ? a.clientX : a.pageX; 
      this.clientY = a.clientY != f ? a.clientY : a.pageY; 
      if(document.body && document.documentElement) {
         b = document.body.scrollLeft + document.documentElement.scrollLeft; 
         var d = document.body.scrollTop + document.documentElement.scrollTop; 
         this.pageX = a.pageX != f ? a.pageX : a.clientX + b; 
         this.pageY = a.pageY != f ? a.pageY : a.clientY + d}
      this.keyCode = a.keyCode ? a.keyCode : a.which; 
      this.charCode = a.charCode || ("keypress" == this.type ? this.keyCode : 0); 
      this.altKey = a.altKey; 
      this.ctrlKey = a.ctrlKey; 
      this.shiftKey = a.shiftKey; 
      "MozMousePixelScroll" == this.type ? (this.wheelDeltaX = a.axis == a.HORIZONTAL_AXIS ? a.detail : 0, 
      this.wheelDeltaY = a.axis == a.HORIZONTAL_AXIS ? 0 : a.detail) : window.opera ? (this.wheelDeltaX = 0, 
      this.wheelDeltaY = a.detail) : 0 == a.wheelDelta % 120 ? "WebkitTransform"in document.documentElement.style ? window.a && 0 == navigator.platform.indexOf("Mac") ? (this.wheelDeltaX = a.wheelDeltaX / - 30, 
      this.wheelDeltaY = a.wheelDeltaY / - 30) : (this.wheelDeltaX = a.wheelDeltaX / - 1.2, 
      this.wheelDeltaY = a.wheelDeltaY / - 1.2) : (this.wheelDeltaX = 0, 
      this.wheelDeltaY = a.wheelDelta / - 1.6) : (this.wheelDeltaX = a.wheelDeltaX / - 3, 
      this.wheelDeltaY = a.wheelDeltaY / - 3)}
   }
l = Q.prototype; 
l.type = ""; 
l.target = h; 
l.relatedTarget = h; 
l.currentTarget = h; 
l.data = h; 
l.keyCode = 0; 
l.charCode = 0; 
l.altKey = i; 
l.ctrlKey = i; 
l.shiftKey = i; 
l.clientX = 0; 
l.clientY = 0; 
l.pageX = 0; 
l.pageY = 0; 
l.wheelDeltaX = 0; 
l.wheelDeltaY = 0; 
l.rotation = 0; 
l.scale = 1; 
var ua = {
   stopPropagation : 1, preventMouseEvent : 1, preventManipulation : 1, preventDefault : 1, layerX : 1, layerY : 1, scale : 1, rotation : 1}; 
var R = n("yt.events.listeners_") || {
   }; 
u("yt.events.listeners_", R); 
var va = n("yt.events.counter_") || {
   count : 0}; 
u("yt.events.counter_", va); 
function wa(a, b, c) {
   if(a && (a.addEventListener || a.attachEvent)) {
      var d; 
      a : {
         d = function(d) {
            return d[0] == a && d[1] == b && d[2] == c && d[4] == i}; 
         for(var e in R)if(d.call(f, 
         R[e])) {
            d = e; 
            break a}
         d = f}
      if(!d) {
         d =++va.count + ""; 
         e =!(!("mouseenter" == b || "mouseleave" == b) ||!a.addEventListener || "onmouseenter"in document); 
         var g; 
         g = e ? function(d) {
            var d = new Q(d), 
            e; 
            a : {
               e = d.relatedTarget; 
               for(var g = 0; e; ) {
                  if(e == a)break a; 
                  e = e.parentNode; 
                  g++}
               e = h}
            if(!e)return d.currentTarget = a, 
            d.type = b, c.call(a, d)}
         : function(b) {
            b = new Q(b); 
            b.currentTarget = a; 
            return c.call(a, 
            b)}; 
         R[d] = [a, b, c, g, i]; 
         a.addEventListener ? "mouseenter" == b && e ? a.addEventListener("mouseover", 
         g, i) : "mouseleave" == b && e ? a.addEventListener("mouseout", g, i) : "mousewheel" == b && "MozBoxSizing"in document.documentElement.style ? a.addEventListener("MozMousePixelScroll", g, i) : a.addEventListener(b, g, i) : a.attachEvent("on" + b, g)}
      }
   }; 
u("yt.config_", window.yt && window.yt.config_ || {
   }
); 
u("yt.tokens_", window.yt && window.yt.tokens_ || {
   }
); 
u("yt.globals_", window.yt && window.yt.globals_ || {
   }
); 
u("yt.msgs_", window.yt && window.yt.msgs_ || {
   }
); 
u("yt.timeouts_", window.yt && window.yt.timeouts_ || []); 
var xa = window.yt && window.yt.intervals_ || []; 
u("yt.intervals_", xa); 
function ya(a) {
   a = window.setInterval(a, 250); 
   xa.push(a); 
   return a}; 
var za = ["corp.google.com", 
"youtube.com", "youtube-nocookie.com"]; 
var Aa = window.YTConfig || {
   }; 
function S(a) {
   this.b = a || {
      }; 
   this.a = {
      }; 
   this.a.width = 640; 
   this.a.height = 390; 
   this.a.title = ""; 
   this.a.host = ("https:" == document.location.protocol ? "https:" : "http:") + "//www.youtube.com"}
var T = h; 
function U(a, b) {
   for(var c = [a.b, 
   Aa, a.a], d = 0; d < c.length; d++) {
      var e = c[d][b]; 
      if(e != f)return e}
   return h}
S.prototype.c = function(a) {
   if(a.origin == U(this, 
   "host") || RegExp("^https?://([a-z0-9-]{1,63}\\.)*(" + za.join("|").replace(/\./g,".")+")(:[0-9]+)?([/?#]|$)","i").test(a.origin))a=JSON.parse(a.data),T[a.id].j(a)}; function V(a,b){this.b=b;this.f=this.a=h;this.g=this.id=0;this.h=h;var c=p(a)?document.getElementById(a):a;if(c){if("iframe"!=c.tagName.toLowerCase()){var d=document.createElement("div");d.innerHTML+=n("YT.embed_template");for(var d=oa("iframe",h,d),d=d.length?d[0]:h,e=0,g=c.attributes.length;
   e < g; 
   e++)d.setAttribute(c.attributes[e].name, c.attributes[e].value); 
   d.removeAttribute("width"); 
   d.removeAttribute("height"); 
   d.removeAttribute("src"); 
   d.setAttribute("title", "YouTube " + U(this.b, "title")); 
   d.height = U(this.b, "height"); 
   d.width = U(this.b, "width"); 
   e = this.i(); 
   e.enablejsapi = window.postMessage ? 1 : 0; 
   window.location.host && (e.origin = window.location.protocol + "//" + window.location.host); 
   var g = U(this.b, 
   "host") + this.k() + "?", 
   k = [], j; 
   for(j in e)sa(j, e[j], k); 
   k[0] = ""; 
   d.src = g + k.join(""); 
   this.f = c; 
   (j = c.parentNode) && j.replaceChild(d, c); 
   c = d}
this.a = c; 
this.id = this[q] || (this[q] =++ba); 
if(window.JSON && window.postMessage) {
   this.h = new N; 
   c = this.b; 
   j = this.id; 
   T || (T = {
      }
   , wa(window, "message", r(c.c, c))); 
   T[j] = this; 
   this.g = ya(r(this.l, 
   this)); 
   wa(this.a, "load", r(function() {
      window.clearInterval(this.g); this.g = ya(r(this.l, 
      this))}
   , this)); 
   var c = U(this.b, 
   "events"), D; 
   for(D in c)c.hasOwnProperty(D) && this.addEventListener(D, 
   c[D])}
}
}
l = V.prototype; 
l.v = function() {
if(this.f) {
var a = this.a, b = a.parentNode; 
b && b.replaceChild(this.f, a)}
else(a = this.a) && a.parentNode && a.parentNode.removeChild(a)}; 
l.i = function() {
return {
}
}; 
l.l = function() {
this.a && this.a.contentWindow ? Ba(this, 
{
event : "listening"}
) : window.clearInterval(this.g)}; 
l.j = function(a) {
this.e(a.event, a)}; 
l.addEventListener = function(a, b) {
var c = b; 
"string" == typeof b && (c = function() {
window[b].apply(window, arguments)}
); 
var d = this.h, e = d.d[a]; 
e || (e = d.d[a] = []); 
var g = d.f; 
d.a[g] = a; 
d.a[g + 1] = c; 
d.a[g + 2] = f; 
d.f = g + 3; 
e.push(g); 
W(this, "addEventListener", [a]); 
return this}; 
l.e = function(a, b) {
this.h.h(a, {
target : this, data : b}
)}; 
function W(a, b, c) {
c = c || []; 
c = Array.prototype.slice.call(c); 
Ba(a, {
event : "command", func : b, args : c}
)}
function Ba(a, b) {
b.id = a.id; 
var c = JSON.stringify(b), d = ra(a.a.src), e = d[1], g = d[2], k = d[3], d = d[4], j = ""; 
e && (j += e + ":"); 
k && (j += "//", g && (j += g + "@"), j += k, d && (j += ":" + d)); 
a.a.contentWindow.postMessage(c, j)}
l.w = function(a, b) {
this.a.width = a; 
this.a.height = b; 
return this}; 
l.n = function() {
return this.a}; 
var Da = {
"0" : "onEnded", 1 : "onPlaying", 2 : "onPaused", 3 : "onBuffering", 5 : "onVideoCued"}; 
function Ea(a) {
S.call(this, a); 
this.a.title = "video player"; 
this.a.videoId = ""}
v(Ea, S); 
function X(a, b) {
V.call(this, a, new Ea(b)); 
this.d = {
}; 
this.c = {
}
}
v(X, V); 
l = X.prototype; 
l.k = function() {
return"/embed/" + U(this.b, 
"videoId")}; 
l.i = function() {
return U(this.b, "playerVars") || {
}
}; 
l.j = function(a) {
switch(a.event) {
case "onReady" : window.clearInterval(this.g); 
this.e("onReady"); 
break; 
case "onStateChange" : var b = a.info.playerState; 
Y(this, a); 
this.e("onStateChange", 
b); 
- 1 != b && this.e(Da[b]); 
break; 
case "onPlaybackQualityChange" : Y(this, 
a); 
this.e("onPlaybackQualityChange", 
this.d.playbackQuality); 
break; 
case "onPlaybackRateChange" : Y(this, 
a); 
this.e("onPlaybackRateChange", 
this.d.playbackRate); 
break; 
case "onError" : this.e("onError", 
a.error); 
break; 
case "onApiChange" : a = a.info || {
   }; 
for(b in a)this.c[b] = a[b]; 
this.e("onApiChange"); 
break; 
case "infoDelivery" : Y(this, 
a); 
break; 
case "initialDelivery" : this.d = {
   }; 
this.c = {
   }; 
y(a.apiInterface, function(a) {
   this[a] || (this[a] = 0 == a.search("cue") || 0 == a.search("load") ? function() {
      this.d = {
         }; this.c = {
         }; W(this, a, arguments); return this}
   : 0 == a.search("get") || 0 == a.search("is") ? function() {
      var b = 0; 0 == a.search("get") ? b = 3 : 0 == a.search("is") && (b = 2); return this.d[a.charAt(b).toLowerCase() + a.substr(b + 1)]}
   : function() {
      W(this, a, arguments); return this}
   )}
, this); 
Y(this, a); 
break; 
case "onFullScreenToggleRequest" : this.e("onFullScreenToggleRequest"); 
break; 
default : Y(this, a), this.e(a.event, a.info)}
}; 
function Y(a, b) {
var c = b.info || {
}
, d; 
for(d in c)a.d[d] = c[d]}
l.u = function() {
var a = this.a.cloneNode(i), 
b = this.d.videoData, c = U(this.b, "host"); 
a.src = b && b.video_id ? c + "/embed/" + b.video_id : a.src; 
b = document.createElement("div"); 
b.appendChild(a); 
return b.innerHTML}; 
l.t = function(a) {
return!this.c.namespaces ? [] :!a ? this.c.namespaces || [] : this.c[a].options || []}; 
l.s = function(a, b) {
if(this.c.namespaces && a && b)return this.c[a][b]}; 
function Fa(a) {
S.call(this, a)}
v(Fa, S); 
function Z(a, b) {
V.call(this, a, new Fa(b))}
v(Z, V); 
function Ga() {
var a; 
a = document; 
a = a.querySelectorAll && a.querySelector ? a.querySelectorAll(".youtube-subscribe-embed") : a.getElementsByClassName ? a.getElementsByClassName("youtube-subscribe-embed") : oa("*", 
"youtube-subscribe-embed", f); 
y(a, function(a) {
new Z(a)}
)}
Z.prototype.j = function(a) {
a.width && this.a.setAttribute("width", 
a.width)}; 
function Ha(a) {
S.call(this, a); 
this.a.host = "https://www.youtube.com"; 
this.a.title = "upload widget"; 
this.a.height = 0.67 * U(this, 
"width")}
v(Ha, S); 
function $(a, b) {
V.call(this, a, new Ha(b))}
v($, V); 
l = $.prototype; 
l.k = function() {
return"/upload_embed"}; 
l.i = function() {
var a = {
}
, b = U(this.b, "webcamOnly"); 
b != h && (a.webcam_only = b); 
return a}; 
l.e = function(a, b) {
$.m.e.call(this, a, b); 
"onApiReady" == a && W(this, 
"hostWindowReady")}; 
l.o = function(a) {
W(this, "setVideoDescription", arguments)}; 
l.p = function(a) {
W(this, "setVideoKeywords", arguments)}; 
l.q = function(a) {
W(this, "setVideoPrivacy", arguments)}; 
l.r = function(a) {
W(this, "setVideoTitle", arguments)}; 
u("YT.PlayerState.ENDED", 0); 
u("YT.PlayerState.PLAYING", 1); 
u("YT.PlayerState.PAUSED", 2); 
u("YT.PlayerState.BUFFERING", 3); 
u("YT.PlayerState.CUED", 5); 
u("YT.UploadWidgetEvent.API_READY", "onApiReady"); 
u("YT.UploadWidgetEvent.UPLOAD_SUCCESS", "onUploadSuccess"); 
u("YT.UploadWidgetEvent.PROCESSING_COMPLETE", "onProcessingComplete"); 
u("YT.UploadWidgetEvent.STATE_CHANGE", "onStateChange"); 
u("YT.UploadWidgetState.IDLE", 0); 
u("YT.UploadWidgetState.PENDING", 1); 
u("YT.UploadWidgetState.ERROR", 2); 
u("YT.UploadWidgetState.PLAYBACK", 3); 
u("YT.UploadWidgetState.RECORDING", 4); 
u("YT.UploadWidgetState.STOPPED", 5); 
u("YT.SubscribeEmbed.setup", Ga); 
u("YT.Player", X); 
u("YT.UploadWidget", $); 
V.prototype.destroy = V.prototype.v; 
V.prototype.setSize = V.prototype.w; 
V.prototype.getIframe = V.prototype.n; 
V.prototype.addEventListener = V.prototype.addEventListener; 
X.prototype.getVideoEmbedCode = X.prototype.u; 
X.prototype.getOptions = X.prototype.t; 
X.prototype.getOption = X.prototype.s; 
$.prototype.setVideoDescription = $.prototype.o; 
$.prototype.setVideoKeywords = $.prototype.p; 
$.prototype.setVideoPrivacy = $.prototype.q; 
$.prototype.setVideoTitle = $.prototype.r; 
Ga(); 
var Ia = n("onYouTubeIframeAPIReady"); 
Ia && Ia(); 
var Ja = n("onYouTubePlayerAPIReady"); 
Ja && Ja(); 
}
)(); 