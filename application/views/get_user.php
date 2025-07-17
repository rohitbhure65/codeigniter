  <head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>

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

<div class="">
    <!-- <pre style="color:black;padding: 10px;margin: 10px; width:600px; border: 1px solid black"><?php print_r(
    	$this->session->all_userdata()
    ); ?></pre> --> 

   <?php $this->load->view("includes/header.php"); ?>

	<?php if (!empty($this->session->userdata("username"))): ?>
        <div class="flex item-center justify-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 30px; margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
            <h2 style="margin: 0; font-size: 1.5rem; font-weight: 600;">
                Welcome,
                	<?= $this->session->userdata("username")
                 ?>
                <span style="font-size: 1rem; font-weight: 400; opacity: 0.9;">(<?= 
                	$this->session->userdata("role")
                 ?>)</span>
            </h2>
        </div>
    <?php endif; ?>

	<div class="butt" style="justify-content: center; align-items: center; flex-wrap: wrap;">
    <div class="p-2 m-2 text-3xl font-black">STUDENT LIST</div>
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
            <th>Science</th>
            <th>Mathematics</th>
            <th>Hindi</th>
            <th>English</th>
            <th>sst</th>
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
                <td><?= $user["science"] ?></td>
                <td><?= $user["mathematics"] ?></td>
                <td><?= $user["hindi"] ?></td>
                <td><?= $user["english"] ?></td>
                <td><?= $user["sst"] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
