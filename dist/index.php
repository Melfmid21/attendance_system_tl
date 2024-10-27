<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <div id="loginContainer"
        class="transition-opacity duration-300 opacity-100 flex items-center h-screen bg-primary sm:px-2 justify-center ">
        <div
            class="w-full bg-gray-100 rounded-lg shadow dark:border mx-2  md:mx-0 md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 mt-10">
            <a class="flex items-center justify-center mt-6 mb-6 text-2xl font-semibold text-primary">
                <img id="loginLogo" class="w-8 h-8 mr-2" src="./assets/images/logo.png" alt="logo">
                SFC
            </a>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-secondary md:text-2xl dark:text-white">
                    Welcome Back!
                </h1>
                <form class="space-y-4 md:space-y-6" action="#" id="loginForm">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="email" required autocomplete="email">
                    </div>

                    <div>
                        <label for="password"
                            class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required autocomplete="current-password">
                    </div>

                    <div class="flex items-start">

                        <div class="ml-0 text-sm">
                            <a href="./pages/forgot-password-page.php" for="terms"
                                class="font-medium  text-primary hover:underline">Forgot Password
                            </a>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Include your JavaScript file -->

    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="./assets/js/index.js"></script>
</body>

</html>