<?php
    use Illuminate\Support\Facades\DB;

    function getAllBrandsOption($currentIdBrand){
        $brands = DB::table('carbrands')->get();
        $result = "<option >Не выбрана</option>";

        foreach ($brands as $brand){
            if ($brand->Id == $currentIdBrand)
                $result .= '<option selected>'.$brand->Brand.'</option>'."\n";
            else
                $result .= '<option >'.$brand->Brand.'</option>'."\n";

        }

        return $result;
    }
?>
