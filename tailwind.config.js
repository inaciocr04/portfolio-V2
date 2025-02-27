import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            animation: {
                customPulse: 'pulse 1s infinite',
            },
            backgroundImage: {
                'donut-gradient': 'radial-gradient(circle, #4F6D7A, #C0D6DF)',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
                quicksand: ['Quicksand', 'serif'],
                playfair: ['Playfair Display', 'serif'],
            },
            colors: {
                'blue-primary-color': '#4F6D7A',
                'blue-secondary-color': '#A3B9C7',
                'blue-third-color': '#597A88',
                'blue-fourth-color': '#085F87',
                'blue-fifth-color': '#2C465E',
                'blue-sixth-color': '#E8F1F2',
                'blue-seventh-color': '#22B9C9',
                'beige-background-color': '#efe7e5',
                'beige-primary-color': '#F5F7FA',
                'beige-secondary-color': '#3E4C59',
                'beige-third-color': '#ecd9d5',
                'beige-fourth-color': '#f8ab9b',
                'beige-fifth-color': '#3E4C59',
                'beige-sixth-color': '#7B8794',
                'fond_principal' : '#075275',
                'texte_principal' : '#FFFFFF',
                'titres_et_sous-titres' : '#6A7F86',
                'boutons_et_appels_à_laction' : '#F4A300',
                'arrière-plan_secondaire' : '#D0E4E4',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms')({
            strategy: 'class'
        })
    ],
};
