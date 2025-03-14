@extends('layouts.admin')

@section('title', 'Manage Menu Items')

@push('styles')
<link href="{{ asset('admin/assets/css/menu-manager.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">Manage "{{ $menu->name }}" Menu Items</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-soft-secondary">
                        <i class="ri-arrow-left-line align-bottom"></i> Back to Menus
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Menu Items List -->
                    <div class="col-lg-8">
                        <div class="card border">
                            <div class="card-header bg-soft-light">
                                <h5 class="card-title mb-0">Menu Structure</h5>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-soft-primary me-1" id="expand-all">
                                        <i class="fas fa-plus align-middle me-1"></i> Expand All
                                    </button>
                                    <button type="button" class="btn btn-soft-primary me-1" id="collapse-all">
                                        <i class="fas fa-minus align-middle me-1"></i> Collapse All
                                    </button>
                                    <button type="button" class="btn btn-primary" id="save-menu-order" data-menu-id="{{ $menu->id }}">
                                        <i class="fas fa-save align-middle me-1"></i> Save Order
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info mb-3">
                                    <i class="ri-information-line me-2"></i> Drag and drop items to rearrange. Click the <i class="ri-add-line"></i> or <i class="ri-subtract-line"></i> buttons to expand or collapse menu items. Click "Save Order" when you're done.
                                </div>
                                
                                @if(count($menuItems) > 0)
                                <div class="dd" id="menu-items-list">
                                    <ol class="dd-list">
                                        @include('admin.menus.partials.menu-item', ['menuItems' => $menuItems, 'menu' => $menu])
                                    </ol>
                                </div>
                                @else
                                <div class="alert alert-info mb-0">
                                    <p class="mb-0">This menu has no items yet. Use the form on the right to add items.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Add Menu Item Form -->
                    <div class="col-lg-4">
                        <div class="card border">
                            <div class="card-header bg-soft-light">
                                <h5 class="card-title mb-0">Add Menu Item</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.menu-items.store', $menu) }}" method="POST" id="menu-item-form">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="parent_id" class="form-label">Parent Item</label>
                                        <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                            <option value="">None (Top Level)</option>
                                            @foreach($allMenuItems as $item)
                                                <option value="{{ $item->id }}" {{ old('parent_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="page_id" class="form-label">Link to Page</label>
                                        <select class="form-select @error('page_id') is-invalid @enderror" id="page_id" name="page_id">
                                            <option value="">No Page</option>
                                            @foreach($pages as $page)
                                                <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>
                                                    {{ $page->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('page_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">Custom URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}" placeholder="https://">
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Leave empty if linking to a page</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="section_id" class="form-label">Section ID</label>
                                        <input type="text" class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" value="{{ old('section_id') }}">
                                        @error('section_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Enter the ID of the section to scroll to (without the # symbol)</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="target" class="form-label">Open In</label>
                                        <select class="form-select @error('target') is-invalid @enderror" id="target" name="target">
                                            <option value="_self" {{ old('target') == '_self' ? 'selected' : '' }}>Same Window</option>
                                            <option value="_blank" {{ old('target') == '_blank' ? 'selected' : '' }}>New Window</option>
                                        </select>
                                        @error('target')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="css_class" class="form-label">CSS Class</label>
                                        <input type="text" class="form-control @error('css_class') is-invalid @enderror" id="css_class" name="css_class" value="{{ old('css_class') }}">
                                        @error('css_class')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" checked>
                                            <label class="form-check-label" for="is_active">Active</label>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-add-line align-bottom me-1"></i> Add Menu Item
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Make sure jQuery is loaded first -->

<script src="{{ asset('admin/assets/libs/nestable2/jquery.nestable.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/menu-manager.js') }}"></script>
@endpush
