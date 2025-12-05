<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\SuperAdmin\LoginRequest;
use App\Http\Requests\Web\SuperAdmin\RegisterNewAdminRequest;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('super_admin.index');
    }

    public function loginForm()
    {
        return view('super_admin.auth.login');
    }

    public function validateLogin(LoginRequest $request)
    {
        $data = $request->validated();

        $superAdmin = SuperAdmin::where('email', $data['email'])->first();

        if (!$superAdmin || !password_verify($data['password'], $superAdmin->password)) {
            return redirect()->back()->withErrors(['error' => __('auth.login_failed')])->withInput();
        }

        auth()->guard('super_admin')->login($superAdmin);

        $request->session()->regenerate();

        $superAdmin->update([
            'last_login_at' => now(),
        ]);

        return redirect()->route('super_admin.dashboard');
    }

    public function logout(Request $request)
    {
        auth()->guard('super_admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('super_admin.auth.login');
    }

    public function registerNewAdminForm()
    {
        dd('Register New Super Admin Form');
    }

    public function registerNewAdmin(RegisterNewAdminRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            SuperAdmin::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role'],
                'is_active' => $data['is_active'] ?? true,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }

        dd('New Admin Registered Successfully');
    }
}
