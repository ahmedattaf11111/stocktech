<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSessionRequest;
use App\Jobs\NotifySession;
use App\Models\Employee;
use App\Repositories\SessionRepository;
use Carbon\Carbon;

class SessionController extends Controller
{
    private $sessionRepository;
    public function __construct(SessionRepository $sessionRepository)
    {
        $this->middleware('auth:admin');
        $this->sessionRepository = $sessionRepository;
    }

    public function store(StoreSessionRequest $request)
    {
        $brand = $this->sessionRepository->store($request->validated());
        NotifySession::dispatch($brand)->delay(Carbon::parse($brand->start)->subMinutes(10));
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function delete($id)
    {
        $brand = $this->sessionRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        return $this->sessionRepository->getSessions();
    }

    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
}
