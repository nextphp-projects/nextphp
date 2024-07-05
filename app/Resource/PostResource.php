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
use NextPHP\App\Service\PostService;

#[RouteGroup('/api')]
//#[Middleware(AuthMiddleware::class)]
class PostResource
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    #[Get('/posts')]
    public function getAllPosts(Request $request, Response $response)
    {
        $posts = $this->postService->getAllPosts();
        return $response->withJSON(['posts' => $posts]);
    }

    #[Get('/posts/{id}')]
    public function getPostById(Request $request, Response $response, $id)
    {
        $post = $this->postService->getPostById((int)$id);
        if ($post) {
            return $response->withJSON($post);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'Post not found']);
        }
    }
    #[Post('/posts')]
    public function createPost(Request $request, Response $response)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }

        $post = $this->postService->createPost($data);
        return $response->withStatus(201)->withJSON($post);
    }

    #[Put('/posts/{id}')]
    public function updatePost(Request $request, Response $response, $id)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }

        $post = $this->postService->updatePost((int)$id, $data);
        if ($post) {
            return $response->withJSON($post);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'Post not found']);
        }
    }

    #[Delete('/posts/{id}')]
    public function deletePost(Request $request, Response $response, $id)
    {
        $success = $this->postService->deletePost((int)$id);
        if ($success) {
            return $response->withStatus(204);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'Post not found']);
        }
    }
}