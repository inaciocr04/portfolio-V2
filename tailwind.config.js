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
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                'blue-bg-primary-color': '#075275',
                'blue-primary-color': '#13293D',
                'blue-secondary-color': '#006494',
                'blue-third-color': '#1D94CC',
                'blue-fourth-color': '#2C465E',
                'blue-fifth-color': '#1BB3FA',
                'blue-sixth-color': '#E8F1F2',
                'blue-seventh-color': '#22B9C9',
                'beige-background-color': '#efe7e5',
                'beige-primary-color': '#F5F7FA',
                'beige-secondary-color': '#3E4C59',
                'beige-third-color': '#ecd9d5',
                'beige-fourth-color': '#f8ab9b',
                'beige-fifth-color': '#3E4C59',
                'beige-sixth-color': '#7B8794',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms')({
            strategy: 'class'
        })
    ],
};
