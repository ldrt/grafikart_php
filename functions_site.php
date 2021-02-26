<?php 
function nav_item(string $link, string $title, string $linkClass = ''): string {
    $class = 'nav-link';
    if ($_SERVER['SCRIPT_NAME'] == $link) {
        $linkClass .= ' active';
    }
    return <<<HTML
        <li class="nav-item">
            <a class="$linkClass" aria-current="page" href="$link">$title</a>
        </li>
HTML;
}

function nav_menu (string $linkClass ='') : string {
    return 
        nav_item('/index.php', 'Home', $linkClass) . 
        nav_item('/contact.php', 'Contact', $linkClass);
}

function select (string $name, $value, array $options) : string {
    $html_options = [];
    foreach ($options as $key => $option) {
        $attributes = $key == $value ? 'selected' : '';
        $html_options[] = "<option value='$key' $attributes>$option</option>";
    }
    return "<select name='$name' class='form-control'>" . implode($html_options) . '</select>';
}

function creneaux_html (array $creneaux) : string {
    if (empty($creneaux)) {
        return 'Fermé';
    }
    $h = [];
    foreach ($creneaux as $creneau) {
        $h[] = "de {$creneau[0]}h à {$creneau[1]}h ";
    }
    return 'Ouvert ' . implode(' et ', $h);
}

function in_creneaux (int $heure, array $creneaux) : bool {
    foreach ($creneaux as $creneau) {
        if ($heure >= $creneau[0] && $heure < $creneau[1]) {
            return true;
        }
    }
    return false;
}
?>