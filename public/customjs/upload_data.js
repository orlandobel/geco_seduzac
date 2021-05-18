function upload() {
    $("#upload_db").trigger("click");
}

$(() => {
    $("#upload_db").on("change",
        (e) => {
            const path = $("#upload_db").val();
            const path_splited = path.split("\\");
            const name = path_splited[path_splited.length-1];

            console.log(name);

            $("#db_name").html(name);
            $("#submit").prop("disabled", false);
        });
});
