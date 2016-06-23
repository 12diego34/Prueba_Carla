angular.module('bookSearchClient',['ngRoute','contollers'])
.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'index',
            controller: IndexController
        }).
        when('/search', {
            templateUrl: 'search',
            controller: SearchBookController
        }).
        when('/show/:id', {
            templateUrl: 'search',
            controller: ShowBookController
        }).
        when('/save', {
            templateUrl: 'search',
            controller: SaveBookController
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.html5Mode(true);
}])