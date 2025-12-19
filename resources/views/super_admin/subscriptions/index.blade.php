<x-super-admin.super-admin-layout-component :title="__('super_admin.manage_plans')">
    <x-super-admin.flash-message-component />

    <x-table-component :title="__('super_admin.subscriptions')" :createRoute="'super_admin.subscription.create'">

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
                    <th>{{ __('mutual.client') }}</th>
                    <th>{{ __('mutual.plan') }}</th>
                    <th>{{ __('mutual.price') }}</th>
                    <th>{{ __('mutual.start_date') }}</th>
                    <th>{{ __('mutual.end_date') }}</th>
                    <th>{{ __('mutual.status') }}</th>
                    <th>{{ __('mutual.action') }}</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($subscriptions as $subscription)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sub_{{ $subscription->id }}">
                                <label class="custom-control-label" for="sub_{{ $subscription->id }}"></label>
                            </div>
                        </td>

                        <td>{{ $subscription->id }}</td>

                        {{-- Client name --}}
                        <td>
                            {{ $subscription->client->name ?? '-' }} ({{ $subscription->client->legal_name ?? '-' }})
                        </td>

                        {{-- Plan name --}}
                        <td>
                            {{ $subscription->plan->name ?? '-' }}
                        </td>

                        {{-- Price --}}
                        <td>
                            {{ $subscription->plan->compare_price == 0 ? $subscription->plan->price : $subscription->plan->compare_price }}
                        </td>

                        {{-- Start date --}}
                        <td>{{ $subscription->start_date }}</td>

                        {{-- End date --}}
                        <td>{{ $subscription->end_date }}</td>

                        {{-- Status --}}
                        <td>
                            <x-status-component :isActive="$subscription->is_active" />
                        </td>

                        {{-- Actions --}}
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ route('super_admin.subscription.edit', $subscription->id) }}">
                                    {{ __('mutual.edit') }}
                                </a>

                                <a class="dropdown-item text-danger" href="javascript:void(0)"
                                    data-name="{{ $subscription->client->legal_name }}"
                                    data-action="super-admin/subscriptions/{{ $subscription->id }}/delete"
                                    onclick="confirmDelete(this)">
                                    {{ __('mutual.delete') }}
                                </a>

                                <a class="dropdown-item"
                                    href="{{ route('super_admin.subscription.show', $subscription->id) }}">
                                    {{ __('mutual.show') }}
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">
                            No Subscriptions found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </x-table-component>
</x-super-admin.super-admin-layout-component>
