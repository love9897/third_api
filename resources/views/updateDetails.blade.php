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

            {!! \Session::get('success') !!}

        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">

            {!! \Session::get('error') !!}

        </div>
    @endif
    <div class="container">
        <h1>Update Details</h1>
        <form class="form" action="{{ url('update/' . $trackingNumber) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="destinationCountry">Delivery Zone</label>
                <input type="text" class="form-control" name="delivery_Zone" value="">
            </div>
            <div class="form-group">
                <label for="deliveryStreet">Delivery Street</label>
                <input type="text" class="form-control" name="delivery_Street" value="">
            </div>
            <div class="form-group">
                <label for="deliveryBuildingNo">Delivery Building No</label>
                <input type="text" class="form-control" name="delivery_BuildingNo" value="">
            </div>
            <div class="form-group">
                <label for="deliveryUnitNo">Delivery Unit No</label>
                <input type="text" class="form-control" name="delivery_UnitNo" value="">
            </div>
            <div class="form-group">
                <label for="pickupZone">Pickup Zone</label>
                <input type="text" class="form-control" name="pickup_Zone" value="">
            </div>
            <div class="form-group">
                <label for="pickupStreet">Pickup Street</label>
                <input type="text" class="form-control" name="pickup_Street" value="">
            </div>
            <div class="form-group">
                <label for="pickupBuilding">Pickup Building</label>
                <input type="text" class="form-control" name="pickup_Building" value="">
            </div>
            <div class="form-group">
                <label for="pickupUnitNo">Pickup Unit No</label>
                <input type="text" class="form-control" name="pickup_UnitNo" value="">
            </div>
            <div class="form-group">
                <label for="locationDetails">Location Details</label>
                <input type="text" class="form-control" name="location_Details" value="">
            </div>
            <div class="form-group">
                <label for="destinationCountry">Destination Country</label>
                <input type="text" class="form-control" name="destinationCountry" value="">
            </div>
            <div class="form-group">
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" name="address1" value="">
            </div>
            <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" name="address2" value="">
            </div>
            <div class="form-group">
                <label for="zipCode">Zip Code</label>
                <input type="text" class="form-control" name="zipCode" value="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
{{-- <script src="{{ asset('assets/js/jquery.js') }}"></script> --}}
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

</html>
