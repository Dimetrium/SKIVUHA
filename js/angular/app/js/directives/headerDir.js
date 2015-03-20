app.directive('headerDir', function () {
    return {
        restrict: 'E',
        scope: false,
        templateUrl: 'app/templates/header.html',
        controller: 'CartCtrl as cart'
    }
})