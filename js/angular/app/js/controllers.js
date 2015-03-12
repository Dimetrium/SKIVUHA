var app = angular.module('shop',[]);

app.factory('book', function($http) {
    return {
        getBook: function(callback) {
            $http.get('app/data/data.json').success(callback);
        }
    };
});

app.controller('shopController', function($scope, book){
    book.getBook(function(rez){
             //this.book = rez;
        $scope.books = rez.book;
        console.log(rez.book);
    })
    
 });
