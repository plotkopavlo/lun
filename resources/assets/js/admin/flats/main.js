/**TODO: organize JS*/

/**
 * Update list of buildings by selected complex
 */
$("#res_complex").on("change", function () {
    var selectedComplexID = $(this).val();

    $.ajax({
        url: '/panel/complexes/' + selectedComplexID +'/buildings/',
        type: 'get',
        dataType: 'json',
        success: function( buildings ) {

            var $buildings = $("#buildings");

            $buildings.find('option').remove();

            buildings.forEach(function(building) {
                $option = $("<option>", {value: building.id, text: building.name});

                $buildings.append($option);
            });
        }
    });
});



$(".price_type_select").on('click', function (e) {
    e.preventDefault();

    var $priceType     = $('#price_type'),
        $priceTypeText = $('#price_type_text'),
        $selectedType  = $(this);
    ;

    var type = $selectedType.attr('data-type');

    $priceType.val( type );
    $priceTypeText.html( $selectedType.html() );
});
