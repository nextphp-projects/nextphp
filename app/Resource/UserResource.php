<?php

namespace NextPHP\App\Resource;

use NextPHP\Rest\Http\Request;
use NextPHP\Rest\Http\Response;
use NextPHP\Rest\Http\Get;
use NextPHP\Rest\Http\Post;
use NextPHP\Rest\Http\Put;
use NextPHP\Rest\Http\Delete;
use NextPHP\Rest\Http\Patch;
use NextPHP\Rest\Http\RouteGroup;
use NextPHP\Rest\Http\Middleware;
use NextPHP\Rest\Middleware\AuthMiddleware;
use NextPHP\App\Service\UserService;

#[RouteGroup('/api')]
// #[Middleware(AuthMiddleware::class)]
class UserResource
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Get('/users')]
    public function getAllUsers(Request $request, Response $response)
    {
        $users = $this->userService->getAllUsers();
        return $response->withJSON(['users' => $users]);
    }

    #[Get('/users/{id}')]
    public function getUserById(Request $request, Response $response, $id)
    {
        $user = $this->userService->getUserById((int)$id);
        if ($user) {
            return $response->withJSON($user);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }

    #[Post('/users')]
    public function createUser(Request $request, Response $response)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }

        $user = $this->userService->registerUser($data);
        return $response->withStatus(201)->withJSON($user);
    }

    #[Put('/users/{id}')]
    public function updateUser(Request $request, Response $response, $id)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }
    
        $user = $this->userService->updateUser((int)$id, $data);
        if ($user) {
            return $response->withJSON($user);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }
    
    #[Patch('/users/{id}')]
    public function patchUser(Request $request, Response $response, $id)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }
    
        $user = $this->userService->patchUser((int)$id, $data);
        if ($user) {
            return $response->withJSON($user);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }

    #[Delete('/users/{id}')]
    public function deleteUser(Request $request, Response $response, $id)
    {
        $success = $this->userService->deleteUser((int)$id);
        if ($success) {
            return $response->withStatus(204);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }
}