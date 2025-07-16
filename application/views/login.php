  <head>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="font-sans bg-gray-100 flex justify-center items-center w-screen h-screen">
      <section class="flex flex-col justify-center items-center w-full max-w-sm h-screen">
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
