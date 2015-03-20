/**
 * Контроллер оформления заказа
 */
app.controller('BuyCtrl', function ($localStorage, $timeout) {
    var _this = this;
    this.doneSave = false;
    this.master = {};
    this.phone = /^\d+$/;
    this.stringName = /^[a-zA-Z]+$/;
    this.update = function (user) {
        _this.master = angular.copy(user);
        this.cart2 = $localStorage.cart;
        this.cart2.push(user);
        objJSON = JSON.parse(localStorage.getItem('ngStorage-cart'));
        $localStorage.cart.splice(user);
        $localStorage.orders += JSON.stringify(objJSON);
        _this.doneSave = true;
        _this.reset();
        $timeout( function(){ _this.timeoutDone(); }, 3000);
    };
    this.reset = function () {
        _this.user = angular.copy(_this.master);
    };
    this.reset();
    this.timeoutDone = function(){
        _this.doneSave = false;
    }
});