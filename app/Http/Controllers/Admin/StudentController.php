<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create() {
        return view('admin.students.create');
    }

    public function store() {
        dd(request()->all());
    }
}
