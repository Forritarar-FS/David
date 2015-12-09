// create the controller and inject Angular's $scope
storeApp.controller('mainController', function($scope) {
    // create a message to display in our view
    $scope.message = 'Everyone come and see how good I look!';
});

storeApp.controller('aboutController', function($scope) {
    $scope.message = 'Look! I am an about page.';
});

storeApp.controller('contactController', ["$scope",'CurrencyService', function($scope, CurrencyService) {
    $scope.message = 'Contact us! JK. This is just a demo.';
    CurrencyService.success(function(data){

      for (var i = 0; i < data.results.length; i++) {
        var what1 = ""+data.results[i].value;
        console.log(what1);
        var what2 = what1.substring(0, 5);
        data.results[i].value=what2;
      }
        $scope.rate = data.results;

    });

}]);

storeApp.controller('loginController', function($scope) {
    $scope.message = 'Login page.';
});

storeApp.controller('signupController', function($scope) {
    $scope.message = 'Signup page.';
});


'use strict';

// the storeController contains two objects:
// - store: contains the product list
// - cart: the shopping cart object
function storeController($scope, $routeParams, DataService) {

    // get store and cart from service
    $scope.store = DataService.store;
    $scope.cart = DataService.cart;

    // use routing to pick the selected product
    if ($routeParams.productSku != null) {
        $scope.product = $scope.store.getProduct($routeParams.productSku);
    }
}
