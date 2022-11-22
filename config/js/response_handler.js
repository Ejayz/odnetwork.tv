function response_handler(response) {
  var sliced_data = response.split(":");
  var data = {};
  if (sliced_data.length == 3) {
    data = {
      code: sliced_data[0],
      message: sliced_data[1],
      cookie: "token=" + sliced_data[2],
      token: sliced_data[2]
    };
  }
  if (sliced_data.length == 2) {
    data = {
      code: sliced_data[0],
      message: sliced_data[1],
    };
  }
  return data;
}

function session_handler() {
  var ses_id = {};
  var coockie = document.cookie.split(";");
  for (let index = 0; index < coockie.length; index++) {
    if (coockie[index].includes("PHPSESSID")) {
      ses_id = {
        session_id: coockie[index].split("=")[1],
      };
    }
  }
  return ses_id;
}

function queryHandler(url) {
  var no_q = url.replace("?", "");
  return no_q;
}