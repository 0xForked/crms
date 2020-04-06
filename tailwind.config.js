module.exports = {
    theme: {
        extend: {},
        customForms: theme => ({
            default: {
                checkbox: {
                    borderColor: 'transparent',
                    borderRadius: theme('borderRadius.lg'),
                    backgroundColor: theme('colors.gray.700'),
                    '&:focus': {
                        borderColor: 'transparent',
                        shadow: 'none'
                    }
                },
            }
        })
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms'),
    ],
}
