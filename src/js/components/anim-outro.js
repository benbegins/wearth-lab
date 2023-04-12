import gsap from "gsap"

const animOutro = (href) => {
	const tl = new gsap.timeline()

	tl.to(".site-outro .overlay", {
		opacity: 0.75,
		duration: 0.9,
	})

	tl.to(
		".site-outro .background-light",
		{
			scaleY: 1,
			duration: 1.1,
			ease: "expo.inOut",
			onComplete: () => {
				window.location.assign(href)
			},
		},
		"-=0.9"
	)

	tl.to(
		".icon-loading",
		{
			opacity: 1,
			duration: 0.75,
		},
		"-=0.55"
	)
}

export default animOutro
