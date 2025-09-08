<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductImageModel;

class ProductController extends BaseController
{
    // ✅ Get all products with images
    public function index()
    {
        $productModel = new ProductModel();
        $imageModel = new ProductImageModel();

        $products = $productModel->findAll();

        foreach ($products as &$product) {
            $product['images'] = $imageModel->where('product_id', $product['id'])->findAll();
        }

        return $this->response->setJSON($products);
    }

    // ✅ Get single product with images
    public function show($id = null)
    {
        $productModel = new ProductModel();
        $imageModel = new ProductImageModel();

        $product = $productModel->find($id);

        if (!$product) {
            return $this->response->setJSON(['message' => 'Product not found'], 404);
        }

        $product['images'] = $imageModel->where('product_id', $id)->findAll();

        return $this->response->setJSON($product);
    }

    // ✅ Create product with images
    public function create()
    {
        $productModel = new ProductModel();
        $imageModel = new ProductImageModel();

        $data = $this->request->getJSON(true);

        // insert product
        $productId = $productModel->insert([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);

        // insert product images if available
        if (!empty($data['images'])) {
            foreach ($data['images'] as $img) {
                $imageModel->insert([
                    'product_id' => $productId,
                    'image_url' => $img
                ]);
            }
        }

        return $this->response->setJSON(['message' => 'Product created successfully']);
    }

    // ✅ Update product + replace images
    public function update($id = null)
    {
        $productModel = new ProductModel();
        $imageModel = new ProductImageModel();

        $data = $this->request->getJSON(true);

        // update product
        $productModel->update($id, [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);

        // if images provided, reset images
        if (isset($data['images'])) {
            $imageModel->where('product_id', $id)->delete(); // clear old
            foreach ($data['images'] as $img) {
                $imageModel->insert([
                    'product_id' => $id,
                    'image_url' => $img
                ]);
            }
        }

        return $this->response->setJSON(['message' => 'Product updated successfully']);
    }

    // ✅ Delete product (cascade deletes images)
    public function delete($id = null)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);

        return $this->response->setJSON(['message' => 'Product deleted successfully']);
    }
}
