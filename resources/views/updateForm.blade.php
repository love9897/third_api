<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    @if (Session::has('success'))
        <div class="alert alert-success">

            {{ Session::get('success') }}

        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">

            {{ Session::get('error') }}

        </div>
    @endif
    <div class="container">
        <h1>Update Details</h1>
        <form class="form" action="{{ url('update/' . $trackingNumber) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="destinationCountry">Delivery Zone</label>
                <input type="text" class="form-control" name="delivery_Zone" value="{{ $product->delivery_Zone }}">
            </div>
            <div class="form-group">
                <label for="deliveryStreet">Delivery Street</label>
                <input type="text" class="form-control" name="delivery_Street"
                    value="{{ $product->delivery_Street }}">
            </div>
            <div class="form-group">
                <label for="deliveryBuildingNo">Delivery Building No</label>
                <input type="text" class="form-control" name="delivery_BuildingNo"
                    value="{{ $product->delivery_BuildingNo }}">
            </div>
            <div class="form-group">
                <label for="deliveryUnitNo">Delivery Unit No</label>
                <input type="text" class="form-control" name="delivery_UnitNo"
                    value="{{ $product->delivery_UnitNo }}">
            </div>
            <div class="form-group">
                <label for="pickupZone">Pickup Zone</label>
                <input type="text" class="form-control" name="pickup_Zone" value="{{ $product->pickup_Zone }}">
            </div>
            <div class="form-group">
                <label for="pickupStreet">Pickup Street</label>
                <input type="text" class="form-control" name="pickup_Street" value="{{ $product->pickup_Street }}">
            </div>
            <div class="form-group">
                <label for="pickupBuilding">Pickup Building</label>
                <input type="text" class="form-control" name="pickup_Building"
                    value="{{ $product->pickup_Building }}">
            </div>
            <div class="form-group">
                <label for="pickupUnitNo">Pickup Unit No</label>
                <input type="text" class="form-control" name="pickup_UnitNo" value="{{ $product->pickup_UnitNo }}">
            </div>
            <div class="form-group">
                <label for="locationDetails">Location Details</label>
                <input type="text" class="form-control" name="location_Details"
                    value="{{ $product->location_Details }}">
            </div>
            <div class="form-group">
                <label for="destinationCountry">Destination Country</label>
                <input type="text" class="form-control" name="destinationCountry"
                    value="{{ $product->destinationCountry }}">
            </div>
            <div class="form-group">
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" name="address1" value="{{ $product->address1 }}">
            </div>
            <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" name="address2" value="{{ $product->address2 }}">
            </div>
            <div class="form-group">
                <label for="zipCode">Zip Code</label>
                <input type="text" class="form-control" name="zipCode" value="{{ $product->zipCode }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
{{-- <script src="{{ asset('assets/js/jquery.js') }}"></script> --}}
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

</html>
