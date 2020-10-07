$(function (){
    // Получение id из get параметра
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    const productId = urlParams.get('id')

    // Кто открыл библ. слайдер или миниатюра
    var actionLib
    // onbeforeunload - посмотреть про это событие
    var sliderChange = false
    var thumbnailChange = false
    var imagesLoaded = false


    $("#closeWrap").on('click', function (){
        $(".imagesHidenWrap").hide()
        $("#imagesListFilter").hide()
        $(".img img").removeClass('imgSelected')
    })

    $("#confirmImg").on('click', function (){
        let $i = $(".imgSelected")
        //$i.removeClass('imgSelected')
        $i2 = $i.clone()
        $i2.removeClass('imgSelected')
        $i2.removeClass('imgSelectLib')

        if(actionLib === 'slider') {
            $i2.addClass('imgSlider')
            newimg = $("<div>").attr('class', 'sliderImage')
            $i2.appendTo(newimg)
            newimg.appendTo($('#slider'))
            sliderChange = true
        }
        if(actionLib === 'thumbnail'){
            $(".imgThumbnail").remove()
            $i2.addClass('imgThumbnail')
            $i2.appendTo($("#thumbnail"))
            thumbnailChange = true
        }
        /*console.log($i[0].src)
        $i.map(function(indx, element){
            console.log($(element).attr("data-id"));
        });*/
        //console.log($("#uploadImg").val())
    })

    $(".btnImg").on('click', function (e){
        if($(e.target).hasClass('fromSlider')){
            actionLib = 'slider'
        }
        if($(e.target).hasClass('fromThumbnail')){
            actionLib = 'thumbnail'
        }
        $(".imagesHidenWrap").show()
        $("#imagesList").show()
        if(!imagesLoaded) {
            $.post(window.imageLoadUrl, function (data) {
                $("#imagesList").html(data)
                imagesLoaded = true
            })
        }
        $("#uploadImg").val(null)
    })

    $(document).on('click', '.imgSelectLib', function (e){
        singleSelect(e.target, 'imgSelected', '.img img')
    })
    $("#slider").on('click', '.imgSlider', function (e){
        singleSelect(e.target, 'imgSelectedSlider', '')
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

    $("#doEdit").on('click', function (e){
        e.preventDefault()



        dataToServer = {
            'slug': productId,
            'slider': []
        }

        if(sliderChange) {
            let $img = $("#slider img")
            let imgId = []
            $img.map(function (indx, element) {
                imgId.push($(element).attr('data-id'))
            })
            dataToServer.slider = imgId
        }

        $.post(
            window.productEdit,
            dataToServer,
            function (data){

            }
            )
    })
    $("#btnImgDel").on('click', function (){
        $(".imgSelectedSlider").parent(".sliderImage").remove()
        sliderChange = true
    })

    // Загрузка нового изображения
    $("#upload").on('submit', function (e){
        e.preventDefault()
        let formData = new FormData()
        formData.append('image', $('#uploadImg').prop("files")[0]);
        formData.append('id', productId)

        $.ajax({
            url: 'http://localhost:8888/laravel/public/admin/uploadImg',
            type: "POST",
            data: formData,
            async: false,
            dataType: 'JSON',
            success: function (data) {
                console.log(data.id)
                $("#uploadImg").val(null)
                let $div = $("<div>").attr('class', 'sliderImage')
                let $img = $("<img>").attr('src', data.src).addClass('imgSlider')
                $img.attr('data-id', data.id).attr('data-name', data.name)
                $img.appendTo($div)
                $div.appendTo($('#slider'))
            },
            error: function(data) {
                console.log(data.responseJSON)
            },
            cache: false,
            contentType: false,
            processData: false
        });

        /*$.post('http://localhost:8888/laravel/public/admin/uploadImg', data2, function (data){
          console.log(data)
        })*/
    })

})




function singleSelect(element, className, className2){
    if($(element).hasClass(className)){
        $(element).removeClass(className)
    }
    else
    {
        $(".img img").removeClass(className)
        $(element).addClass(className)
    }
}
function allowMultipleSelect(element, className){
    $(element).toggleClass(className)
}
