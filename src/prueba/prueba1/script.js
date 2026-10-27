const flechas = document.querySelector(".flechas")
const passwordInput = document.querySelector("#password")
const conjunto = document.querySelector(".conjunto")

conjunto.addEventListener("click", function(e){
    if (e.target.classList.contains("icon")) {
        if(passwordInput.type==="password"){
            flechas.style.transform = "translateY(-100%)"
            passwordInput.type = "text"
        }else{
            flechas.style.transform = "translateY(0)"
            passwordInput.type = "password"
        }
    }
})