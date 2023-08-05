<?php
    use Illuminate\Support\Facades\DB;

    function getAllModelsOption($currentIdModel){
        $models = DB::table('carmodel')->get();
        $result = "<option >Не выбрана</option>";

        foreach ($models as $model){
            if ($model->Id == $currentIdModel)
                $result .= '<option selected>'.$model->Model.'</option>'."\n";
            else
                $result .= '<option >'.$model->Model.'</option>'."\n";

        }

        return $result;
    }
?>
