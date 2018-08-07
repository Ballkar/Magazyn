document.addEventListener("DOMContentLoaded", function() {
    const table =document.querySelector('#tabela');
    const product = table.querySelectorAll('.product');

    for (var i=0;i<product.length;i++){
        const id = product[i].firstElementChild.innerText;
        product[i].addEventListener('click', function () {
            window.location = '/magazyn-master/product?id='+id
        });
    }

});