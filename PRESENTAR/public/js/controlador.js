angular.module('myApp', ["ngRoute"])
.controller('MostrarLibrosController', MostrarLibrosController)
.controller('ShowBookController', ShowBookController)
.controller('SearchBookController', SearchBookController)
.controller('RankingController',RankingController)
.controller('SaveController',SaveController)
.controller('SearchLocalBookController', SearchLocalBookController)

function MostrarLibrosController($scope, $http, $routeParams) {
    $http.get('/l/all')
        .success(function(data) {
            $scope.libros = data;
            console.log(data)
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });

    $scope.delete = function(id) {
        if (confirm('Estas seguro que queres borrar ?')) {
            $('#contactsGrid tr[data-id="' + id + '"]').hide('slow');
                $http.delete('/l/delete/' + id)
                    .success(function(data) {
                        $scope.libros = data;
                        console.log(data);
                    })
                    .error(function(data) {
                        console.log('Error:' + data);
                    });
            };
        };
}

function SearchLocalBookController($scope, $http, $routeParams) {
    $scope.resultados = {};
    $scope.term = "";
    $scope.sendForm = function () {
        $http.get('l/' + $scope.term)
            .then(function(result) {
                $scope.resultados = result.data.resultados;
                $scope.$parent.libros = [ $scope.resultados ];
                //console.log($scope.term);
                //console.log($scope.resultados);
                //console.log($scope.resultados);
                //console.log($scope.$parent.libros);
            }, function(){
                console.log('SearchBookController: hubo un error');
            });
    };
}

function SaveController($scope, $http) {
    $scope.guardar =function(id){
        $scope.pos = id;
        $http.post('/l/new/' + $scope.pos).success(function(data) {
            alert('Libro guardado exitosamente');
            $scope.libros = data;
        }, function(){
                console.log('error');
        });
    };
} 

function RankingController($scope, $http) {
    $scope.rate = function (type, id) {
        if(type === 'positive'){
            $scope.pos += 1;
            $http.post('/up/' + id).success(function(data) {
               $scope.libros = data;
                console.log(data);
            }, function(){
                console.log('error');
            });
        }else{
            $scope.neg -= 1;
            $http.post('/down/' + id).success(function(data) {
               $scope.libros = data;
                console.log(data);
            }, function(){
                console.log('error');
            });       
        }
    }
} 

function ShowBookController($scope, $http, $routeParams) {
    $scope.showBook = function(){
        var id = this.resultado.id;
        $http.get('show/'+id)
            .then(function(result){
                var book = result.data.book;
                var $title = $('#modal-info-libro .modal-title .titulo');
            }, function(error){
                console.log("error!", error.responseText);
            });
    }
}

function SearchBookController($scope, $http, $routeParams) {
    $scope.resultados = {};
    $scope.term = "";
    $scope.sendForm = function () {
        $scope.buscando = true;
        $http.get('search/' + $scope.term)
            .then(function(result) {
                $scope.buscando = false;
                $scope.resultados = result.data.resultados;
            }, function(){
                $scope.buscando = false;
                console.log('SearchBookController: hubo un error');
            });
    };
}