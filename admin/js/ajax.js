$("#view_info").on("click", function () {
    var id = $('#id_hot').val();
    datad = "id=" + id
    $.ajax({
        type: "post",
        dataType: "json",
        url: "php_ajax/select.php",
        data: datad,
        async: false,
        success: function (data) {

            var h5 = '';
            var loc = ''
            var span_id = ''
            $.each(data, function (index, item) {
                h5 = "la nom du hotele et <h4 style='color:green;'>" + item.nom + "</h4>"
                span_id = item.id
                loc = "cette hotele se trouve dans  <h4 style='color:green;'>" + item.location + "</h4>   il contient de nombre du chambre " + item.nmb_room
                img = item.img
            });
            $('#nom_hotele').append(h5);
            $('#location_hotele').append(loc);
            $('#hotele_img').attr('src', 'hotele_img/' + img)

        }

    });
});

function show_id_hotele() {
    var a = document.getElementById("hotele_id").value;

    document.getElementById("id_hot").value = a;
}

$("#").on("click", function () {
    var a = document.getElementById("hotele_id").value;
    var a = $("#hotele_id").val();
    $("#id_hot").val() = a;
});



let count1 = 0;
const select1 = document.getElementById('hotele_id');
select1.addEventListener('click', () => {
    count1++;
    //   console.log(`Number of clicks: ${count}`);
});

let count = 0;
const select = document.getElementById('hotele_id');
select.addEventListener('click', () => {
    count++;
    //   console.log(`Number of clicks: ${count}`);
});

$(document).on('change', '#hotele_id', function (e) {
    // location.reload();
    var str_sel = this.options[e.target.selectedIndex].text
    var res_sel = str_sel.split("=>").filter(function (item) {
        return !item.includes("=>");
    });
    console.log(res_sel[1])
    document.getElementById("id_hot").value = res_sel[1]
    console.log(res_sel);
    bookedSeats = []

    console.log($('#id_hot').val());
});

$("#hotele_id").on("click", function () {

    //prenndre la valeur du input direction puis envoiyer vers requet sql qui Select bus_no  from seats where direction='$dir'
    if (count1 == 1) {

        $.ajax({
            type: "post",
            dataType: "json",
            url: "php_ajax/select2.php",
            async: false,
            success: function (data) {

                //cette fonction inject ou remplir les option dans le champs select par les doner dans base de donnes
                options = '';
                a = '';

                $.each(data, function (index, item) {
                    options += '<option id=option"' + index + '"  value="' + item.id + '">' + item.nom + "=>" + item.id + '</option>';
                });
                $('#hotele_id').append(options);

            }

        });
    }
    else
        // location.reload();
        console.log()
});


$("#cat1").on("click", function () {
    //prenndre la valeur du input direction puis envoiyer vers requet sql qui Select bus_no  from seats where direction='$dir'
    if ($(".cat1").length === 2) {
        location.reload();
    }
    if (count == 1) {
        var dir = $('#id_hot').val();
        // location.reload();

        console.log(dir + "dffd")
        datad = "id=" + dir
        var nbre_chaise = 0;
        $.ajax({
            type: "post",
            dataType: "json",
            url: "php_ajax/select.php",
            data: datad,
            async: false,
            success: function (data) {

                //cette fonction inject ou remplir les option dans le champs select par les doner dans base de donnes
                options = '';
                a = '';

                $.each(data, function (index, item) {
                    console.log(item.nom + "deidine")
                    options += '<option id=option"' + index + '"  value="' + item.nom + '">' + item.nom + '</option>';
                });
                $('#cat1').append(options);

            }

        });
    }
    else
        // location.reload();
        console.log()
}
)
;