document.addEventListener("DOMContentLoaded", function() {
    const tabela =document.querySelector('#tabela');
    const btn = tabela.querySelectorAll('.product');

    for (var i=0;i<btn.length;i++){
        btn[i].addEventListener('click', function () {
            if (parseInt(this.dataset.show,10)===0){
                this.dataset.show=1;
                this.nextElementSibling.classList.remove('d-none');
            }else
            {
                this.dataset.show=0;
                this.nextElementSibling.classList.add('d-none');
            }
        });
    }
});