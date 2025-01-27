<?php

    session_start();

    if (isset($_SESSION['user'])) {
        header("Location: ./home.php");
        exit();
    }

    require_once '../utils/autoloader.php';

    $roleManager = new RoleManager();
    $roles = $roleManager->unsetAdminFromRoles();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./assets/styles/output.css">
  <script defer src="./assets/scripts/signup_popup.js"></script>
</head>

<body class="bg-milk min-h-screen flex items-center justify-center">
  <main class="flex flex-col items-center w-full max-w-md px-6 sm:px-8 lg:px-12">

    <?php if (isset($_GET['error'])): ?>
    <p class="text-red mb-10"><?= $_GET['error'] ?> 
    <?php endif ?> 

    <form action="../process/processLogin.php" method="POST" class="w-full bg-formBackground p-6 rounded-lg shadow-lg">
      <section class="flex flex-col items-center gap-6">
        <!-- Logo -->
        <a href="../index.php"><img src="./assets/images/logo.png" alt="Logo" class="w-32 sm:w-40"></a>

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
          class="w-full p-3 bg-brown text-milk rounded-lg hover:cursor-pointer">

          <div class="relative">
          <!-- Popup Trigger -->
          <p class="">
            Don't have an account <span id="dropdownButton" class="text-orange-400 hover:cursor-pointer">Signup</span>
          </p>

          <!-- Popup Menu -->
          <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">

            <?php foreach($roles as $role) { ?>
              <a href="./<?= $role->getRole() ?>Signup.php" class="block px-4 py-2 hover:bg-milk"><?= $role->getRole(); ?></a>
            <?php } ?>

          </div>
        </div>

      </section>
    </form>

    
  </main>

 
</body>

</html>