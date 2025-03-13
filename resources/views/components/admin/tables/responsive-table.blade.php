@props([
    'headers' => [],
    'data' => [],
    'checkable' => false,
    'id' => 'responsive-table-'.uniqid(),
    'tableClass' => 'table align-middle table-nowrap mb-0',
    'theadClass' => 'table-light',
])

<div class="table-responsive">
    <table class="{{ $tableClass }}" {{ $attributes }}>
        <thead class="{{ $theadClass }}">
            <tr>
                @if($checkable)
                <th scope="col" style="width: 42px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="{{ $id }}-check-all">
                        <label class="form-check-label" for="{{ $id }}-check-all"></label>
                    </div>
                </th>
                @endif
                
                @foreach($headers as $header)
                <th scope="col">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
        @if(isset($footer))
        <tfoot class="table-light">
            {{ $footer }}
        </tfoot>
        @endif
    </table>
</div>

@pushOnce('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check all functionality
        const checkAllCheckbox = document.getElementById('{{ $id }}-check-all');
        if (checkAllCheckbox) {
            checkAllCheckbox.addEventListener('change', function() {
                const isChecked = this.checked;
                const tableId = '{{ $id }}';
                const checkboxes = document.querySelectorAll(`input[id^="${tableId}-check-"]`);
                checkboxes.forEach(checkbox => {
                    if (checkbox.id !== `${tableId}-check-all`) {
                        checkbox.checked = isChecked;
                    }
                });
            });
        }
    });
</script>
@endPushOnce
