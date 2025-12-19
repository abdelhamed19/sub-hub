<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SubscriptionManageController extends Controller
{
    public function index()
    {
        $subscriptions = Cache::rememberForever('subscriptions' . request('search'), function () {
            return Subscription::with(['plan', 'client'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        });
        return view('super_admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('super_admin.subscriptions.create');
    }

    public function store() {}

    public function edit(Subscription $subscription)
    {
        return view('super_admin.subscriptions.edit', compact('subscription'));
    }

    public function show(Subscription $subscription)
    {
        return view('super_admin.subscriptions.show', compact('subscription'));
    }

    public function update(Subscription $subscription) {}

    public function destroy(Subscription $subscription) {}
}
