<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/tailwind.css" />
  <link rel="stylesheet" href="css/custom.css">
  <script src="assets/jquery.js"></script>
  <title>Login</title>
</head>

<body>
  <div class="bg-abs w-screen grid overflow-hidden h-screen">
    <form id="login" method="POST" class="w-96 h-1/2 mx-auto flex flex-col bg-gray-800 my-auto rounded-md shadow-full">
      <h1 class="text-center mt-4 text-sans anti-aliasing text-2xl text-white font-sans font-bold">
        Login
      </h1>
      <div class="flex flex-row w-3/4 mt-2 mb-2 mr-auto ml-auto bg-white  ">
        <input class="  text-center h-12 w-42 font-sans mr-0 ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="text" name="username" id="username" placeholder="Username" />
        <img src="assets/svg/id-card.png" class="w-12 h-12 mr-auto ml-0 my-auto" alt="">
      </div>
      <div class="flex flex-row w-3/4 mt-2 mb-2 mr-auto ml-auto bg-white  ">
        <input class="  text-center h-12 w-42 font-sans mr-0 ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="password" name="password" id="password" placeholder="Password" />
        <img src="assets/svg/key.png" class="w-12 h-12 mr-auto ml-0 my-auto" alt="">
      </div>
      <input class=" w-3/4 h-16 mx-auto mt-4 font-sans bg-blue-500 antialiased focus:outline-none mb-4 hover:bg-pink-500" type="submit" value="Log in" id="login-button" />
      <a class="text-center text-white text-sm" href="signup.php" target="_self">No account ? <b class="cursor-pointer">Sign up now!</b></a>
    </form>
  </div>
</body>
<script src="assets/notyf/notyf.min.js"></script>
<link rel="stylesheet" href="assets/notyf/notyf.min.css">
<script src="/config/js/index.js"></script>
<script src="config/js/notification.js"></script>
<script src="config/js/response_handler.js"></script>

</html>