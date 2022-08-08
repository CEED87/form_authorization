$("document").ready(function() {

    $("#authoriz").on("submit", function(e) {
    
        let dataForm = $(this).serialize()

        $.ajax({
            url: '/request.php',
            method: 'post',
            dataType: 'html',
            data: dataForm,
            success: function(data) {
               
                    alert(data)
                
            }
        })

    })

})
