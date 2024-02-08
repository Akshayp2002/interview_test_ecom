<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        try {
            return view('admin.dashboard');
        } catch (Exception $e) {
        }
    }
}
