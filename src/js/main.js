import "../scss/style.scss"

// Scripts
import App from "./App.vue"
import transition from "./components/transition"
import swiper from "./components/swiper"
import animation from "./components/animation"

// Init
const isInit = false

const init = () => {
	if (isInit) return
	swiper()
	transition()
	animation()
	isInit = true
}
window.addEventListener("DOMContentLoaded", init)
// window.addEventListener("load", init)

// Vue app
Vue.createApp(App).mount("#page")
