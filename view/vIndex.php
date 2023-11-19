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
    <div class="border mt-3 w-100">
        <table>
            <thead>
                <tr>
                    <td>
                        Tên công việc
                    </td>
                    <td>
                        Thời gian
                    </td>
                </tr>
            </thead>
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
                <form action="" name="addEvent" method="get">
                    <label for="txtTitle" class="form-label">Tên sự kiện</label>
                    <input type="text" name="txtTitle" id="txtTitle" class="form-control">

                    <label for="txtTime">Thời gian</label>
                    <input type="date" name="txtTime" id=txtTime class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-light" name="btnSave" data-dismiss="modal">Lưu</button>
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
        // Khởi tạo FullCalendar
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

        $('#btnSave').on('click', function ()
        {
            var title = $('#txtTitle').val();
            var time = $('#txtTime').val();
                // Lấy URL đầy đủ
            // Lấy vị trí thư mục hiện tại
            var currentPath = window.location.pathname;

            // In ra console
            console.log('Vị trí thư mục hiện tại:', currentPath);
            // window.location.href = "./route.php";
            $('#btnSave').modal('hide');
        });
    });
</script>
<?php
    include './view/navbar/vFooter.php';
?>