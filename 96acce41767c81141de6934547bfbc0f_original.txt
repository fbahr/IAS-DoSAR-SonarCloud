<?php

foreach ($bots as $bot) {
    $sells = (new Purchase())->find("bot_id = :bot_id AND status > 1", "bot_id={$bot->id}")->count();
    echo "<div class=\"item\">\n                <div class=\"numbers\">\n                    <img src=\"/img/botpic/" . $bot->icon . ".png\">\n                    <span class=\"bot_total_sell\">" . $sells . "</span>\n                    <br>\n\n                    <div>\n                        <span class=\"delete_bot\"><a data-route=\"pages/bots/delete.php?id=" . $bot->id . "\"><i class=\"fa-solid fa-trash\"></i></a></span>\n                    </div>\n                </div>\n                <h2>" . $bot->name . "</h2>\n                <h5>" . $bot->channel_name . "</h5>\n            </div>";
}
