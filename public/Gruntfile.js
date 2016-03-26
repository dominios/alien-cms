module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');

  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: false,
          optimization: 2
        },
        files: [
          { src: "less/application.less", dest: "css/application.min.css"}
        ]
      }
    },
    watch: {
      styles: {
        files: [
          'less/**/*.less'
        ],
        tasks: ['less'],
        options: {
          nospawn: true
        }
      },
      scripts: {
        files: [],
        tasks: ['uglify'],
        options: {
          nospawn: true
        }
      }
    }
    // uglify: {
    //   js: {
    //     files: {
    //       'public/js/main.min.js': [
    //         'public/js/libraries/*.js',
    //         'public/js/firmy/*.js',
    //         'public/echelon/fancybox/jquery.fancybox.pack.js',
    //         'public/echelon/echelon.fancybox.js',
    //         '!public/js/libraries/skel-layers.min.js',
    //         '!public/js/libraries/skel.min.js',
    //         '!public/js/libraries/init.js'
    //       ]
    //     }
    //   }
    // },
  });

  grunt.registerTask('default', ['less', 'watch', 'uglify']);
};
