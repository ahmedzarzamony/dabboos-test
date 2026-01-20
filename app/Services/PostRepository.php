<?php
namespace App\Services;
use App\Models\Post;
class PostRepository
{
    public function all()
    {
        return Post::all();
    }

    public function find(int $id)
    {
        return Post::findOrFail($id);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update(int $id, array $data)
    {
        $Post = $this->find($id);
        $Post->update($data);
        return $Post;
    }

    public function delete(int $id)
    {
        return Post::destroy($id);
    }
}