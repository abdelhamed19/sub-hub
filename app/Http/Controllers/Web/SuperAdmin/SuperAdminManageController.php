<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class SuperAdminManageController extends Controller
{
    public function index()
    {
        $superAdmins = SuperAdmin::paginate(10);
        return view('super_admin.manage', compact('superAdmins'));
    }
    public function create()
    {
        return view('super_admin.create');
    }
    public function store(Request $request)
    {
        // Validate and store the new super admin
    }
}
