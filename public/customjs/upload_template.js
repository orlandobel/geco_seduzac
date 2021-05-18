function uploadTemplate() {
    $("#upload_template").trigger("click");
}

$(() => {
    $("#upload_template").on("change",
        (e) => {
            const path = $("#upload_template").val();
            const path_splited = path.split("\\");
            const name = path_splited[path_splited.length-1];

            console.log(name);

            $("#template_name").html(name);
            $("#submit_template").prop("disabled", false);
        });
});