<x-super-admin.super-admin-layout-component :title="__('super_admin.show_plan')">
    <x-super-admin.flash-message-component />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <strong class="card-title mb-0">
                        {{ __('super_admin.show_plan') }}: {{ $plan->name }}
                    </strong>
                    <a href="{{ route('super_admin.plan.manage') }}" class="btn btn-secondary btn-sm">
                        <i class="fe fe-arrow-left"></i> {{ __('mutual.back') }}
                    </a>
                </div>

                <div class="card-body">

                    <!-- الاسم والسعر -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.name') }}</h6>
                            <p class="font-weight-bold mb-0">{{ $plan->name }}</p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.price') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ number_format($plan->price) }} {{ __('mutual.currency') }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- السعر المقارن والحالة -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.compare_price') }}</h6>
                            <p class="font-weight-bold mb-0">
                                @if ($plan->compare_price)
                                    <del class="text-danger">{{ number_format($plan->compare_price) }}
                                        {{ __('mutual.currency') }}</del>
                                    <span class="text-success ml-2">({{ __('mutual.discount') }})</span>
                                @else
                                    <span class="text-muted">{{ __('mutual.no_compare_price') }}</span>
                                @endif
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.status') }}</h6>
                            <span class="badge badge-lg {{ $plan->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $plan->is_active ? __('mutual.active') : __('mutual.inactive') }}
                            </span>
                        </div>
                    </div>

                    <hr>

                    <!-- المدة والوصف -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.duration_days') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $plan->duration_days }} {{ __('mutual.days') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.description') }}</h6>
                            <p class="mb-0">
                                {{ $plan->description ?: '<span class="text-muted">' . __('mutual.no_description') . '</span>' }}
                            </p>
                        </div>
                    </div>

                    <!-- المميزات -->
                    @if ($plan->features && count($plan->features) > 0)
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">{{ __('mutual.features') }}</h6>
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    @foreach ($plan->features as $feature)
                                        <div class="d-flex align-items-center p-2 bg-light rounded border">
                                            <i class="fe fe-check-circle text-success mr-3"
                                                style="font-size: 18px;"></i>
                                            <span>{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">{{ __('mutual.features') }}</h6>
                                <p class="text-muted text-center py-3">
                                    {{ __('mutual.no_features_yet') }}
                                </p>
                            </div>
                        </div>
                    @endif

                </div>

                <!-- الأزرار في الأسفل -->
                <div class="card-footer d-flex justify-content-center py-4 bg-light">
                    <a href="{{ route('super_admin.plan.edit', $plan->id) }}" class="btn btn-warning mr-3">
                        <i class="fe fe-edit"></i> {{ __('mutual.edit') }}
                    </a>

                    <a href="{{ route('super_admin.plan.manage') }}" class="btn btn-secondary">
                        <i class="fe fe-list"></i> {{ __('mutual.all_plans') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-super-admin.super-admin-layout-component>
