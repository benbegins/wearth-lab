import gsap from "gsap"

const animation = () => {
	const elements = document.querySelectorAll(".fade[data-delay], .reveal-wipe[data-delay]")
	if (elements) {
		elements.forEach((element) => {
			const delay = `${element.getAttribute("data-delay")}s`
			if (delay) {
				element.style.transitionDelay = delay
			}
		})
	}

	const introReveal = document.querySelector(".intro-reveal")
	if (introReveal) {
		const lines = introReveal.querySelectorAll(".line")

		if (lines) {
			lines.forEach((line, index) => {
				const reveal = line.querySelector(".reveal-element")
				const delay = index * 0.15

				gsap.defaults({
					duration: 1.5,
					ease: "power4.out",
				})
				gsap.to(reveal, {
					yPercent: -100,
					delay: delay,
				})
			})
		}
	}
}

export default animation
