<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRateRequest;
use App\Http\Requests\Admin\UpdateRateRequest;
use App\Repositories\RateRepository;

class RateController extends Controller
{
    private $rateRepository;
    public function __construct(RateRepository $rateRepository)
    {
        $this->middleware('auth:admin');
        $this->rateRepository = $rateRepository;
    }

    public function store(StoreRateRequest $request)
    {
        $brand = $this->rateRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateRateRequest $request)
    {
        $brand = $this->rateRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->rateRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->rateRepository->getRates($text, request()->page_size, request()->status);
    }
    public function toggleStatus($id)
    {
        $brand = $this->rateRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }
    public function find($id)
    {
        return $this->rateRepository->getRate($id);
    }
}
