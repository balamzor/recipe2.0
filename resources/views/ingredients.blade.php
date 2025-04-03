{{-- resources/views/ingredients.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ingrédients</title>
    <style>
        .ingredient-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <h1>Liste des Ingrédients</h1>
    <select id="ingredients-select">
        <option value="">Sélectionnez un ingrédient</option>
    </select>

    <script>
        fetch('/ingredients')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('ingredients-select');
                data.forEach(ingredient => {
                    const option = document.createElement('option');
                    const icon = document.createElement('span');
                    icon.classList.add('ingredient-icon');
                    icon.style.backgroundImage = `url(${ingredient.icon})`;
                    option.appendChild(icon);
                    const text = document.createTextNode(`${ingredient.name} ${ingredient.icon}`);
                    option.appendChild(text);
                    option.value = ingredient.id;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching ingredients:', error));
    </script>
</body>
</html>

