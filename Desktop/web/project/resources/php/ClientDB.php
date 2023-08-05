<?php

use Illuminate\Support\Facades\DB;

function DetectUpdateOrAddClient($client_id){
    $userId = $client_id;
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $is_update_info = htmlspecialchars(isset($_GET['is_update_info']) ? $_GET['is_update_info'] : "", ENT_QUOTES, 'UTF-8');
        $client_full_name = htmlspecialchars(isset($_GET['client_full_name']) ? (strlen($_GET['client_full_name']) >= 3 ? $_GET['client_full_name'] : $_GET['client_full_name']) : "", ENT_QUOTES, 'UTF-8');
        $client_gender = htmlspecialchars(isset($_GET['client_gender']) ? ($_GET['client_gender'] == 1 ? 0: 1) : 0, ENT_QUOTES, 'UTF-8');
        $client_num_phone = htmlspecialchars(isset($_GET['client_num_phone']) ? $_GET['client_num_phone'] : "", ENT_QUOTES, 'UTF-8');
        $client_address = htmlspecialchars(isset($_GET['client_address']) ? $_GET['client_address'] : "", ENT_QUOTES, 'UTF-8');
    }


    if($is_update_info == "update"){
        if($client_id == 0){
            if($client_full_name != "" && $client_num_phone != ""){
                try{
                    $userId = DB::table('client')->insertGetId(['FullName' => $client_full_name, 'Gender' => $client_gender, 'NumPhone' => $client_num_phone, 'Address' => $client_address]);
                }
                catch(Exception $e){
                }
            }
        }
        else{
            $existingClient = DB::table('client')->where('NumPhone', $client_num_phone)->first();
            if($existingClient){
                DB::table('client')->where('Id', '=', $client_id)->update(['FullName' => $client_full_name, 'Gender' => $client_gender, 'Address' => $client_address]);
            }
            else{
                DB::table('client')->where('Id', '=', $client_id)->update(['FullName' => $client_full_name, 'Gender' => $client_gender, 'NumPhone' => $client_num_phone, 'Address' => $client_address]);
            }
        }
    }

    return $userId;
}
