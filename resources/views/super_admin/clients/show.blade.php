<x-super-admin.super-admin-layout-component :title="__('Create New Client')">
    <x-super-admin.flash-message-component />
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.client_details') }}</strong>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">{{ __('mutual.email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{ $client->email }}"
                                    id="inputEmail5">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputName5">{{ __('mutual.name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ $client->name }}"
                                    id="inputName5">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputPhone5">{{ __('mutual.phone') }}</label>
                                <input type="number" name="phone" class="form-control" value="{{ $client->phone }}"
                                    id="inputPhone5">

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLegalName5">{{ __('mutual.legal_name') }}</label>
                                <input type="text" name="legal_name" class="form-control"
                                    value="{{ $client->legal_name }}" id="inputLegalName5">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAlternativePhone5">{{ __('mutual.alternative_phone') }}</label>
                                <input type="number" name="alternative_phone" class="form-control"
                                    value="{{ $client->alternative_phone }}" id="inputAlternativePhone5">

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputAddress5">{{ __('mutual.address') }}</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ $client->address }}" id="inputAddress5">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity5">{{ __('mutual.city') }}</label>
                                <input type="text" name="city" class="form-control" value="{{ $client->city }}"
                                    id="inputCity5">
                                <x-validation-message-component field="city" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCountry5">{{ __('mutual.country') }}</label>
                                <select id="inputCountry5" name="country" class="form-control">
                                    <option selected>{{ __('mutual.choose') }}...</option>
                                    @foreach (Cache::get('countries_list') as $country)
                                        <option value="{{ $country->code }}"
                                            {{ $client->country == $country->code ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPostalCode5">{{ __('mutual.postal_code') }}</label>
                                <input type="number" name="postal_code" class="form-control"
                                    value="{{ $client->postal_code }}" id="inputPostalCode5">

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputWebsite5">{{ __('mutual.website') }}</label>
                                <input type="url" name="website" class="form-control"
                                    value="{{ $client->website }}" id="inputWebsite5">

                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputBusinessType5">{{ __('mutual.business_type') }}</label>
                                <select name="business_type" class="form-control">
                                    <option value="">{{ __('mutual.choose_business_type') }}</option>
                                    @foreach (App\Enums\BusinessType::cases() as $type)
                                        <option value="{{ $type->value }}"
                                            {{ $client->business_type === $type->value ? 'selected' : '' }}>
                                            {{ $type->label() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputIndustry5">{{ __('mutual.industry') }}</label>
                                <select name="industry" class="form-control">
                                    <option value="">{{ __('mutual.choose_industry') }}</option>
                                    @foreach (App\Enums\IndustryType::cases() as $type)
                                        <option value="{{ $type->value }}"
                                            {{ $client->industry === $type->value ? 'selected' : '' }}>
                                            {{ $type->label() }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputStatus">{{ __('mutual.status') }}</label>
                                <select id="inputStatus" name="is_active" class="form-control">
                                    <option selected>{{ __('mutual.choose') }}...</option>
                                    <option value="1" {{ $client->is_active == 1 ? 'selected' : '' }}>
                                        {{ __('mutual.active') }}</option>
                                    <option value="0" {{ $client->is_active == 0 ? 'selected' : '' }}>
                                        {{ __('mutual.inactive') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputTaxId5">{{ __('mutual.tax_id') }}</label>
                                <input type="number" name="tax_id" class="form-control"
                                    value="{{ $client->tax_id }}" required id="inputTaxId5">

                            </div>

                            <div class="form-group col-md-4">
                                <label
                                    for="inputCommercialRegistration5">{{ __('mutual.commercial_registration') }}</label>
                                <input type="number" name="commercial_registration" class="form-control"
                                    value="{{ $client->commercial_registration }}" required
                                    id="inputCommercialRegistration5">

                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEmployeeCount5">{{ __('mutual.employee_count') }}</label>
                                <input type="number" name="employees_count" class="form-control"
                                    value="{{ $client->employees_count }}" required id="inputEmployeeCount5">

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLogo5">{{ __('mutual.logo') }}</label>
                                <input type="file" name="logo"
                                    class="form-control @error('logo') is-invalid @enderror" id="inputLogo5">
                                @if ($client->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="Client Logo"
                                            width="100">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputNotes">{{ __('mutual.notes') }}</label>
                                <textarea class="form-control" name="notes" id="inputNotes" rows="1">{{ $client->notes }}</textarea>

                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('super_admin.client.manage') }}"
                                class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}</a>
                        </div>

                    </form>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->

</x-super-admin.super-admin-layout-component>
