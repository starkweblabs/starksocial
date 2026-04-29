/* =========================================================
   PAGE JS: Contact
   Source: Cornerstone page settings → Custom JS
   ========================================================= */

/* Stark Contact Page JS (ES5-safe)
   - Adds .stark-scrolled to <body> after small scroll
   - Adds .stark-submitting to wrapper on submit
   - Adds .stark-gf-success-anim to confirmation wrapper on AJAX success
*/
(function () {
  var SCROLLED_CLASS = 'stark-scrolled';
  var SUBMITTING_CLASS = 'stark-submitting';
  var CONFIRM_ANIM_CLASS = 'stark-gf-success-anim';

  var body = document.body;

  // Scroll class
  function onScroll() {
    if (window.scrollY > 10) body.classList.add(SCROLLED_CLASS);
    else body.classList.remove(SCROLLED_CLASS);
  }
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  // Add submitting class (captures both AJAX + non-AJAX)
  document.addEventListener(
    'submit',
    function (e) {
      var form = e.target;
      if (!form || !form.id) return;
      if (form.id.indexOf('gform_') !== 0) return;

      var wrap = form.closest ? form.closest('.gform_wrapper') : null;
      if (wrap) wrap.classList.add(SUBMITTING_CLASS);
    },
    true
  );

  // Gravity Forms AJAX confirmation
  document.addEventListener('gform_confirmation_loaded', function (event) {
    var formId = null;

    if (event && event.detail && event.detail.formId) {
      formId = event.detail.formId;
    }

    // Remove submitting state
    var wrap = null;
    if (formId) wrap = document.getElementById('gform_wrapper_' + formId);
    if (!wrap) wrap = document.querySelector('.gform_wrapper');
    if (wrap) wrap.classList.remove(SUBMITTING_CLASS);

    // Animate confirmation wrapper (this exists AFTER submit)
    var confirm = null;
    if (formId) confirm = document.getElementById('gform_confirmation_wrapper_' + formId);
    if (!confirm) confirm = document.querySelector('.gform_confirmation_wrapper');

    if (confirm) {
      confirm.classList.remove(CONFIRM_ANIM_CLASS);
      confirm.offsetWidth; // reflow
      confirm.classList.add(CONFIRM_ANIM_CLASS);

      window.setTimeout(function () {
        confirm.classList.remove(CONFIRM_ANIM_CLASS);
      }, 1800);
    }
  });
})();

