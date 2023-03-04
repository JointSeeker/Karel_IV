var loader= function(e) {
    let file = e.target.files;
    let output = document.getElementById("selector");
   
    if (file[0].type.match("image")) {
        let reader = new FileReader();

        reader.addEventListener("load", function(e) {
            let data = e.target.result;
            let image = document.createElement("img");
            image.src = data;

            output.innerHTML="";
            output.insertBefore(image,null);
            output.classList.add("image");
        });

        reader.readAsDataURL(file[0]);
    } else {
        // soubor neni obrazek

        let show = "<span>Vybraný soubor : </span>";
        show = show + file[0].name;

        output.innerHTML = show;
        output.classList.add("active");

        if(output.classList.contains("image")){
            output.classList.remove("image");
        }
    }
};


let fileInput = document.getElementById("file");
fileInput.addEventListener("change", loader);