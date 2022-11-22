$("#signup").on("submit", (event) => {
    event.preventDefault()
    if ($("#username").val() == "") {
        error("Username should be not empty.");
    } else if ($("#password").val() != $("#repeat_password").val()) {
        error("Password and Repeat Password do not match.")
    } else if ($("#username").val().length < 5) {
        error("Username should be more than 5 character long!")
    }
    else if ($("#password").val() == "") {
        error("Password should not be empty.")
    } else if (!$("#email").val().includes("@") || $("#email").val() == "") {
        error("Email address is invalid . Please use correct email address.")
    } else if ($("#password").val().length < 8) {
        error("Password should be atleast 8 character long !")
    } else if ($("#channel_id").val() == "") {
        error("Youtube channel should be added.Channel ID cannot be edited after signup!")
    }
    else {
        var data = $("#signup").serializeArray();
        $.ajax({
            type: "post",
            url: "config/php/signup.php",
            data: data,
            success: function (response) {
                console.log(response)
                var resp = response_handler(response)
                if (resp.code == 200) {
                    success(resp.message)
                    document.cookie = resp.cookie
                    $("#signup").trigger("reset")
                } else if (resp.code == 1062) {
                    error(resp.message)
                }else if(resp.code==400){
                    error(resp.message)
                }else if(resp.code==500){
                    error(resp.message)
                }
            }
        });
    }
})

