<?php $this->layout('app/beneficiaires/layout') ?>

<form action="/app/beneficiaires/create" method="post" class="flex flex-col">
    <label for="nom">nom</label>
    <input type="text" name="nom" id="nom" placeholder="nom">
    <label for="prenom">prenom</label>
    <input type="text" name="prenom" id="prenom" placeholder="prenom">
    <label for="date_naissance">date de naissance</label>
    <input type="date" name="date_naissance" id="date_naissance" placeholder="date_naissance">
    <label for="adresse">adresse</label>
    <input type="text" name="adresse" id="adresse" placeholder="adresse">
    <label for="code_postal">code postal</label>
    <input type="text" name="code_postal" id="code_postal" placeholder="code postal">
    <label for="ville">ville</label>
    <input type="text" name="ville" id="ville" placeholder="ville">
    <label for="telephone">telephone</label>
    <input type="tel" name="telephone" id="telephone" placeholder="telephone">
    <label for="email">email</label>
    <input type="email" name="email" id="email" placeholder="email">
    <label for="date_naissance">date de naissance</label>
    <input type="date" name="date_naissance" id="date_naissance" placeholder="date de naissance">
    <label for="date_inscription">date d'inscription</label>
    <input type="date" name="date_inscription" id="date_inscription" placeholder="date d'inscription">
    <label for="nombre_enfant">Nombre d'enfants</label>
    <input type="number" name="nombre_enfant" id="nombre_enfant" placeholder="nombre d'enfants">
    <label for="situation_professionnelle">Situation Professionnelle</label>
    <select name="situation_professionnelle" id="situation_professionnelle">
        <?php foreach ($data['situation_professionnelle'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['situation_professionnelle'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="sante">Santé</label>
    <select name="sante" id="sante">
        <?php foreach ($data['sante'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['sante'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="secteur">secteur</label>
    <select name="secteur" id="secteur">
        <?php foreach ($data['secteur'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['secteur'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="partenaires">partenaires</label>
    <select name="partenaires" id="partenaires">
        <?php foreach ($data['partenaires'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['partenaires'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="niveau_etude">Niveau d'études</label>
    <select name="niveau_etude" id="niveau_etude">
        <?php foreach ($data['niveau_etude'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['niveau_etude'] ?></option>
        <?php endforeach; ?>
    </select>

    <!--submit-->
    <input type="submit" value="Ajouter">
</form>