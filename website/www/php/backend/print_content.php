<?php
/*
 * Definisce metodi che elaborano parti di pagine
 */
require_once('backend/utilities.php');
require_once('sessions.php');

class Print_content
{
    public static function logo($page)
    {
        if (!strcmp($page, "Home")) {
            $content='<img id="logo" src="../images/logo.png" alt="Ti trovi nella pagina principale di Pasticceria Padovana"/>';
        } else {
            $content='<a href="home.php" title="Torna alla pagina principale">
                        <img id="logo" src="../images/logo.png" alt="Torna alla pagina principale di Pasticceria Padovana"/>
                      </a>';
        }
        return $content;
    }

    public static function menu($page)
    {
        if (!strcmp($page, "home.php")) {
            $content='<li role="menuitem"><strong xml:lang="en">Home</strong></li>
            <li role="none"><a href="prodotti.php?type=Paste" role="menuitem">Paste</a></li>
            <li role="none"><a href="prodotti.php?type=Torte" role="menuitem">Torte</a></li>
            <li role="none"><a href="storia.php" role="menuitem">Storia</a></li>
            <li role="none"><a href="contatti.php" role="menuitem">Contatti</a></li>';
        } elseif (!strcmp($page, "storia.php")) {
            $content='<li role="none"><a href="home.php" xml:lang="en" role="menuitem">Home</a></li>
            <li role="none"><a href="prodotti.php?type=Paste" role="menuitem">Paste</a></li>
            <li role="none"><a href="prodotti.php?type=Torte" role="menuitem">Torte</a></li>
            <li role="none"><strong>Storia</strong></li>
            <li role="none"><a href="contatti.php" role="menuitem">Contatti</a></li>';
        } elseif (!strcmp($page, "contatti.php")) {
            $content='<li role="none"><a href="home.php" xml:lang="en" role="menuitem">Home</a></li>
            <li role="none"><a href="prodotti.php?type=Paste" role="menuitem">Paste</a></li>
            <li role="none"><a href="prodotti.php?type=Torte" role="menuitem">Torte</a></li>
            <li role="none"><a href="storia.php" role="menuitem">Storia</a></li>
            <li role="none"><strong>Contatti</strong></li>';
        } elseif (!strcmp($page, "prodotti.php?type=Paste")) {
            $content='<li role="none"><a href="home.php" xml:lang="en" role="menuitem">Home</a></li>
            <li role="none"><strong>Paste</strong></li>
            <li role="none"><a href="prodotti.php?type=Torte" role="menuitem">Torte</a></li>
            <li role="none"><a href="storia.php" role="menuitem">Storia</a></li>
            <li role="none"><a href="contatti.php" role="menuitem">Contatti</a></li>';
        } elseif (!strcmp($page, "prodotti.php?type=Torte")) {
            $content='<li role="none"><a href="home.php" xml:lang="en" role="menuitem">Home</a></li>
            <li role="none"><a href="prodotti.php?type=Paste" role="menuitem">Paste</a></li>
            <li role="none"><strong>Torte</strong></li>
            <li role="none"><a href="storia.php" role="menuitem">Storia</a></li>
            <li role="none"><a href="contatti.php" role="menuitem">Contatti</a></li>';
        } else {
            $content='<li role="none"><a href="home.php" xml:lang="en" role="menuitem">Home</a></li>
            <li role="none"><a href="prodotti.php?type=Paste" role="menuitem">Paste</a></li>
            <li role="none"><a href="prodotti.php?type=Torte" role="menuitem">Torte</a></li>
            <li role="none"><a href="storia.php" role="menuitem">Storia</a></li>
            <li role="none"><a href="contatti.php" role="menuitem">Contatti</a></li>';
        }
        return $content;
    }
    
    public static function admin_form()
    {
        if (Sessions::session_exists('admin')) {
            $content = file_get_contents('../html/components/logout_admin_form.html');
            if (!strcmp(Utilities::shrink_page($_SERVER['REQUEST_URI']), 'modifica_prodotto') || !strcmp(Utilities::shrink_page($_SERVER['REQUEST_URI']), 'modifica_news')) {
                $content = str_replace('<form_to_insert/>', '<form class="login_logout_form" method="post" action="home.php">', $content);
            } else {
                $content = str_replace('<form_to_insert/>', '<form class="login_logout_form" method="post" action="'.htmlentities($_SERVER['REQUEST_URI']).'">', $content);
            }
        } else {
            $content = file_get_contents('../html/components/admin_form.html');
            $content = str_replace('<form_to_insert/>', '<form class="mobile_hidden login_logout_form" id="admin_login_form" method="post" action="'.htmlentities($_SERVER['REQUEST_URI']).'">', $content);
        }
        return $content;
    }
}
?>