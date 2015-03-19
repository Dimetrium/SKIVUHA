/**
 * Главный контроллер
 */
app.controller('MainCtrl', function (book, Cart, $localStorage) {
    var _this = this;

/**
 * Получение из json файла данных
 */
    book.getBook(function (rez) {
        _this.books = rez;
        return _this.books;
    });

/**
 * Добавление в массив товара
 */
    this.a = Cart;
    this.cart = function (book) {
        var cnt = 0;
        angular.forEach(_this.a, function (value, key) {
            if (book === value.id) {
                cnt += 1;
            }
        });
        if (cnt === 0) {
            _this.a.push({
                id: _this.books[book - 1].id,
                name: _this.books[book - 1].name,
                price: _this.books[book - 1].price,
                quantity: 1
            });
            $localStorage.cart = _this.a;
        }
    };

/**
 * Смена кнопки товара на главном экране
 */
    this.buttonBuy = function (id) {
        var cnt = 0;
        angular.forEach(_this.a, function (value, key) {
            if (id == value.id) {
                cnt++;
            }
        });
        if(cnt === 0){
            return false;
        } else {
            return true;
        }
    }
});