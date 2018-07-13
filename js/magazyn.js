document.addEventListener("DOMContentLoaded", function() {
    const tabela =document.querySelector('#tabela');
    const product = tabela.querySelectorAll('.product');

    for (var i=0;i<product.length;i++){
        const id = product[i].firstElementChild.innerText;
        product[i].addEventListener('click', function () {
            window.location = '/magazyn-master/przedmiot?id='+id
        });
    }

});