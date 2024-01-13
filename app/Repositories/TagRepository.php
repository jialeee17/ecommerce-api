<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function createTag(array $data)
    {
        return Tag::create($data);
    }

    public function updateTag($id, array $data)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($data);

        return $tag;
    }

    public function deleteTag($id)
    {
        $tags = Tag::findOrFail($id);

        return $tags->delete();
    }
}
