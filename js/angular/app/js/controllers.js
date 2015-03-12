var app = angular.module('shop',[]);

/*app.config(function($stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise("/home");
	
	$stateProvider
	.state('home', {
      url: "/",
      templateUrl: "partials/main.html"
    });
});
*/

app.factory('book', function($http) {
    return {
        getBook: function(callback) {
            $http.get('app/data/data.json').success(callback);
        }
    };
});

app.controller('shopController', function(book){
	var _this = this;
    book.getBook(function(rez){ 
        _this.books = rez;
		return _this.books;   
    })
	

 });
