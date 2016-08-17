<label @foreach ( $options as $key => $val )
    {{ $key }}="{{$val}}"
@endforeach for="{{$labelFor}}"  > {{$text}}</labe>