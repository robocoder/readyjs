<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Test page load</title>
        <script type="text/javascript" src="ready.js"></script>
        <script type="text/javascript">
(function (d,s,e) {
    e = d.createElement(s);
    e.src = 'api/greeting-js.php';
    e.async = true;
    c = d.getElementsByTagName(s)[0];
    c.parentNode.insertBefore(e, c);
})(document, 'script');
        </script>
    </head>
    <body>
        <div id="output">Wait!</div>
    </body>
</html>
