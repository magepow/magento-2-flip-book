define('three', ['Magepow_FlipBook/js/plugin/three.min'], function (THREE) {
    window.THREE = THREE;
    return THREE;
});
var config = {
    map: {
        '*': {
            'html2canvas': 'Magepow_FlipBook/js/plugin/html2canvas.min'
        },
    },
   paths: {
        'three'     : 'Magepow_FlipBook/js/plugin/three.min',
        'pdfjs-dist': 'Magepow_FlipBook/js/plugin/pdfjs-dist',
        'flipbook'  : 'Magepow_FlipBook/js/plugin/3dflipbook.min'
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