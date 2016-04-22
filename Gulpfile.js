var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var notify = require('gulp-notify');

gulp.task('test', function() {
    gulp.src('spec/**/*.php')
        .pipe(phpspec('', { clear: true, notify: true }))
        .on('error', notify.onError({
            title: 'Crap',
            message: 'Your tests failed!',
            icon: __dirname + '/fail.png'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All done.'
        }));
});

gulp.task('watch', function() {
    gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);
