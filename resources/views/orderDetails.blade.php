<table class="table">
    <thead>
        <tr>
            <th scope="col">codeInfo</th>
            <th scope="col">Country</th>
            <th scope="col">code</th>
            <th scope="col">trackingNmber</th>
            <th scope="col">timeZone</th>
            <th scope="col">description</th>
            <th scope="col">location</th>
            <th scope="col">time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $item = [
                '5' => 'Order Created',
                '2' => 'Pick Up Done',
                '3' => 'Received at GPO',
                '9' => 'Assigned to the Driver',
                '4' => 'Out For Delivery',
                '6' => 'Shipment delivered',
                '7' => 'Shipment canceled',
                '8' => 'Shipment failed',
                '19' => 'Pickup failed',
                '17' => 'Returned to Sender',
                '21' => 'Item Stored',
                '27' => 'SEND TO CUSTOMS',
                '28' => 'RETURN FROM CUSTOMS',
                '29' => 'CUSTOMS HELD',
            ];

        @endphp


        @foreach ($order as $key => $value)
            <tr>
                <td>{{ $value->codInfo }}</td>
                <td>{{ $value->country }}</td>
                @foreach ($item as $k => $v)
                    @if ($k == $value->code)
                        <td>{{ $v }}</td>
                    @endif
                @endforeach
                <td>{{ $value->trackingNumber }}</td>
                <td>{{ $value->timeZone }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->location }}</td>
                <td>{{ $value->time }}</td>
                <td><a href="{{ url('user/' . $value->trackingNumber) }}" class="btn btn-info">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
