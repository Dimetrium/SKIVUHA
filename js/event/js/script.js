var Observer = (function () {
    var instance;
    var subscribers;
    function Observer() {
        subscribers = [];
        this.message = '';
    }
    Observer.prototype.on = function (eventName, subscriber) {
        subscribers.push({
            eventName: eventName,
            subscriber: subscriber
        });
        return instance;
    };
    Observer.prototype.fire = function (eventName, args) {
        this.message = '';
        $.each(listeners, function(key, val){
            if(subscribers[key].eventName === eventName) {
                subscribers[key].subscriber.call(instance, args);
        }
        return this.message;
    };
    Observer.prototype.remove = function (eventName) {
$.each(listeners, function(key, val){
            if(subscribers[key].eventName === eventName) {
                subscribers.splice(key, 1);
                return instance;
            }
        }
        return false;
    };
    return {
        getInstance: function () {
            if (!instance) {
                instance = new Observer();
            }
            return instance;
        }
    };
})();

var foo = function(mess) {

    this.message += '\n' + mess + '\t' + 'foo';
};
var bar = function(mess) {

    this.message += '\n' + mess + '\t' + 'bar';
};
var mim = function(mess) {

    this.message += '\n' + mess + '\t' + 'mim';
};

//example for using
//var inst = Observer.getInstance();
//inst.on('click',bar,5).on('click',mim,1).on('click',foo,3);
//inst.fire('click','qwe');
//inst.fire('hover','qwe');
//inst.remove('click');
//inst.fire('click','qwe');