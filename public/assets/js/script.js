function menuMovel() {
    const topoMenu = document.querySelector('.topo-cabecalho');
    const menu = document.querySelector('#menu');
    const imgMenu = document.querySelector('#menu logo');


    if(window.pageYOffset >= 8) {
        topoMenu.classList.add('d-none');
        menu.classList.remove('menu');
        menu.classList.add('menu-movel');
    }else {
        topoMenu.classList.remove('d-none');
        menu.classList.remove('menu-movel');
        menu.classList.add('menu');
    }
}

window.addEventListener('scroll', function() {
    menuMovel();
});
