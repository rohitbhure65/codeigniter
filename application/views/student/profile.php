<?php
// Check if student data is passed
$user = isset($user) ? $user : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col items-center py-10">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Student Profile Form</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <span class="block sm:inline"><?php echo $this->session->flashdata('success'); ?></span>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('student/create'); ?>" class="flex flex-col gap-4">

            <div>
                <label for="roll_no" class="block text-gray-700 font-semibold mb-1">Roll No:</label>
                <input type="text" id="roll_no" name="roll_no" value="<?php echo $user ? htmlspecialchars($user['roll_no']) : ''; ?>"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
            </div>

            <div>
                <label for="section" class="block text-gray-700 font-semibold mb-1">Section:</label>
                <input type="text" id="section" name="section" value="<?php echo $user ? htmlspecialchars($user['section']) : ''; ?>"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
            </div>

            <div>
                <label for="class" class="block text-gray-700 font-semibold mb-1">Class:</label>
                <input type="text" id="class" name="class" value="<?php echo $user ? htmlspecialchars($user['class']) : ''; ?>"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-semibold transition duration-200">
                    Update Profile
                </button>
            </div>
        </form>
    </div>

</body>
</html>
