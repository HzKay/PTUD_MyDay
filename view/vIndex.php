<?php
    define("PAGETITLE", 'Trang chủ');
    include './view/navbar/vHeader.php';
?>
<!-- Bootstrap CSS -->
<link  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- FullCalendar CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
<style>
    #calendar {
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
    }
    .contain {
        width: 90%;
    }
</style>
<?php
    include './view/navbar/vNavbar.php';
?>
<div class="contain mx-auto">
    <div class="p-3 border mt-5 w-100">
        <div class="calendar-header d-flex justify-content-between">
            <h4 class="">Lịch sự kiện</h4>
            <div class="">
                <button type="button" name="btnAdd" class="btn btn-light border" id='btnAdd'>Thêm sự kiện</button>
            </div>
        </div>
        <hr>
        <div id="calendar"></div>
    </div>
    <div class="border mt-3 w-100 p-3">
        <div class="header-job d-flex align-items-center justify-content-between">
            <h4 class="">Công việc quan trọng</h4>
            <div class="text-right">
                <form action="./?controller=index&action=change&time=<?php echo $time?>" method="post" class="d-flex align-items-center justify-content-center">
                    <input type="submit" class="btn btn-transparent" name="btnPrevJob" id="btnPrevJob" value="<">
                    <label class="mb-0 fw-bold"><?php echo date('d/m/Y', strtotime($time));?></label>
                    <?php 
                        $today = date('Y-m-d');
                        if ($time == $today)
                        {
                            echo "<input type='submit' class='btn btn-transparent' name='btnNextJob' id='btnNextJob' value='>' disabled>";
                        } else {
                            echo "<input type='submit' class='btn btn-transparent' name='btnNextJob' id='btnNextJob' value='>'>";
                        }
                    ?>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col" colspan="2">Tên công việc</th>
                <th scope="col">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $i = 1;
                   while ($job = mysqli_fetch_array($jobList))
                   {
                        $time = date('H:i', strtotime($job['thoiGianTH']));
                        echo "
                        <tr>
                            <th scope='row'>{$i}</th>
                            <td colspan='2'>{$job['noiDung']}</td>
                            <td>{$time}</td>
                        </tr>
                       ";
                       $i++;
                   }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Chi tiết sự kiện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nội dung:</strong> <span id="eventModalTitle"></span></p>
                <p><strong>Thời gian:</strong> <span id="eventModalStart"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEventLabel"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Thêm sự kiện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./?controller=suKien&action=save" name="addEvent" method="get">
                    <label for="txtTitle" class="form-label">Tên sự kiện</label>
                    <input type="text" name="txtTitle" id="txtTitle" class="form-control" required>

                    <label for="txtTime">Thời gian</label>
                    <input type="date" name="txtTime" id=txtTime class="form-control" required>
        
                    <div class="text-center mt-3">
                        <!-- <button type="submit" class="btn border btn-light" name="btnSave" id="btnSave" data-dismiss="modal">Lưu</button> -->
                        <button type="submit" class="btn border btn-light" name="btnSave" id="btnSave">Lưu</button>
                        <p id="err" class="mt-3 text-danger">

                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: <?php echo $events ?>,
            locale: 'vi', 
            titleFormat: 'MM/YYYY', 
            showNonCurrentDates: false,
            eventClick: function(event) {
                $('#eventModal').modal('show');

                $('#eventModalTitle').text(event.title);
                $('#eventModalStart').text(moment(event.start).format('DD/MM/YYYY'));
            }
            
        });

        $('#btnAdd').on('click', function () {
            $('#addEvent').modal('show');
        });

        let tenSuKien = $('#txtTitle');
        let showError = $('#err')
        
        function checkInput(input) {
            let value = input.val().trim();
            let mau = /^[ a-zA-Z0-9_-àáâãäèéđêëìíîïòóôõöưùúûüấầẩẫậắằẳẵặéèẻẽẹíìỉĩịóòỏõọơớờởỡợúùủũụýỳỷỹỵ]{2,}$/;
            let regex = /^[!@#$%^&*()_+\-=\[\]{};':\"\\|<>\/?]+$/;
            if (value.length > 100) {
                showError.html("Nội dung không được vượt quá 100 kí tự");
                return false;
            } else if (value == '') {
                showError.html("Vui lòng điền vào trường này");
                return false;
            } else if (mau.test(value)) {
                showError.html(" ");
                return true;
            } else {
                showError.html("Nội dung phải chứa ít nhất 2 ký tự khác khoảng trắng và không chứa kí tự đặc biệt");
                return false;
            }
            console.log(mau.test(value));
        }

        $('#btnSave').on('click', function (e)
        {
            event.preventDefault();
            var eventName = $('#txtTitle').val();
            var eventDate = $('#txtTime').val();

           if(eventName != '' && eventDate != '')
           {
            var link = './?controller=suKien&action=save&txtTitle=' + eventName + '&txtTime=' + eventDate;
            window.location.href = link;
           } else if(checkInput(tenSuKien) == false) {
                event.preventDefault();
           }
        });

        
    });
</script>
<?php
    include './view/navbar/vFooter.php';
?>