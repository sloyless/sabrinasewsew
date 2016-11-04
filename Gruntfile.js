'use_strict';

module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    project: {
      app: ['./source'],
      build: ['./build'],
      css: ['<%= project.app %>/styles'],
      js: ['<%= project.app %>/scripts'],
      components: ['<%= project.app %>/components'],
      templates: ['<%= project.app %>/templates']
    },
    // Sass -> CSS
    sass: {
      dev: {
        options: {
          outputStyle: 'expanded',
          outFile: '<%= project.build %>/styles.css',
          sourceMap: true
        },
        files: {
            "<%= project.build %>/styles.css": "<%= project.css %>/styles.sass"
        }
      },
      build: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
            "<%= project.build %>/styles.css": "<%= project.css %>/styles.sass"
        }
      }
    },
    // Coffeescript -> JS
    coffee: {
      dev: {
        options: {
          bare: true,
          sourceMap: true
        },
        expand: true,
        flatten: false,
        cwd: '<%= project.app %>/',
        src: ['**/*.{coffee,litcoffee}','<%= project.components %>/**/*.{coffee,litcoffee}'],
        dest: '<%= project.build %>/',
        ext: '.js'
      },
      build: {
        options: {
          bare: true,
          sourceMap: false
        },
        expand: true,
        flatten: false,
        cwd: '<%= project.app %>/',
        src: ['**/*.{coffee,litcoffee}','<%= project.components %>/**/*.{coffee,litcoffee}'],
        dest: '<%= project.build %>/',
        ext: '.js'
      }
    },
    // Pug -> HTML
    pug: {
      compile: {
        options: {
          pretty: true
        },
        files: [{
          expand: true,
          cwd: '<%= project.app %>/',
          src: ['**/*.pug','!**/_*.pug'],
          dest: '<%= project.build %>/',
          ext: '.html'
        }]
      }
    },
    // Adds any relevate autoprefixers supporting IE 11 and above
    autoprefixer: {
      options: {
        browsers: ["> 1%", "ie > 10"],
        map: true
      },
      target: {
        files: {
            "<%= project.build %>/styles.css": "<%= project.build %>/styles.css"
        }
      }
    },
    //** UNIT TESTS AND JSHINT **/
    // Checks javascript for errors
    jshint: {
      options: {
        jshintrc: '<%= project.app %>/.jshintrc',
        reporter: require('jshint-stylish')
      },
      all: [
        '<%= project.build %>/scripts/app.js',
        '!<%= project.build %>/scripts/vendor/**/*.js'
      ]
    },
    // Minify JS
    uglify: {
      options: {
        mangle: true
      },
      target: {
        files: {
          "<%= project.build %>/scripts/app.min.js":   ["<%= project.build %>/scripts/app.js"]
        }
      }
    },
    notify: {
      sass:{
        options:{
          title: "Grunt",
          message: "Sass Compiled Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      coffee:{
        options:{
          title: "Grunt",
          message: "Coffeescript Compiled Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      pug:{
        options:{
          title: "Grunt",
          message: "Pug Compiled Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      uglify:{
        options:{
          title: "Grunt",
          message: "JS Linted and Minified Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      images:{
        options:{
          title: "Grunt",
          message: "Images Copied Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      }
    },
    sync: {
      images: {
        files: [{
          cwd: '<%= project.app %>/', 
          src: ['content/**/*', '*.{ico,png,txt}'],
          dest: '<%= project.build %>/'
        }],
      }
    },
    // Copies remaining files to places other tasks can use
    copy: {
      main: {
        expand: true,
        cwd: '<%= project.app %>/',
        src: [
          '*.{ico,png,txt}',
          '.htaccess',
          'content/**/*.*', 
          'scripts/vendor/**/*.*'
        ],
        dest: '<%= project.build %>/',
      }
    },
    // Empties folders to start fresh
    clean: {
      main: {
        files: [{
          dot: true,
          src: [
            '<%= project.build %>/{,*/}*'
          ]
        }]
      }
    },
    watch: {
      sass: {
        files: ['<%= project.css %>/**/*.{scss,sass}','<%= project.components %>/**/*.{scss,sass}'],
        tasks: ['sass', 'autoprefixer', 'notify:sass']
      },
      coffee: {
        files: ['<%= project.js %>/**/*.{coffee,litcoffee}','<%= project.components %>/**/*.{coffee,litcoffee}'],
        tasks: ['coffee', 'notify:coffee']
      },
      pug: {
        files: ['<%= project.app %>/**/*.pug'],
        tasks: ['pug', 'notify:pug']
      },
      uglify: {
        files: ['<%= project.build %>/**/*.js'],
        tasks:['jshint','uglify','notify:uglify']
      },
      images: {
        files: ['<%= project.app %>/content/**/*', '<%= project.js %>/vendor/*'],
        tasks: ['sync:images', 'notify:images']
      },
      gruntfile: {
        files: ['Gruntfile.js']
      }
    },
    // Server setup
    browserSync: {
      dev: {
        bsFiles: {
          src : [
              '<%= project.build %>/styles.css',
              '<%= project.build %>/**/*.js',
              '<%= project.build %>/content/**/*.{png,jpg,jpeg,gif,webp,svg}',
              '<%= project.build %>/**/*.html'
          ]
        },
        options: {
          watchTask: true,
          server: '<%= project.build %>/'
        }
      }
    }
  });
  
  // Default task(s).
  grunt.registerTask('default', [
    'clean',
    'copy',
    'pug',
    'sass:dev',
    'autoprefixer',
    'coffee:dev',
    'uglify',
    'jshint',
    'browserSync',
    'watch'
  ]);
  grunt.registerTask('build', [
    'clean',
    'copy',
    'pug',
    'sass:build',
    'autoprefixer',
    'coffee:build',
    'uglify',
    'jshint'
  ]);
};