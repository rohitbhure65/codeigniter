  <head>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="font-sans bg-gray-100 min-h-screen flex flex-col">
      <header>
        <nav class="bg-white border-b border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 sm:h-9 mr-2" alt="Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Student Management System</span>
                </a>

                <div class="flex items-center lg:order-2">
                    <?php if (empty($this->session->userdata("username"))) { ?>
                        <a href="register" class="text-gray-800 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 border rounded-lg text-sm px-4 py-2 mr-2">Register</a>
                        <a href="login" class="text-gray-800 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 border rounded-lg text-sm px-4 py-2 mr-2">Login</a>
                    <?php } else { ?>
                        <a href="logout" class="text-gray-800 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 border rounded-lg text-sm px-4 py-2 mr-2">Logout</a>
                    <?php } ?>
                    <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5h14M3 10h14M3 15h14" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu">
                    <!-- Optional additional nav items here -->
                </div>
            </div>
        </nav>
    </header>
      <section class="w-full max-w-sm mx-auto flex-1 flex flex-col justify-center px-4 py-10">
          <h2 class="mb-5 text-slate-800 text-center tracking-wide text-xl">Login</h2>
          <form action="<?= site_url(
          	"auth",
          ) ?>" method="post" class="bg-white p-5 rounded-lg shadow-sm flex flex-col gap-2">
              <label class="mb-1 font-semibold text-slate-800 tracking-wide text-sm">Email:</label>
              <input type="email" name="email"
                     value="<?= isset($email) ? $email : "" ?>"
                     class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-colors duration-200 <?= isset(
                     	$validation_errors["email"],
                     )
                     	? "!border-red-500 !bg-red-50 !ring-red-100"
                     	: "" ?>">
              <?php if (isset($validation_errors["email"])): ?>
                  <p class="text-red-600 text-xs mb-2 -mt-2 bg-red-50 px-2 py-1.5 rounded border-l-4 border-red-500 font-medium"><?= $validation_errors[
                  	"email"
                  ] ?></p>
              <?php endif; ?>

              <label class="mb-1 font-semibold text-slate-800 tracking-wide text-sm">Password:</label>
              <input type="password" name="password" value=""
                     class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-colors duration-200 <?= isset(
                     	$validation_errors["password"],
                     )
                     	? "!border-red-500 !bg-red-50 !ring-red-100"
                     	: "" ?>">
              <?php if (isset($validation_errors["password"])): ?>
                  <p class="text-red-600 text-xs mb-2 -mt-2 bg-red-50 px-2 py-1.5 rounded border-l-4 border-red-500 font-medium"><?= $validation_errors[
                  	"password"
                  ] ?></p>
              <?php endif; ?>

              <input type="submit" value="Login" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white border-none py-2 rounded cursor-pointer text-sm font-semibold tracking-wide mt-1.5 transition-all duration-200 shadow-sm hover:from-blue-600 hover:to-blue-500 hover:shadow-md hover:shadow-blue-200">
          </form>
      </section>
  </body>
