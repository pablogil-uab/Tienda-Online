



async function addToCart(productId) {
    const quantityInput = document.getElementById('quantity');
    const unitsProduct = parseInt(quantityInput.value, 10);

    if (isNaN(unitsProduct) || unitsProduct <= 0) {
        alert("Por favor, selecciona una cantidad válida.");
        return;
    }

    const response = await fetch('./controller/c_carrito.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ 
            action: 'add_to_cart', 
            id: productId, 
            unitsProduct: unitsProduct 
        })
    });

    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }

    const result = await response.json();
    if (result.success) {
        alert(result.message);
        updateCartSummary();
    } else {
        alert(result.message || "Hubo un error al añadir al carrito.");
    }
}

async function updateCartSummary() {
    const response = await fetch('./controller/c_carrito.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'get_cart_summary' })
    });

    if (response.ok) {
        const data = await response.json();
       
        document.getElementById('cart-total-items').innerText = `Número de productos: ${data.totalUnits}`;
        document.getElementById('cart-total-price').innerText = `Importe total: €${data.totalPrice.toFixed(2)}`;
    } else {
        console.error('Error');
    }
}




async function emptyCart() {
    const response = await fetch('./controller/c_carrito.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'empty_cart' })
    });

    if (!response.ok) throw new Error('Error');

    const result = await response.json();

    if (result.success) {
        alert(result.message);

      
        actualizarCartUI();
    } else {
        alert(result.message);
    }


}

function actualizarCartUI() {
    
    const cartTableBody = document.querySelector('table.cart-table tbody');
    if (cartTableBody) {
        cartTableBody.innerHTML = ''; 
    }


    const cartSummary = document.getElementById('cart-summary');
    if (cartSummary) {
        cartSummary.innerHTML = '<p> Tu carrito está vacío. ¡Añade productos para verlos en el carrito!</p>';
    }
    
    const emptyCartButton = document.querySelector('.btn-warning');
    if (emptyCartButton) {
        emptyCartButton.style.display = 'none';

    }

 
    const checkoutButton = document.querySelector('.btn-success');
    if (checkoutButton) {
        checkoutButton.style.display = 'none';
    }


    document.getElementById('cart-total-items').innerText = 'Número de productos: 0';
    document.getElementById('cart-total-price').innerText = 'Importe total: €0.00';
}


async function modifyQuantity(productId) {
    const newQuantity = document.getElementById(`quantity-${productId}`).value;
    const response = await fetch('./controller/c_carrito.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'modify_quantity', id: productId, newQuantity: newQuantity })
    });
    const result = await response.json();
    if (result.success) {

        alert(result.message);
        location.reload();
    } else {
        alert(result.message);
    }
}

async function deleteProduct(productId) {
    const response = await fetch('./controller/c_carrito.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'delete_product', id: productId })
    });
    const result = await response.json();
    if (result.success) {
        alert(result.message);

        location.reload();
    } else {


        alert(result.message);
    }
}
