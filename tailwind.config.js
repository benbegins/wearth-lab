module.exports = {
	content: [
		"./src/**/*.html",
		"./src/**/*.vue",
		"./src/**/*.jsx",
		"./**/*.php",
	],
	theme: {
		colors: {
			dark: "#00282a",
			light: "#f4eceb",
		},
		container: {
			padding: {
				DEFAULT: "1.5rem",
				sm: "3rem",
				lg: "4vw",
			},
			center: true,
		},
		screens: {
			sm: "640px",
			md: "768px",
			lg: "1024px",
			xl: "1280px",
			xxl: "1480px",
		},
	},
	variants: {},
	plugins: [],
}
