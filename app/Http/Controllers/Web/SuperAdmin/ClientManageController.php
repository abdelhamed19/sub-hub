<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Models\Client;
use App\Models\Country;
use App\Enums\IndustryType;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Web\SuperAdmin\CreateNewClientRequest;
use App\Http\Requests\Web\SuperAdmin\UpdateExistingClientRequest;
use App\Services\LocationService;

class ClientManageController extends Controller
{
    use UploadTrait;
    public function __construct(private LocationService $locationService) {}
    public function index()
    {
        $search = request('search');
        $page = request('page', 1);
        $cacheKey = Client::getCacheKeyForList(Client::$cacheTag, "search={$search}", "page={$page}");

        $clients = Cache::tags(Client::$cacheTag)->remember($cacheKey, now()->addMinutes(10), function () use ($search) {
            return Client::search($search, Client::$searchableFields)
                ->orderByDesc('created_at')
                ->select('id', 'name', 'email', 'phone', 'city', 'business_type', 'is_active', 'created_at')
                ->paginate(10);
        });

        return view('super_admin.clients.index', compact('clients'));
    }

    public function create()
    {
        $countries = $this->locationService->getCountriesList();
        return view('super_admin.clients.create', compact('countries'));
    }

    public function store(CreateNewClientRequest $request)
    {
        $data = $request->validated();
        try {
            if ($request->hasFile('logo')) {
                $data['logo'] = $this->uploadImage($request->file('logo'), Client::LOGO_DIR);
            }
            Client::create($data);
            return redirect()->route('super_admin.client.manage')->with('success', __('mutual.created_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('mutual.error_creating'));
        }
    }

    public function show(Client $client)
    {
        $countries = $this->locationService->getCountriesList();
        return view('super_admin.clients.show', compact('client', 'countries'));
    }

    public function delete(Client $client)
    {
        $client->delete();
        return redirect()->route('super_admin.client.manage')->with('success', __('mutual.client_deleted_successfully'));
    }

    public function edit(Client $client)
    {
        $countries = $this->locationService->getCountriesList();
        return view('super_admin.clients.edit', compact('client', 'countries'));
    }

    public function update(UpdateExistingClientRequest $request, Client $client)
    {
        $data = $request->validated();
        try {
            if ($request->hasFile('logo')) {
                $data['logo'] = $this->updateImage($request->file('logo'), $client->logo, Client::LOGO_DIR);
            }
            $client->update($data);
            return redirect()->route('super_admin.client.manage')->with('success', __('mutual.updated_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('mutual.error_updating'));
        }
    }

    public function restore($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->restore();
        return redirect()->route('super_admin.client.restore')->with('success', 'Client restored successfully.');
    }

    public function forceDelete($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->forceDelete();
        return redirect()->route('super_admin.client.force_delete')->with('success', 'Client permanently deleted.');
    }
}
