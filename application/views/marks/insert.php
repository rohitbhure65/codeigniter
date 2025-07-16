<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Marks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

   <!-- navbar  -->
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

    <!-- form -->
    <main class="flex-grow flex items-center justify-center py-10 px-4">
        <div class="bg-white shadow-md rounded px-6 py-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">Insert Marks</h1>

            <form action="<?php echo base_url('marks/store'); ?>" method="post" class="space-y-4">
                <div>
                    <label for="student_name" class="block text-gray-700 font-medium mb-1">Student Roll No:</label>
                    <input type="text" id="student_name" name="student_name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="subject" class="block text-gray-700 font-medium mb-1">Subject:</label>
                    <input type="text" id="subject" name="subject" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="marks" class="block text-gray-700 font-medium mb-1">Marks:</label>
                    <input type="number" id="marks" name="marks" min="0" max="100" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <input type="submit" value="Insert Marks"
                           class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 font-semibold cursor-pointer">
                </div>
            </form>
        </div>
    </main>

</body>
</html>
