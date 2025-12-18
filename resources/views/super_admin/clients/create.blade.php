<x-super-admin.super-admin-layout-component :title="__('Create New Client')">
    <x-super-admin.flash-message-component />
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Form row</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('super_admin.client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">{{ __('mutual.email') }}</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required id="inputEmail5">
                                <x-validation-message-component field="email" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputName5">{{ __('mutual.name') }}</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required id="inputName5">
                                <x-validation-message-component field="name" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputPhone5">{{ __('mutual.phone') }}</label>
                                <input type="number" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" required id="inputPhone5">
                                <x-validation-message-component field="phone" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLegalName5">{{ __('mutual.legal_name') }}</label>
                                <input type="text" name="legal_name"
                                    class="form-control @error('legal_name') is-invalid @enderror"
                                    value="{{ old('legal_name') }}" required id="inputLegalName5">
                                <x-validation-message-component field="legal_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAlternativePhone5">{{ __('mutual.alternative_phone') }}</label>
                                <input type="number" name="alternative_phone"
                                    class="form-control @error('alternative_phone') is-invalid @enderror"
                                    value="{{ old('alternative_phone') }}" required id="inputAlternativePhone5">
                                <x-validation-message-component field="alternative_phone" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputAddress5">{{ __('mutual.address') }}</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ old('address') }}" required id="inputAddress5">
                                <x-validation-message-component field="address" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity5">{{ __('mutual.city') }}</label>
                                <input type="text" name="city"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city') }}" required id="inputCity5">
                                <x-validation-message-component field="city" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCountry5">{{ __('mutual.country') }}</label>
                                <select id="inputCountry5" name="country" required
                                    class="form-control @error('country') is-invalid @enderror">
                                    <option selected>{{ __('mutual.choose') }}...</option>
                                    @foreach (Cache::get('countries_list') as $country)
                                        <option value="{{ $country->code }}"
                                            {{ old('country') == $country->code ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-message-component field="country" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPostalCode5">{{ __('mutual.postal_code') }}</label>
                                <input type="number" name="postal_code"
                                    class="form-control @error('postal_code') is-invalid @enderror"
                                    value="{{ old('postal_code') }}" required id="inputPostalCode5">
                                <x-validation-message-component field="postal_code" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputWebsite5">{{ __('mutual.website') }}</label>
                                <input type="url" name="website"
                                    class="form-control @error('website') is-invalid @enderror"
                                    value="{{ old('website') }}" required id="inputWebsite5">
                                <x-validation-message-component field="website" />
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputBusinessType5">{{ __('mutual.business_type') }}</label>
                                <select name="business_type" class="form-control">
                                    <option value="">{{ __('mutual.choose_business_type') }}</option>
                                    @foreach (App\Enums\BusinessType::cases() as $type)
                                        <option value="{{ $type->value }}"
                                            {{ old('business_type') === $type->value ? 'selected' : '' }}>
                                            {{ $type->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-message-component field="business_type" />
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputIndustry5">{{ __('mutual.industry') }}</label>
                                <select name="industry" class="form-control">
                                    <option value="">{{ __('mutual.choose_industry') }}</option>
                                    @foreach (App\Enums\IndustryType::cases() as $type)
                                        <option value="{{ $type->value }}"
                                            {{ old('industry') === $type->value ? 'selected' : '' }}>
                                            {{ $type->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-message-component field="industry" />
                            </div>
                            <div class="form-group col-md-3">
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
                            <div class="form-group col-md-4">
                                <label for="inputTaxId5">{{ __('mutual.tax_id') }}</label>
                                <input type="number" name="tax_id"
                                    class="form-control @error('tax_id') is-invalid @enderror"
                                    value="{{ old('tax_id') }}" required id="inputTaxId5">
                                <x-validation-message-component field="tax_id" />
                            </div>

                            <div class="form-group col-md-4">
                                <label
                                    for="inputCommercialRegistration5">{{ __('mutual.commercial_registration') }}</label>
                                <input type="number" name="commercial_registration"
                                    class="form-control @error('commercial_registration') is-invalid @enderror"
                                    value="{{ old('commercial_registration') }}" required
                                    id="inputCommercialRegistration5">
                                <x-validation-message-component field="commercial_registration" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEmployeeCount5">{{ __('mutual.employee_count') }}</label>
                                <input type="number" name="employees_count"
                                    class="form-control @error('employees_count') is-invalid @enderror"
                                    value="{{ old('employees_count') }}" required id="inputEmployeeCount5">
                                <x-validation-message-component field="employees_count" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLogo5">{{ __('mutual.logo') }}</label>
                                <input type="file" name="logo"
                                    class="form-control @error('logo') is-invalid @enderror" id="inputLogo5">
                                <x-validation-message-component field="logo" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputNotes">{{ __('mutual.notes') }}</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="inputNotes" rows="1">{{ old('notes') }}</textarea>
                                <x-validation-message-component field="notes" />
                            </div>
                        </div>


                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('super_admin.client.manage') }}"
                                class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('mutual.create') }}</button>
                        </div>

                    </form>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->

</x-super-admin.super-admin-layout-component>
