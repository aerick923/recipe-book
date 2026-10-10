<?php

namespace App\Controllers;

use App\Models\RecipeModel;

class Recipes extends BaseController{
    public function index() {
        $recipeModel = new RecipeModel();
        $recipes = $recipeModel->findAll();
        return $this->response->setJSON($recipes);
    }
}