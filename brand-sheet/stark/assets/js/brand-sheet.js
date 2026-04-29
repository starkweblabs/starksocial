/**
 * Stark Brand Sheet — minimal interactivity.
 * Click-to-copy on any element with a data-copy attribute (text buttons,
 * color swatches, gradient code blocks). Brief feedback state via .is-copied.
 */
(function () {
  'use strict';

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-copy]');
    if (!btn) return;

    var text = btn.dataset.copy;
    if (!text) return;

    // Some buttons display their value as text (e.g. "#004C97"); some are
    // pure color chips with no text. Only swap textContent for the former.
    var hasText = btn.textContent && btn.textContent.trim().length > 0;
    var original = hasText ? btn.textContent : null;

    var done = function () {
      btn.classList.add('is-copied');
      if (hasText) btn.textContent = 'Copied';
      setTimeout(function () {
        btn.classList.remove('is-copied');
        if (hasText) btn.textContent = original;
      }, 1100);
    };

    var fallback = function () {
      var ta = document.createElement('textarea');
      ta.value = text;
      ta.setAttribute('readonly', '');
      ta.style.position = 'absolute';
      ta.style.left = '-9999px';
      document.body.appendChild(ta);
      ta.select();
      try { document.execCommand('copy'); done(); } catch (_) {}
      document.body.removeChild(ta);
    };

    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(text).then(done).catch(fallback);
    } else {
      fallback();
    }
  });
})();
