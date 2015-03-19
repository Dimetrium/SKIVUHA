app.factory('book', function ($http) {
    return {
        getBook: function (callback) {
            $http.get('app/data/data.json').success(callback);
        }
    };
});