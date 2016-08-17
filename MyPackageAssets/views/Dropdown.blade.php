<select>
    @foreach ( $selectOptions as $key => $value )
        @if($selected == $key)
            <option selected value="{{$key}}">{{$value}}</option>
        @else
            <option value="{{ $key }}"> {{$value}} </option>
        @endif
    @endforeach
</select>