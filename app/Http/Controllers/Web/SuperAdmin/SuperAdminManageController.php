<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\SuperAdmin\RegisterNewAdminRequest;
use App\Http\Requests\Web\SuperAdmin\UpdateExistingSuperAdminRequest;
use App\Models\SuperAdmin;
use App\Services\ImageUploadService;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class SuperAdminManageController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $superAdmins = SuperAdmin::search(request('search'))->paginate(10);
        return view('super_admin.manage', compact('superAdmins'));
    }
    public function create()
    {
        return view('super_admin.create');
    }

    public function store(RegisterNewAdminRequest $request)
    {
        $data = $request->validated();
        try {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), SuperAdmin::IMAGE_DIRECTORY);
            }
            SuperAdmin::create($data);
            return redirect()->route('super_admin.manage')->with('success', 'New Super Admin registered successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while registering the Super Admin: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $superAdmin = SuperAdmin::findOrFail($id);
        return view('super_admin.show', compact('superAdmin'));
    }

    public function edit($id)
    {
        $superAdmin = SuperAdmin::findOrFail($id);
        return view('super_admin.edit', compact('superAdmin'));
    }

    public function update(UpdateExistingSuperAdminRequest $request, $id)
    {
        $superAdmin = SuperAdmin::findOrFail($id);
        $data = $request->validated();
        try {
            if ($request->hasFile('image')) {
                $data['image'] = $this->updateImage(
                    $request->file('image'),
                    $superAdmin->image,
                    SuperAdmin::IMAGE_DIRECTORY
                );
            }
            $superAdmin->update($data);
            return redirect()->route('super_admin.manage')->with('success', 'Super Admin updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the Super Admin: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $superAdmin = SuperAdmin::findOrFail($id);
        $superAdmin->delete();
        return redirect()->route('super_admin.manage')->with('success', 'Super Admin deleted successfully.');
    }
}
