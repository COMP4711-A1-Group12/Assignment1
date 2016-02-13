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
            {menudata}
            <li>{type}
                <ul>
                    <li><a href="{link1}">{name1}</a></li>
                    <li><a href="{link2}">{name2}</a></li>
                    <li><a href="{link3}">{name3}</a></li>
                    <li><a href="{link4}">{name4}</a></li>
                    <li><a href="{link5}">{name5}</a></li>
                    <li><a href="{link6}">{name6}</a></li>
                </ul>
            </li>
            {/menudata}
        </ul>
    </body>
</html>