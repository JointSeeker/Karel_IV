/*const form = document.querySelector(".loginForm form"),
continueBtn = form.querySelector(".button"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //prevence odeslání formuláře
} 

continueBtn.onclick = ()=>{
    // začneme s AJAXem
    let xhr = new XMLHttpRequest(); // vytvoření XML Objektu
    xhr.open("POST", "login.php", true); // nastavení postovaní
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "admin.php";
                }else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // musime odeslat data z formuláře do php skrze AJAX
    let formData = new FormData(form); // vytvoření nového FormData objektu
    xhr.send(formData); // odeslaní dat z formuláře
}*/