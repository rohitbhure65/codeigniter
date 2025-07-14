<!DOCTYPE html>
<html>
<head>
    <title>Debug - User Data Structure</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .debug-container { background: #f5f5f5; padding: 20px; border-radius: 5px; }
        .user-block { background: white; margin: 10px 0; padding: 15px; border-left: 4px solid #007bff; }
        .data-table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .data-table th { background: #f2f2f2; }
        .null-value { color: #999; font-style: italic; }
        .empty-value { color: #c00; font-weight: bold; }
    </style>
</head>
<body>
    <div class="debug-container">
        <h1>Debug: User Data Structure</h1>

        <h2>Total Users Found: <?= count($users) ?></h2>

        <?php if (empty($users)): ?>
            <div class="user-block">
                <strong style="color: red;">No users found! Check your database connection and data.</strong>
            </div>
        <?php else: ?>

            <h3>Available Data Fields:</h3>
            <div class="user-block">
                <?php
                $first_user = $users[0];
                $fields = array_keys($first_user);
                echo "<strong>Fields in each user record:</strong><br>";
                foreach ($fields as $field) {
                    echo "- " . $field . "<br>";
                }
                ?>
            </div>

            <h3>User Details:</h3>
            <?php foreach ($users as $index => $user): ?>
                <div class="user-block">
                    <h4>User #<?= $index + 1 ?></h4>
                    <table class="data-table">
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th>Empty?</th>
                        </tr>
                        <?php foreach ($user as $key => $value): ?>
                            <tr>
                                <td><strong><?= $key ?></strong></td>
                                <td>
                                    <?php if (is_null($value)): ?>
                                        <span class="null-value">NULL</span>
                                    <?php elseif (empty($value) && $value !== '0'): ?>
                                        <span class="empty-value">EMPTY</span>
                                    <?php else: ?>
                                        <?= htmlspecialchars($value) ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= gettype($value) ?></td>
                                <td><?= empty($value) && $value !== '0' ? 'Yes' : 'No' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <h5>Marks-Related Data:</h5>
                    <ul>
                        <li><strong>Subject Name:</strong>
                            <?php if (isset($user['subject_name'])): ?>
                                <?= !empty($user['subject_name']) ? htmlspecialchars($user['subject_name']) : '<span class="empty-value">EMPTY</span>' ?>
                            <?php else: ?>
                                <span class="null-value">NOT SET</span>
                            <?php endif; ?>
                        </li>
                        <li><strong>Marks:</strong>
                            <?php if (isset($user['marks'])): ?>
                                <?= !empty($user['marks']) ? htmlspecialchars($user['marks']) : '<span class="empty-value">EMPTY</span>' ?>
                            <?php else: ?>
                                <span class="null-value">NOT SET</span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>

            <h3>Raw Data Dump:</h3>
            <div class="user-block">
                <pre><?= print_r($users, true) ?></pre>
            </div>

        <?php endif; ?>

        <div class="user-block">
            <h4>Database Query Being Used:</h4>
            <code>
                SELECT users.*,students.*,students.class, students.section, subjects.name AS subject_name,marks.marks<br>
                FROM users<br>
                LEFT JOIN students ON users.id = students.user_id<br>
                LEFT JOIN marks ON users.id = marks.student_id<br>
                LEFT JOIN subjects ON marks.subject_id = subjects.id<br>
                WHERE users.role = 'student'
            </code>
        </div>

        <div class="user-block">
            <h4>Common Issues and Solutions:</h4>
            <ul>
                <li><strong>If marks are NULL/EMPTY:</strong> Check if data exists in the 'marks' table</li>
                <li><strong>If subject_name is NULL/EMPTY:</strong> Check if data exists in the 'subjects' table</li>
                <li><strong>If no users found:</strong> Check if users with role='student' exist</li>
                <li><strong>If students data is missing:</strong> Check if students table has records linked to users</li>
            </ul>
        </div>
    </div>
</body>
</html>
