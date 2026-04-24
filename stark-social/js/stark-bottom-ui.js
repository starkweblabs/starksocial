/*!
 * stark-bottom-ui.js — v2
 * Bottom-left cluster choreography: A11y + back-to-top.
 * Interruptible scroll-to-top (cancels on touch/wheel/keydown/mousedown).
 *
 * Sets on <html>:
 *   data-stark-cluster="rest|active"
 *   style: --stark-progress = 0..1
 */
(function () {
  'use strict';

  var root       = document.documentElement;
  var a11y       = null;
  var backToTop  = null;

  var SHOW_AT    = 0.50;
  var HIDE_AT    = 0.40;
  var SCROLL_MS  = 520;

  var clusterActive = false;
  var reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var scrollRAF   = 0;
  var scrollAbort = false;

  function clamp(n, min, max) { return Math.max(min, Math.min(max, n)); }

  function resolveElements() {
    if (!a11y)      a11y      = document.querySelector('.stark-a11y-btn');
    if (!backToTop) backToTop = document.querySelector('.stark-back-to-top');
  }

  function computeProgress() {
    var doc    = document.documentElement;
    var body   = document.body;
    var top    = doc.scrollTop || (body ? body.scrollTop : 0) || 0;
    var height = ((doc.scrollHeight || (body ? body.scrollHeight : 0)) - doc.clientHeight) || 0;
    return height > 0 ? clamp(top / height, 0, 1) : 0;
  }

  function update() {
    resolveElements();
    var p = computeProgress();
    root.style.setProperty('--stark-progress', p.toFixed(4));

    if (!clusterActive && p >= SHOW_AT) {
      clusterActive = true;
      root.setAttribute('data-stark-cluster', 'active');
    } else if (clusterActive && p < HIDE_AT) {
      clusterActive = false;
      root.setAttribute('data-stark-cluster', 'rest');
    }
  }

  function scrollToTop(e) {
    if (e) e.preventDefault();
    if (reducedMotion) { window.scrollTo(0, 0); return; }

    if (scrollRAF) { cancelAnimationFrame(scrollRAF); scrollRAF = 0; }

    var startY = window.pageYOffset || document.documentElement.scrollTop || 0;
    if (startY === 0) return;
    var startT = 0;
    scrollAbort = false;

    function ease(t) { var u = 1 - t; return 1 - (u * u * u); }

    function step(ts) {
      if (scrollAbort) { scrollRAF = 0; return; }
      if (!startT) startT = ts;
      var elapsed = ts - startT;
      var t = clamp(elapsed / SCROLL_MS, 0, 1);
      window.scrollTo(0, Math.round(startY * (1 - ease(t))));
      if (t < 1) { scrollRAF = requestAnimationFrame(step); }
      else       { scrollRAF = 0; }
    }

    scrollRAF = requestAnimationFrame(step);
  }

  function abortScroll() { if (scrollRAF) scrollAbort = true; }

  function init() {
    root.setAttribute('data-stark-cluster', 'rest');
    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);

    document.addEventListener('click', function (e) {
      var target = e.target && e.target.closest ? e.target.closest('.stark-back-to-top') : null;
      if (target) scrollToTop(e);
    });

    var abortEvents = ['touchstart', 'wheel', 'keydown', 'mousedown'];
    for (var i = 0; i < abortEvents.length; i++) {
      window.addEventListener(abortEvents[i], abortScroll, { passive: true });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
