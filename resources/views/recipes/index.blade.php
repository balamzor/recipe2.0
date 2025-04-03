@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Recipe</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('recipes.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="steps">Steps</label>
                            <div id="steps">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="steps[]" required>
                                </div>
                                <button type="button" id="addStep" class="btn btn-primary">Add step</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <div id="ingredients">
                                <div class="form-group">
                                    <select class="form-control" name="ingredients[]" required>
                                        <option value="" selected disabled>Choose an ingredient</option>
                                        @foreach ($ingredients as $ingredient)
                                            <option value="{{ $ingredient->id }}">{{ $ingredient->icon }} {{ $ingredient->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="button" id="addIngredient" class="btn btn-primary">Add ingredient</button>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const addStep = document.getElementById('addStep');
    const addIngredient = document.getElementById('addIngredient');
    const steps = document.getElementById('steps');
    const ingredients = document.getElementById('ingredients');

    addStep.addEventListener('click', () => {
        const newStep = document.createElement('div');
        newStep.classList.add('form-group');
        newStep.innerHTML = `
            <input type="text" class="form-control" name="steps[]" required>
        `;
        steps.appendChild(newStep);
    });

    addIngredient.addEventListener('click', () => {
        const newIngredient = document.createElement('div');
        newIngredient.classList.add('form-group');
        newIngredient.innerHTML = `
            <select class="form-control" name="ingredients[]" required>
                <option value="" selected disabled>Choose an ingredient</option>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->icon }} {{ $ingredient->name }}</option>
                @endforeach
            </select>
        `;
        ingredients.appendChild(newIngredient);
    });
</script>
@endsection

