<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function store($input)
    {
        return Transaction::create($input);
    }
    public function getTransactions($text, $page_size, $account_item_id)
    {
        if ($page_size) {
            return Transaction::when($text, function ($q) use ($text) {
                $q->where(function ($q) use ($text) {
                    $q->whereRelation("student", "name", "like", "%$text%")
                        ->orWhereRelation("student", "name", "like", "%$text%");
                });
            })
                ->when($account_item_id, function ($q) use ($account_item_id) {
                    $q->where("account_item_id", $account_item_id);
                })
                ->with(["accountItem", "employee", "student"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Transaction::get();
    }
}
