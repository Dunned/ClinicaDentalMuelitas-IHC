let totalPago=0;
let tipoEscogido=0;
let op=0; //0=deseleccionado online=1 presencial=1
const precioOnline=30;
const precioPresencial=50;
const precioBlanqueamiento=50;
const precioCuidado=20;

(function(){ //SOLO SE EJECUTE UNA VEZ
    'use strict';
    document.addEventListener('DOMContentLoaded',function(){
    console.log('Listo');
    }); //DOM CONTENT LOADES


    var map = L.map('mapa').setView([-12.083759, -77.061169], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([-12.083759, -77.061169]).addTo(map)
    .bindPopup('CLINICA DENTAL MUELITAS.<br> La mejor Sonrisa')
    .openPopup();
    //.bindTooltip('Un tootltip')
    //.openTooltip();

    //CAMPOS DATOS DEL USUARIO
    const nombre=document.getElementById('nombre');
    const apellido=document.getElementById('apellido');
    const email=document.getElementById('email');

    //TIPO ESCOGIDO
    const online=document.getElementById('online');
    const presencial=document.getElementById('presencial');

    //CONTENDOR DOCTORES
    const contDoc=document.querySelector(".contenedor-dia");

    //EXTRAS
    const blanqueamiento=document.getElementById('blanqueamiento');
    const cuidado=document.getElementById('cuidado');



    //RESULTADO
    const calcular=document.getElementById('calcular');
    const errorDiv=document.getElementById('error');
    const botonRegistro=document.getElementById('btnRegistro');
    const lista_productos=document.getElementById('lista-productos');
    const suma=document.getElementById('suma-total');

    
    online.addEventListener('click',seleccionOnline);
    presencial.addEventListener('click',seleccionPresencial);
    calcular.addEventListener('click',calcularMontos);


    nombre.addEventListener("blur",validarCampos);
    apellido.addEventListener("blur",validarCampos);
    email.addEventListener("blur",validarCampos);
    email.addEventListener("blur",validarEmail);

    function validarCampos() {
        if (this.value=="") {
            errorDiv.style.display='block';
            errorDiv.innerHTML='<p>Este campo es obligatorio</p>';
        }
        else{
            errorDiv.style.display='none';
        }    
    }

    function validarEmail() {
        if (this.value.indexOf("@")>-1) {
            errorDiv.style.display='none';
        }
        else{
            if (this.value=="") {
                errorDiv.style.display='block';
                errorDiv.innerHTML='<p>Este campo es obligatorio</p>';
            }
            else{
                errorDiv.style.display='block';
                errorDiv.innerHTML='<p>Introduce un Email Valido</p>';   
            }
        }    
    }

    function seleccionOnline(event) {
        event.preventDefault();
        if (op===1) {
            op=0;
            tipoEscogido=0;
            contDoc.classList.remove("mostrar");
            contDoc.classList.add("ocultar");
        }
        else{
            op=1;
            tipoEscogido=precioOnline;
            contDoc.classList.remove("ocultar");
            contDoc.classList.add("mostrar");
        }
        online.classList.toggle('seleccionado');
        presencial.classList.remove('seleccionado');
        ocultarHorarios();
        mostrarHorarios("online");
    }

    function seleccionPresencial(event) {
        event.preventDefault();
        if (op===2) {
            op=0;
            tipoEscogido=0;
            contDoc.classList.remove("mostrar");
            contDoc.classList.add("ocultar");
        }
        else{
            op=2; 
            tipoEscogido=precioPresencial;
            contDoc.classList.remove("ocultar");
            contDoc.classList.add("mostrar");
        }
        presencial.classList.toggle('seleccionado');
        online.classList.remove('seleccionado');
        ocultarHorarios();
        mostrarHorarios("presencial");
    }



    function calcularMontos(event) {
        if (op!=0) {
            totalPago=tipoEscogido;
            event.preventDefault();
            const extra1=blanqueamiento.checked ? precioBlanqueamiento:0;
            const extra2=cuidado.checked? precioCuidado:0;

            const listadoProductos=[];
            if(tipoEscogido===precioOnline){
                listadoProductos.push("1 CITA ONLINE (S/30.00)");
            }else{
                listadoProductos.push("1 CITA PRESENCIAL (S/50.00)");
            }
            if(extra1!==0){
                listadoProductos.push("Servicio de blanqueamiento dental básico (S/.50.00)");
                totalPago=totalPago+precioBlanqueamiento;
            }
            if(extra2!==0){
                listadoProductos.push("Kit de cuidado dental (PASTA DIENTES + ENJUAGUE) (S/20.00)");
                totalPago=totalPago+precioCuidado;
            }
            lista_productos.classList.add('agregueLista');
            lista_productos.innerHTML='';
            listadoProductos.forEach(element => {
                lista_productos.innerHTML+=
                    '<p>*'+element+'</p>';
            });
            suma.classList.add("agregueTotal");
            suma.innerHTML="S/."+totalPago;    
        }
        else{
            alert("ESCOGE UNA ONLINE O PRESENCIAL");
        }
        
    }

    function mostrarHorarios(tipo) {
        const contenedores=document.querySelectorAll("."+tipo);
        contenedores.forEach(element => {
            element.classList.remove("ocultar");
            element.classList.add("mostrar");
        });
    }

    function ocultarHorarios() {
        const contenedores=document.querySelectorAll(".dia");
        contenedores.forEach(element => {
            element.classList.remove("mostrar");
            element.classList.add("ocultar");
        });
    }

})()


