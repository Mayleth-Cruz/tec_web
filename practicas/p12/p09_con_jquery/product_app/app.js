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
