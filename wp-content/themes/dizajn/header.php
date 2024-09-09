<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<?php wp_head(); ?>
</head>
<?php
$theme = '';
if(!is_single() && !is_page()) {
	if(get_queried_object()) {
		$theme = get_queried_object()->parent === 0 ? get_queried_object()->slug : get_category(get_queried_object()->parent)->slug;
	}
} elseif (is_single()) {
	$cats = wp_get_post_categories(get_the_ID());
	$firstCat = get_category($cats[0]);
	$theme = $firstCat->parent === 0 ? $firstCat->slug : get_category($firstCat->parent)->slug;
}
?>
<body <?php body_class(); ?> data-theme="<?php echo $theme ?>">
<?php wp_body_open(); ?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="i-logo"      viewBox="0 0 211 50"><path fill="#e9312a" fill-rule="nonzero" d="M9.884 0v27.465L20.28 17.343h13.568L19.786 30.311 34.668 45.41H20.772L9.884 33.975V45.41H-.018V0h9.902Zm35.781 31.24c0 .948.172 1.815.519 2.599a6.94 6.94 0 0 0 1.368 2.052 6.002 6.002 0 0 0 2.025 1.367 6.38 6.38 0 0 0 2.49.492c.874 0 1.704-.163 2.487-.492a6.027 6.027 0 0 0 2.026-1.367 6.999 6.999 0 0 0 1.367-2.052c.347-.784.52-1.632.52-2.544a6.1 6.1 0 0 0-.52-2.49 7.018 7.018 0 0 0-1.367-2.052 6.055 6.055 0 0 0-2.026-1.367 6.375 6.375 0 0 0-2.488-.492 6.38 6.38 0 0 0-2.49.492 6.03 6.03 0 0 0-2.024 1.367 7.078 7.078 0 0 0-1.368 2.025 5.908 5.908 0 0 0-.52 2.462m-10.45-.11c0-2.078.42-4.02 1.26-5.827a14.3 14.3 0 0 1 3.501-4.704c1.495-1.33 3.272-2.381 5.333-3.146 2.061-.766 4.314-1.149 6.758-1.149 2.406 0 4.64.374 6.701 1.12 2.061.749 3.848 1.788 5.363 3.12a14.028 14.028 0 0 1 3.528 4.76c.838 1.841 1.259 3.876 1.259 6.1 0 2.226-.43 4.26-1.286 6.1a14.485 14.485 0 0 1-3.53 4.76c-1.495 1.331-3.29 2.362-5.389 3.092-2.098.728-4.367 1.094-6.81 1.094-2.407 0-4.634-.366-6.675-1.094-2.043-.73-3.802-1.77-5.28-3.119a14.448 14.448 0 0 1-3.474-4.842c-.84-1.879-1.259-3.966-1.259-6.264m48.583.164a6.5 6.5 0 0 0 .494 2.544 6.516 6.516 0 0 0 1.34 2.051 6.002 6.002 0 0 0 2.024 1.368 6.523 6.523 0 0 0 2.544.493 6.39 6.39 0 0 0 2.49-.493 6.043 6.043 0 0 0 2.024-1.368 7.095 7.095 0 0 0 1.367-2.024c.347-.766.52-1.586.52-2.462 0-.875-.173-1.704-.52-2.49a6.989 6.989 0 0 0-1.367-2.05 6.059 6.059 0 0 0-2.024-1.369 6.39 6.39 0 0 0-2.49-.492c-.876 0-1.706.164-2.489.492a6.021 6.021 0 0 0-2.025 1.368 7.212 7.212 0 0 0-1.368 1.997 5.706 5.706 0 0 0-.52 2.435M96.273 0h9.956v45.41h-9.956v-3.118c-2.116 2.663-4.98 3.993-8.591 3.993-2.043 0-3.92-.383-5.635-1.148a13.923 13.923 0 0 1-4.487-3.174c-1.277-1.35-2.27-2.935-2.981-4.76-.712-1.823-1.066-3.792-1.066-5.908 0-2.006.335-3.912 1.012-5.718.673-1.805 1.63-3.382 2.871-4.732a13.627 13.627 0 0 1 4.46-3.202c1.732-.784 3.637-1.175 5.716-1.175 3.502 0 6.402 1.222 8.7 3.666V0Zm37.201 27.3c-.328-1.385-1.003-2.497-2.024-3.336-1.022-.839-2.261-1.259-3.72-1.259-1.533 0-2.782.402-3.747 1.204-.967.803-1.578 1.934-1.834 3.392h11.325Zm-11.598 5.746c0 4.267 2.006 6.4 6.018 6.4 2.151 0 3.775-.875 4.869-2.625h9.575c-1.934 6.419-6.767 9.629-14.498 9.629-2.372 0-4.542-.356-6.512-1.067-1.97-.711-3.657-1.724-5.06-3.037a13.52 13.52 0 0 1-3.255-4.705c-.767-1.823-1.15-3.866-1.15-6.127 0-2.334.365-4.44 1.094-6.32.73-1.878 1.77-3.474 3.12-4.787 1.348-1.313 2.982-2.326 4.896-3.036 1.914-.711 4.076-1.067 6.483-1.067 2.37 0 4.505.356 6.401 1.067 1.896.71 3.501 1.742 4.815 3.091 1.313 1.35 2.316 3 3.01 4.951.69 1.952 1.038 4.149 1.038 6.593v1.04h-20.844Z"/><path fill="#e51e25" fill-rule="nonzero" d="m155.288 32.15-8.685-9.71c-.867-.958-1.278-2.108-1.231-3.455.044-1.343.569-2.471 1.573-3.383 1.001-.822 2.097-1.232 3.282-1.232 1.505 0 2.713.547 3.625 1.64l8.138 8.823 7.933-8.822c.911-1.094 2.165-1.641 3.761-1.641 1.185 0 2.233.41 3.146 1.232 1.003.912 1.539 2.028 1.608 3.35.067 1.323-.377 2.485-1.334 3.489l-8.685 9.71 8.685 9.78c.957.957 1.401 2.12 1.334 3.486-.07 1.369-.605 2.508-1.608 3.42-.957.777-2.03 1.163-3.214 1.163-1.46 0-2.691-.547-3.693-1.641l-7.933-8.89-8.138 8.89c-.912 1.094-2.12 1.641-3.625 1.641-1.276 0-2.37-.386-3.282-1.164-1.004-.91-1.53-2.05-1.573-3.42-.047-1.366.364-2.528 1.23-3.486l8.686-9.78Z"/><path fill="currentColor" fill-rule="nonzero" d="M182.307 28.982c0-1.106.39-2.048 1.17-2.828.78-.782 1.716-1.172 2.806-1.172.767 0 1.46.2 2.078.597.619.398 1.083.92 1.392 1.569a3.888 3.888 0 0 1 1.426-1.569 3.735 3.735 0 0 1 2.043-.597c1.105 0 2.05.39 2.838 1.172.788.78 1.182 1.722 1.182 2.828v6.982a.501.501 0 0 1-.165.364.528.528 0 0 1-.386.166.509.509 0 0 1-.377-.156.512.512 0 0 1-.154-.374v-6.982c0-.811-.287-1.5-.861-2.067a2.849 2.849 0 0 0-2.077-.85c-.796 0-1.488.288-2.078.862-.588.574-.87 1.258-.839 2.055v6.982a.493.493 0 0 1-.166.374.544.544 0 0 1-.386.156.507.507 0 0 1-.376-.156.51.51 0 0 1-.155-.374v-6.982c0-.811-.287-1.5-.861-2.067a2.85 2.85 0 0 0-2.078-.85 2.82 2.82 0 0 0-2.054.85 2.79 2.79 0 0 0-.861 2.067v6.982a.506.506 0 0 1-.156.374.504.504 0 0 1-.375.156.509.509 0 0 1-.376-.156.512.512 0 0 1-.154-.374v-6.982Zm27.597 1.347c-.088-1.193-.579-2.202-1.469-3.027-.892-.824-1.95-1.237-3.17-1.237-1.21 0-2.259.413-3.15 1.237-.891.825-1.381 1.834-1.47 3.027h9.259Zm-8.695 4.475c-1.127-1.127-1.69-2.482-1.69-4.066 0-1.583.563-2.938 1.69-4.066 1.127-1.126 2.479-1.69 4.055-1.69 1.532 0 2.858.539 3.976 1.613 1.12 1.076 1.709 2.38 1.769 3.91.058.443-.141.665-.598.665h-9.766c.089 1.193.579 2.202 1.47 3.027.891.824 1.94 1.237 3.15 1.237 1.309 0 2.415-.457 3.312-1.37a.563.563 0 0 1 .377-.156c.177 0 .302.052.374.156a.419.419 0 0 1 .177.353.553.553 0 0 1-.177.398c-1.09 1.119-2.444 1.678-4.064 1.678-1.576 0-2.928-.563-4.055-1.69"/></symbol>

	<symbol id="i-sun"       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></symbol>
	<symbol id="i-moon"      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></symbol>
	<symbol id="i-menu"      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="6" x2="20" y2="6"/></line><line x1="4" y1="18" x2="20" y2="18"/></symbol>
	<symbol id="i-search"    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="6"/><line x1="19" y1="19" x2="15" y2="15"/></symbol>
	<symbol id="i-close"     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></symbol>

	<symbol id="i-photo"     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></symbol>
	<symbol id="i-video"     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></symbol>

	<symbol id="i-arrow-left"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></symbol>
	<symbol id="i-arrow-right" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></symbol>

	<symbol id="i-facebook"  viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M19 0H5a5 5 0 0 0-5 5v14a5 5 0 0 0 5 5h14a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm-3 7h-1.924C13.461 7 13 7.252 13 7.889V9h3l-.238 3H13v8h-3v-8H8V9h2V7.077C10 5.055 11.064 4 13.461 4H16v3z"/></symbol>
	<symbol id="i-twitter"   viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M19 0H5a5 5 0 0 0-5 5v14a5 5 0 0 0 5 5h14a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765a9.286 9.286 0 0 1-5.032-1.475 6.605 6.605 0 0 0 4.86-1.359 3.285 3.285 0 0 1-3.066-2.28 3.3 3.3 0 0 0 1.482-.056c-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411A3.289 3.289 0 0 1 5.612 6.6a9.32 9.32 0 0 0 6.766 3.43 3.286 3.286 0 0 1 5.594-2.993 6.583 6.583 0 0 0 2.086-.796 3.296 3.296 0 0 1-1.443 1.816A6.578 6.578 0 0 0 20.5 7.54a6.66 6.66 0 0 1-1.639 1.697z"/></symbol>
	<symbol id="i-youtube"   viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="m10 9.333 5.333 2.662L10 14.667V9.333zM24 5v14a5 5 0 0 1-5 5H5a5 5 0 0 1-5-5V5a5 5 0 0 1 5-5h14a5 5 0 0 1 5 5zm-4 7c-.02-4.123-.323-5.7-2.923-5.877-2.403-.164-7.754-.163-10.153 0C4.326 6.3 4.02 7.87 4 12c.02 4.123.323 5.7 2.923 5.877 2.399.163 7.75.164 10.153 0C19.674 17.7 19.98 16.13 20 12z"/></symbol>
	<symbol id="i-instagram" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z"/></symbol>

	<symbol id="i-facebook-share"  viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></symbol>
	<symbol id="i-messenger-share" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M.001 11.639C.001 4.949 5.241 0 12.001 0S24 4.95 24 11.639c0 6.689-5.24 11.638-12 11.638-1.21 0-2.38-.16-3.47-.46a.96.96 0 00-.64.05l-2.39 1.05a.96.96 0 01-1.35-.85l-.07-2.14a.97.97 0 00-.32-.68A11.39 11.389 0 01.002 11.64zm8.32-2.19l-3.52 5.6c-.35.53.32 1.139.82.75l3.79-2.87c.26-.2.6-.2.87 0l2.8 2.1c.84.63 2.04.4 2.6-.48l3.52-5.6c.35-.53-.32-1.13-.82-.75l-3.79 2.87c-.25.2-.6.2-.86 0l-2.8-2.1a1.8 1.8 0 00-2.61.48z"/></symbol>
	<symbol id="i-twitter-share"   viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M21.543 7.104c.015.211.015.423.015.636 0 6.507-4.954 14.01-14.01 14.01v-.003A13.94 13.94 0 0 1 0 19.539a9.88 9.88 0 0 0 7.287-2.041 4.93 4.93 0 0 1-4.6-3.42 4.916 4.916 0 0 0 2.223-.084A4.926 4.926 0 0 1 .96 9.167v-.062a4.887 4.887 0 0 0 2.235.616A4.928 4.928 0 0 1 1.67 3.148 13.98 13.98 0 0 0 11.82 8.292a4.929 4.929 0 0 1 8.39-4.49 9.868 9.868 0 0 0 3.128-1.196 4.941 4.941 0 0 1-2.165 2.724A9.828 9.828 0 0 0 24 4.555a10.019 10.019 0 0 1-2.457 2.549z"/></symbol>
	<symbol id="i-viber-share"     viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M11.4 0C9.473.028 5.333.344 3.02 2.467 1.302 4.187.696 6.7.633 9.817.57 12.933.488 18.776 6.12 20.36h.003l-.004 2.416s-.037.977.61 1.177c.777.242 1.234-.5 1.98-1.302.407-.44.972-1.084 1.397-1.58 3.85.326 6.812-.416 7.15-.525.776-.252 5.176-.816 5.892-6.657.74-6.02-.36-9.83-2.34-11.546-.596-.55-3.006-2.3-8.375-2.323 0 0-.395-.025-1.037-.017zm.058 1.693c.545-.004.88.017.88.017 4.542.02 6.717 1.388 7.222 1.846 1.675 1.435 2.53 4.868 1.906 9.897v.002c-.604 4.878-4.174 5.184-4.832 5.395-.28.09-2.882.737-6.153.524 0 0-2.436 2.94-3.197 3.704-.12.12-.26.167-.352.144-.13-.033-.166-.188-.165-.414l.02-4.018c-4.762-1.32-4.485-6.292-4.43-8.895.054-2.604.543-4.738 1.996-6.173 1.96-1.773 5.474-2.018 7.11-2.03zm.38 2.602c-.167 0-.303.135-.304.302 0 .167.133.303.3.305 1.624.01 2.946.537 4.028 1.592 1.073 1.046 1.62 2.468 1.633 4.334.002.167.14.3.307.3.166-.002.3-.138.3-.304-.014-1.984-.618-3.596-1.816-4.764-1.19-1.16-2.692-1.753-4.447-1.765zm-3.96.695c-.19-.032-.4.005-.616.117l-.01.002c-.43.247-.816.562-1.146.932-.002.004-.006.004-.008.008-.267.323-.42.638-.46.948-.008.046-.01.093-.007.14 0 .136.022.27.065.4l.013.01c.135.48.473 1.276 1.205 2.604.42.768.903 1.5 1.446 2.186.27.344.56.673.87.984l.132.132c.31.308.64.6.984.87.686.543 1.418 1.027 2.186 1.447 1.328.733 2.126 1.07 2.604 1.206l.01.014c.13.042.265.064.402.063.046.002.092 0 .138-.008.31-.036.627-.19.948-.46.004 0 .003-.002.008-.005.37-.33.683-.72.93-1.148l.003-.01c.225-.432.15-.842-.18-1.12-.004 0-.698-.58-1.037-.83-.36-.255-.73-.492-1.113-.71-.51-.285-1.032-.106-1.248.174l-.447.564c-.23.283-.657.246-.657.246-3.12-.796-3.955-3.955-3.955-3.955s-.037-.426.248-.656l.563-.448c.277-.215.456-.737.17-1.248-.217-.383-.454-.756-.71-1.115-.25-.34-.826-1.033-.83-1.035-.137-.165-.31-.265-.502-.297zm4.49.88c-.158.002-.29.124-.3.282-.01.167.115.312.282.324 1.16.085 2.017.466 2.645 1.15.63.688.93 1.524.906 2.57-.002.168.13.306.3.31.166.003.305-.13.31-.297.025-1.175-.334-2.193-1.067-2.994-.74-.81-1.777-1.253-3.05-1.346h-.024zm.463 1.63c-.16.002-.29.127-.3.287-.008.167.12.31.288.32.523.028.875.175 1.113.422.24.245.388.62.416 1.164.01.167.15.295.318.287.167-.008.295-.15.287-.317-.03-.644-.215-1.178-.58-1.557-.367-.378-.893-.574-1.52-.607h-.018z"/></symbol>
	<symbol id="i-whatsapp-share"  viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></symbol>
	<symbol id="i-linkedin-share"  viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></symbol>
