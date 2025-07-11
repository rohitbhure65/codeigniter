<style>
    body { font-family: Arial, sans-serif; }
    h2 { margin-bottom: 20px; }
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
</style>
<h2>User List</h2>
<a href="<?= site_url('user/create') ?>" class="button">Add New</a>
<table>
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
        <td class="actions">
            <a href="<?= base_url('user/edit/'.$user['id']) ?>">Edit</a> |
            <a href="<?= base_url('user/delete/'.$user['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
