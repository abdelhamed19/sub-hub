<x-super-admin.super-admin-layout-component :title="__('super_admin.clients')">

    <x-table-component :title="__('super_admin.clients')" :createRoute="'super_admin.client.create'">

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
                    <th>{{ __('mutual.name') }}</th>
                    <th>{{ __('mutual.email') }}</th>
                    <th>{{ __('mutual.phone') }}</th>
                    <th>{{ __('mutual.city') }}</th>
                    <th>{{ __('mutual.business_type') }}</th>
                    <th>{{ __('mutual.status') }}</th>
                    <th>{{ __('mutual.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{ $client->id }}">
                                <label class="custom-control-label" for="{{ $client->id }}"></label>
                            </div>
                        </td>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->city }}</td>
                        <td>{{ $client->business_type }}</td>
                        <td><x-status-component :isActive="$client->is_active" /></td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">{{ __('mutual.edit') }}</a>
                                <a class="dropdown-item" href="#">{{ __('mutual.delete') }}</a>
                                <a class="dropdown-item" href="#">{{ __('mutual.show') }}</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Clients found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </x-table-component>

</x-super-admin.super-admin-layout-component>
