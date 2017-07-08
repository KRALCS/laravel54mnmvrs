var app = angular.module('vechilesapp', [])
    .constant('API_URL', 'http://localhost/laravel54mnmvrs/public/');

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
