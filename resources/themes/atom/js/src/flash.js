const frame = document.getElementById('nitro');

window.FlashExternalInterface = {};

window.FlashExternalInterface.disconnect = () => {
    const el = document.getElementById('disconnected');

    if (el) {
        el.classList.remove('pointer-events-none');
        el.classList.remove('opacity-0');
        el.classList.add('opacity-100');
    }
};

window.FlashExternalInterface.onMessage = (event) => {
    if (!frame || event.source !== frame.contentWindow) return;
    if (typeof event.data !== 'string') return;
    if (!event.data.startsWith('Nitro_LegacyExternalInterface')) return;
    if (!('FlashExternalInterface' in window)) return;

    const { method, params } = JSON.parse(event.data.substr(29));

    const fn = window.FlashExternalInterface[method];

    if (!fn) return;

    fn(...params);
}

if (frame && frame.contentWindow) {
    window.addEventListener('message', (event) => window.FlashExternalInterface.onMessage(event));
}
