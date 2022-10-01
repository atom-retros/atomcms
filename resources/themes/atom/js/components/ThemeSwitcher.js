const ThemeSwitcher = {
    currentTheme: 'light',

    init() {
        if (localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            this.changeTheme()
        }

        document.addEventListener('turbolinks:load', () => this.initButton())
    },

    initButton() {
        document.getElementById("theme-switcher")
            .addEventListener("click", () => this.changeTheme());
    },

    changeTheme() {
        if(this.currentTheme === 'light') {
            this.currentTheme = 'dark'
            document.documentElement.classList.add("dark");
        } else {
            this.currentTheme = 'light'
            document.documentElement.classList.remove("dark");
        }

        localStorage.setItem("theme", this.currentTheme);
    }
}

export { ThemeSwitcher as default };
