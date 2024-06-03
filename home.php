<?php

require_once("TextileClass.php");
// require_once("storeClass.php");
require_once("home.html");

try {
    /*insert the data from Fields to database and check if all Fields are filled*/
    if(isset($_POST['id_item']) && (!is_numeric($_POST['id_item'])))/*if id is not correct or not exist*/
    {
        throw new Exception("<p>please enter the correct id item</p>");
    }
    else if(isset($_POST['id_item']) && (Textile::checkId($_POST['id_item'])))/*check if the item already exists*/
    {
        throw new Exception("<p>Id: ".$_POST['id_item'].";  is already exist</p>");
    }
    else if(isset($_POST['price_item']) && (!is_numeric($_POST['price_item'])))/*if the price is not correct or does not exist*/
    {
        throw new Exception("<p>please enter the correct price item</p>");
    }
    else if((isset($_POST['id_item'])&&($_POST['id_item']!= null))&&(isset($_POST['model_item'])&&
    ($_POST['model_item'] != null))&&(isset($_POST['price_item'])&&($_POST['price_item'] != null))&&(isset($_POST['nameOfStore'])&& ($_POST['nameOfStore'] != null))){
        /*check all fields are filled and put them in variables*/
        $id = $_POST['id_item'];
        $model= $_POST['model_item'];
        $price = $_POST['price_item'];
        $s_name= $_POST['nameOfStore'];

        $Textile = new Textile();
        $Textile->insert($id, $model, $price);

        /* $someStore = new store();*/
        /* $someStore->insert($id, $s_name);/*insert the name of the store*/

        echo "<br><p>insert success</p><br>
              id: $id, model: $model, price: $price, Store Name: $s_name</p>";
    }
    /*delete the item from the database*/
    else if(isset($_POST['_idDel'])){
        $Textile = new Textile();
        $Textile->delete($_POST['_idDel']);
        echo "<p>
            Success Delete<br> Textile:<br><br>;".$_POST['_idDel']."</p>";
    }
    else {
        /*if all fields are not filled*/
        throw new Exception("<p>please fill all fields</p>");
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Textile Store</title>
    <!--link to css-->
    <link href="s.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<pre>Insert Textile to Store</pre>
<form action="" method="post"><br><br><p>
        Id &#160;<input type="text" name="id_item" placeholder="id"><br><br>
        Model &#160; <input type="text" name="model_item" placeholder="model"><br><br>
        Price &#160; <input type="text" name="price_item" placeholder="price"><br><br>
        Store &#160;<input type="text" name="nameOfStore" placeholder="Store Name"><br><br>
    </p>
    <input type="submit" value="Add Textile">
</form>
<div class="_del"><br>
    <pre>Delete Textile from Store</pre><br><br>
    <form action="" method="post">
    <p>
        item Id <input type="text" name="_idDel" placeholder="id"><br><br>
    </p>
        <input type="submit" value="Delete Textile">
</div>
</form>
<br>
<br>
<br>
</body>
</html>