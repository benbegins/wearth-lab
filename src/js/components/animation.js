const animation = () => {
	const elements = document.querySelectorAll(
		".fade[data-delay], .reveal-wipe[data-delay]"
	)
	if (elements) {
		elements.forEach((element) => {
			const delay = `${element.getAttribute("data-delay")}s`
			if (delay) {
				element.style.transitionDelay = delay
			}
		})
	}
}

export default animation
