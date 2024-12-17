import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/views/**/*.blade.php',
		 //flowbite"./node_modules/flowbite/**/*.js",
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
        },
    },
	daisyui: {
		themes: [
            {
                mytheme: {
                    primary: "#EA9E67", 
                    secondary: "#FDF9F6"
                },
            },
            "garden"
        ],
	  },

    plugins: [
		forms,
		//flowbiterequire('flowbite/plugin'),
		require("daisyui")
	],
};
