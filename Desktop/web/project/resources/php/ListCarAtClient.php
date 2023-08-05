<?php

use Illuminate\Support\Facades\DB;
    require_once '../resources/php/ListClients.php';
    require_once '../resources/php/ListCarAtClient.php';
    require_once '../resources/php/ListBrands.php';
    require_once '../resources/php/ListModels.php';

function printCarList($clientId){
    $cars = DB::table('car')->where('IdClient', '=', $clientId)->get();
    $client = DB::table('client')->find($clientId);

    foreach ($cars as $car){
        $isParking =  $car->IsParking == 1 ? "checked" : "";
        $pattern = '<div class="border-top pt-2 pb-2">
        <form>
        <input type="hidden" name="is_update_info" value="update_car">
        <input type="hidden" name="car_id" value="'.$car->Id.'">
        <div class="d-flex">
            <div class="w-100 p-2">
                <label for="inputGender" class="form-label">Клиент*</label>
                <select class="form-select" name="car_client_name" aria-label="Пример выбора по умолчанию">
                    '.getAllClientsOption($client->FullName).'
                  </select>

            </div>

            <div class="w-100 p-2">
                <label for="inputGender" class="form-label">Марка*</label>
                <select class="form-select" name="car_brand" aria-label="Пример выбора по умолчанию">
                    '.getAllBrandsOption($car->IdBrand).'
                  </select>

            </div>

            <div class="w-100 p-2">
                <label for="inputGender" class="form-label">Модель*</label>
                <select class="form-select" name="car_model" aria-label="Пример выбора по умолчанию">
                    '.getAllModelsOption($car->IdModel).'
                  </select>

            </div>
        </div>

        <div class="d-flex">
            <div class="w-100 p-2">
                <label for="inputFullName" class="form-label">Гос Номер РФ*</label>
                <input type="text" placeholder="Пример PP111P999" name="car_state_num_rf" id="inputFullName" value="'.$car->StateNumRF.'" class="form-control" aria-describedby="fullNameHelpBlock">
            </div>

            <div class="w-100 p-2">
                <label for="exampleColorInput" class="form-label">Цвет машины</label>
                <input type="color" class="form-control form-control-color" name="car_color" id="exampleColorInput" value="'.$car->Color.'" title="Choose your color">

            </div>

            <div class="w-100 p-2 d-flex align-items-center">
                <div class="form-check">
                  <input class="form-check-input" name="car_is_parking" type="checkbox" id="flexCheckDefault" '.$isParking.'>
                  <label class="form-check-label" for="flexCheckDefault">
                    Машина на парковке
                  </label>
                </div>

            </div>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>';
    print($pattern);
    }

    $patternEmpty = '<div class="border-top pt-2 pb-2">
    <form action="new">
    <div class="d-flex">
    <input type="hidden" name="is_update_info" value="update_car">
        <div class="w-100 p-2">
            <label for="inputGender" class="form-label">Клиент*</label>
            <select class="form-select" name="car_client_name" aria-label="Пример выбора по умолчанию">
                '.getAllClientsOption("-").'
              </select>

        </div>

        <div class="w-100 p-2">
            <label for="inputGender" class="form-label">Марка*</label>
            <select class="form-select" name="car_brand" aria-label="Пример выбора по умолчанию">
                '.getAllBrandsOption(0).'
              </select>

        </div>

        <div class="w-100 p-2">
            <label for="inputGender" class="form-label">Модель*</label>
            <select class="form-select" name="car_model" aria-label="Пример выбора по умолчанию">
                '.getAllModelsOption(0).'
              </select>

        </div>
    </div>

    <div class="d-flex">
        <div class="w-100 p-2">
            <label for="inputFullName" class="form-label">Гос Номер РФ*</label>
            <input type="text" placeholder="Пример PP111P999" name="car_state_num_rf" id="inputFullName" value="" class="form-control" aria-describedby="fullNameHelpBlock">
        </div>

        <div class="w-100 p-2">
            <label for="exampleColorInput" class="form-label">Цвет машины</label>
            <input type="color" class="form-control form-control-color" name="car_color" id="exampleColorInput" value="#FFFFFF" title="Choose your color">

        </div>

        <div class="w-100 p-2 d-flex align-items-center">
            <div class="form-check">
              <input class="form-check-input" name="car_is_parking" type="checkbox" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Машина на парковке
              </label>
            </div>

        </div>
    </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
</div>';
    print($patternEmpty);
}
