<?php
require_once "c/UsersController.php";
const BASE_URI="/cphp3";
if(sizeof($_POST)>0){
    $request_uri=str_replace(BASE_URI,"",$_SERVER["REQUEST_URI"]);
    $routes=[
            "/users"=>function(){UsersController::bulkDesignationUpdate();}
    ];
    if(array_key_exists($request_uri,$routes))$routes[$request_uri]();
    else echo "<h1>BAD REQUEST</h1>";
    exit();
}
require_once "m/Database.php";
$designations = Database::raw("SELECT * FROM designations");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet"/>
    <title>Hello, world!</title>
</head>
<body>
<form id="userDesignationForm" method="patch">
    <h1>Update Designation
        <select name="designation">
            <?php while($designation = $designations->fetch_assoc()) { ?>
                <option value="<?= $designation["id"] ?>"><?= $designation["name"]?></option><?php
            } ?>
        </select>
        <button type="submit">Go</button>
    </h1>
    <div id="usersTableWrapper">
        <?php require('v/ajax/users.php') ?>
    </div>
</form>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>
