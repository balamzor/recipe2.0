<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ingredient</title>
</head>
<body>
    <h1>Add New Ingredient</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="/ingredients" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="icon">Icon URL:</label>
        <input type="text" id="icon" name="icon" required>
        <br>
        <button type="submit">Add Ingredient</button>
    </form>
</body>
</html>


