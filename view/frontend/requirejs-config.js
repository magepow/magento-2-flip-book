define('three', ['Magepow_Flipbook/js/plugin/three.min'], function (THREE) {
    window.THREE = THREE;
    return THREE;
});
var config = {
    map: {
        '*': {
            'html2canvas': 'Magepow_Flipbook/js/plugin/html2canvas.min'
        },
    },
    paths: {
        'three'     : 'Magepow_Flipbook/js/plugin/three.min',
        'pdfjs-dist': 'Magepow_Flipbook/js/plugin/pdfjs-dist',
        'lightbox'  : 'Magepow_Flipbook/js/plugin/lightbox',
        'flipbook'  : 'Magepow_Flipbook/js/plugin/3dflipbook.min'
    },
    shim: {
        'html2canvas': {
            deps: ['jquery']
        },
        'three': {
           exports: 'THREE'
        },
        'flipbook': {
            deps: ['jquery','html2canvas', 'three']
        }
    }
};