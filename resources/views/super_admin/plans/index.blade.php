<x-super-admin.super-admin-layout-component :title="__('super_admin.manage_plans')">
    <x-super-admin.flash-message-component />
    <x-table-component :title="__('super_admin.plans')" :createRoute="'super_admin.plan.create'">

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
                    <th>{{ __('mutual.price') }}</th>
                    <th>{{ __('mutual.compare_price') }}</th>
                    <th>{{ __('mutual.duration_days') }}</th>
                    <th>{{ __('mutual.status') }}</th>
                    <th>{{ __('mutual.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plans as $plan)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{ $plan->id }}">
                                <label class="custom-control-label" for="{{ $plan->id }}"></label>
                            </div>
                        </td>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->price }}</td>
                        <td>{{ $plan->compare_price }}</td>
                        <td>{{ $plan->duration_days }}</td>
                        <td><x-status-component :isActive="$plan->is_active" /></td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ route('super_admin.plan.edit', $plan->id) }}">{{ __('mutual.edit') }}</a>
                                <a class="dropdown-item text-danger" href="javascript:void(0)"
                                    data-name="{{ $plan->name }}"
                                    data-action="super-admin/plans/{{ $plan->id }}/delete"
                                    onclick="confirmDelete(this)">
                                    {{ __('mutual.delete') }}
                                    <a class="dropdown-item"
                                        href="{{ route('super_admin.plan.show', $plan->id) }}">{{ __('mutual.show') }}</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Plans found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </x-table-component>

</x-super-admin.super-admin-layout-component>
