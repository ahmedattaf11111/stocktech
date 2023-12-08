<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactRequest;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function store(ContactRequest $request)
    {
        $input = $request->validated();
        $brand = $this->contactRepository->store($input);
        return response()->json("Item created successfully with id : $brand->id");
    }
}
