<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            border: 1px solid lightgrey;
        }

        tr:hover {
            background-color: #eaeaff;
        }

        body {
            display: flex;
        }

        .calculator {
            width: 300px;
            height: 300px;
            border: 1px solid darkblue;
            background: lightblue;
            padding: 20px;
        }
    </style>
</head>
<body>

    <a href="/">login</a> <br />
    <a href="/logout">logout</a> <br />
    
    <table style="width:min-content">
        <tr>
            <th>NumCode</th>
            <th>CharCode</th>
            <th>Nominal</th>
            <th>Name</th>
            <th>Value</th> 
        </tr>
        
        <?php 
            foreach ($GLOBALS['newXML'] as $value) {
                echo '<tr>';
                    echo '<td>'; echo $value->NumCode; echo '</td>';
                    echo '<td>'; echo $value->CharCode; echo '</td>';
                    echo '<td>'; echo $value->Nominal; echo '</td>';
                    echo '<td>'; echo $value->Name; echo '</td>';
                    echo '<td>'; echo $value->Value; echo '</td>';
                echo '</tr>';
            }
        ?>
        </tr>
        
    </table>

    <div class="calculator">

        <form action="/currency" method="post">

        <label for="base">Base Currency:</label>
        <select id="base" name="basecurrency">
            <?php 
                foreach ($GLOBALS['newXML'] as $value) {
                    echo '<option value="';
                    echo $value->Value;
                    echo '">';
                    echo $value->CharCode;
                    echo '</option>';
                }
            ?>
        </select> <br /> <br /> <br /> 

        <label for="acurrency">Currency A:</label>
        <select id="acurrency" name="acurrency">
            <?php 
                foreach ($GLOBALS['newXML'] as $value) {
                    echo '<option value="';
                    echo $value->Value;
                    echo '">';
                    echo $value->CharCode;
                    echo '</option>';
                }
            ?>
        </select> <br /> <br /> <br /> 

        <label for="bcurrency">Currency B:</label>
        <select id="bcurrency" name="bcurrency">
            <?php 
                foreach ($GLOBALS['newXML'] as $value) {
                    echo '<option value="';
                    echo $value->Value;
                    echo '">';
                    echo $value->CharCode;
                    echo '</option>';
                }
            ?>
        </select> <br /> <br /> <br /> 

        <input type="submit" value="calculate cross rate" />

        </form> <br /> <br />


        <?php 
            if (isset($GLOBALS['crossrate'])) {
                echo $GLOBALS['crossrate'];
            }
        ?>

    </div>
</body>
</html>