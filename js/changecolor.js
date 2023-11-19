var colors = ['#e74c3c', '#f39c12', '#9b59b6', '#3498db', '#2ecc71'];

var selectedValue = null; // Biến toàn cục để lưu giá trị cảm xúc

function changeColor(index) {

  var buttons = document.querySelectorAll('.color-change-btn');

  // Lấy giá trị từ thuộc tính 'value' của button tại vị trí index
  selectedValue = buttons[index].value;
  
  // Loại bỏ lớp 'clicked' và reset màu từ tất cả các button
  buttons.forEach(function(button) {
    button.classList.remove('clicked');
    button.style.backgroundColor = ''; // Reset màu về mặc định
  });

  // Thêm lớp 'clicked' cho button được click và thay đổi màu
  buttons[index].classList.add('clicked');
  buttons[index].style.backgroundColor = colors[index];

  // Sử dụng giá trị đã lấy
  console.log('Giá trị của button tại index', index, 'là:', selectedValue);
}

function saveEmotion() {
  if (selectedValue === null) {
      alert('Vui lòng chọn một cảm xúc trước khi lưu.');
      return;
  }

}
