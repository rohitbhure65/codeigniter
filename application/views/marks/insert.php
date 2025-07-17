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
            <h1 class="text-2xl font-bold text-center mb-6">Insert Marks</h1>

            <form action="<?php echo base_url('marks/store/' . $user['roll_no']); ?>" method="post" class="space-y-4">
                
                <!-- Student Roll No -->
                <div>
                    <label for="student_name" class="block text-gray-700 font-medium mb-1">Student Roll No:</label>
                    <input type="text" id="student_name" name="student_name" 
                           value="<?= $user['roll_no'] ?? '' ?>" readonly
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Subject Dropdown -->
                <div>
                    <label for="subject" class="block text-gray-700 font-medium mb-1">Subject:</label>
                    <select name="subject" id="subject" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" <?= set_value("subject") == "" ? "selected" : "" ?>>Select</option>
                        <option value="science" <?= set_value("subject") == "science" ? "selected" : "" ?>>Science</option>
                        <option value="hindi" <?= set_value("subject") == "hindi" ? "selected" : "" ?>>Hindi</option>
                        <option value="mathematics" <?= set_value("subject") == "mathematics" ? "selected" : "" ?>>Mathematics</option>
                        <option value="english" <?= set_value("subject") == "english" ? "selected" : "" ?>>English</option>
                        <option value="social science" <?= set_value("subject") == "social science" ? "selected" : "" ?>>Social Science</option>
                    </select>
                    <?php echo form_error("subject"); ?>
                </div>

                <!-- Marks Input -->
                <div>
                    <label for="marks" class="block text-gray-700 font-medium mb-1">Marks:</label>
                    <input type="number" id="marks" name="marks" min="0" max="100" required
                           value="<?= set_value('marks') ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php echo form_error("marks"); ?>
                </div>

                <!-- Submit Button -->
                <div>
                    <input type="submit" value="Insert Marks"
                           class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 font-semibold cursor-pointer">
                </div>
            </form>
        </div>
    </main>

</body>
</html>
