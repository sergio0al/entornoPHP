const roigNegre = document.querySelector("#roigNegre")
const parellImparell = document.querySelector("#parellImparell")
const pasaFalta = document.querySelector("#pasaFalta")
const pleno = document.querySelector("#pleno")
const docena = document.querySelector("#docena")
const columna = document.querySelector("#columna")
const dosDocenas = document.querySelector("#dosDocenas")
const dosColumnas = document.querySelector("#dosColumnas")
const todos = [roigNegre, parellImparell, pasaFalta, pleno, docena, columna, dosDocenas, dosColumnas]



const juego = document.querySelector("#juego")


todos.forEach(element => {
        element.style.display = "none"
    });
    if (juego.value === "roigNegre") {
        roigNegre.style.display = "";
    } else if (juego.value === "parellImparell") {
        parellImparell.style.display = "";
    } else if (juego.value === "pasaFalta") {
        pasaFalta.style.display = "";
    } else if (juego.value === "pleno") {
        pleno.style.display = "";
    } else if (juego.value === "docena") {
        docena.style.display = "";
    } else if (juego.value === "columna") {
        columna.style.display = "";
    } else if (juego.value === "dosDocenas") {
        dosDocenas.style.display = "";
    } else if (juego.value === "dosColumnas") {
        dosColumnas.style.display = "";
}


juego.addEventListener("change", function(){
    todos.forEach(element => {
        element.style.display = "none"
    });
    if (juego.value === "roigNegre") {
        roigNegre.style.display = "";
    } else if (juego.value === "parellImparell") {
        parellImparell.style.display = "";
    } else if (juego.value === "pasaFalta") {
        pasaFalta.style.display = "";
    } else if (juego.value === "pleno") {
        pleno.style.display = "";
    } else if (juego.value === "docena") {
        docena.style.display = "";
    } else if (juego.value === "columna") {
        columna.style.display = "";
    } else if (juego.value === "dosDocenas") {
        dosDocenas.style.display = "";
    } else if (juego.value === "dosColumnas") {
        dosColumnas.style.display = "";
    }
})