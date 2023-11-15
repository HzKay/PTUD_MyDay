$(document).ready(function(){
    let btn = 0
$(".btn_submit").click(async function(){
    btn = $(this).attr("value")
    nam = $("#select1").val()
    console.log(nam)
    // $(this).css({
    //     "color" : "red"
    // })
    // console.log(typeof btn)
    await getMonth(btn,nam).then((data)=>{
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
    // console.log(btn)
})

    const getMonth = async (btn,nam)=>{
    const res = await $.ajax({
        url: `api/getdate.php?btn='${btn}'&nam=${nam}`,
        method: "POST",
        dataType: "JSON"
    })
    return res;
}
})
