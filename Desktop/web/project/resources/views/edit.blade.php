<?php
    require_once '../resources/php/ListClients.php';
    require_once '../resources/php/ListCarAtClient.php';

    $client = DB::table('client')->find($userId);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../icons/ParkingIcon.svg">
        <link rel="stylesheet" href="../css/style.css">
    <title>Редактирование</title>
</head>
<body>
    <div class="container h-100">

        <form action="/">
            <button type="submit" class="btn btn-primary">Ко всем записям</button>
        </form>

        <div class="row h-100 justify-content-center align-items-center">
            <div class="h-50 d-flex align-items-center">
                <div class="card w-100">
                    <div class="card-header">
                        <p class="fs-3 fw-bold">Клиент</p>
                    </div>
                    <div class="card-body">
                        <form action="/edit/{{isset($client->Id) ? $client->Id : 0}}">
                            <input type="hidden" name="is_update_info" value="update">
                            <div class="d-flex w-100">
                                <div class="w-100 p-2">
                                    <label for="inputFullName" class="form-label">ФИО*</label>
                                    <input type="text" name="client_full_name" placeholder="Минимальная длина 3 символа" id="inputFullName" class="form-control" aria-describedby="fullNameHelpBlock" value="{{isset($client) ? "$client->FullName" : ""}}">

                                </div>

                                <div class="w-100 p-2">
                                    <label for="inputGender" class="form-label">Пол*</label>
                                    <select class="form-select" name="client_gender" aria-label="Пример выбора по умолчанию">
                                        <option {{isset($client) ? "" : "selected"}} >Пол не выбран</option>
                                        <option {{isset($client) && $client->Gender == 0 ? "selected" : ""}} value="1">Мужской</option>
                                        <option {{isset($client) && $client->Gender == 1 ? "selected" : ""}} value="2">Женский</option>
                                      </select>

                                </div>
                            </div>

                            <div class="d-flex w-100">
                                <div class="w-100 p-2">
                                    <label for="inputFullName" class="form-label">Телефон*</label>
                                    <input type="text" id="inputFullName" name="client_num_phone" class="form-control" aria-describedby="fullNameHelpBlock" value="{{isset($client) ? "$client->NumPhone" : ""}}">

                                </div>

                                <div class="w-100 p-2">
                                    <label for="inputFullName" class="form-label">Адрес</label>
                                    <input type="text" id="inputFullName" name="client_address" class="form-control" aria-describedby="fullNameHelpBlock" value="{{isset($client) ? "$client->Address" : ""}}">

                                </div>
                            </div>
                            <div class="w-100 d-flex p-2 pb-0">
                                <button type="submit" class="btn btn-primary w-100">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="h-50">
                <div class="card">
                    <div class="card-header">
                        <p class="fs-3 fw-bold">Машины</p>
                    </div>
                    <div class="card-body">

                        {{printCarList($userId)}}
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
