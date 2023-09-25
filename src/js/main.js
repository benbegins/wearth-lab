import "../scss/style.scss"

// Libraries
import LocomotiveScroll from "locomotive-scroll"

// Scripts
// import App from "./App.vue"
import swiper from "./components/swiper"
import animation from "./components/animation"
import Menu from "./components/menu"

let menu

const init = () => {
	swiper()
	animation()

	const loco = new LocomotiveScroll({
		el: document.querySelector("[data-scroll-container]"),
		smooth: true,
	})

	menu = new Menu(loco)
	menuSticky(loco)
}

// Vue app
// Vue.createApp(App).mount("#page")

// window.addEventListener("DOMContentLoaded", init)
// window.addEventListener("pageshow", init)
window.addEventListener("load", init)
// window.addEventListener("popstate", init)

// init()

const menuSticky = (loco) => {
	const header = document.querySelector(".site-header")

	loco.on("scroll", (e) => {
		if (e.scroll.y > 75) {
			header.classList.add("is-scrolling")
		} else {
			header.classList.remove("is-scrolling")
		}
	})
}
