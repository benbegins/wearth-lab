import gsap from "gsap"

const animIntro = () => {
	// Site intro
	const intro = document.querySelector(".site-intro")
	if (intro) {
		intro.style.display = "none"

		gsap.to(".icon-loading", {
			opacity: 0,
			duration: 0.5,
		})
	}

	// Anim Header
	const siteHeader = document.querySelector(".site-header")
	if (siteHeader) {
		gsap.to(siteHeader, {
			opacity: 1,
			duration: 0.75,
			ease: "linear",
			delay: 0.5,
		})
	}

	// Anim text intro
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
				gsap.from(reveal, {
					yPercent: 100,
					transformOrigin: "top right",
					rotate: "5deg",
					delay: delay,
				})
				gsap.fromTo(
					line,
					{
						clipPath: "polygon(0 0, 100% 0, 100% 0, 0 0)",
					},
					{
						clipPath: "polygon(0 0, 100% 0, 100% 100%, 0 100%)",
						delay: delay,
					}
				)
			})
		}
	}
}

export default animIntro
