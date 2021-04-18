<?php
session_start();
?>
<link rel="stylesheet" href="Main Page.css">
<script src="Search.js"></script>
<html>

<head>

</head>


<body>
    <div id="mainDiv">
        <form action="searchTable.php" method="GET">
            <fieldset>
            <legend>Select the searching method</legend>
            <input type="radio" id="byName" name="search" value="Search by name" onclick="handler('byName')" checked>
            <label for="byName">By name</label>
            <br>
            <label for="Name" class="lbTxt">Enter the name of the product</label>
            <input type="text" name="Name" id="Name" required>
            <br>


            <br>
            <input class='numberPicker' type="radio" id="byRange" name="search" value="Search by Price range" onclick="handler('byRange')">
            <label for="by Range">By range</label>
            <br>
            <label for="PriceFrom">From</label>
            <input type="number" name="PriceFrom" id="PriceFrom" class='numberPicker' disabled>
            <label for="PriceTo">To</label>
            <input type="number" name="PriceTo" id="PriceTo" disabled>

            <br>

            <input type="submit" value="Search" id="submit">
            </fieldset>
        </form>
    </div>

</body>

</html>