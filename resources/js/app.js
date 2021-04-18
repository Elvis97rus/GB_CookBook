/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


url = location.pathname;
path_arr = ['/login','/wishlist'];


$('.menu-btn').on('click', function (){
    console.log('asd');
    $('.sidebar').toggleClass('hidden');
    $('.main').toggleClass('w-full slided');
    $('.footer').toggleClass('w-full slided');
});

if(jQuery.inArray(url, path_arr) === -1){
    let slider = document.getElementById("volume");
    let output = document.getElementById("cook-time-value");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
}

$(".goToLogin").click(function(e){
    e.preventDefault();
    window.location.href = '/login';
});

$(".addToWishlist").click(function(e){
    e.preventDefault();
    $(this).toggleClass('liked');
    var recipe = $(this).data('recipe-id');
    // console.log(recipe)
    // var user = $(this).data('user-id');
    $.ajax({
        type: "GET",
        url: '/wishlist/add',
        data: {
            'recipe': recipe
        },
        success: function (data) {
            // Вывод текста результата отправки
            // console.log('OK',data);
        },
        error: function (jqXHR, text, error) {
            // Вывод текста ошибки отправки
            // console.log('404',error);
        }
    });
    if (location.pathname === '/wishlist'){
        location.reload();
    }
    // return false;
});

