'use_strict';

module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    project: {
      theme: ['sabrinasewandsew'], // Edit this per project
      app: ['./source/themes/<%= project.theme %>'],
      build: ['./build/wp-content/themes/<%= project.theme %>'],
      css: ['<%= project.app %>/styles'],
      js: ['<%= project.app %>/scripts'],
      pluginSouce: ['./source/plugins'],
      pluginBuild: ['./build/wp-content/plugins']
    },
    // Sass -> CSS
    sass: {
      dev: {
        options: {
          outputStyle: 'expanded',
          outFile: '<%= project.build %>/style.css',
          sourceMap: true
        },
        files: {
            "<%= project.build %>/style.css": "<%= project.css %>/style.sass"
        }
      },
      build: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
            "<%= project.build %>/style.css": "<%= project.css %>/style.sass"
        }
      }
    },
    // Coffeescript -> JS
    coffee: {
      dev: {
        options: {
          bare: true,
          sourceMap: false
        },
        expand: true,
        flatten: false,
        cwd: '<%= project.app %>/',
        src: ['**/*.{coffee,litcoffee}'],
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
        src: ['**/*.{coffee,litcoffee}'],
        dest: '<%= project.build %>/',
        ext: '.js'
      }
    },
    //** UNIT TESTS AND JSHINT **/
    // Checks javascript for errors
    jshint: {
      options: {
        jshintrc: './source/.jshintrc',
        reporter: require('jshint-stylish')
      },
      all: [
        '<%= project.build %>/scripts/app.js',
        '!<%= project.build %>/scripts/vendor/**/*.js'
      ]
    },
    // Adds any relevate autoprefixers supporting IE 11 and above
    autoprefixer: {
      options: {
        browsers: ["> 1%", "ie > 10"],
        map: true
      },
      target: {
        files: {
          "<%= project.build %>/style.css": "<%= project.build %>/style.css"
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
      php:{
        options:{
          title: "Grunt",
          message: "PHP Updated Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      plugins:{
        options:{
          title: "Grunt",
          message: "Plugins Updated Successfully.",
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
    // Copies remaining files to places other tasks can use
    copy: {
      main: {
        expand: true,
        cwd: '<%= project.app %>/',
        src: [
          '*.{ico,png,txt}',
          '**/*.php', 
          'content/**/*',
          'screenshot.png'
        ],
        dest: '<%= project.build %>/',
      },
      plugins: {
        expand: true,
        cwd: '<%= project.pluginSouce %>/',
        src: ['**/*'],
        dest: '<%= project.pluginBuild %>/'
      }
    },
    bower: {
      dev: {
        dest: '<%= project.build %>/scripts/vendor/'
      }
    },
    sync: {
      php: {
        files: [{
          cwd: '<%= project.app %>/',
          src: ['**/*.php'],
          dest: '<%= project.build %>/'
        }],
      },
      images: {
        files: [{
          cwd: '<%= project.app %>/',
          src: ['images/*.{jpg,png,gif,svg}'],
          dest: '<%= project.build %>/'
        }],
      },
      plugins: {
        files: [{
          cwd: '<%= project.pluginSouce %>/',
          src: ['**/*'],
          dest: '<%= project.pluginBuild %>/'
        }]
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
        files: ['<%= project.css %>/**/*.{scss,sass}'],
        tasks: ['sass:dev','autoprefixer','notify:sass']
      },
      coffee: {
        files: ['<%= project.js %>/**/*.{coffee,litcoffee}'],
        tasks: ['coffee:dev', 'jshint', 'notify:coffee']
      },
      // Sync tasks for PHP, Plugins, and Images
      php: {
        files: ['<%= project.app %>/**/*.php'],
        tasks: ['sync:php', 'notify:php']
      },
      plugins: {
        files: '<%= project.pluginSouce %>/**/*',
        tasks: ['sync:plugins', 'notify:plugins']
      },
      images: {
        files: ['<%= project.app %>/images/*.{png,jpg,jpeg,gif,webp,svg}'],
        tasks: ['sync:images', 'notify:images']
      },
      gruntfile: {
        files: ['Gruntfile.js']
      }
    },
    // Server setup -- Need external dB for WordPress development.
    php: {
      dev: {
        options: {
          base: 'build',
          port: 8888,
          open: false,
          keepalive: false,
          silent: true
        }
      }
    },
    browserSync: {
      dev: {
        bsFiles: {
          src : [
              '<%= project.build %>/style.css',
              '<%= project.build %>/**/*.js',
              '<%= project.build %>/**/*.{png,jpg,jpeg,gif,webp,svg}',
              '<%= project.build %>/**/*.{php,html}',
              '<%= project.pluginBuild %>/**/*.*'
          ]
        },
        options: {
          proxy: 'localhost:8888', //our PHP server
          port: 9000,
          watchTask: true,
          notify: true,
          open: true,
          logLevel: 'info',
          ghostMode: {
            clicks: true,
            scroll: true,
            links: true,
            forms: true
          }
        }
      }
    }
  });

  // Default task(s).
  grunt.registerTask('default', [
    'clean',
    'copy:main',
    'copy:plugins',
    'bower',
    'sass:dev',
    'autoprefixer',
    'coffee:dev',
    'jshint',
    'php',
    'browserSync',
    'watch'
  ]);
  grunt.registerTask('build', [
    'clean',
    'copy:main',
    'copy:plugins',
    'bower',
    'sass:build',
    'autoprefixer',
    'coffee:build',
    'jshint'
  ]);
};
