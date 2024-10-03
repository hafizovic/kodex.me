<footer class="footer" data-scheme="dark">
	<div class="wrap px">

		<div>
			<div class="footer-logo">
                <img class="d-block" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/dist/img/logo-light.png' ); ?>" width="132" height="40" alt="Logo">
<!--                <svg class="d-block" width="169" height="40"><use xlink:href="#i-logo" /></svg>-->
				<?php if( !empty( get_bloginfo( 'description' ) ) ) : ?><span><?php echo get_bloginfo( 'description' ); ?></span><?php endif; ?>
			</div>
		</div>

		<div style="padding: 12px 0">
			<?php
			$privacy_policy_page = get_option( 'wp_page_for_privacy_policy' );
			$privacyPolicyTitle = get_the_title($privacy_policy_page);

			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu' => 'footer',
					'container' => 'div',
					'container_class' => 'footer-menu',
					'menu_class' => false,
					'container_aria_label' => esc_attr__( 'Navigacija', 'dizajn' ),
					'items_wrap' => '<ul class="%2$s">%3$s<li><a href="#" data-cc="show-preferencesModal" aria-haspopup="dialog">Kolačići</a></li><li><a href="' . get_privacy_policy_url() . '">' . $privacyPolicyTitle . '</a></li></ul>',
					'depth' => 1,
				)
			);
			?>

			<svg xmlns="http://www.w3.org/2000/svg" style="position: absolute; top: 0; left: -999em">
				<defs><linearGradient id="logo" x1="0" x2="1" y1="0" y2="0" gradientTransform="matrix(26.324 0 0 26.324 79.57 19.55)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ff1702" /><stop offset="1" stop-color="#d89013" /></linearGradient></defs>
				<symbol id="i-appstore" viewBox="0 0 270 80" fill="currentColor" stroke="none"><path d="M130.3 21.1s0-2.1 2.1-2.1c2 0 1.9 2.2 1.9 2.2v5.7h2.1v-5.7s.1-4-3.3-4c-2.2 0-3 1.7-3 1.7l-.1-1.5h-1.9l.1 2.7v6.8h2.1v-5.8Zm94.6 0s0-2.1 2.1-2.1c2 0 1.9 2.2 1.9 2.2v5.7h2.1v-5.7s.1-4-3.3-4c-2.2 0-2.8 1.7-2.8 1.7v-5.8h-2.1v13.8h2.1v-5.8Zm-82 42.3c11.3 0 11.3-20 .6-20-4.9 0-6.6 3.6-6.6 3.6l-.2-3.2h-3.8l.2 4.3v22.7h4.3V60.7s1.3 2.7 5.5 2.7Zm-.8-16.6c6.7 0 6.7 13.3-.1 13.3-4.5 0-4.6-4.7-4.6-4.7v-3.5s.1-5.1 4.7-5.1Zm-32.3-24.7c0-6.5-9.2-6.5-9.2.1 0 6.7 9.2 6.5 9.2-.1Zm-2.2 0c0 4.6-4.9 4.7-4.9.1 0-4.5 4.9-4.6 4.9-.1Zm46.9 0c0-6.5-9.2-6.5-9.2.1 0 6.7 9.2 6.5 9.2-.1Zm-2.2 0c0 4.6-4.9 4.7-4.9.1 0-4.5 4.9-4.6 4.9-.1Zm47.4-1s0-2.1 2.1-2.1c2 0 1.9 2.2 1.9 2.2v5.7h2.1v-5.7s.1-4-3.3-4c-2.2 0-3 1.7-3 1.7l-.1-1.5h-1.9l.1 2.7v6.8h2.1v-5.8ZM65.8 29.8s-3.3-5.1-10.1-5.1c-3.8 0-7 2.4-9 2.4-2.4 0-4.6-2.2-8.5-2.2-7.5 0-13.7 7.1-12.5 17.9 1.1 9.7 8 20.7 13.1 20.7 3.2 0 4.6-2.1 8.5-2.1 3.9 0 5 2 8.4 2 5.7 0 10.4-10.1 11.4-13.5-7.9-3.2-9.9-14.7-1.3-20.1Zm-9.3-17.4c-5.5.4-10.8 5.8-10.2 11.8 5.9.2 10.8-5.8 10.2-11.8ZM107.3 63l-8.6-26.6h-5.3L84.8 63h4.4l2.4-7.8h8.7l2.4 7.8h4.6Zm-7.8-11.1h-7.1l3.5-11.7 3.6 11.7Zm21.3 11.5c11.3 0 11.3-20 .6-20-4.9 0-6.6 3.6-6.6 3.6l-.2-3.2h-3.8l.2 4.6v22.4h4.3V60.7s1.3 2.7 5.5 2.7Zm-.8-16.6c6.8 0 6.8 13.3-.1 13.3-4.5 0-4.6-4.7-4.6-4.7v-3.5s.1-5.1 4.7-5.1Zm46.5 16.6c5.5 0 9.6-2.7 9.6-7.9 0-4.2-3-6.3-6.7-7.8-2.4-1-5.1-2-5.1-4.7 0-2.3 2.1-3.5 4.6-3.5 2.9 0 5.1 1.2 5.1 1.2l1.1-3.4S172.9 36 169 36c-4.9 0-9 2.8-9 7.5 0 3.3 2.3 5.9 7 7.6 2.6.9 4.8 2.1 4.8 4.8 0 2.7-2.2 4-5.1 4-3.7 0-6.1-1.7-6.1-1.7l-1 3.5s2.1 1.7 6.9 1.7Zm14.8-6.7c0 4.3 1.5 6.7 5.4 6.7 2.1 0 3.3-.5 3.3-.5l-.1-3.2s-.8.2-1.9.2c-1.7 0-2.5-1.2-2.5-3.6V47h4.7v-3.2h-4.7V39l-4.2 1.3v3.5h-2.8V47h2.8v9.7Zm30.1-3.4c0-13.3-18.8-13.4-18.8.3 0 13.3 18.8 13.1 18.8-.3Zm-4.4.1c0 9.2-10.1 9.3-10.1.1 0-9.1 10.1-9.3 10.1-.1Zm12.4-1s.1-5 4.5-5c.7 0 1.3.1 1.3.1v-4s-.6-.1-1-.1c-4.2 0-5.3 4.3-5.3 4.3l-.2-3.9H215l.1 4.1V63h4.3V52.4Zm17.4 11c3.7 0 6.4-1.2 6.4-1.2l-.6-3s-1.9.9-5.2.9c-6.3 0-6-5.7-6-5.7h12.8c.6-6-1.8-11-7.9-11-6.5 0-9 5.7-9 10.2 0 5.2 2.9 9.8 9.5 9.8Zm-5.4-12c0-1 1-5.1 4.6-5.1 4.5 0 4.2 5.1 4.2 5.1h-8.8ZM98.1 20c0-4.2-2.6-6.3-7.1-6.3-2 0-3.6.3-3.6.3v12.8s1.8.2 3 .2c4.8 0 7.7-2.3 7.7-7Zm-2.2.1c0 3.3-1.7 5.2-5 5.2-.9 0-1.5-.1-1.5-.1v-9.7s1-.1 1.7-.1c3.2 0 4.8 1.6 4.8 4.7Zm29.6-2.7h-2l-1.9 7.5-2-7.5h-1.7l-2.2 7.5-1.7-7.5h-2.1l2.8 9.5h2l2-7 1.9 7h2l2.9-9.5Zm14.6 9.5h2.1V13.1h-2.1v13.8Zm16.8-2.6c0 3.1 4.1 3.7 5.7 1.5l.2 1.1h1.9l-.2-1.8v-4c0-2.6-1.2-3.9-3.7-3.9-2 0-3.2.8-3.2.8l.4 1.4s.9-.7 2.5-.7c1.4 0 1.9.7 1.9 2.1-2.8-.1-5.5.9-5.5 3.5Zm2.1-.2c0-2.3 3.5-1.9 3.5-1.9v1.4c0 2.2-3.5 2.8-3.5.5Zm12.5 3c2.4 0 3.1-1.7 3.1-1.7l.1 1.5h1.9s-.1-1.4-.1-2.6V13.1h-2.1v5.4s-.7-1.3-2.7-1.3c-5.4 0-5.6 9.9-.2 9.9Zm.7-8.2c2.2 0 2.2 2.4 2.2 2.4v1.6s0 2.5-2.3 2.5c-3.2 0-3.4-6.5.1-6.5Zm22.3 3.2c0-6.5-9.2-6.5-9.2.1 0 6.7 9.2 6.5 9.2-.1Zm-2.2 0c0 4.6-4.9 4.7-4.9.1 0-4.5 4.9-4.6 4.9-.1Zm23.2 1.7c0 2 .8 3.3 2.6 3.3 1.2 0 1.7-.3 1.7-.3l-.1-1.6s-.3.1-.9.1c-.8 0-1.2-.5-1.2-1.7V19h2.3v-1.6h-2.3v-2.3l-2.1.6v1.7h-1.4V19h1.4v4.8Zm23.2 3.2c2 0 3.2-.5 3.2-.5l-.3-1.5s-.8.4-2.6.4c-3.1 0-3-2.7-3-2.7h6.3c.5-2.3-.6-5.5-3.8-5.5-2.9 0-4.5 2.5-4.5 5.1 0 2.4 1.3 4.7 4.7 4.7Zm-2.7-5.8s.2-2.5 2.3-2.5c2.3 0 2.1 2.5 2.1 2.5H236Z" /></symbol>
				<symbol id="i-googleplay" viewBox="0 0 270 80" fill="currentColor" stroke="none"><path fill="url(#logo)" fill-rule="nonzero" d="M499 464 235 664c-8-3-14-12-14-25V290c0-14 6-23 15-26l263 200Z" transform="scale(.1)" /><path fill="url(#b)" fill-rule="nonzero" d="M499 530 258 661c-9 5-17 5-23 3l211-213 53 79Z" transform="scale(.1)" /><path fill="url(#c)" fill-rule="nonzero" d="M236 264c6-2 14-1 22 4l240 131-53 77-209-212Z" transform="scale(.1)" /><path fill="url(#d)" fill-rule="nonzero" d="m498 399 85 46c20 11 20 28 0 39l-84 46-66-66 65-65Z" transform="scale(.1)" /><path fill-rule="nonzero" d="M129.2 23a6 6 0 0 0 6.1-6.1c0-3.5-2.7-6.2-6.1-6.2-3.4 0-6.1 2.8-6.1 6.2 0 3.4 2.7 6.1 6.1 6.1Zm0-1.4c-2.6 0-4.5-2.1-4.5-4.7s1.9-4.8 4.5-4.8 4.6 2.2 4.6 4.8c0 2.6-2 4.7-4.6 4.7Zm-1.4 37.3c5 0 8.9-3.8 8.9-8.8 0-5-3.9-8.9-8.9-8.9s-8.9 3.9-8.9 8.9 3.9 8.8 8.9 8.8Zm0-3.5c-2.8 0-5-2.4-5-5.3 0-3 2.1-5.4 5-5.4 3 0 5 2.3 5 5.4 0 2.9-2.2 5.3-5 5.3Zm24 1.3v1.5c0 3.2-1.6 5.1-4.7 5.1-3.4 0-4.4-3.1-4.4-3.1l-3.4 1.4s1.9 5.2 7.8 5.2c5.4 0 8.4-3.5 8.4-9.2V41.8h-3.7v1.5c-.7-1-2.6-2.1-4.7-2.1-4.7 0-8.5 4.1-8.5 8.9 0 4.7 3.8 8.8 8.5 8.8 2.1 0 3.9-.9 4.7-2.2Zm103-15.6c0-.1-4.6-.1-4.6-.1l-4.7 11.8-5.1-11.8-4.4.1 7.4 16.7-4.1 8.7h4.4l11.1-25.4Zm-24.4 15h.2v2.4h3.9V48c0-5.4-3.8-8-8.4-8-5.6 0-7.3 4.1-7.3 4.1l3.4 1.6s1-2.1 3.9-2.1c2.1 0 4.4 1.3 4.4 3.9-3.2-1.8-12.3-1.3-12.3 5.3 0 4.9 4.9 6.3 6.8 6.3 2.5 0 4.1-1 5.4-3Zm-57 2.8c3.5 0 6-1.9 7.4-3.9l-3.1-2s-1.2 2.4-4.3 2.4c-1.9 0-3.4-.9-4.3-2.7l11.8-4.9c-1.1-3.3-3.6-6.6-7.9-6.6-4.9 0-8.4 3.9-8.4 8.9s3.8 8.8 8.8 8.8Zm-65 0c5 0 8.9-3.8 8.9-8.8 0-5-3.9-8.9-8.9-8.9s-8.9 3.9-8.9 8.9 3.9 8.8 8.9 8.8Zm-23.3 0c8 0 14-6 12.6-15H85.1v3.8H94c-.5 4.7-4 7.4-8.9 7.4a9.8 9.8 0 0 1-9.9-9.9c0-5.7 4.4-10 9.9-10 2.6 0 4.8.9 6.7 2.7l2.7-2.7c-2.7-2.4-5.8-3.8-9.4-3.8-7.5 0-14 6.2-14 13.8 0 7.6 6.4 13.7 14 13.7Zm129.9-.4V32.7h-3.9v25.8h3.9Zm-15.6-25.8h-9v25.8h3.9v-10h5.1c4.8 0 8.3-3.2 8.3-7.9s-3.5-7.9-8.3-7.9Zm-37 25.7v-26h-3.9v26h3.9Zm-15-3c-2.9 0-4.9-2.4-4.9-5.3 0-3 2-5.4 4.9-5.4 2.9 0 4.7 2.4 4.7 5.4 0 2.9-1.9 5.3-4.7 5.3Zm-39 0c-2.8 0-5-2.4-5-5.3 0-3 2.1-5.4 5-5.4 3 0 5 2.3 5 5.4 0 2.9-2.2 5.3-5 5.3Zm117.1-.2c-1.4 0-3.2-.6-3.2-2.3 0-3.6 6.5-3.6 8.3-1.9 0 1-1.9 4.2-5.1 4.2Zm-57.1-5.4a5 5 0 0 1 4.7-5.2c1.2 0 2.7.6 3.3 1.9l-8 3.3Zm31.1-13.3c2.7 0 4.2 2.3 4.2 4.1 0 1.8-1.3 4.1-4.2 4.1h-5.2v-8.2h5.2Zm-115.3-20h-5.8v1.4h4.3c-.1 2.3-2 3.7-4.3 3.7-2.5 0-4.6-2-4.6-4.7 0-3 2.3-4.8 4.6-4.8s3.3 1.4 3.3 1.4l1-1s-1.3-1.8-4.3-1.8c-3.4 0-6.1 2.7-6.1 6.2 0 3.3 2.6 6.1 6.1 6.1 3.4 0 6.3-2.5 5.8-6.5Zm54.4 6.3v-9.7l6 9.7h1.6V11h-1.5v6.9l.1 2.3h-.1L139 11h-1.9v11.8h1.5Zm-19.8-10.4V11h-8.1v1.4h3.3v10.4h1.5V12.4h3.3Zm-9.7 10.4V11h-1.5v11.8h1.5Zm-6.7-10.4V11h-8.1v1.4h3.3v10.4h1.5V12.4h3.3Zm-9.4 0V11h-6.9v11.8H93v-1.5h-5.4v-3.7h4.9v-1.4h-4.9v-3.8H93Z" /><defs><linearGradient id="a" x1="0" x2="1" y1="0" y2="0" gradientTransform="matrix(0 400 -400 0 221 264)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#3588b7" /><stop offset="1" stop-color="#66ffd4" /></linearGradient><linearGradient id="b" x1="0" x2="1" y1="0" y2="0" gradientTransform="matrix(264 0 0 264 235 451)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#9635c2" /><stop offset="1" stop-color="#e3424f" /></linearGradient><linearGradient id="c" x1="0" x2="1" y1="0" y2="0" gradientTransform="matrix(262 0 0 262 236 263.03)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#60cab6" /><stop offset="1" stop-color="#d6ffa2" /></linearGradient><linearGradient id="d" x1="0" x2="1" y1="0" y2="0" gradientTransform="matrix(116.67 92.63 -92.63 116.67 433 399)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ff9877" /><stop offset="1" stop-color="#ffc466" /></linearGradient></defs></symbol>
			</svg>

			<style>
				.footer-apps {
					margin-top: 16px;
					gap: 12px;
					display: flex;
					flex-flow: row nowrap;
					align-items: center;
					justify-content: center;
				}
				.footer-apps > div {
					color: #fff;
					background: #555;
					border-radius: 4px;
				}
			</style>
            <!--
			<div class="footer-apps">
				<div tooltip="Uskoro" tooltip-position="top">
					<svg width="135" height="40"><use xlink:href="#i-googleplay"></use></svg>
				</div>
				<div tooltip="Uskoro" tooltip-position="top">
					<svg width="135" height="40"><use xlink:href="#i-appstore"></use></svg>
				</div>
			</div>
            -->
		</div>

		<ul class="socials footer-socials">
			<li><a class="fb" href="<?php echo esc_url( __( 'https://facebook.com/profile.php?id=61556630280710', 'dizajn' ) ); ?>" target="_blank" title="Facebook"><svg class="d-block" width="24" height="24"><use xlink:href="#i-facebook" /></svg></a></li>
			<li><a class="tw" href="<?php echo esc_url( __( 'https://x.com/kodexme', 'dizajn' ) ); ?>" target="_blank" title="Twitter"><svg class="d-block" width="24" height="24"><use xlink:href="#i-twitter" /></svg></a></li>
			<li><a class="yt" href="<?php echo esc_url( __( 'https://youtube.com/kodexme', 'dizajn' ) ); ?>" target="_blank" title="YouTube"><svg class="d-block" width="24" height="24"><use xlink:href="#i-youtube" /></svg></a></li>
			<li><a class="in" href="<?php echo esc_url( __( 'https://instagram.com/kodex.me', 'dizajn' ) ); ?>" target="_blank" title="Instagram"><svg class="d-block" width="24" height="24"><use xlink:href="#i-instagram" /></svg></a></li>
		</ul>

	</div>

	<div class="footer-copy">
		<div class="wrap px">
            <p class="m-0">Vlasnik autorskih prava Kodex.me.</p>
            <p class="m-0">Kopiranje i prenos sadržaja samo uz pismenu dozvolu</p>
            <p class="m-0"><?php printf( esc_html__( '&copy; %s | Sva prava zadržana', 'dizajn' ), date('Y') ); ?></p>
		</div>
	</div>

