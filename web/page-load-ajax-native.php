<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Test page load</title>
        <script type="text/javascript" src="ready.js"></script>
        <script type="text/javascript">
// When the DOM content is loaded...
document.addEventListener('DOMContentLoaded', function () {
    // To load the greeting...
    xhr = new XMLHttpRequest();

    xhr.addEventListener('loadend', function () {
console.log(this.response);
        var data = JSON.parse(this.response); 

        document.getElementById('output').innerHTML = data.payload;
    });

    xhr.open('GET', 'api/greeting-json.php', true);
    xhr.send();
});
        </script>
    </head>
    <body>
        <div id="output">Wait!</div>
    </body>
</html>
