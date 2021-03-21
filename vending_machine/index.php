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
                echo "&nbsp; &nbsp;<label id=price_${name} value=${price}>Price: $${price}</label><br>";
            }
        ?>
        <div>
            <p>Display Amount:</p>
            <form>
                <label for="amout">Amount:</label>
                <input type="number" name="amount" id="amount" value="0" readonly /><br>
                <button name="submit" id="submit">Submit</button>
            </form>
        </div>
        <div>
            <p>Pay from here:</p>
            <button name="1dollar" id="1dollar" value="1">$1.00</button>
            <button name="25cents" id="25cents" value="0.25">$0.25</button>
            <button name="10cents" id="10cents" value="0.10">$0.10</button>
            <button name="5cents" id="5cents" value="0.05">$0.05</button>
        </div>
    </body>
    <script>
        var price;
        var item;

        function $(element) {
            return document.getElementById(element);
        }
        
        function getItemName(event) {
            item = event.target.value;
            price = $("price_"+item).innerHTML.split("Price: $")[1];
            alert("You Select "+item+". You have to pay $"+price);
        }

        $("submit").addEventListener("click", function(event){
            event.preventDefault();
            var amount = $("amount").value;
            if(item) {
                if(amount) {
                    if(amount == price) {
                        alert("That is everything. Enjoy.");
                        document.getElementById("amount").value = 0;
                    }
                    if(amount < price) {
                        var remainder = price - amount;
                        alert("You have to pay more $"+remainder.toFixed(2)+" to get this item.");
                    } else if(amount > price) {
                        var remainder = amount - price;
                        if(remainder == 0) {
                            alert("That is everything. Enjoy.");
                        } else {
                            alert("You paid more $"+remainder.toFixed(2)+". Please collect your change. Enjoy.");
                        }
                        document.getElementById("amount").value = 0;
                    }
                } else {
                    alert("Please enter amount by pressing currency buttons");
                }
            } else {
                alert("Please select product first");
            }
        });

        window.onclick = showAmount;
        function showAmount(event) {
            var buttonValue = event.target.value;
            if(buttonValue === "1" || buttonValue === "0.25" || buttonValue === "0.10" || buttonValue === "0.05") {
                if(item) {
                    var amoutArea = $("amount");
                    var pressedValue;
                    if(event.target.value) {
                        pressedValue =  event.target.value;
                        value = parseFloat(pressedValue);
                        switch(value) {
                            case 1.00:
                                if(amoutArea.value) {
                                    amout = parseFloat(amoutArea.value) + value;
                                    amoutArea.value = amout.toFixed(2);
                                } else {
                                    amoutArea.value = value;
                                }
                                break;
                            case 0.25:
                                if(amoutArea.value) {
                                    amout = parseFloat(amoutArea.value) + value;
                                    amoutArea.value = amout.toFixed(2);
                                } else {
                                    amoutArea.value = value;
                                }
                                break;
                            case 0.10:
                                if(amoutArea.value) {
                                    amout = parseFloat(amoutArea.value) + value;
                                    amoutArea.value = amout.toFixed(2);
                                } else {
                                    amoutArea.value = value;
                                }
                                break;
                            case 0.05:
                                if(amoutArea.value) {
                                    amout = parseFloat(amoutArea.value) + value;
                                    amoutArea.value = amout.toFixed(2);
                                } else {
                                    amoutArea.value = value;
                                }
                                break;
                        }
                    }
                } else {
                    alert("Please select product first");
                }
            }
        }
    </script>
</html>