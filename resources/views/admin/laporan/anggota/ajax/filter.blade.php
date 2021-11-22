@foreach ($filter as $name => $value)
    <tr>
        <th style="width: 20%">{{ $name }}</th>
        <th>: {{ $value }}</th>
    </tr>
@endforeach