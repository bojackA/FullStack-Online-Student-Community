$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../NewsPage/News.php",
        dataType: "html",
        success: function (data) {
            $("#data").html(data);

        }
    });
});