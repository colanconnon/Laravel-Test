<input @foreach ( $options as $key => $val )
    {{ $key }}="{{$val}}"
@endforeach name="{{$name}}" value="{{$value}}"  />