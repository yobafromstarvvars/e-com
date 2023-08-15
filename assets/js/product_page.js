// PRODUCT CARDS AND PAGES PROCESSING


let removeFromCartBtns = document.getElementsByClassName("remove-from-cart-btn");
let addToCartBtns = document.getElementsByClassName("add-to-cart-btn");

for (let index = 0; index < removeFromCartBtns.length; index++) {
    let button = removeFromCartBtns[index];
    button.addEventListener("click", addRemoveToCart)
}

for (let index = 0; index < addToCartBtns.length; index++) {
    let button = addToCartBtns[index];
    button.addEventListener("click", addRemoveToCart)
}

function addRemoveToCart(event) {
    let id = event.currentTarget.value;
    let action = event.currentTarget.name;
    let price = event.currentTarget.parentNode;
    price = price.getElementsByClassName("product_price")[0].value;
    let url = `/other/music_house/addRemoveToCart.php?${action}=${id}&product_price=${price}`;
    fetch(url)
    .then(res => {
        if (res.ok) {
            return res.json();
        } else {
            console.log("error");
        }
    })
    .then(flipAction(event))
    .catch(error => console.log(error))
} 

function flipAction(event) {
    // Change 'add' btn to 'remove' and vice versa
    let button = event.currentTarget;
    if (button.name == 'remove_product_id') {
        button.classList.remove("btn-danger", "remove-from-cart-btn")
        button.classList.add("btn-warning", "add-to-cart-btn")
        button.name = 'add_product_id';
        button.innerText = "Add to cart";
        
    } else {
        button.classList.remove("btn-warning", "add-to-cart-btn")
        button.classList.add("btn-danger", "remove-from-cart-btn")
        button.name = 'remove_product_id';
        button.innerText = "Remove from cart";

    }
}