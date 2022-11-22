$("#link_video").on("click", (event) => {

  $("#video_details").addClass("hidden")
  $("#post_video").addClass("hidden")
  $.ajax({
    type: "post",
    url: "/config/php/channel_video_verify.php",
    data: {
      youtube_link: $("#youtube_link").val(),
    },
    success: function (response) {
      console.log(response)
      var resp = JSON.parse(response);
      console.log(resp)
      if (resp["0"].code == 200) {
        $("#video_details").removeClass("hidden")
        $("#post_video").removeClass("hidden")
        $("#video_title").html(resp["items"]["0"]["snippet"]["title"])
        $("#description").html(resp["items"]["0"]["snippet"]["description"])
        var reso = JSON.stringify(resp["items"]["0"]["snippet"]["thumbnails"]);
        if (reso.includes("maxres")) {
          $("#thumbnail").attr("src", resp["items"]["0"]["snippet"]["thumbnails"]["maxres"]["url"])
        } else if (reso.includes("standard")) {
          $("#thumbnail").attr("src", resp["items"]["0"]["snippet"]["thumbnails"]["standard"]["url"])
        } else if (reso.includes("high")) {
          $("#thumbnail").attr("src", resp["items"]["0"]["snippet"]["thumbnails"]["high"]["url"])
        } else if (reso.includes("medium")) {
          $("#thumbnail").attr("src", resp["items"]["0"]["snippet"]["thumbnails"]["medium"]["url"])
        } else if (reso, includes("default")) {
          $("#thumbnail").attr("src", resp["items"]["0"]["snippet"]["thumbnails"]["default"]["url"])
        }
        success("Your youtube video information was retrieved successfully.");
      } else if (resp["0"].code == 401) {
        error(resp["0"].message);
      } else if (resp["0"].code == 404) {
        error(resp["0"].message);
      } else if (resp["0"].code == 201) {
        error(resp["0"].message);
      }
    },
  });
});

$("#close_new_video").on("click", () => {
  $("#new_video").addClass("hidden")
  $("#video_title").html("")
  $("#description").html("")
  $("#thumbnail").attr("src", "/assets/svg/thumbnail.png")
  $("#youtube_link").val("")
  $("#video_details").addClass("hidden")
  $("#post_video").addClass("hidden")
})

$("#new_video_open").on("click", () => {
  $("#new_video").removeClass("hidden")
})
$("#post_video").on("click", () => {
  $.ajax({
    type: "post",
    url: "/config/php/new_video.php",
    data: {
      youtube_link: $("#youtube_link").val()
    },
    success: function (response) {
      var parsed = JSON.parse(response)
      if (parsed["0"].code == 200) {
        success(parsed["0"].message)
        $("#new_video").addClass("hidden")
        $("#video_title").html("")
        $("#description").html("")
        $("#thumbnail").attr("src", "/assets/svg/thumbnail.png")
        $("#youtube_link").val("")
        $("#video_details").addClass("hidden")
        $("#post_video").addClass("hidden")
      } else if (parsed["0"].code == 401) {
        error(parsed["0"].message)
      } else if (parsed["0"].code == 500) {
        error(parsed["0"].message)
      } else if (parsed["0"].code == 404) {
        error(parsed["0"].message)
      } else if (parsed["0"].code == 201) {
        error(parsed["0"].message)
      }

    }
  });
})