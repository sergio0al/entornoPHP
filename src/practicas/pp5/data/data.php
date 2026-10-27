<?php

$libros = [
    [
        "id" => 1,
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "descripcion" => "La historia de la familia Buendía en el mítico pueblo de Macondo.",
        "imagen" => "https://m.media-amazon.com/images/I/91i3tP7bfAL._AC_UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 2,
        "titulo" => "1984",
        "autor" => "George Orwell",
        "descripcion" => "Una distopía sobre vigilancia, control y manipulación de la verdad.",
        "imagen" => "https://m.media-amazon.com/images/I/71sOSrd+JxL._AC_UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 3,
        "titulo" => "El Quijote",
        "autor" => "Miguel de Cervantes",
        "descripcion" => "Las aventuras de un hidalgo que enloquece leyendo libros de caballerías.",
        "imagen" => "https://m.media-amazon.com/images/I/91i+OTXsu3L._AC_UF1000,1000_QL80_.jpg"
    ],
];

$usuarios = [
    ["username" => "admin",  "password" => password_hash("adminpass",  PASSWORD_DEFAULT), "role" => "admin"],
    ["username" => "reader", "password" => password_hash("readerpass", PASSWORD_DEFAULT), "role" => "lector"]
];



