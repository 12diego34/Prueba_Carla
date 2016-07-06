var express = require('express');
var router = express.Router();

var Libro = require('../models/libro');
var books = require('google-books-search');

/* index. */
router.get('/', function(req, res, next) {
    res.render('index', { title: 'Libreria del Viento' });
});

/* buscar. */
router.get('/buscar', function(req, res, next) {
    res.render('search', { title: 'Buscar' });
});

router.get('/catalogo', function(req, res, next) {
    res.render('catalogo', { title: 'Catalogo' });
});

/* todos los libros. */
router.get('/l/all', function(req, res, next) {
    var query = {};
    Libro.find(query, function(err, libros) {
        res.json(libros)
    });
});

/* un libro especifico. */
router.get('/l/:isbn', function(req, res, next) {
    Libro.findOne({isbn: req.params.isbn}, function(error, libro) {
        res.json({resultados: libro});
    });
});


router.get('/l/:titulo', function(req, res, next) {
    var titulo = req.params.titulo;
    Libro.findOne(titulo, function(error, libro) {
        console.log(titulo);
        res.json(libro);
    });
});


router.post('/l/new/:id', function(req, res, next) {
    books.lookup(req.params.id, function(error, result) {
        var libro = new Libro({id:req.params.id, isbn: result.industryIdentifiers[1].identifier, titulo: result.title ,precio: 100, ranking_up: 0, ranking_down:0, gbook: result }).save();
        res.json(libro);
    });
});

/*Elimina un libro especifico*/
router.delete('/l/delete/:id', function(req, res, next) {
    Libro.remove({
        _id: req.params.id
    }, function(err, id) {
        if(err){
            res.send(err);
        }
        Libro.find(function(err, libros) {
            if(err){
                res.send(err);
            }
            res.json(libros);
        });
    })
});

router.get('/show/:id', function(req, res, next){
    var book_id = req.params.id;
    if(book_id){
        books.lookup(book_id, function(error, result) {
            res.json({ book: result });
        });
    }else
        res.json({ book: "error: no se encuentra el libro solicitado"});
});

//GOOGLE SEARCH
router.get('/search/:title', function(req, res, next) {
    var termino = req.params.title;
    var options = {'limit': 20, 'offset':10, field: 'title', type: 'books', order: 'relevance'};
    books.search(termino, options, function(error, results) {
        res.json({resultados: results});
    });
});

router.post('/up/:id', function(req, res, next) {
    var id = req.params.id;
    vote(id, res, {ranking_up: 1});
});

router.post('/down/:id', function(req, res, next) {
    var id = req.params.id;
    vote(id, res, {ranking_down: -1});
});

function vote(id, res, vote_field) {
    Libro.findOneAndUpdate({'id': id}, {$inc: vote_field}, {new: true, upsert:true}, function(err, local_result){
        books.lookup(id, function(error, result) {
            if (error){
                res.send(err);
            }else
            {
            local_result.save(); 
            res.json({book: local_result}); 
            }
        });
    });
};

module.exports = router; 