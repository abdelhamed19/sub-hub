<?php

namespace App\Http\Controllers\Web\SuperAdmin;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\SuperAdmin\CreateNewPlanRequest;
use App\Http\Requests\Web\SuperAdmin\UpdateExistingPlanRequest;
use Illuminate\Support\Facades\Cache;

class PlanManageController extends Controller
{
    public function index()
    {
        $plans =  Plan::search(request('search'), Plan::$searchableFields)
            ->orderBy('created_at', 'desc')
            ->select(
                'id',
                'name',
                'price',
                'compare_price',
                'features',
                'type',
                'duration_days',
                'is_active',
                'created_at'
            )
            ->paginate(10);
        return view('super_admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('super_admin.plans.create');
    }

    public function store(CreateNewPlanRequest $request)
    {
        $data = $request->validated();
        try {
            Plan::create($data);
            return redirect()->route('super_admin.plan.manage')->with('success', __('mutual.create_successfully', ['attribute' => __('mutual.plan')]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('mutual.error_creating', ['attribute' => __('mutual.plan')]))->withInput();
        }
    }

    public function edit(Plan $plan)
    {
        return view('super_admin.plans.edit', compact('plan'));
    }

    public function show(Plan $plan)
    {
        return view('super_admin.plans.show', compact('plan'));
    }

    public function update(UpdateExistingPlanRequest $request, Plan $plan)
    {
        $data = $request->validated();
        try {
            $plan->update($data);
            return redirect()->route('super_admin.plan.manage')->with('success', __('mutual.updated_successfully', ['attribute' => __('mutual.plan')]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('mutual.update_failed', ['attribute' => __('mutual.plan')]))->withInput();
        }
    }

    public function destroy(Plan $plan)
    {
        try {
            $plan->delete();
            return redirect()->route('super_admin.plan.manage')->with('success', __('mutual.delete_success', ['attribute' => __('mutual.plan')]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('mutual.delete_failed', ['attribute' => __('mutual.plan')]));
        }
    }

    public function deleteMultiple()
    {
        $ids = request()->input('ids', []);
        try {
            Plan::destroy($ids);
            return response()->json([
                'status' => 'success',
                'message' => __('mutual.delete_success', ['attribute' => __('mutual.selected_plans')]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('mutual.delete_failed', ['attribute' => __('mutual.selected_plans')]),
            ], 500);
        }
    }
}
