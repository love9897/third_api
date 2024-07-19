<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class Authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('productList', ['product' => $product]);
    }


    public function fetchData(Request $request)
    {
        $url = 'https://web.qatarpost.qa/PartnerAPIAWB/get/token';

        $token = getAuthToken($url);

        $partner_token = getPartnerToken($token);

        if ($token && $partner_token) {

            $data = $request->all();

            $data['isPrepaid'] = filter_var($data['isPrepaid'], FILTER_VALIDATE_BOOLEAN);
            $data['isTracking'] = filter_var($data['isTracking'], FILTER_VALIDATE_BOOLEAN);
            $data['isMultiPacket'] = filter_var($data['isMultiPacket'], FILTER_VALIDATE_BOOLEAN);
            $data['isAirwayBillRequired'] = filter_var($data['isAirwayBillRequired'], FILTER_VALIDATE_BOOLEAN);

            $curl = curl_init();

            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://web.qatarpost.qa/PartnerAPIAWB/partner/order/createwithawb',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($data),
                    CURLOPT_HTTPHEADER => array(
                        'Partner-Token: ' . $partner_token,
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token
                    ),
                )
            );

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response);

            if ($response->isSuccessful) {

                Product::create([
                    'currency' => $response->data->currency,
                    'trackingNumber' => $response->data->trackingNumber,
                    'codeAmount' => $response->data->codAmount,
                    'base64' => $response->data->base64
                ]);

                return response()->json(['is_sucess' => true]);

            } else {

                return response()->json(['is_sucess' => false]);
            }

        } else {
            return response()->json(['is_sucess' => false]);
        }

    }




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tracking = $request->tracking;

        $url = 'https://web.qatarpost.qa/PartnerAPIAWB/get/token';

        $token = getAuthToken($url);

        $partner_token = getPartnerToken($token);

        if ($tracking) {

            $curl = curl_init();

            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://web.qatarpost.qa/PartnerAPIAWB/partner/order/' . $tracking,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Partner-Token: ' . $partner_token,
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token
                    ),
                )
            );

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response);

            if ($data->trackingList) {

                $html = view('orderDetails', ['order' => $data->trackingList])->render();

                return response()->json(['is_success' => true, 'html' => $html]);

            } else {

                return response()->json(['is_success' => false]);
            }

        } else {
            return response()->json(['is_success' => false]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('updateDetails', ['trackingNumber' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {

    }
    public function updateData(Request $request, $id)
    {


        $url = env('GET_TOKEN');

        $token = getAuthToken($url);

        $partner_token = getPartnerToken($token);


        if ($id) {


            $curl = curl_init();

            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => env('TRACK_ORDER') . $id . '/Update',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'PUT',
                    CURLOPT_POSTFIELDS => json_encode($request->all()),
                    CURLOPT_HTTPHEADER => array(
                        'Partner-Token: ' . $partner_token,
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token
                    ),
                )
            );

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response);

            if ($data->isSuccessful) {
                Product::where('trackingNumber', '=', $id)
                    ->update([
                        'delivery_Zone' => $request->delivery_Zone,
                        'delivery_Street' => $request->delivery_Street,
                        'delivery_BuildingNo' => $request->delivery_BuildingNo,
                        'delivery_UnitNo' => $request->delivery_UnitNo,
                        'pickup_Zone' => $request->pickup_Zone,
                        'pickup_Street' => $request->pickup_Street,
                        'pickup_Building' => $request->pickup_Building,
                        'pickup_UnitNo' => $request->pickup_UnitNo,
                        'location_Details' => $request->location_Details,
                        'destinationCountry' => $request->destinationCountry,
                        'address1' => $request->address1,
                        'address2' => $request->address2,
                        'zipCode' => $request->zipCode
                    ]);

                return back()->with('success', 'Data updated successfully');

            } else {

                return back()->with('error', 'Data not updated');
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
