module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false,
    theme: {
        extend: {
            colors: {
                primary: '#5b3cc4',
                success: 'rgb(23, 201, 100)',
                danger: 'rgb(242, 19, 93)',
                warning: 'rgb(255, 130, 0)',
                dark: 'rgb(36, 33, 69)',
                theme: {
                    text: '#6B7885',
                    color: '#2c3e50',
                    layout: '#fff',
                    bg: '#f4f7f8',
                    bg2: '#eef2f5',
                    code: '#3f3d56',
                    code2: '#363449'
                }
            },
            fontFamily: {
                'poppins': ['Poppins', 'sans-serif'],
                serif: ['Merriweather', 'serif'],
            },
            translate: {
                '54': '54px'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}