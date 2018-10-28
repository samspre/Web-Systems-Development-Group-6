<?php
//include "controllers/auth_controller.php";
include "controllers/print_form_controller.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Job Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="#" method="POST">
        <br/>
        <label for="machine" id="machine">Machine used for print</label>
        <select name="machine" required>
           <?php generateMachineDropDown() ?>
        </select>
        <br/>
        <div id="plasticInfo">
            <label for="plastic" id="plasticlabel">Plastic Type</label>
            <select name="plastic"  id="plastictype" required>
                <!--
                <option value="pla">PLA ($0.07/gram)</option>
                <option value="abs">ABS ($0.06/gram)</option>
                <option value="nylon">Nylon ($0.10/gram)</option>
                <option value="flexy">Flexy ($0.09/gram)</option>
                <option value="ngen">nGen ($0.055/gram)</option>
                <option value="resin">Resin ($0.20/mL)</option>
                -->
                <?php generatePlasticsDropDown() ?>
            </select>
            <br/>
            <label for="amount" id="amountlabel">Amount of plastic (in g)</label>
            <input type="text" name="amount" id="plasticamount" required/>
            <br/>
            <label for="brand" id = "brandlabel">Plastic Brand</label>
            <input type="text" name="brand" id = "brand" required/>
            <br/>
            <label for="temp" id = "templabel">Print temperature</label>
            <input type="text" name="temp" id = "temp" required/>
            <br/>
            <label for="color" id = "colorlabel">Color of Plastic</label>
            <input type="text" name="color" id = "color" required/>
            <br/>
            <label for="time">Estimate time to completion (in minutes):</label>
            <input type="number" name="time" min="1" max="1000" required/>
            <br/>
        </div>
        <input type="checkbox" name="forclass" value="1"/>
        <label for="forclass">Is this print for a class?</label>
        <br/>
        <div id="reprintpolicy">
        <p>Your total print is under 50 grams (or 7mL). If your print has failed and has consumed less than 50 grams (or 7mL) of plastic you will not be charged
        for up to two aditional reprint attempts.</p>
        <p><strong>The volunteer present has final say. If you wish to appeal your claim, please email kronmm@rpi.edu</strong></p>
        <input type="checkbox" name="reprintpolicy" value="agree" required/>
        <label for="reprintpolicy"> By checking the box you agree to the reprint policy stated above.</label>
        </div>
        <label for="initials" id = "initialslabel">By initialing here, you agree to the charges entered above.</label>
        <input type="text" name="initials" id="initials" required/>
        <br/>
        <input type="submit" value="Submit"/>
    </form>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/print_form.js"></script>
</html>