</svg>

<header class="header px">
	<div class="wrap">

		<a class="header-logo" href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home" title="<?php esc_attr_e( 'Početna', 'dizajn' ) ?>">
<!--            <svg class="d-block" width="169" height="40"><use xlink:href="#i-logo" /></svg>-->
            <img class="d-block" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/dist/img/logo-dark.png' ); ?>" width="132" height="40" alt="Logo">
            <img class="d-none" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/dist/img/logo-light.png' ); ?>" width="132" height="40" alt="Logo">

        </a>

        <ul class="socials header-socials">
            <li><a class="fb" href="<?php echo esc_url( __( 'https://www.facebook.com/profile.php?id=61556630280710', 'dizajn' ) ); ?>" target="_blank" title="Facebook"><svg class="d-block" width="24" height="24"><use xlink:href="#i-facebook" /></svg></a></li>
            <li><a class="tw" href="<?php echo esc_url( __( 'https://twitter.com/', 'dizajn' ) ); ?>" target="_blank" title="Twitter"><svg class="d-block" width="24" height="24"><use xlink:href="#i-twitter" /></svg></a></li>
            <li><a class="yt" href="<?php echo esc_url( __( 'https://youtube.com/', 'dizajn' ) ); ?>" target="_blank" title="YouTube"><svg class="d-block" width="24" height="24"><use xlink:href="#i-youtube" /></svg></a></li>
            <li><a class="in" href="<?php echo esc_url( __( 'https://instagram.com/', 'dizajn' ) ); ?>" target="_blank" title="Instagram"><svg class="d-block" width="24" height="24"><use xlink:href="#i-instagram" /></svg></a></li>
        </ul>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'header',
				'menu' => 'header',
				'container' => 'nav',
				'container_class' => 'header-menu',
				'menu_class' => 'header-menu-list',
				'container_aria_label' => esc_attr__( 'Navigacija', 'dizajn' ),
				'items_wrap' => '<ul class="%2$s">%3$s</ul>',
				'depth' => 1,
			)
		);
		?>

		<div class="header-meta">
			<ul class="header-triggers">
				<li data-trigger="theme" title="<?php esc_attr_e( 'Promijeni stil', 'dizajn' ) ?>">
					<svg class="d-block" width="24" height="24"><use xlink:href="#i-moon" /></svg>
					<svg class="d-none" width="24" height="24"><use xlink:href="#i-sun" /></svg>
				</li>
				<li data-trigger="search" title="<?php esc_attr_e( 'Otvori/zatvori pretragu', 'dizajn' ) ?>">
					<svg class="d-block" width="24" height="24"><use xlink:href="#i-search" /></svg>
					<svg class="d-none" width="24" height="24"><use xlink:href="#i-close" /></svg>
				</li>
				<li data-trigger="menu" title="<?php esc_attr_e( 'Otvori/zatvori navigaciju', 'dizajn' ) ?>">
					<svg class="d-block" width="24" height="24"><use xlink:href="#i-menu" /></svg>
					<svg class="d-none" width="24" height="24"><use xlink:href="#i-close" /></svg>
				</li>
			</ul>
		</div>

	</div>

	<div class="header-search" data-el="search">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<input type="text" name="s" placeholder="<?php echo esc_attr_e( 'Unesi pojam pretrage…', 'dizajn' ) ?>" value="<?php the_search_query() ?>" />
			<button type="submit">
				<svg class="d-block" width="24" height="24"><use xlink:href="#i-arrow-right" /></svg>
			</button>
		</form>
	</div>
