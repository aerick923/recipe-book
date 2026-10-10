<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Recipe</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold"
        href="<?= site_url('/') ?>">
        My Recipe Book
        </a>
</div>
</nav>

<main class="container py-4">
    <h2 class="mb-4">Add New Recipe</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <P class="mb-1"><?= esc($error) ?></p>
                <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('recipes/store') ?>"
    method="post">

    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">
            Recipe Name
        </label>

        <input type="text" name="name" 
        class="form-control" required> 
    </div>

    <div class="mb-3">
        <label class="form-label">
            Category
        </label>

        <select name="category"
        class="form-select"
        required> 

        <option value="">Select Category</option>
        <option value="Breakfast">Breakfast</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
        <option value="Dessert">Dessert</option>
        <option value="Snack">Snack</option>

</select> 
</div>

<div class="mb-3">
    <label class="form-label">
        Ingredients 
</label>

<textarea name="ingredients"
class="form-control"
rows="5"
required></textarea>

</div>

<div class="mb-3">
    <label class="form-label">
        Instructions
</label>

<textarea name="instructions"
class="form-control"
rows="5"
required></textarea> 

</div> 

<div class="mb-3">
    <label class="form-label">
        Source URL (Optional)
</label>

<input type="url" 
name="source_url"
class="form-control"
placeholder="https://example.com">

</div>

<button type="submit"
class="btn btn-success">
Save Recipe
</button>

<a href="<?= site_url('/') ?>"
class="btn btn-secondary">
Cancel </a>

</form>
</main>
 
</body>
</html>