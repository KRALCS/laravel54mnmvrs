app.controller('vechilesController', function($scope, $http, API_URL) {

    $http.get(API_URL + "vechiles")
        .success(function(response) {
            $scope.vechiles = response;
            console.log(response);
        });

    $http.get(API_URL + "brands")
        .success(function(response) {
            $scope.brands = response;
            console.log(response);
        });

    $http.get(API_URL + "colors")
        .success(function(response) {
            $scope.colors = response;
            console.log(response);
        });
    $http.get(API_URL + "models")
        .success(function(response) {
            $scope.models = response;
            console.log(response);
        });
    $http.get(API_URL + "vtypes")
        .success(function(response) {
            $scope.vtypes = response;
            console.log(response);
        });

    //delete record
    $scope.confirmDelete = function(id, token) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'POST',
                url: API_URL + 'vechiles/d/' + id + '/' + document.getElementById('tokenhidden').value
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});

