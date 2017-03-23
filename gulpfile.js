var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

gulp.task('scss', function () {
  return gulp
    .src("./src/scss/**/*.scss")
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(autoprefixer({
    	browsers: ['last 2 versions'],
    	cascade: false
    }))
    .pipe(gulp.dest("dist/css/"));
});

gulp.task('watch', function(){
	gulp.watch('./src/scss/**/*.scss', ['scss'])
})