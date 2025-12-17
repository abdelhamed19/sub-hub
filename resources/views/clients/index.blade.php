<x-super-admin.super-admin-layout-component :title="__('Welcome Super Admin')">
    <div class="text-center mb-5">
        <h1>Welcome, {{ auth()->guard('client')->user()->name }}!</h1>
        <p class="text-muted">This is your Super Admin Dashboard</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Assistants</h5>
                    <p class="card-text display-4">{{ \App\Models\ClientAssistant::count() }}</p>
                    <a href="" class="btn btn-primary btn-sm">Manage Assistants</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tenants</h5>
                    <p class="card-text display-4">{{ \App\Models\User::count() }}</p>
                    <a href="" class="btn btn-primary btn-sm">Manage Users</a>
                </div>
            </div>
        </div>
    </div>

</x-super-admin.super-admin-layout-component>