</footer>

<?php wp_footer() ?>
<script src="<?php echo get_template_directory_uri() ?>/assets/dist/js/tachyon.min.js?v=2.0.1" type="module" crossorigin defer></script>
<!--<script>-->
<!--	const postDates = document.querySelectorAll('time');-->
<!--	postDates.forEach(function(datum) {-->
<!--		let w3cT = datum.getAttribute('datetime'),-->
<!--			orig = new Date(w3cT),-->
<!--			curr = new Date(),-->
<!--			diff = +Math.abs(curr - orig),-->
<!--			mins = +Math.floor(diff / 60000);-->
<!--		// calc = getDuration(diff);-->
<!--		if(mins < 2881) {-->
<!--			let d = +Math.floor(mins / 1440),-->
<!--				s = +Math.floor(mins / 60),-->
<!--				m = +Math.floor(mins % 60),-->
<!--				daysAgo = d,-->
<!--				daysUnit = d === 1 ? ' dan' : ' dana',-->
<!--				hoursAgo = s % 24,-->
<!--				hoursUnits = hoursAgo === 1 || hoursAgo === 21 ? ' sat' : (( hoursAgo === 2 || hoursAgo === 3 || hoursAgo === 4 || hoursAgo === 22 || hoursAgo === 23 ) ? ' sata' : ' sati'),-->
<!--				minsAgo = m < 10 ? '0' + m : m,-->
<!--				minsUnit = minsAgo === 1 ? ' minut' : ' min';-->
<!---->
<!--			if(d !== 0) {-->
<!--				if(d > 3 || s === 0) {-->
<!--					datum.innerHTML = 'Prije ' + daysAgo + daysUnit;-->
<!--				} else {-->
<!--					datum.innerHTML = 'Prije ' + daysAgo + daysUnit + ' ' + hoursAgo + hoursUnits;-->
<!--				}-->
<!--			} else {-->
<!--				if(s !== 0) {-->
<!--					if(m === 0) {-->
<!--						datum.innerHTML = 'Prije ' + s + ' ' + hoursUnits;-->
<!--					} else {-->
<!--						datum.innerHTML = 'Prije ' + s + ':' + minsAgo + ' sati';-->
<!--					}-->
<!--				} else {-->
<!--					datum.innerHTML = 'Prije ' + m + minsUnit;-->
<!--				}-->
<!--			}-->
<!--		}-->
<!--	})-->
<!--</script>-->

</body>
</html>