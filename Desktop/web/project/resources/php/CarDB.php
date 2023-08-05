<?php

use Illuminate\Support\Facades\DB;

function DetectUpdateOrAddCar($id){
    $client_id = $id;
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $is_update_info = htmlspecialchars(isset($_GET['is_update_info']) ? $_GET['is_update_info'] : "", ENT_QUOTES, 'UTF-8');

        $car_client_name = htmlspecialchars(isset($_GET['car_client_name']) ? $_GET['car_client_name'] : "", ENT_QUOTES, 'UTF-8');
        $car_brand = htmlspecialchars(isset($_GET['car_brand']) ? $_GET['car_brand'] : 0, ENT_QUOTES, 'UTF-8');
        $car_model = htmlspecialchars(isset($_GET['car_model']) ? $_GET['car_model'] : 0, ENT_QUOTES, 'UTF-8');
        $car_state_num_rf = htmlspecialchars(isset($_GET['car_state_num_rf']) ? $_GET['car_state_num_rf'] : "", ENT_QUOTES, 'UTF-8');
        $car_color = htmlspecialchars(isset($_GET['car_color']) ? $_GET['car_color'] : "#FFFFFF", ENT_QUOTES, 'UTF-8');
        $car_is_parking = htmlspecialchars(isset($_GET['car_is_parking']) ? ($_GET['car_is_parking'] == 'on' ? 1 : 0 ) :  0, ENT_QUOTES, 'UTF-8');

        $car_id = htmlspecialchars(isset($_GET['car_id']) ? $_GET['car_id'] : 0, ENT_QUOTES, 'UTF-8');
    }

    if($is_update_info == "update_car"){

        $client_id = DB::table('client')->where('FullName', '=', $car_client_name)->first()->Id;
        $brand_id = DB::table('carbrands')->where('Brand', '=', $car_brand)->first()->Id;
        $model_id = DB::table('carmodel')->where('Model', '=', $car_model)->first()->Id;

        if($car_id == 0){
            if($car_client_name != "" && $car_brand != 0 && $car_model != 0 && strlen($car_state_num_rf) >= 8 && strlen($car_state_num_rf) <= 9){
                try{
                    DB::table('car')->insert([
                        'IdClient' => $client_id,
                        'IdBrand' => $brand_id,
                        'IdModel' => $model_id,
                        'Color' => $car_color,
                        'StateNumRF' => $car_state_num_rf,
                        'IsParking' => $car_is_parking
                    ]);
                }
                catch(Exception $e){
                }
            }
        }
        else{
            if($car_client_name != "" && $car_brand != 0 && $car_model != 0 && strlen($car_state_num_rf) >= 8 && strlen($car_state_num_rf) <= 9){
                $existingClient = DB::table('car')->where('StateNumRF', $car_state_num_rf)->first();
                if($existingClient){
                    DB::table('car')->where('Id', '=', $car_id)->update([
                        'IdClient' => $client_id,
                        'IdBrand' => $brand_id,
                        'IdModel' => $model_id,
                        'Color' => $car_color,
                        'IsParking' => $car_is_parking
                    ]);
                }
                else{
                    DB::table('car')->where('Id', '=', $car_id)->update([
                        'IdClient' => $client_id,
                        'IdBrand' => $brand_id,
                        'IdModel' => $model_id,
                        'Color' => $car_color,
                        'StateNumRF' => $car_state_num_rf,
                        'IsParking' => $car_is_parking
                    ]);
                }
            }
        }
    }

    return $client_id;
}

