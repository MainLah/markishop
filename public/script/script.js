// helper functions

const scroll = (YCoor) => {
    window.scrollTo({
        top: YCoor,
        behavior: "smooth",
    });
};

// animation and interactivity for the website

const header = document.querySelector("header");
const desktopNav = document.querySelector(".desktop");
const mobileNav = document.querySelector(".mobile");
const burgerSVG = document.querySelector(".burger-menu-icon");
const navLinks = document.querySelectorAll(".nav-links");
const coordsForNav = {
    homeCoor:
        document.querySelector("#hero").getBoundingClientRect().top +
        window.scrollY,
    catalogCoor:
        document.querySelector("#catalog").getBoundingClientRect().top +
        window.scrollY,
    testimoniesCoor:
        document.querySelector("#testi").getBoundingClientRect().top +
        window.scrollY,
    contactCoor:
        document.querySelector("#contact").getBoundingClientRect().top +
        window.scrollY,
    cart: 0,
    profile: 0,
};

// assigning the nav links with the coords
const coordsArray = Object.keys(coordsForNav);
for (let i = 0; i < coordsArray.length; i++) {
    navLinks[i].onclick = (e) => {
        if (e.target.textContent !== "Cart") {
            e.preventDefault();
            scroll(coordsForNav[coordsArray[i]]);
        }
    };
    navLinks[i + 6].onclick = (e) => {
        e.preventDefault();
        scroll(coordsForNav[coordsArray[i]]);
    };
}

window.onscroll = () => {
    if (window.scrollY > 50) {
        header.classList.add("solidify");
    } else {
        header.classList.remove("solidify");
    }
};

window.onload = () => {
    if (window.innerWidth < 768) {
        // make the header have actual height and not 0
        header.style.height = "3.75rem";

        burgerSVG.classList.remove("hidden");
        desktopNav.classList.add("hidden");
    }
};

burgerSVG.onclick = () => {
    if (mobileNav.classList.contains("hidden")) {
        setTimeout(() => {
            mobileNav.classList.remove("hidden");
        }, 100);
    } else {
        mobileNav.classList.add("hidden");
    }

    if (header.style.height === "3.75rem") {
        header.style.height = "26rem";
    } else {
        header.style.height = "3.75rem";
    }
};

// validate form

// const errorMessage = document.querySelector("#error-message-form");
// const form = document.querySelector("form");
// const button = document.querySelector("#form-button");

// button.onclick = (e) => {
//     errorMessage.classList.add("hidden");
//     e.preventDefault();

//     const elements = {
//         Nama: document.querySelector("#name-form"),
//         Email: document.querySelector("#email-form"),
//         Pesan: document.querySelector("#message-form"),
//     };

//     for (const key in elements) {
//         if (!elements[key].value) {
//             errorMessage.textContent =
//                 `${key} tidak boleh kosong!`.toUpperCase();
//             errorMessage.classList.remove("hidden");
//             scroll(3600);
//             return;
//         }
//     }

//     form.reset();
//     window.alert("Pesan berhasil terkirim!");
// };

// add to cart control

document.addEventListener("DOMContentLoaded", () => {
    const products = document.querySelectorAll("article[data-product-id]");

    products.forEach((product) => {
        const minusButton = product.querySelector(".quantity-minus");
        const plusButton = product.querySelector(".quantity-plus");
        const quantityInput = product.querySelector(".quantity-input");
        const confirmButton = product.querySelector(".confirm-button");

        minusButton.addEventListener("click", () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        });

        plusButton.addEventListener("click", () => {
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        });

        confirmButton.addEventListener("click", () => {
            const productId = product.getAttribute("data-product-id");
            const quantity = parseInt(quantityInput.value);

            fetch(`/cart/add/${productId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ quantity }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        window.alert("Product added to cart!");
                    } else {
                        window.alert("Failed to add product to cart.");
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});
