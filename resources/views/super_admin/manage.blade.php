<x-super-admin.super-admin-layout-component :title="__('super_admin.super_admin')">

    <x-table-component :title="__('super_admin.super_admin')" :createRoute="'super_admin.create'">

        <table class="table table-bordered">
            <thead>
                <tr role="row">
                    <th>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="all">
                            <label class="custom-control-label" for="all"></label>
                        </div>
                    </th>
                    <th>ID</th>
                    <th>{{ __('super_admin.last_login') }}</th>
                    <th>{{ __('mutual.name') }}</th>
                    <th>{{ __('mutual.email') }}</th>
                    <th>{{ __('mutual.role') }}</th>
                    <th>{{ __('mutual.status') }}</th>
                    <th>{{ __('mutual.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($superAdmins as $admin)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{ $admin->id }}">
                                <label class="custom-control-label" for="{{ $admin->id }}"></label>
                            </div>
                        </td>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->last_login_at }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td><x-status-component :isActive="$admin->is_active" /></td>

                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ route('super_admin.edit', $admin->id) }}">{{ __('mutual.edit') }}</a>
                                <a class="dropdown-item text-danger" href="javascript:void(0)"
                                    data-name="{{ $admin->name }}"
                                    data-action="super-admin/{{ $admin->id }}/delete" onclick="confirmDelete(this)">
                                    {{ __('mutual.delete') }}
                                </a>
                                <a class="dropdown-item"
                                    href="{{ route('super_admin.show', $admin->id) }}">{{ __('mutual.show') }}</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Super Admins found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{ $superAdmins->links() }}
    </x-table-component>

</x-super-admin.super-admin-layout-component>
