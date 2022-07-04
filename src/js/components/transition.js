import animIntro from "./anim-intro"
import animOutro from "./anim-outro"

const transition = () => {
	// Intro
	animIntro()

	// Outro
	const links = document.querySelectorAll("a")
	const woocommerce = document.querySelector(".woocommerce__container")

	if (links && woocommerce === null) {
		console.log(woocommerce)

		links.forEach((link) => {
			if (link.target == "_blank") {
				link.classList.add("no-transition")
			}
			link.addEventListener("click", (e) => {
				if (!link.classList.contains("no-transition")) {
					const href = link.href
					e.preventDefault()
					animOutro(href)
				}
			})
		})
	}
}

export default transition
