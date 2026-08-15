@if ($status == 'Aktif')
    <span class="inline-flex items-center bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
        {{ $status }}
    </span>
@else
    <span class="inline-flex items-center bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
        {{ $status }}
    </span>
@endif