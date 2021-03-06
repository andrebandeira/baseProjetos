app.controller('employeesController', function ($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "employees/index")
            .success(function (response) {
                $scope.employees = response;
            });

    //show modal form
    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.post(API_URL + 'employees/edit/'+id)
                        .success(function (response) {
                            console.log(response);
                            $scope.employee = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function (modalstate, id) {
        console.log('dasd');
        var url = API_URL + "employees";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/update/"+id;
        } else {
            url += "/store";
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
            location.reload();
        }).error(function (response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };

    //delete record
    $scope.confirmDelete = function (id) {

        $http({
            method: 'POST',
            url: API_URL + 'employees/delete/' + id
        }).
                success(function (data) {
                    console.log(data);
                    location.reload();
                }).
                error(function (data) {
                    console.log(data);
                    alert('Unable to delete');
                });

    }
});