</header>

<div class="subheader">
    <div class="slider-featags swiffy-slider slider-item-reveal slider-item-nogap slider-item-snapstart slider-item-nosnap-touch slider-nav-scrollbar slider-nav-visible slider-nav-touch slider-nav-autoplay slider-nav-autopause slider-indicators-square">
        <ul class="slider-container">
            <li><a href="https://etto.ba/oznake/20195">Genocid u Srebrenici</a></li>
            <li><a href="https://etto.ba/oznake/930603">sukob u Izraelu</a></li>
            <li><a href="https://etto.ba/oznake/11890">Rat u Ukrajini</a></li>
            <li><a href="https://etto.ba/oznake/10663">Vlada FBiH</a></li>
            <li><a href="https://etto.ba/oznake/22623">Trojka</a></li>
            <li><a href="https://etto.ba/oznake/19454">Bakir Izetbegović</a></li>
            <li><a href="https://etto.ba/oznake/1453">sda</a></li>
            <li><a href="https://etto.ba/oznake/11735">NIP</a></li>
            <li><a href="https://etto.ba/oznake/50047">Izrael</a></li>
            <li><a href="https://etto.ba/oznake/358482">Gaza</a></li>
            <li><a href="https://etto.ba/oznake/21668">Palestina</a></li>
        </ul>
    </div>
