<?php

use Illuminate\Support\Facades\DB;

function printList(){
    $cars = DB::table('car')->paginate(5);

    foreach ($cars as $car){
        $client = DB::table('client')->find($car->IdClient);
        $brand = DB::table('carbrands')->find($car->IdBrand);
        $model = DB::table('carmodel')->find($car->IdModel);

        $text = '<tr class="d-flex">
        <td class="d-flex col"><span class="center-text-span">' . $client->FullName . '</span></th>
        <td class="d-flex col"><span class="center-text-span">'. $brand->Brand . ' ' . $model->Model . '</span></td>
        <td class="d-flex col"><span class="center-text-span">' . $car->StateNumRF . '</span></td>
        <td class="d-flex col-1" data-bs-theme="dark">
            <form action="/edit/'.$client->Id.'">
                <input type="submit" class="btn center-text-span input-icon-edit" value="">
            </form>
        </td>
        <td class="col-1 align-middle" data-bs-theme="dark">
            <form action="/delete/'.$car->Id.'">
                <button type="submit" class="btn center-text-span" aria-label="Удалить">
                    <img src="../icons/close.svg" alt="edit" style="color: white;">
                </button>
            </form>
        </td>
    </tr>';


        print($text);
    }

    $newClientOrCar = '<tr class="d-flex">
        <td class="d-flex col"><span class="center-text-span"></span></th>
        <td class="d-flex col"><span class="center-text-span"></span></td>
        <td class="d-flex col"><span class="center-text-span"></span></td>
        <td class="d-flex col-1" data-bs-theme="dark">
            <form action="/edit/0">
                <input type="submit" class="btn center-text-span input-icon-edit" value="">
            </form>
        </td>
        <td class="col-1 align-middle" data-bs-theme="dark">
            <button type="button" class="btn center-text-span" aria-label="Удалить">
                <img src="../icons/close.svg" alt="edit" style="color: white;">
            </button>
        </td>
    </tr>';
    print($newClientOrCar);

    return $cars->lastPage();
}


