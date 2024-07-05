<?php

namespace NextPHP\App\Repository;

use NextPHP\App\Entity\Post;
use NextPHP\Data\BaseRepository;
use NextPHP\Data\Repository;

#[Repository(entityClass: Post::class)]
class PostRepository extends BaseRepository
{

}