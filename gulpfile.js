var gulp = require("gulp");
var sass = require("gulp-sass");
var notify = require("gulp-notify");
var htmlmin = require('gulp-htmlmin');

var SRChtml = './source/php/*.php';

gulp.task('thor' , function(){
	return gulp.src('./source/sass/*.scss')
		.pipe(sass({outputStyle:'compressed'}))
		.on('error', notify.onError({ title: 'Tem código no seu erro, presta atenção!', message: '<%= error.message %>'}))
		.pipe(gulp.dest('./dist/css'));
});


gulp.task('buildjs' , function(){
	return gulp.src([
		'./source/components/jquery/dist/jquery.js',
		'./source/components/jquery-mobile/jquery.mobile.custom.js'
		])
		.pipe(gulp.dest('./dist/js'))
});

gulp.task('move-fonts', function(){
	return gulp.src('./source/components/components-font-awesome/fonts/**')
		.pipe(gulp.dest('./dist/fonts'));
});

gulp.task('aquaman' , function(){
	return gulp.src('./source/js/*.js')
		.pipe(gulp.dest('./dist/js'));
});

// Minify Html:
gulp.task('minify-html', function() {
  return gulp.src(SRChtml)
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(''));
});

gulp.task('demolidor', function(){
	gulp.watch('./source/sass/*.scss', ['thor']);
	gulp.watch('./source/js/**/*.js',['aquaman']);
	gulp.watch(SRChtml, ['minify-html']);
});

gulp.task('default',['buildjs','thor','aquaman','demolidor','minify-html']);

