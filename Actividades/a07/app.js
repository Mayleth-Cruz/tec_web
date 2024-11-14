$(document).ready(function() {
    let edit = false;

    $('#product-result').hide();
    listarProductos();

    // Función para mostrar mensajes de error en cada campo
    function errorValidation(campo, mensaje) {
        $(campo).next('.error-message').remove();
        $(campo).after(`<span class="error-message" style="color: red;">${mensaje}</span>`);
    }

    function warningValidation(campo, mensaje) {
        $(campo).next('.error-message').remove();
        $(campo).after(`<span class="error-message" style="color: yellow;">${mensaje}</span>`);
    }

    function clean(campo) {
        $(campo).next('.error-message').remove();
    }

    function validarCampo(campo) {
        let valido = true;
        let valor = $(campo).val();
        clean(campo);

        switch (campo.id) {
            case 'name':
                if (valor.length === 0) {
                    errorValidation(campo, 'El nombre del producto es obligatorio');
                    valido = false;
                } else if (valor.length > 100) {
                    errorValidation(campo, 'El nombre del producto debe tener 100 caracteres o menos');
                    valido = false;
                }
                break;
            case 'marca':
                if (valor === '') {
                    errorValidation(campo, 'El campo de marca es obligatorio');
                    valido = false;
                }
                break;
            case 'modelo':
                let patron = /^[a-zA-Z0-9]+$/;
                if (valor === '') {
                    errorValidation(campo, 'El campo de modelo es obligatorio');
                    valido = false;
                } else if (!patron.test(valor)) {
                    errorValidation(campo, 'El modelo debe contener caracteres alfanuméricos');
                    valido = false;
                } else if (valor.length > 25) {
                    errorValidation(campo, 'El modelo debe tener 25 caracteres o menos');
                    valido = false;
                }
                break;
            case 'precio':
                if (valor <= 99.99) {
                    errorValidation(campo, 'El precio es obligatorio y debe ser mayor a 99.99');
                    valido = false;
                }
                break;
            case 'unidades':
                if (valor <= 1) {
                    errorValidation(campo, 'Las unidades son obligatorias y deben ser mayor a 1');
                    valido = false;
                }
                break;
            case 'detalles':
                if (valor.length > 250) {
                    errorValidation(campo, 'Los detalles del producto no pueden contener más de 250 caracteres');
                    valido = false;
                }
                break;
            case 'imagen':
                if (valor === '') {
                    warningValidation(campo, 'Si el campo de imagen se deja vacío, se colocará una imagen predeterminada');
                }
                break;
        }
        return valido;
    }

    // Validación en tiempo real
    $('#product-form input, #product-form textarea').on('input blur', function() {
        validarCampo(this);
    });

    // Validación final y envío del formulario
    $('#product-form').submit(function(e) {
        e.preventDefault();
        let valido = true;

        // Validar cada campo al enviar el formulario
        $('#product-form input, #product-form textarea').each(function() {
            if (!validarCampo(this)) {
                valido = false;
            }
        });

        if (!valido) return;

        let postData = {
            nombre: $('#name').val(),
            precio: parseFloat($('#precio').val()) || 0.0,
            unidades: parseInt($('#unidades').val()) || 1,
            modelo: $('#modelo').val() || "XX-000",
            marca: $('#marca').val() || "NA",
            detalles: $('#detalles').val() || "NA",
            imagen: $('#imagen').val() || "img/default.png",
            id: $('#productId').val() // Añadido para editar el producto
        };

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';

        $.post(url, postData, (response) => {
            let respuesta = JSON.parse(response);
            let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `;
            $('#product-form')[0].reset(); // Limpiar formulario después de enviar
            $('#product-result').show();
            $('#container').html(template_bar);
            listarProductos();
            edit = false;
        });
    });

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                const productos = JSON.parse(response);
                if(Object.keys(productos).length > 0) {
                    let template = '';
                    productos.forEach(producto => {
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function() {
        let search = $('#search').val();
        if(search) {
            $.ajax({
                url: './backend/product-search.php?search='+search,
                type: 'GET',
                success: function (response) {
                    const productos = JSON.parse(response);
                    if(Object.keys(productos).length > 0) {
                        let template = '';
                        let template_bar = '';
                        productos.forEach(producto => {
                            let descripcion = '';
                            descripcion += '<li>precio: '+producto.precio+'</li>';
                            descripcion += '<li>unidades: '+producto.unidades+'</li>';
                            descripcion += '<li>modelo: '+producto.modelo+'</li>';
                            descripcion += '<li>marca: '+producto.marca+'</li>';
                            descripcion += '<li>detalles: '+producto.detalles+'</li>';
                        
                            template += `
                                <tr productId="${producto.id}">
                                    <td>${producto.id}</td>
                                    <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                    <td><ul>${descripcion}</ul></td>
                                    <td>
                                        <button class="product-delete btn btn-danger">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            `;
                            template_bar += `<li>${producto.nombre}</li>`;
                        });
                        $('#product-result').show();
                        $('#container').html(template_bar);
                        $('#products').html(template);    
                    }
                }
            });
        } else {
            $('#product-result').hide();
        }
    });

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
            let product = JSON.parse(response);
            $('#name').val(product.nombre);
            $('#productId').val(product.id); // Agregado para poder hacer la edición
            $('#precio').val(product.precio);
            $('#unidades').val(product.unidades);
            $('#modelo').val(product.modelo);
            $('#marca').val(product.marca);
            $('#detalles').val(product.detalles);
            $('#imagen').val(product.imagen);
            edit = true;
        });
        e.preventDefault();
    });
});

