<x-super-admin.super-admin-layout-component :title="__('Create New Super Admin')">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ __('super_admin.create_new_super_admin') }}</strong>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">{{ __('mutual.email') }}</label>
                                <input type="email" class="form-control" id="inputEmail5">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName5">{{ __('mutual.name') }}</label>
                                <input type="text" class="form-control" id="inputName5">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">{{ __('mutual.password') }}</label>
                                <input type="password" class="form-control" id="inputPassword5">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">{{ __('mutual.role') }}</label>
                                <select id="inputState5" class="form-control">
                                    <option selected>{{ __('mutual.choose') }}...</option>
                                    @forelse (App\Enums\SuperAdminRole::cases() as $status)
                                        <option value="{{ $status->value }}">{{ $status->name }}</option>
                                    @empty
                                        <option>No Status Found</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputStatus">{{ __('mutual.status') }}</label>
                                <select id="inputStatus" class="form-control">
                                    <option selected>{{ __('mutual.choose') }}...</option>
                                    <option value="1">{{ __('mutual.active') }}</option>
                                    <option value="0">{{ __('mutual.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputZip">Image</label>
                                <input type="file" class="form-control" id="inputZip5">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4" >
                            <a href="{{ route('super_admin.manage') }}" class="btn btn-secondary mr-3">{{ __('mutual.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('mutual.create') }}</button>
                        </div>
                    </form>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->

</x-super-admin.super-admin-layout-component>
