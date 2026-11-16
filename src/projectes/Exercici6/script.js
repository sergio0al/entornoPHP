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

let todos = [roigNegre, parellImparell, pasaFalta, pleno, docena, columna, dosDocenas, dosColumnas, transversal, seisena, cuadro, caballo]



function mostrar() {
    todos.forEach(element => {
        element.style.display = element.id == juego.value ? "" : "none" 
    });
}



mostrar();
juego.addEventListener("change", mostrar);