const defaultTheme = require('tailwindcss/defaultTheme');


const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',  PARA QUE FUNCIONE NPM RUN DEV
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                trueGray: colors.trueGray, 
                orange: colors.orange,  
                greenLime: colors.lime,
                fuchsia: colors.fuchsia,
                teal: colors.teal,
                rose: colors.rose,

              },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],

    corePlugins: {    
       container: false,
    }
};
