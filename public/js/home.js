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


// suscripcion funcionality
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

        // Simulacion subscriptor
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>'
        submitButton.disabled = true

        setTimeout(() => {
            alert("¡Gracias por suscribirte! Recibirás nuestras ofertas exclusivas.")
            emailInput.value = ""
            submitButton.innerHTML = '<i class="fas fa-paper-plane"></i>'
            submitButton.disabled = false
        }, 1500)
    })

    // enviar form con "enter"
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

// --------------------
// FUNCTION BUSCAR
// --------------------


// --------------------
// PRODUCTOS Y CARRITO
// --------------------
const products = [
    { name: "Sacha", price: 0.2, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Polo", price: 0.2, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Carro", price: 0.2, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Eco Pack", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Wakami Light", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Chaski Pack", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Andes Kit", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Amazonía Set", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Sol & Luna", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Brisa Eco", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Inka Roots", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Pachamama Line", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Wasi Natural", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Kintu Colors", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Eco Wayuu", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Llama Style", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Inti Raymi", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" },
    { name: "Qori Gold", price: 0.20, image: "https://mercury.vtexassets.com/arquivos/ids/19287859-800-800?v=638664995756700000&width=800&height=800&aspect=true" }
]

function search() {
    const searchInput = document.getElementById("search");
    searchInput.addEventListener("input", (e) => {
        const texto = e.target.value.toLowerCase();
        const resultados = products.filter(p =>
            p.name.toLowerCase().includes(texto)
        );
        console.log(resultados); // Muestra coincidencias
        showProducts(resultados);
    });
}
search();

const container = document.getElementById("product-list");

function showProducts(data) {
    container.innerHTML = '';
    if (data.length === 0) {
        container.innerHTML = `<p class="text-center text-gray-500 text-lg mt-6">No se encontró el producto XD</p>`;
        return;
    }
    data.forEach(product => {
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
    let cart = getCart();
    const index = cart.findIndex(p => p.name === product.name);
    if (index !== -1) {
        cart[index].quantity += 1;
        cart[index].subtotal = cart[index].quantity * cart[index].price;
    } else {
        product.quantity = 1;
        product.subtotal = product.price;
        cart.push(product);
    }
    saveCart(cart);
    productListCard();
    countProduct();
    cartSumary();
    toastAlert("success", "Producto agregado al carrito");
}

function toastAlert(icon, title) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
    });
}

function showCart() {
    const aside = document.getElementById("cart-aside")
    productListCard();
    aside.classList.remove("translate-x-full");
    cartSumary();
}

function productListCard() {
    const cartItemsList = document.querySelectorAll(".cart-items")

    const cart = getCart();
    cartItemsList.forEach(cartItems => {
        if (cart.length === 0) {
            return cartItems.innerHTML = `
            <div  class="text-center py-12 text-xs">
                <i class="fas fa-shopping-bag text-3xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Tu carrito está vacío</h3>
                    <p class="text-gray-500 mb-6">¡Agrega algunos productos increíbles!</p>
            </div>`
        }
        cartItems.innerHTML = "";
        cart.forEach((item, index) => {
            cartItems.innerHTML += `
            <div class="cart-item flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-800">${item.name}</h3>
                    <p class="text-blue-600 font-bold">S/${item.subtotal.toFixed(2)}</p>
                </div>

                <div class="flex flex-col items-end space-y-2">
                    <button onclick="removeItemCart(${index})" class="cursor-pointer remove-item text-red-500 hover:text-red-700 transition-colors">
                        <i class="fas fa-trash text-sm"></i>
                    </button>

                    <div class="flex items-center space-x-2">
                        <button onclick="decreaseQuantity(${index})" class="cursor-pointer bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-minus text-xs"></i>
                        </button>
                        <span class="w-8 text-center font-semibold">${item.quantity}</span>
                        <button onclick="increaseQuantity(${index})" class="cursor-pointer bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-plus text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

        `

        })
    })

}

function increaseQuantity(index) {
    let cart = getCart();
    cart[index].quantity += 1;
    cart[index].subtotal = cart[index].quantity * cart[index].price;
    saveCart(cart);
    productListCard();
    cartSumary();
}

function decreaseQuantity(index) {
    let cart = getCart();
    cart[index].quantity -= 1;

    if (cart[index].quantity <= 0) {
        return removeItemCart(index);

    }

    cart[index].subtotal = cart[index].quantity * cart[index].price;
    saveCart(cart);
    productListCard();
    cartSumary();
}

function removeItemCart(i) {
    const cart = getCart();
    cart.splice(i, 1); // elimina por índice
    saveCart(cart);
    productListCard(); // recarga para mostrar cambio
    countProduct();
    cartSumary();
    toastAlert("error", "Producto eliminado del carrito");
}


function closeCart() {
    const aside = document.getElementById("cart-aside")
    aside.classList.add("translate-x-full")
}


function countProduct() {
    const cart = getCart();
    document.getElementById("cart-count").textContent = cart.length
}

function cartSumary() {
    const inputSubtotal = document.querySelectorAll(".subtotal");
    const inputTotal = document.querySelectorAll(".total");

    const cart = getCart();
    const subtotals = cart.reduce((sum, item) => sum + item.subtotal, 0);
    inputSubtotal.forEach( subtotal => {
        subtotal.textContent = "S/ " + subtotals.toFixed(2);
    });
    inputTotal.forEach( total => {
        total.textContent = "S/ " + subtotals.toFixed(2);
    });

}

function getCart() {
    return JSON.parse(localStorage.getItem("cart")) || [];
}

function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart))
}

// esperar a que cargue todo el DOM y mostrar contador
//document.addEventListener("DOMContentLoaded", showProducts);
document.addEventListener('DOMContentLoaded', () => {
showProducts(products);
});

productListCard()
countProduct();
cartSumary()



