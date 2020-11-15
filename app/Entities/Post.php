<?php

namespace App\Entities;

class Post
{
    /**
     * @var int
     */
    private int $postId;

    /**
     * @var string
     */
    private string $postTitle;

    /**
     * @var string
     */
    private ?string $postDescription;

    /**
     * @var string
     */
    private ?string $postImage;

    public function __construct(int $postId, string $postTitle, ?string $postDescription, ?string $postImage)
    {
        $this->postId = $postId;
        $this->postTitle = $postTitle;
        $this->postDescription = $postDescription;
        $this->postImage = $postImage;
    }


    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId): void
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * @param mixed $postTitle
     */
    public function setPostTitle($postTitle): void
    {
        $this->postTitle = $postTitle;
    }

    /**
     * @return mixed
     */
    public function getPostDescription()
    {
        return $this->postDescription;
    }

    /**
     * @param mixed $postDescription
     */
    public function setPostDescription($postDescription): void
    {
        $this->postDescription = $postDescription;
    }

    /**
     * @return mixed
     */
    public function getPostImage()
    {
        return $this->postImage;
    }

    /**
     * @param mixed $postImage
     */
    public function setPostImage($postImage): void
    {
        $this->postImage = $postImage;
    }

}
