const ThemeSwitcher = {
    currentTheme: "light",

    init() {
        if (localStorage.theme === "dark") {
            this.toggleTheme();
        }

        document.addEventListener("turbolinks:load", () => this.initButton());
    },

    initButton() {
        let themeSwitcher = document.getElementById("theme-switcher");

        themeSwitcher?.addEventListener("click", () => this.toggleTheme());
    },

    toggleTheme() {
        if (this.currentTheme === "light") {
            this.currentTheme = "dark";
            document.documentElement.classList.add("dark");
        } else {
            this.currentTheme = "light";
            document.documentElement.classList.remove("dark");
        }

        localStorage.setItem("theme", this.currentTheme);
    },
};

export { ThemeSwitcher as default };
