/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Arial', 'Helvetica', 'sans-serif'],
                mono: ['ui-monospace', 'SFMono-Regular', 'Menlo', 'monospace'],
            },
            keyframes: {
                blink: {
                    '0%,100%': { opacity: '1' },
                    '50%': { opacity: '0' },
                },
                'spin-slow': {
                    from: { transform: 'rotate(0deg)' },
                    to: { transform: 'rotate(360deg)' },
                },
                marquee: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
                'fade-in-up': {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                'fade-in': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                'scale-in': {
                    '0%': { opacity: '0', transform: 'scale(0.95)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                'rocket-fly': {
                    '0%': { left: '0%', transform: 'translateY(-50%) rotate(-8deg)' },
                    '50%': { transform: 'translateY(-50%) rotate(-8deg) scale(1.05)' },
                    '100%': { left: '100%', transform: 'translateY(-50%) rotate(-8deg)' },
                },
                'planet-pulse': {
                    '0%,100%': { transform: 'scale(1)', opacity: '1' },
                    '50%': { transform: 'scale(1.08)', opacity: '0.9' },
                },
                'trail': {
                    '0%': { width: '0%', opacity: '1' },
                    '100%': { width: '100%', opacity: '1' },
                },
            },
            animation: {
                blink: 'blink 1s step-end infinite',
                'spin-slow': 'spin-slow 24s linear infinite',
                'spin-slower': 'spin-slow 40s linear infinite',
                marquee: 'marquee 30s linear infinite',
                'fade-in-up': 'fade-in-up 0.7s ease-out both',
                'fade-in': 'fade-in 0.6s ease-out both',
                'scale-in': 'scale-in 0.5s ease-out both',
                'planet-pulse': 'planet-pulse 3s ease-in-out infinite',
            },
        },
    },
    plugins: [],
}