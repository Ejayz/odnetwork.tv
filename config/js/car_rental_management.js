var hash = "#car_management";

$("#nav-back").on("click", (event) => {
    event.preventDefault();
    open("/menu.html", "_self")
})

$(window).on("hashchange", (event) => {
    changeView(hash, "add")
    hash = event.target.location.hash;
    changeView(hash, "remove")
    if (hash == "#new_car") {
        load_car_type();
        load_transmission_type();
    }
})

function changeView(hash, action) {
    if (action == "remove") {
        $(hash).removeClass("hidden")
    } else {
        $(hash).addClass("hidden")
    }
}

function load_cars(page_num) {
    $.ajax({
        type: "post",
        url: "/config/php/load_car_list.php",
        data: { page_num: page_num },
        success: function (response) {
            $("#car_table").append(response);
        }
    });
}

$(window).on("load", (event) => {
    window.location.hash = "car_management"
    var query = queryHandler(window.location.search).split("=")[1];

    getTotalCar().then(total_car => {
        var total_page = Math.round(total_car / 2);
        if (total_page == 0) {
            $("#pagination_btn").append(' <span class="mt-auto mb-auto w-4 text-white cursor-pointer bg-gray-600">0</span>')
        } else {
            for (var i = 1; i <= total_page; i++) {
                $("#pagination_btn").append(' <span class="mt-auto mb-auto w-4 text-white cursor-pointer bg-gray-600">' + i + '</span>')
            }
        }
        if (query > total_page) {
            error("Page number that was detected is wrong .Please select a valid page at the bottom of the table.")
        } else {
            load_cars(query);
        }

    })

})

async function getTotalCar() {
    var total_page = 0;
    $.ajax({
        type: "post",
        url: "config/php/pagination_processor.php",
        data: {},
        async: false,
        success: function (response) {
            total_page = response
        }
    });
    return total_page
}

function load_car_type() {
    $.ajax({
        type: "post",
        url: "/config/php/load_car_type.php",
        data: {},
        success: function (response) {
            $("#car_type").append(response)
        }
    });
}

function load_transmission_type() {
    $.ajax({
        type: "post",
        url: "/config/php/load_transmission_type.php",
        data: {},
        success: function (response) {
            $("#transmission_type").append(response)
        }
    });
}
$("#new_car_cancel").on("click", (event) => {
    window.location.hash = "car_management"
})
$("#new_car_submit").on("click", (event) => {
    var car_name = $("#car_name").val();
    var car_brand = $("#car_brand").val()
    var car_num_seat = $("#car_num_seat").val()
    var car_color = $("#car_color").val()
    var car_type = $("#car_type").val();
    var car_plate_num = $("#car_plate_num").val()
    var transmission_type = $("#transmission_type").val()
    var token = $("#token").val();

    if (car_type == "label") {
        error("Please select <b>Car Type</b> in drop down")
        return 0;
    } else if (transmission_type == "label") {
        error("Please select <b>Transmission Type</b> in drop down")
        return 0;
    }

    $.ajax({
        type: "post",
        url: "/config/php/new_car.php",
        data: {
            "car_name": car_name,
            "car_brand": car_brand,
            "car_num_seat": car_num_seat,
            "car_color": car_color,
            "car_type": car_type,
            "car_plate_num": car_plate_num,
            "transmission_type": transmission_type,
            "token": token
        },
        success: function (response) {
            var handler = response_handler(response);
            if (handler.code == "404") {
                error(handler.message)
            } else if (handler.code == 200) {
                success(handler.message)
                $("#car_name").val("");
                $("#car_brand").val("");
                $("#car_num_seat").val("")
                $("#car_color").val("")
                $("#car_type").prop("selectedIndex", 0)
                $("#car_plate_num").val("")
                $("#transmission_type").prop("selectedIndex", 0)
                $("#token").val(handler.token);
                document.cookie = handler.cookie;
            }
        }
    });
})