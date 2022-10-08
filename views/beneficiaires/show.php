<?php $this->layout('beneficiaires/layout') ?>

<div class="rounded-xl bg-gray-100 p-10">
    <p class="text-xl font-bold"><?= $data["beneficiaire"]["prenom"] . " " . $data["beneficiaire"]["nom"] ?></p>

</div>
<div class="flex gap-3 items-center justify-start">
    <a class="flex items-center justify-center font-semibold h-48 w-48 aspect-square rounded-lg bg-gray-200" href="/rendezvous/create?benefid=<?= $data["beneficiaire"]["id"] ?>">nouveau rendez vous</a>
    <a class="flex items-center justify-center font-semibold h-48 w-48 aspect-square rounded-lg bg-gray-200" href="/visites/create?benefid=<?= $data["beneficiaire"]["id"] ?>">nouvelle visite</a>
</div>

<h1>rendez vous</h1>
<h1>visites a l'espace permanent</h1>