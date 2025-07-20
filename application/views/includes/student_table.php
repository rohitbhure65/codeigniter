<?php
// Extract filter values from GET parameters for form defaults
$class_filter = $this->input->get('class') ?? '';
$name_filter = $this->input->get('name') ?? '';
$section_filter = $this->input->get('section') ?? '';
$gender_filter = $this->input->get('gender') ?? '';
$marks_filter = $this->input->get('marks') ?? '';
$sort_order = $this->input->get('sort') ?? '';
?>

<div class="w-full max-w-full px-4 py-6 bg-white rounded-lg shadow-md mb-6">
    <form method="get" action="" class="flex flex-wrap gap-4 items-end">
        <div>
            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
            <input type="text" name="class" id="class" value="<?= htmlspecialchars($class_filter) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
        </div>
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($name_filter) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
        </div>
        <div>
            <label for="section" class="block text-sm font-medium text-gray-700">Section</label>
            <input type="text" name="section" id="section" value="<?= htmlspecialchars($section_filter) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
        </div>
        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" id="gender" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="">All</option>
                <option value="male" <?= $gender_filter === 'male' ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= $gender_filter === 'female' ? 'selected' : '' ?>>Female</option>
                <option value="other" <?= $gender_filter === 'other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div>
            <label for="marks" class="block text-sm font-medium text-gray-700">Minimum Total Marks</label>
            <input type="number" name="marks" id="marks" min="0" max="500" value="<?= htmlspecialchars($marks_filter) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
        </div>
        <div>
            <label for="sort" class="block text-sm font-medium text-gray-700">Sort by Marks</label>
            <select name="sort" id="sort" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="">None</option>
                <option value="asc" <?= $sort_order === 'asc' ? 'selected' : '' ?>>Ascending</option>
                <option value="desc" <?= $sort_order === 'desc' ? 'selected' : '' ?>>Descending</option>
            </select>
        </div>
        <div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Filter
            </button>
        </div>
    </form>
</div>

<div class="w-full overflow-auto bg-white rounded-lg shadow-md p-4">
    <table class="min-w-full border border-gray-200 shadow-sm text-sm rounded-lg">
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
                <th class="px-4 py-2 border">Total Marks</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <?php
                        $total_marks = ($user['science'] ?? 0) + ($user['mathematics'] ?? 0) + ($user['hindi'] ?? 0) + ($user['english'] ?? 0) + ($user['sst'] ?? 0);
                    ?>
                    <tr class="hover:bg-blue-50 even:bg-gray-50 transition-all">
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["student_name"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["roll_no"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["section"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["class"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["email"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["phone"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["address"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["gender"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["dob"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["science"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["mathematics"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["hindi"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["english"]) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($user["sst"]) ?></td>
                        <td class="px-4 py-2 border"><?= $total_marks ?></td>
                        <td class="px-4 py-2 border">
                            <a href="<?= base_url('marks/insert/' . $user['roll_no']) ?>">
                                <button class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-full shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                    Edit
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="16" class="text-center py-4">No students found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
