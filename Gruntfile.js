module.exports = function(grunt) {

    grunt.initConfig({
  
      watch: {
        sass: {
          files: 'assets/css/*.scss',
          tasks: ['css'],
          options: {
            livereload: 35729
          }
        },
        all: {
          files: ['**/*.html'],
          options: {
            livereload: true
          }
        }
      },
    
    sass: {
      dev: {
        files: {
           // destination     // source file
          'assets/css/conciergewp.css': 'assets/css/conciergewp.scss'
                }
              }
            }
          });
  
    // Default task
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('css', ['sass', 'cssmin']);
  
    // Load up tasks
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
  
  };