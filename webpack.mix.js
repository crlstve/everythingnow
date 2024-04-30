const mix = require('laravel-mix');

//Directory that contains our un-compiled CSS
mix.postCss('assets/css/now-tailwind.css', 'css', [
	require('tailwindcss'),
	require('postcss-nested')
])
.options({
	processCssUrls: false
});