<?php
namespace App\Views;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<h2>DATABASE</h2>
<form method="post">
    <label for="input"></label><input type="text" id="input" name="textInput">
    <input type="submit" value="Search"><br>
    Search by
    <input type="radio" id="column1" name="radioInput" value="id">
    <label for="column1"> Id </label>
    <input type="radio" id="column2" name="radioInput" value="name">
    <label for="column2"> Name </label>
    <input type="radio" id="column3" name="radioInput" value="surname">
    <label for="column3"> Surname </label>
    <br><br>
    <table>
</form>
<form method="post">
    <table>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Description</th>
        </tr>
        <?PHP
        foreach ($registry->collection() as $person) {
            echo "<tr>{$person->allInfo()}</tr>";
        }
        ?>
    </table><br>
    <input type="submit" value="Delete person" name="deleted"><br><br>
    <label for="input"></label><input type="text" id="input" name="descriptionInput">
    <input type="submit" value="Change description" name="submitted"><br><br>
    <label for="input">id:</label><input type="text" id="input" name="id"><br>
    <label for="input">name:</label><input type="text" id="input" name="name"><br>
    <label for="input">surname:</label><input type="text" id="input" name="surname"><br>
    <label for="input">description:</label><input type="text" id="input" name="description">
    <input type="submit" value="Add new person" name="newPersonInput">
</form>
</body>
</html>
