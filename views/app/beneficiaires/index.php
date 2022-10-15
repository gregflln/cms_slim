<?php $this->layout('app/beneficiaires/layout') ?>

<div class="w-full flex justify-start">
    <a href="/app/beneficiaires/create" class="bg-blue-500 text-white text-lg p-4 rounded-md">Ajouter un bénéficiaire</a>
</div>
<div class="w-full flexitems-center justify-center">
    <input class="bg-gray-200 shadow-md rounded-md w-full text-xl p-5" autofocus type="search" name="search" id="search" placeholder="rechercher un bénéficiaire (nom OU prénom)">
</div>
<div class="text-gray-500">
    <h3 class="text-xl font-semibold">Bénéficiaires</h3>
    <p><span id="resultats_count">0</span> résulat(s)</p>
</div>
<ul id="results" class="flex flex-col gap-4">

</ul>

<script>
    const search = document.querySelector('#search');
    let results = [];
    let results_count = document.querySelector('#resultats_count');

    search.addEventListener('keyup', (e) => {
        const url = '/app/api/search/' + e.target.value;
        fetch(url)
        .then(res => res.json())
        .then(data => {
            results = data;
            results_count.innerHTML = results.length;
            //console.log(results);
            update();
        })
    });
    function update()
    {
        const ul = document.querySelector('#results');
        ul.innerHTML = '';
        results.forEach(result => {
            const li = document.createElement('li');
            const res =
            `
            <a href="/app/beneficiaires/show/${result.id}" class="w-full bg-gray-200 rounded-md flex justify-between items-center hover:bg-blue-200">
                <div class="flex flex-col p-5">
                    <span class="font-semibold text-xl">${result.nom} ${result.prenom}</span>
                    <span class="text-gray-500">${result.adresse}</span>
                </div>
            </a>
            `
            li.innerHTML = res;
            ul.appendChild(li);
        });
    }
</script>