import axios from "axios";
import Alpine from "alpinejs";
import Focus from "@alpinejs/focus";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

Alpine.plugin(Focus);
Alpine.start();
