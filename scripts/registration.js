$("document").ready(function () {

    let messArr = [
        'User with this login already exists!',
        'Registration completed successfully!',
        'User with this email address already exists!',
        'All fields must be filled!'
    ]

    $("#reg").on("click", function (e) {
        let dataForm = $("#register").serialize()
        $.ajax({
            url: '/requestRegister.php',
            method: 'post',
            dataType: 'json',
            data: dataForm,
            success: function (data) {

                // if (+data == 0) {
                //     $("#mess").html(messArr[0])
                //     $("#mess").removeClass("userY").addClass("userN");
                // }
                // if (+data == 1) {
                //     $('#mess').html(messArr[1])
                //     $("#mess").removeClass("userN").addClass("userY");
                //     $('form[id="register"]').trigger('reset');
                // }
                // if (+data == 2) {
                //     $('#mess').html(messArr[2])
                //     $("#mess").removeClass("userY").addClass("userN");
                // }
                // if (+data == 3) {
                //     $('#mess').html(messArr[3])
                //     $("#mess").removeClass("userY").addClass("userN");
                // }

                console.log(data)
            }
        })
    })
})