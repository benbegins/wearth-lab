import "../scss/style.scss"

// Scripts
import App from "./App.vue"
import transition from "./components/transition"
import swiper from "./components/swiper"
import animation from "./components/animation"

// Init
let isInit = false

const init = () => {
	if (isInit) return
	isInit = true
	swiper()
	transition()
	animation()
}
// window.addEventListener("DOMContentLoaded", init)
window.addEventListener("pageshow", init)
window.addEventListener("load", init)

// Vue app
Vue.createApp(App).mount("#page")
