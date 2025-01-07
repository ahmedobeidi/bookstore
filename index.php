<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./assets/css/output.css">
    <script defer src="./assets/js/index.js"></script>
</head>

<body class="bg-white-gray">



    <!-- Header -->
    <header class="h-[70px] px-5 flex flex-row justify-between items-center lg:px-10">
        <div>
            <img src="./assets/images/logo.png" alt="Logo">
        </div>
        <div class="xl:hidden">
            <img src="./assets/images/menu-icon.png" alt="Menu Logo" id="menuButton">
        </div>
        <div class="hidden xl:flex gap-5 items-center">
            <a href="">Home</a>
            <a href="">Search</a>
            <div class="relative">
                <!-- Popup Trigger -->
                <p id="dropdownButton" class="px-4 py-2 bg-brown text-white-gray hover:cursor-pointer">
                    Sign up
                </p>

                <!-- Popup Menu -->
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden">
                    <a href="./frontend/signup/user_signup.php" class="block px-4 py-2 text-gray-700 hover:bg-white-gray">User</a>
                    <a href="./frontend/signup/seller_signup.php" class="block px-4 py-2 text-gray-700 hover:bg-white-gray">Seller</a>
                </div>
            </div>
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
    <main class="pt-5">
        <section class="flex flex-col gap-5 px-5 pb-5">
            <h1 class="font-Baskerville text-dark-black font-bold text-[35px]">Discover the Joy of Reading</h1>

            <p class="font-Outfit text-dark-gray font-medium text-[18px]">Immerse Yourself in a World of Literature: Explore Our Vast Selection of Books, from Bestsellers to Rare Finds</p>

            <a href="" class="font-Outfit bg-brown flex justify-center items-center h-[40px] text-white-gray text-[16px]">Shop Now</a>
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
</body>

</html>