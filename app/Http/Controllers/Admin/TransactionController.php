<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttendanceRequest;
use App\Http\Requests\Admin\TransactionRequest;
use App\Models\AccountItem;
use App\Models\Employee;
use App\Models\Student;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    private $transactionRepository;
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->middleware('auth:admin');
        $this->transactionRepository = $transactionRepository;
    }

    public function store(TransactionRequest $request)
    {
        $brand = $this->transactionRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->transactionRepository->getTransactions(
            $text,
            request()->page_size,
            request()->account_item_id,
        );
    }
    public function getStudents()
    {
        return Student::where("status", 1)->get();
    }

    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    
    public function getAccountItems()
    {
        return AccountItem::where("status", 1)->get();
    }
}
