<table>
    <tr>
        <th>Zip Code</th>
        <th>State Code</th>

    </tr>

    <?php foreach ($zipFind as $zipFind): ?>
    <tr>
        <td><?php echo $zipFind['ZipFind']['zip_code']; ?></td>
        <td>
            <?php echo $zipFind['ZipFind']['state_code'];?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>