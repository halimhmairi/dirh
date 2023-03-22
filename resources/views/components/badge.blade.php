@foreach(explode(',',$badges) as $badge)
<span class="badge badge-info">{{ $badge }}</span>
@endforeach