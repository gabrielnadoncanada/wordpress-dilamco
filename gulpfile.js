const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const rtlcss = require('gulp-rtlcss');
const del = require('del');

// Paths
const paths = {
  scss: {
    src: 'assets/scss/**/*.scss',
    main: 'assets/scss/style.scss',
    theme: 'assets/scss/theme.scss',
    dest: 'assets/css/'
  },
  admin: {
    src: 'assets/admin/**/*.scss',
    dest: 'assets/admin/'
  }
};

// Clean CSS files
function clean() {
  return del([
    'assets/css/style.css',
    'assets/css/style.css.map',
    'assets/css/style.rtl.css',
    'assets/css/theme.css',
    'assets/css/theme.css.map'
  ]);
}

// Compile main SCSS to CSS
function compileSass() {
  return gulp.src(paths.scss.main)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
      includePaths: ['node_modules']
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.scss.dest));
}

// Compile theme SCSS to CSS
function compileTheme() {
  return gulp.src(paths.scss.theme)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
      includePaths: ['node_modules']
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.scss.dest));
}

// Generate RTL CSS
function generateRTL() {
  return gulp.src('assets/css/style.css')
    .pipe(rtlcss())
    .pipe(rename({ suffix: '.rtl' }))
    .pipe(gulp.dest(paths.scss.dest));
}

// Compile admin SCSS
function compileAdmin() {
  return gulp.src(paths.admin.src)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.admin.dest));
}

// Watch files
function watchFiles() {
  gulp.watch(paths.scss.src, gulp.series(compileSass, generateRTL));
  gulp.watch(paths.scss.theme, compileTheme);
  gulp.watch(paths.admin.src, compileAdmin);
}

// Build task
const build = gulp.series(clean, gulp.parallel(compileSass, compileTheme, compileAdmin), generateRTL);

// Watch task
const watch = gulp.series(build, watchFiles);

// Default task
const defaultTask = watch;

// Export tasks
exports.clean = clean;
exports.sass = compileSass;
exports.theme = compileTheme;
exports.rtl = generateRTL;
exports.admin = compileAdmin;
exports.build = build;
exports.watch = watch;
exports.default = defaultTask;
