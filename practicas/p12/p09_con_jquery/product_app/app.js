// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  precio: 0.0,
  unidades: 1,
  modelo: "XX-000",
  marca: "NA",
  detalles: "NA",
  imagen: "img/default.png",
};

function init() {
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;
}
  
$(document).ready(function () {
  let edit = false;

  ListaProductos();
  //Función para buscar productos
  $("#search").keyup(function (e) {
    let search = $("#search").val();
    $.ajax({
      url: "backend/product-search.php",
      type: "POST",
      data: { search },
      success: function (response) {
        console.log(response);
        let productos = JSON.parse(response);
        let template = "";

        productos.forEach((producto) => {
          template += `<li>
                 <li> Nombre: ${producto.nombre}</li>
                 <li> Precio: ${producto.precio}</li>
                 <li> Unidades: ${producto.unidades} </li>
                 <li> Modelo: ${producto.modelo} </li>
                 <li> Marca: ${producto.marca} </li>
                 <li>Detalles: ${producto.detalles}</li>
               
                    </li>`;
        });

        if (productos.length > 0) {
          $("#product-result").removeClass("d-none");
        }

        $("#container").html(template);
      },
    });
  });
  //Enviar productos
$("#product-form").submit(function (e) {
  e.preventDefault();
  let errores = [];
  let id = $("#productId").val();
  let nombre = $("#name").val();
  let productos = JSON.parse($("#description").val());

  let marca = productos.marca;
  let modelo = productos.modelo;
  let precio = productos.precio;
  let detalles = productos.detalles;
  let unidades = productos.unidades;
  let imagen = productos.imagen;

  const finalproducto = {
      id: id,
      nombre: nombre,
      marca: marca,
      modelo: modelo,
      precio: precio,
      detalles: detalles,
      unidades: unidades,
      imagen: imagen,
  };
  
  // Validaciones de los campos del producto
  finalproducto['nombre'] = document.getElementById('name').value;
  if (!finalproducto['nombre'] || finalproducto['nombre'].trim() === '' || finalproducto['nombre'].length > 100) {
      errores.push('El nombre es obligatorio y debe tener 100 caracteres o menos.');
  }

  if (isNaN(finalproducto.precio) || finalproducto.precio <= 99.99) {
      errores.push('El precio debe ser mayor a 99.99.');
  }

  if (isNaN(finalproducto.unidades) || finalproducto.unidades < 0) {
      errores.push('Las unidades son obligatorias.');
  }

  let modelPattern = /^[a-zA-Z0-9]+$/;
  if (!finalproducto.modelo || finalproducto.modelo.trim() === '' || !modelPattern.test(finalproducto.modelo) || finalproducto.modelo.length > 25) {
      errores.push('El modelo del producto, debe ser alfanumérico y tener 25 caracteres o menos.');
  }

  if (!finalproducto.marca || finalproducto.marca.trim() === '') {
      errores.push('Se debe asignar la marca del producto.');
  }

  if (finalproducto.detalles && finalproducto.detalles.length > 250) {
      errores.push('Los detalles no pueden tener más de 250 caracteres.');
  }

  let defaultImagen = "img/default.jpeg";
  if (!finalproducto.imagen || finalproducto.imagen.trim() === '') {
      finalproducto.imagen = defaultImagen;
  }

  // Si hay errores, mostramos una alerta y no se envía el formulario
  if (errores.length > 0) {
      alert(errores.join('\n'));
      return;
  }
  let url_1 = edit === false ? "backend/product-add.php" : "backend/product-edit.php";

  $.ajax({
      url: url_1,
      type: "POST",
      ContentType: "application/json",
      data: JSON.stringify(finalproducto),
      success: function (response) {
          ListaProductos();
          let message = JSON.parse(response);
          let template = `<p>${message.message}</p>`;
          
          if (message.message.length > 0) {
              $("#product-result").removeClass("d-none");
          }
          $("#container").html(template);
      },
      error: function (err) {
          console.error("Error al agregar producto:", err);
      },
  });
});
  // Eliminar producto
  function eliminarProducto() {
    if (confirm("¿Deseas eliminar el producto?")) {
      var id = $(this).closest("tr").attr("productId"); 
  
      $.ajax({
        url: `backend/product-delete.php?id=${id}`,
        type: "GET",
        contentType: "application/x-www-form-urlencoded",
        success: function (response) {
          let respuesta = JSON.parse(response);
  
          let template_bar = `
            <p>${respuesta.status}</p>
            <p>${respuesta.message}</p>
          `;
  
          // Mostrar el contenedor si hay un mensaje
          if (respuesta.message.length > 0) {
            $("#product-result").removeClass("d-none").addClass("d-block");
          }
  
          $("#container").html(template_bar);
  
          // Recargar la lista de productos después de eliminar
          ListaProductos();
        },
        error: function (err) {
          console.error("Error al eliminar el producto:", err);
        },
      });
    }
  }
  //boton eliminar
  $(document).on("click", ".product-delete", eliminarProducto);

  //funcion para listar los productos
  function ListaProductos() {
    $.ajax({
      url: "backend/product-list.php",
      type: "GET",
      success: function (response) {
        let products = JSON.parse(response);
        let template = "";
        products.forEach((product) => {
          template += `
            <tr productId="${product.id}">
              <td>${product.id}</td>
              <td>
                <a href="#" class="product-item">${product.nombre}</a>
              </td>
              <td>
               <li> Precio: $${product.precio}</li>
               <li> Unidades: ${product.unidades} </li>
               <li> Modelo: ${product.modelo} </li>
               <li> Marca: ${product.marca} </li>
               <li>Detalles: ${product.detalles}</li>
              </td>
              <td>
                <button class="product-delete btn btn-danger">
                  Eliminar
                </button>
              </td>
            </tr>
          `;
        });
        $("#products").html(template);
      },
    });
  }

