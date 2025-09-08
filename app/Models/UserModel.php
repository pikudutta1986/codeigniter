<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['role', 'name', 'email', 'password', 'profileimage'];
    protected $returnType = 'array';
}
