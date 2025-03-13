@props([
    'id' => null,
    'checkable' => false,
    'checkId' => null,
    'tableId' => null
])

<tr {{ $attributes }}>
    @if($checkable)
    <th scope="row">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="{{ $tableId }}-check-{{ $checkId ?? $id ?? uniqid() }}">
            <label class="form-check-label" for="{{ $tableId }}-check-{{ $checkId ?? $id ?? uniqid() }}"></label>
        </div>
    </th>
    @endif
    
    {{ $slot }}
</tr>