</div>

<ul class="header-controls">
    <li data-trigger="inc">+</li>
    <li data-trigger="reset">A</li>
    <li data-trigger="dec">-</li>
</ul>

<div class="overlay" data-el="overlay" data-trigger="close"></div>

<?php
wp_nav_menu(
	array(
		'theme_location' => 'header',
		'menu' => 'header',
		'container' => 'nav',
		'container_class' => 'mobile-menu',
		'menu_class' => 'mobile-menu-list',
		'container_aria_label' => esc_attr__( 'Navigacija', 'dizajn' ),
		'items_wrap' => '<ul class="%2$s">%3$s</ul>',
		'depth' => 2,
	)
);
?>

<?php

function  hex2hsl($hexstr) {
	$hexstr = ltrim($hexstr, '#');
	if (strlen($hexstr) == 3) {
		$hexstr = $hexstr[0] . $hexstr[0] . $hexstr[1] . $hexstr[1] . $hexstr[2] . $hexstr[2];
	}
	$R = hexdec($hexstr[0] . $hexstr[1]);
	$G = hexdec($hexstr[2] . $hexstr[3]);
	$B = hexdec($hexstr[4] . $hexstr[5]);
	$RGB = array($R,$G,$B);
//scale value 0 to 255 to floats from 0 to 1
	$r = $RGB[0]/255;
	$g = $RGB[1]/255;
	$b = $RGB[2]/255;
	// using https://gist.github.com/brandonheyer/5254516
	$max = max( $r, $g, $b );
	$min = min( $r, $g, $b );
	// lum
	$l = ( $max + $min ) / 2;

	// sat
	$d = $max - $min;
	if( $d == 0 ){
		$h = $s = 0; // achromatic
	} else {
		$s = $d / ( 1 - abs( (2 * $l) - 1 ) );
		// hue
		switch( $max ){
			case $r:
				$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
				if ($b > $g) {
					$h += 360;
				}
				break;
			case $g:
				$h = 60 * ( ( $b - $r ) / $d + 2 );
				break;
			case $b:
				$h = 60 * ( ( $r - $g ) / $d + 4 );
				break;
		}
	}
	$hsl = array( round( $h ), round( $s*100 ), round( $l*100 ) );
	$hslstr = 'hsl('.($hsl[0]).','.($hsl[1]).'%,'.($hsl[2]).'%)';
	return $hslstr;
// or return the $hsl array if you want to make adjustments to values
}

$firstLvlCatsQuery = get_categories( array(
	'orderby' => 'name',
	'order'   => 'ASC',
	'parent'  => 0
) );

echo '<style>';
foreach ($firstLvlCatsQuery as $cat):
	$nesto = get_theme_mod('colors_cats_' . $cat->slug);
$boja = hex2hsl($nesto);
$dataList = substr($boja, 4, -1);
?>
body[data-theme="<?php echo $cat->slug ?>"] {
	--brand: <?php echo $dataList ?> !important;
}

[data-theme="<?php echo $cat->slug ?>"] {
	--brand: <?php echo $dataList ?> !important;
}
<?php
endforeach;
echo '</style>';
?>