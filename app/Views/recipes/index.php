
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="<?= base_url('css/style.css') ?>"
        rel="stylesheet">
</head>

<body>

    <!-- NAVIGATION BAR -->

    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand fw-bold">
                My Recipe Book
            </span>
        </div>
    </nav>

    <main class="container py-4">

        <!-- PAGE HEADING -->

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2 class="mb-0">My Recipes</h2>

            <a href="<?= site_url('recipes/create') ?>"
               class="btn btn-success">
                + Add Recipe
            </a>

        </div>

        <!-- SEARCH BAR -->

        <form action="<?= site_url('/') ?>"
              method="get"
              class="mb-4">

            <div class="input-group">

                <input type="search"
                       name="search"
                       class="form-control"
                       placeholder="Search recipes by name..."
                       value="<?= esc($keyword ?? '', 'attr') ?>">

                <button type="submit"
                        class="btn btn-success">
                    Search
                </button>

                <a href="<?= site_url('/') ?>"
                   class="btn btn-outline-secondary">
                    Clear
                </a>

            </div>

        </form>

        <!-- SUCCESS MESSAGE -->

        <?php if (session()->getFlashdata('success')): ?>

            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>

        <?php endif; ?>

        <!-- ERROR MESSAGE -->

        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert alert-danger">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>

        <!-- RECIPE GRID -->

        <div class="row g-3">

            <?php if (empty($recipes)): ?>

                <div class="col-12">

                    <div class="alert alert-info">

                        <?php if (! empty($keyword)): ?>

                            No recipes found matching
                            "<?= esc($keyword) ?>".

                        <?php else: ?>

                            No recipes saved yet.

                        <?php endif; ?>

                    </div>

                </div>

            <?php else: ?>

                <?php foreach ($recipes as $recipe): ?>

                    <!-- RECIPE CARD COLUMN -->

                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body d-flex flex-column">

                                <!-- RECIPE NAME -->

                                <h5 class="card-title">
                                    <?= esc($recipe['name']) ?>
                                </h5>

                                <!-- CATEGORY -->

                                <div class="mb-3">

                                    <span class="badge bg-success">
                                        <?= esc($recipe['category']) ?>
                                    </span>

                                </div>

                                <!-- RECIPE PREVIEW -->

                                <p class="text-muted small mb-4">
                                    View the ingredients and cooking
                                    instructions for this recipe.
                                </p>

                                <!-- ACTION BUTTONS -->

                                <div class="mt-auto">

                                    <a href="<?= site_url('recipes/show/' . $recipe['id']) ?>"
                                       class="btn btn-success btn-sm">
                                        View Recipe
                                    </a>

                                    <a href="<?= site_url('recipes/edit/' . $recipe['id']) ?>"
                                       class="btn btn-outline-primary btn-sm">
                                        Edit
                                    </a>

                                    <form action="<?= site_url('recipes/delete/' . $recipe['id']) ?>"
                                          method="post"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this recipe?');">

                                        <?= csrf_field() ?>

                                        <button type="submit"
                                                class="btn btn-outline-danger btn-sm">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </main>

</body>
</html>
