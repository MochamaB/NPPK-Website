@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Create Menu</h4>
            </div>
            <div class="card-body">
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
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Enter a unique identifier for this menu (e.g. "main", "footer")</div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" checked>
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
