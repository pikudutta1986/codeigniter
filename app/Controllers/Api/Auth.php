<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends BaseController {

    private $jwtSecret = "YOUR_SECRET_KEY"; // 🔑 change this in production

    public function login() {
        $userModel = new UserModel();
        $data = $this->request->getJSON(true); // expect JSON input

        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Generate JWT
            $issuedAt   = time();
            $expiration = $issuedAt + 3600; // valid for 1 hour

            $payload = [
                'iss' => 'codeigniter-api',   // Issuer
                'aud' => 'codeigniter-client',// Audience
                'iat' => $issuedAt,           // Issued at
                'exp' => $expiration,         // Expiration
                'uid' => $user['id'],         // User ID
                'email' => $user['email']
            ];

            $token = JWT::encode($payload, $this->jwtSecret, 'HS256');

            return $this->response->setJSON([
                'status' => 'success',
                'token'  => $token,
                'user'   => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ]
            ]);
        }

        return $this->response->setStatusCode(401)->setJSON([
            'status' => 'error',
            'message' => 'Invalid email or password'
        ]);
    }

    // Example of a protected route
    public function profile() {
        $authHeader = $this->request->getHeaderLine('Authorization');

        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'Token required']);
        }

        $token = $matches[1];

        try {
            $decoded = JWT::decode($token, new Key($this->jwtSecret, 'HS256'));
            return $this->response->setJSON([
                'status' => 'success',
                'data'   => $decoded
            ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(401)->setJSON(['error' => $e->getMessage()]);
        }
    }
}
