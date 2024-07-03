<?php

require "defines.php";
function connexionMysql()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (!$conn) {
        die("Ereur de connection au serveur : " . mysqli_connect_error($conn));
    } else {
        die("Moody");
    }
}
function connexionUser($POSTlogin, $POSTpwd)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($POSTlogin)) {
        $username = stripslashes($POSTlogin);
        $username = mysqli_real_escape_string($conn, $username);
        $_SESSION["username"] = $username;
        $password = stripslashes($POSTpwd);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM `membres` WHERE `user`='{$username}'\n    and `pass`='" . hash("sha256", $password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION["level"] = $user["level"];
            header("Location: index.php");
            die;
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
}
function addUser($POSTlogin, $POSTpwd)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($POSTlogin, $POSTpwd)) {
        $username = stripslashes($POSTlogin);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($POSTpwd);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM `membres` WHERE `user`='{$username}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (mysqli_num_rows($result) != 1) {
            $query = "INSERT into `membres` (`user`, `level`, `pass`)\n            VALUES ('{$username}', 'user', '" . hash("sha256", $password) . "')";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter " . $username . "!</p>";
                echo "<a href=\"a_adduser.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette employ\xc3\xa9e existe d\xc3\xa9j\xc3\xa0!</p>";
            echo "<a href=\"a_adduser.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de l\\'ajout! Au moins un des champs est vide!</p>";
        echo "<a href=\"a_adduser.php\" class=\"button primary\">Retour</a>";
    }
}
function listUser()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `membres`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    while ($id + 1 <= $nbrow) {
        $user = mysqli_fetch_assoc($result);
        echo "<option value=\"" . $user["user"] . "\">" . $user["user"] . "</option>";
        $id++;
    }
}
function delUser($POSTuser)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $username = stripslashes($POSTuser);
    $query = "SELECT * FROM `membres` WHERE `user`='.{$username}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTuser)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "DELETE FROM `membres` WHERE `user`='" . $username . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de supprimer <b>" . $username . "</b>!</p>";
                echo "<a href=\"a_deluser.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette employ\xc3\xa9e n'existe pas!</p>";
            echo "<a href=\"a_deluser.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la suppression! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_deluser.php\" class=\"button primary\">Retour</a>";
    }
}
function promUser($POSTuser)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $username = stripslashes($POSTuser);
    $query = "SELECT * FROM `membres` WHERE `user`='.{$username}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTuser)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "UPDATE `membres` SET `level`='admin' WHERE `user`='" . $username . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous avez promu <b>" . $username . "</b>!</p>";
                echo "<a href=\"a_promuser.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette employ\xc3\xa9e n'existe pas!</p>";
            echo "<a href=\"a_promuser.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_promuser.php\" class=\"button primary\">Retour</a>";
    }
}
function destUser($POSTuser)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $username = stripslashes($POSTuser);
    $query = "SELECT * FROM `membres` WHERE `user`='.{$username}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTuser)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "UPDATE `membres` SET `level`='user' WHERE `user`='" . $username . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous avez destituer <b>" . $username . "</b>!</p>";
                echo "<a href=\"a_destuser.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette employ\xc3\xa9e n'existe pas!</p>";
            echo "<a href=\"a_destuser.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_destuser.php\" class=\"button primary\">Retour</a>";
    }
}
function addPiece($POSTpcs, $POSTprice)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($POSTpcs, $POSTprice)) {
        $pcs = stripslashes($POSTpcs);
        $pcs = mysqli_real_escape_string($conn, $pcs);
        $price = stripslashes($POSTprice);
        $price = mysqli_real_escape_string($conn, $price);
        $query = "SELECT * FROM `stocks` WHERE `pieces`='{$pcs}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (mysqli_num_rows($result) != 1) {
            $query = "INSERT into `stocks` (`pieces`, `prix`)\n            VALUES ('{$pcs}', {$price})";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter un/une <b>" . $pcs . "</b>!</p>";
                echo "<a href=\"a_addpiece.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette pi\xc3\xa8ces existe d\xc3\xa9j\xc3\xa0!</p>";
            echo "<a href=\"a_addpiece.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de l\\'ajout! Au moins un des champs est vide!</p>";
        echo "<a href=\"a_addpiece.php\" class=\"button primary\">Retour</a>";
    }
}
function listPiece()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `stocks`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    while ($id + 1 <= $nbrow) {
        $pcs = mysqli_fetch_assoc($result);
        echo "<option value=\"" . $pcs["pieces"] . "\">" . $pcs["pieces"] . "</option>";
        $id++;
    }
}
function delPiece($POSTpiece)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $piece = stripslashes($POSTpiece);
    $query = "SELECT * FROM `stocks` WHERE `pieces`='.{$piece}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTpiece)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "DELETE FROM `stocks` WHERE `pieces`='" . $piece . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de supprimer un/une <b>" . $piece . "</b>!</p>";
                echo "<a href=\"a_delpiece.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette pi\xc3\xa8ces n'existe pas!</p>";
            echo "<a href=\"a_delpiece.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la suppression! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_delpiece.php\" class=\"button primary\">Retour</a>";
    }
}
function editPiece($POSTpiece, $POSTprix)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $piece = stripslashes($POSTpiece);
    $prix = stripslashes($POSTprix);
    $query = "SELECT * FROM `stocks` WHERE `pieces`='.{$piece}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTpiece)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "UPDATE `stocks` SET `prix`= " . $prix . " WHERE `pieces` = '" . $piece . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de modifier le prix d'un/d'une <b>" . $piece . "</b>!</p>";
                echo "<a href=\"a_editpiece.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette pi\xc3\xa8ces n'existe pas!</p>";
            echo "<a href=\"a_editpiece.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la modification! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_editpiece.php\" class=\"button primary\">Retour</a>";
    }
}
function listPieceTab()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `stocks`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    $id = 0;
    while ($id + 1 <= $nbrow) {
        $pcs = mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td><b>" . $pcs["pieces"] . "</b></td>";
        echo "<td>" . $pcs["prix"] . "\$</td>";
        echo "</tr>";
        $id++;
    }
}
function addClient($POSTclient)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($POSTclient)) {
        $client = stripslashes($POSTclient);
        $client = mysqli_real_escape_string($conn, $client);
        $query = "SELECT * FROM `clients` WHERE `name`='{$client}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (mysqli_num_rows($result) != 1) {
            $query = "INSERT into `clients` (`name`)\n            VALUES ('{$client}')";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter <b>" . $client . "</b> comme client!</p>";
                echo "<a href=\"u_addclient.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette client existe d\xc3\xa9j\xc3\xa0!</p>";
            echo "<a href=\"u_addclient.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de l\\'ajout! Au moins un des champs est vide!</p>";
        echo "<a href=\"u_addclient.php\" class=\"button primary\">Retour</a>";
    }
}
function listClient()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `clients`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    while ($id + 1 <= $nbrow) {
        $clt = mysqli_fetch_assoc($result);
        echo "<option value=\"" . $clt["name"] . "\">" . $clt["name"] . "</option>";
        $id++;
    }
}
function plateClient($POSTclient, $nbPlate)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `clients`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    $clt = mysqli_fetch_assoc($result);
    if ($nbPlate == 1) {
        echo "<b>Plaque: </b>" . $clt["plaque1"];
    }
    if ($nbPlate == 2) {
        echo "<b>Plaque: </b>" . $clt["plaque2"];
    }
    if ($nbPlate == 3) {
        echo "<b>Plaque: </b>" . $clt["plaque3"];
    }
    if ($nbPlate == 4) {
        echo "<b>Plaque: </b>" . $clt["plaque4"];
    }
    if ($nbPlate == 5) {
        echo "<b>Plaque: </b>" . $clt["plaque5"];
    }
    if ($nbPlate == 6) {
        echo "<b>Plaque: </b>" . $clt["plaque6"];
    }
    if ($nbPlate == 7) {
        echo "<b>Plaque: </b>" . $clt["plaque7"];
    }
    if ($nbPlate == 8) {
        echo "<b>Plaque: </b>" . $clt["plaque8"];
    }
    if ($nbPlate == 9) {
        echo "<b>Plaque: </b>" . $clt["plaque9"];
    }
    if ($nbPlate == 10) {
        echo "<b>Plaque: </b>" . $clt["plaque10"];
    }
}
function delClient($POSTclient)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $client = stripslashes($POSTclient);
    $query = "SELECT * FROM `clients` WHERE `name`='.{$client}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTclient)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "DELETE FROM `clients` WHERE `name`='" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de supprimer le client: <b>" . $client . "</b>!</p>";
                echo "<a href=\"a_delclient.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Ce client n'existe pas!</p>";
            echo "<a href=\"a_delclient.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la suppression! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_delclient.php\" class=\"button primary\">Retour</a>";
    }
}
function addPlate($POSTclient, $POSTplate)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($POSTclient)) {
        $client = stripslashes($POSTclient);
        $client = mysqli_real_escape_string($conn, $client);
        $plate = stripslashes($POSTplate);
        $plate = mysqli_real_escape_string($conn, $plate);
        $query = "SELECT * FROM `clients` WHERE `plaque1`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $query2 = "SELECT * FROM `clients` WHERE `name`='{$client}'";
        $result2 = mysqli_query($conn, $query2) or die(mysql_error());
        $user = mysqli_fetch_assoc($result2);
        if (empty($user["plaque1"])) {
            $query = "UPDATE `clients` SET `plaque1`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque2`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque2"])) {
            $query = "UPDATE `clients` SET `plaque2`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque3`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque3"])) {
            $query = "UPDATE `clients` SET `plaque3`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque4`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque4"])) {
            $query = "UPDATE `clients` SET `plaque4`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque5`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque5"])) {
            $query = "UPDATE `clients` SET `plaque5`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque6`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque6"])) {
            $query = "UPDATE `clients` SET `plaque6`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque7`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque7"])) {
            $query = "UPDATE `clients` SET `plaque7`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque8`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque8"])) {
            $query = "UPDATE `clients` SET `plaque8`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque9`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque9"])) {
            $query = "UPDATE `clients` SET `plaque9`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        }
        $query = "SELECT * FROM `clients` WHERE `plaque10`='{$plate}'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (empty($user["plaque10"])) {
            $query = "UPDATE `clients` SET `plaque10`= '" . $plate . "' WHERE `name` = '" . $client . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez d'ajouter la plaque:<b>" . $plate . "</b> pour le client <b>" . $client . "</b>!</p>";
                echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
                die;
            }
        } else {
            echo "<p>Il n'y a plus de place!</p>";
            echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de l\\'ajout! Au moins un des champs est vide!</p>";
        echo "<a href=\"u_addplate.php\" class=\"button primary\">Retour</a>";
    }
}
function editClient($Pclient, $Pplq1, $Pplq2, $Pplq3, $Pplq4, $Pplq5, $Pplq6, $Pplq7, $Pplq8, $Pplq9, $Pplq10)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($Pclient)) {
        $client = stripslashes($Pclient);
        $client = mysqli_real_escape_string($conn, $client);
        $plate1 = stripslashes($Pplq1);
        $plate1 = mysqli_real_escape_string($conn, $plate1);
        $plate2 = stripslashes($Pplq2);
        $plate2 = mysqli_real_escape_string($conn, $plate2);
        $plate3 = stripslashes($Pplq3);
        $plate3 = mysqli_real_escape_string($conn, $plate3);
        $plate4 = stripslashes($Pplq4);
        $plate4 = mysqli_real_escape_string($conn, $plate4);
        $plate5 = stripslashes($Pplq5);
        $plate5 = mysqli_real_escape_string($conn, $plate5);
        $plate6 = stripslashes($Pplq6);
        $plate6 = mysqli_real_escape_string($conn, $plate6);
        $plate7 = stripslashes($Pplq7);
        $plate7 = mysqli_real_escape_string($conn, $plate7);
        $plate8 = stripslashes($Pplq8);
        $plate8 = mysqli_real_escape_string($conn, $plate8);
        $plate9 = stripslashes($Pplq9);
        $plate9 = mysqli_real_escape_string($conn, $plate9);
        $plate10 = stripslashes($Pplq10);
        $plate10 = mysqli_real_escape_string($conn, $plate10);
        if (!empty($Pplq1)) {
            $query = "SELECT * FROM `clients` WHERE `plaque1`='{$plate1}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque1`= '" . $plate1 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq1 . "</b> en <b>" . $plate1 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq2)) {
            $query = "SELECT * FROM `clients` WHERE `plaque2`='{$plate2}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque2`= '" . $plate2 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq2 . "</b> en <b>" . $plate2 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq3)) {
            $query = "SELECT * FROM `clients` WHERE `plaque3`='{$plate3}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque3`= '" . $plate3 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq3 . "</b> en <b>" . $plate3 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq4)) {
            $query = "SELECT * FROM `clients` WHERE `plaque4`='{$plate4}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque4`= '" . $plate4 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq4 . "</b> en <b>" . $plate4 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq5)) {
            $query = "SELECT * FROM `clients` WHERE `plaque5`='{$plate5}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque5`= '" . $plate5 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq5 . "</b> en <b>" . $plate5 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq6)) {
            $query = "SELECT * FROM `clients` WHERE `plaque6`='{$plate6}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque6`= '" . $plate6 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq6 . "</b> en <b>" . $plate6 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq7)) {
            $query = "SELECT * FROM `clients` WHERE `plaque7`='{$plate7}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque7`= '" . $plate7 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq7 . "</b> en <b>" . $plate7 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq8)) {
            $query = "SELECT * FROM `clients` WHERE `plaque8`='{$plate8}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque8`= '" . $plate8 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq8 . "</b> en <b>" . $plate8 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq9)) {
            $query = "SELECT * FROM `clients` WHERE `plaque9`='{$plate9}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque9`= '" . $plate9 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq9 . "</b> en <b>" . $plate9 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        if (!empty($Pplq10)) {
            $query = "SELECT * FROM `clients` WHERE `plaque10`='{$plate10}'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) != 1) {
                $query = "UPDATE `clients` SET `plaque10`= '" . $plate10 . "' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de modifier la plaque <b>" . $Pplq10 . "</b> en <b>" . $plate10 . "</b> pour le client <b>" . $client . "</b>!</p>";
                }
            } else {
                echo "<p>Cette plaque existe d\xc3\xa9j\xc3\xa0!</p>";
                echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
            }
        }
        echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
    } else {
        echo "<p>Echec de la modification! Au moins un des champs est vide!</p>";
        echo "<a href=\"a_editclient.php\" class=\"button primary\">Retour</a>";
    }
}
function listPlaque()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `clients`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    while ($id + 1 <= $nbrow) {
        $plate = mysqli_fetch_assoc($result);
        if (!empty($plate["plaque1"])) {
            echo "<option value=\"" . $plate["plaque1"] . "\">" . $plate["plaque1"] . "</option>";
        }
        if (!empty($plate["plaque2"])) {
            echo "<option value=\"" . $plate["plaque2"] . "\">" . $plate["plaque2"] . "</option>";
        }
        if (!empty($plate["plaque3"])) {
            echo "<option value=\"" . $plate["plaque3"] . "\">" . $plate["plaque3"] . "</option>";
        }
        if (!empty($plate["plaque4"])) {
            echo "<option value=\"" . $plate["plaque4"] . "\">" . $plate["plaque4"] . "</option>";
        }
        if (!empty($plate["plaque5"])) {
            echo "<option value=\"" . $plate["plaque5"] . "\">" . $plate["plaque5"] . "</option>";
        }
        if (!empty($plate["plaque6"])) {
            echo "<option value=\"" . $plate["plaque6"] . "\">" . $plate["plaque6"] . "</option>";
        }
        if (!empty($plate["plaque7"])) {
            echo "<option value=\"" . $plate["plaque7"] . "\">" . $plate["plaque7"] . "</option>";
        }
        if (!empty($plate["plaque8"])) {
            echo "<option value=\"" . $plate["plaque8"] . "\">" . $plate["plaque8"] . "</option>";
        }
        if (!empty($plate["plaque9"])) {
            echo "<option value=\"" . $plate["plaque9"] . "\">" . $plate["plaque9"] . "</option>";
        }
        if (!empty($plate["plaque10"])) {
            echo "<option value=\"" . $plate["plaque10"] . "\">" . $plate["plaque10"] . "</option>";
        }
        $id++;
    }
}
function delPlate($POSTplate)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $plate = stripslashes($POSTplate);
    $query = "SELECT * FROM `clients`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    $id = 0;
    if (isset($POSTplate)) {
        while ($id + 1 <= $nbrow) {
            $plateBDD = mysqli_fetch_assoc($result);
            $client = stripslashes($plateBDD["name"]);
            if ($plateBDD["plaque1"] == $plate) {
                $query = "UPDATE `clients` SET `plaque1`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque2"] == $plate) {
                $query = "UPDATE `clients` SET `plaque2`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque3"] == $plate) {
                $query = "UPDATE `clients` SET `plaque3`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque4"] == $plate) {
                $query = "UPDATE `clients` SET `plaque4`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque5"] == $plate) {
                $query = "UPDATE `clients` SET `plaque5`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque6"] == $plate) {
                $query = "UPDATE `clients` SET `plaque6`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque7"] == $plate) {
                $query = "UPDATE `clients` SET `plaque7`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque8"] == $plate) {
                $query = "UPDATE `clients` SET `plaque8`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque9"] == $plate) {
                $query = "UPDATE `clients` SET `plaque9`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            if ($plateBDD["plaque10"] == $plate) {
                $query = "UPDATE `clients` SET `plaque10`= '' WHERE `name` = '" . $client . "'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<p>Vous venez de supprimer la plaque: <b>" . $plate . "</b> de <b>" . $client . "</b>!</p>";
                    echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
                    die;
                }
            }
            $id++;
        }
        echo "<p>Cette plaque n'existe pas!</p>";
        echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
    } else {
        echo "<p>Echec de la suppression! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_delplate.php\" class=\"button primary\">Retour</a>";
    }
}
function addRuns($POSTemploye)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    if (isset($POSTemploye)) {
        $employe = stripslashes($POSTemploye);
        $employe = mysqli_real_escape_string($conn, $employe);
        $query = "INSERT into `runs` (`name`, `payer`) VALUES ('{$employe}', 'NON')";
        $res = mysqli_query($conn, $query);
        if ($res) {
            echo "<p>Vous venez de valider votre run <b>" . $employe . "</b>!</p>";
            echo "<a href=\"u_addrun.php\" class=\"button primary\">Retour</a>";
        } else {
            echo "<p>Impossbile de valider votre run <b>" . $employe . "</b>!</p>";
            echo "<a href=\"u_addrun.php\" class=\"button primary\">Retour</a>";
        }
    }
}
function listRunsTab()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `runs` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    $id = 0;
    while ($id + 1 <= $nbrow) {
        $run = mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $run["id"] . " - " . $run["name"] . "</td>";
        echo "<td>" . $run["payer"] . "</td>";
        echo "</tr>";
        $id++;
    }
}
function listRuns()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `runs`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    while ($id + 1 <= $nbrow) {
        $run = mysqli_fetch_assoc($result);
        echo "<option value=\"" . $run["id"] . "\">[" . $run["id"] . "] " . $run["name"] . "</option>";
        $id++;
    }
}
function listRunsEmploye($SESSIONuser)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $user = stripslashes($SESSIONuser);
    $query = "SELECT * FROM `runs` WHERE `name`='" . $user . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    $id = 0;
    while ($id + 1 <= $nbrow) {
        $run = mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $run["name"] . "</td>";
        echo "<td>" . $run["payer"] . "</td>";
        echo "</tr>";
        $id++;
    }
}
function delRun($POSTrun)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $run = stripslashes($POSTrun);
    $query = "SELECT * FROM `runs` WHERE `id`={$run}";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTrun)) {
        if (mysqli_num_rows($result) == 1) {
            $query = "DELETE FROM `runs` WHERE `id`={$run}";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de supprimer un run!</p>";
                echo "<a href=\"a_delrun.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Ce run n'existe pas!</p>";
            echo "<a href=\"a_delrun.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la suppression! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_delrun.php\" class=\"button primary\">Retour</a>";
    }
}
function validRun($POSTrun)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $run = stripslashes($POSTrun);
    $query = "SELECT * FROM `runs` WHERE `id`={$run}";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTrun)) {
        if (mysqli_num_rows($result) == 1) {
            $query = "UPDATE `runs` SET `payer`='OUI' WHERE `id`={$run}";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de valider un run!</p>";
                echo "<a href=\"a_validrun.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Ce run n'existe pas!</p>";
            echo "<a href=\"a_validrun.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la validation! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_validrun.php\" class=\"button primary\">Retour</a>";
    }
}
function listFacture()
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT * FROM `factures`";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $nbrow = mysqli_num_rows($result);
    while ($id + 1 <= $nbrow) {
        $fact = mysqli_fetch_assoc($result);
        echo "<option value=\"" . $fact["name"] . "\">" . $fact["name"] . "</option>";
        $id++;
    }
}
function delFacture($POSTfact)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $fact = stripslashes($POSTfact);
    $query = "SELECT * FROM `factures` WHERE `name`='.{$fact}.'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (isset($POSTfact)) {
        if (mysqli_num_rows($result) != 1) {
            $query = "DELETE FROM `factures` WHERE `name`='" . $fact . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<p>Vous venez de supprimer la facture: <b>" . $fact . "</b>!</p>";
                echo "<a href=\"a_delfacture.php\" class=\"button primary\">Retour</a>";
            }
        } else {
            echo "<p>Cette facture n'existe pas!</p>";
            echo "<a href=\"a_delfacture.php\" class=\"button primary\">Retour</a>";
        }
    } else {
        echo "<p>Echec de la suppression! Au moins un des champs est invalide!</p>";
        echo "<a href=\"a_delfacture.php\" class=\"button primary\">Retour</a>";
    }
}
function addFacture($client, $plaque, $employe, $factpcs1, $qtepcs1, $factpcs2, $qtepcs2, $factpcs3, $qtepcs3, $factpcs4, $qtepcs4, $factpcs5, $qtepcs5, $factpcs6, $qtepcs6, $factpcs7, $qtepcs7, $factpcs8, $qtepcs8, $factpcs9, $qtepcs9, $factpcs10, $qtepcs10, $factpcs11, $qtepcs11, $factpcs12, $qtepcs12, $factpcs13, $qtepcs13, $factpcs14, $qtepcs14, $factpcs15, $qtepcs15, $factpcs16, $qtepcs16, $remiseinput)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $query = "SELECT `id` FROM `factures` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $lastfact = mysqli_fetch_assoc($result);
    $numfact = $lastfact["id"] + 1;
    if ($numfact >= 0 && $numfact <= 9) {
        $numfact = "FA00000" . $numfact;
    }
    if ($numfact >= 10 && $numfact <= 99) {
        $numfact = "FA0000" . $numfact;
    }
    if ($numfact >= 100 && $numfact <= 999) {
        $numfact = "FA000" . $numfact;
    }
    if ($numfact >= 1000 && $numfact <= 9999) {
        $numfact = "FA00" . $numfact;
    }
    if ($numfact >= 10000 && $numfact <= 99999) {
        $numfact = "FA0" . $numfact;
    }
    if ($numfact >= 100000 && $numfact <= 999999) {
        $numfact = "FA" . $numfact;
    }
    $date = date("d/m/Y");
    $client = stripslashes($client);
    $client = mysqli_real_escape_string($conn, $client);
    $employe = stripslashes($employe);
    $employe = mysqli_real_escape_string($conn, $employe);
    $query = "INSERT INTO `factures`\n            (`name`, `date`, `client`, `plaque`, `employe`, `remise`,\n            `pieces1`, `quantite1`, `pieces2`, `quantite2`,\n            `pieces3`, `quantite3`, `pieces4`, `quantite4`,\n            `pieces5`, `quantite5`, `pieces6`, `quantite6`,\n            `pieces7`, `quantite7`, `pieces8`, `quantite8`,\n            `pieces9`, `quantite9`, `pieces10`, `quantite10`,\n            `pieces11`, `quantite11`, `pieces12`, `quantite12`,\n            `pieces13`, `quantite13`, `pieces14`, `quantite14`,\n            `pieces15`, `quantite15`, `pieces16`, `quantite16`)\n            VALUES ('{$numfact}', '{$date}', '{$client}', '{$plaque}', '{$employe}', '{$remiseinput}',\n                    '{$factpcs1}', '{$qtepcs1}', '{$factpcs2}', '{$qtepcs2}',\n                    '{$factpcs3}', '{$qtepcs3}', '{$factpcs4}', '{$qtepcs4}',\n                    '{$factpcs5}', '{$qtepcs5}', '{$factpcs6}', '{$qtepcs6}',\n                    '{$factpcs7}', '{$qtepcs7}', '{$factpcs8}', '{$qtepcs8}',\n                    '{$factpcs9}', '{$qtepcs9}', '{$factpcs10}', '{$qtepcs10}',\n                    '{$factpcs11}', '{$qtepcs11}', '{$factpcs12}', '{$qtepcs12}',\n                    '{$factpcs13}', '{$qtepcs13}', '{$factpcs14}', '{$qtepcs14}',\n                    '{$factpcs15}', '{$qtepcs15}', '{$factpcs16}', '{$qtepcs16}')";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo "<p>Vous venez de valider la facture <b>" . $numfact . "</b>!</p>";
        echo "<a href=\"../index.php\" class=\"button primary\">Retour</a>";
    } else {
        echo "<p>Impossible d'ajouter la facture <b>" . $numfact . "</b>!</p>";
        echo "<a href=\"../index.php\" class=\"button primary\">Retour</a>";
    }
}
function showDateFact($facture)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $facture = stripslashes($facture);
    $query = "SELECT * FROM `factures` WHERE `name`='" . $facture . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $date = mysqli_fetch_assoc($result);
    $date = $date["date"];
    echo "<p class=\"editle\">Edit\xc3\xa9 le " . $date . "</p>";
}
function showClientFact($facture)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $facture = stripslashes($facture);
    $query = "SELECT * FROM `factures` WHERE `name`='" . $facture . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $fact = mysqli_fetch_assoc($result);
    $client = $fact["client"];
    $plaque = $fact["plaque"];
    echo "<input class=\"client\" type=\"text\" id=\"client\" value=\"" . $client . "\" placeholder=\"-\" readonly>";
    echo "<input class=\"plaque\" type=\"text\" id=\"plaque\" value=\"" . $plaque . "\" placeholder=\"-\" readonly>";
}
function showEmployeFact($facture)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $facture = stripslashes($facture);
    $query = "SELECT * FROM `factures` WHERE `name`='" . $facture . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $fact = mysqli_fetch_assoc($result);
    $employe = $fact["employe"];
    echo "<input class=\"employe\" type=\"text\" value=\"" . $employe . "\" name=\"employe\" readonly>";
}
function showEcheanceFact($facture)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $facture = stripslashes($facture);
    $query = "SELECT * FROM `factures` WHERE `name`='" . $facture . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $date = mysqli_fetch_assoc($result);
    $date = $date["date"];
    echo "<p class=\"dateecheancefin\">" . $date . "</p>";
}
function showListPiece($facture)
{
    $conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
    $facture = stripslashes($facture);
    $query = "SELECT * FROM `factures` WHERE `name`='" . $facture . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $fact = mysqli_fetch_assoc($result);
    $remiseinput = $fact["remise"];
    $factpcs1 = $fact["pieces1"];
    $qtepcs1 = $fact["quantite1"];
    $priupcs1 = '';
    $factpcs2 = $fact["pieces2"];
    $qtepcs2 = $fact["quantite2"];
    $priupcs2 = '';
    $factpcs3 = $fact["pieces3"];
    $qtepcs3 = $fact["quantite3"];
    $priupcs3 = '';
    $factpcs4 = $fact["pieces4"];
    $qtepcs4 = $fact["quantite4"];
    $priupcs4 = '';
    $factpcs5 = $fact["pieces5"];
    $qtepcs5 = $fact["quantite5"];
    $priupcs5 = '';
    $factpcs6 = $fact["pieces6"];
    $qtepcs6 = $fact["quantite6"];
    $priupcs6 = '';
    $factpcs7 = $fact["pieces7"];
    $qtepcs7 = $fact["quantite7"];
    $priupcs7 = '';
    $factpcs8 = $fact["pieces8"];
    $qtepcs8 = $fact["quantite8"];
    $priupcs8 = '';
    $factpcs9 = $fact["pieces9"];
    $qtepcs9 = $fact["quantite9"];
    $priupcs9 = '';
    $factpcs10 = $fact["pieces10"];
    $qtepcs10 = $fact["quantite10"];
    $priupcs10 = '';
    $factpcs11 = $fact["pieces11"];
    $qtepcs11 = $fact["quantite11"];
    $priupcs11 = '';
    $factpcs12 = $fact["pieces12"];
    $qtepcs12 = $fact["quantite12"];
    $priupcs12 = '';
    $factpcs13 = $fact["pieces13"];
    $qtepcs13 = $fact["quantite13"];
    $priupcs13 = '';
    $factpcs14 = $fact["pieces14"];
    $qtepcs14 = $fact["quantite14"];
    $priupcs14 = '';
    $factpcs15 = $fact["pieces15"];
    $qtepcs15 = $fact["quantite15"];
    $priupcs15 = '';
    $factpcs16 = $fact["pieces16"];
    $qtepcs16 = $fact["quantite16"];
    $priupcs16 = '';
    $query2 = "SELECT * FROM `stocks`";
    $result2 = mysqli_query($conn, $query2) or die(mysql_error());
    $nbrow = mysqli_num_rows($result2);
    $id = 0;
    while ($id + 1 <= $nbrow) {
        $pcs = mysqli_fetch_assoc($result2);
        if ($pcs["pieces"] == $factpcs1) {
            $priupcs1 = $pcs["prix"];
        }
        $pritpcs1 = '';
        if ($pcs["pieces"] == $factpcs2) {
            $priupcs2 = $pcs["prix"];
        }
        $pritpcs2 = '';
        if ($pcs["pieces"] == $factpcs3) {
            $priupcs3 = $pcs["prix"];
        }
        $pritpcs3 = '';
        if ($pcs["pieces"] == $factpcs4) {
            $priupcs4 = $pcs["prix"];
        }
        $pritpcs4 = '';
        if ($pcs["pieces"] == $factpcs5) {
            $priupcs5 = $pcs["prix"];
        }
        $pritpcs5 = '';
        if ($pcs["pieces"] == $factpcs6) {
            $priupcs6 = $pcs["prix"];
        }
        $pritpcs6 = '';
        if ($pcs["pieces"] == $factpcs7) {
            $priupcs7 = $pcs["prix"];
        }
        $pritpcs7 = '';
        if ($pcs["pieces"] == $factpcs8) {
            $priupcs8 = $pcs["prix"];
        }
        $pritpcs8 = '';
        if ($pcs["pieces"] == $factpcs9) {
            $priupcs9 = $pcs["prix"];
        }
        $pritpcs9 = '';
        if ($pcs["pieces"] == $factpcs10) {
            $priupcs10 = $pcs["prix"];
        }
        $pritpcs10 = '';
        if ($pcs["pieces"] == $factpcs11) {
            $priupcs11 = $pcs["prix"];
        }
        $pritpcs11 = '';
        if ($pcs["pieces"] == $factpcs12) {
            $priupcs12 = $pcs["prix"];
        }
        $pritpcs12 = '';
        if ($pcs["pieces"] == $factpcs13) {
            $priupcs13 = $pcs["prix"];
        }
        $pritpcs13 = '';
        if ($pcs["pieces"] == $factpcs14) {
            $priupcs14 = $pcs["prix"];
        }
        $pritpcs14 = '';
        if ($pcs["pieces"] == $factpcs15) {
            $priupcs15 = $pcs["prix"];
        }
        $pritpcs15 = '';
        if ($pcs["pieces"] == $factpcs16) {
            $priupcs16 = $pcs["prix"];
        }
        $pritpcs16 = '';
        $id++;
    }
    if ($qtepcs1 >= 1) {
        $pritpcs1 = $priupcs1 * $qtepcs1;
    }
    if ($qtepcs2 >= 1) {
        $pritpcs2 = $priupcs2 * $qtepcs2;
    }
    if ($qtepcs3 >= 1) {
        $pritpcs3 = $priupcs3 * $qtepcs3;
    }
    if ($qtepcs4 >= 1) {
        $pritpcs4 = $priupcs4 * $qtepcs4;
    }
    if ($qtepcs5 >= 1) {
        $pritpcs5 = $priupcs5 * $qtepcs5;
    }
    if ($qtepcs6 >= 1) {
        $pritpcs6 = $priupcs6 * $qtepcs6;
    }
    if ($qtepcs7 >= 1) {
        $pritpcs7 = $priupcs7 * $qtepcs7;
    }
    if ($qtepcs8 >= 1) {
        $pritpcs8 = $priupcs8 * $qtepcs8;
    }
    if ($qtepcs9 >= 1) {
        $pritpcs9 = $priupcs9 * $qtepcs9;
    }
    if ($qtepcs10 >= 1) {
        $pritpcs10 = $priupcs10 * $qtepcs10;
    }
    if ($qtepcs11 >= 1) {
        $pritpcs11 = $priupcs11 * $qtepcs11;
    }
    if ($qtepcs12 >= 1) {
        $pritpcs12 = $priupcs12 * $qtepcs12;
    }
    if ($qtepcs13 >= 1) {
        $pritpcs13 = $priupcs13 * $qtepcs13;
    }
    if ($qtepcs14 >= 1) {
        $pritpcs14 = $priupcs14 * $qtepcs14;
    }
    if ($qtepcs15 >= 1) {
        $pritpcs15 = $priupcs15 * $qtepcs15;
    }
    if ($qtepcs16 >= 1) {
        $pritpcs16 = $priupcs16 * $qtepcs16;
    }
    $soustotalinpu = $pritpcs1;
    if ($pritpcs2 >= 1) {
        $soustotalinpu += $pritpcs2;
    }
    if ($pritpcs3 >= 1) {
        $soustotalinpu += $pritpcs3;
    }
    if ($pritpcs4 >= 1) {
        $soustotalinpu += $pritpcs4;
    }
    if ($pritpcs5 >= 1) {
        $soustotalinpu += $pritpcs5;
    }
    if ($pritpcs6 >= 1) {
        $soustotalinpu += $pritpcs6;
    }
    if ($pritpcs7 >= 1) {
        $soustotalinpu += $pritpcs7;
    }
    if ($pritpcs8 >= 1) {
        $soustotalinpu += $pritpcs8;
    }
    if ($pritpcs9 >= 1) {
        $soustotalinpu += $pritpcs9;
    }
    if ($pritpcs10 >= 1) {
        $soustotalinpu += $pritpcs10;
    }
    if ($pritpcs11 >= 1) {
        $soustotalinpu += $pritpcs11;
    }
    if ($pritpcs12 >= 1) {
        $soustotalinpu += $pritpcs12;
    }
    if ($pritpcs13 >= 1) {
        $soustotalinpu += $pritpcs13;
    }
    if ($pritpcs14 >= 1) {
        $soustotalinpu += $pritpcs14;
    }
    if ($pritpcs15 >= 1) {
        $soustotalinpu += $pritpcs15;
    }
    if ($pritpcs16 >= 1) {
        $soustotalinpu += $pritpcs16;
    }
    $total = $soustotalinpu * $remiseinput;
    $total /= 100;
    $total = $soustotalinpu - $total;
    if ($total <= 0) {
        $total = "GRATUIT";
    }
    if ($remiseinput == 100) {
        $total = "GRATUIT";
    }
    echo "<tr>";
    echo "<td><input class=\"factpcs1\" type=\"text\" id=\"factpcs1\" value=\"" . $factpcs1 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs1\" type=\"tel\" id=\"qtepcs1\" name=\"qtepcs1\" value=\"" . $qtepcs1 . "\" placeholder=\"\" min=\"0\" max=\"10\" /></td>";
    echo "<td><input class=\"priupcs1\" type=\"text\" id=\"priupcs1\" value=\"" . $priupcs1 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs1\" type=\"text\" id=\"pritpcs1\" value=\"" . $pritpcs1 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs2\" type=\"text\" id=\"factpcs2\" value=\"" . $factpcs2 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs2\" type=\"tel\" id=\"qtepcs2\" name=\"qtepcs2\" value=\"" . $qtepcs2 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs2\" type=\"text\" id=\"priupcs2\" value=\"" . $priupcs2 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs2\" type=\"text\" id=\"pritpcs2\" value=\"" . $pritpcs2 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs3\" type=\"text\" id=\"factpcs3\" value=\"" . $factpcs3 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs3\" type=\"tel\" id=\"qtepcs3\" name=\"qtepcs3\" value=\"" . $qtepcs3 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs3\" type=\"text\" id=\"priupcs3\" value=\"" . $priupcs3 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs3\" type=\"text\" id=\"pritpcs3\" value=\"" . $pritpcs3 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs4\" type=\"text\" id=\"factpcs4\" value=\"" . $factpcs4 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs4\" type=\"tel\" id=\"qtepcs4\" name=\"qtepcs4\" value=\"" . $qtepcs4 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs4\" type=\"text\" id=\"priupcs4\" value=\"" . $priupcs4 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs4\" type=\"text\" id=\"pritpcs4\" value=\"" . $pritpcs4 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs5\" type=\"text\" id=\"factpcs5\" value=\"" . $factpcs5 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs5\" type=\"tel\" id=\"qtepcs5\" name=\"qtepcs5\" value=\"" . $qtepcs5 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs5\" type=\"text\" id=\"priupcs5\" value=\"" . $priupcs5 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs5\" type=\"text\" id=\"pritpcs5\" value=\"" . $pritpcs5 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs6\" type=\"text\" id=\"factpcs6\" value=\"" . $factpcs6 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs6\" type=\"tel\" id=\"qtepcs6\" name=\"qtepcs6\" value=\"" . $qtepcs6 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs6\" type=\"text\" id=\"priupcs6\" value=\"" . $priupcs6 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs6\" type=\"text\" id=\"pritpcs6\" value=\"" . $pritpcs6 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs7\" type=\"text\" id=\"factpcs7\" value=\"" . $factpcs7 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs7\" type=\"tel\" id=\"qtepcs7\" name=\"qtepcs7\" value=\"" . $qtepcs7 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs7\" type=\"text\" id=\"priupcs7\" value=\"" . $priupcs7 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs7\" type=\"text\" id=\"pritpcs7\" value=\"" . $pritpcs7 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs8\" type=\"text\" id=\"factpcs8\" value=\"" . $factpcs8 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs8\" type=\"tel\" id=\"qtepcs8\" name=\"qtepcs8\" value=\"" . $qtepcs8 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs8\" type=\"text\" id=\"priupcs8\" value=\"" . $priupcs8 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs8\" type=\"text\" id=\"pritpcs8\" value=\"" . $pritpcs8 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs9\" type=\"text\" id=\"factpcs9\" value=\"" . $factpcs9 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs9\" type=\"tel\" id=\"qtepcs9\" name=\"qtepcs9\" value=\"" . $qtepcs9 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs9\" type=\"text\" id=\"priupcs9\" value=\"" . $priupcs9 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs9\" type=\"text\" id=\"pritpcs9\" value=\"" . $pritpcs9 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs10\" type=\"text\" id=\"factpcs10\" value=\"" . $factpcs10 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs10\" type=\"tel\" id=\"qtepcs10\" name=\"qtepcs10\" value=\"" . $qtepcs10 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs10\" type=\"text\" id=\"priupcs10\" value=\"" . $priupcs10 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs10\" type=\"text\" id=\"pritpcs10\" value=\"" . $pritpcs10 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs11\" type=\"text\" id=\"factpcs11\" value=\"" . $factpcs11 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs11\" type=\"tel\" id=\"qtepcs11\" name=\"qtepcs11\" value=\"" . $qtepcs11 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs11\" type=\"text\" id=\"priupcs11\" value=\"" . $priupcs11 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs11\" type=\"text\" id=\"pritpcs11\" value=\"" . $pritpcs11 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs12\" type=\"text\" id=\"factpcs12\" value=\"" . $factpcs12 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs12\" type=\"tel\" id=\"qtepcs12\" name=\"qtepcs12\" value=\"" . $qtepcs12 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs12\" type=\"text\" id=\"priupcs12\" value=\"" . $priupcs12 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs12\" type=\"text\" id=\"pritpcs12\" value=\"" . $pritpcs12 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs13\" type=\"text\" id=\"factpcs13\" value=\"" . $factpcs13 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs13\" type=\"tel\" id=\"qtepcs13\" name=\"qtepcs13\" value=\"" . $qtepcs13 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs13\" type=\"text\" id=\"priupcs13\" value=\"" . $priupcs13 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs13\" type=\"text\" id=\"pritpcs13\" value=\"" . $pritpcs13 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs14\" type=\"text\" id=\"factpcs14\" value=\"" . $factpcs14 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs14\" type=\"tel\" id=\"qtepcs14\" name=\"qtepcs14\" value=\"" . $qtepcs14 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs14\" type=\"text\" id=\"priupcs14\" value=\"" . $priupcs14 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs14\" type=\"text\" id=\"pritpcs14\" value=\"" . $pritpcs14 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs15\" type=\"text\" id=\"factpcs15\" value=\"" . $factpcs15 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs15\" type=\"tel\" id=\"qtepcs15\" name=\"qtepcs15\" value=\"" . $qtepcs15 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs15\" type=\"text\" id=\"priupcs15\" value=\"" . $priupcs15 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs15\" type=\"text\" id=\"pritpcs15\" value=\"" . $pritpcs15 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class=\"factpcs16\" type=\"text\" id=\"factpcs16\" value=\"" . $factpcs16 . "\" placeholder=\"\" readonly></td>";
    echo "<td><input class=\"qtepcs16\" type=\"tel\" id=\"qtepcs16\" name=\"qtepcs16\" value=\"" . $qtepcs16 . "\" placeholder=\"\" min=\"0\" max=\"10\"  /></td>";
    echo "<td><input class=\"priupcs16\" type=\"text\" id=\"priupcs16\" value=\"" . $priupcs16 . "\" readonly></td>";
    echo "<td><input class=\"pritpcs16\" type=\"text\" id=\"pritpcs16\" value=\"" . $pritpcs16 . "\" placeholder=\"-\" readonly></td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "<p class=\"remarque\">Remarque: Nettoyage du v\xc3\xa9hicule & contr\xc3\xb4le OFFERT</p>";
    echo "<p class=\"soustotal\">Sous-total:</p>";
    echo "<input class=\"soustotalinpu\" type=\"text\" id=\"soustotalinpu\" value=\"\$" . $soustotalinpu . "\" readonly>";
    echo "<p class=\"remise\">Remise:</p>";
    echo "<input class=\"remiseinput\" type=\"tel\" id=\"remiseinput\" name=\"remiseinput\" value=\"" . $remiseinput . "%\" placeholder=\"0\" required />";
    echo "<input class=\"total\" type=\"text\" id=\"total\" value=\"\$" . $total . "\" readonly>";
}
