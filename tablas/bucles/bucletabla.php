<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
         <thead>
            <tr>
                <th>
                    Numero 1
                </th>
                <th>
                    Numero 2
                </th>
                <th>Numero 3</th>
                
            </tr>
        </thead>
        <tbody>
        <?php


$j=1;
for ($i=1; $i <=236 ; $i++) { 
    echo"<tr>";
    
    echo"<td>$j</td>";
    $j++;
    echo"<td>$j</td>";
    $j++;
    echo"<td>$j</td>";
    $j++;
    echo"</tr>";
}





?>
        </tbody>
    </table>
</body>
</html>