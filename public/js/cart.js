const add_to_cart_btns = document.querySelectorAll('.add-to-cart');
const remove_from_cart_btns = document.querySelectorAll('.remove-from-cart');
const update_qty = document.querySelectorAll('.qty');

var getClosest = function (elem, selector) {
    for ( ; elem && elem !== document; elem = elem.parentNode ) {
        if ( elem.matches( selector ) ) return elem;
    }
    return null;
};


let show  = (element, duration=100) => {
    setTimeout(() => {
        element.style.visibility = 'visible';
    }, duration);
}

let hide  = (element, duration=100) => {
    setTimeout(() => {
        element.style.visibility = 'hidden';
    }, duration);
}

function addToCart(product_id){
    fetch('/cart',{
        body: JSON.stringify({'product_id': product_id}),
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes['content'].value
        },
        credentials: "same-origin"
    })
        .then((response) => {
            return response.json();
        }).then((response) => {
        let info_box = document.querySelector('.info-box');
        let count = document.getElementById('counter');
        count.innerHTML = response.count; //Show count
        // alert( response.count); //Show count
        show(info_box, 1000);
        info_box.innerHTML = response.message;
        hide(info_box, 5000);

    })
        .catch((error) => {
            console.log(error);
        });
}

for(let btn of add_to_cart_btns){
    btn.addEventListener('click', (e) => {
        let product_id = e.target.attributes['data-id'].value;
        addToCart(product_id);
    });
}

//Finish working on this to automate the remove buttons
for(let btn of remove_from_cart_btns){
    btn.addEventListener('click', (e) => {
        let product_id = e.target.attributes['data-product_id'].value;
        addToCart(product_id);
    });
}

//Finish working on this to automate the update
for(let btn of update_qty){
    btn.addEventListener('change', (e) => {

        let product_id = e.target.attributes['data-update-id'].value;
        let newqty = e.target.value;
        var priceField = $(this).parent().find('.product-price');
        // console.log(numberField);
        updateCart(product_id, newqty);

    });
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function calculateSubtotal(){
    fetch('/subtotal',{
        body: JSON.stringify({'value': 1}),
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes['content'].value
        },
        credentials: "same-origin"
    })
        .then((response) => {
            return response.json();
        }).then((response) => {

        let subtotal = document.querySelector('#subtotal');
        let delivery_fee = document.querySelector('#delivery_fee');
        let totalAmt = document.querySelector('#totalAmt');
        // subtotal.innerHTML = response.message;
        subtotal.innerHTML = '&#8358;' +numberWithCommas(response.subtotal);
        delivery_fee.innerHTML = '&#8358;' +numberWithCommas(response.delivery_fee);
        totalAmt.innerHTML = '&#8358;' +numberWithCommas(response.total);
        // console.log(price);
        // hide(info_box, 5000);

    })
        .catch((error) => {
            console.log(error);
        });
}
//Update Cart
function updateCart(product_id, newqty){
    fetch('/update-cart',{
        body: JSON.stringify({'product_id': product_id, 'newqty': newqty}),
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes['content'].value
        },
        credentials: "same-origin"
    })
        .then((response) => {
            return response.json();
        }).then((response) => {
        let info_box = document.querySelector('.info-box');
        let subTotal = document.querySelector('#subTotal'+product_id);
        let price = parseFloat(document.querySelector('#price'+product_id).innerHTML);
        let amount = price * newqty;
        // alert( response.count); //Show count
        show(info_box, 1000);
        info_box.innerHTML = response.message;
        subTotal.innerHTML = '&#8358;' +numberWithCommas(amount);
        // console.log(price);
        calculateSubtotal();
        hide(info_box, 5000);

    })
        .catch((error) => {
            console.log(error);
        });
}



