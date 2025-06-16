// MOBILE MENU FUNCIONALITY

const mobileMenuBton = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");

mobileMenuBton.addEventListener("click", () => {

    const isHidden = mobileMenu.classList.contains("hidden");
    console.log(isHidden); // TRUE

    if (isHidden) {
        mobileMenu.classList.remove("hidden");
        menuIcon.classList.remove("fa-bars");
        menuIcon.classList.add("fa-times");
    } else {
        mobileMenu.classList.add("hidden");
        menuIcon.classList.remove("fa-times");
        menuIcon.classList.add("fa-bars");

    }
})

// Mobile Search Funcionality

const mobileSearchBtn = document.getElementById("mobile-search-btn");
const mobileSearch = document.getElementById("mobile-search");

mobileSearchBtn.addEventListener("click", () => {
    const isHidden = mobileSearch.classList.contains("hidden");
    console.log(isHidden);

    if (isHidden) {
        mobileSearch.classList.remove("hidden");
    } else {
        mobileSearch.classList.add("hidden");
    }
})



// ----------------
// FOOTER 
// ----------------
// Newsletter subscription functionality
document.addEventListener("DOMContentLoaded", () => { // DOMContentLoaded: Ejecuta el código cuando el HTML ya está cargado completamente
    const newsletterForm = document.querySelector(".bg-blue-600 .flex")
    const emailInput = newsletterForm.querySelector('input[type="email"]')
    const submitButton = newsletterForm.querySelector("button")

    submitButton.addEventListener("click", (e) => {
        e.preventDefault()

        const email = emailInput.value.trim() // trim elimina espacios al inicio y al final

        if (email === "") {
            alert("Por favor, ingresa tu email")
            return
        }

        if (!isValidEmail(email)) {
            alert("Por favor, ingresa un email válido")
            return
        }

        // Simulate newsletter subscription
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>'
        submitButton.disabled = true

        setTimeout(() => {
            alert("¡Gracias por suscribirte! Recibirás nuestras ofertas exclusivas.")
            emailInput.value = ""
            submitButton.innerHTML = '<i class="fas fa-paper-plane"></i>'
            submitButton.disabled = false
        }, 1500)
    })

    // Allow form submission with Enter key
    emailInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            submitButton.click()
        }
    })

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        return emailRegex.test(email)  // devuelve true y sumple con el formato y false si no
    }
})

// -----------
// PRODUCTOS
// -----------
const products = [
    { name: "Sacha", price: 0.2, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Ara Ara", price: 0.2, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Potomachi", price: 0.2, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Sport Jainer", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" }
]

const container = document.getElementById("product-list");

function showProducts() {
    products.forEach(product => {
        const card = `<div class="max-w-sm mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
            <img class="w-full h-48 object-cover" src="${product.image}" alt="${product.name}">
            <div class="p-4">
                <h2 class="text-xl font-bold text-gray-800">${product.name}</h2>
                <p class="text-lg text-blue-600 font-semibold mt-2">S/ ${product.price}</p>
                <button onclick='addToCart(${JSON.stringify(product)})' class="mt-3 px-4 py-2 bg-blue-600 text-white rounded cursor-pointer">Agregar al carrito</button>
            </div>
        </div>`
        container.innerHTML += card;
    })
}

function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem("cart")) || []
    const index = cart.findIndex(p => p.name === product.name);
    if (index !== -1) {
        cart[index].quantity += 1;
        cart[index].subtotal = cart[index].quantity * cart[index].price;
    } else {
        product.quantity = 1;
        product.subtotal = product.price;
        cart.push(product);
    }
    localStorage.setItem("cart", JSON.stringify(cart))
    alert(`${product.name} agregado al carrito!`)
    productListCard();
    countProduct();
}

function showCart() {
    const aside = document.getElementById("cart-aside")
    productListCard();
    aside.classList.remove("hidden")
}

function productListCard() {
    const cartItems = document.getElementById("cart-items")
    cartItems.innerHTML = ""

    const cart = JSON.parse(localStorage.getItem("cart")) || []

    cart.forEach((item, index) => {
        cartItems.innerHTML += `
      <div class="border-b pb-2">
        <h3 class="font-semibold">${index + 1}. ${item.name}</h3>
        <div class="flex justify-between items-center">
            <p class="text-sm text-gray-600">S/${item.subtotal.toFixed(2)}</p>
            <button class="text-sm text-gray-600 cursor-pointer" onclick="removeItemCart(${index})">X</button>
        </div>
      </div>
    `
    })

}

function removeItemCart(i) {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(i, 1); // elimina por índice
    localStorage.setItem("cart", JSON.stringify(cart)); // actualiza
    productListCard(); // recarga para mostrar cambio
    countProduct();
}


function closeCart() {
    const aside = document.getElementById("cart-aside")
    aside.classList.add("hidden")
}


function countProduct() {
    const cart = JSON.parse(localStorage.getItem("cart")) || []
    document.getElementById("cart-count").textContent = cart.length
}

showProducts();
countProduct();
