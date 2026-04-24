/*!
 * stark-reveal.js
 * Reveal-on-scroll (.stark-reveal) + tilt (.stark-tilt).
 *
 * Phase 2: paste the live-site JS from WPCode here. Keep the IIFE wrapper,
 * reduced-motion guard, and block-editor guard.
 */
(function () {
	'use strict';

	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	// Editor / preview guard — skip inside the block editor.
	if (document.body && document.body.classList.contains('block-editor-page')) {
		return;
	}

	if (reduce) {
		// Reveal everything immediately, no animation.
		document.querySelectorAll('.stark-reveal').forEach(function (el) {
			el.classList.add('is-revealed');
		});
		return;
	}

	/* -----------------------------------------------------------------
	 * 1. Reveal on scroll  —  PORT FROM LIVE
	 * ----------------------------------------------------------------- */
	// TODO: IntersectionObserver with threshold 0.15 that adds
	//       .is-revealed to .stark-reveal elements entering viewport.

	/* -----------------------------------------------------------------
	 * 2. Tilt on mousemove  —  PORT FROM LIVE
	 * ----------------------------------------------------------------- */
	// TODO: tilt handler for .stark-tilt. Clamp ±3deg,
	//       requestAnimationFrame, reset on mouseleave.
})();
