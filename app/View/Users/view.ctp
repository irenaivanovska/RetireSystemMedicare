<h2>Overview of all users</h2>
<table>
    <tr>
        <th> First Name </th>
        <th> Last Name </th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['firstname']?></td>
        <td><?php echo $user['User']['lastname']?></td>
    </tr>
    <?php endforeach ?>
</table>