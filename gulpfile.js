'use strict';

const path = require('path');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const gulp = require('gulp');
const hash = require('gulp-hash');
const sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
const sassGlob = require('gulp-sass-glob')
const uglify = require('gulp-uglify');
const del = require('del');
const rename = require("gulp-rename");
var strip = require('gulp-strip-comments');
var mode = require('gulp-mode')({
	modes: ["production", "development"],
	default: "development",
	verbose: false
});
var browserSync = require('browser-sync').create();

// const image = require('gulp-image');
// changed = require('gulp-changed');

//.pipe(mode.production(uglify()))

//https://github.com/mkenney/docker-npm/issues/6
//https://stackoverflow.com/questions/43579740/in-docker-compose-how-to-create-an-alias-link-to-localhost

/**
 * gulp --production to build for deployment
 * gulp for dev
 * 
 * Regrouped tasks related to their action.
 */

/**
 * MAIN.css - Styles for the public
 */
const themeFolder = 'wordpress/public_html/wp-content/themes/theme/';

const themePHPPath = [
	`${themeFolder}*.php`,
	`${themeFolder}**/*.php`,
];

const themeImages = [
	`${themeFolder}src/img_large/**/*`,
	`${themeFolder}src/img_large/*`,
];

const themeStylePath = [
	`${themeFolder}src/scss/style.scss`,
	//`${themeFolder}src/scss/blocks/*.scss`,
];
// extra watching for other scss files
const themeWatchStylePath = [...themeStylePath, ...[`${themeFolder}src/scss/**/*.scss`]];

/**
 * Watch for all our styles
 */
gulp.task('watch-theme-sass', function () {
	return gulp.watch(themeWatchStylePath, gulp.series('build-theme-sass'));
});

/**
 * Build style sass
 */
gulp.task('build-theme-sass', function () {
	return gulp.src(themeStylePath, {
			allowEmpty: true
		})
		// Remove comments in production
		.pipe(mode.production(strip()))
		// Build sourcemaps
		.pipe(sourcemaps.init())
		// Convert to CSS
		.pipe(sass({
			outputStyle: 'condensed'
		}))
		// Add sourcemaps to file
		.pipe(sourcemaps.write())
		// Run autoprefixer
		.pipe(autoprefixer())
		// Rename to main.css
		.pipe(rename({
			basename: 'main'
		}))
		// Write to destination
		.pipe(gulp.dest(themeFolder))
		// Build the hash
		.pipe(hash({
			template: '<%= hash %>'
		}))
		// Create the manifest
		.pipe(hash.manifest(`assets.json`, {
			append: true
		}))
		// Write to assets.json
		.pipe(gulp.dest(`${themeFolder}/`))
});

const blockAdminStylePath = [`${themeFolder}src/styles/bootstrap-blocks.scss`]
const blockStylePath = [`${themeFolder}src/styles/blocks.scss`]

const themeScriptPath = [
	`${themeFolder}src/js/*.js`,
	`${themeFolder}src/vendor/boostrap/js/*.js`,
	`${themeFolder}src/vendor/slickslider/*.js`,
	`${themeFolder}src/js/blocks/*.js`,
];
const blockScriptPath = [`${themeFolder}src/js/blocks/*.js`];

gulp.task('clean', function () {
	return del([
		`${themeFolder}/dist/**/*`
	])
})

/**
 * build block bootstrap admin sass
 */
gulp.task('build-block-bootstrap-sass', function () {
	return gulp.src(blockAdminStylePath, {
			allowEmpty: true
		})
		.pipe(sassGlob())
		.pipe(sass({
			outputStyle: 'condensed'
		}))
		.pipe(autoprefixer())
		.pipe(gulp.dest(`${themeFolder}/`))
		.pipe(hash({
			template: '<%= hash %>'
		}))
		.pipe(hash.manifest(
			`assets.json`, {
				append: true
			}
		))
		.pipe(gulp.dest(`${themeFolder}/`));
});

/**
 * build block sass
 */
