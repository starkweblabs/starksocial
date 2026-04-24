/*!
 * stark-global.js
 * Season detection, scroll progress, velocity glow,
 * A11y button + back-to-top choreography.
 *
 * Phase 2: paste the live-site JS from WPCode "Stark Global JS" here.
 * Keep the IIFE wrapper and reduced-motion guard. The scroll progress bar
 * drives --stark-scroll (0..1); velocity drives --stark-vel.
 */
(function () {
	'use strict';

	var root   = document.documentElement;
	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* -----------------------------------------------------------------
	 * 1. Season — already set in <head> inline script, kept here as a
	 *    defensive re-apply for dynamic theme switchers.
	 * ----------------------------------------------------------------- */
	if (!root.getAttribute('data-stark-season')) {
		var m = new Date().getMonth();
		var s = 'winter';
		if (m >= 2 && m <= 4) s = 'spring';
		else if (m >= 5 && m <= 7) s = 'summer';
		else if (m >= 8 && m <= 10) s = 'fall';
		root.setAttribute('data-stark-season', s);
	}

	/* -----------------------------------------------------------------
	 * 2. Scroll progress (--stark-scroll)  —  PORT FROM LIVE
	 * ----------------------------------------------------------------- */
	// TODO: paste live scroll progress listener.
	//       Reads document scroll position, computes 0..1, writes via
	//       root.style.setProperty('--stark-scroll', value).
	//       Use requestAnimationFrame + passive: true.

	/* -----------------------------------------------------------------
	 * 3. Scroll velocity glow (--stark-vel)  —  PORT FROM LIVE
	 * ----------------------------------------------------------------- */
	// TODO: paste live velocity calc. Clamp, decay, write --stark-vel.

	/* -----------------------------------------------------------------
	 * 4. A11y slide-right + back-to-top slide-in  —  PORT FROM LIVE
	 * ----------------------------------------------------------------- */
	// TODO: paste coordination logic. At ~50% scroll, .stark-a11y-btn
	//       shifts left:10px → left:64px; .x-scroll-top slides in beside it.
	//       See STYLEGUIDE → Signature Features → #2.

	if (reduce) {
		root.style.setProperty('--stark-vel', '0');
	}
})();
