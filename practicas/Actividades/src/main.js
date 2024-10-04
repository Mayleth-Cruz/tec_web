//Ejemplo 0
function ejemplo0() { 
    document.getElementById('example0').innerHTML = `Hola mundo`;
}
//Ejemplo clase
function ejemploclase() { 
    const nombre = prompt('Ingresa tu nombre:', '');
    const edad = prompt('Ingresa tu edad:', '');
    document.getElementById('exampleclase').innerHTML = `${nombre}<br>${edad}`;
}
// Ejemplo 1
function ejemplo1() {
    const nombre = 'Juan';
    const edad = 10;
    const altura = 1.92;
    const casado = false;
    document.getElementById('example1').innerHTML = `${nombre}<br>${edad}<br>${altura}<br>${casado}`;
}

// Ejemplo 2
function ejemplo2() {
    const nombre = prompt('Ingresa tu nombre:', '');
    const edad = prompt('Ingresa tu edad:', '');
    document.getElementById('example2').innerHTML = `Hola ${nombre}, así que tienes ${edad} años.`;
}

// Ejemplo 3
function ejemplo3() {
    const valor1 = parseInt(prompt('Introducir primer número:', ''));
    const valor2 = parseInt(prompt('Introducir segundo número', ''));
    const suma = valor1 + valor2;
    const producto = valor1 * valor2;
    document.getElementById('example3').innerHTML = `La suma es ${suma}<br>El producto es ${producto}`;
}

// Ejemplo 4
function ejemplo4() {
    const nombre = prompt('Ingresa tu nombre:', '');
    const nota = parseFloat(prompt('Ingresa tu nota:', ''));
    if (nota >= 4) {
        document.getElementById('example4').innerHTML = `${nombre} está aprobado con un ${nota}`;
    }
}

// Ejemplo 5
function ejemplo5() {
    const num1 = parseInt(prompt('Ingresa el primer número:', ''));
    const num2 = parseInt(prompt('Ingresa el segundo número:', ''));
    const mayor = num1 > num2 ? num1 : num2;
    document.getElementById('example5').innerHTML = `El mayor es ${mayor}`;
}

// Ejemplo 6
function ejemplo6() {
    const nota1 = parseInt(prompt('Ingresa 1ra. nota:', ''));
    const nota2 = parseInt(prompt('Ingresa 2da. nota:', ''));
    const nota3 = parseInt(prompt('Ingresa 3ra. nota:', ''));
    const promedio = (nota1 + nota2 + nota3) / 3;
    let resultado;
    if (promedio >= 7) {
        resultado = 'aprobado';
    } else if (promedio >= 4) {
        resultado = 'regular';
    } else {
        resultado = 'reprobado';
    }
    document.getElementById('example6').innerHTML = resultado;
}

// Ejemplo 7
function ejemplo7() {
    const valor = parseInt(prompt('Ingresar un valor comprendido entre 1 y 5:', ''));
    let texto;
    switch (valor) {
        case 1: texto = 'uno'; break;
        case 2: texto = 'dos'; break;
        case 3: texto = 'tres'; break;
        case 4: texto = 'cuatro'; break;
        case 5: texto = 'cinco'; break;
        default: texto = 'Debe ingresar un valor comprendido entre 1 y 5.';
    }
    document.getElementById('example7').innerHTML = texto;
}

// Ejemplo 8
function ejemplo8() {
    const col = prompt('Ingresa el color para pintar el fondo (rojo, verde, azul):', '');
    switch (col.toLowerCase()) {
        case 'rojo': document.body.style.backgroundColor = '#ff0000'; break;
        case 'verde': document.body.style.backgroundColor = '#00ff00'; break;
        case 'azul': document.body.style.backgroundColor = '#0000ff'; break;
        default: alert('Color no válido');
    }
}
// Ejemplo 9: Mostrar números del 1 al 100
function ejemplo9() {
    let resultado = '';
    let x = 1;
    while (x <= 100) {
        resultado += `${x}<br>`;
        x++;
    }
    document.getElementById('example9').innerHTML = resultado;
}

// Ejemplo 10: Sumar 5 números ingresados
function ejemplo10() {
    let suma = 0;
    for (let x = 1; x <= 5; x++) {
        const valor = parseInt(prompt('Ingresa el valor:', ''));
        suma += valor;
    }
    document.getElementById('example10').innerHTML = `La suma de los valores es ${suma}`;
}

// Ejemplo 11: Contar los dígitos de un número
function ejemplo11() {
    let valor;
    let resultado = '';
    do {
        valor = parseInt(prompt('Ingresa un valor entre 0 y 999:', ''));
        if (valor < 10) {
            resultado += `El valor ${valor} tiene 1 dígito<br>`;
        } else if (valor < 100) {
            resultado += `El valor ${valor} tiene 2 dígitos<br>`;
        } else if (valor <= 999) {
            resultado += `El valor ${valor} tiene 3 dígitos<br>`;
        }
    } while (valor != 0);
    document.getElementById('example11').innerHTML = resultado;
}

// Ejemplo 12: Mostrar los números del 1 al 10 con for
function ejemplo12() {
    let resultado = '';
    for (let f = 1; f <= 10; f++) {
        resultado += `${f} `;
    }
    document.getElementById('example12').innerHTML = resultado;
}

// Ejemplo 13: Repetir mensajes de advertencia
function ejemplo13() {
    const mensaje = 'Cuidado<br>Ingresa tu documento correctamente<br>';
    document.getElementById('example13').innerHTML = mensaje.repeat(3);
}

// Ejemplo 14: Mostrar mensaje tres veces
function mostrarMensaje() {
    return 'Cuidado<br>Ingresa tu documento correctamente<br>';
}

function ejemplo14() {
    const mensaje = mostrarMensaje() + mostrarMensaje() + mostrarMensaje();
    document.getElementById('example14').innerHTML = mensaje;
}

// Ejemplo 15: Mostrar rango de números
function mostrarRango(x1, x2) {
    let resultado = '';
    for (let inicio = x1; inicio <= x2; inicio++) {
        resultado += `${inicio} `;
    }
    return resultado;
}

function ejemplo15() {
    const valor1 = parseInt(prompt('Ingresa el valor inferior:', ''));
    const valor2 = parseInt(prompt('Ingresa el valor superior:', ''));
    const rango = mostrarRango(valor1, valor2);
    document.getElementById('example15').innerHTML = rango;
}

// Ejemplo 16: Convertir número a castellano
function convertirCastellano(x) {
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}

function ejemplo16() {
    const valor = parseInt(prompt('Ingresa un valor entre 1 y 5', ''));
    const resultado = convertirCastellano(valor);
    document.getElementById('example16').innerHTML = resultado;
}
