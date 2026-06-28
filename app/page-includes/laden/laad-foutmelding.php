<?php
if (isset($_SESSION['foutmelding'])) {
    echo "<p class='melding'>" . $_SESSION['foutmelding'] . "</p>";
    unset($_SESSION['foutmelding']);
}
