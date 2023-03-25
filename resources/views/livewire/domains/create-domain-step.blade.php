<div>
    <x-input wire:model.defer="domainName" type="text" />

    <x-button wire:click="createDomain" class="text-lg">  
        Register Domain
    </x-button>
</div>
