    <div class="row">
        <!-- Striped rows -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">{{ $title }}</h2>
            <div class="card shadow">
                <div class="card-body">
                    <div class="col d-flex justify-content-end align-items-center">
                        <a href="{{ route($createRoute) }}" class="btn btn-primary mr-2">
                            {{ __('mutual.create') }} +
                        </a>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('mutual.action') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                                <a class="dropdown-item" href="#">Export</a>
                                <a class="dropdown-item" href="#">Delete</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="toolbar row mb-3 align-items-center">

                        <!-- Filters (Left) -->
                        <div class="col d-flex flex-wrap align-items-center">
                            <form class="form-inline d-flex flex-wrap align-items-center" method="GET"
                                action="{{ url()->current() }}">

                                <!-- Search Input -->
                                <div class="form-group mb-2 mr-2">
                                    <label for="search" class="sr-only">{{ __('mutual.search') }}</label>
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="{{ __('mutual.search') }}" value="{{ request('search') }}">
                                </div>

                                <!-- Status Select -->
                                {{-- <div class="form-group mb-2 mr-2">
                                    <label for="inlineFormCustomSelectPref"
                                        class="sr-only">{{ __('mutual.status') }}</label>
                                    <select name="is_active" class="custom-select" id="inlineFormCustomSelectPref">
                                        <option value="">{{ __('mutual.status') }}...</option>
                                        <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>
                                            {{ __('mutual.active') }}</option>
                                        <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>
                                            {{ __('mutual.inactive') }}</option>
                                    </select>
                                </div>

                                <!-- Created At From -->
                                <div class="form-group mb-2 mr-2">
                                    <label for="created_at" class="sr-only">From</label>
                                    <input type="date" class="form-control" id="created_at" name="created_at"
                                        value="{{ request('created_at') }}" placeholder="From">
                                </div>

                                <!-- Created At To -->
                                <div class="form-group mb-2 mr-2">
                                    <label for="created_to" class="sr-only">To</label>
                                    <input type="date" class="form-control" id="created_to" name="created_to"
                                        value="{{ request('created_to') }}" placeholder="To">
                                </div> --}}

                                <!-- Submit Button -->
                                <div class="form-group mb-2 mr-2">
                                    <button type="submit" class="btn btn-primary">{{ __('mutual.filter') }}</button>
                                </div>

                                <!-- Reset Button -->
                                @if (request()->hasAny(['search', 'is_active', 'created_from', 'created_to']))
                                    <div class="form-group mb-2">
                                        <a href="{{ url()->current() }}" class="btn btn-secondary">
                                            <i class="fas fa-times"></i> {{ __('mutual.reset') }}
                                        </a>
                                    </div>
                                @endif

                            </form>
                        </div>


                    </div>

                    <!-- table -->
                    {{ $slot }}
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->
