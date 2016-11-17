module.exports = function (grunt) {

    // Project configuration
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    trace: false,
                    lineNumbers: true
                },
                files: [{
                    expand: true,
                    flatten: true,
                    cwd: 'src/',
                    src: '*/*.scss', // only src dir, don't go deeper: use imports instead
                    dest: 'build/.tmp/',
                    ext: '.css'
                }]
            }
        },

        /* @todo not used at the moment */
        cssmin: {
            build: {
                src: 'build/**/*.css',
                dest: 'build/css/app.min.css'
            }
        },

        clean: {
            build: ['build'],
            temp: ['**/.tmp']
        },

        watcher: { // renamed from watch
            scripts: {
                files: ['src/**/*.js', 'src/**/*.scss'],
                tasks: ['default'],
                options: {
                    debounceDealay: 500,
                    spawn: false
                }
            }
        },

        copy: {
            libraries: {
                files: [
                    /**
                     *  3rd party files which needs to be added to bundle
                     */
                    { expand: true, flatten: true, dest: 'build/ckeditor', src: ['node_modules/ckeditor/*'] }, // ckeditor cannot be added to build
                    { expand: true, flatten: true, dest: 'build/.tmp/6', src: ['node_modules/angular-material/angular-material.css'] },
                    { expand: true, flatten: true, dest: 'static/fonts/', src: ['node_modules/font-awesome/fonts/*'], filter: 'isFile' }
                ]
            }
        },

        concat: {
            options: {
                separator: ';\n'
            },
            dev: {
                files : [{
                    src: 'build/.tmp/**/*.css',
                    dest: 'build/css/app.min.css'
                }]
            }
        },

        requirejs: {
            options: {
                paths: {
                    'appFiles': './src/js'
                },
                removeCombined: true,
                out: 'build/js/app.min.js',
                optimize: 'none',
                baseUrl: 'src/js',
                name: 'main',
                include: [
                    '../../node_modules/requirejs/require.js',
                    '../../node_modules/angular/angular.min.js',
                    '../../node_modules/angular-resource/angular-resource.min.js',
                    '../../node_modules/ng-content-editable/dist/ng-content-editable.min.js',
                    '../../node_modules/angular-aria/angular-aria.js',
                    '../../node_modules/angular-animate/angular-animate.js',
                    '../../node_modules/angular-material/angular-material.js',
                    '../../node_modules/angular-route/angular-route.js'
                ]

            },
            dev:{
                options:{
                    optimize:'none'
                }
            },
            release:{
                options:{
                    optimize:'uglify'
                }
            }
        }

    });

    // Load the plugins that provides tasks.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Available tasks:
    grunt.registerTask('default', ['watch']);

    // build tasks
    // grunt.registerTask('dev', ['clean:build', 'copy:libraries', 'sass:dev', 'concat:dev', 'clean:temp']);
    grunt.registerTask('dev', ['clean:build', 'requirejs:dev', 'copy:libraries', 'sass:dev', 'concat:dev', 'clean:temp']);

    // rename watch to watcher and initialize watch task which will build at start
    grunt.renameTask('watch', 'watcher');
    grunt.registerTask('watch', ['dev', 'watcher']);
};
