
let productQuantities = document.getElementsByClassName("product-quantity");

for (let index = 0; index < productQuantities.length; index++) {
    let productQuantity = productQuantities[index];
    productQuantity.addEventListener("change", quantityChanged);
}

let removeCartItemButtons = document.getElementsByName("remove_product_id");
for (let index = 0; index < removeCartItemButtons.length; index++) {
    const button = removeCartItemButtons[index];
    button.addEventListener("click", removeCartItemClicked);
}


function removeCartItemClicked(event) {
    let removeButton = event.target;
    let cartItem = removeButton.parentElement.parentElement;
    let id = cartItem.id;
    let price = cartItem.getElementsByClassName("product-price")[0].innerText;
    let url = `/other/music_house/addRemoveToCart.php?remove_product_id=${id}&product_price=${price}`;
    
    fetch(url)
    .then(res => {
        if (res.ok) {
            return res.json();
        } else {
            console.log("error");
        }
    })
    .then(() => {
        // Remove element from front-end
        cartItem.remove();
        // Update total
        updateCartTotal();
        // Update cart item count
        let cartCountElement = document.getElementsByName("products_sum")[0];
        let cartCount = parseFloat(cartCountElement.innerText.replace("Items: ", ''));
        cartCountElement.innerText = "Items: " + (cartCount - 1);
        // No checkout with empty cart
        if (cartCount-1 == 0) {
            cartCountElement.nextElementSibling.disabled = true;
        }
    })
    .catch(error => console.log(error))
}

function quantityChanged(event) {
    // disallow negative numbers
    let quantityElement = event.target;
    let maxQuantity = parseFloat(quantityElement.max);
    if (isNaN(quantityElement.value) || quantityElement.value < 1) {
        quantityElement.value = 1;
    }
    if (quantityElement.value > maxQuantity) {
        quantityElement.value = maxQuantity;
    }
    updateProductSum(event)
}

function updateProductSum(event) {
    let cartItem = event.currentTarget.parentNode;
    let quantity = parseFloat(event.target.value);
    let price = parseFloat(cartItem.getElementsByClassName("product-price")[0].innerText);
    let sumElement = cartItem.getElementsByClassName("product-price-sum")[0];
    sumElement.innerText = Math.round((quantity*price) * 100) / 100;
    updateCartTotal()
}

function updateCartTotal() {
    let productSums = document.getElementsByClassName("product-price-sum");
    let total = 0;
    for (let i = 0; i < productSums.length; i++) {
        let productSum = productSums[i];
        total = total + parseFloat(productSum.innerText);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName("cart-total")[0].innerText = "$ " + total;
}

