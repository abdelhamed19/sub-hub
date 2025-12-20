<x-super-admin.super-admin-layout-component :title="__('super_admin.client_details')">
    <x-super-admin.flash-message-component />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Header مع الاسم واللوجو -->
                <div class="card-header py-3 d-flex align-items-center">
                    @if ($client->logo)
                        <img src="{{ $client->logo }}" alt="Logo" class="rounded mr-3" width="60" height="60">
                    @else
                        <div class="bg-primary text-white rounded d-flex align-items-center justify-content-center mr-3"
                            style="width:60px; height:60px; font-size:24px;">
                            {{ strtoupper(substr($client->name, 0, 2)) }}
                        </div>
                    @endif

                    <div>
                        <strong class="card-title mb-0 h4">{{ $client->name }}</strong>
                        <p class="text-muted mb-0">{{ $client->legal_name }}</p>
                    </div>

                    <div class="ml-auto">
                        <span class="badge badge-lg {{ $client->is_active ? 'badge-success' : 'badge-danger' }}">
                            {{ $client->is_active ? __('mutual.active') : __('mutual.inactive') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">

                    <!-- معلومات الاتصال -->
                    <h6 class="text-primary mb-3">{{ __('mutual.contact_information') }}</h6>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h6 class="text-muted mb-1">{{ __('mutual.email') }}</h6>
                            <p class="font-weight-bold mb-0">{{ $client->email ?: '<span class="text-muted">—</span>' }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted mb-1">{{ __('mutual.phone') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $client->phone ?: '<span class="text-muted">—</span>' }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted mb-1">{{ __('mutual.alternative_phone') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $client->alternative_phone ?: 'none' }}</p>
                        </div>
                    </div>

                    <hr>

                    <!-- معلومات الشركة -->
                    <h6 class="text-primary mb-3">{{ __('mutual.company_information') }}</h6>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.tax_id') }}</h6>
                            <p class="font-weight-bold mb-0">{{ $client->tax_id ?: '—' }}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.commercial_registration') }}</h6>
                            <p class="font-weight-bold mb-0">{{ $client->commercial_registration ?: '—' }}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.employee_count') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $client->employees_count ? $client->employees_count . ' ' . __('mutual.employee') : '—' }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.website') }}</h6>
                            <p class="mb-0">
                                @if ($client->website)
                                    <a href="{{ $client->website }}" target="_blank" class="text-primary">
                                        {{ $client->website }}
                                    </a>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- نوع النشاط التجاري -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.business_type') }}</h6>
                            <p class="font-weight-bold mb-0">

                                {{ $client->business_type }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.industry') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $client->industry }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- العنوان -->
                    <h6 class="text-primary mb-3">{{ __('mutual.address') }}</h6>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.address') }}</h6>
                            <p class="mb-0">{{ $client->address ?: '—' }}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.city') }}</h6>
                            <p class="mb-0">{{ $client->city ?: '—' }}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.country') }}</h6>
                            <p class="mb-0">
                                {{ $client->country_name }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-1">{{ __('mutual.postal_code') }}</h6>
                            <p class="mb-0">{{ $client->postal_code ?: '—' }}</p>
                        </div>
                    </div>

                    <!-- الملاحظات -->
                    @if ($client->notes)
                        <hr>
                        <h6 class="text-primary mb-3">{{ __('mutual.notes') }}</h6>
                        <div class="bg-light p-3 rounded border">
                            <p class="mb-0">{{ nl2br(e($client->notes)) }}</p>
                        </div>
                    @endif

                </div>

                <!-- الأزرار في الأسفل -->
                <div class="card-footer d-flex justify-content-center py-4 bg-light">
                    <a href="{{ route('super_admin.client.edit', $client->id) }}" class="btn btn-warning mr-3">
                        <i class="fe fe-edit"></i> {{ __('mutual.edit') }}
                    </a>

                    <a href="{{ route('super_admin.client.manage') }}" class="btn btn-secondary">
                        <i class="fe fe-list"></i> {{ __('super_admin.clients') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-super-admin.super-admin-layout-component>
