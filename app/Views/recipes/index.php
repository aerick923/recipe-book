<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar bg-white shadow-sm">
<div class="container">
<span class="navbar-brand fw-bold">
    My Recipe Book
</span>
</div>
</nav>

<main class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">My Recipes</h2>

        <a href="<?= site_url('recipes/create') ?>"
        class="btn btn-success">
        + Add Recipe
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
    <?= esc(session()->getFlashdata('error')) ?>
    </div>
    <?php endif; ?>

    <?php if (empty($recipes)): ?>
    <div class="col-12">
    <div class="alert alert-info">
        No recipes saved yet.
    </div>
</div>

<?php else: ?>
    <?php foreach ($recipes as $recipe): ?>

        <div  class="col-12 col-md-6 col-lg-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        <?= esc($recipe['name']) ?>
                    </h5>

                    <span class="badge bg-success mb-3">
                    <?= esc($recipe['category']) ?>
                    </span>

                    <h6>Ingredients</h6>

                    <p class="card-text">
                        <?= nl2br(esc($recipe['ingredients'])) ?>
                    </p>

                    <h6>Instructions</h6>
                    <p class="card-text">
                        <?= nl2br(esc($recipe['instructions'])) ?> </p>

                    <a href="<?= site_url('recipes/edit/' . $recipe['id']) ?>"
                    class="btn btn-outline-primary btn-sm">
                    Edit Recipe
                    </a>

                    <form action="<?= site_url('recipes/delete/' . $recipe['id']) ?>"
                    method="post"
                    class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                    <?= csrf_field() ?>

                    <button type="submit"
                    class="btn btn-outline-danger btn-sm">
                    Delete Recipe
                    </button>

                    </form>

</div>
</div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

</main>

</body>
</html>