function showMore(object) {
    object.find(".details").css({"background":"rgba(255, 255, 255, 1)"});
    object.find(".details").css({"transform":"translateY(-100%)"});
    object.find("h5").css({"background":"#007cb6"});
    object.find(".img-a").css({"color":"#fff"});
}

function showLess(object) {
    object.find(".details").css({"background":"none"});
    object.find(".details").css({"transform":"translateY(-45%)"});
    object.find("h5").css({"background":"#fff"});
    object.find(".img-a").css({"color":"#007cb6"});
}

function loginShow() {
    $("#login").css({"display":"block"});
    $("#black").css({"display":"block"});
}

function loginHide() {
    $("#login").css({"display":"none"});
    $("#black").css({"display":"none"});
}

function sideNavShow() {
    $(".nav-m-l").css({"transform":"translateX(0%)"});
    $("#black").css({"display":"block"});
}

function hide(object) {
    if($(".nav-m-l").css("transform") == "matrix(1, 0, 0, 1, 0, 0)") {
        $(".nav-m-l").css({"transform":"translateX(-100%)"})
    }
    if($("#login").css("display") == "block") {
        $("#login").css({"display":"none"});
    }
    object.css({"display":"none"});
}

function resetForm(form) {
    form.css({"background":"#fff"});
    form.children().show();
    form.find("#error").hide();
    form.find("#success").hide();
}

function formShow($form) {
    resetForm($form);
    $("#black").show();
    $form.css({"display":"block"});
    $form.find("#no").click(function() {
        $("#black").hide();
        $form.hide();
    });
    $("#black").click(function () {
        $form.hide();
    });
}

function editProfile($form) {
    $form.submit(function() {
        if($form.find('input').length == 2) {
            var edit = $form.find('input')[0].getAttribute('name');
            var value = $form.find('input')[0].value;
            var id = $form.find('input[id=id]').val();
            if(edit == "editAv") {
                var formData = new FormData();
                formData.append('img', $form.find('input[type=file]')[0].files[0]);
                formData.append('id', id);
                formData.append('edit', edit);
                $.ajax({
                    url         : '../pages/users/update.php',
                    method      : 'post',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (data) {
                        if(data != "ok") {
                            $form.find("#error").empty().append(data).show();
                        } else {
                            $form.children().hide();
                            $form.css({"background":"none"});
                            $form.find("#success").empty().append("votre Avatar à bien été modifié !").show();
                            setTimeout(function() {
                                window.location.replace('index.php?p=user&id=' + id);
                            },1500);
                        }
                    }
                });
            } else {
                $.ajax({
                    url     : '../pages/users/update.php',
                    method  : 'post',
                    data    : {id:id, edit:edit, value:value},
                    success : function (data) {
                        if(data != "ok") {
                            $form.find("#error").empty().append(data).show();
                        } else {
                            var text = "#text" + edit;
                            $(text).text(value);
                            $form.children().hide();
                            $form.css({"background":"none"});
                            $form.find("#success").empty().append("votre " + $form.find('input').attr('placeholder') + " à bien été modifié !").show();
                            setTimeout(function() {
                                $form.fadeOut();
                                $('#black').fadeOut();
                            },1500);
                        }
                    }
                });
            }
        } else if($form.find('input').length == 3) {
            var edit = $form.find('input')[0].getAttribute('name');
            var value = $form.find('input')[0].value;
            var editC = $form.find('input')[1].getAttribute('name');
            var valueC = $form.find('input')[1].value;
            var id = $form.find('input[id=id]').val();
            $.ajax({
                url     : '../pages/users/update.php',
                method  : 'post',
                data    : {id:id, edit:edit, value:value, editC:editC, valueC: valueC},
                success : function (data) {
                    if(data != "ok") {
                        $form.find("#error").empty().append(data).show();
                    } else {
                        if(edit != "editPass") {
                            var text = "#text" + edit;
                            $(text).text(value);
                        }
                        $form.children().hide();
                        $form.css({"background":"none"});
                        $form.find("#success").empty().append("votre " + $form.find('input')[0].getAttribute('placeholder') + " à bien été modifié !").show();
                        setTimeout(function() {
                                $form.fadeOut();
                                $('#black').fadeOut();
                            },1500);
                    }
                }
            });
        }
        return false;
    });
}