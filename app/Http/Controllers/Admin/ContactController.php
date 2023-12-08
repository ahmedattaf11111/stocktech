<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->middleware('auth:admin');
        $this->contactRepository = $contactRepository;
    }
    public function delete($id)
    {
        $brand = $this->contactRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->contactRepository->getContacts($text, request()->page_size, request()->status);
    }
    public function find($id)
    {
        return $this->contactRepository->getContact($id);
    }
}
