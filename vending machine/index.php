<?php
    require('./products.php');
    $chocolate = new Items("Chocolate", 1.25);
    $pop = new Items("Pop", 1.50);
    $chip = new Items("Chips", 1.75);
    $products = array($chocolate->getName()=>$chocolate->getPrice(), 
                        $pop->getName()=>$pop->getPrice(), 
                        $chip->getName()=>$chip->getPrice());
?>

<html>
    <head>
        <title>Vending Machine</title>
    </head>
    <body>
        <h3>Vending Machine</h3>
        <?php
            echo "<p>Please select your product:</p>";
            foreach($products as $name => $price) {
                echo "<input type='radio' id='${name}' name='item' value='${name}' onclick='getItemName(event);'>
                <label for='${name}'>${name}</label>";
                echo "&nbsp; &nbsp;<label id=price_${name} value=${price}>Price: ${price}</label><br>";
            }
        ?>
        <form>
            <label for="amout">Amount:</label>
            <input type="number" name="amount" id="amount" readonly><br>
            <button name="submit" id="submit">Submit</button>
        </form>
        <button name="1dollar" id="1dollar" value="1">$1.00</button>
        <button name="25cents" id="25cents" value="0.25">$0.25</button>
        <button name="10cents" id="10cents" value="0.10">$0.10</button>
        <button name="5cents" id="5cents" value="0.05">$0.05</button>
    </body>
    <script>
        var price;
        function getItemName(event) {
            var item = event.target.value;
            price = document.getElementById("price_"+item).innerHTML.split("Price: ")[1];
        }

        document.getElementById("submit").addEventListener("click", function(event){
            event.preventDefault()
        });

        window.onclick = showAmount;
        function showAmount(event) {
            var pressedValue;
            if(event.target.value) {
                pressedValue =  event.target.value;
                console.log(pressedValue);
                switch(pressedValue) {
                    case "1":
                        
                }
            }
        }
    </script>
</html>