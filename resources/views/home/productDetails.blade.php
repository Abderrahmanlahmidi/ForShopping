<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom CSS for additional styling */
        .product-image {
            max-height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-gray-100 font-poppins">

<!-- Header -->
<header class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-semibold">Product Details</h1>
            <p class="mt-2 text-gray-300">Explore the details of your selected product.</p>
        </div>
        <div class="flex space-x-4">
            <a
                href="index.html"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Back to Home
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-6 py-8">
    <!-- Product Details Section -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6 md:p-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div>
                <img
                    src="https://via.placeholder.com/600"
                    alt="Product Image"
                    class="w-full h-full product-image rounded-lg"
                />
            </div>

            <!-- Product Information -->
            <div>
                <!-- Product Name -->
                <h2 class="text-3xl font-bold text-gray-900">Ordinateur Portable</h2>

                <!-- Product Description -->
                <p class="mt-4 text-gray-600">
                    Un ordinateur portable puissant pour tous vos besoins. Idéal pour le travail, les études et les loisirs.
                </p>

                <!-- Product Price -->
                <p class="mt-4 text-gray-900 font-semibold text-2xl">1200€</p>

                <!-- Product Quantity -->
                <p class="mt-2 text-gray-500">Quantité disponible: <span class="font-medium">10</span></p>

                <!-- Product Category -->
                <p class="mt-2 text-gray-500">Catégorie: <span class="font-medium">Électronique</span></p>

                <!-- Add to Cart Button -->
                <button
                    class="mt-6 w-full bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 mt-8">
    <div class="container mx-auto px-6 text-center">
        <p class="text-gray-300">&copy; 2023 E-commerce. Tous droits réservés.</p>
    </div>
</footer>

<script>
    // JavaScript to handle adding product to cart
    function addToCart() {
        alert('Product added to cart!');
    }
</script>
</body>
</html>
