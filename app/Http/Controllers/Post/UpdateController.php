<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->update($post, $data);

//        return $post instanceof Post ? new PostResource($post) : $post; //for api
        return redirect()->route('post.show', $post->id);
    }
}
