<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(Post $model)
    {
        $this->model = $model;
        $this->perPage = config('enums.perPage');
    }
}
