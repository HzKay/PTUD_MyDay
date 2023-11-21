<?php
    define('PAGETITLE', 'Thêm thói quen');
    include_once './view/navbar/vHeader.php';
    include_once './view/navbar/vNavbar.php';
?>

<body>
    <div class="container">
        <div style="width: 100%; height: 400px; margin-top: 20px;" class="text-center">
            <div>
                <h2 class="fw-bold">Tạo thói quen</h2>
            </div>
            <div style="line-height: 30px; margin-top: 20px;">
                <div style="margin-top: 10px;">
                    <div style="margin-top: 10px; display: flex; justify-content: center; gap: 10px;">
                        <form action="" method="get" class="w-50" id="myForm">
                            <input type="text" name="controller" value="thoiQuen" hidden id="">
                            <input type="text" name="action" value="save" hidden id="">
                            <div id="initialInput" class="form-row text-start">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                                <label class="col-form-label" for="TQ">Thói quen 1:</label>
                                        </div>
                                        <div class="col-8">
                                                <input class="form-control" type="text" id="TQ" name="TQ[]" required>
                                        </div>
                                        <div class="col-2">
                                                
                                        </div>
                                    </div>    
                                </div> 
                            <div class="form-btn mt-3">
                                <button type="button" class="btn btn-light border me-3" onclick="addInput()">Thêm thói quen</button>
                                <input type="submit" class="btn btn-light border" value="Gửi"> <br>
                            </div>
                        </form>

                        <script>
                            var habitCount = 1;

                            function addInput() {
                                var initialInput = document.getElementById('initialInput');
                                
                                if (habitCount < 8) {
                                                   
                                    let id = "row" + habitCount;
                                    let labelDivID =  "labelDiv" + habitCount;
                                    let inputDivID = "inputDiv" + habitCount;
                                    let deleteDivID = "delDiv" + habitCount;

                                    var newDiv = document.createElement('div');
                                    newDiv.id = id;
                                    newDiv.classList.add('row', 'align-items-center', 'mt-2');
                                    
                                    var labelDiv = document.createElement('div');
                                    labelDiv.id = labelDivID;
                                    labelDiv.classList.add('col-2');

                                    var inputDiv = document.createElement('div');
                                    inputDiv.id = inputDivID;
                                    inputDiv.classList.add('col-8');

                                    var deleteDiv = document.createElement('div');
                                    deleteDiv.id = deleteDivID;
                                    deleteDiv.classList.add('col-2');


                                    initialInput.appendChild(newDiv);

                                    var newDiv = document.getElementById(id);
                                    newDiv.appendChild(labelDiv);
                                    newDiv.appendChild(inputDiv);
                                    newDiv.appendChild(deleteDiv);
                                    
                                    var labelDiv = document.getElementById(labelDivID);
                                    var inputDiv = document.getElementById(inputDivID);
                                    var deleteDiv = document.getElementById(deleteDivID);

                                    var newLabel = document.createElement('label');
                                    newLabel.setAttribute('for', 'TQ[]');
                                    newLabel.textContent = 'Thói quen ' + (habitCount + 1) + ':';
                                    newLabel.classList.add('col-form-label');
                                
                                    var newInput = document.createElement('input');
                                    newInput.type = 'text';
                                    newInput.name = 'TQ[]';
                                    newInput.required =  true;
                                    newInput.classList.add('form-control', 'mt-1');

                                    // var lineBreak = document.createElement('br');

                                    var deleteButton = document.createElement('button');
                                    deleteButton.textContent = 'Xóa';
                                    deleteButton.type = 'button';
                                    deleteButton.classList.add('btn', 'btn-light', 'ms-1');
                                    deleteButton.onclick = function() {
                                        habitCount--;
                                        newDiv.removeChild(labelDiv);
                                        newDiv.removeChild(inputDiv);
                                        newDiv.removeChild(deleteDiv);
                                        initialInput.removeChild(newDiv);
                                    };

                                    labelDiv.appendChild(newLabel);
                                    inputDiv.appendChild(newInput);
                                    deleteDiv.appendChild(deleteButton);

                                    habitCount = habitCount+1;
                                } else {
                                    alert("Bạn đã đạt tối đa số thói quen cho phép (8).");
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once './view/navbar/vFooter.php';
?>