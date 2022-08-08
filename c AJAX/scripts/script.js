$("document").ready(function() {

    $("#authoriz").on("submit", function(e) {
    
        let dataForm = $(this).serialize()

        $.ajax({
            url: '/request.php',
            method: 'post',
            dataType: 'html',
            data: dataForm,
            success: function(data) {
                // if (data) {
                    // window.location = "/userAccount.php"
                    // window.open("/userAccount.php", '_blank') 
                    // console.log(data)
                    alert(data)
                    
                    
                // } else {
                    // e.preventDefault();
                // }
                
                
            }
        })

    })

    // curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-Requested-With : XMLHttpRequest"));

})

// ../classes/newUserRegistration.php