<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index() {
        $contact = Contact::all();
        return view('admin.contact.index',compact('contact'));
    }
    public function delete($id) {
        Contact::destroy($id);
        return redirect()->route('contact.index');
    }
}
