module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    bnr: {
        dev: '/*!\n*\n* <%= pkg.title %> Development JavaScripts\n* Generated: <%= grunt.template.today("yyyy-mm-dd") %> @ <%= grunt.template.today("HH:MM:ss") %>\n*\n*/\n\n\n',
        dist: '/*!<%= pkg.title %> JavaScripts Generated: <%= grunt.template.today("yyyy-mm-dd") %> @ <%= grunt.template.today("HH:MM:ss") %>*/',
        test: ''
    },
    
    dirs: {
        fonts: {
            src: 'bower_components',
            dest: 'fonts'
        },
        scripts: {
            src: 'js/src',
            dest: 'js'
        },
        reports: {
            dest: 'reports'
        },
        style: {
            src: 'scss',
            dest: 'css'
        }
    },

    clean: {
        scripts: [
            '<%= dirs.scripts.src %>/app.concat.js'
        ]
    },

    concat: {
        frameworks_dev: {
            options: {
                stripBanners: false,
            },
            src: [
                'bower_components/foundation/js/vendor/fastclick.js',
                'bower_components/foundation/js/foundation.js'
            ],
            dest: '<%= dirs.scripts.dest %>/frameworks.min.js'
        },
        frameworks_dist: {
            options: {
                stripBanners: false,
            },
            src: [
                'bower_components/fastclick/lib/fastclick.js',
                'bower_components/foundation/js/foundation.min.js'
            ],
            dest: '<%= dirs.scripts.dest %>/frameworks.min.js'
        },
        plugins_dev: {
            options: {
                stripBanners: false,
            },
            src: [
                'bower_components/justifiedImageRows/dist/justifiedImageRows.js',
                'bower_components/justifiedImageRows/dist/dependencies.js',
                'bower_components/calcImageDimensions/dist/calcImageDimensions.js',
                'bower_components/freewall/freewall.js'
            ],
            dest: '<%= dirs.scripts.dest %>/plugins.min.js'
        },
        plugins_dist: {
            options: {
                stripBanners: false,
            },
            src: [
                'bower_components/justifiedImageRows/dist/justifiedImageRows.js',
                'bower_components/justifiedImageRows/dist/dependencies.js',
                'bower_components/calcImageDimensions/dist/calcImageDimensions.js',
                'bower_components/freewall/freewall.js'
            ],
            dest: '<%= dirs.scripts.dest %>/plugins.min.js'
        },
        scripts_dev: {
            options: {
                stripBanners: false,
                banner: '<%= bnr.dev %>'
            },
            src: [
                '<%= dirs.scripts.src %>/**/*.js'
            ],
            dest: '<%= dirs.scripts.src %>/app.concat.js'
        },
        scripts_dist: {
            options: {
                stripBanners: true,
                banner: '<%= bnr.dist %>',
            },
            src: [
                '<%= dirs.scripts.src %>/**/*.js'
            ],
            dest: '<%= dirs.scripts.src %>/app.concat.js'
        }
    },

    copy: {
        main: {
            files: [
                {
                    '<%= dirs.scripts.dest %>/modernizr.min.js': 'bower_components/modernizr/modernizr.js',
                    '<%= dirs.scripts.dest %>/jquery.min.js': 'bower_components/jquery/dist/jquery.min.js'
                },
                {
                    dest: '<%= dirs.fonts.dest %>/font-awesome/',
                    expand: true,
                    flatten: true,
                    filter: 'isFile',
                    src: '<%= dirs.scripts.src %>/font-awesome/fonts/**'
                }
            ]
        }
    },

    sass: {
        options: {
        includePaths: ['bower_components/foundation/scss']
        },
        dist: {
            options: {
            outputStyle: 'compressed'
            },
            files: [{
                expand: true,
                cwd: 'scss',
                src: ['*.scss', '!_*.scss'],
                dest: '<%= dirs.style.dest %>',
                ext: '.css'
            }]
        },
        dev: {
            options: {
                outputStyle: 'expanded',
                sourceComments: 'normal',
                banner: '<%= bnr.dev %>'
            },
            files: [{
                expand: true,
                cwd: 'scss',
                src: ['*.scss', '!_*.scss'],
                dest: '<%= dirs.style.dest %>',
                ext: '.css'
            }]
        }
    },

    uglify: {
        options: {
            mangle: false,
            'screw-ie8': true
        },
        dist: {
            options: {
                banner: '<%= bnr.prod %>',
                beautify: {
                    beautify: false,
                    bracketize: true,
                },
                compress: {
                    drop_console: true,
                    drop_debugger: true
                },
                preserveComments: 'some',
                report: 'min',
                stats: true
            },
            files: {
                '<%= dirs.scripts.dest %>/app.min.js': ['<%= dirs.scripts.src %>/app.concat.js']
            }
        },
        dev: {
            options: {
                beautify: {
                    beautify: true,
                    bracketize: true,
                },
                compress: {
                    drop_console: false,
                    drop_debugger: false
                },
                preserveComments: 'all',
                report: 'min',
                stats: true,
                verbose: true
            },
            files: {
                '<%= dirs.scripts.dest %>/app.min.js': ['<%= dirs.scripts.src %>/app.concat.js']
            }
        }
    },


    watch: {
        grunt: {
            files: ['Gruntfile.js'],
            tasks: ['default']
        },

        sass: {
            files: '<%= dirs.style.src %>/**/*.scss',
            tasks: ['sass']
        },

        scripts: {
            files: '<%= dirs.scripts.src %>/*.js',
            tasks: ['clean:scripts', 'concat:scripts_dev', 'uglify:dev']
        }
    }
  });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['clean', 'sass:dist', 'concat:frameworks_dist', 'concat:plugins_dist', 'concat:scripts_dist', 'uglify:dist', 'copy']);
    grunt.registerTask('default', ['clean', 'sass:dev', 'concat:frameworks_dev', 'concat:plugins_dev', 'concat:scripts_dev', 'uglify:dev', 'copy', 'watch']);
}