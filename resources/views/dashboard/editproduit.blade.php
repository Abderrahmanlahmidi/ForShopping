<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Produit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic');

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
</style>
<!-- Modal Overlay for Creating/Updating User -->
<div id="userModalOverlay" class="fixed z-40 flex inset-0 bg-black bg-opacity-50 justify-center items-center">
    <!-- Modal Overlay for Creating Room -->
    <div id="modalOverlay" class="fixed z-40 flex inset-0 bg-black bg-opacity-50  justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-lg font-semibold mb-4">Creer une nouvelle produit</h2>
            <form id="createRoomForm" action="{{url('/dashboard/produits/update/'. $item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Nom Field -->
                <div class="mb-4">
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                    <input value='{{$item->nom}}' type="text" id="nom" name="nom"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description', $item->description) }}</textarea>
                </div>

                <!-- Prix Field -->
                <div class="mb-4">
                    <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                    <input value='{{$item->prix}}' type="number" id="prix" name="prix"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Image Field -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input value='{{$item->image}}' type="text" id="image" name="image"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Quantite Field -->
                <div class="mb-4">
                    <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité</label>
                    <input value='{{$item->quantite}}' type="number" id="quantite" name="quantite"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Categorie Field -->
                <div class="mb-4">
                    <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="categorie" name="categorie"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Sélectionnez une catégorie</option>
                            <option value="7">Shirts</option>
                            <option value="8">Vetement</option>
                    </select>
                </div>
                <!-- Buttons -->
                <div class="flex justify-end">
                    <a href="/dashboard/produits" type="button" id="closeModalButton"
                            class="cursor-pointer text-white px-4 py-2 rounded mr-2 bg-gray-600">Annuler
                    </a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- JavaScript -->
<script></script>
</body>
</html>
