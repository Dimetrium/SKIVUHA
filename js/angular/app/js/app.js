/**
 * Роутер
 */
var app = angular.module('app', ['ngStorage', 'ui.router']);
app.config(['$urlRouterProvider', '$stateProvider', function ($urlRouterProvider, $stateProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider
        .state('home', {
            url: '/',
            templateUrl: 'app/templates/main.html',
            controller: 'MainCtrl as main',
            resolve: {
                books: ['book', function (book) {
                        return book.getBook();
                      }
                    ]
            }
        })
        .state('book', {
            url: '/book/:bookId',
            templateUrl: 'app/templates/bookDetails.html',
            controller: 'BookCtrl as book'
        })
        .state('cart', {
            url: '/cart',
            templateUrl: 'app/templates/cart.html',
            controller: 'CartCtrl as cart'
        })
        .state('buy', {
            url: '/buy',
            templateUrl: 'app/templates/buy.html',
            controller: 'BuyCtrl as buy'
        })



}])