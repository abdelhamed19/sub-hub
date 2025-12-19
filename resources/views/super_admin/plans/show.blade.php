<x-super-admin.super-admin-layout-component :title="__('super_admin.show_plan')">
    <x-super-admin.flash-message-component />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.show_plan') }}</strong>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">{{ __('mutual.name') }}</label>
                            <input type="name" name="name" class="form-control"
                                value="{{ old('name', $plan->name) }}" required id="inputEmail5">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputName5">{{ __('mutual.price') }}</label>
                            <input type="text" name="price" class="form-control"
                                value="{{ old('price', $plan->price) }}" id="inputName5">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputStatus">{{ __('mutual.status') }}</label>
                            <select id="inputStatus" class="form-control">
                                <option value="1" {{ old('is_active', $plan->is_active) == 1 ? 'selected' : '' }}>
                                    {{ __('mutual.active') }}</option>
                                <option value="0" {{ old('is_active', $plan->is_active) == 0 ? 'selected' : '' }}>
                                    {{ __('mutual.inactive') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputName5">{{ __('mutual.compare_price') }}</label>
                            <input type="text" name="compare_price" class="form-control"
                                value="{{ old('compare_price', $plan->compare_price) }}" id="inputName5">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputDurationDays5">{{ __('mutual.duration_days') }}</label>
                            <input type="text" name="duration_days" class="form-control"
                                value="{{ old('duration_days', $plan->duration_days) }}" id="inputDurationDays5">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPhone5">{{ __('mutual.description') }}</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $plan->description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPhone5">{{ __('mutual.features') }}</label>

                            <div class="features-list mt-2" style="display: flex; flex-direction: column; gap: 8px;">
                                @forelse ($plan->features as $feature)
                                    <div class="feature-item d-flex align-items-center p-2 bg-light rounded border">
                                        <i class="fe fe-check-circle text-success mr-3" style="font-size: 18px;"></i>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @empty
                                    <div class="text-muted p-3 text-center">
                                        {{ __('mutual.no_features_yet') }}
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('super_admin.plan.manage') }}"
                            class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}
                        </a>

                    </div>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->

</x-super-admin.super-admin-layout-component>
