@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">Menus</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary btn-sm">
                        <i class="ri-add-line align-bottom"></i> Add Menu
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Items</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($menus as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td><code>{{ $menu->location }}</code></td>
                                    <td>
                                        <span class="badge bg-info">{{ $menu->menu_items_count }}</span>
                                        <a href="{{ route('admin.menus.items', $menu) }}" class="btn btn-sm btn-soft-primary ms-1">
                                            <i class="ri-list-check"></i> Manage Items
                                        </a>
                                    </td>
                                    <td>
                                        @if($menu->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="hstack gap-2">
                                            <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-soft-info">
                                                <i class="ri-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-soft-danger" onclick="return confirm('Are you sure you want to delete this menu?')">
                                                    <i class="ri-delete-bin-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No menus found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
