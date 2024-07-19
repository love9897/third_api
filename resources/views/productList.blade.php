<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <style>
        .modal-content {
            width: 900px;
        }
    </style>
</head>

<body>
    <div class="container table-data">
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
    </div>
</body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    var base_url = '{{ url('') }}';
</script>

<script src="{{ asset('assets/js/scripts.js') }}"></script>

</html>
