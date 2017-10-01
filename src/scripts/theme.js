( function ( $ ) {
    'use strict';
    $( document ).ready( function () {
        $('.nav-toggler').on('click',function() {
        	$('.navigation').toggleClass('open');
        });
    })
} ( jQuery ) );