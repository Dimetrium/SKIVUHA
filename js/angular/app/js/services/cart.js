app.factory('Cart', function ($localStorage) {
    checkeForExists = localStorage.getItem('ngStorage-cart') || '';
    if (checkeForExists.length !== 0) {
        this.cart = $localStorage.cart;
    } else {
        this.cart = [];
        $localStorage.cart = [];
    }
    return this.cart;
});