<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Marks Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- navbar -->
    <?php $this->load->view("includes/header.php"); ?>

    <!-- form -->
    <main class="flex-grow flex items-center justify-center py-10 px-4">
        <div class="bg-white shadow-md rounded px-6 py-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6"><?= isset($user['science']) ? 'Update' : 'Add' ?> Student Marks</h1>
            
            <!-- Display form validation errors -->
            <?php if (validation_errors()): ?>
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            
            <!-- Display flash messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url('marks/store/' . $user['roll_no']); ?>" method="post" class="space-y-4">

                <!-- Student Information -->
                <div class="space-y-2 p-4 bg-gray-50 rounded">
                    <h2 class="font-semibold text-gray-700">Student Information</h2>
                    <div>
                        <label for="roll_no" class="block text-gray-600 text-sm mb-1">Roll No:</label>
                        <input type="text" id="roll_no" name="roll_no"
                               value="<?= html_escape($user['roll_no']) ?>" readonly
                               class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed text-gray-700">
                    </div>
                    <div>
                        <label for="student_name" class="block text-gray-600 text-sm mb-1">Name:</label>
                        <input type="text" id="student_name" name="student_name"
                               value="<?= html_escape($user['student_name']) ?>" readonly
                               class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed text-gray-700">
                    </div>
                    <div>
                        <label class="block text-gray-600 text-sm mb-1">Class:</label>
                        <input type="text" value="<?= html_escape($user['class'] . ' - ' . $user['section']) ?>" readonly
                               class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed text-gray-700">
                    </div>
                </div>

                <!-- Marks Entry -->
                <div class="space-y-4">
                    <h2 class="font-semibold text-gray-700">Subject Marks</h2>
                    
                    <!-- Science -->
                    <div>
                        <label for="science" class="block text-gray-600 text-sm mb-1">Science:</label>
                        <input type="number" id="science" name="science" min="0" max="100" required
                               value="<?= html_escape($user['science'] ?? '') ?>"
                               class="w-full px-3 py-2 border <?= form_error('science') ? 'border-red-500' : 'border-gray-300' ?> rounded focus:ring-blue-500 focus:border-blue-500">
                        <?php echo form_error('science', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                    </div>
                    
                    <!-- Mathematics -->
                    <div>
                        <label for="mathematics" class="block text-gray-600 text-sm mb-1">Mathematics:</label>
                        <input type="number" id="mathematics" name="mathematics" min="0" max="100" required
                               value="<?= html_escape($user['mathematics'] ?? '') ?>"
                               class="w-full px-3 py-2 border <?= form_error('mathematics') ? 'border-red-500' : 'border-gray-300' ?> rounded focus:ring-blue-500 focus:border-blue-500">
                        <?php echo form_error('mathematics', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                    </div>
                    
                    <!-- Hindi -->
                    <div>
                        <label for="hindi" class="block text-gray-600 text-sm mb-1">Hindi:</label>
                        <input type="number" id="hindi" name="hindi" min="0" max="100" required
                               value="<?= html_escape($user['hindi'] ?? '') ?>"
                               class="w-full px-3 py-2 border <?= form_error('hindi') ? 'border-red-500' : 'border-gray-300' ?> rounded focus:ring-blue-500 focus:border-blue-500">
                        <?php echo form_error('hindi', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                    </div>
                    
                    <!-- English -->
                    <div>
                        <label for="english" class="block text-gray-600 text-sm mb-1">English:</label>
                        <input type="number" id="english" name="english" min="0" max="100" required
                               value="<?= html_escape($user['english'] ?? '') ?>"
                               class="w-full px-3 py-2 border <?= form_error('english') ? 'border-red-500' : 'border-gray-300' ?> rounded focus:ring-blue-500 focus:border-blue-500">
                        <?php echo form_error('english', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                    </div>
                    
                    <!-- SST -->
                    <div>
                        <label for="sst" class="block text-gray-600 text-sm mb-1">Social Studies (SST):</label>
                        <input type="number" id="sst" name="sst" min="0" max="100" required
                               value="<?= html_escape($user['sst'] ?? '') ?>"
                               class="w-full px-3 py-2 border <?= form_error('sst') ? 'border-red-500' : 'border-gray-300' ?> rounded focus:ring-blue-500 focus:border-blue-500">
                        <?php echo form_error('sst', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex space-x-3 pt-2">
                    <button type="submit" class="flex-grow bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 font-medium transition duration-200">
                        <?= isset($user['science']) ? 'Update Marks' : 'Save Marks' ?>
                    </button>
                    <a href="<?= base_url('marks') ?>" class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 font-medium transition duration-200 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>