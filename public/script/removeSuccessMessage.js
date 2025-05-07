const alert =
    document.querySelector(".success-message") ||
    document.querySelector(".error-message");

if (alert) {
    setTimeout(() => {
        alert.remove();
    }, 3000);
}
