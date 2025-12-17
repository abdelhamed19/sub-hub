<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientManageController extends Controller
{
    public function index()
    {
        $clients = Client::select('id', 'name', 'email', 'phone', 'city', 'business_type', 'is_active')
            ->paginate(10);
        return view('super_admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('super_admin.clients.create');
    }

    public function show(Client $client)
    {
        return view('super_admin.clients.show', compact('client'));
    }

    public function delete(Client $client)
    {
        $client->delete();
        return redirect()->route('superadmin.clients.manage')->with('success', 'Client deleted successfully.');
    }

    public function restore($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->restore();
        return redirect()->route('superadmin.clients.manage')->with('success', 'Client restored successfully.');
    }

    public function forceDelete($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->forceDelete();
        return redirect()->route('superadmin.clients.manage')->with('success', 'Client permanently deleted.');
    }
}
