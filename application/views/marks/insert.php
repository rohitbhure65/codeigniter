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
    <?php $this->load->view("includes/header.php"); ?>

    <!-- form -->
    <main class="flex-grow flex items-center justify-center py-10 px-4">
        <div class="bg-white shadow-md rounded px-6 py-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">Insert/Update Marks</h1>
            <?= print_r($user)?>
            <form action="<?php echo base_url('marks/store/' . $user['roll_no']); ?>" method="post" class="space-y-4">

                <!-- Roll No -->
                <div>
                    <label for="roll_no" class="block text-gray-700 font-medium mb-1">Student Roll No:</label>
                    <input type="text" id="roll_no" name="roll_no"
                           value="<?= $user['roll_no'] ?>" readonly
                           class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed">
                </div>

                <!-- Name -->
                <div>
                    <label for="student_name" class="block text-gray-700 font-medium mb-1">Student Name:</label>
                    <input type="text" id="student_name" name="student_name"
                           value="<?= $user['student_name'] ?>" readonly
                           class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed">
                </div>

                <!-- Science -->
                <div>
                    <label for="science" class="block text-gray-700 font-medium mb-1">Science:</label>
                    <input type="number" id="science" name="science" min="0" max="100"
                           value="<?= $user['science'] ?? '' ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- Mathematics -->
                <div>
                    <label for="mathematics" class="block text-gray-700 font-medium mb-1">Mathematics:</label>
                    <input type="number" id="mathematics" name="mathematics" min="0" max="100"
                           value="<?= $user['mathematics'] ?? '' ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- Hindi -->
                <div>
                    <label for="hindi" class="block text-gray-700 font-medium mb-1">Hindi:</label>
                    <input type="number" id="hindi" name="hindi" min="0" max="100"
                           value="<?= $user['hindi'] ?? '' ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- English -->
                <div>
                    <label for="english" class="block text-gray-700 font-medium mb-1">English:</label>
                    <input type="number" id="english" name="english" min="0" max="100"
                           value="<?= $user['english'] ?? '' ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- sst -->
                <div>
                    <label for="sst" class="block text-gray-700 font-medium mb-1">sst:</label>
                    <input type="number" id="sst" name="sst" min="0" max="100"
                           value="<?= $user['sst'] ?? '' ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500">
                           <?php echo form_error("sst"); ?>
                </div>

                <!-- Submit -->
                <div>
                    <input type="submit" value="Save Marks"
                           class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 font-semibold cursor-pointer">
                </div>
            </form>
        </div>
    </main>

</body>
</html>
