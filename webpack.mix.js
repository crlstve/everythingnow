const mix = require('laravel-mix');

//Directory that contains our un-compiled CSS
mix.postCss('assets/css/theme.css', 'css', [
	require('tailwindcss'),
	require('postcss-nested')
])
.options({
	processCssUrls: false
});