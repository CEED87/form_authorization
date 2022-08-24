$("document").ready(function() {

    let messArr = [
        'User with this login already exists!',
        'Registration completed successfully!',
        'User with this email address already exists!'
    ]

    $("#btn").on("click", function(e) {
        let dataForm = $("#authoriz").serialize()
        $('form[id="authoriz"]').trigger('reset');
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
                // $("body").html(
                //    ` <div>
                //         <h1 style="margin: 10px 0;">Hello ${data}</h1>
                //         <a href="signOutProfile.php" class="logout">Exit</a>
                //         <div clas=link>
                //             <a href="/pages/page1.php">page1</a>
                //             <a href="/pages/page2.php">page2</a>
                //             <a href="/pages/page3.php">page3</a>
                //         </div>
                //     </div>`
    // )
                // console.log(data)
                
                
               
                    
                    
            }
        })

    })

    // curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-Requested-With : XMLHttpRequest"));

})

// ../classes/newUserRegistration.php