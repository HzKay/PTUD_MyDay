$(document).ready(function(){
    let btn = 0
$(".btn_submit").click(async function(){
    btn = $(this).attr("value")
    nam = $("#select1").val()
    maND = $("#maND").val()
    await getMonth(btn,nam, maND).then((data)=>{
        // console.log(data)
        if(data.date){
        $("#view1").html(`<p>${data.than}</p>`)
        $("#view2").html(`<p>${data.tam}</p>`)
        $("#view3").html(`<p>${data.tri}</p>`)
        }
        else{
            $("#view1 p").remove()
            $("#view2 p").remove()
            $("#view3 p").remove()
            alert("Bạn không có dữ liệu của tháng vừa chọn!")
        }
    })
})

    const getMonth = async (btn,nam, maND)=>{
    const res = await $.ajax({
        url: `./controller/motThangNhinLai/getdate.php?btn='${btn}'&nam=${nam}&maND=${maND}`,
        method: "POST",
        dataType: "JSON"
    })
    return res;
}
})
