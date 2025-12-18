<x-super-admin.super-admin-layout-component :title="__('super_admin.show_client_assistant')">
    <x-super-admin.flash-message-component />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.show_new_client_assistant') }}</strong>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">{{ __('mutual.email') }}</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $assistant->email) }}" required id="inputEmail5">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputName5">{{ __('mutual.name') }}</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $assistant->name) }}" id="inputName5">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputStatus">{{ __('mutual.client') }}</label>
                            <select id="inputStatus" name="client_id" class="form-control">
                                <option selected>
                                    {{ $assistant->client->name }} ({{ $assistant->client->legal_name }})
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">{{ __('mutual.role') }}</label>
                            <select id="inputState5" name="role" class="form-control">
                                <option selected>
                                    {{ old('role', $assistant->role) }}
                                </option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputStatus">{{ __('mutual.status') }}</label>
                            <select id="inputStatus" class="form-control">
                                <option value="1"
                                    {{ old('is_active', $assistant->is_active) == 1 ? 'selected' : '' }}>
                                    {{ __('mutual.active') }}</option>
                                <option value="0"
                                    {{ old('is_active', $assistant->is_active) == 0 ? 'selected' : '' }}>
                                    {{ __('mutual.inactive') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputZip">{{ __('mutual.image') }}</label>
                            <input type="file" name="image" class="form-control " id="inputZip5">
                            @if ($assistant->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $assistant->image) }}" alt="Client Assistant Image"
                                        width="100" height="100">
                                </div>
                            @endif

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPhone5">{{ __('mutual.phone') }}</label>
                            <input type="number" name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $assistant->phone) }}" required id="inputPhone5">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('super_admin.client_assistant.manage') }}"
                            class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}
                        </a>

                    </div>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->

</x-super-admin.super-admin-layout-component>
