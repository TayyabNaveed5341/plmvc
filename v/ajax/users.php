<?php
require_once "m/User.php";
$users =User::allWithDesignations();

?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">
            <small class="c-pointer" onclick="$('.row_check').prop('checked',true)">check</small>
            <br/>
            <small class="c-pointer" onclick="$('.row_check').prop('checked',false)">uncheck</small>
        </th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Designation</th>
        <th scope="col">Address</th>
        <th scope="col">Contact</th>
    </tr>
    </thead>
    <tbody>
    <?php while($user = $users->fetch_assoc()) { ?>
    <tr>
        <th scope="row"><input class="row_check" name="user[]" type="checkbox" value="<?=$user["id"]?>"/></th>
        <td><?= $user["name"] ?></td>
        <td><?= $user["age"] ?></td>
        <td><?= $user["designation"] ?></td>
        <td><?= $user["address"] ?></td>
        <td><?= $user["contact"] ?></td>
    </tr>
    <?php } ?>

</tbody>