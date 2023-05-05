// Disconnected from client
function disconnected() {
    document.querySelector("#disconnected").style =
        "display: block !important;";
}

let frame = document.getElementById("nitro");
window.FlashExternalInterface = {};
window.FlashExternalInterface.disconnect = () => {
    disconnected();
};

if (frame && frame.contentWindow) {
    window.addEventListener("message", (ev) => {
        if (!frame || ev.source !== frame.contentWindow) return;
        const legacyInterface = "Nitro_LegacyExternalInterface";
        if (typeof ev.data !== "string") return;
        if (ev.data.startsWith(legacyInterface)) {
            const { method, params } = JSON.parse(
                ev.data.substr(legacyInterface.length)
            );
            if (!("FlashExternalInterface" in window)) return;
            const fn = window.FlashExternalInterface[method];
            if (!fn) return;
            fn(...params);
            return;
        }
    });
}
// Disconnected from client end
