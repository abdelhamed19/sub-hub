<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Models\Client;
use App\Traits\UploadTrait;
use App\Models\ClientAssistant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\SuperAdmin\CreateNewClientAssistantRequest;
use App\Http\Requests\Web\SuperAdmin\UpdateExistingClientAssistantRequest;

class ClientAssistantManageController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $assistants = ClientAssistant::search(request('search'))
            ->with('client')
            ->orderBy('created_at', 'desc')
            ->select('id', 'name', 'email', 'phone', 'image', 'is_active', 'last_login_at', 'created_at', 'client_id')
            ->paginate(10);

        return view('super_admin.assistants.index', compact('assistants'));
    }

    public function create()
    {
        $clients = Client::active()->select('id', 'name', 'legal_name')->get();
        return view('super_admin.assistants.create', compact('clients'));
    }

    public function store(CreateNewClientAssistantRequest $request)
    {
        $data = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), ClientAssistant::IMAGE_DIR);
            }

            ClientAssistant::create($data);

            return redirect()->route('super_admin.client_assistant.manage')
                ->with('success', __('messages.client_assistant.created_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', __('messages.general.error_occurred'));
        }
    }

    public function edit(ClientAssistant $assistant)
    {
        $clients = Client::active()->select('id', 'name', 'legal_name')->get();
        return view('super_admin.assistants.edit', compact('assistant', 'clients'));
    }

    public function update(UpdateExistingClientAssistantRequest $request, ClientAssistant $assistant)
    {
        $data = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $this->updateImage($request->file('image'), $assistant->image, ClientAssistant::IMAGE_DIR);
            }

            $assistant->update($data);

            return redirect()->route('super_admin.client_assistant.manage')
                ->with('success', __('messages.client_assistant.updated_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', __('messages.general.error_occurred'));
        }
    }

    public function show(ClientAssistant $assistant)
    {
        return view('super_admin.assistants.show', compact('assistant'));
    }

    public function delete(ClientAssistant $assistant)
    {
        $assistant->delete();
        return redirect()->route('super_admin.client_assistant.manage')
            ->with('success', __('messages.client_assistant.deleted_successfully'));
    }

    public function deleteMultiple()
    {
        $ids = request()->input('ids', []);
        try {
            ClientAssistant::destroy($ids);
            return response()->json([
                'status' => 'success',
                'message' => __('mutual.delete_success', ['attribute' => __('mutual.selected_client_assistants')]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('mutual.delete_failed', ['attribute' => __('mutual.selected_client_assistants')]),
            ], 500);
        }
    }
}
