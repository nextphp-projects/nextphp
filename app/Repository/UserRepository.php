<?php

namespace NextPHP\App\Repository;

use NextPHP\App\Entity\User;
use NextPHP\Data\BaseRepository;
use NextPHP\Data\Repository;

#[Repository(entityClass: User::class)]
class UserRepository extends BaseRepository
{
    // Artık constructor'a ihtiyaç yok
}