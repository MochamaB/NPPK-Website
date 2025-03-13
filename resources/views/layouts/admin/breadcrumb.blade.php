@props(['title' => '', 'items' => []])

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $title }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">NPPK</a></li>
                    
                    @foreach($items as $key => $item)
                        @if($loop->last)
                            <li class="breadcrumb-item active">{{ $item['label'] }}</li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ isset($item['route']) ? route($item['route']) : (isset($item['url']) ? $item['url'] : 'javascript: void(0);') }}">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
