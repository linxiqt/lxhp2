<?php


function echoNav()
{
    global $data;
    $sql = "SELECT * FROM zyyo_nav ORDER BY power DESC";
    $result = DB::query($sql);
    if ($result && count($result) > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       
            echo '<a class="nav-item" href="' . $row["href"] . '"target="_blank"><span>'
                . $row["name"] . '</span></a>';
        }
    }
}
function echoMobileNav()
{
    global $data;
    $sql = "SELECT * FROM zyyo_nav ORDER BY power DESC";
    $result = DB::query($sql);
    if ($result && count($result) > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
            echo '<a class="menu-item" href="' . $row["href"] . '"target="_blank"><span>'
                . $row["name"] . '</span></a>';
        }
    }
}

function echoFriends()
{
    global $data;
    $sql = "SELECT * FROM zyyo_friends WHERE status=1 ORDER BY power DESC";
    $result = DB::query($sql);
    if ($result && count($result) > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<a class="friend-link" href="' . $row["href"] . '" target="_blank"><div class="link-logo"><img src="'
                . $row["ico"] . '"></div>
                <div class="link-info"><h3>' . $row["name"] . '</h3><p>' . $row["des"] . '</p></div>
            </a>';
        }
    }
}
function echoList()
{
    global $data;
    $sql = "SELECT * FROM zyyo_project ORDER BY power DESC";
    $result = DB::query($sql);
    if ($result && count($result) > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            echo '<h2>' . $row["icon"] . $row["name"] . " </h2>";
            $sql_items = "SELECT * FROM zyyo_item WHERE project = " . $row["id"] . " ORDER BY power DESC";
            $result_items = DB::query($sql_items);
            if ($result_items && count($result_items) > 0) {
                echo '<div class="api-cards">';

                while ($row_item = $result_items->fetch(PDO::FETCH_ASSOC)) {
                    echo '<a class="api-card"  target="_blank" href="' . $row_item["href"] . '">
                      <img src="' . $row_item["icon"] . '" alt="">
                    <div class="overlay">
                          <h3>' . $row_item["name"] . '</h3><p>' . $row_item["des"] . '</p>
                    </div>
                    </a>';
                }
                echo "</div>";
            }
        }
    }
}
