module.exports = function (grunt) {
    
    // Project configuration
    grunt.initConfig({
        
        pkg: grunt.file.readJSON('package.json'),
        
        uglify: {
            dist: {
                options: {
                    beautify: true,
                    sourceMap: true
                },
                src: 'src/**/*.js',
                dest: 'build/js/app.min.js'
            }
        },
        
        sass: {
            build: {
                options: {
                    style: 'expanded',
                    trace: false,
                    lineNumbers: true,
                },
                files: [{
                    expand: true,
                    cwd: 'src/',
                    src: '*/*.scss', // only src dir, don't go deeper: use imports instead
                    dest: 'build/temp/',
                    ext: '.css'
                }]
            }
        },
        
        cssmin: {
            build: {
                src: 'build/**/*.css',
                dest: 'build/css/app.min.css'
            }
        },
        
        clean: {
            build: ['build', 'dist'],
            temp: ['build/**/temp']
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
                    { expand: true, src: ['node_modules/bootstrap/dist/js/bootstrap.min.js'], dest: 'dist/js/bootstrap.min.js', filter: 'isFile' },
                    { expand: true, src: ['node_modules/font-awesome/fonts/*'], dest: 'static/fonts/', filter: 'isFile', flatten: true }
                ]
            }
        },

        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: 'src/**/*.js',
                dest: 'build/js/app.min.js'
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
    grunt.registerTask('build', ['clean:build', 'uglify', 'sass', 'cssmin', 'clean:temp', 'copy:dist']);
    grunt.registerTask('dev', ['clean:build', 'concat', 'sass', 'cssmin', 'clean:temp', 'copy:dist']);

    // rename watch to watcher and initialize watch task which will build at start
    grunt.renameTask('watch', 'watcher');
    grunt.registerTask('watch', ['dev', 'watcher']);
};
