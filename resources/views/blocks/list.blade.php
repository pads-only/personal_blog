@if ($data['style'] === 'unordered')
    <ul class="list-disc pl-6 mb-4">
        @foreach ($data['items'] as $item)
            <li>{{ $item['content'] }}</li>
        @endforeach
    </ul>
@elseif($data['style'] === 'ordered')
    <ol class="list-decimal pl-6 mb-4">
        @foreach ($data['items'] as $item)
            <li>{{ $item['content'] }}</li>
        @endforeach
    </ol>
@else
    <ul>
    @foreach($data['items'] as $item)
        <li>
            <input type="checkbox" {{ $item['meta']['checked'] ? 'checked' : '' }} disabled>
            <span>{{ $item['content'] }}</span>
        </li>
    @endforeach
</ul>
@endif