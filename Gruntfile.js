module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);
  require('time-grunt')(grunt);


  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


  /*=============================================
  =            SASS                             =
  =============================================*/
        

    /*==========  grunt sass - LibSass compile  ==========*/

    sass: {
      options: {
        sourceMap: true,
        outputStyle: 'compressed',
        sourceComments: false
      },
      dist: {
        files: {
        'style.css': 'scss/style.scss'
        }
      }
    },


    /*==========  grunt scsslint - Linting via scss-lint gem  ==========*/

    scsslint: {
      allFiles: [
        'scss/**/*.scss', '!scss/vendors/**/*.scss'
      ],
      options: {
        bundleExec: false,
        config: 'scss/scss-lint.yml',
        colorizeOutput: true,
        force: true,

      },
    },


    /*==========  grunt banner - Add theme info to css  ==========*/

    WPTheme: '/* \nTheme Name: <%= pkg.name %>\n' +
        'Version: <%= pkg.version %>\n' +
        'Description: <%= pkg.title %>\n' +
        'Author: <%= pkg.author %>\n' +
        '<%= grunt.template.today("dd-mm-yyyy") %>\n */',

    usebanner: {
      dist: {
        options: {
          position: 'top',
          banner: '<%= WPTheme %>'
        },
        files: {
          src: [ 'style.css' ]
        }
      }
    },



  /*=============================================
  =            Image Functions                  =
  =============================================*/
  



    /*==========  SVGMin - cleanup and compress svg  ==========*/

    svgmin: {
      options: {
        plugins: [
        { removeViewBox: false }, 
        { removeUselessStrokeAndFill: true }, 
        { cleanupIDs: true }
        ]
      },
      dist: {
        expand: true,
        cwd: 'img/svg/raw/',
        src: ['*.svg'],
        dest: 'img/svg/compressed'
      }
    },


    /*==========  SVGStore - generate svg sprite  ==========*/

    svgstore: {
      options: {
        includedemo: false,
        cleanup: true,
        symbol: { viewBox: '0 0 100 100' }
      },
      default: {
        files: {'img/sprite.svg': ['img/svg/compressed/*.svg']},
      }
    },


    /*==========  ImageMin - compress raster files  ==========*/

    imagemin: { 
      dynamic: { 
        options: { optimizationLevel: 7},
        files: [{
          expand: true,
          cwd: 'img/raster/raw/', 
          src: ['**/*.{png,jpg,gif}'], 
          dest: 'img/raster/compressed/' 
        }]
      }
    },
    
    /*==========  ImageOptim - compress raster files again  ==========*/

    imageoptim: {
      myTask: {
        src: ['img/raster/compressed/']
      }
    },

    
    
  /*=============================================
  =            JS Functions                     =
  =============================================*/
  


    /*==========  JSHint - Check JS  ==========*/

    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        eqnull: true,
        browser: true,
        globals: { jQuery: true },
      },
      uses_defaults: ['js/main.js'],
    },


    /*==========  Uglify - compress JS  ==========*/

    uglify: {
      my_target: {
        options: {
          sourceMap: true,
          sourceMapName: 'script.js.map',
          compress: {
            drop_console: true
          }
        },

        files: {
          'js/main.min.js': ['js/main.js']
        }
      }
    },



  /*=============================================
  =            Watch Task                      =
  =============================================*/


    watch: {
      scripts: {
        files: ['js/*.js'],
        tasks: ['newer:jshint', 'newer:uglify'],
        options: {
          livereload: 25711,
        }
      },

      images: {
        files: ['img/raster/raw/*.{png,jpg,gif}'],
        tasks: ['newer:imagemin'],
        options: {
          livereload: 25711,
        }
      },

      php: {
        files: ['*.php', '**/*.php'],
        options: {
          livereload: 25711,
        }
      }, 

      html: {
        files: ['*.html', '**/*.html'],
        options: {
          livereload: 25711,
        }
      }, 

      css: {
        files: ['scss/admin.css'],
        options: {
          livereload: 25711,
        }
      }, 

      svg: {
        files: ['img/svg/raw/*.svg'],
        tasks: ['svgmin', 'svgstore'],
        options: {
          livereload: 25711,
        }
      },

      sass: {
        files: ['scss/*.scss', 'scss/**/*.scss', '!scss/vendors/**'],
        tasks: ['scsslint', 'sass', 'usebanner'],
        options: {
          livereload: 25711,
        }
      }

    }


  });

  grunt.registerTask('style', ['scsslint', 'sass', 'usebanner']);
  grunt.registerTask('scripts', ['jshint', 'uglify']);
  grunt.registerTask('images', ['svgmin', 'svgstore', 'imagemin', 'imageoptim']);
  grunt.registerTask('dev', ['watch']);

};

