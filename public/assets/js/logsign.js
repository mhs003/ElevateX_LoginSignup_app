$('#sh').onClick(function () {
    var nowtype = $('#password').getInputType();
    $('#sh').toggleClass('toggle-eye-active');
    if (nowtype == 'password') {
        $('#password').setInputType('text');
        $('#password').focus();
        $('#sh').setBgSrc("public/assets/images/eye_off.png");
    } else if (nowtype == 'text') {
        $('#password').setInputType('password');
        $('#password').focus();
        $('#sh').setBgSrc("public/assets/images/eye_on.png");
    }
});

$('#sh2').onClick(function () {
    var nowtype = $('#password2').getInputType();
    $('#sh2').toggleClass('toggle-eye-active');
    if (nowtype == 'password') {
        $('#password2').setInputType('text');
        $('#password2').focus();
        $('#sh2').setBgSrc("public/assets/images/eye_off.png");
    } else if (nowtype == 'text') {
        $('#password2').setInputType('password');
        $('#password2').focus();
        $('#sh2').setBgSrc("public/assets/images/eye_on.png");
    }
});