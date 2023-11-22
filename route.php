<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once './controller/login/cLogin.php';
$cLogin = new cLogin();
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['userID']))
{
    $isValidate = $cLogin->authenUser($_SESSION['userID'], $_SESSION['username'], $_SESSION['password']);

    if($isValidate == 1) 
    {
        $action = $_REQUEST['action'] ?? "index";
        $controller = $_REQUEST['controller'] ?? "index";
        $maND = $_SESSION['userID'];
    }
    else
    {
        $controller = "login";
        $action = $_REQUEST['action'] ?? "index";
    }
        
} else
{
    $controller = "login";
    $action = $_REQUEST['action'] ?? "index";
}

require_once './controller/dieuBietOn/cDieuBietOn.php';
require_once './controller/cIndex.php';
require_once './controller/mucTieuThang/cMucTieuThang.php';
require_once './view/camXuc/vbieudocamxuc.php';
require_once './controller/danhGia/cdanhgia.php';
require_once './view/viecQuanTrong/vDanhGia.php';
require_once './controller/login/cLogin.php';
require_once './controller/camXuc/cbieudocamxuc.php';
require_once './controller/motThangNhinLai/cMTNL.php';
require_once './controller/suKien/cSuKien.php';
require_once './controller/thoiQuen/cThoiQuen.php';
require_once './controller/viecQuanTrong/cViecQuanTrong.php';

$cDBO = new cDieuBietOn();
$cIndex = new indexController();
$cMucTieuThang = new cMucTieuThang();
$bDCamXuc= new viewbieudocamxuc();
$cCamXuc = new controlbieudocamxuc();
$danhGia = new viewdanhgia();
$cMotThangNL = new cMotThangNL();
$cSuKien = new cSuKien();
$cThoiQuen = new cThoiQuen();
$cViecQuanTrong = new cViecQuanTrong();

switch ($controller)
{
    case 'login':
        switch ($action)
        {
            case 'index':
                $cLogin->viewLoginForm();
                break;
            case 'login':
                $cLogin->login();
                break;
            case 'vRegister':
                $cLogin->viewRegisForm();
                break;
            case 'register':
                $cLogin->register();
                break;
            case 'vForget':
                $cLogin->viewForgetForm();
                break;
            case 'forget':
                $cLogin->forgetPass();
                break;
            case 'logout':
                $cLogin->logout();
                break;
            default: 
                $cLogin->viewLoginForm();
                break;
        }
        break;
    case "index":
        $cIndex->vIndex();
        break;

    case "dieuBietOn":
        switch ($action)
        {
            case 'index':
                $cDBO->index();
                break;
            case 'chiTietDBO':
                $cDBO->getDBO($maND);
                break;
            case "create":
                $cDBO->getViewCreateDBO($maND);
                break;
            case "save":
                $cDBO->saveDieuBietOn();
            break;
            default:
                echo 'Erorr 404</br><h1>Không nhận ra action</h1>';
        }
        break;
    case "mucTieuThang":
        switch ($action)
            {
                case 'create':
                    $cMucTieuThang->vCreateForm();
                    break;
                case 'save':
                    $cMucTieuThang->handleRequest();
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
                    $cCamXuc->getViewNhapCamXuc();
                    break;
                case 'insert':
                    $cCamXuc->saveEmotion();
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
                case 'save':
                    $cViecQuanTrong->saveJob();
                break;
                case 'create':
                    $cViecQuanTrong->vCreateForm();
                break;
            }
        break;
    case "motThangNhinLai":
        switch ($action)
        {
                case 'index':
                    $cMotThangNL->viewMotThangNL();
                break;
                case 'create':
                    $cMotThangNL->viewCreteMTNL();
                break;
                case 'save':
                    $cMotThangNL->insertConTentMTNL();
                break;
            }
        break;
    case "suKien":
        switch ($action)
        {
            case 'save':
                $cSuKien->saveSuKien();
                break;
        }
        break;
    case "thoiQuen":
        switch ($action)
        {
            case 'index':
                $cThoiQuen->index();
            break;
            case 'create':
                $cThoiQuen->viewFormCreate();
            break;
            case 'save':
                $cThoiQuen->saveThoiQuen();
            break;
            case 'check':
                $cThoiQuen->vCheckHabit();
            break;
            case 'insert':
                $cThoiQuen->insertStatusHabit();
            break;
        }
        break;
    default:
        $cIndex->vIndex();
    ;
}

?>