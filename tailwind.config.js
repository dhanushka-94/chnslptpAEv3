/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#fef2f2',
          100: '#fee2e2',
          200: '#fecaca',
          300: '#fca5a5',
          400: '#f87171',
          500: '#E30613',
          600: '#C40510',
          700: '#A1040E',
          800: '#7F030B',
          900: '#5C0208',
        },
        dark: {
          50: '#f8fafc',
          100: '#f1f5f9',
          200: '#e2e8f0',
          300: '#cbd5e1',
          400: '#94a3b8',
          500: '#64748b',
          600: '#475569',
          700: '#e2e8f0',
          800: '#f1f5f9',
          900: '#ffffff',
          950: '#f8fafc',
        },
        accent: {
          red: '#E30613',
          'red-light': '#f87171',
          'red-dark': '#C40510',
        }
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
        tech: ['Fira Code', 'Monaco', 'Cascadia Code', 'Roboto Mono', 'monospace'],
      },
      boxShadow: {
        'glow-primary': '0 0 20px rgba(227, 6, 19, 0.2)',
        'glow-primary-lg': '0 0 32px rgba(227, 6, 19, 0.25)',
        'soft': '0 1px 3px rgba(15, 23, 42, 0.06), 0 1px 2px rgba(15, 23, 42, 0.04)',
        'card': '0 4px 16px rgba(196, 5, 16, 0.08)',
      },
    },
  },
  plugins: [],
}
