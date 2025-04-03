{{-- resources/views/ingredients.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ingrédients</title>
</head>
<body>
    <h1>Liste des Ingrédients</h1>
    <ul id="ingredients-list"></ul>

    <script>
        fetch('/ingredients')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('ingredients-list');
                data.forEach(ingredient => {
                    const listItem = document.createElement('li');
                    const ingredientName = document.createElement('span');
                    const ingredientIcon = document.createElement('span');
                    ingredientName.textContent = ingredient.name;
                    ingredientIcon.textContent = ingredient.icon;
                    listItem.append(ingredientIcon, ingredientName);
                    list.appendChild(listItem);
                });
            })
            .catch(error => console.error('Error fetching ingredients:', error));
    </script>
</body>
</html>

