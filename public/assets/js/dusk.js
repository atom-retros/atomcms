function isTouchDevice() {
    return 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
}

// Use the isTouchDevice function
document.addEventListener("DOMContentLoaded", function() {
    const isTouch = isTouchDevice();

    // Now you can use the isTouch variable to conditionally handle touch devices
    if (isTouch) {
        // Handle touch devices here
        console.log("This is a touch device.");
    } else {
        // Handle non-touch devices here
        console.log("This is not a touch device.");
    }
});
