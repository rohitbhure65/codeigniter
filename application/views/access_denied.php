<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen text-center px-4">

    <div class="flex flex-col items-center justify-center max-w-xl bg-white shadow-md p-8 rounded-md">
        <h1 class="text-3xl font-bold text-red-600 mb-4">Access Denied</h1>
        <p class="text-gray-700 mb-2">You do not have permission to access this page.</p>
        <p class="text-gray-600 mb-4">If you believe this is an error, please contact the system administrator.</p>
        <p>
            <a href="<?php echo site_url('/'); ?>" class="text-blue-600 underline hover:text-blue-800">Return to Home</a>
        </p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "<?php echo site_url('/'); ?>";
        }, 3000);
    </script>

</body>
</html>
