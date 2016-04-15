<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<html>
    <head>
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $(function() {
                $( ".nav" ).menu();
            });
        </script>
        <style>
        .ui-menu { width: 80px; }
        </style>
    </head>
    <body>
        <ul class="nav">
            <li>Players
                <ul>
                    {drop-players}
                </ul>
            </li>
            <li>Stocks
                <ul>
                    {drop-stocks}
                </ul>
            </li>
            <li>{registration}</li>
        </ul>     
    </body>
</html>