var menu_status = "minimize"
$("#menu_close").on("click", () => {
    if (menu_status == "maximize") {
        $("#menu-container").removeClass("w-1/6")
        $("#menu-container").addClass("w-10")
        $(".menu_name").addClass("hidden")
        $("#content-container").addClass("w-full")
        $("#content-container").removeClass("w-5/6")
        $(".menu_icon").addClass("ml-auto")
        $(".menu_icon").removeClass("ml-4")
        $(".menu_icon").addClass("mr-auto")
        $(".menu_icon").removeClass("mr-4")
        menu_status = "minimize"
    } else if (menu_status == "minimize") {
        $("#menu-container").addClass("w-1/6")
        $("#menu-container").removeClass("w-10")
        $(".menu_name").removeClass("hidden")
        $("#content-container").removeClass("w-full")
        $("#content-container").addClass("w-5/6")
        $(".menu_icon").removeClass("ml-auto")
        $(".menu_icon").addClass("ml-4")
        $(".menu_icon").removeClass("mr-auto")
        $(".menu_icon").addClass("mr-4")
        menu_status = "maximize"
    }
})
$("#video_feeds").on("click", (event) => {
    open("/newsfeeds.php", "_self")
})
$("#account_management").on("click", () => {
    open("account.php", "_self")
})
$("#logout").on("click", () => {
    $.ajax({
        type: "post",
        url: "/config/php/logout.php",
        data: {},
        success: function (response) {
            if (response == 200) {
                success("Session was logged out !")
                setTimeout(() => {
                    open("login.php", "_self")
                }, 2000)
            }
        }
    });
})