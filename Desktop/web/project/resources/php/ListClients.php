<?php
    use Illuminate\Support\Facades\DB;

    function getAllClientsOption($currentUserName){
        $clients = DB::table('client')->get();
        $result = "<option >Не выбран</option>";

        foreach ($clients as $client){
            if ($client->FullName == $currentUserName)
                $result .= '<option selected>'.$client->FullName.'</option>'."\n";
            else
                $result .= '<option >'.$client->FullName.'</option>'."\n";

        }

        return $result;
    }
?>
