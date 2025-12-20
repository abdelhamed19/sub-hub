<x-super-admin.super-admin-layout-component :title="__('super_admin.subscription_details')">
    <x-super-admin.flash-message-component />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <strong class="card-title mb-0">
                        {{ __('super_admin.subscription_details') }} #{{ $subscription->id }}
                    </strong>
                    <a href="{{ route('super_admin.subscription.manage') }}" class="btn btn-secondary btn-sm">
                        <i class="fe fe-arrow-left"></i> {{ __('mutual.back') }}
                    </a>
                </div>

                <div class="card-body">
                    <!-- بيانات العميل والخطة -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.client') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $subscription->client->name }}
                                <small class="text-muted">({{ $subscription->client->legal_name }})</small>
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.plan') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $subscription->plan->name }}
                                <span class="badge badge-pill badge-primary ml-2">
                                    {{ __('mutual.' . $subscription->plan->type) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- التواريخ -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.start_date') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ \Carbon\Carbon::parse($subscription->start_date)->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.end_date') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ \Carbon\Carbon::parse($subscription->end_date)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- الحالة -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.status') }}</h6>
                            <span
                                class="badge badge-lg {{ $subscription->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $subscription->is_active ? __('mutual.active') : __('mutual.inactive') }}
                            </span>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.created_at') }}</h6>
                            <p class="font-weight-bold mb-0 text-muted">
                                {{ $subscription->created_at->format('d/m/Y h:i A') }}
                            </p>
                        </div>
                    </div>

                    <!-- مميزات الخطة (اختياري لو عايز تعرضها) -->
                    @if ($subscription->plan->features && count($subscription->plan->features) > 0)
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">{{ __('mutual.features') }}</h6>
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    @foreach ($subscription->plan->features as $feature)
                                        <div class="d-flex align-items-center p-2 bg-light rounded border">
                                            <i class="fe fe-check-circle text-success mr-3"
                                                style="font-size: 18px;"></i>
                                            <span>{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- الأزرار في الأسفل -->
                <div class="card-footer d-flex justify-content-center py-4">

                    <a href="{{ route('super_admin.subscription.manage') }}" class="btn btn-secondary">
                        <i class="fe fe-list"></i> {{ __('super_admin.subscriptions') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-super-admin.super-admin-layout-component>
