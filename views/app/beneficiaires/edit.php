<?php $this->layout('app/beneficiaires/layout') ?>
<!-- copilot please fill input value with ^data["beneficiaires] array values -->
<form action="/app/beneficiaires/update/<?= $data["beneficiaire"]["id"] ?>" method="post">
    
    <div class="flex flex-col gap-4 bg-gray-100 p-5 rounded-xl">
        <div class="flex justify-between">
            <div class="flex flex-col w-full">
                <label for="nom">nom</label>
                <input type="text" name="nom" id="nom" placeholder="nom" value="<?= $data["beneficiaire"]["nom"] ?>" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="prenom" value="<?= $data["beneficiaire"]["prenom"] ?>" required>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="flex flex-col w-full">
                <label for="telephone">telephone</label>
                <input type="tel" name="telephone" id="telephone" placeholder="telephone" value="<?= $data["beneficiaire"]["telephone"] ?>" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="email">email</label>
                <input type="email" name="email" id="email" placeholder="email" value="<?= $data["beneficiaire"]["email"] ?>" required>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="flex flex-col w-full">
                <label for="date_naissance">date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" placeholder="date_naissance" value="<?= $data["beneficiaire"]["date_naissance"] ?>" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="nombre_enfant">Nombre d'enfants</label>
                <input type="number" name="nombre_enfant" id="nombre_enfant" placeholder="nombre d'enfants" value="<?= $data["beneficiaire"]["nombre_enfant"] ?>" required>
            </div>
        </div>
        <label for="adresse">adresse</label>
        <input type="text" name="adresse" id="adresse" placeholder="adresse" value="<?= $data["beneficiaire"]["adresse"] ?>" required>
        <label for="code_postal">code postal</label>
        <input type="text" name="code_postal" id="code_postal" placeholder="code postal" value="<?= $data["beneficiaire"]["code_postal"] ?>" required>
        <label for="ville">ville</label>
        <input type="text" name="ville" id="ville" placeholder="ville" value="<?= $data["beneficiaire"]["ville"] ?>" required>
        <label for="date_inscription">date d'inscription</label>
        <input type="date" name="date_inscription" id="date_inscription" placeholder="date d'inscription" value="<?= $data["beneficiaire"]["date_inscription"] ?>" required>
        <label for="situation_professionnelle">Situation Professionnelle</label>
        <select name="situation_professionnelle" id="situation_professionnelle" selected="<?= $data["beneficiaire"]["situation_professionnelle"] ?>" required>
            <?php foreach ($data['situation_professionnelle'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"<?= $value['id'] == $data["beneficiaire"]["situation_professionnelle"] ? "selected" : "" ?>><?= $value['situation_professionnelle'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="sante">Santé</label>
        <select name="sante" id="sante" selected="<?= $data["beneficiaire"]["sante"] ?>" required>
            <?php foreach ($data['sante'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"<?= $value['id'] == $data["beneficiaire"]["sante"] ? "selected" : "" ?>><?= $value['sante'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="secteur">secteur</label>
        <select name="secteur" id="secteur" selected="<?= $data["beneficiaire"]["secteur"] ?>" required>
        <?php foreach ($data['secteur'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"<?= $value['id'] == $data["beneficiaire"]["secteur"] ? "selected" : "" ?>><?= $value['secteur'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="partenaires">partenaires</label>
        <select name="partenaires" id="partenaires" selected="<?= $data["beneficiaire"]["partenaires"] ?>" required>
        <?php foreach ($data['partenaires'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"<?= $value['id'] == $data["beneficiaire"]["partenaires"] ? "selected" : "" ?>><?= $value['partenaires'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="niveau_etude">Niveau d'études</label>
        <select name="niveau_etude" id="niveau_etude" selected="<?= $data["beneficiaire"]["niveau_etude"] ?>" required>
        <?php foreach ($data['niveau_etude'] as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"<?= $value['id'] == $data["beneficiaire"]["niveau_etude"] ? "selected" : "" ?>><?= $value['niveau_etude'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input class="w-full p-5 text-white bg-orange-500 rounded-xl" type="submit" value="Modifier les informations">

</form>