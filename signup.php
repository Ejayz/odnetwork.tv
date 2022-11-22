<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/tailwind.css" />
  <link rel="stylesheet" href="css/custom.css">
  <script src="assets/jquery.js"></script>
  <title>Sign Up</title>
</head>

<body>
  <div class="bg-abs w-screen  grid overflow-hidden h-screen">
    <form id="signup" method="post" class="w-96 h-3/4 mx-auto flex flex-col bg-gray-800 my-auto rounded-md shadow-full">
      <h1 class="text-center mt-4 text-sans anti-aliasing text-2xl text-white font-sans font-bold">
        Sign Up
      </h1>
      <p class="ml-16 text-white text-xl">Email</p>
      <input class=" text-center h-12 w-3/4 font-sans mr-auto ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="email" name="email" id="email" placeholder="Email Address">
      <p class="ml-16 text-white text-xl">Username</p>
      <input class=" text-center h-12 w-3/4 font-sans mr-auto ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="text" name="username" id="username" placeholder="Username" />
      <p class="ml-16 text-white text-xl">Youtube Channel ID</p>
      <span class="text-sm text-red-500 text-center">Can`t find Channel ID? Follow this <a href="https://support.google.com/youtube/answer/3250431?hl=en" target="_blank" class="underline">guide</a>. </span>
      <input class=" text-center h-12 w-3/4 font-sans mr-auto ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="text" name="channel_id" id="channel_id" placeholder="Youtube Channel ID" />
      <p class="ml-16 text-white text-xl">Password</p>
      <input class=" text-center h-12 w-3/4 font-sans mr-auto ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="password" name="password" id="password" placeholder="Password" />
      <p class="ml-16 text-white text-xl">Repeat Password</p>
      <input class=" text-center h-12 w-3/4 font-sans mr-auto ml-auto my-auto antialiased focus:outline-none mt-2 mb-2 mx-auto" type="password" name="repeat_password" id="repeat_password" placeholder="Repeat Password" />

      <input class=" w-1/2 h-12 mx-auto mt-4 bg-blue-500 font-sans antialiased focus:outline-none mb-4 hover:bg-pink-500" type="submit" value="Sign Up" id="signup-button" />
      <a class="text-center text-white text-sm" href="login.php" target="_self">Already had an account? <b class="cursor-pointer">Login now!</b></a>

    </form>
  </div>
</body>
<script src="assets/notyf/notyf.min.js"></script>
<link rel="stylesheet" href="assets/notyf/notyf.min.css">
<script src="/config/js/singup.js"></script>
<script src="config/js/notification.js"></script>
<script src="config/js/response_handler.js"></script>

</html>