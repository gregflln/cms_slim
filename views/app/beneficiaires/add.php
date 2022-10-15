<?php $this->layout('app/beneficiaires/layout') ?>


<form action="/app/beneficiaires/create" method="post">
    
    <div class="flex flex-col gap-4 bg-gray-100 p-5 rounded-xl">
        <div class="flex justify-between">
            <div class="flex flex-col w-full">
                <label for="nom">nom</label>
                <input type="text" name="nom" id="nom" placeholder="nom" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="prenom" required>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="flex flex-col w-full">
                <label for="telephone">telephone</label>
                <input type="tel" name="telephone" id="telephone" placeholder="telephone" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="email">email</label>
                <input type="email" name="email" id="email" placeholder="email" required>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="flex flex-col w-full">
                <label for="date_naissance">date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" placeholder="date_naissance" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="nombre_enfant">Nombre d'enfants</label>
                <input type="number" name="nombre_enfant" id="nombre_enfant" placeholder="nombre d'enfants" required>
            </div>
        </div>
        <label for="adresse">adresse</label>
        <input type="text" name="adresse" id="adresse" placeholder="adresse" required>
        <label for="code_postal">code postal</label>
        <input type="text" name="code_postal" id="code_postal" placeholder="code postal"  required>
        <label for="ville">ville</label>
        <input type="text" name="ville" id="ville" placeholder="ville" required>
        <label for="date_inscription">date d'inscription</label>
        <input type="date" name="date_inscription" id="date_inscription" placeholder="date d'inscription" required>
        <label for="situation_professionnelle">Situation Professionnelle</label>
        <select name="situation_professionnelle" id="situation_professionnelle" required>
            <?php foreach ($data['situation_professionnelle'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['situation_professionnelle'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="sante">Santé</label>
        <select name="sante" id="sante" required>
            <?php foreach ($data['sante'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['sante'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="secteur">secteur</label>
        <select name="secteur" id="secteur" required>
            <?php foreach ($data['secteur'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['secteur'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="partenaires">partenaires</label>
        <select name="partenaires" id="partenaires" required>
            <?php foreach ($data['partenaires'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['partenaires'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="niveau_etude">Niveau d'études</label>
        <select name="niveau_etude" id="niveau_etude" required>
            <?php foreach ($data['niveau_etude'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['niveau_etude'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input class="w-full p-5 text-white bg-blue-500 rounded-xl" type="submit" value="Creer un nouveau bénéficiaire">

</form>