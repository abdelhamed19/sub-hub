<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use Illuminate\Http\Request;
use App\Models\SubscriptionBilling;
use App\Http\Controllers\Controller;

class BillingManageController extends Controller
{
    public function index()
    {
        return view('super_admin.billings.index');
    }

    public function create()
    {
        return view('super_admin.billings.create');
    }

    public function store() {}

    public function edit(SubscriptionBilling $subscriptionBilling)
    {
        return view('super_admin.billings.edit', compact('subscriptionBilling'));
    }

    public function show(SubscriptionBilling $subscriptionBilling)
    {
        return view('super_admin.billings.show', compact('subscriptionBilling'));
    }

    public function update(SubscriptionBilling $subscriptionBilling) {}

    public function destroy(SubscriptionBilling $subscriptionBilling) {}
}
