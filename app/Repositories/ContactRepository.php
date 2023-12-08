<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Contact;

class ContactRepository
{
    public function store($input)
    {
        return Contact::create($input);
    }
    public function delete($id)
    {
        $contact = $this->find($id);
        $contact->delete();
        return $contact;
    }
    public function getContacts($text, $page_size)
    {
        if ($page_size) {
            return Contact::where("name", "like", "%" . strtolower($text) . '%')
                ->orWhere("phone", "like", "%" . strtolower($text) . '%')
                ->orWhere("email", "like", "%" . strtolower($text) . '%')
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Contact::get();
    }
    public function getContact($id)
    {
        return $this->find($id);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $contact = Contact::with($relations)->find($id);
        if (!$contact) throw  new NotFoundException;
        return $contact;
    }
}
