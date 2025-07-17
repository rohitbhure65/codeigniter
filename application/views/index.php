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
        <div class="text-3xl font-black mb-4 text-center">STUDENT PROFILE</div>
        <?php
            $url = $this->session->userdata("user_id");
        ?>
        <?php if (empty($users)): ?>
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md text-center">
                <p class="text-lg text-gray-600 mb-6">You are not registered in any class</p>
                <a href="<?= base_url('profile/'. $url) ?>" 
                   class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                   Edit profile
                </a>
            </div>
        <?php else: ?>
            <div class="w-full overflow-auto">
                <table class="min-w-full bg-white border border-gray-200 shadow-sm text-sm rounded-lg">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Roll No</th>
                            <th class="px-4 py-2 border">Section</th>
                            <th class="px-4 py-2 border">Class</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Address</th>
                            <th class="px-4 py-2 border">Gender</th>
                            <th class="px-4 py-2 border">DOB</th>
                            <th class="px-4 py-2 border">Science</th>
                            <th class="px-4 py-2 border">Mathematics</th>
                            <th class="px-4 py-2 border">Hindi</th>
                            <th class="px-4 py-2 border">English</th>
                            <th class="px-4 py-2 border">SST</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php foreach ($users as $user): ?>
                            <tr class="hover:bg-blue-50 even:bg-gray-50 transition-all">
                                <td class="px-4 py-2 border"><?= $user["student_name"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["roll_no"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["section"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["class"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["email"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["phone"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["address"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["gender"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["dob"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["science"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["mathematics"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["hindi"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["english"] ?></td>
                                <td class="px-4 py-2 border"><?= $user["sst"] ?></td>
                            
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>