gulp.task('build-block-sass', function () {
	return gulp.src(blockStylePath, {
			allowEmpty: true
		})
		.pipe(sassGlob())
		.pipe(sass({
			outputStyle: 'compact'
		}))
		.pipe(autoprefixer())
		.pipe(gulp.dest(`${themeFolder}/`))
		.pipe(hash({
			template: '<%= hash %>'
		}))
		.pipe(hash.manifest(
			`assets.json`, {
				append: true
			}
		))
		.pipe(gulp.dest(`${themeFolder}/`));
});

/**
 * watch block sass
 */
gulp.task('watch-block-sass', function () {
	return gulp.watch([...blockStylePath, `${themeFolder}src/blocks/**/*.scss`], gulp.series('build-block-sass'));
});

/**
 * build theme js
 */
gulp.task('build-theme-js', function () {
	return gulp.src(themeScriptPath, {
			allowEmpty: true
		})
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest(`${themeFolder}/`))
		.pipe(hash({
			template: '<%= hash %>'
		}))
		.pipe(hash.manifest(
			`assets.json`, {
				append: true
			}
		))
});

/**
 * watch theme js
 */
gulp.task('watch-theme-js', function () {
	return gulp.watch(themeScriptPath, gulp.series('clean', 'build-theme-js'));
});

/**
 * build block js
 */
gulp.task('build-block-js', function () {
	return gulp.src(blockScriptPath, {
			allowEmpty: true
		})
		.pipe(concat('blocks.js'))
		.pipe(uglify())
		.pipe(gulp.dest(`${themeFolder}/`))
		.pipe(hash({
			template: '<%= hash %>'
		}))
		.pipe(hash.manifest(
			`assets.json`, {
				append: true
			}
		))
		.pipe(gulp.dest(`${themeFolder}/`));
});

/**
 * watch block js
 */
gulp.task('watch-block-js', function () {
	return gulp.watch(blockScriptPath, gulp.series('clean', 'build-block-js'));
});

// /**
//  * watch images
//  */
//  gulp.task('watch-images', function () {
// 	return gulp.watch(themeImages, gulp.series('build', 'build-images'));
// });

// /**
//  * build images
//  */
//  gulp.task('build-images', function () {
// 	return gulp.src(themeImages, {
// 			allowEmpty: true
// 		})
// 		.pipe(changed(`${themeFolder}/src/img/`))
// 		.pipe(image({
//       pngquant: true,
//       optipng: false,
//       zopflipng: true,
//       jpegRecompress: false,
//       mozjpeg: true,
//       gifsicle: true,
//       svgo: true,
//       concurrent: 10,
//       quiet: true // defaults to false
//     }))
//     .pipe(gulp.dest(`${themeFolder}/src/img/`));
// });


/**
 * build everything
 */
gulp.task('build', gulp.parallel(['build-theme-sass', 'build-block-sass', 'build-block-bootstrap-sass', 'build-theme-js', 'build-block-js']));

/**
 * watch everything
 */
gulp.task('watch', gulp.parallel(['watch-theme-sass', 'watch-block-sass', 'watch-theme-js', 'watch-block-js']));

/**
 * default process
 */
gulp.task('default', gulp.series('build', 'watch'));

/**
 * Browsers sync for delicious live reloading and stuff
 */
console.log('watching build-theme-sass sync');
browserSync.init({
	open: false,
	files: `${themeFolder}main.css`,
	browser: 'chrome',
	proxy: 'http://localhost',
	injectChanges: true,
	port: '3000',
	socket: {
		domain: "localhost:3000"
	},
	snippetOptions: {
		whitelist: ['/wp/wp-admin/admin-ajax.php'],
		blacklist: ['/wp/wp-admin/**']
	},
});

browserSync.watch(`${themeFolder}main.js`).on('change', browserSync.reload);
browserSync.watch(`${themeFolder}main.css`).on('change', browserSync.stream);
gulp.watch(themePHPPath).on('change', browserSync.reload);
