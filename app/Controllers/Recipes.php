<?php

namespace App\Controllers;

use App\Models\RecipeModel;

class Recipes extends BaseController{

    public function index()
    {
        $recipeModel = new RecipeModel();

        $keyword = trim((string) $this->request->getGet('search'));

        if ($keyword !== '')
        {
            $recipes = $recipeModel
            ->like('name', $keyword)
            ->findAll();
        }

        else{
            $recipes = $recipeModel->findAll();
        }

        $data = [
            'title' => 'My Recipe Book',
            'recipes' => $recipes,
            'keyword' => $keyword
        ];

        return view('recipes/index', $data);
    }

    public function create() {
        return view('recipes/create'); 
    }

    public function store()
    {
        $rules = [
            'name' => [
                'required',
                'max_length[150]'
            ],

            'category' => [
                'required',
                'max_length[100]'
            ],

            'ingredients' => [
                'required',
            ],

            'instructions' => [
                'required'
            ],

            'source_url' => [
                'permit_empty',
                'valid_url_strict',
                'max_length[2048]'
            ]
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
            ->withInput()
            ->with('errors', $this->validate->getErrors());
        }

        $recipeModel = new RecipeModel(); 

        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'ingredients' => $this->request->getPost('ingredients'),
            'instructions' => $this->request->getPost('instructions'),
            'source_url' => $this->request->getPost('source_url') ?: null
        ];

        if (! $recipeModel->insert($data)) {
            return redirect()->back()
            ->withInput()
            ->with('errors', $recipeModel->errors() ?:
            ['save' => 'Unable to save the recipe.']);
        }

        return redirect()->to(site_url('/'))
        ->with('success', 'Recipe added successfully!');
    }

    public function edit($id) 
    {
        $recipeModel = new RecipeModel();

        $recipe = $recipeModel->find($id);

        if (! $recipe) 
            {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                    'Recipe not found.'
                );
            }

        $data = [
            'title' => 'Edit Recipe',
            'recipe' => $recipe
        ];

        return view('recipes/edit', $data);
    }

    public function update($id) 
    {
        $recipeModel = new RecipeModel();

        $recipe = $recipeModel->find($id);

        if (! $recipe)
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound
            ('Recipe not found.');

        }

        $rules = [

            'name' => [
                'required',
                'max_length[150]'
            ],

            'category' => [
                'required',
                'max_length[100]'
            ],

            'ingredients' => [
                'required'
            ],

            'instructions' => [
                'required'
            ],

            'source_url' => [
                'permit_empty',
                'valid_url_strict',
                'max_length[2048]'
            ]

        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'ingredients' => $this->request->getPost('ingredients'),
            'instructions' => $this->request->getPost('instructions'),
            'source_url' => $this->request->getPost('source_url') ?: null
        ];

        if (! $recipeModel->update($id, $data))
        {
            return redirect()->back()
            ->withInput()
            ->with('errors', $recipeModel->errors() ?:
            ['save' => 'Unable to update the recipe.']);
        }

        return redirect()->to(site_url('/'))
        ->with('success', 'Recipe updated successfully!');
    }

    public function delete($id)
    {
        $recipeModel = new RecipeModel(); 
        $recipe = $recipeModel->find($id);

        if (! $recipe)
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound
            ('Recipe not found.');
        }

        if (! $recipeModel->delete($id))
        {
            return redirect()->to(site_url('/'))
            ->with('error', 'Unable to delete the recipe.');
        }

        return redirect()->to(site_url('/'))
        ->with('success', 'Recipe deleted successfully!');
    }
}