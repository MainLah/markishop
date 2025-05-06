const alert = document.querySelector(".success-message");

if (alert) {
    setTimeout(() => {
        alert.remove();
    }, 3000);
}
