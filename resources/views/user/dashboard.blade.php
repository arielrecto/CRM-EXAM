<x-admin-lte.dashboard>

    <x-admin-lte.header />
    <x-admin-lte.main-content>
        <x-admin-lte.stats-row>
            <x-admin-lte.card :label="__('messages.company')"  :total="$totalCompany" icon="ion ion-person"/>
            <x-admin-lte.card :label="__('messages.employee')" bg_color="bg-success" :total="$totalEmployee" icon="ion ion-ios-people"/>
        </x-admin-lte.stats-row>
    </x-admin-lte.main-content>
</x-admin-lte.dashboard>
