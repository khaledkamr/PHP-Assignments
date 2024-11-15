<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chessboard</title>
        <style>
            .chessboard {
                display: grid;
                grid-template-columns: repeat(8, 50px);
                grid-template-rows: repeat(8, 50px);
                width: fit-content;
                border: 2px solid black;
            }
            .square {
                width: 50px;
                height: 50px;
            }
            .white {
                background-color: #ffffff;
            }
            .black {
                background-color: #000000;
            }
        </style>
    </head>
    <body>
        <div class="chessboard">
            <?php
                for ($row = 0; $row < 8; $row++) {
                    for ($col = 0; $col < 8; $col++) {
                        $color = ($row + $col) % 2 == 0 ? 'white' : 'black';
                        echo "<div class='square $color'></div>";
                    }
                }
            ?>
        </div>
    </body>
</html>
