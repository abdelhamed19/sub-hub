<x-super-admin.super-admin-layout-component :title="__('super_admin.add_new_subscription')">
    <x-super-admin.flash-message-component />
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.add_new_subscription') }}</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('super_admin.subscription.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputClient">{{ __('mutual.client') }}</label>
                                <select id="inputClient" name="client_id" required
                                    class="form-control inputClient @error('client_id') is-invalid @enderror">
                                    <option value="">{{ __('mutual.choose') }}...</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                            {{ $client->name }} ({{ $client->legal_name }})
                                        </option>
                                    @endforeach
                                </select>

                                <x-validation-message-component field="client_id" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPlan">{{ __('mutual.plan') }}</label>
                                <select id="inputPlan" name="plan_id" required
                                    class="form-control inputPlan @error('plan_id') is-invalid @enderror">
                                    <option value="">{{ __('mutual.choose') }}...</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}"
                                            {{ old('plan_id') == $plan->id ? 'selected' : '' }}>
                                            {{ $plan->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <x-validation-message-component field="plan_id" />
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputStartDate">{{ __('mutual.start_date') }}</label>
                                <input type="date" name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date') }}" required id="inputStartDate">
                                <x-validation-message-component field="start_date" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputName5">{{ __('mutual.end_date') }}</label>
                                <input type="date" name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date') }}" required id="inputName5">
                                <x-validation-message-component field="end_date" />
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputStatus">{{ __('mutual.status') }}</label>
                            <select id="inputStatus" name="is_active" required
                                class="form-control @error('is_active') is-invalid @enderror">
                                <option selected>{{ __('mutual.choose') }}...</option>
                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>
                                    {{ __('mutual.active') }}</option>
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>
                                    {{ __('mutual.inactive') }}</option>
                            </select>
                            <x-validation-message-component field="is_active" />
                        </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ route('super_admin.subscription.manage') }}"
                        class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('mutual.create') }}</button>
                </div>
                </form>
            </div> <!-- /. card-body -->
        </div> <!-- /. card -->
    </div> <!-- /. col -->
    </div> <!-- /. end-section -->


</x-super-admin.super-admin-layout-component>

<script>
    $(document).ready(function() {
        $('#inputClient').select2({
            placeholder: "{{ __('mutual.choose') }}...",
            allowClear: true,
            width: '100%',
            'theme': 'bootstrap4'
        });
        $('#inputPlan').select2({
            placeholder: "{{ __('mutual.choose') }}...",
            allowClear: true,
            width: '100%',
            'theme': 'bootstrap4'
        });
    });
</script>
