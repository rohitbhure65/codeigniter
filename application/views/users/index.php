<style>
    body { font-family: Arial, sans-serif; }
    h2 { margin-bottom: 20px; }
    .homepageh1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin: 20px;
        color: red;
    }
    a.button {
        background: #007bff;
        color: #fff !important;
        padding: 6px 14px;
        border-radius: 4px;
        text-decoration: none;
        margin-bottom: 10px;
        display: inline-block;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px 12px;
        text-align: left;
    }
    th {
        background: #f2f2f2;
    }
    tr:nth-child(even) { background: #fafafa; }
    tr:hover { background: #f1f7ff; }
    .actions a {
        margin-right: 8px;
        color: #007bff;
        text-decoration: none;
    }
    .actions a:last-child { margin-right: 0; }
    .signup-btn {
        background: linear-gradient(90deg, #4f8cff 0%, #007bff 100%);
        color: #fff;
        border: none;
        padding: 8px 22px;
        border-radius: 5px;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 18px;
        margin-top: 8px;
        cursor: pointer;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px #e3e3f3;
    }
    .signup-btn:hover {
        background: linear-gradient(90deg, #007bff 0%, #4f8cff 100%);
        box-shadow: 0 4px 16px #d3e3ff;
    }
    .butt {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
</style>

<div class="homepageh1">
	<h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 15px; color: #333; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Student List</h1>
	<div class="butt" style="justify-content: center; align-items: center; flex-wrap: wrap;">
		<a href="user/register" style="text-decoration: none;"><button class="signup-btn" style="text-transform: uppercase; min-width: 120px;">signup</button></a>
		<a href="user/login" style="text-decoration: none;"><button class="signup-btn" style="text-transform: uppercase; min-width: 120px;">Login</button></a>
	</div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll No</th>
                <th>Section</th>
                <th>Class</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user["student_name"] ?></td>
                    <td><?= $user["roll_no"] ?></td>
                    <td><?= $user["section"] ?></td>
                    <td><?= $user["class"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td><?= $user["phone"] ?></td>
                    <td><?= $user["address"] ?></td>
                    <td><?= $user["gender"] ?></td>
                    <td><?= $user["dob"] ?></td>
                    <td>
                        <?php
                        $has_marks = false;
                        $subjects = [
                        	"science_marks",
                        	"english_marks",
                        	"math_marks",
                        ];
                        foreach ($subjects as $subject) {
                        	if (!empty($user[$subject])) {
                        		$has_marks = true;
                        		break;
                        	}
                        }
                        ?>

                        <?php if ($has_marks): ?>
                            <ul>
                                <?php if (!empty($user["science_marks"])): ?>
                                    <li>Science - <?= $user[
                                    	"science_marks"
                                    ] ?></li>
                                <?php endif; ?>
                                <?php if (!empty($user["english_marks"])): ?>
                                    <li>English - <?= $user[
                                    	"english_marks"
                                    ] ?></li>
                                <?php endif; ?>
                                <?php if (!empty($user["math_marks"])): ?>
                                    <li>Mathematics - <?= $user[
                                    	"math_marks"
                                    ] ?></li>
                                <?php endif; ?>
                            </ul>
                        <?php else: ?>
                            <span style="color: #888;">No subjects/marks assigned</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
