<?php


?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
</head>

<body class="bg-milk min-h-screen flex items-center justify-center">
  <main class="flex flex-col items-center w-full max-w-md px-6 sm:px-8 lg:px-12">

    <form action="../process/hanldeUserSignup.php" method="POST" class="w-full bg-formBackground p-6 rounded-lg shadow-lg">
      <div class="flex flex-col items-center gap-6">
        <!-- Logo -->
        <a href="../index.php"><img src="./assets/images/logo.png" alt="Logo" class="w-32 sm:w-40"></a>

        <input
          type="text"
          placeholder="First Name"
          name="firstName"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
        >

       
        <input
          type="text"
          name="lastName"
          placeholder="Last Name"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
        >

        <input
          type="email"
          name="email"
          placeholder="Email"
          class="w-full p-3 border  border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
        >

        <input
          type="text"
          name="phone"
          placeholder="Phone Number"
          class="w-full p-3 border  border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 "
        >


        <input
          type="password"
          name="pass"
          placeholder="Password"
          class="w-full p-3 border  border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
        >
        <input
          type="submit"
          value="Sign up"
          class="w-full p-3 bg-brown text-milk rounded-lg hover:cursor-pointer"
        >

        <p class="">Alerady have an account: <a href="./login.php" class="text-orange-400 hover:cursor-pointer">Login</a></p>
        
        <input type="text" name="role_id" value="<?= $_GET['role_id'] ?>" class="hidden">
        
      </div>
    </form>
  </main>
</body>

</html>