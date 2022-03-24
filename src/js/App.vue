<script>
import LocomotiveScroll from "locomotive-scroll"

export default {
	data() {
		return {
			menuActive: false,
			menuFemmeActive: false,
			menuHommeActive: false,
			menuSubCat: false,
			menuSearch: false,
			locoScroll: null,
		}
	},

	mounted() {
		this.initLocoScroll()
	},

	methods: {
		openMenu() {
			this.menuActive = true
			this.bodyOverflow(true)
		},
		closeMenu() {
			this.menuActive = false
			this.closeSubMenu()
		},
		toggleSubMenu(cat) {
			switch (cat) {
				case "femme":
					if (this.menuFemmeActive) {
						// Desactive menu
						this.closeSubMenu()
					} else {
						// Active menu
						this.closeSubMenu()
						this.menuFemmeActive = true
						this.bodyOverflow(true)
					}
					break

				case "homme":
					if (this.menuHommeActive) {
						// Desactive menu
						this.closeSubMenu()
					} else {
						// Active menu
						this.closeSubMenu()
						this.menuHommeActive = true
						this.bodyOverflow(true)
					}
					break

				case "search":
					if (this.menuSearch) {
						// Desactive menu
						this.closeSubMenu()
					} else {
						// Active menu
						this.closeSubMenu()
						this.menuSearch = true
						this.bodyOverflow(true)
						const input = document.querySelector(
							".search-menu input[type=text]"
						)
						setTimeout(() => {
							input.focus()
						}, 250)
					}
					break

				// Menu catégorie de produit mobile
				case "sub-cat":
					if (this.menuSubCat) {
						// Desactive menu
						this.menuSubCat = false
						this.bodyOverflow(false)
					} else {
						// Active menu
						this.menuSubCat = true
						this.bodyOverflow(true)
					}

					break

				default:
					break
			}
		},
		closeSubMenu() {
			this.menuFemmeActive = false
			this.menuHommeActive = false
			this.menuSearch = false

			this.bodyOverflow(false)
		},
		bodyOverflow(state) {
			if (state === true) {
				// Menu actif
				this.locoScroll.stop()
				document.querySelector("body").style.overflow = "hidden"
				this.$refs.bodyOverlay.classList.add("active")
			} else {
				// Menu inactif
				this.locoScroll.start()
				document.querySelector("body").style.overflow = "visible"
				this.$refs.bodyOverlay.classList.remove("active")
			}
		},
		initLocoScroll() {
			this.locoScroll = new LocomotiveScroll({
				el: document.querySelector("[data-scroll-container]"),
				smooth: true,
			})
			this.menuSticky()
			window.addEventListener("load", () => {
				this.locoScroll.update()
			})
		},
		menuSticky() {
			const menu = document.querySelector(".site-header")
			this.locoScroll.on("scroll", (e) => {
				if (e.scroll.y > 75) {
					menu.classList.add("is-scrolling")
				} else {
					menu.classList.remove("is-scrolling")
				}
			})
		},
	},
}
</script>
