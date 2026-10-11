<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link href="<?= base_url('css/style.css') ?>"
    rel="stylesheet">
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand fw-bold"
        href="<?= site_url('/') ?>">
        My Recipe Book </a>
    </div>
</nav>

<main class="container py-4">

    <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
    <div class="card shadow-sm">
    <div class="card-body">


    <h2 class="mb-4">Edit Recipe<h2>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
    <p class="mb-1"><?= esc($error) ?></p>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <form action="<?= site_url('recipes/update/' . $recipe['id']) ?>"
    method="post">

    <?= csrf_field() ?>

    <div class="mb-3">
    <label class="form-label">
    Recipe Name </label>

    <input type="text"
    name="name"
    class="form-control"
    value="<?= esc(old('name', $recipe['name']), 'attr') ?>"
    required>

</div> 

<div class="mb-3">
    <label class="form-label">
        Category 
    </label> 

    <select name="category"
    class="form-select"
    required> 

    <?php 
    $categories = [
        'Breakfast',
        'Lunch',
        'Dinner',
        'Dessert',
        'Snack'
    ];
    ?>

    <?php foreach ($categories as $category): ?>
    <option value="<?= esc($category, 'attr') ?>"
    <?= old('category', $recipe['category']) === $category ? 'selected' : '' ?>>

    <?= esc($category) ?>

    </options>

    <?php endforeach; ?>

    </select>

    </div>

    <div class="mb-3">
        <label class="form-label">
            Ingredients
        </label> 

        <textarea name="ingredients"
        class="form-control"
        rows="5"
        required><?= esc(old('ingredients', $recipe['ingredients'])) ?> </textarea>
    </div>

    <div class="mb-3">
    <label class="form-label">
    Instructions </label>

    <textarea name="instructions"
    class="form-control"
    rows="5"
    required><?= esc(old('instructions', $recipe['instructions'])) ?> </textarea> 

    </div> 

    <div class="mb-3">
    <label class="form-label">
    Source URL (Optional) </label>

    <input type="url"
    name="source_url"
    class="form-control"
    value="<?= esc(old('source_url', $recipe['source_url'] ?? ''), 'attr') ?>">

    </div> 

    <button type="submit"
    class="btn btn-success">
    Save Changes
    </button>

    <a href="<?= site_url('/') ?>"
    class="btn btn-secondary">
    Cancel
    </a>

    </form>

    </div>
    </div>
    </div>
    </div>

    </main>
  
</body>
</html>