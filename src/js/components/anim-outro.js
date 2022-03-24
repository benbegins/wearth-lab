import gsap from "gsap"

const animOutro = (href) => {
	const tl = new gsap.timeline()

	gsap.to(".site-outro .overlay", {
		opacity: 0.75,
		duration: 0.9,
	})

	gsap.to(
		".site-outro .background-light",
		{
			scaleY: 1,
			duration: 1.1,
			ease: "expo.inOut",
		},
		"-=0.9"
	)

	gsap.to(
		".icon-loading",
		{
			opacity: 1,
			duration: 0.75,
		},
		"-=0.55"
	)
	setTimeout(() => {
		window.location.assign(href)
	}, 750)
}

export default animOutro
