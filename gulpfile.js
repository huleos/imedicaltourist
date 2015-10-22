/**********************************************
Dependencies
***********************************************/
var gulp            = require('gulp'),
		uglify          = require('gulp-uglify'),
		concat          = require('gulp-concat'),
		sass            = require('gulp-sass'),
		prefix          = require('gulp-autoprefixer'),
		sourcemaps      = require('gulp-sourcemaps'),
		imagemin        = require('gulp-imagemin'),
		spritesmith     = require('gulp.spritesmith'),
		notify          = require('gulp-notify'),
		cache           = require('gulp-cache'),
		del             = require('del'),
		plumber         = require('gulp-plumber'),
		browserSync     = require('browser-sync');

// Paths
var paths = {
	'bower': 'bower_components',
	'assets': 'assets'
};

/**********************************************
Style Task
***********************************************/
gulp.task('styles', function () {
	gulp.src('assets/sass/style.scss')
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sass({
			includePaths: [
				paths.bower + '/bootstrap/scss'
			]
		}))
		.pipe(sass())
		.pipe(prefix({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(sass({outputStyle: 'compressed'}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(paths.assets + '/css'))
		.pipe(notify({ message: 'Styles task complete' }));
});

/**********************************************
Scripts Tasks
***********************************************/
gulp.task('scripts', function(){
	gulp.src([
		paths.bower + '/jquery/dist/jquery.js',
		paths.bower + '/bootstrap/dist/js/bootstrap.js',
		paths.assets + '/js/custom.js'
		])
		.pipe(plumber())
	  .pipe(uglify())
	  .pipe(concat('all.js'))
	  .pipe(gulp.dest(paths.assets + '/js'))
	  .pipe(notify({ message: 'Scripts task complete' }));
});

/**********************************************
Images Tasks
***********************************************/

gulp.task('sprite', function() {
    var spriteData = 
        gulp.src('assets/img/sprite/*.*') // source path of the sprite images
        		//.pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
        		.pipe(plumber())
            .pipe(spritesmith({
                imgName: 'sprite.png',
                imgPath: '../img/sprite.png',
                cssName: '_sprite.scss',
                cssVarMap: function (sprite) {
								  sprite.name = 'icon-' + sprite.name + ':before';
								}
            }));
    spriteData.img.pipe(gulp.dest('assets/img/')); // output path for the sprite
    spriteData.css.pipe(gulp.dest('assets/sass/components/')) // output path for the CSS
    .pipe(notify('Sprite task complete ;)'));
});

gulp.task('image', function() {
	return gulp.src('assets/img/**/*')
		.pipe(plumber())
	  .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
	  .pipe(gulp.dest('assets/img'))
	  .pipe(notify('Image minify task complete ;)'));
});

/**********************************************
Watch Tasks
***********************************************/

gulp.task('watch', function(){
	// Watch .scss files
	gulp.watch('assets/sass/**/*.scss', ['styles']);
	// Watch .js files
	gulp.watch(['assets/js/*.js', '!assets/js/all.js'], ['scripts']);
	// Watch image files
	gulp.watch('assets/img/**/*', ['image']);
});

/**********************************************
Server
***********************************************/

gulp.task('browser-sync', function() {
	var files =[
		'application/views/**/*.php',
		'assets/css/**/*.css',
		'assets/js/*.js'
	];

  browserSync.init(files, {
      proxy: "imedicaltourist.app"
  });
});

gulp.task('serve', ['browser-sync', 'watch']);

/**********************************************
Build Tasks
***********************************************/

gulp.task('build', ['scripts', 'styles', 'image']);

/**********************************************
Clean Tasks
***********************************************/

gulp.task('clean', function() {
    del([
    	'.sass-cache',
    	'assets/js/all.js',
    	'assets/css/style.css'
    ]);
});

/**********************************************
Default Tasks
***********************************************/

gulp.task('default', ['clean'], function() {
    gulp.start('build');
});










