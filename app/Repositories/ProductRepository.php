<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\BaseCategory;
use App\Models\Product;

class ProductRepository
{
    public function store($input)
    {
        return Product::create($input);
    }
    public function update($input)
    {
        $product = $this->find($input["id"]);
        $product->update($input);
        return $product;
    }
    public function delete($id)
    {
        $product = $this->find($id);
        $product->delete();
        return $product;
    }
    public function getProducts($text, $page_size, $category_id, $status)
    {
        if ($page_size) {
            return Product::where(function ($q) use ($text) {
                $q->where("name_ar", "like", "%" . strtolower($text) . '%')
                    ->orWhere("name_en", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("with_photo", $status);
            })
                ->when($category_id !== null, function ($q) use ($category_id) {
                    $q->where("base_category_id", $category_id);
                })
                ->with(["blackMediaManager", "whiteMediaManager", "baseCategory"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Product::get();
    }

    public function getProduct($id)
    {
        return $this->find($id, ["blackMediaManager", "whiteMediaManager"]);
    }
    public function getCategories()
    {
        return BaseCategory::get();
    }
    //Commons
    private function find($id, $relations = [])
    {
        $product = Product::with($relations)->find($id);
        if (!$product) throw  new NotFoundException;
        return $product;
    }
}
