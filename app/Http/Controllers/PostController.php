<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;
use App\Services\PostService;
use App\Http\Resources\LoginResource;
use App\Http\Utilities\HttpResponseUtility;
use App\Http\Resources\PostListResourceCollection;

class PostController extends Controller
{
    protected $postService;
    protected $httpResponseUtility;

    public function __construct(PostService $postService, HttpResponseUtility $httpResponseUtility)
    {
        $this->httpResponseUtility = $httpResponseUtility;
        $this->postService = $postService;
    }

    public function list(Request $request)
    {
        $result = $this->postService->getPostList($request->perPage);
        return $this->httpResponseUtility->successResponse(new PostListResourceCollection($result));
    }

    public function toggleReaction(LikeRequest $request)
    {
        $message = $this->postService->changeLikeUnlike($request);
        return $this->httpResponseUtility->successResponse(null, $message);
    }
}
