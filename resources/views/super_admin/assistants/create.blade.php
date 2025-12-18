<x-super-admin.super-admin-layout-component :title="__('super_admin.create_new_client_assistant')">
    <x-super-admin.flash-message-component />
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.create_new_client_assistant') }}</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('super_admin.client_assistant.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{ __('mutual.email') }}</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required id="inputEmail5">
                                <x-validation-message-component field="email" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputName5">{{ __('mutual.name') }}</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required id="inputName5">
                                <x-validation-message-component field="name" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">{{ __('mutual.password') }}</label>
                                <div class="input-group">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        id="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text password-toggle"
                                            onclick="togglePassword('password', this)">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <x-validation-message-component field="password" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPasswordConfirmation">{{ __('mutual.password_confirmation') }}</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        required id="password_confirmation">
                                    <div class="input-group-append">
                                        <span class="input-group-text password-toggle"
                                            onclick="togglePassword('password_confirmation', this)">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <x-validation-message-component field="password_confirmation" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
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
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">{{ __('mutual.role') }}</label>
                                <select id="inputState5" name="role" required
                                    class="form-control @error('role') is-invalid @enderror">
                                    <option selected>{{ __('mutual.choose') }}...</option>
                                    @forelse (App\Enums\ClientAssistantRole::cases() as $status)
                                        <option value="{{ $status->value }}"
                                            {{ old('role') == $status->value ? 'selected' : '' }}>{{ $status->name }}
                                        </option>
                                    @empty
                                        <option>No Status Found</option>
                                    @endforelse
                                </select>
                                <x-validation-message-component field="role" />
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

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputZip">{{ __('mutual.image') }}</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="inputZip5">
                                <x-validation-message-component field="image" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone5">{{ __('mutual.phone') }}</label>
                                <input type="number" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" required id="inputPhone5">
                                <x-validation-message-component field="phone" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('super_admin.client_assistant.manage') }}"
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
    });
</script>
