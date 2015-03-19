/**
 * Контроллер для отображение детального
 */
app.controller('BookCtrl', function ($stateParams, book, Cart, $localStorage) {
    var _this = this;
    this.bookId = $stateParams.bookId - 1;
    book.getBook(function (rez) {
        _this.books = rez;
        return _this.books;
    })
    
    this.a = Cart;
    this.cart = function (book) {
        var cnt = 0;
        angular.forEach(_this.a, function (value, key) {
            if (_this.bookId + 1 === value.id) {
                cnt += 1;
            }
        });
        if (cnt === 0) {
            _this.a.push({
                id: _this.books[_this.bookId].id,
                name: _this.books[_this.bookId].name,
                price: _this.books[_this.bookId].price,
                quantity: 1
            });
            $localStorage.cart = _this.a;
        }
    };

    this.buttonBuy = function (id) {
        var cnt = 0;
        angular.forEach(_this.a, function (value, key) {
            if (id == value.id) {
                cnt++;
            }
        });
        if (cnt === 0) {
            return false;
        } else {
            return true;
        }
    }
});