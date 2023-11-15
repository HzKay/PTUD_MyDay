<?php

require_once './controller/dieuBietOn/cDieuBietOn.php';
require_once './controller/cIndex.php';
require_once './controller/mucTieuThang/cMucTieuThang.php';
require_once './view/camXuc/vbieudocamxuc.php';
require_once './controller/danhGia/cdanhgia.php';
require_once './view/viecQuanTrong/vDanhGia.php';
require_once './controller/login/cLogin.php';

$maND = '1';
$cDBO = new cDieuBietOn();
$cIndex = new indexController();
$cMucTieuThang = new cMucTieuThang();
$bDCamXuc= new viewbieudocamxuc();
$danhGia = new viewdanhgia();
$login = new classLogin();

$action = $_GET['action']?? "index";
$controller = $_GET['controller']?? "index";

// if(isset($_POST['username']) && isset($_POST['password']))
// {
//     $action = $_GET['action']?? "index";
//     $controller = $_GET['controller']?? "index";
// } else
// {
//     $action = "login";
//     $controller = "login";
// }

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
                $cDBO->getDBO($maND);
                break;
            case "create":
                $cDBO->createDBO($maND);
                break;
            default:
                echo 'Erorr 404</br><h1>Không nhận ra action</h1>';
        }
        break;
    case "mucTieuThang":
        switch ($action)
            {
                case 'create':
                    echo "Tạo nè";
                    break;
                case 'index':
                    $cMucTieuThang->index($maND);
                    break;
            }
        break;
    case "camXuc":
        switch ($action)
            {
                case 'create':
                    echo "Tạo nè";
                    break;
                case 'index':
                    $bDCamXuc->hienBieuDo($maND);
                    $bDCamXuc->viewAllbieudocamxuc($maND);
                    break;
            }
        break;
    case "viecQuanTrong":
        switch ($action)
            {
                case 'index':
                    $cMucTieuThang->index($maND);
                break;
                case 'danhGia':
                    $danhGia->viewAlldanhgia($maND);
                break;
            }
        break;
    default:
            $login->login();
    ;
}

?>