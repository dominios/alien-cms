module.exports = function (grunt) {

    // Project configuration
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        // @todo rewrite to add also 3rd party scripts
        // uglify: {
        //     dist: {
        //         options: {
        //             beautify: true,
        //             sourceMap: true
        //         },
        //         src: 'src/**/*.js',
        //         dest: 'build/js/app.min.js'
        //     }
        // },

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
            dist: {
                files: [

                ]
            },
            libraries: {
                files: [
                    /**
                     *  3rd party JS & CSS
                     *  Need to create folders .tmp/{n} to keep order in which are libraries loaded
                     *  put files for same plugin under the same dir
                     */
                    { expand: true, flatten: true, dest: 'build/.tmp/1', src: ['node_modules/angular/angular.min.js'] },
                    { expand: true, flatten: true, dest: 'build/.tmp/2', src: ['node_modules/angular-resource/angular-resource.min.js'] },
                    { expand: true, flatten: true, dest: 'build/.tmp/3', src: ['node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js'] },
                    { expand: true, flatten: true, dest: 'build/.tmp/4', src: ['node_modules/ng-content-editable/dist/ng-content-editable.min.js'] },
                    { expand: true, flatten: true, dest: 'build/.tmp/5', src: ['node_modules/ng-tags-input/build/ng-tags-input.min.js'] },
                    { expand: true, flatten: true, dest: 'build/.tmp/5', src: ['node_modules/ng-tags-input/build/ng-tags-input.min.css'] },
                    { expand: true, flatten: true, dest: 'build/ckeditor', src: ['node_modules/ckeditor/*'] }, // ckeditor cannot be added to build
                    { expand: true, flatten: true, dest: 'build/js', src: ['node_modules/bootstrap/dist/js/bootstrap.min.js'], filter: 'isFile' },
                    { expand: true, flatten: true, dest: 'static/fonts/', src: ['node_modules/font-awesome/fonts/*'], filter: 'isFile' }
                ]
            }
        },

        concat: {
            options: {
                separator: ';\n'
            },
            dev: {
                files : [
                    {
                        src: ['build/.tmp/**/*.js', 'src/**/*.js'],
                        dest: 'build/js/app.min.js'
                    }, {
                        src: 'build/.tmp/**/*.css',
                        dest: 'build/css/app.min.css'
                    }
                ]
            }
        }

    });

    // Load the plugins that provides tasks.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Available tasks:
    grunt.registerTask('default', ['watch']);

    // build tasks
    // @todo task which will copy static assets which won't be copied during watch script to save time
    // @todo rewrite grunt.registerTask('build', ['clean:build', 'uglify', 'sass:build', 'cssmin', 'clean:temp', 'copy:dist']);
    // grunt.registerTask('dev', ['clean:build', 'concat', 'sass', 'cssmin', 'clean:temp', 'copy:dist']);
    grunt.registerTask('dev', ['clean:build', 'copy:libraries', 'sass:dev', 'concat:dev', 'clean:temp']);

    // rename watch to watcher and initialize watch task which will build at start
    grunt.renameTask('watch', 'watcher');
    grunt.registerTask('watch', ['dev', 'watcher']);
};
