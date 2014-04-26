// Final Gruntfile
module.exports = function(grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Minify JS
        uglify: {
            options: {
                banner: ''
            },
            target: {
                // Source file
                src: ['js/main.js'],

                // Minified new file
                dest: 'js/main.min.js'

            }
        },
        // Optimize images
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'images-orig/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'images/'
                }]
            }
        },
        compass: {                  // Task
            dist: {                   // Target
                options: {              // Target options
                    config: '.config.rb'
                }
            }
        },
        // Watch files and trigger tasks
        watch: {
            css: {
                files: ['sass/{,*/}*.{scss,sass}'],
                tasks: ['compass']
            },        
            uglify: {
                files: ['js/main.js'],
                tasks: ['uglify']
            },
            imagemin:{
                files: ['images-orig/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },
            livereload: {
                options: {
                    livereload: true
                },
                files: [
                    'public/*.php', 'css/*.css'
                ]
            },

        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['watch']);

};