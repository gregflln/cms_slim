<?php $this->layout('layout') ?>
<!--
<div class="w-full flex justify-end">
    <a href="/beneficiaires/add" class="bg-blue-500 text-white text-lg p-4 rounded-md">Ajouter un bénéficiaire</a>
</div>
-->
<div class="flex flex-col gap-y-5">
<div class="w-full p-5 bg-blue-200 font-bold text-xl">Gestion des bénéficiaires</div>
    <?=$this->section('content')?>
</div>