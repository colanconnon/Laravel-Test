<a @foreach ( $options as $key => $value )
    {{ $key }}="{{$value}}"
@endforeach href="{{$target}}" > {{$text}} </a>