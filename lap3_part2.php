<?php
include 'students.php';
?> 
<table>
<h2>Application name: PHP class registration</h2>
    <thead>
        <tr>    
            <th>Name</th>
            <th>Email</th>
            <th>Track</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr <?php if ($student['track'] === 'CMS'): ?> style="background-color: red;" <?php endif; ?>>
            <td  style="padding-left: 30px;"><?php echo $student['name']; ?></td>
            <td style="padding-left: 30px;"><?php echo $student['email']; ?></td>
            <td style="padding-left: 30px;"><?php echo $student['track']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>