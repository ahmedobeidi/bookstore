<?php 
  require_once '../../backend/login/get_role.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../../assets/css/output.css">
  <script defer src="../../assets/js/user_login.js"></script>
</head>

<body class="bg-white-gray min-h-screen flex items-center justify-center">
  <main class="flex flex-col items-center w-full max-w-md px-6 sm:px-8 lg:px-12">
    <form action="../../backend/login/process_login.php" method="POST" class="w-full bg-white p-6 rounded-lg shadow-lg">
      <section class="flex flex-col items-center gap-6">
        <!-- Logo -->
        <a href="../../index.php"><img src="../../assets/images/logo.png" alt="Logo" class="w-32 sm:w-40"></a>

        <input
          type="email"
          name="email"
          placeholder="Email"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">

        <input
          type="password"
          name="pass"
          placeholder="Password"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">

        <input
          type="submit"
          value="Login"
          class="w-full p-3 bg-brown text-white-gray rounded-lg hover:bg-orange-500 transition duration-300 hover:cursor-pointer">

          <div class="relative">
          <!-- Popup Trigger -->
          <p class="">
            Don't have an account <span id="dropdownButton" class="text-off-blue hover:cursor-pointer">Signup</span>
          </p>

          <!-- Popup Menu -->
          <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">

            <?php foreach($roles as $role) { ?>
              <a href="../signup/<?= $role['role'] ?>_signup.php?role_id=<?= $role['id'] ?>" class="block px-4 py-2 hover:bg-white-gray"><?= $role["role"] ?></a>
            <?php } ?>

          </div>
        </div>

      </section>
    </form>

    
  </main>

 
</body>

</html>