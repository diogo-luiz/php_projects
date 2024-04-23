const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");
form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
    statusTxt.style.color = "#0D6EFD";
    statusTxt.style.display = "block";
    statusTxt.innerText = "Sending your message...";
    form.classList.add("disabled");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "message.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){// if ajax response status is 200 & ready status is 4 means there is no any error
            let response = xhr.response;
            if(response.indexOf("Área de email e mensagem são necessários!") != -1 || response.indexOf("Insira um email válido!") != -1 || response.indexOf("Desculpe, houve um problema ao enviar seu email!") != -1){
                statusTxt.style.color = "red";
            }else{
                form.reset();
                setTimeout(()=>{
                    statusTxt.style.display = "none";
                }, 3000);
            }
            statusTxt.innerText = response;
            form.classList.remove("disabled");
        }
    }
    let formData = new FormData(form); //creating new FormData obj. This obj is used to send form data
    xhr.send(formData); //sending dorm data
}