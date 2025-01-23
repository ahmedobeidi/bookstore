<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/styles/output.css">
    <script defer src="./assets/js/main.js"></script>
</head>

<body class="bg-white-gray">

    <!-- Header -->
    <header class="h-[100px] px-5 flex flex-row justify-between items-center xl:px-[100px]">
        <div>
            <img src="./assets/images/logo.png" alt="Logo" class="xl:w-[150px]">
        </div>
        <div class="xl:hidden">
            <img src="./assets/images/menu-icon.png" alt="Menu Logo" id="menuButton">
        </div>
        <div class="hidden xl:flex gap-5 items-center">
            <a href="">Home</a>
            <a href="">Search</a>
            <a href="./frontend/login/login.php" class="px-4 py-2 bg-brown text-white-gray hover:cursor-pointer">Login</a>
        </div>
    </header>

    <!-- Menu Mobile -->
    <section class="w-full fixed h-full flex-col px-5 bg-white-gray hidden xl:hidden" id="sideMenu">

        <div class="flex flex-row h-[100px] justify-between items-center">
            <img src="./assets/images/logo.png" alt="Logo" class="">
            <img src="./assets/images/exit.png" alt="Exit" class="w-[20px] h-[20px]" id="exit">
        </div>

        <div class="flex flex-row mt-5">
            <div class="w-[80%] h-[30px]">
                <input type="text" placeholder="Search" class="placeholder-brown w-full px-5 py-2 border-brown">
            </div>
            <div class="w-[20%] h-[30px]">
                <p class="flex items-center justify-center bg-brown text-white-gray px-5 py-2">Serach</p>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center mt-[50px] w-[80px]">
            <a href="" class="bg-brown text-white-gray px-5 py-2">Login</a>
        </div>
    </section>

    <!-- Main  -->
    <main class="pt-10">
        <section class="xl:px-[100px] xl:flex xl:flex-row xl:mb-10 justify-between">
            <div class="xl:flex xl:flex-col xl:w-[500px] xl:gap-5">
                <h1 class="font-Baskerville text-dark-black font-bold xl:text-[60px]">Discover the Joy of Reading</h1>

                <p class="font-Outfit text-dark-gray font-medium text-[18px]">Immerse Yourself in a World of Literature: Explore Our Vast Selection of Books, from Bestsellers to Rare Finds</p>

                <a href="" class="font-Outfit bg-brown flex justify-center items-center h-[40px] xl:w-[100px] text-white-gray text-[16px]">Shop Now</a>
            </div>
            
            <div>
                <img src="./assets/images/image1.png" alt="">
            </div>
        </section>

        <section class="flex flex-col gap-5 bg-brown text-white-gray text-center items-center py-5">
            <h2 class="font-Baskerville text-[32px] leading-9">Elevate Your Reading Experience</h2>
            <p class="font-Baskerville text-[20px]">Uncover the Magic of the Written Word: Our Bookstore Offers a Curated Collection of Titles Spanning Fiction, Non-Fiction, and Every Genre in Between</p>
            <div class="flex flex-row gap-5">
                <img src="./assets/images/image-mobile1.png" alt="">
                <img src="./assets/images/image-mobile2.png" alt="">
                <img src="./assets/images/image-mobile3.png" alt="">
            </div>
        </section>
    </main>

    <!-- Footer  -->
    <footer class="bg-gray-900 text-gray-300 py-8 px-4">
    <div class="container mx-auto">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <h3 class="font-bold mb-2">Quick Links</h3>
          <ul class="text-sm space-y-1">
            <li><a href="#" class="hover:underline">Home</a></li>
            <li><a href="#" class="hover:underline">Shop</a></li>
            <li><a href="#" class="hover:underline">About</a></li>
            <li><a href="#" class="hover:underline">Contact</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold mb-2">Explore Our Collection</h3>
          <ul class="text-sm space-y-1">
            <li><a href="#" class="hover:underline">Fiction</a></li>
            <li><a href="#" class="hover:underline">Non-Fiction</a></li>
            <li><a href="#" class="hover:underline">Classics</a></li>
            <li><a href="#" class="hover:underline">New Releases</a></li>
          </ul>
        </div>
      </div>

      <div class="mt-6 text-center">
        <div class="space-x-4">
          <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
          <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
          <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
        </div>
        <p class="mt-4 text-xs">© 2024 Pagefinder, Inc. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>

</html>