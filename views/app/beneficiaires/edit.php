<?php $this->layout('app/beneficiaires/layout') ?>
<!-- copilot please fill input value with ^data["beneficiaires] array values -->
<form action="/app/beneficiaires/create" method="post" class="flex flex-col">


    <?php foreach ($data["beneficiaire"] as $key => $value) : ?>
        <label for="<?= $value ?>"><?= $key ?></label>
        <input type="text" name="<?= $value ?>" value="<?= $value ?>" id="<?= $value ?>" placeholder="<?= $value ?>">
    <?php endforeach; ?>


    <select name="situation_familiale" id="situation_familiale">
        <?php foreach ($data['situation_familiale'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['situation_familiale'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="nombre_enfant">Nombre d'enfants</label>
    <input type="number" name="nombre_enfant" id="nombre_enfant" placeholder="nombre d'enfants">
    <label for="orientation">Orientation</label>
    <select name="orientation" id="orientation">
        <?php foreach ($data['orientation'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['orientation'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="situation_professionnelle">Situation Professionnelle</label>
    <select name="situation_professionnelle" id="situation_professionnelle">
        <?php foreach ($data['situation_professionnelle'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['situation_professionnelle'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="situation_ressources">Situation Ressources</label>
    <select name="situation_ressources" id="situation_ressources">
        <?php foreach ($data['situation_ressources'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['situation_ressources'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="type_logement">Situation \ Type de Logement</label>
    <select name="type_logement" id="type_logement">
        <?php foreach ($data['type_logement'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['type_logement'] ?></option>
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
    <label for="axe_travail">Axde de travail et Objectifs</label>
    <select name="axe_travail" id="axe_travail">
        <?php foreach ($data['axe_travail'] as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['axe_travail'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="service_instructeur_referent">SIR</label>
    <input type="text" name="service_instructeur_referent" id="service_instructeur_referent" placeholder="SIR">
    <label for="etranger">etrangé</label>
    <!-- checkbox -->
    <input type="checkbox" name="etranger" id="etranger">
    <label for="rsa">RSA</label>
    <!-- checkbox -->
    <input type="checkbox" name="rsa" id="rsa">

    <!--submit-->
    <input type="submit" value="Ajouter">
</form>