function format(input){
        var num = input.value.replace(/\./g,'');
        input.value = num;
        num = input.value.replace(/\₡/g,'');
        if(!isNaN(num)){
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            num = num.replace(/\./g,'.');
            input.value ='₡'+num;
        }else{ 
            input.value = input.value.replace(/[^\d\.]*/g,'');
        }
    }

    function numerosTabla(){
        var numeros=document.getElementById('precioServicioAlimentacion').value;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    
        if (emailRegex.test(campo.value)) {
            valido.innerText = "válido";
        } else {
            valido.innerText = "incorrecto";
        }
    }