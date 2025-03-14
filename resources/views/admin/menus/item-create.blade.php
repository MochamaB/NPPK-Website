@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">Add Menu Item to "{{ $menu->name }}"</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.menus.items', $menu) }}" class="btn btn-soft-secondary">
                        <i class="ri-arrow-left-line align-bottom"></i> Back to Menu Items
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.menu-items.store', $menu) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Menu Item Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Item</label>
                                <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                    <option value="">None (Top Level)</option>
                                    @foreach($parentItems as $item)
                                        <option value="{{ $item->id }}" {{ old('parent_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Select a parent item if this is a submenu item</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="card border">
                                <div class="card-header bg-soft-light">
                                    <h5 class="card-title mb-0">Link Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="page_id" class="form-label">Link to Page</label>
                                                <select class="form-select @error('page_id') is-invalid @enderror" id="page_id" name="page_id">
                                                    <option value="">Select a page</option>
                                                    @foreach($pages as $page)
                                                        <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>
                                                            {{ $page->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('page_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="form-text">Select a page to link to</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="url" class="form-label">Custom URL</label>
                                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}">
                                                @error('url')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="form-text">Enter a custom URL (leave empty if linking to a page)</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="section_id" class="form-label">Section ID</label>
                                                <input type="text" class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" value="{{ old('section_id') }}">
                                                @error('section_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="form-text">Enter a section ID to scroll to (e.g., "about-section")</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="target" class="form-label">Link Target</label>
                                                <select class="form-select @error('target') is-invalid @enderror" id="target" name="target">
                                                    <option value="_self" {{ old('target') == '_self' ? 'selected' : '' }}>Same Window</option>
                                                    <option value="_blank" {{ old('target') == '_blank' ? 'selected' : '' }}>New Window</option>
                                                </select>
                                                @error('target')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="card border">
                                <div class="card-header bg-soft-light">
                                    <h5 class="card-title mb-0">Advanced Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="css_class" class="form-label">CSS Class</label>
                                                <input type="text" class="form-control @error('css_class') is-invalid @enderror" id="css_class" name="css_class" value="{{ old('css_class') }}">
                                                @error('css_class')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="form-text">Add custom CSS classes to this menu item</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="order_index" class="form-label">Order</label>
                                                <input type="number" class="form-control @error('order_index') is-invalid @enderror" id="order_index" name="order_index" value="{{ old('order_index') }}">
                                                @error('order_index')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="form-text">Set the display order (leave empty for auto)</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <a href="{{ route('admin.menus.items', $menu) }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Menu Item</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pageSelect = document.getElementById('page_id');
        const urlField = document.getElementById('url');
        
        // Toggle fields based on page selection
        if (pageSelect && urlField) {
            pageSelect.addEventListener('change', function() {
                if (this.value) {
                    urlField.disabled = true;
                    urlField.parentElement.classList.add('opacity-50');
                } else {
                    urlField.disabled = false;
                    urlField.parentElement.classList.remove('opacity-50');
                }
            });
            
            // Initial state
            if (pageSelect.value) {
                urlField.disabled = true;
                urlField.parentElement.classList.add('opacity-50');
            }
        }
    });
</script>
@endpush
