/* =========================================================
   STARK SOCIAL — header JS
   Source: header only JS
   ========================================================= */

(function () {
  function setProgress() {
    var bar = document.querySelector('.stark-sticky-nav');
    if (!bar) return;

    var doc = document.documentElement;
    var scrollTop = doc.scrollTop || document.body.scrollTop;
    var scrollHeight = (doc.scrollHeight || document.body.scrollHeight) - doc.clientHeight;

    var p = scrollHeight > 0 ? (scrollTop / scrollHeight) : 0;
    p = Math.max(0, Math.min(1, p));

    bar.style.setProperty('--stark-scroll', p.toFixed(4));
  }

  setProgress();
  window.addEventListener('scroll', setProgress, { passive: true });
  window.addEventListener('resize', setProgress);
})();

(function () {
  function clamp(n, min, max){ return Math.max(min, Math.min(max, n)); }

  function setProgress() {
    var bar = document.querySelector('.stark-sticky-nav');
    if (!bar) return;

    var doc = document.documentElement;
    var scrollTop = doc.scrollTop || document.body.scrollTop;
    var scrollHeight = (doc.scrollHeight || document.body.scrollHeight) - doc.clientHeight;

    var p = scrollHeight > 0 ? (scrollTop / scrollHeight) : 0;
    p = clamp(p, 0, 1);

    // 1) progress variable for your edge-to-edge bar
    bar.style.setProperty('--stark-scroll', p.toFixed(4));

    // 2) Subtle color sync for hamburger on sticky:
    //    Blend from near-black -> Stark blue as you scroll
    //    (kept subtle so it still reads "high-end")
    var t = Math.pow(p, 0.85);            // easing for nicer ramp
    var mix = 0.22 * t;                   // max 35% brand tint
    // base (near-black)
    var r0 = 17,  g0 = 17,  b0 = 17;
    // brand-ish blue (tweak if you want)
    var r1 = 48,  g1 = 127, b1 = 226;

    var r = Math.round(r0 + (r1 - r0) * mix);
    var g = Math.round(g0 + (g1 - g0) * mix);
    var b = Math.round(b0 + (b1 - b0) * mix);

    // Keep opacity consistent / premium
    bar.style.setProperty('--stark-burger-color', 'rgba(' + r + ',' + g + ',' + b + ',0.85)');
  }

  setProgress();
  window.addEventListener('scroll', setProgress, { passive: true });
  window.addEventListener('resize', setProgress);
})();

(function () {
  var bar = null;
  var lastY = 0;
  var lastT = performance.now();
  var velSmoothed = 0;

  function clamp(n, a, b){ return Math.max(a, Math.min(b, n)); }

  function tick() {
    if (!bar) bar = document.querySelector('.stark-sticky-nav');
    if (!bar) return;

    var doc = document.documentElement;
    var y = doc.scrollTop || document.body.scrollTop || 0;
    var h = (doc.scrollHeight || document.body.scrollHeight) - doc.clientHeight;
    var p = h > 0 ? (y / h) : 0;
    p = clamp(p, 0, 1);

    var now = performance.now();
    var dy = Math.abs(y - lastY);
    var dt = Math.max(16, now - lastT); // avoid tiny dt spikes
    var v = dy / dt;                   // px per ms

    // Normalize velocity into 0..1 (tune these numbers)
    var vNorm = clamp((v - 0.2) / (2.0 - 0.2), 0, 1);

    // Smooth it so it feels premium
    velSmoothed = velSmoothed * 0.85 + vNorm * 0.15;

    bar.style.setProperty('--stark-scroll', p.toFixed(4));
    bar.style.setProperty('--stark-vel', velSmoothed.toFixed(4));

    lastY = y;
    lastT = now;
  }

  tick();
  window.addEventListener('scroll', tick, { passive: true });
  window.addEventListener('resize', tick);
})();
