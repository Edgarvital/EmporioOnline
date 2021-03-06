<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Atualize as informações do seu perfil') }}
    </x-slot>

    <x-slot name="form">
        @if ($this->user->tipo == 'user')
                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Foto') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <span class="block rounded-full w-20 h-20"
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nome') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        @if ($this->user->tipo == 'user')
            <!-- Número Telefone -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="numTelefone" value="{{ __('Número Telefone') }}" />
                <x-jet-input id="numTelefone" type="number" class="mt-1 block w-full" wire:model.defer="state.numTelefone" autocomplete="numTelefone"/>
                <x-jet-input-error for="numTelefone" class="mt-2" />
            </div>
        @endif

        <!-- CPF -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cpf" value="{{ __('CPF') }}" />
            <x-jet-input id="cpf" type="number" class="mt-1 block w-full" wire:model.defer="state.cpf" autocomplete="cpf" />
            <x-jet-input-error for="cpf" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            @if (session()->has('success'))
                <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif
        </div>

    </x-slot>

    @if ($this->user->tipo == 'user')
        <x-slot name="actions">
            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Salvar') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>