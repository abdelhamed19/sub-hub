<x-super-admin.super-admin-layout-component :title="__('super_admin.show_client_assistant')">
    <x-super-admin.flash-message-component />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Header مع الصورة والاسم والحالة -->
                <div class="card-header py-3 d-flex align-items-center">
                    @if ($assistant->image)
                        <img src="{{ $assistant->image }}" alt="Assistant Image" class="rounded mr-3"
                            width="80" height="80" style="object-fit: cover;">
                    @else
                        <div class="bg-primary text-white rounded d-flex align-items-center justify-content-center mr-3"
                            style="width:80px; height:80px; font-size:32px;">
                            {{ strtoupper(substr($assistant->name, 0, 2)) }}
                        </div>
                    @endif

                    <div>
                        <strong class="card-title mb-0 h4">{{ $assistant->name }}</strong>
                        <p class="text-muted mb-0">{{ __('mutual.role') }}: {{ $assistant->role }}</p>
                    </div>

                    <div class="ml-auto">
                        <span class="badge badge-lg {{ $assistant->is_active ? 'badge-success' : 'badge-danger' }}">
                            {{ $assistant->is_active ? __('mutual.active') : __('mutual.inactive') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">

                    <!-- معلومات الاتصال -->
                    <h6 class="text-primary mb-3">{{ __('mutual.contact_information') }}</h6>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.email') }}</h6>
                            <p class="font-weight-bold mb-0">
                                <a href="mailto:{{ $assistant->email }}">{{ $assistant->email }}</a>
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.phone') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $assistant->phone ? $assistant->phone : '<span class="text-muted">—</span>' }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- العميل والدور -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.client') }}</h6>
                            <p class="font-weight-bold mb-0">
                                {{ $assistant->client->name }}
                                <small class="text-muted">({{ $assistant->client->legal_name }})</small>
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.role') }}</h6>
                            <p class="font-weight-bold mb-0 text-capitalize">
                                {{ $assistant->role ?: '<span class="text-muted">—</span>' }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <!-- تاريخ الإنشاء (اختياري لكن مفيد) -->
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.created_at') }}</h6>
                            <p class="font-weight-bold mb-0 text-muted">
                                {{ $assistant->created_at->format('d/m/Y h:i A') }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">{{ __('mutual.updated_at') }}</h6>
                            <p class="font-weight-bold mb-0 text-muted">
                                {{ $assistant->updated_at->format('d/m/Y h:i A') }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- الأزرار في الأسفل -->
                <div class="card-footer d-flex justify-content-center py-4 bg-light">
                    <a href="{{ route('super_admin.client_assistant.edit', $assistant->id) }}"
                        class="btn btn-warning mr-3">
                        <i class="fe fe-edit"></i> {{ __('mutual.edit') }}
                    </a>

                    <a href="{{ route('super_admin.client_assistant.manage') }}" class="btn btn-secondary">
                        <i class="fe fe-list"></i> {{ __('super_admin.manage_clients_assistants') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-super-admin.super-admin-layout-component>
