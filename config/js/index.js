$("#login").on("submit", (event) => {
  event.preventDefault();
  var ses_id = session_handler();
  var username = $("#username").val();
  var password = $("#password").val();
  var data = {
    username: username,
    password: password,
    ses_id: ses_id.session_id,
  };

  $.ajax({
    type: "post",
    url: "config/php/login.php",
    data: data,
    success: function (response) {
      console.log(response);
      var res = response_handler(response);
      console.log(res);
      if (res.code == 200) {
        success(res.message);
        document.cookie = res.coockie;
        setTimeout(() => {
          open("/newsfeeds.php", "_self");
        }, 1000);
      }
      if (res.code == 401) {
        error(res.message);
      }
    },
  });
});

$(document).ready(() => {
  if (
    window.location.search.includes("error") &&
    window.location.search.includes("401")
  ) {
    error("You should login before accessing some portion of this website.");
  }
});
