<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Currency</th>
            <th scope="col">TrackingNumber</th>
            <th scope="col">codeAmount</th>
            <th scope="col">Delivery_Zone</th>
            <th scope="col">Delivery_street</th>
            <th scope="col">Delivery_BuildingNo</th>
            <th scope="col">Delivery_UnitNo</th>
            <th scope="col">Pickup_Zone</th>
            <th scope="col">Pickup_Street</th>
            <th scope="col">Pickup_Building</th>
            <th scope="col">Pickup_UnitNo</th>
            <th scope="col">location_Details</th>
            <th scope="col">Destination_Country</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($product as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->currency }}</td>
                <td>{{ $value->trackingNumber }}</td>
                <td>{{ $value->codeAmount }}</td>
                <td>{{ $value->delivery_Zone }}</td>
                <td>{{ $value->delivery_Street }}</td>
                <td>{{ $value->delivery_BuildingNo }}</td>
                <td>{{ $value->delivery_UnitNo }}</td>
                <td>{{ $value->pickup_Zone }}</td>
                <td>{{ $value->pickup_Street }}</td>
                <td>{{ $value->pickup_Building }}</td>
                <td>{{ $value->pickup_UnitNo }}</td>
                <td>{{ $value->location_Details }}</td>
                <td>{{ $value->destinationCountry }}</td>
                <td><button data-trackingnumber="{{ $value->trackingNumber }}" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" class="btn btn-info status">
                        Status
                    </button>
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
{{ $product->links() }}
