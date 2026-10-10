<?php

namespace App\Models; 

use CodeIgniter\Model;

class RecipeModel extends Model{
    protected $table = 'recipes';
    protected $primaryKey = 'id'; 
    protected $returnType = 'array'; 
    protected $allowedFields = [
        'name',
        'category',
        'ingredients',
        'instructions',
        'source_url',
        'image_path'
    ];

    protected $useTimeStamps = true; 
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}