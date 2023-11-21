<?php
    define("PAGETITLE", 'Tạo mục tiêu tháng');
    include_once './view/navbar/vHeader.php';
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        #date111 {
            margin-top: 10px;
        }

        .idip {
            width: 400px;
            height: 50px;
            padding-left: 10px;
            border-radius: 10px;
        }

        #ipmt {
            margin-top: 5px;
            display: grid;
            justify-content: center;
            gap: 20px;

        }

        .save {
            width: 80px;
            height: 50px;
            border: none;
            justify-content: right;
            background-color: #99CCFF;
        }

        .save:hover {
            background-color: black;
            color: white;
        }

        .cdt {
            width: 400px;
            padding: 5px 0px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .tb {
            color: red;
        }
    </style>

<?php
    include_once './view/navbar/vNavbar.php';
?>
    <div class="container">
        <div style="width: 100%; height: auto; margin-top: 3rem;">
            <form action="./?controller=mucTieuThang&action=save" method="post">
                <div class="text-center">
                    <h1 style="font-size: 32px;">Chủ đề tháng <?php echo date('m')?></h1>
                    <input name="text1" style="padding: 10px; " class="cdt" id="text1" placeholder="Mời bạn nhập chủ đề tháng..." type="text" required>
                    <br>
                </div>
                <div class="text-center" style="margin-top: 10px;">
                    <h3 style="font-size: 32px;" class="mt-4 mb-3">3 mục tiêu của tháng</h3>
                    <div id="ipmt" class=" text-center">
                        <input type="text" name="ctmt1" class="form-control idip" id="ctmt1" placeholder="Nhập mục tiêu thứ 1..." required></input>
                        <input type="text" name="ctmt2" class="form-control idip" id="ctmt2" placeholder="Nhập mục tiêu thứ 2..." required></input>
                        <input type="text" name="ctmt3" class="form-control idip" id="ctmt3" placeholder="Nhập mục tiêu thứ 3..." required></input>
                        
                        <div>
                            <input type="submit" class="btn mb-3 btn-light save" name="submitMTT" id="submit" value="Lưu">
                        </div>
                    </div>
                    <div class="erro-noti position-relative">
                        <span class="tb" id="err"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/jquery.animateNumber.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script>
        const text1 = document.getElementById("text1")
        const ctmt1 = document.getElementById("ctmt1")
        const ctmt2 = document.getElementById("ctmt2")
        const ctmt3 = document.getElementById("ctmt3")
        const check = document.getElementById("check")


        const submit = document.getElementById("submit")

        function isFirstDayOfMonth(date) {
            const today = new Date(date);
            // nextDay.setDate(date.getDate() + 1);
            const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1); //lấy ngày 1 của tháng trong năm
            return today.getDate() === 1;

        }

        const inputDate = new Date(); // Điều này tạo ra một đối tượng Date hiện tại.
        const isFirstDay = isFirstDayOfMonth(inputDate);



        // document.getElementById('text1').disabled = !isFirstDay;
        // document.getElementById('ctmt1').disabled = !isFirstDay;
        // document.getElementById('ctmt2').disabled = !isFirstDay;
        // document.getElementById('ctmt3').disabled = !isFirstDay;

        if (!isFirstDay) {
            //     text1.setAttribute("disabled","disabled")
            //     ctmt1.setAttribute("disabled","disabled")
            //     ctmt2.setAttribute("disabled","disabled")
            //     ctmt3.setAttribute("disabled","disabled")
            //     check.setAttribute("disabled","disabled")


            //     submit.setAttribute("disabled","disabled")

            // } else {
            //     text1.removeAttribute("disabled")
            //     ctmt1.removeAttribute("disabled")
            //     ctmt2.removeAttribute("disabled")
            //     ctmt3.removeAttribute("disabled")
            //     check.removeAttribute("disabled")

        }

        $(document).ready(function() {
            $("#text1").on("input", function() {
                mucTieuThang("#text1");
            });

            $("#ctmt1").on("input", function() {
                mucTieuThang("#ctmt1");
            });

            $("#ctmt2").on("input", function() {   
                mucTieuThang("#ctmt2");
            });

            $("#ctmt3").on("input", function() {
                mucTieuThang("#ctmt3");
            });
        });

        function mucTieuThang(dt) {
            let mucTieuThang = $(dt).val();
            let btcq = /^[a-zA-Z0-9_ -àáâãäèéêëìíîïòóôõöùúûüấầẩẫậắằẳẵặéèẻẽẹíìỉĩịóòỏõọớờởỡợúùủũụýỳỷỹỵ]{2,200}$/;
            if (mucTieuThang.length === 0) {
                $("#err").html("Nội dung không được để trống");
                return false;
            } else if (btcq.test(mucTieuThang)) {
                $("#err").html("");
                return true;
            } else {
                $("#err").html("Nội dung phải chứa ít nhất 2 ký tự và không chứa kí tự đặc biệt");
                return false;
            }
        }
    </script>

<?php
    include_once './view/navbar/vFooter.php';
?>