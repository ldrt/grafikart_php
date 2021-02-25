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
?>