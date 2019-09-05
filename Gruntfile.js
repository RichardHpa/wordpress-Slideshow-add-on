module.exports = function(grunt) {

    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                    noCache: true,
                    sourcemap: 'none'

                },
                files: {
                    'assets/css/style.css' : 'assets/scss/style.scss'
                }
            }
        },
        csslint: {
            strict: {
                options: {
                    import: 2
                },
                src: ['assets/css/*.css', 'assets/css/!*.min.css']
            }
        },
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'assets/css/',
                    src: ['*.css', '!*.min.css'],
                    dest: 'assets/css/',
                    ext: '.min.css'
                }]
            }
        },
        jshint: {
            files: ['assets/js/script.js'],
            options: {
                 esversion: 6,
                globals:{
                    jQuery: true
                }
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'assets/js/script.min.js': ['assets/js/script.js']
                }
            }
        },
        watch: {
            sass: {
                files: ['assets/scss/*.scss'],
                tasks: ['sass', 'csslint', 'cssmin']
            },
            js: {
                files: ['assets/js/*.js', '!assets/js/*.min.js'],
                tasks: ['jshint', 'uglify']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-csslint');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify-es');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('css', ['sass', 'csslint', 'cssmin']);
    grunt.registerTask('js', ['jshint', 'uglify']);
}
