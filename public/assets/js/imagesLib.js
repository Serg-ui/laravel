$(function (){

    // onbeforeunload - посмотреть про это событие
    var imagesLoaded = false


    $("#closeWrap").on('click', function (){
        $(".imagesHidenWrap").hide()
        $("#imagesListFilter").hide()
        $(".img img").removeClass('imgSelected')
    })

    $("#confirmImg").on('click', function (){
        let $i = $("#imagesList").find(".imgSelected")
        //$i.removeClass('imgSelected')
        $i2 = $i.clone()
        $i2.removeClass('imgSelected')
        $i2.removeClass('imgSelectLib')
        newimg = $("<div>").attr('class', 'sliderImage')
        $i2.appendTo(newimg)
        newimg.appendTo($('#slider'))
        /*console.log($i[0].src)
        $i.map(function(indx, element){
            console.log($(element).attr("data-id"));
        });*/
    })

    $("#btnImg").on('click', function (e){
        $(".imagesHidenWrap").show()
        $("#imagesList").show()
        if(!imagesLoaded) {
            $.post(window.imageLoadUrl, function (data) {
                $("#imagesList").html(data)
                imagesLoaded = true
            })
        }
    })

    $(document).on('click', '.imgSelectLib', function (e){
        singleSelect(e.target)
    })

    $("#goFindByName").on('click', function (){

        /*let k = $(".img img[data-name*=" + $("#findByName").val() + "]")
            //.find("img[data-name*=" + $("#findByName").val() + "]")
        console.log(k)*/

        if(!$("#findByName").val().trim()){
            if($("#imagesListFilter").is(":visible")){
                $("#imagesList .img img").removeClass('imgSelected')
                $("#imagesListFilter").hide()
                $("#imagesList").show()
            }
        }
        else {
            $.post(window.imageLoadUrl, {'filter': $("#findByName").val()}, function (data) {
                $("#imagesList .img img").removeClass('imgSelected')
                $("#imagesList").hide()
                $("#imagesListFilter").show()
                $("#imagesListFilter").html(data)

            })
        }
    })
})




function singleSelect(element){
    if($(element).hasClass('imgSelected')){
        $(element).removeClass('imgSelected')
    }
    else
    {
        $(".img img").removeClass('imgSelected')
        $(element).addClass('imgSelected')
    }
}
function allowMultipleSelect(element){
    $(element).toggleClass('imgSelected')
}
