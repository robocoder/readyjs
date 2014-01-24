<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Test page load</title>
        <script type="text/javascript" src="ready.js"></script>
    </head>
    <body>
        <div id="output">Wait!</div>
        <script type="text/javascript">
(function (d,s,e,c) {
    e = d.createElement(s);
    e.src = 'api/dummy.php';
    e.async = true;
    e.onload = function () {
        d.getElementById('output').innerHTML = 'Hel' + 'lo world';
    };
    c = d.getElementsByTagName(s)[0];
    c.parentNode.insertBefore(e, c);
})(document, 'script');
        </script>
    </body>
</html>
