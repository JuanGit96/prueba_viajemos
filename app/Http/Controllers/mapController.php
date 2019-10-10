<?php

namespace App\Http\Controllers;

use App\City;
use App\Query;
use Illuminate\Http\Request;

class mapController extends Controller
{
    public function index(Request $request)
    {
        $city = City::findOrFail($request->city);

        $humidity = $this->getHumidityByCity($city);

        #creando registro de consulta
        $query = Query::create([
            "city_id" => $city->id,
            "humidity" => $humidity
        ]);

        return view('map',compact('city','humidity'));
    }

    public function queries()
    {
        $queries = Query::paginate(6);

        return view('queries',compact('queries'));
    }

    public function getHumidityByCity(City $city)
    {
        $latitude = $city->latitude;

        $longitude = $city->longitude;

        $appid = "2c6108e2e979bd61f0daed344cc16a5b";


        $url = "api.openweathermap.org/data/2.5/weather?lat=".$latitude."&lon=".$longitude."&APPID=".$appid;

        $headers = array(
            'Content-Type: application/json',
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        #curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        #dd($result);
        if ($result == FALSE)
            die('Curl failed: ' . curl_error($ch));
        curl_close($ch);

        $response = json_decode($result);

        $humidity = $response->main->humidity;

        return $humidity;
    }
}
