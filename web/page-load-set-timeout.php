<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Test page load</title>
        <script type="text/javascript" src="ready.js"></script>
        <script type="text/javascript">
window.setTimeout(
    function () {
        var element = document.getElementById('output');

        element.innerHTML = 'Hel' + 'lo world';
    },
    10000
);
        </script>
    </head>
    <body>
        <div id="output">Wait!</div>
    </body>
</html>
