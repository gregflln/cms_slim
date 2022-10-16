<?php $this->layout('app/users/layout') ?>


<?php

foreach ($users as $user) {
    echo $user['email'];
}

?>