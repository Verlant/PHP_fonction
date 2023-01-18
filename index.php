<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions</title>
</head>

<body>
    <h1>Partie 1</h1>
    <?php
    function somme_deux_nbr(float $a, float $b)
    {
        echo $a . " + " . $b . " = " . ($a + $b) . "<br>";
    }

    somme_deux_nbr(2.5, 3.5);
    somme_deux_nbr(2, 3);
    somme_deux_nbr(12.5, 13.5);
    ?>
    <br />
    <?php

    // Définit le fuseau horaire par défaut à utiliser.
    date_default_timezone_set('UTC');

    // Affichage de quelque chose comme : 03/01/2023
    $ojd = date('d/m/Y');

    function date_ojd(string $date)
    {
        echo "Aujourd'hui nous sommes le <b>" . $date . "</b>.<br>";
    }

    date_ojd($ojd);
    date_ojd($ojd);
    date_ojd($ojd);
    ?>
    <br />
    <?php
    function prix_TTC(float $prix_HT, float $taux = 1.2)
    {
        echo "Prix TTC : " . ($prix_HT * $taux) . "€.<br>";
    }

    prix_TTC(100);
    prix_TTC(120.5, 1);
    prix_TTC(52.43, 10);
    ?>
    <br>
    <?php

    $this_year = date('Y');
    $this_month = date('n');
    $this_day = date('j');

    function age(string $date_naissance)
    {
        global $this_year;
        global $this_month;
        global $this_day;
        $date_naissance_split = preg_split('/[\/\s-]/', $date_naissance, -1, PREG_SPLIT_NO_EMPTY);
        $jour_naissance = (int)$date_naissance_split[0];
        $mois_naissance = (int)$date_naissance_split[1];
        $annee_naissance = (int)$date_naissance_split[2];
        if ($this_day < $jour_naissance && $this_month <= $mois_naissance) {
            echo "Vous êtes née le " . $date_naissance . ". Vous avez " . ($this_year - $annee_naissance - 1) . " ans.<br>";
        } else if ($this_month < $mois_naissance) {
            echo "Vous êtes née le " . $date_naissance . ". Vous avez " . ($this_year - $annee_naissance - 1) . " ans.<br>";
        } else {
            echo "Vous êtes née le " . $date_naissance . ". Vous avez " . ($this_year - $annee_naissance) . " ans.<br>";
        }
    }
    age("30/12/1993");
    age("01 01 2022");
    age("10-01-2003");
    ?>
    <br />
    <?php

    $this_min = (date('H') + 1) * 60 + date('i');

    function minute_restante(string $heure_fin)
    {
        global $this_min;
        $heure_fin_split = explode(":", $heure_fin);
        $heure = (int)$heure_fin_split[0];
        $minute = (int)$heure_fin_split[1];
        $minute_fin = $heure * 60 + $minute;
        echo "Il reste " . ($minute_fin - $this_min) . " minutes avant la fin du cours.<br>";
    }

    minute_restante("17");
    minute_restante("17:15");
    minute_restante("17:30");
    minute_restante("17:45");
    minute_restante("18:00");
    ?>
    <br />
    <?php
    // Définit le fuseau horaire par défaut à utiliser.
    date_default_timezone_set('UTC');

    $this_day = date("N");

    function weekend(int $samedi = 6)
    {
        global $this_day;
        if ($this_day < $samedi) {
            echo "En comptant aujourd'hui, il reste " . ($samedi - $this_day) . " jours avant le weekend.<br>";
        } else {
            echo "Vous êtes déjà en weekend !<br>";
        }
    }
    weekend();
    ?>
    <h1>Partie 2</h1>
    <?php
    function supprime_espaces(string $str)
    {
        $str_split = explode(" ", $str);
        $final_str = "";
        foreach ($str_split as $value) {
            $final_str .= $value;
        }
        return $final_str;
    }
    echo supprime_espaces("Bonjour le monde") . "<br>";
    echo supprime_espaces("Bonjourlemonde") . "<br>";
    echo supprime_espaces("B o n j o u r   l e   m o n d e ") . "<br>";
    ?>
    <br />
    <?php
    function astrologie(string $date_naissance)
    {
        $date_naissance_split = preg_split('/[\/\s-]/', $date_naissance, -1, PREG_SPLIT_NO_EMPTY);
        $jour_naissance = (int)$date_naissance_split[0];
        $mois_naissance = (int)$date_naissance_split[1];
        if (($jour_naissance >= 21 && $mois_naissance == 3) || ($jour_naissance <= 20 && $mois_naissance == 4)) {
            return "Bélier";
        } else if (($jour_naissance >= 21 && $mois_naissance == 4) || ($jour_naissance <= 20 && $mois_naissance == 5)) {
            return "Taureau";
        } else if (($jour_naissance >= 21 && $mois_naissance == 5) || ($jour_naissance <= 21 && $mois_naissance == 6)) {
            return "Gémeaux";
        } else if (($jour_naissance >= 22 && $mois_naissance == 6) || ($jour_naissance <= 22 && $mois_naissance == 7)) {
            return "Cancer";
        } else if (($jour_naissance >= 23 && $mois_naissance == 7) || ($jour_naissance <= 22 && $mois_naissance == 8)) {
            return "Lion";
        } else if (($jour_naissance >= 23 && $mois_naissance == 8) || ($jour_naissance <= 22 && $mois_naissance == 9)) {
            return "Vierge";
        } else if (($jour_naissance >= 23 && $mois_naissance == 9) || ($jour_naissance <= 22 && $mois_naissance == 10)) {
            return "Balance";
        } else if (($jour_naissance >= 23 && $mois_naissance == 10) || ($jour_naissance <= 22 && $mois_naissance == 11)) {
            return "Scorpion";
        } else if (($jour_naissance >= 23 && $mois_naissance == 11) || ($jour_naissance <= 21 && $mois_naissance == 12)) {
            return "Sagittaire";
        } else if (($jour_naissance >= 22 && $mois_naissance == 12) || ($jour_naissance <= 20 && $mois_naissance == 1)) {
            return "Capricorne";
        } else if (($jour_naissance >= 21 && $mois_naissance == 1) || ($jour_naissance <= 19 && $mois_naissance == 2)) {
            return "Sagittaire";
        } else {
            return "Poisson";
        }
    }
    echo astrologie("30/12/1993") . "<br>";
    echo astrologie("12-05-2000") . "<br>";
    echo astrologie("06 03 2020") . "<br>";
    ?>
    <br>
    <?php
    function max_between_2_values(float $x, float $y)
    {
        return $x > $y ? $x : $y;
    }
    echo max_between_2_values(2, 4) . "<br>";
    echo max_between_2_values(((5 * 4 - 3) / 54), sqrt(2)) . "<br>";
    echo max_between_2_values(5.27852765850, 5.57886563972) . "<br>";
    ?>
    <br>
    <?php
    function even_or_odd(int $n)
    {
        return $n % 2 == 0 ? "Vrai" : "Faux";
    }
    echo even_or_odd(5) . "<br>";
    echo even_or_odd(2) . "<br>";
    echo even_or_odd(0) . "<br>";
    ?>
</body>

</html>