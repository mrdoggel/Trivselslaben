document.addEventListener("DOMContentLoaded", init);

function init(e){
    e.preventDefault(); 
    var splide = new Splide( '.splide', {
        type   : 'slide',
        speed: number = 500
    } );
    var bar = splide.root.querySelector( '.my-slider-progress-bar' );
    
    
    splide.on( 'mounted move', function () {
        var end = splide.Components.Controller.getEnd() + 1;
        bar.style.width = String( 100 * ( splide.index + 1 ) / end ) + '%';
    } );
    
    splide.mount();
}