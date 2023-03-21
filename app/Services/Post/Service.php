<?php


namespace App\Services\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            $tags = $data['tags'];
//            $categoryId = $data['category_id'];
//            unset($data['tags'], $data['category_id']);
            unset($data['tags']);

//            $data['category_id'] = $this->getCategoryId($categoryId);
//            $tagIds = $this->getTagIds($tags);

            $post = Post::create($data);
//            $post->tags()->attach($tagIds);
            $post->tags()->attach($tags);

            Db::commit();

        } catch (\Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }

        return $post;
    }

    public function update($post, $data)
    {
        try {
            Db::beginTransaction();

            $tags = $data['tags'];
            //$categoryId = $data['category_id'];
            //unset($data['tags'], $data['category_id']);
            unset($data['tags']);

//            $data['category_id'] = $this->getCategoryIdWithUpdate($categoryId);
//            $tagIds = $this->getTagIdsWithUpdate($tags);

            $post->update($data);
//            $post->tags()->sync($tagIds);
            $post->tags()->sync($tags);

            Db::commit();

        } catch (\Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }

        return $post->fresh();
    }

    private function getCategoryId($category)
    {
        $categoryActual = !isset($category['id']) ? Category::create($category) : Category::find($category['id']);

        return $categoryActual->id;
    }

    private function getCategoryIdWithUpdate($category)
    {
        if (!isset($category)) {
            $category = Category::create($category);
        } else {
            $currentCategory = Category::find($category);
            $currentCategory->update(['category_id' => $category]);
            $category = $currentCategory->fresh();
        }

        return $category->id;
    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagActual = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tagActual->id;
        }

        return $tagIds;
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }
}
