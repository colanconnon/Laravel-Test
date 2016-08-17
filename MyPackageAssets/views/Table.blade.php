<table
@foreach ( $options as $key => $value )
    {{ $key }}="{{$value}}"
@endforeach
>
<tr>
    @foreach ( $tblData as $key => $value )
        <td>{{ $key }}</td>
    @endforeach
</tr>

@for ($i = 0; $i < count($tblData[key($tblData)]); $i++ )
    <tr>
        @foreach ( $tblData as $key => $value )
            @unless(empty($tblData[$key][$i]))
                <td>{{ $tblData[$key][$i] }}</td>
            @endunless
        @endforeach
    </tr>
    @endfor

    </table>