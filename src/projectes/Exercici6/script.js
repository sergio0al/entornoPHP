let juego = document.querySelector("#juego");

let roigNegre = document.querySelector("#roigNegre");
let parellImparell = document.querySelector("#parellImparell");
let pasaFalta = document.querySelector("#pasaFalta");
let pleno = document.querySelector("#pleno");
let docena = document.querySelector("#docena");
let columna = document.querySelector("#columna");
let dosDocenas = document.querySelector("#dosDocenas");
let dosColumnas = document.querySelector("#dosColumnas");
let transversal = document.querySelector("#transversal");
let seisena = document.querySelector("#seisena");
let cuadro = document.querySelector("#cuadro");
let caballo = document.querySelector("#caballo");

function mostrar() {
    // primero escondo todos
    roigNegre.style.display = "none";
    parellImparell.style.display = "none";
    pasaFalta.style.display = "none";
    pleno.style.display = "none";
    docena.style.display = "none";
    columna.style.display = "none";
    dosDocenas.style.display = "none";
    dosColumnas.style.display = "none";
    transversal.style.display = "none";
    seisena.style.display = "none";
    cuadro.style.display = "none";
    caballo.style.display = "none";

    // y luego enseño solo el que toca
    if (juego.value == "roigNegre") {
        roigNegre.style.display = "";
    }
    if (juego.value == "parellImparell") {
        parellImparell.style.display = "";
    }
    if (juego.value == "pasaFalta") {
        pasaFalta.style.display = "";
    }
    if (juego.value == "pleno") {
        pleno.style.display = "";
    }
    if (juego.value == "docena") {
        docena.style.display = "";
    }
    if (juego.value == "columna") {
        columna.style.display = "";
    }
    if (juego.value == "dosDocenas") {
        dosDocenas.style.display = "";
    }
    if (juego.value == "dosColumnas") {
        dosColumnas.style.display = "";
    }
    if (juego.value == "transversal") {
        transversal.style.display = "";
    }
    if (juego.value == "seisena") {
        seisena.style.display = "";
    }
    if (juego.value == "cuadro") {
        cuadro.style.display = "";
    }
    if (juego.value == "caballo") {
        caballo.style.display = "";
    }
}

mostrar();
juego.addEventListener("change", mostrar);