{{-- Display success message --}}
@if(session('success'))
    <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-check-double-line me-3 align-middle"></i> <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Display error message --}}
@if(session('error'))
    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-error-warning-line me-3 align-middle"></i> <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Display warning message --}}
@if(session('warning'))
    <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-alert-line me-3 align-middle"></i> <strong>Warning!</strong> {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Display info message --}}
@if(session('info'))
    <div class="alert alert-info alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-information-line me-3 align-middle"></i> <strong>Info!</strong> {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Display validation errors --}}
@if($errors->any())
    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-error-warning-line me-3 align-middle"></i> <strong>Validation Error!</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
