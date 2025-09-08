<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends BaseController {

    private $jwtSecret;
    private $jwtTTL;

    public function __construct()
    {
        $this->jwtSecret = env('JWT_SECRET');
        $this->jwtTTL    = env('JWT_TTL') ?? 3600;
    }

    public function login() {
        $userModel = new UserModel();
        $data = $this->request->getJSON(true); // expect JSON input

        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            
            $issuedAt   = time();
            // valid for 1 hour
            $expiration = $issuedAt + $this->jwtTTL; 

            $payload = [
                'issue_at' => $issuedAt,      // Issued at
                'exp' => $expiration,         // Expiration
                'user_id' => $user['id'],     // User ID
                'email' => $user['email'],
                'role' => $user['role'],
            ];

            // Generate JWT TOKEN
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

    public function register()
    {
        $userModel = new UserModel();
        // expect JSON input
        $data = $this->request->getJSON(true); 

        $role     = trim($data['role'] ?? 'CUSTOMER');
        $name     = trim($data['name'] ?? '');
        $email    = trim($data['email'] ?? '');
        $password = trim($data['password'] ?? '');

        // Basic validation
        if (!$name || !$email || !$password) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => 'Name, email and password are required'
            ]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => 'Invalid email address'
            ]);
        }

        // Check if user already exists
        if ($userModel->where('email', $email)->first()) {
            return $this->response->setStatusCode(409)->setJSON([
                'status'  => 'error',
                'message' => 'Email already registered'
            ]);
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $userId = $userModel->insert([
            'name'     => $name,
            'email'    => $email,
            'password' => $hashedPassword,
            'role'     => $role
        ]);

        if (!$userId) {
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Failed to register user'
            ]);
        }

        // Create JWT token
        $issuedAt   = time();
        $expiration = $issuedAt + (env('JWT_TTL') ?? 3600);

        $payload = [
            'iat'     => $issuedAt,
            'exp'     => $expiration,
            'user_id' => $userId,
            'email'   => $email,
            'role'    => 'user'
        ];

        $jwtSecret = env('JWT_SECRET');
        $token = JWT::encode($payload, $jwtSecret, 'HS256');

        return $this->response->setStatusCode(201)->setJSON([
            'status' => 'success',
            'token'  => $token,
            'user'   => [
                'id'    => $userId,
                'name'  => $name,
                'email' => $email,
                'role'  => 'user'
            ]
        ]);
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
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
