'use strict';

var gulp = require( 'gulp' ),
  autoprefixer = require( 'gulp-autoprefixer' ),
  csso = require( 'gulp-csso' ),
  concat = require( 'gulp-concat' ),
  debug = require( 'gulp-debug' ),
  del = require( 'del' ),
  ftp = require( 'vinyl-ftp' ),
  gutil = require( 'gulp-util' ),
  plumber = require( 'gulp-plumber' ),
  rename = require( 'gulp-rename' ),
  stylus = require( 'gulp-stylus' ),
  uglify = require( 'gulp-uglify' );

var browserSync = require( 'browser-sync' ).create(),
  reload = browserSync.reload;

var paths = {
  clean: [
    './libs',
    './assets/css',
    './assets/js'
  ],
  watch: {
    php: './**/*.php',
    css: [
      './app/common.blocks/**/*.styl',
      './app/theme.blocks/**/*.styl',
      './app/config/**/*.styl'
    ],
    js: [
      './app/common.blocks/**/*.js',
      './app/theme.blocks/**/*.js'
    ],
    img: './assets/images/**/*.*'
  },
  build: {
    custom: {
      css: {
        src: [
          './app/config/fonts.styl',
          './app/config/vars.styl',
          './app/config/reset.styl',
          './app/config/mixins.styl',
          './app/common.blocks/**/*.styl',
          './app/theme.blocks/**/*.styl'
        ],
        dest: './assets/css'
      },
      js: {
        src: [
          './app/common.blocks/**/*.js',
          './app/theme.blocks/**/*.js'
        ],
        dest: './assets/js'
      },
      fonts: {
        src: './app/fonts/*.*',
        dest: './assets/fonts/*.*'
      }
    },
    vendor: {
      css: {
        src: './app/vendor/font-awesome/web-fonts-with-css/css/fontawesome.min.css',
        dest: './libs/css'
      },
      fonts: {
        src: './app/vendor/font-awesome/web-fonts-with-css/webfonts/*.*',
        dest: './libs/fonts'
      },
      license: {
        src: [
          './app/vendor/**/LICENSE.*',
          './vendor/**/license.*'
        ],
        dest: './app/libs/license'
      }
    },
    jquery: {
      src: './app/vendor/jquery/dist/jquery.min.js',
      dest: './libs/js'
    }
  }
}

gulp.task( 'serve', function() {
  // browserSync.init( { proxy: 'patrdimitry-db.loc' } );
  gulp.watch( paths.watch.css, gulp.series( 'build' ) );
  gulp.watch( paths.watch.js, gulp.series( 'build' ) );
  gulp.watch( paths.watch.img, gulp.series( 'build' ) );
  //gulp.watch( paths.watch.php ).on( 'change', reload );
} );

gulp.task( 'cssCustom', function() {
  return gulp.src( paths.build.custom.css.src )
    .pipe( plumber() )
    .pipe( concat( 'common.styl' ) )
    .pipe( stylus() )
    .pipe( autoprefixer() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( csso() )
    .pipe( gulp.dest( paths.build.custom.css.dest ) )
    .pipe( browserSync.stream() );
} );

gulp.task( 'jsCustom', function() {
  return gulp.src( paths.build.custom.js.src )
    .pipe( plumber() )
    .pipe( concat( 'common.js' ) )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( uglify() )
    .pipe( gulp.dest(paths.build.custom.js.dest) )
    .pipe( browserSync.stream() );
} );

gulp.task( 'fontsCustom', function() {
  return gulp.src( paths.build.custom.fonts.src )
    .pipe(gulp.dest( paths.build.custom.fonts.dest) );
} );

gulp.task( 'cssVendor', function() {
  return gulp.src( paths.build.vendor.css.src )
    .pipe( concat( 'vendor.min.css' ) )
    .pipe( csso() )
    .pipe( gulp.dest( paths.build.vendor.css.dest ) );
} );

gulp.task( 'fontsVendor', function() {
  return gulp.src( paths.build.vendor.fonts.src )
    .pipe( gulp.dest( paths.build.vendor.fonts.dest ) );
} );

gulp.task( 'licenseVendor', function() {
  return gulp.src( paths.build.vendor.license.src )
    .pipe( gulp.dest( paths.build.vendor.license.dest ) );
} );

gulp.task( 'jquery', function() {
  return gulp.src( paths.build.jquery.src )
    .pipe( gulp.dest( paths.build.jquery.dest ) );
});

gulp.task( 'clean', function() {
  return del( paths.clean );
} );

gulp.task( 'build', gulp.parallel( 'cssCustom', 'jsCustom', 'fontsCustom' ) );

gulp.task( 'libs', gulp.parallel( 'cssVendor', 'fontsVendor', 'licenseVendor', 'jquery' ) );

gulp.task( 'default', gulp.series( 'clean', 'build', 'libs', 'serve' ) );

gulp.task( 'deploy', function()
{
  var conn = ftp.create( {
      host:     'patrdimitry.ru',
      user:     'u0183649',
      password: 'cqDiFZOT1U}e',
      parallel: 10,
      log:      gutil.log
  } );
  var globs = [
    './components/**/*.php',
    './config/routes.php',
    './controllers/**/*.php',
    './models/**/*.php',
    './views/**/*.php',
    './assets/**/*.*',
    './libs/**/*.*',
  ];
  return gulp.src( globs, { base: '.', buffer: false } )
    .pipe( conn.newer( './family.patrdimitry.ru' ) )
    .pipe( conn.dest( './family.patrdimitry.ru' ) );
} );
