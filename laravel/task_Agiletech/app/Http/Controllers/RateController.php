<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
     /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/getrates",
     *     summary="Get a list of getrateses",
     *     tags={"getrates"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function getrates()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://openexchangerates.org/api/currencies.json?prettyprint=false&show_alternative=false&show_inactive=false&app_id=9a74f56bedcb435f93a003444ae6ee57', [
            'headers' => [
                'accept' => 'application/json',
            ],
        ]);

        $rate_array = explode(",", $response->getBody()->getContents());
        $data = array();
        foreach ($rate_array as $item) {
            $item = str_replace('"', '', $item);
            $item = str_replace('{', '', $item);
            $item = explode(":", $item);
            array_push($data, array('state' => $item[0], 'currency' => $item[1]));
        }
        Rate::truncate();

        Rate::insert($data);

        return $data;
    }
}
