<?php
    require_once '../resources/php/ListClientCar.php';
    require_once '../resources/php/Pagination.php';

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
    <title>Автостоянка</title>
</head>
<body >

    <!-- Таблица -->
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="h-75">
                <p class="fs-3 fw-bold">Все клиенты</p>
                <table class="table table-dark table-striped">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col">ФИО</th>
                                    <th class="col">Авто</th>
                                    <th class="col">Номер</th>
                                    <th class="col-1"></th>
                                    <th class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                   $countPages = printList();
                                ?>
                            </tbody>
                    </table>
                    <div>
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item {{paginationPreviousEnable()}}"><a class="page-link" href="{{paginationPrevious()}}">Previous</a></li>
                        {{printPaginationBtn($countPages)}}
                        <li class="page-item {{paginationNextEnable($countPages)}}"><a class="page-link" href="{{paginationNext($countPages)}}">Next</a></li>
                      </ul>
                    </nav>
                </div>
                </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
