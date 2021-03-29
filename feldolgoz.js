$(function(){
    $("#add").on("click", beolvas);
});

var teendok = [];

function beolvas() {
    var dolog = {
        todo: $("#todo").val(),
        datum: $("#datum").val()
    };
    $.ajax({
        type: "GET",
        url: "feldolgoz.php",
        success: function (result){
            console.log(result);
            teendok = JSON.parse(result);
            console.log(teendok);
            kiir();
        },
        error: function(){
            alert: "Hiba az adatok betöltésekor!";
        }

    });
}

function kiir() {
    for(var i = 0; i<teendok.length; i++){
        let dolog = teendok[i];
        let elem = "<li>" + dolog.todo + " " + dolog.datum + "</li>";
    }
    console.log(elem);
    $("article").append(elem);
}

