<head>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <h2 class="mb-5 text-gray-800 text-center tracking-wide text-xl font-medium">Signup</h2>
        <?php if ($this->session->flashdata("error")): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= $this->session->flashdata("error") ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url(
        	"store",
        ) ?>" method="post" class="bg-white p-5 rounded-lg shadow-sm flex flex-col gap-2 min-h-[480px] justify-start">
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Name:</label>
            <input type="text" name="name" value="<?= set_value(
            	"name",
            ) ?>" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200">
            <?php echo form_error("name"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Email:</label>
            <input type="email" name="email" value="<?= set_value(
            	"email",
            ) ?>" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200">
            <?php echo form_error("email"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Password:</label>
            <input type="password" name="password" value="<?= set_value(
            	"password",
            ) ?>" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200">
            <?php echo form_error("password"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Phone:</label>
            <input type="text" name="phone" value="<?= set_value(
            	"phone",
            ) ?>" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200">
            <?php echo form_error("phone"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Address:</label>
            <textarea name="address" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200 resize-y min-h-[48px] max-h-[120px]"><?= set_value(
            	"address",
            ) ?></textarea>
            <?php echo form_error("address"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Gender:</label>
            <select name="gender" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200 appearance-none bg-[url('data:image/svg+xml;utf8,<svg fill=\"gray\" height=\"16\" viewBox=\"0 0 24 24\" width=\"16\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>')] bg-no-repeat bg-right bg-[length:16px_16px] pr-8">
                <option value="" <?= set_value("gender") == 0
                	? "selected"
                	: "" ?>>Select</option>
                <option value="MALE" <?= set_value("gender") == "MALE"
                	? "selected"
                	: "" ?>>Male</option>
                <option value="FEMALE" <?= set_value("gender") == "FEMALE"
                	? "selected"
                	: "" ?>>Female</option>
            </select>
            <?php echo form_error("gender"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">Role:</label>
            <select name="role" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200 appearance-none bg-[url('data:image/svg+xml;utf8,<svg fill=\"gray\" height=\"16\" viewBox=\"0 0 24 24\" width=\"16\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>')] bg-no-repeat bg-right bg-[length:16px_16px] pr-8">
                <option value="" <?= set_value("role") == ""
                	? "selected"
                	: "" ?>>Select</option>
                <option value="student" <?= set_value("role") == "student"
                	? "selected"
                	: "" ?>>Student</option>
                <option value="teacher" <?= set_value("role") == "teacher"
                	? "selected"
                	: "" ?>>Teacher</option>
            </select>
            <?php echo form_error("role"); ?>
            <label class="mb-1 font-semibold text-gray-800 tracking-wide text-sm">DOB:</label>
            <input type="date" name="dob" value="<?= set_value(
            	"dob",
            ) ?>" class="w-full px-2 py-1.5 mb-3 border border-gray-300 rounded text-sm bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200">
            <?php echo form_error("dob"); ?>
            <input type="submit" value="Save" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white border-none py-2 px-0 rounded cursor-pointer text-sm font-semibold tracking-wide mt-1.5 transition-all duration-200 shadow-sm hover:from-blue-600 hover:to-blue-500 hover:shadow-lg hover:shadow-blue-200">
        </form>
    </section>
</body>

