<!-- Menu Toggle Script -->
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


/* Functions of update button */
/** Attributes of buttons*/
var btn_1 = document.getElementById('ed');
var btn_2 = document.getElementById('up');

var btn_3 = document.getElementById('re');
var btn_4 = document.getElementById('ca');

function mostrarActualizar() {
    /* Buttons */
    btn_1.style.display = 'none';
    btn_2.style.display = 'inline';
    btn_3.style.display = 'none';
    btn_4.style.display = 'inline';

    /* Campos */
    document.getElementById("name").removeAttribute("disabled");
    document.getElementById("lastName").removeAttribute("disabled");
    document.getElementById("date").removeAttribute("disabled");
    document.getElementById("email").removeAttribute("disabled");
    document.getElementById("user").removeAttribute("disabled");
    document.getElementById("formControlTextarea").removeAttribute("disabled");
}

function ocultarActualizar() {
    /* Buttons */
    btn_1.style.display = 'inline';
    btn_2.style.display = 'none';
    btn_3.style.display = 'inline';
    btn_4.style.display = 'none';

    /* Campos */
    document.getElementById("name").setAttribute("disabled", "")
    document.getElementById("lastName").setAttribute("disabled", "");
    document.getElementById("date").setAttribute("disabled", "");
    document.getElementById("email").setAttribute("disabled", "");
    document.getElementById("user").setAttribute("disabled", "");
    document.getElementById("formControlTextarea").setAttribute("disabled", "");
}

