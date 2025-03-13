@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">Edit Menu Item</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.menus.items', $menu) }}" class="btn btn-soft-secondary btn-sm">
                        <i class="ri-arrow-left-line align-bottom"></i> Back to Menu Items
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
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form action="{{ route('admin.menu-items.update', ['menu' => $menu, 'menuItem' => $menuItem]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $menuItem->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Item</label>
                                <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                    <option value="">None (Top Level)</option>
                                    @foreach($parentItems as $item)
                                        @if($item->id != $menuItem->id)
                                            <option value="{{ $item->id }}" {{ old('parent_id', $menuItem->parent_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="page_id" class="form-label">Link to Page</label>
                                <select class="form-select @error('page_id') is-invalid @enderror" id="page_id" name="page_id">
                                    <option value="">No Page</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}" {{ old('page_id', $menuItem->page_id) == $page->id ? 'selected' : '' }}>
                                            {{ $page->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('page_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="url" class="form-label">Custom URL</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $menuItem->url) }}" placeholder="https://">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Leave empty if linking to a page</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="section_id" class="form-label">Section ID</label>
                                <input type="text" class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" value="{{ old('section_id', $menuItem->section_id) }}">
                                @error('section_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Enter the ID of the section to scroll to (without the # symbol)</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="target" class="form-label">Open In</label>
                                <select class="form-select @error('target') is-invalid @enderror" id="target" name="target">
                                    <option value="_self" {{ old('target', $menuItem->target) == '_self' ? 'selected' : '' }}>Same Window</option>
                                    <option value="_blank" {{ old('target', $menuItem->target) == '_blank' ? 'selected' : '' }}>New Window</option>
                                </select>
                                @error('target')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="css_class" class="form-label">CSS Class</label>
                                <input type="text" class="form-control @error('css_class') is-invalid @enderror" id="css_class" name="css_class" value="{{ old('css_class', $menuItem->css_class) }}">
                                @error('css_class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" {{ old('is_active', $menuItem->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line align-bottom me-1"></i> Update Menu Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Make sure jQuery is loaded first -->
<script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Show/hide URL field based on page selection
        const pageSelect = $('#page_id');
        const urlField = $('#url');
        
        function toggleUrlField() {
            if (pageSelect.val()) {
                urlField.prop('disabled', true);
                urlField.parent().addClass('opacity-50');
            } else {
                urlField.prop('disabled', false);
                urlField.parent().removeClass('opacity-50');
            }
        }
        
        toggleUrlField();
        pageSelect.on('change', toggleUrlField);
    });
</script>
@endpush
