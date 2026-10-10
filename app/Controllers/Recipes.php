<?php

namespace App\Controllers;

use App\Models\RecipeModel;

class Recipes extends BaseController{

    public function index() {
        $recipeModel = new RecipeModel();

        $data = [
            'title' => 'My Recipe Book',
            'recipes' => $recipeModel->findAll()
        ];

        return view('recipes/index', $data);
    }
}