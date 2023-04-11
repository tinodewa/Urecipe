<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['id', 'username', 'email', 'password', 'position'];
    protected $useTimestamps = false;
}