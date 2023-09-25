import "../scss/style.scss"

// Libraries
import LocomotiveScroll from "locomotive-scroll"

// Scripts
import App from "./App.vue"
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
}

// Vue app
// Vue.createApp(App).mount("#page")

// window.addEventListener("DOMContentLoaded", init)
// window.addEventListener("pageshow", init)
window.addEventListener("load", init)
// window.addEventListener("popstate", init)

// init()
