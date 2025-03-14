@extends('layouts.admin')

@section('title', 'Manage Pages')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">All Pages</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                        <i class="ri-add-line align-bottom"></i> Add New Page
                    </a>
                </div>
            </div>
            <div class="card-body">
                <x-admin.tables.responsive-table 
                    :headers="['Title', 'Slug', 'Template', 'Status', 'In Menu', 'Actions']"
                    tableClass="table table-striped table-hover align-middle mb-0"
                >
                    @forelse($pages as $page)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        {{ $page->title }}
                                        @if($page->parent)
                                            <div class="text-muted small">
                                                <i class="ri-arrow-right-up-line"></i> {{ $page->parent->title }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->template }}</td>
                            <td>
                                @if($page->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if($page->show_in_menu)
                                    <span class="badge bg-info">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink{{ $page->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $page->id }}">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.pages.edit', $page) }}">
                                                <i class="ri-pencil-line align-bottom me-2 text-muted"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url($page->slug) }}" target="_blank">
                                                <i class="ri-eye-line align-bottom me-2 text-muted"></i> View
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="ri-delete-bin-line align-bottom me-2 text-danger"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No pages found.</td>
                        </tr>
                    @endforelse
                    
                    <x-slot name="footer">
                        <tr>
                            <td colspan="6">
                                <div class="d-flex justify-content-end">
                                    {{ $pages->links() }}
                                </div>
                            </td>
                        </tr>
                    </x-slot>
                </x-admin.tables.responsive-table>
            </div>
        </div>
    </div>
</div>
@endsection
