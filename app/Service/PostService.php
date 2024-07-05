<?php

namespace NextPHP\App\Service;

use NextPHP\App\Repository\PostRepository;
use NextPHP\App\Entity\Post;
use NextPHP\Data\Service;
use NextPHP\Data\Persistence\Transactional;


#[Service(description: 'Post management service')]
class PostService
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    #[Transactional]
    public function createPost(array $postData): Post
    {
        $post = new Post();
        $post->title = $postData['title'];
        $post->content = $postData['content'];
        $post->user_id = $postData['user_id'];

        $postArray = [
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => $post->user_id,
        ];

        $this->postRepository->save($postArray);

        return $post;
    }

    public function getAllPosts(): array
    {
        return $this->postRepository->findAll();
    }

    public function getPostById(int $id): ?Post
    {
        $postArray = $this->postRepository->find($id);
        if (!$postArray) {
            return null;
        }

        $post = new Post();
        $post->id = $postArray['id'];
        $post->title = $postArray['title'];
        $post->content = $postArray['content'];
        $post->user_id = $postArray['user_id'];

        return $post;
    }

    public function updatePost(int $id, array $data): ?Post
    {
        $post = $this->getPostById($id);
        if (!$post) {
            return null;
        }

        foreach ($data as $key => $value) {
            if (property_exists($post, $key)) {
                $post->$key = $value;
            }
        }

        $postArray = get_object_vars($post);
        $this->postRepository->update($id, $postArray);

        return $post;
    }

    public function deletePost(int $id): bool
    {
        $post = $this->getPostById($id);
        if (!$post) {
            return false;
        }

        $this->postRepository->delete($id);

        return true;
    }
}