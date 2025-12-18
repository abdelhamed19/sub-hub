<x-super-admin.super-admin-layout-component :title="__('super_admin.manage_clients_assistants')">
    <x-super-admin.flash-message-component />
    <x-table-component :title="__('super_admin.clients_assistants')" :createRoute="'super_admin.client_assistant.create'">

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
                    <th>{{ __('mutual.client') }}</th>
                    <th>{{ __('mutual.status') }}</th>
                    <th>{{ __('mutual.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assistants as $assistant)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{ $assistant->id }}">
                                <label class="custom-control-label" for="{{ $assistant->id }}"></label>
                            </div>
                        </td>
                        <td>{{ $assistant->id }}</td>
                        <td>{{ $assistant->name }}</td>
                        <td>{{ $assistant->email }}</td>
                        <td>{{ $assistant->phone }}</td>
                        <td>{{ $assistant->client->name }} ({{ $assistant->client->legal_name }})</td>
                        <td><x-status-component :isActive="$assistant->is_active" /></td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ route('super_admin.client_assistant.edit', $assistant->id) }}">{{ __('mutual.edit') }}</a>
                                <a class="dropdown-item text-danger" href="javascript:void(0)"
                                    data-name="{{ $assistant->name }}"
                                    data-action="super-admin/client/client-assistant/{{ $assistant->id }}/delete"
                                    onclick="confirmDelete(this)">
                                    {{ __('mutual.delete') }}
                                    <a class="dropdown-item"
                                        href="{{ route('super_admin.client_assistant.show', $assistant->id) }}">{{ __('mutual.show') }}</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Assistants found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </x-table-component>

</x-super-admin.super-admin-layout-component>
