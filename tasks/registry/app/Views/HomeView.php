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
<form method="post" action="/search">
    <label for="inputData"></label><input type="text" id="inputData" name="textInput">
    <input type="submit" value="search" name="search"><br>
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

<form method="post" action="/delete">
    <table>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Description</th>
        </tr>

        <?PHP
        if (isset($_POST['search'])) {
            foreach ($collection->collection() as $person) {
                echo "<tr>{$person->allInfo()}</tr>";
            }
        }
        ?>
    </table>
    <br>
    <input type="submit" value="delete person" name="delete">
    <br><br>
    <label for="input"></label><input type="text" id="input" name="descriptionInput">
    <input type="submit" value="change description" name="change" formaction="/change"><br><br>
</form>
<form method="post" action="/store">
    <label for="input1">id:</label><input type="text" id="input1" name="id"><br>
    <label for="input2">name:</label><input type="text" id="input2" name="name"><br>
    <label for="input3">surname:</label><input type="text" id="input3" name="surname"><br>
    <label for="input4">description:</label><input type="text" id="input4" name="description">
    <input type="submit" value="store person" name="store">
</form>
</body>
</html>
