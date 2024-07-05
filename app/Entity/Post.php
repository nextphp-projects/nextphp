<?php

namespace NextPHP\App\Entity;

use NextPHP\Data\Persistence\Entity;
use NextPHP\Data\Persistence\Column;
use NextPHP\Data\Persistence\ManyToOne;

#[Entity('posts')]
class Post
{
    #[Column('INT AUTO_INCREMENT PRIMARY KEY', false)]
    public int $id;

    #[Column('VARCHAR(255)', false)]
    public string $title;

    #[Column('TEXT', false)]
    public string $content;

    #[Column('INT', false)]
    public int $user_id;

    // #[ManyToOne(targetEntity: User::class, inversedBy: 'posts', onDelete: 'CASCADE')]
    #[ManyToOne(targetEntity: User::class, inversedBy: 'posts')]
    private User $user;

    // Getter ve Setter metodları

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function setUser(User $user): void {
        $this->user = $user;
    }
}
