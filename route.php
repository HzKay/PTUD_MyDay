<?php

require_once './controller/cDieuBietOn.php';
require_once './controller/cIndex.php';

$maND = 'ND00001';
$cDBO = new cDieuBietOn();
$cIndex = new indexController();

$action = $_GET['action']?? "index";
$controller = $_GET['controller']?? "index";

switch ($controller)
{
    case "index":
        $cIndex->getIndex();
        break;

    case "dieuBietOn":
        switch ($action)
        {
            case 'index':
                $cDBO->index($maND);
                break;
            case 'chiTietDBO':
                $cDBO->chiTietDBO();
                break;
            default:

        }
        break;
    default:
        echo 'Erorr 404</br><h1>Không nhận ra hoạt động</h1>';
}

?>