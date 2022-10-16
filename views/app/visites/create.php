<?php $this->layout('app/rendezvous/layout') ?>
<div class="w-full h-screen flex items-center justify-center">
    <div class="bg-gray-200 shadow-lg rounded-xl flex flex-col gap-5 p-5">
    <h3>Beneficiaire : <?= $beneficiaire["nom"] ?></h3>
    <form action="/app/visites/create" class="flex flex-col gap-5 text-xl" method="post">
    <input type="hidden" name="beneficiaire" value="<?= $beneficiaire["id"] ?>">
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" required class="form-control" id="date" name="date" placeholder="Date">
    </div>
    <div class="form-group">
        <label for="motif">Motif</label>
        <input type="text" required class="form-control" id="motif" name="motif" placeholder="Motif">
    </div>
    <div class="form-group">
        <label for="duree">Durée (hh:mm)</label>
        <input type="time" required class="form-control" id="duree" name="duree" placeholder="Durée">
    </div>
    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white rounded-lg py-5 font-semibold">Ajouter une visite</button>
</form>
    </div>
</div>