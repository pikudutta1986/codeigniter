<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
    protected $table = 'productimage';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'image_url'];
    protected $useTimestamps = true;
}
