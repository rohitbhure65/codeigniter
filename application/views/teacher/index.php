<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Student List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-50 text-gray-800">
    
    <?php $this->load->view("includes/header.php"); ?>

    <?php if (!empty($this->session->userdata("username"))): ?>
        <div class="flex justify-center items-center bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-4 shadow-md mb-6">
            <h2 class="text-xl font-semibold">
                Welcome, <?= $this->session->userdata("username") ?>
                <span class="text-base font-normal opacity-90">(<?= $this->session->userdata("role") ?>)</span>
            </h2>
        </div>
    <?php endif; ?>
    <div class="flex flex-col items-center px-4 md:px-10 py-6">
       <div class="text-4xl font-extrabold mb-6 text-center  drop-shadow-lg tracking-wide">
  ADMIN DASHBOARD
</div>

    </div>
</body>
</html>
