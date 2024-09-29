function openEditModal(index, name, price, stock) {
    // Rellena el modal con los datos del producto
    document.getElementById('productIndex').value = index;
    document.getElementById('productName').value = name;
    document.getElementById('productPrice').value = price;
    document.getElementById('productStock').value = stock;
}