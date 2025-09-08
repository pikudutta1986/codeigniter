<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        return $this->response->setJSON($model->findAll());
    }

    public function show($id = null)
    {
        $model = new UserModel();
        $data = $model->find($id);

        return $data 
            ? $this->response->setJSON($data)
            : $this->response->setJSON(['message' => 'User not found'], 404);
    }

    public function create()
    {
        $model = new UserModel();
        $data = $this->request->getJSON(true);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $model->insert($data);
        return $this->response->setJSON(['message' => 'User created successfully']);
    }

    public function update($id = null)
    {
        $model = new UserModel();
        $data = $this->request->getJSON(true);

        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        $model->update($id, $data);
        return $this->response->setJSON(['message' => 'User updated successfully']);
    }

    public function delete($id = null)
    {
        $model = new UserModel();
        $model->delete($id);
        return $this->response->setJSON(['message' => 'User deleted successfully']);
    }
}
