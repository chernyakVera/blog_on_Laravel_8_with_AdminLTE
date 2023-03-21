<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PostsImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        dd($collection);

        foreach ($collection as $item) {
            if (isset($item[0]) && $item[0] != null) {
                Post::firstOrCreate(
                    ['title' => $item[0]],
                    [
                        'title' => $item[0],
                        'content' => $item[1],
                        'user_id' => $item[2],
                        'image' => $item[3],
                        'likes' => $item[4],
                        'is_published' => $item[5],
                        'category_id' => $item[6],
                    ]
                );
            }
        }
    }
}
