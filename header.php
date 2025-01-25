<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class('min-h-dvh bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[--bg-primary] via-[--bg-via] to-[--bg-secundary] dark:from-[--bg-primary-dark] dark:via-[--bg-via-dark] dark:to-[--bg-secundary-dark]'); ?>>
<?php wp_body_open(); ?>
<header id="now-header" class="sticky top-4 py-4 backdrop-blur-sm shadow-md shadow-slate-950/20 dark:border-slate-600 dark:bg-[rgba(50,50,50,0.1)] bg-[rgba(255,255,255,0.1)] duration-500 top-0 left-0 right-0 bottom-0 w-11/12 justify-center mx-auto rounded-lg 2xl:w-[68%]">
	<div class="contain 2xl:max-w-7xl mx-auto px-6 flex flex-row justify-between">
		<div id="now-logo" class="w-20 h-8 flex flex-row">
			<?= (has_custom_logo()) ? the_custom_logo() : ''; ?>
		</div>
		<nav id="mega-menu" class="self-center dark:text-white">
				<svg data-contoller="menu" class="z-10 cursor-pointer md:hidden w-10 h-10 aspect-square sound rounded-lg p-2 backdrop-blur-sm shadow-md shadow-slate-950/20 border-l border-t border-white dark:border-slate-600 dark:bg-[rgba(0,0,0,0.1)] bg-[rgba(255,255,255,0.1)] flex justify-center" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="23" height="23" viewBox="0,0,260,260">
                <g class="dark:fill-white fill-slate-600" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M3,9c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h44c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587zM3,24c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h44c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587zM3,39c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h44c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587z"></path></g></g>
                </svg>
			<?php wp_nav_menu(); ?>
		</nav>
            <button id="btn_mode" aria="menu item" aria-label="Modo oscuro" class="sound group p-2 rounded-full aspect-square h-fit w-fit bg-transparent relative border-l border-t border-white hover:border-slate-300 hover:dark:border-slate-950 dark:border-slate-600 backdrop-blur hover:backdrop-blur-none shadow-md hover:shadow-inner overflow-hidden " onclick="toggleDarkMode();">
                            <svg class="fill-slate-600 group-hover:fill-violet-500 dark:fill-white group-hover:dark:fill-emerald-300 dark:translate-y-0 group-hover:dark:-translate-y-8 duration-500 -translate-y-8 group-hover:-translate-y-0 group-hover:dark" version="1.1" id="moon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 30.457 30.457" xml:space="preserve">
                            <g><path d="M29.693,14.49c-0.469-0.174-1-0.035-1.32,0.353c-1.795,2.189-4.443,3.446-7.27,3.446c-5.183,0-9.396-4.216-9.396-9.397c0-2.608,1.051-5.036,2.963-6.835c0.366-0.347,0.471-0.885,0.264-1.343c-0.207-0.456-0.682-0.736-1.184-0.684 C5.91,0.791,0,7.311,0,15.194c0,8.402,6.836,15.238,15.238,15.238c8.303,0,14.989-6.506,15.219-14.812 C30.471,15.118,30.164,14.664,29.693,14.49z" /></g>
                            </svg>
                            <svg class="fill-slate-600 group-hover:fill-violet-500 dark:fill-white group-hover:dark:fill-emerald-300
                            dark:translate-y-3 group-hover:dark:-translate-y-5 -translate-y-5 group-hover:translate-y-3 duration-500" enable-background="new 0 0 512 512" height="20px" id="sun" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g><path d="M256,144c-61.75,0-112,50.25-112,112s50.25,112,112,112s112-50.25,112-112S317.75,144,256,144z M256,336    c-44.188,0-80-35.812-80-80c0-44.188,35.812-80,80-80c44.188,0,80,35.812,80,80C336,300.188,300.188,336,256,336z M256,112    c8.833,0,16-7.167,16-16V64c0-8.833-7.167-16-16-16s-16,7.167-16,16v32C240,104.833,247.167,112,256,112z M256,400    c-8.833,0-16,7.167-16,16v32c0,8.833,7.167,16,16,16s16-7.167,16-16v-32C272,407.167,264.833,400,256,400z M380.438,154.167    l22.625-22.625c6.25-6.25,6.25-16.375,0-22.625s-16.375-6.25-22.625,0l-22.625,22.625c-6.25,6.25-6.25,16.375,0,22.625    S374.188,160.417,380.438,154.167z M131.562,357.834l-22.625,22.625c-6.25,6.249-6.25,16.374,0,22.624s16.375,6.25,22.625,0    l22.625-22.624c6.25-6.271,6.25-16.376,0-22.625C147.938,351.583,137.812,351.562,131.562,357.834z M112,256    c0-8.833-7.167-16-16-16H64c-8.833,0-16,7.167-16,16s7.167,16,16,16h32C104.833,272,112,264.833,112,256z M448,240h-32    c-8.833,0-16,7.167-16,16s7.167,16,16,16h32c8.833,0,16-7.167,16-16S456.833,240,448,240z M131.541,154.167    c6.251,6.25,16.376,6.25,22.625,0c6.251-6.25,6.251-16.375,0-22.625l-22.625-22.625c-6.25-6.25-16.374-6.25-22.625,0    c-6.25,6.25-6.25,16.375,0,22.625L131.541,154.167z M380.459,357.812c-6.271-6.25-16.376-6.25-22.625,0    c-6.251,6.25-6.271,16.375,0,22.625l22.625,22.625c6.249,6.25,16.374,6.25,22.624,0s6.25-16.375,0-22.625L380.459,357.812z" /></g>
                            </svg>
            </button>
	</div>
</header>
		