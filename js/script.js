function Guardar() {
    let urlSearchParams = new URLSearchParams(window.location.search);
    let id = urlSearchParams.get("id");
    let placa = document.querySelector("#placa").value;
    let marca = document.querySelector("#marca").value;
    let motor = document.querySelector("#motor").value;
    let chasis = document.querySelector("#chasis").value;
    let combustible = document.querySelector("#combustible").value;
    let anio = document.querySelector("#anio").value;
    let color = document.querySelector("#color").value;
    let avaluo = document.querySelector("#avaluo").value;
        
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    
    let data = JSON.stringify({"id":id,"placa":placa,"marca":marca,"motor":motor,"chasis":chasis,"combustible":combustible,"anio":anio,"color":color,"avaluo":avaluo,"operacion":"Guardar"});

    xhr.send(data);
    setInterval("location.reload()",800);
}

function BuscarTodos() {
    let datos = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            datos.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarTodos"});

    xhr.send(data);
}

function Eliminar(id) {
    let res = document.querySelector("#res");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"Eliminar"});

    xhr.send(data);
    setInterval("location.reload()",800);
}

function Login() {
    let usr = document.querySelector("#usuario").value;
    let pwd = document.querySelector("#password").value;    
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let mensaje = this.responseText;
            if(!isNaN(mensaje)) {
                window.location.href = "Matricula.php?id=" + mensaje;
            } else {
                res.innerHTML = mensaje;
            }                        
        }
    }
    
    let data = JSON.stringify({"usr":usr,"pwd":pwd,"operacion":"Login"});

    xhr.send(data);    
}

function Crear() {
    let usr = document.querySelector("#usuario").value;
    let pwd = document.querySelector("#password").value;    
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    
    let data = JSON.stringify({"usr":usr,"pwd":pwd, "operacion":"Crear"});

    xhr.send(data);
    setInterval("location.reload()",800);
}

function BuscarColor() {
    let color = document.querySelector("#selectColor");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            color.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarColor"});

    xhr.send(data);
}

function BuscarMarca() {
    let marca = document.querySelector("#selectMarca");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            marca.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarMarca"});

    xhr.send(data);
}