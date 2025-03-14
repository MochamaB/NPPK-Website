@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">Create Menu</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-soft-secondary">
                        <i class="ri-arrow-left-line align-bottom"></i> Back to Menus
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

                <form action="{{ route('admin.menus.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Menu Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Enter a descriptive name for this menu (e.g. "Main Navigation", "Footer Menu")</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="location" class="form-label">Menu Location <span class="text-danger">*</span></label>
                                <select class="form-select @error('location') is-invalid @enderror" id="location" name="location" required>
                                    <option value="" disabled selected>Select a location</option>
                                    <option value="main" {{ old('location') == 'main' ? 'selected' : '' }}>Main Menu</option>
                                    <option value="footer" {{ old('location') == 'footer' ? 'selected' : '' }}>Footer Menu</option>
                                    <option value="sidemenu" {{ old('location') == 'sidemenu' ? 'selected' : '' }}>Side Menu</option>
                                </select>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Select where this menu will be displayed on the site</div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <a href="{{ route('admin.menus.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Menu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
