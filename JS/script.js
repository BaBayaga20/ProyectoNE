/*Variables que necesito*/
const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1')
const lista = document.querySelector("#lista-carrito tbody");
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

/* Escribir las funcioines */
cargarEventListeners();

function cargarEventListeners(){
    elementos1.addEventListener('click', comprarElemento);
    carrito.addEventListener('click', eliminarElemento);
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

function comprarElemento(e){
    e.preventDefault();
    if(e.target.classList.contains('agregar-carrito')){
        const elemento = e.target.parentElement.parentElement;
        leerDatosElemento(elemento);
    }
}

function leerDatosElemento(elemento){
    const infoelemento ={
        imagen: elemento.querySelector('img').src,
        titulo: elemento.querySelector('h3').textContent,
        precio: elemento.querySelector('precio').textContent,
        id: elemento.querySelector('a').getAtribute('data-id')
    }
    insertarCarrito(infoelemento)
}

function insertarCarrito(elemento){
    const row = document.createElement('tr');
    row.innerHTML = `
        <td> 
            <img src = "${elemento.imagen}" width=100 >
        </td> 
        <td> 
            ${elemento.titulo}
        </td> 
        <td> 
            ${elemento.precio}
        </td> 
        <td> 
            <a herf="#" class="borrar" data-id="${elemento.id}"> </a>
        </td> 
    `;
    lista.appendChild(row);
}

function eliminarElemento(e){
    e.preventDefault();
    let elemnto, elementoId;
    if(e.target.classList.contains('borrar')){
        e.target.parentElement.parentElement.remove();
        elemnto = e.target.parentElement.parentElement;
        elemntoId = elemnto.querySelector('a').getAtribute('data-id');

    }
}

function vaciarCarrito(){
    while(lista.firstChild){
        lista.removeChild(lista.firstChild);
    }
    return false;
}