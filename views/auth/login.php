<?php $this->layout('layout') ?>

<div class="h-screen w-full flex items-center justify-center">
<form action="/auth/login" method="post" class="flex flex-col p-5 bg-gray-100 rounded-xl">
    <label for="email" class="text-sm">Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <label for="password" class="text-sm">Password</label>
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="submit" value="Login">
</form>
</div>