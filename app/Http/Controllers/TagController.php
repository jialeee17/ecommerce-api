<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Repositories\TagRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        try {
            $tags = $this->tagRepository->getAllTags();

            return new ApiSuccessResponse(
                $tags,
                str_replace(':name', 'Tags', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', 'unique:tags,slug'],
                'description' => ['nullable', 'string'],
            ]);

            $tag = $this->tagRepository->createTag([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);

            return new ApiSuccessResponse(
                $tag,
                str_replace(':name', 'Tag', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Tag $tag)
    {
        try {
            return new ApiSuccessResponse(
                $tag,
                str_replace(':name', 'Tag', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Tag $tag)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', Rule::unique('tags', 'slug')->ignore($tag)],
                'description' => ['nullable', 'string'],
            ]);

            $tag = $this->tagRepository->updateTag($tag->id, [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);

            return new ApiSuccessResponse(
                $tag,
                str_replace(':name', 'Tag', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Tag $tag)
    {
        try {
            $this->tagRepository->deleteTag($tag->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Tag', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
