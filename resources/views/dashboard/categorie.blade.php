<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic');
    body{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'poppins', sans-serif;
    }
</style>
<!-- Main container -->
<div class="grid grid-cols-12 h-screen">
    <!-- Sidebar -->
    <aside id="default-sidebar" class="col-span-2 w-64 bg-gray-50 p-4 h-screen transition-transform border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <h2 class="text-lg font-semibold text-gray-700 dark:text-white mb-4">Dashboard</h2>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard/categories" class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                        Categories
                    </a>
                </li> <li>
                    <a href="/dashboard/produits" class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                        Produits
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main content area -->
    <div class="col-span-10 p-6">
        <!-- Create New Room Button -->
        <button id="createRoomButton" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
            Créer une nouvelle categorie
        </button>

        <!-- Modal Overlay for Creating Room -->
        <div id="modalOverlay" class="fixed z-40 flex inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-lg font-semibold mb-4">Créer une nouvelle categorie</h2>
                <form id="createRoomForm" action="/dashboard/categories" method="post" >
                    @csrf
                    <div class="mb-4">
                        <label for="categorie" class="block text-sm font-medium text-gray-700">Nom de la categorie</label>
                        <input type="text" id="categorie" name="categorie" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">description</label>
                        <input type="text" id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeModalButton" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Annuler</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom de la Categorie</th>
                    <th scope="col" class="px-6 py-3">description</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                @foreach($categories as $categorie)
                    <tbody>
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$categorie->nom}}
                         </th>
                         <td class="px-6 py-4">
                            {{$categorie->description}}
                         </td>
                         <td class="px-6 py-4">
                             <a class="text-blue-600 hover:underline modifierButton">Modifier</a>
                             <form method="post" action="{{url('/dashboard/categories/'.$categorie->id)}}"
                                   class="inline">
                                 @csrf
                                 @method('DELETE')
                                 <input type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4"
                                        value="Supprimer"/>
                             </form>
                         </td>
                      </tr>
                    </tbody>
                @endforeach
              </table>
        </div>
    </div>
</div>
</body>
<script>
    document.getElementById('createRoomButton').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.remove('hidden');
    });

    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.add('hidden');
    });

    document.getElementById('closeUpdateModalButton').addEventListener('click', function() {
        document.getElementById('updateModalOverlay').classList.add('hidden');
    });

    document.querySelectorAll('.modifierButton').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('updateModalOverlay').classList.remove('hidden');
        });
    });
</script>
</html>
