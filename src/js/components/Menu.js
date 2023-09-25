export default class Menu {
	constructor(loco) {
		// Elements
		this.header = document.querySelector(".site-header")
		this.menu = this.header.querySelector(".main-menu")
		this.submenus = this.header.querySelectorAll(".sub-menu")
		this.btnMenus = this.header.querySelectorAll(".btn-menu")
		this.burger = this.header.querySelector(".btn-burger")
		this.btnsClose = this.header.querySelectorAll(".header-menu__btn-close")
		this.btnsBack = this.header.querySelectorAll(".header-menu__btn-back")
		this.overlay = this.header.querySelector(".overlay")

		// Locomotive scroll
		this.loco = loco

		// Burger
		this.burger.addEventListener("click", () => {
			this.toggleMenu()
		})

		// Btns Menu
		this.btnMenus.forEach((btn) => {
			btn.addEventListener("click", () => {
				this.toggleSubMenu(btn)
			})
		})

		// Btns Close
		this.btnsClose.forEach((btn) => {
			btn.addEventListener("click", () => {
				this.toggleMenu()
				this.submenus.forEach((submenu) => {
					submenu.classList.remove("active")
				})
				this.overlay.classList.remove("active")
			})
		})

		// Btns Back
		this.btnsBack.forEach((btn) => {
			btn.addEventListener("click", () => {
				this.submenus.forEach((submenu) => {
					submenu.classList.remove("active")
				})
			})
		})

		// Overlay
		this.overlay.addEventListener("mouseenter", () => {
			this.toggleSubMenu()
		})
	}

	toggleMenu() {
		this.menu.classList.toggle("active")
	}

	toggleSubMenu(btn) {
		if (btn) {
			// Get data-menu attribute
			const submenuName = btn.getAttribute("data-menu")
			if (!submenuName) return
			// find submenu with data-submenu attribute equal to data-menu attribute
			const submenu = document.querySelector(`.sub-menu[data-submenu="${submenuName}"]`)
			if (!submenu) return
			// Delete active class on submenus except submenu with data-submenu attribute equal to data-menu attribute
			this.submenus.forEach((submenu) => {
				if (submenu.getAttribute("data-submenu") !== submenuName) {
					submenu.classList.remove("active")
				}
			})
			// toggle active class on submenu
			submenu.classList.toggle("active")
			// If one of submenus is active, add class active on overlay
			// Else remove class active on overlay
			let isActive = false
			for (let i = 0; i < this.submenus.length; i++) {
				if (this.submenus[i].classList.contains("active")) {
					isActive = true
					break
				}
			}
			if (isActive) {
				this.overlay.classList.add("active")
				this.loco.stop()
			} else {
				this.overlay.classList.remove("active")
				this.loco.start()
			}
		} else {
			this.submenus.forEach((submenu) => {
				submenu.classList.remove("active")
			})
			this.overlay.classList.remove("active")
			this.loco.start()
		}
	}
}
