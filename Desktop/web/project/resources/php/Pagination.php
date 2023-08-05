<?php
function printPaginationBtn($countPage){
    $currentPage = 1;
    try{
        if($_GET['page'] != null) $currentPage = $_GET['page'];
    }catch(Exception $e){}

    for ($pageId=1; $pageId <= $countPage; $pageId++) {
        $pageBtn = '';
        if($currentPage == $pageId)
            $pageBtn = '<li class="page-item active"><a class="page-link" href="?page='.$pageId.'">'.$pageId.'</a></li>';
        else
            $pageBtn = '<li class="page-item"><a class="page-link" href="?page='.$pageId.'">'.$pageId.'</a></li>';

        print($pageBtn);
    }
}

function paginationPrevious(){
    try{
        if($_GET['page'] != null) return "?page=". $_GET['page'] - 1;
    }
    catch(Exception $e){
    }
}

function paginationPreviousEnable(){
    $currentPage = 1;
    try{
        if($_GET['page'] != null) $currentPage = $_GET['page'];
    }
    catch(Exception $e){
        if($currentPage > 1) return "";
        else return "disabled";
    }


    if($currentPage > 1) return "";
    else return "disabled";
}

function paginationNext($lastPageId){
    try{
        if($_GET['page'] < $lastPageId) return "?page=". $_GET['page'] + 1;
    }
    catch(Exception $e){}
}

function paginationNextEnable($lastPageId){
    $currentPage = 1;


    try{
        if($_GET['page'] != null) $currentPage = $_GET['page'];
    }
    catch(Exception $e){
        if($currentPage < $lastPageId) return "";
        else return "disabled";
    }

    if($currentPage < $lastPageId) return "";
    else return "disabled";
}
