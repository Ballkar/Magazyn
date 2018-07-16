document.addEventListener("DOMContentLoaded", function() {
    const button =document.getElementsByTagName('button');
    const miejsce = document.getElementsByClassName('hpx50');
    const forms = document.querySelectorAll('.d-none');

    for (var i=0;i<button.length;i++){
        button[i].addEventListener('click', function () {
            const input = this.nextElementSibling;
            input.classList.toggle('d-none');
            console.log(input);
        });
    }
    for (var a=0;a<forms.length;a++){
        forms[a].addEventListener('input', function () {

            miejsce[0].innerText='zmieniłeś '+this.firstElementChild.name;
        });
    }

});