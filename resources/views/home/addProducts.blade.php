<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:regular,500,600,700');
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
</style>
<header class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <h1 class="text-3xl font-semibold">Panier</h1>
        <a href="/" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Retour à l'accueil</a>
    </div>
</header>
<main class="container mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">Produit</th>
                <th class="px-6 py-3">Prix Unitaire</th>
                <th class="px-6 py-3">Quantité</th>
                <th class="px-6 py-3">Total</th>
                <th class="px-6 py-3">Action</th>
            </tr>
            </thead>
            <tbody id="displayProducts"></tbody>
            <tfoot>
            <tr class="bg-gray-50">
                <td colspan="3" class="px-6 py-3 text-right font-semibold">Total Général</td>
                <td class="px-6 py-3 font-semibold" id="totalPrice">0€</td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="mt-6 flex justify-end">
        <button class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">Passer la Commande</button>
    </div>
</main>
<footer class="bg-gray-800 text-white py-4 mt-8">
    <div class="container mx-auto px-6 text-center">
        <p class="text-gray-300">&copy; 2025 Boutique en Ligne. Tous droits réservés.</p>
    </div>
</footer>
<script>
    let allProducts = JSON.parse(localStorage.getItem("produit") || "[]");
    let displayProducts = document.getElementById('displayProducts');
    let totalPriceElement = document.getElementById('totalPrice');

    function updateCart() {
        displayProducts.innerHTML = "";
        let total = 0;
        allProducts.forEach((product, index) => {
            let tr = document.createElement("tr");
            tr.classList.add("bg-white", "border-b", "hover:bg-gray-50");
            tr.innerHTML = `
                <td class="px-6 py-4 flex items-center">
                    <img src="${product.image}" alt="${product.nom}" class="w-10 h-10 rounded-md mr-4">
                    <span>${product.nom}</span>
                </td>
                <td class="px-6 py-4">${product.prix}$</td>
                <td class="px-6 py-4">${product.quantite}</td>
                <td class="px-6 py-4 font-semibold">${product.prix * product.quantite}$</td>
                <td class="px-6 py-4">
                    <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600" onclick="removeProduct(${index})">Supprimer</button>
                </td>
            `;
            displayProducts.appendChild(tr);
            total += product.prix * product.quantite;
        });
        totalPriceElement.textContent = total + "$";
        localStorage.setItem("produit", JSON.stringify(allProducts));
    }

    function removeProduct(index) {
        allProducts.splice(index, 1);
        updateCart();
    }
    updateCart();
</script>
</body>
</html>
