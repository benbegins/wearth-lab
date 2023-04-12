import "../scss/style.scss"

// Scripts
import App from "./App.vue"
import transition from "./components/transition"
import swiper from "./components/swiper"
import animation from "./components/animation"

const init = () => {
	swiper()
	transition()
	animation()
}

// Vue app
Vue.createApp(App).mount("#page")

// window.addEventListener("DOMContentLoaded", init)
window.addEventListener("pageshow", init)
// window.addEventListener("load", init)
// window.addEventListener("popstate", init)

// init()
