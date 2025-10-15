@foreach(explode(',',$badges) as $badge)
<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2 mb-2">{{ trim($badge) }}</span>
@endforeach