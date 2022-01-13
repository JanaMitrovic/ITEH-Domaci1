$(function () {
    pretraga();
    sortiranje();
});

function pretraga() {

    $(document).on('keyup', '#pretrazi-polje', function () {

        let vrednost = this.value;

        $.ajax(
            {
                url: 'pretraga.php',
                method: 'post',
                data: { vrednost: vrednost },
                success: function (data) {
                    {
                        $('#body-table').html(data);
                    }
                }
            }
        )
    })

}

function sortiranje() {

    $(document).on('click', 'th', function () {

        let column_id = $(this).attr('id');
        let sort = $(this).attr('value');

        $.ajax({
            url: 'sortiranje.php',
            method: 'post',
            data: { column_id: column_id, sort: sort },

            success: function (data) {
                $('#tabela').html(data);
            }
        })

    })


}