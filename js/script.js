$(function () {
    
//    MOBIL MENU
    let $burgerBtn = $('.burger-btn');
    let $greatShadow = $('.great-shadow');
    let $mainMenu = $('.main-menu');
    let $mainMenuItems = $('.main-menu ul');
    let menuController = false;

    function openMenu() {
        menuController = true;
        $burgerBtn.addClass('active');
        $greatShadow.fadeIn(300);
        $mainMenu.addClass('active');
        $mainMenuItems.addClass('active');
        
    }
    function closeMenu(){ 
        $mainMenuItems.removeClass('active');
        setTimeout(function(){
            $mainMenu.removeClass('active');
        },800);
        setTimeout(function(){ 
            $greatShadow.fadeOut(300);
        }, 800);
        setTimeout(function(){
            $burgerBtn.removeClass('active'); 
            menuController = false;
        }, 800);
    }

    $burgerBtn.on('click', function (e) {
        e.preventDefault();
        if (!menuController) {
            openMenu(); 
        }
        else{
            closeMenu(); 
        } 
    });
    
//-------*
    
// ------add selectBox
    $(".selectBox").selectBox();

    
// -------add mask
    $("#tel-field").mask("+7 (999) 999-99-99");
    $("#field-date").mask("99.99.9999");
// ------- 
    
//-------add tabs
    var $conrtolElements = $('.control-panel__item');
    var $displayElement = $('.input-panel__step'); 
     
    $conrtolElements.bind('click', function(e){  
        e.preventDefault();
        let currentIndex = $(this).index();
        $(this).siblings('.control-panel__item').removeClass('current');
        $(this).addClass('current'); 
        let $displayElementsLevel = $(this).parent().next().children('.input-panel__step');
        $displayElementsLevel.removeClass('active');
        $displayElementsLevel.eq(currentIndex).addClass('active');       
    });
    
//--------add accordion
    let $accordionHeads = $('.accordion__head');
    $accordionHeads.bind('click', function(){
        
        $(this)
            .toggleClass('active')
            .next().slideToggle(200);
    })
    
    
});
