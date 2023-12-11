<?php
define("PAGETITLE", 'Nhập một tháng nhìn lại');
include_once './view/navbar/vHeader.php';

include_once './view/navbar/vNavbar.php';
?>
<main class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-3">
            <!-- <form action=""></form> -->
            <form class="position-relative col-sm-6 d-flex flex-column align-items-center" style="gap: 10px; width: 390px;" action="./?controller=motThangNhinLai&action=save" method="POST">
                <h3 style="margin-top: 20px;" class="fw-bold">Một tháng nhìn lại</h3>
                <p style="text-align: center"; >Chúc mừng bạn đã hoàn thành một tháng trọn vẹn. Hãy tự thưởng cho bản thân nhé!!!</p>
                <label class="fw-bold text-center" for="than">
                    Những điều bạn đã làm để THÂN khoẻ và đẹp.
                </label>
                <input type="text" name="than" class="form-control border border-dark" id="than" placeholder="Mời bạn nhập nội dung..." style="height: 60px; width: 340px;max-width: 500px; max-height: 100px;" required></input>
                <label class="fw-bold text-center" for="tam">
                    Những điều bạn đã làm để nuôi dưỡng TÂM hồn.
                </label>
                <input type="text" name="tam" class="form-control border border-dark" id="tam" placeholder="Mời bạn nhập nội dung..." style="height: 60px; width: 340px;max-width: 500px; max-height: 100px;" required></input>
                <label class="fw-bold text-center" for="tri">
                    Những điều bạn đã làm để phát triển TRÍ tuệ.
                </label>
                <input type="text" name="tri" class="form-control border border-dark" id="tri" placeholder="Mời bạn nhập nội dung..." style="height: 60px; width: 340px;max-width: 500px; max-height: 100px;" required></input>
                <input type="submit" class="btn btn-dark" name="submit-MTNL" id="submit" value="Lưu" style="margin: 10px 0 0 264px">
                
                <input style="padding-left: 15px; width: 94px; display: block !important;margin-top: 10px; margin-left: 50px;" class="form-control border border-dark position-absolute start-100 top-0" type="text" name="date" id="date" value="<?php echo $today;?>" disabled>
            </form>
        </div>
    </div>
</main>

<?php
echo '
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./js/jquery.animateNumber.min.js"></script>
<script src="./js/jquery.min.js"></script>';

echo `
<script>
const than = document.getElementById("than")
const tam = document.getElementById("tam")
const tri = document.getElementById("tri")
const submit = document.getElementById("submit")
    function isLastDayOfMonth(date) {
        const nextDay = new Date(date);
        nextDay.setDate(date.getDate() + 1);
        return nextDay.getDate() === 1;
        }

        const inputDate = new Date(); // Điều này tạo ra một đối tượng Date hiện tại.
        const isLastDay = isLastDayOfMonth(inputDate);

        if (!isLastDay) {
            than.setAttribute("disabled","disabled")
            tam.setAttribute("disabled","disabled")
            tri.setAttribute("disabled","disabled")
            submit.setAttribute("disabled","disabled")

        } else {
            than.removeAttribute("disabled")
            tam.removeAttribute("disabled")
            tri.removeAttribute("disabled")
        }


</script>
`;

include_once './view/navbar/vFooter.php';
?>