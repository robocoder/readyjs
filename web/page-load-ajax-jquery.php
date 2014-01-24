<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Test page load</title>
        <script type="text/javascript" src="ready.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1.9.1/jquery-1.9.1.min.js"></script>
        <script type="text/javascript">
// When the DOM content is loaded...
$(function () {
    // Load the greeting...
    $.ajax(
       'api/greeting-json.php'
    ).done(function (data, textStatus, jqXHR) {
        // And display it
        $('#output').text(data.payload);
    });
});
        </script>
    </head>
    <body>
        <div id="output">Wait!</div>
    </body>
</html>
