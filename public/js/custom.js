// Allow/Denny feedback STATUS 0\1
$('.status_btn').click(function () {
    fb = $(this).parents('div.feedback');
    fId = $(this).attr('data-fId');
    st = $(this).attr('data-status');
    btn = $(this);
    $.ajaxSetup({url: "/admin/status_action", type: "POST", data: {fId: fId, st: st}});
    $.ajax({
        success: function (msg) {
            if (!msg) {
                $(btn).attr('data-status', 0)
                    .html('Разрешить')
                    .attr('class', 'status_btn btn btn-success col-lg-3');
                $(fb).attr('data-status', 0);
            } else {
                $(btn).attr('data-status', 1)
                    .html('Запретить')
                    .attr('class', 'status_btn btn btn-danger col-lg-3');
                $(fb).attr('data-status', 1);
            }
        }
    });
});

// Sort key fo feedbacks
$('.sort_key').click(function () {
    sort_by = $(this).attr('data-sort');
    $.post('/feedback', {sort_by: sort_by}, function (response) {
        console.log(response);
    });
    location.replace('/feedback');
});

// Admin edit button action
$('.admin_edit').click(function () {
    fb = $(this).parents('div.feedback');
    fId = $(this).parents('div.feedback').attr('data-fId');
    input = $(fb).children('div.fb_wrap').children('div.fb_message_wrap');
    input.replaceWith(function () {
        return '<div class="col-lg-8 fb_message_wrap"><textarea class="fb_message" type="text" name="message">' + input.text() + '</textarea><br><input type="submit" class="save_btn btn btn-info pull-right" value="Сохранить"></div>';
    });
    save_btn = $('.save_btn');
    save_message(save_btn);
});

// обработчик инпута файла.
$('input[type=file]').change(function () {
    readURL(this); // if else file inputs - change concrete input
});

// preview button action
$('.preview_btn').click(function () {
    fb = $('.pre_fb');
    // $(this).parent().find() для уверенности, что не найдет другой инпут
    // с таким именем в другой форме на странице
    email = $(this).parent().find('input[name^="email"]').val();
    // как вариант - доступ с помощью $('[attribute^="value"]').val(); 
    // чтобы не прописывать классы, работает медленней, чем доступ по классу
    name = $('input[name^="name"]').val();
    message = $('.message_area').val();

    fb.find('.fb_name').html(name);
    fb.find('.fb_email').html(email);
    fb.find('.fb_message').html(message);
    date = getFormatedDate();
    fb.find('.fb_created_time').html(date);

    $('.pre_fb').attr('style', 'display: block');
});

//================================================ FUNCTIONS ===================================

function save_message(btn) {
    btn.click(function () {
        fId = $(this).parents('div.feedback').attr('data-fId');
        message = $(this).parent().find('.fb_message').val();
        $.ajax({
            url: "/admin/edit_action",
            type: "POST",
            data: {fId: fId, message: message},
            success: function () {
                $('.save_btn').parent().replaceWith(function () {
                    return '<div class="col-lg-8 fb_message_wrap"><div class="fb_message">' + message + '</div></div>';
                });
            }
        });
    });
}

function getFormatedDate() {
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    return year + '-' + month + '-' + day + ' ' + hour + ':' + min + ':' + sec;
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.fb_image_prev').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}