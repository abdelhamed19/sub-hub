<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Models\Plan;
use App\Models\Client;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Web\SuperAdmin\CreateNewSubscriptionRequest;

class SubscriptionManageController extends Controller
{
    public function index()
    {
        $search = request('search');
        $page   = request('page', 1);

        $cacheKey = Subscription::getCacheKeyForList(
            Subscription::$cacheTag,
            "search={$search}",
            "page={$page}"
        );

        $subscriptions = Cache::tags(Subscription::$cacheTag)
            ->remember(
                $cacheKey,
                now()->addMinutes(10),
                function () use ($search) {
                    return Subscription::search($search)
                        ->with(['plan', 'client'])
                        ->orderByDesc('created_at')
                        ->paginate(10);
                }
            );

        return view('super_admin.subscriptions.index', compact('subscriptions'));
    }


    public function create()
    {
        $plans = Plan::active()
            ->select('id', 'name')
            ->get();

        $clients = Cache::tags('clients')->remember(
            'active_clients_for_subscription',
            now()->addMinutes(10),
            fn() => Client::active()
                ->select('id', 'name', 'legal_name')
                ->get()
        );

        return view('super_admin.subscriptions.create', compact('plans', 'clients'));
    }

    public function store(CreateNewSubscriptionRequest $request)
    {
        $data = $request->validated();
        try {
            Subscription::create($data);
            return redirect()->route('super_admin.subscription.manage')->with('success', __('mutual.create_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('mutual.error_creating') . ': ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Subscription $subscription)
    {
        return view('super_admin.subscriptions.edit', compact('subscription'));
    }

    public function show(Subscription $subscription)
    {
        return view('super_admin.subscriptions.show', compact('subscription'));
    }

    public function update(Subscription $subscription) {}

    public function destroy(Subscription $subscription)
    {
        try {
            $subscription->delete();
            return redirect()->route('super_admin.subscription.manage')->with('success', __('mutual.delete_success', ['attribute' => __('mutual.subscription')]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('mutual.delete_failed', ['attribute' => __('mutual.subscription')]));
        }
    }

    public function deleteMultiple()
    {
        $ids = request()->input('ids', []);

        try {
            Subscription::destroy($ids);

            return response()->json([
                'status' => 'success',
                'message' => __('mutual.delete_success', [
                    'attribute' => __('mutual.selected_subscriptions')
                ]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('mutual.delete_failed', [
                    'attribute' => __('mutual.selected_subscriptions')
                ]),
            ], 500);
        }
    }
}
