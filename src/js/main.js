import "../scss/style.scss"

// Scripts
import App from "./App.vue"
import transition from "./components/transition"
import swiper from "./components/swiper"
import animation from "./components/animation"

// Init
const init = () => {
	swiper()
	transition()
	animation()
}
window.addEventListener("pageshow", init)

// Vue app
Vue.createApp(App).mount("#page")
