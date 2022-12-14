<?= $this->layout("layout") ?>

<div class="flex">
        <aside class="flex flex-col w-64 bg-gray-800 text-white h-screen sticky top-0">
            <div class="flex items-center justify-center h-20 border-b border-gray-700">
                <span class="text-xl font-semibold">Pleyades CMS</span>
            </div>
            <nav class="flex-1 overflow-y-auto">
                <ul class="py-4 px-2">
                    <li>
                        <a href="/app/beneficiaires/" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <span class="mx-4">Bénéficiaires</span>
                        </a>
                        <a href="/app/export/" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <span class="mx-4">Générer des exports</span>
                        </a>
                        <a href="/app/admin/users" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <span class="mx-4">Générer les utilisateur (admin)</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <a href="/auth/logout" class="w-full text-center py-3 text-white bg-black">Se déconnecter</a>
        </aside>
        <div class="flex-1 p-10">
            <?= $this->section('content')?>
        </div>
    </div>