<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Exceptions\UnauthorizedException;
use App\Repositories\PostRepository;
use App\Repositories\LikeRepository;

class PostService
{
    protected $postRepo;
    protected $likeRepo;

    public function __construct(PostRepository $postRepo, LikeRepository $likeRepo)
    {
        $this->postRepo = $postRepo;
        $this->likeRepo = $likeRepo;
    }

    public function getPostList($perPage)
    {
        return $this->postRepo->getPaginated($perPage);
    }

    public function changeLikeUnlike($request)
    {
        $post = $this->postRepo->getById($request->postId);
        if (!$post) {
            throw new NotFoundException(config('message.notFoundMsg'));
        }
        $authId = auth()->id();
        if ($post->author_id == $authId) {
            throw new UnauthorizedException('You cannot like your post');
        }

        $like = $this->likeRepo->isAlreadyLiked($request->postId, $authId);
        if ($like){
            if ($request->likeStatus ){
                throw new UnauthorizedException('You already liked this post');
            } else{
                $this->likeRepo->delete($like->id);
                return config('message.unlike');
            }
        } else {

            if (!$request->likeStatus){
                throw new NotFoundException(config('message.notFoundMsg'));
            }

            $this->likeRepo->createLike($request->postId, $authId);
            return config('message.like');
        }
    }
}