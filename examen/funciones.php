<?php

function alerta($mensaje, $u)
{
    echo "<script>
    alert('$mensaje')
    window.location.href = '$u'
    </script>";
}

function nota($nota)
{
    if ($nota >= 5) {

        echo "<p color='green'>$nota</p>";
    } else {
        echo "<p color='red'>$nota</p>";
    }
}