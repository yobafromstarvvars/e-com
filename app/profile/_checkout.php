<?php ?>

<form class="form-regular form-center" action="_checkout-process.php" method="post">
        <h1>Checkout</h1>
        <h3>Summary: ₽
                <?= $_SESSION["cart_sum"] ?>
        </h3>
        <div>
                <label for="card_number">Card number (Visa / Mastercard)</label>
                <input class="w-100" id="card_number" name="card_number" type="text" maxlength="16" aria-label="XXXX XXXX XXXX XXXX"
                        placeholder="XXXX XXXX XXXX XXXX" required>
        </div>

        <div>
                <label for="card_holder">Card holder name</label>
                <input class="w-100" id="card_holder" required name="card_holder" type="text" maxlength="128" aria-label="Card holder name"
                        placeholder="Card holder name">
        </div>

        <div>
                <label for="valid_thru">Valid thru</label>
                <input class="w-100" id="valid_thru" required name="valid_thru" type="date" maxlength="4" aria-label="Valid thru"
                        placeholder="Valid thru">
        </div>

        <div>
                <label for="CVV">CVV</label>
                <input class="w-100" id="CVV" name="CVV" type="text" maxlength="3" aria-label="CVV" placeholder="CVV" required>
        </div>


        <button type="submit">Pay</button>

</form>