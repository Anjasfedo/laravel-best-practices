<form method="{{ in_array($method, ['HEAD', 'GET', 'OPTIONS']) ? $method : 'POST' }}" {!! $attributes !!}>

    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if($method != '')
        @method($method)
    @endif

    {!! $slot !!}

</form>
