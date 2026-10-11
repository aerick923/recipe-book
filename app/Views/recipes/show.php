<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= esc($title) ?></title>

     <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="<?= base_url('css/style.css') ?>"
        rel="stylesheet">
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand fw-bold"
        href="<?= site_url('/') ?>">
        My Recipe Book
        </a>
</div>
</nav>

<main class="container py-4">
<div class="row justify-content-center">
<div class="col-12 col-md-9 col-lg-8">

<a href="<?= site_url('/') ?>"
class="btn btn-outline-secondary mb-4">
Back to Recipes </a>

<div class="card shadow-sm">
<div class="card-body">
    <h2 class="mb-3">
        <?= esc($recipe['name']) ?>
</h2>

<div class="mb-4">
    <span class="badge bg-success">
        <?= esc($recipe['category']) ?>
</span>
</div>

<hr>

<h5>Ingredients</h5>

<p class="mb-4">
<?= nl2br(esc($recipe['ingredients'])) ?>
</p>

<hr>

<h5>Cooking Instructions</h5>

<p class="mb-4">
    <?= nl2br(esc($recipe['instructions'])) ?>
</p>

<?php if (! empty($recipe['source_url'])): ?>
<hr> 

<h5>Original Recipe Source</h5> 

<a href="<?= esc($recipe['source_url'], 'attr') ?>"
target="_blank" rel="noopener noreferrer">
View Original Recipe
</a>

<?php endif; ?>

<hr> 

<a href="<?= site_url('recipes/edit/' . $recipe['id']) ?>"
class="btn btn-sucess">
Edit Recipe
</a>

</div> 

</div>

</div>

</div>

</main>
    
</body>
</html>