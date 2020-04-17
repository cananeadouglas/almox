function teste() {

    var saindo = window.document.getElementById('saindo')
    var gravar = window.document.getElementById('gravar')

    saindo.addEventListener('mouseenter', entrar)
    saindo.addEventListener('mouseout', sair)
    gravar.addEventListener('mouseenter', entrar)
    gravar.addEventListener('mouseout', sair)

    function entrar(){
        saindo.style.background = '#FFDAB9';
        gravar.style.background = '#00FF7F';
    }
    function sair(){
        saindo.style.background = '#F8F8FF';
        gravar.style.background = '#F8F8FF';
    }
    

}