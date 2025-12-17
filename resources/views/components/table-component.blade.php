    <div class="row">
        <!-- Striped rows -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">{{ $title }}</h2>
            <div class="card shadow">
                <div class="card-body">
                    <div class="toolbar row mb-3">
                        <div class="col">
                            <form class="form-inline">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="search" class="sr-only">{{ __('mutual.search') }}</label>
                                        <form action="" method="GET">
                                            <input type="text" class="form-control" style="width: 200px"
                                                id="search" name="search" placeholder="{{ __('mutual.search') }}">
                                        </form>
                                        @if (request('search'))
                                            <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-times"></i> {{ __('mutual.reset') }}
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group col-auto ml-3">
                                        <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref">Status</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">Processing</option>
                                            <option value="2">Success</option>
                                            <option value="3">Pending</option>
                                            <option value="3">Hold</option>
                                        </select>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                <a href="{{ route($createRoute) }}" role="button"
                                    class="btn btn-primary float-right ml-3" type="button">{{ __('mutual.create') }}
                                    +</a>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('mutual.action') }} </button>
                                <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                                    <a class="dropdown-item" href="#">Export</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table -->
                    {{ $slot }}
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->
