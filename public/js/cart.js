const add_to_cart_btns = document.querySelectorAll('.add-to-cart');

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
