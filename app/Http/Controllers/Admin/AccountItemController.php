<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAccountItemRequest;
use App\Http\Requests\Admin\UpdateAccountItemRequest;
use App\Repositories\AccountItemRepository;

class AccountItemController extends Controller
{
    private $accountItemRepository;
    public function __construct(AccountItemRepository $accountItemRepository)
    {
        $this->middleware('auth:admin');
        $this->accountItemRepository = $accountItemRepository;
    }

    public function store(StoreAccountItemRequest $request)
    {
        $brand = $this->accountItemRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateAccountItemRequest $request)
    {
        $brand = $this->accountItemRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->accountItemRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->accountItemRepository->getAccountItems($text, request()->page_size, request()->status);
    }

    public function toggleStatus($id)
    {
        $brand = $this->accountItemRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }

    public function find($id)
    {
        return $this->accountItemRepository->getAccountItem($id);
    }
}
