$(function(){
    $('#menujs1').prepend('<input type="checkbox" name="toggle" id="menu" class="toggleMenu"><label for="menu" class="toggleMenu"><i class="fa fa-bars"></i>МЕНЮ <div id="ph"><a id="inst_link" href="https://www.instagram.com/palwood_ru" target="_blank" title="Инстаграм"><i class="fab fa-instagram"></i></a><i class="fas fa-phone"></i> +7 (812) 313 16 29</div></label>');
    
    function validateEmail(email) {
        var pattern  = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern .test(email);
      }

    $('#add').on('click', function(){
        $('.form_error').hide();
        $('#form_success').hide();
        this.disabled = true;
        var $id = $('#order input[name=item]');
        var $tel = $('#order input[name=tel]');
        var $email = $('#order input[name=email]');
        var $text = $('#order textarea');
        var $name = $('#order input[name=name]');
        var data = {
            action: 'order',
            id: $id.val(),
            tel: $tel.val(),
            email: $email.val(),
            text: $text.val(),
            title: $('#name').html(),
            url: window.location.href,
            name: $name.val()
        }
        if(!data.name){
            $('#fio').html('Введите имя').css('display', 'block');
            this.disabled = false;
        }
        else if(!data.email){
            $('#email').html('Введите email').css('display', 'block');
            this.disabled = false;
        }
        else if(!validateEmail(data.email)){
            $('#email').html('Некорректный email').css('display', 'block');
            this.disabled = false;
        }
        else{
            $.post(window.wp.url, data, function(data){
                if(data == "ok0"){
                    $('#form_success').css({'display':'block'});
                    $('#add').hide();
                    $('#form_success').css({'display':'block', 'background-color':'green'}).html('Заявка принята. Мы свяжемся с Вами в течении часа.');
                }
                else{
                    $('#form_success').css({'display':'block', 'background-color':'red'}).html('Ошибка отправки письма, повторите попытку');
                    $('#add').removeAttr('disabled');
                }
            })
        }
    })
});