import Swiper, { Navigation } from "swiper"
import "/node_modules/swiper/swiper.min.css"

Swiper.use([Navigation])

const swiper = () => {
	// Slider products
	const swiperListProducts = new Swiper(".swiper-list-products", {
		speed: 400,
		slidesPerView: "auto",

		breakpoints: {
			1024: {
				enabled: false,
			},
		},
	})

	// Slider Marques
	const swiperListMarques = new Swiper(".swiper-list-marques", {
		speed: 400,
		slidesPerView: "auto",
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	})

	// Position Arrow buttons (marques)
	const listMarques = document.querySelector(".swiper-list-marques")

	if (listMarques) {
		const btnsArrow = listMarques.querySelectorAll(".btn-arrow")

		function arrowsPosition() {
			const height =
				listMarques.querySelector(".img-container").offsetHeight

			btnsArrow.forEach((btn) => {
				btn.style.top = `${height / 2}px`
			})
		}

		arrowsPosition()
		window.addEventListener("resize", arrowsPosition)
	}

	// Slider Gallery product
	const swiperGalleryProduct = new Swiper(".swiper-gallery-product", {
		speed: 600,
		slidesPerView: "auto",
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	})
}

export default swiper
