<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $navitems = array(
            array('waiting_list', 'Whitelist user'),
            array('admin_dashboard', 'Admin dashboard'),
            array('', ''),
            array('logout', 'Uitloggen'),
        );
    } elseif ($_SESSION['role'] == 'user') {
        if($_SESSION['accepted'] == 1){
            $navitems = array(
                array('profiel', 'Profiel'),
                array('logout', 'Uitloggen'),
            );
        } else {
            $navitems = array(
                array('logout', 'Uitloggen'),
            );
        }

    }
} else {
    $navitems = array(
        array('login', 'Login'),
        array('register', 'Register'),
    );
}

?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <ul class="navbar-nav">
        <?php foreach ((array)$navitems as $navitem) { ?>
            <li class="nav-item">
                <a class="font-weight-bold nav-link text-light" href="index.php?page=<?= $navitem[0] ?>"><?= $navitem[1] ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>