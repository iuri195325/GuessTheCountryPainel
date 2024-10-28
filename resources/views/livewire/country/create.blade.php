<div style="width: 50%; margin-bottom: 5%; margin-top: 5%">
    <form wire:submit='save'>
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="form-control" >
            <label class="mb-2">Nome do Pais: </label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">🌎</span>
                <x-forms.input type="text" name="countryName" wire:model.live='countryName' placeholder="Digite Aqui..."
                    class="form-control" />
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Selecione o Icon da Bandeira do Pais:</label>
                <x-forms.input class="form-control" name="countryIconFlag" wire:model.live='countryIconFlag' type="file" />
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Selecione a Imgem do Mapa do Pais:</label>
                <x-forms.input class="form-control" name="countryMapImage" wire:model.live='countryMapImage' type="file" />
            </div>
    
            <div>
                <button type="submit" class="btn btn-primary">{{ $isEditForm ? 'Editar' : 'Criar'}}</button>
            </div>
        </div>
    </form>
</div>