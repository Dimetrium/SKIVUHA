/**
 * Контроллер для карзины
 */
app.controller('CartCtrl', function(Cart, $localStorage){
    var _this = this;
    this.loc = $localStorage.cart;
    this.b = Cart;
    this.del = function(id){
		_this.loc.splice(id,1);
    };

/**
 * Общая цена
 */
    this.total = function(){
	var total = 0;
	angular.forEach(_this.loc, function(value){
            total += value.quantity * value.price;
	});
	return total;
    };

/**
 * Подсчет колличества товара
 */    
    this.sum = function(){
        var cnt=0;
	angular.forEach(this.loc, function(value){
           cnt+= value.quantity;
	});
	return cnt;
    };

/**
 * Минус товар
 */ 
 this.minus = function(id) {
  if (_this.loc[id].quantity > 1) {
   _this.loc[id].quantity--;
  }
 };

/**
 * Плюс товар
 */     
 this.plus = function(id) {
  _this.loc[id].quantity++;
 };
});
