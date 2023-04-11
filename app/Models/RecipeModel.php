<?php
namespace App\Models;
use CodeIgniter\Model;

class RecipeModel extends Model
{
    protected $table      = 'recipe';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['id', 'id_user', 'name', 'description'];
    protected $useTimestamps = false;
    protected $validationRules = [
        'name' => 'required'
        ];
}