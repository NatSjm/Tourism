
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    require('./../views/sections/header/header');



    require('./index');




    if ($("body").hasClass("index")) {
        require('./../views/pages/index/index');
    } else if ($("body").hasClass("product-page")) {
        require('./../views/pages/product/product');
    } else if ($("body").hasClass("search-page")) {
        require('./../views/pages/search/filter/filter');
    } else if($("body").hasClass("cart-page")){
        require('./../views/pages/cart/cart');
    } else if($("body").hasClass("orders-page") || $("body").hasClass("purchases-page")){
        require('./../views/pages/orders/order/order');
    }else if($("body").hasClass("seller-page")){
        require('./../views/pages/seller/seller');
    }
    else if($("body").hasClass("product-create-page")){
        require('./../views/pages/product/product-create/product-create');
    }
    else if($("body").hasClass("person-page")){
        require('./../views/pages/person/person');
    }
});
// window.Vue = require('vue');
//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// const app = new Vue({
//     el: '#app'
// });


