$("document").ready(function() {

    let messArr = [
        'User with this login already exists!',
        'Registration completed successfully!',
        'User with this email address already exists!'
    ]

    $("#aut").on("click", function(e) {
        let dataForm = $("#authorization").serialize()
        $('form[id="authorization"]').trigger('reset');
        $.ajax({
            url: '/requestAuthoriz.php',
            method: 'post',
            dataType: 'html',
            data: dataForm,
            success: function(data) {

                if (+data === 0) {
                    $("#mess").removeClass("userY").addClass("userN")
                    $("#mess").html('No user found with this username or password!')
                    // console.log('No users')
                } 
                else
                window.location.href = 'userAccount.php'
                
                // console.log(data)
                
                
               
                    
                    
            }
        })

    })

    // curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-Requested-With : XMLHttpRequest"));

})

// ../classes/newUserRegistration.php