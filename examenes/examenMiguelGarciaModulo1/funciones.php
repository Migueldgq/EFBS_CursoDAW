<?php

function alerta($mensaje, $u)
{
    echo "<script>
    alert('$mensaje')
    window.location.href = '$u'
    </script>";
}