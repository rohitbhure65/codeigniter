<h2>User List</h2>
<a href="<?= site_url('user/create') ?>">Add New</a>
<table border="1" cellpadding="10">
    <tr>
        <th>Name</th><th>Email</th><th>Phone</th><th>Address</th>
        <th>Gender</th><th>DOB</th><th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['phone'] ?></td>  
        <td><?= $user['address'] ?></td>
        <td><?= $user['gender'] ?></td>
        <td><?= $user['dob'] ?></td>
        <td>
            <a href="<?= base_url('user/edit/'.$user['id']) ?>">Edit</a> |
            <a href="<?= base_url('user/delete/'.$user['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
