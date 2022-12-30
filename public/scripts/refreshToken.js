async function getToken() {
    let headersList = {
        "Accept": "*/*",
        "User-Agent": "Thunder Client (https://www.thunderclient.com)"
    }

    let response = await fetch("http://localhost:3000/api/refreshTokenProvider", {
        method: "GET",
        headers: headersList
    });

    let data = await response.text();
    return data

}

getToken().then((refreshToken) => {
    var data = JSON.parse(refreshToken)
    window.localStorage.setItem("refreshToken", data.requestToken)
})