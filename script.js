function teste() {

    var saindo = window.document.getElementById('saindo')

    saindo.addEventListener('mouseenter', entrar)
    saindo.addEventListener('mouseout', sair)

    function entrar(){
        saindo.style.background = '#FFDAB9';
    }
    function sair(){
        saindo.style.background = '#F8F8FF';
    }
    

}