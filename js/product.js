document.addEventListener("DOMContentLoaded", function() {
    const button =document.getElementsByTagName('button');
    const place = document.getElementsByClassName('hpx50');
    const forms = document.querySelectorAll('.d-none');

    for (var i=0;i<button.length;i++){
        const formActive = forms[i];
        button[i].addEventListener('click', function () {
            for(var i=0;i<forms.length;i++){
                forms[i].classList.add('d-none');
            }
            formActive.classList.toggle('d-none');
        });
    }
    for (var a=0;a<forms.length;a++){
        forms[a].addEventListener('input', function () {
            place[0].innerText='zmieniłeś '+this.firstElementChild.name;
        });
    }

});