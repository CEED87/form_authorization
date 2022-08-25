$("document").ready(function() {

    $("#aut").on("click", function() {
        let dataForm = $("#authorization").serialize()
        
        $.ajax({
            url: '/requestAuthoriz.php',
            method: 'post',
            dataType: 'html',
            data: dataForm,
            success: function(data) {

                if (+data === 0) {
                    $("#mess").removeClass("userY").addClass("userN")
                    $("#mess").html('No user found with this username or password!')
                } 
                else if (+data === 1) {
                    $("#mess").removeClass("userY").addClass("userN")
                    $("#mess").html('All fields must be filled!')
                }
                else
                window.location.href = 'userAccount.php'    
            }
        })
    })
})
