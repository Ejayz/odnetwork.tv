var claim = 0;
timer = 30;
var time;
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('video_player', {
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}
function onPlayerReady(event) {
    document.getElementById('video_player').style.borderColor = '#FF6D00';
}

function onPlayerStateChange(event) {
    playerStatus = event.data
    setTimeout(() => {
        $.ajax({
            type: "post",
            url: "/config/php/addViews.php",
            data: { video_id: location.search.split("=")[1] },
            success: function (response) {
                console.log(response)
            }
        });
    }, 15)
    if (playerStatus == -1) {
    } else if (playerStatus == 0) {
    } else if (playerStatus == 1) {
        if (timer != 0) {
            time = setInterval((event) => {
                if (timer == 0) {
                    $("#claim-text").text("Claim")
                    clearInterval(time)
                    claim = 1;

                } else {
                    $("#claim-text").text(timer + "s")
                    claim = 0;
                }
                timer--
            }, 1000)
        } else {
            $("#claim-text").text("Claim")
        }
    } else if (playerStatus == 2) {
        clearInterval(time)
    } else if (playerStatus == 3) {
        clearInterval(time)
    } else if (playerStatus == 5) {
    }
}
$("#content-scrollable").scroll((event) => {
    if (!getNotView()) {
        player.pauseVideo()
    } else {
        player.playVideo();
    }
})
function getNotView() {
    var rect = document.getElementById("video_player").getBoundingClientRect()
    return (rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    )
}

$("#share").on("click", () => {
    $("#copy_link_container").removeClass("hidden")
    $("#copy_link").val(location.href)
})
$(".copy").on("click", () => {

    navigator.clipboard.writeText(location.href).then(() => {
        success("Link was copied to clipboard")
        hideContainer()
    })

})
$("#cancel_copy").on("click", () => {
    $("#copy_link_container").addClass("hidden")
})

function hideContainer() {
    $("#copy_link_container").addClass("hidden")
}