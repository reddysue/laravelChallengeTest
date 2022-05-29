<?php

namespace App\Repositories;

use App\Models\Like;

class LikeRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(Like $model)
    {
        $this->model = $model;
    }

    public function isAlreadyLiked($postId, $authId)
    {
        return $this->model->where('post_id', $postId)->where('user_id', $authId)->first();
    }

    public function createLike($postId, $authId)
    {
        return $this->model->create(['post_id'=>$postId, 'user_id'=> $authId]);
    }
}
