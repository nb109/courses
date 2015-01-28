module.exports = function(grunt){

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
          development: {
            files: {
              "templates/thistemplate/css/template.css": "templates/thistemplate/less/template.less"
            }
          }
        },
        watch: {
            styles: {
                files: ['templates/thistemplate/less/*.less','templates/thistemplate/less/styletile/*.less'],
                tasks: ['less'],
                options: {
                    nospawn: true
                }
            }
        }
    });

    grunt.registerTask('default', ['less']);
};
