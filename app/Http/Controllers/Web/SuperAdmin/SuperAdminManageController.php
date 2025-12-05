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
}
