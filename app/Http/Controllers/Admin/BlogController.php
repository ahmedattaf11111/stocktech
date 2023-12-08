<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Repositories\BlogRepository;

class BlogController extends Controller
{
    private $blogRepository;
    public function __construct(BlogRepository $blogRepository)
    {
        $this->middleware('auth:admin');
        $this->blogRepository = $blogRepository;
    }

    public function store(StoreBlogRequest $request)
    {
        $brand = $this->blogRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateBlogRequest $request)
    {
        $brand = $this->blogRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->blogRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->blogRepository->getBlogs($text, request()->page_size, request()->status);
    }

    public function toggleStatus($id)
    {
        $brand = $this->blogRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }

    public function find($id)
    {
        return $this->blogRepository->getBlog($id);
    }
}
