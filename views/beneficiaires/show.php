<?php $this->layout('beneficiaires/layout') ?>

<div class="rounded-xl bg-gray-100 p-10">
    <p class="text-xl font-bold"><?= $data["beneficiaire"]["prenom"] . " " . $data["beneficiaire"]["nom"] ?></p>

</div>
<div class="flex gap-3 items-center justify-start">
    <a class="flex items-center justify-center font-semibold rounded-lg bg-blue-500 text-white p-5 hover:bg-blue-400" href="/app/rendezvous/create/<?= $data["beneficiaire"]["id"] ?>">nouveau rendez vous</a>
    <a class="flex items-center justify-center font-semibold rounded-lg bg-green-500 text-white p-5 hover:bg-green-400" href="/app/visites/create/<?= $data["beneficiaire"]["id"] ?>">nouvelle visite</a>
</div>

<h1 class="text-2xl semi-bold">rendez vous</h1>
<?php foreach ($data["rendezvous"] as $key => $value): ?>
<div class="bg-blue-200 p-2 rounded-lg">
    <p><?= $value["date"] ?></p>
    <p><?= $value["duree"] ?>min</p>
    <p><?= $value["motif"] ?></p>
</div>
<?php endforeach ?>
<h1 class="text-2xl semi-bold">visites a l'espace permanent</h1>
<?php foreach ($data["visites"] as $key => $value): ?>
<div class="bg-green-200  p-2 rounded-lg">
    <p><?= $value["date"] ?></p>
    <p><?= $value["duree"] ?>min</p>
    <p><?= $value["motif"] ?></p>
</div>
<?php endforeach ?>