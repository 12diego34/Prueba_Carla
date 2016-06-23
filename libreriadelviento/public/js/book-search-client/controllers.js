angular.module('bookSearchClient', ["ngRoute"])
.controller('IndexController', IndexController)
.controller('SearchBookController', SearchBookController)
.controller('ShowBookController', ShowBookController)
.controller('SaveBookController', SaveBookController);

function IndexController($scope, $http) {
    $http.get('/books/collection')
        .success(function(data, status, headers, config) {
            $scope.books = data.books;
        });
}

function SaveBookController($scope, $http, $location) {
    $scope.form = {};
    $scope.saveBook = function () {
        $http.post('/books/save', $scope.form)
            .success(function(data) {
                $location.path('/');
            });
    };
}

function ShowBookController($scope, $http, $routeParams) {
    $scope.showBook = function(){
        var id = this.resultado.id;
        $http.get('/books/show/' + id)
            .then(function(result){
                console.log(JSON.stringify(result.data.book, null, 2));
                var book = result.data.book;
                var $title = $('#modal-info-libro .modal-title .titulo');
                var modal_body_selector = '#modal-info-libro .modal-body ';
                $title.empty().append("<em>"+book.title+"</em>");
                $(modal_body_selector+'.thumb').prop('src', book.imageLinks.medium);
                $(modal_body_selector+'.descripcion').empty().append(book.description);
                var values = [book.subtitle, book.authors, book.categories, book.pageCount, 
                            book.publishedDate, book.publisher, book.industryIdentifiers[1].identifier, 
                            book.language, book.infoLink, book.preview_link];
                var field_names = ['Subtitulo: ', 'Autor/es: ', 'Categorías: ', 'Páginas: ',
                                'Año de publicación: ', 'Editorial: ', 'ISBN: ','Lenguaje: ', 
                                'Más información: ', 'Preview: '];
                $(modal_body_selector+'.info tbody').empty();
                $.each(values, function(i){
                    if (values[i]){    
                        var link = '<a href="'+values[i]+'">Haz click aquí</a>';
                        var valor = String(values[i]).includes('http') ? link : values[i];
                        var markup_data = '<tr><td><strong>'+field_names[i]+'</strong></td><td>'+valor+'</td></tr>';
                        $(modal_body_selector+'.info tbody').append(markup_data);
                    }
                });
                var markup_compra = '';
                $('.compra').empty();
                if(book.saleInfo.retailPrice){
                    var url = 'https://play.google.com/store/books/details?id='+book.id+
                        '&amp;rdid=book-'+book.id+'&amp;rdot=1&amp;source=gbs_atb&amp;pcampaignid=books_booksearch_atb';
                    markup_compra = '<h4 class="precio text-center"> Precio: $'+book.saleInfo.retailPrice.amount+'</h4>'+
                                    '<a class="btn btn-success" href="'+url+'">'+
                                        '<span class="glyphicon glyphicon-shopping-cart"></span> Comprar'+
                                    '</a><br><br>';
                }else{
                    markup_compra = '<h4 class="precio text-center"> No disponible </h4><br><br>';
                }
                $('.compra').append(markup_compra);
                $('#modal-info-libro').modal('show');
            }, function(error){
                console.log("error!", error.responseText);
            });
    }
}

function SearchBookController($scope, $http, $routeParams) {
    $scope.form = {};
    $scope.resultados = {};
    $scope.busqueda = false;
    $scope.sendForm = function () {
        $scope.buscando = true;
        //console.log('[SearchBookController]: ', $scope.form);
        $http.post('/books/search', $scope.form)
            .then(function(result) {
                $scope.busqueda = true;
                $scope.buscando = false;
                $scope.resultados = result.data.resultados;
            }, function(){
                $scope.buscando = false;
                console.log('SearchBookController: hubo un error');
            });
    };
}

angular.module('MainApp', [])
.controller('LibroController', LibroController);

function LibroController($scope, $http) {
    $scope.newLibro = {};
    $scope.libros = {};
    $scope.selected = false;

    // Obtenemos todos los datos de la base de datos
    $http.get('/catalogo').success(function(data) {
        $scope.libros = data;
    })
    .error(function(data) {
        console.log('Error: ' + data);
    });

    // Función para registrar a un libro
    $scope.registrarLibro = function() {
        $http.post('/api/libro', $scope.newLibro)
        .success(function(data) {
                $scope.newLibro = {}; // Borramos los datos del formulario
                $scope.libros = data;
            })
        .error(function(data) {
            console.log('Error: ' + data);
        });
    };

    // Función para editar los datos de un libro
    $scope.modificarLibro = function(newLibro) {
        $http.put('/api/libro/' + $scope.newLibro._id, $scope.newLibro)
        .success(function(data) {
                $scope.newLibro = {}; // Borramos los datos del formulario
                $scope.libros = data;
                $scope.selected = false;
            })
        .error(function(data) {
            console.log('Error: ' + data);
        });
    };

    // Función que borra un objeto libro conocido su id
    $scope.borrarLibro = function(newLibro) {
        $http.delete('/api/libro/' + $scope.newLibro._id)
        .success(function(data) {
            $scope.newLibro = {};
            $scope.libros = data;
            $scope.selected = false;
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });
    };

    // Función para coger el objeto seleccionado en la tabla
    $scope.selectLibro = function(libro) {
        $scope.newLibro = libro;
        $scope.selected = true;
        console.log($scope.newLibro, $scope.selected);
    };
}