// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };
// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;

    try {
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        var finalJSON = JSON.parse(productoJsonString);

        // Validaciones
        var errores = [];

        finalJSON.precio = parseFloat(finalJSON.precio);
        finalJSON.unidades = parseInt(finalJSON.unidades, 10);

        // Validar nombre del producto
        finalJSON['nombre'] = document.getElementById('name').value;
        if (!finalJSON['nombre'] || finalJSON['nombre'].trim() === '' || finalJSON['nombre'].length > 100) {
            errores.push('El nombre del producto es obligatorio y debe tener 100 caracteres o menos.');
        }

        // Validar precio
        if (isNaN(finalJSON.precio) || finalJSON.precio <= 99.99) {
            errores.push('Obligatoriamente debe asignar un precio y este debe ser mayor a 99.99.');
        }

        // Validar unidades
        if (isNaN(finalJSON.unidades) || finalJSON.unidades < 0) {
            errores.push('Se debe asignar la cantidad de unidades y deben ser un número entero positivo.');
        }

        // Validar modelo
        let modelPattern = /^[a-zA-Z0-9]+$/;
        if (!finalJSON.modelo || finalJSON.modelo.trim() === '' || !modelPattern.test(finalJSON.modelo) || finalJSON.modelo.length > 25) {
            errores.push('El modelo del producto, debe ser alfanumérico y tener 25 caracteres o menos.');
        }

        // Validar marca
        if (!finalJSON.marca || finalJSON.marca.trim() === '') {
            errores.push('Se debe asignar la marca del producto.');
        }

        // Validar detalles (opcional, pero si existe debe tener contenido)
        if (finalJSON.detalles && finalJSON.detalles.length > 250) {
            errores.push('Los detalles no pueden tener más de 250 caracteres.');
        }

        // Validar imagen (opcional, puede estar vacía o tener un valor por defecto)
        let defaultImagen = "img/default.jpeg"; 
        if (!finalJSON.imagen || finalJSON.imagen.trim() === '') {
            finalJSON.imagen = defaultImagen;
        }

        // Si hay errores, mostrarlos y detener la ejecución
        if (errores.length > 0) {
            alert(errores.join('\n'));
            return; // Detener la ejecución de la función
        }  

        // SE OBTIENE EL STRING DEL JSON FINAL
        productoJsonString = JSON.stringify(finalJSON);

        // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            if (client.readyState == 4 && client.status == 200) {
                console.log(client.responseText);
                alert(client.responseText);
            }
        };
        client.send(productoJsonString);
    } catch (e) {
        // Manejar errores de parseo de JSON
        alert('Error al procesar el JSON: ' + e.message);
    }
}
// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault();
    var search = document.getElementById('search').value;

    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);
            
            let productos = JSON.parse(client.responseText);

            if (Array.isArray(productos) && productos.length > 0) {
                mostrarProductos(productos);
            } else {
                document.getElementById("productos").innerHTML = "<tr><td colspan='3'>No se encontraron productos.</td></tr>";
            }
        }
    };
    client.send("search=" + encodeURIComponent(search));
}