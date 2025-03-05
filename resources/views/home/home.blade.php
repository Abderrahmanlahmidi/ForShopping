<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic');
    body {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
</style>
<body class="bg-gray-100 font-poppins">

<!-- Navbar -->
<nav
    class="bg-gray-50 text-gray-900 p-4 flex justify-between items-center border-b border-gray-200 rounded-lg relative">
    <div class="text-xl font-bold">ForShopping</div>
    <div class="space-x-4 flex items-center">
        <button class="text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-lg">Home</button>
        <button class="text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-lg">Products</button>
        <button class="text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-lg">About</button>
        <button class="border border-gray-300 text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-lg">Login</button>
        <button class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-lg">Register</button>

        <!-- Basket Button -->
        <a href="/panier" id="cart-btn" class="relative p-2 bg-gray-200 rounded-full hover:bg-gray-300">
            🛒
            <span id="cart-count"
                  class="absolute top-0 right-0 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                2
            </span>
        </a>
    </div>
</nav>

<!-- Hero Section -->
<header class="bg-white text-center p-16 shadow-md">
    <h1 class="text-4xl font-bold text-gray-900">Welcome to ForShopping</h1>
    <p class="mt-4 text-gray-700">Discover amazing products at unbeatable prices.</p>
    <button class="mt-6 bg-blue-500 text-white px-6 py-2 hover:bg-blue-600 rounded-lg">Shop Now</button>
</header>

<!-- Products Section -->
<section class="p-10 grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($produits as $produit)
        <div class="bg-white shadow-lg border border-gray-200 p-6 text-center rounded-lg">
            <!-- Product Image -->
            <img src="{{ $produit->image }}" alt="Product Image" class="w-full h-40 object-cover mb-4 rounded-lg">

            <!-- Product Name -->
            <h2 class="text-xl font-bold text-gray-900">{{$produit->nom}}</h2>

            <!-- Product Price -->
            <p class="text-gray-900 font-semibold mt-2">{{ $produit->prix }}$</p>

            <!-- Add to Cart Button -->
            <button
                onclick="addProductToLocalStorage({{$produit}})"
                class="mt-4 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-lg"
            >
                Add to Cart
            </button>

            <!-- Details Button -->
            <form method="post" action="{{url('/produit/' . $detail -> id)}}">
              <button
                  class="mt-4 bg-green-500 text-white px-4 py-2 hover:bg-green-600 rounded-lg"
              >
                  Details
              </button>
            </form>
        </div>
    @endforeach
</section>

<!-- Footer -->
<footer class="bg-gray-50 text-gray-900 text-center p-4 mt-auto border-t border-gray-200 rounded-lg">
    <p>&copy; 2025 ForShopping. All rights reserved.</p>
</footer>
<script>
    const cartBtn = document.getElementById("cart-btn");
    const cartOverlay = document.getElementById("cart-overlay");
    const closeCart = document.getElementById("close-cart");
    let allProducts = JSON.parse(localStorage.getItem("produit") || "[]");

    cartBtn.addEventListener("click", () => {
        cartOverlay.classList.toggle("translate-x-full");
    });

    closeCart.addEventListener("click", () => {
        cartOverlay.classList.add("translate-x-full");
    });

    function addProductToLocalStorage(produit) {
        let productExist = allProducts.some(p => p.id === produit.id);

        if (!productExist) {
            allProducts.push(produit);
            localStorage.setItem("produit", JSON.stringify(allProducts));
            console.log("Product added:", produit);
        } else {
            console.log("Product already exists in localStorage:", produit);
        }
    }

</script>
</body>
</html>
