<?php $this->layout('layout') ?>

<form action="/auth/login" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="submit" value="Login">
</form>