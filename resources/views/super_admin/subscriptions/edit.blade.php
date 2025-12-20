<x-super-admin.super-admin-layout-component :title="__('super_admin.edit_new_client_assistant')">
    <x-super-admin.flash-message-component />
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.edit_new_client_assistant') }}</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('super_admin.plan.update', $plan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">{{ __('mutual.name') }}</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $plan->name) }}" required id="inputName">
                                <x-validation-message-component field="name" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPrice5">{{ __('mutual.price') }}</label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $plan->price) }}" id="inputName5">
                                <x-validation-message-component field="price" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputStatus">{{ __('mutual.status') }}</label>
                                <select id="inputStatus" name="is_active"
                                    class="form-control @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('is_active', $plan->is_active) == 1 ? 'selected' : '' }}>
                                        {{ __('mutual.active') }}</option>
                                    <option value="0"
                                        {{ old('is_active', $plan->is_active) == 0 ? 'selected' : '' }}>
                                        {{ __('mutual.inactive') }}</option>
                                </select>
                                <x-validation-message-component field="is_active" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputName5">{{ __('mutual.compare_price') }}</label>
                                <input type="number" name="compare_price"
                                    class="form-control @error('compare_price') is-invalid @enderror"
                                    value="{{ old('compare_price', $plan->compare_price) }}" id="inputName5">
                                <x-validation-message-component field="compare_price" />
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="inputDurationDays5">{{ __('mutual.duration_days') }}</label>
                                <input type="text" name="duration_days"
                                    class="form-control  @error('duration_days') is-invalid @enderror"
                                    value="{{ old('duration_days', $plan->duration_days) }}" id="inputDurationDays5">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPhone5">{{ __('mutual.description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description', $plan->description) }}</textarea>
                                <x-validation-message-component field="description" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>{{ __('mutual.features') }}</label>

                                <div class="features-list mt-2"
                                    style="display: flex; flex-direction: column; gap: 8px;">
                                    @forelse ($plan->features as $index => $feature)
                                        <div class="feature-item d-flex align-items-center p-2 bg-light rounded border">
                                            <i class="fe fe-check-circle text-success mr-3"
                                                style="font-size: 18px;"></i>
                                            <input type="text" name="features[]"
                                                value="{{ old('features.' . $index, $feature) }}"
                                                class="form-control border-0 bg-transparent flex-grow-1"
                                                placeholder="اكتب مميزة هنا..."
                                                style="outline: none; box-shadow: none;">
                                            <button type="button" class="btn btn-sm btn-danger ml-2 remove-feature">
                                                <i class="fe fe-trash-2"></i>
                                            </button>
                                        </div>
                                    @empty
                                        <!-- لو مفيش مميزات خالص، نبدأ بحقل واحد فاضي -->
                                        <div class="feature-item d-flex align-items-center p-2 bg-light rounded border">
                                            <i class="fe fe-check-circle text-success mr-3"
                                                style="font-size: 18px;"></i>
                                            <input type="text" name="features[]"
                                                class="form-control border-0 bg-transparent flex-grow-1"
                                                placeholder="اكتب مميزة هنا..."
                                                style="outline: none; box-shadow: none;">
                                            <button type="button" class="btn btn-sm btn-danger ml-2 remove-feature">
                                                <i class="fe fe-trash-2"></i>
                                            </button>
                                        </div>
                                    @endforelse
                                </div>

                                <!-- زر إضافة مميزة جديدة -->
                                <button type="button" class="btn btn-outline-primary btn-sm mt-3 add-feature">
                                    <i class="fe fe-plus"></i> {{ __('mutual.add_feature') }}
                                </button>

                                <small class="form-text text-muted mt-2">
                                    يمكنك تعديل أو حذف أو إضافة مميزات جديدة.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('super_admin.plan.manage') }}"
                                class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">{{ __('mutual.create') }}</button>
                        </div>
                    </form>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->

</x-super-admin.super-admin-layout-component>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featuresList = document.querySelector('.features-list');
        const addButton = document.querySelector('.add-feature');

        // زر إضافة مميزة جديدة
        addButton.addEventListener('click', function() {
            const newItem = document.createElement('div');
            newItem.className = 'feature-item d-flex align-items-center p-2 bg-light rounded border';
            newItem.innerHTML = `
                <i class="fe fe-check-circle text-success mr-3" style="font-size: 18px;"></i>
                <input type="text"
                       name="features[]"
                       class="form-control border-0 bg-transparent flex-grow-1"
                       placeholder="اكتب مميزة هنا..."
                       style="outline: none; box-shadow: none;">
                <button type="button" class="btn btn-sm btn-danger ml-2 remove-feature">
                    <i class="fe fe-trash-2"></i>
                </button>
            `;
            featuresList.appendChild(newItem);
        });

        // حذف مميزة (delegation عشان يشتغل على العناصر الجديدة)
        featuresList.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
                e.target.closest('.feature-item').remove();
            }
        });
    });
</script>
