<div>
    {{--<x-jet-button wire:click="$set('open', true)">--}}
    <x-jet-button wire:click="$set('open', true)">
        Registrar Detalle
    </x-jet-button>

    {{--{{ dd($id_client_lead) }}--}}
    <x-jet-dialog-modal wire:model="open" maxWidth="md">
        <x-slot name="title">
            <h4 class="font-semibold">Crear Detalles del Leads</h4>
        </x-slot>
        <x-slot name="content">
            <div class="hidden">
                <x-jet-input type="hidden" class="w-full" wire:model.defer="fk_client_lead" value={{ 1 }}/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Título del detalle:"/>
                <x-jet-input type="text" class="w-full" wire:model.defer="title"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del detalle:"/>
                <textarea rows="6" class="form-control w-full" wire:model.defer="description"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="save({{$id_client_lead}})">
                Registrar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
