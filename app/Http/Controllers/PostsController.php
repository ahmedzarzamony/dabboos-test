<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function __construct(
        protected PostService $service
    ) {}

    public function index()
    {
        $list = $this->service->list();
        return PostResource::collection($list);
    }

    public function store(PostRequest $request)
    {
        $post = $this->service->store($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $post
        ], 201);
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->service->update($id, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $post
        ]);
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ]);
    }
}

