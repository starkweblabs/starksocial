/* =========================================================
   STARK SOCIAL — GLOBAL JS
   Source: WPCode global JS injection on starksocial.com
   Copy full contents from WPCode → JS snippets → Global
   ========================================================= */

(function(){
  var m = new Date().getMonth() + 1; // 1..12
  var season =
    (m >= 3 && m <= 5) ? "spring" :
    (m >= 6 && m <= 8) ? "summer" :
    (m >= 9 && m <= 11) ? "fall"   : "winter";

  document.documentElement.setAttribute("data-stark-season", season);
})();

(function () {
  // ---------- 1) Scroll progress (if you already have this, keep yours or merge) ----------
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

  // ---------- 2) Scroll velocity -> CSS variable (0..1) ----------
  var lastY = window.scrollY || 0;
  var lastT = performance.now();
  var vel = 0;

  function setVelocity() {
    var y = window.scrollY || 0;
    var t = performance.now();
    var dy = Math.abs(y - lastY);
    var dt = Math.max(16, (t - lastT)); // ms

    // px/ms -> normalize to 0..1 (tweak divisor for taste)
    var v = (dy / dt) / 1.2;
    vel = Math.max(0, Math.min(1, v));

    document.documentElement.style.setProperty('--stark-vel', vel.toFixed(3));

    lastY = y;
    lastT = t;
  }

  // ---------- 3) Seasonal accent (optional) ----------
  function setSeasonAccent() {
    var m = new Date().getMonth(); // 0..11
    // You can tweak these; keeping it "Stark" and subtle.
    var accent = '#307FE2'; // default

    // Winter (Dec–Feb): slightly icier
    if (m === 11 || m === 0 || m === 1) accent = '#2F7CFF';

    // Spring (Mar–May): slightly brighter
    if (m === 2 || m === 3 || m === 4) accent = '#2C86F3';

    // Summer (Jun–Aug): a hair deeper
    if (m === 5 || m === 6 || m === 7) accent = '#246ED6';

    // Fall (Sep–Nov): slightly muted
    if (m === 8 || m === 9 || m === 10) accent = '#2B74D9';

    document.documentElement.style.setProperty('--stark-accent', accent);
  }

  setSeasonAccent();
  setProgress();
  setVelocity();

  window.addEventListener('scroll', function () {
    setProgress();
    setVelocity();
  }, { passive: true });

  window.addEventListener('resize', function () {
    setProgress();
    setVelocity();
  });
})();

(function () {
  function init() {
    const btn = document.querySelector('.stark-a11y-btn');
    if (!btn) return;

    // Put it at the top level so no footer wrappers interfere
    if (btn.parentElement !== document.body) document.body.appendChild(btn);

    const START_LEFT = 10;   // px from left edge
    const SHIFT = 54;        // how far to move right by 50% scroll
    const TRIGGER_AT = 0.50; // finish at 50% scroll

    const reduceMotion =
      window.matchMedia &&
      window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const easeOut = (t) => 1 - Math.pow(1 - t, 3);

    function apply(leftPx) {
      // Force left positioning no matter what
      btn.style.setProperty('position', 'fixed', 'important');
      btn.style.setProperty('left', leftPx + 'px', 'important');
      btn.style.setProperty('right', 'auto', 'important'); // critical
      btn.style.setProperty('bottom', 'clamp(14px, 2vw, 22px)', 'important');
      btn.style.setProperty('z-index', '99998', 'important');
    }

    function update() {
      const doc = document.documentElement;
      const scrollTop = window.scrollY || doc.scrollTop || 0;
      const maxScroll = (doc.scrollHeight || 0) - (window.innerHeight || 0);
      if (maxScroll <= 0) return;

      let t = (scrollTop / maxScroll) / TRIGGER_AT;
      t = Math.max(0, Math.min(1, t));

      const p = reduceMotion ? 1 : easeOut(t);
      const left = Math.round(START_LEFT + (SHIFT * p));

      apply(left);
    }

    // Start at 10px immediately
    apply(START_LEFT);

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
