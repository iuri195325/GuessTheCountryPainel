@if(count($countrys) > 0)
<div style="width: 50%">
  <table class="table">
    <thead class="border">
      <tr >
        <th scope="col">id</th>
        <th scope="col">Nome do Pais</th>
        <th scope="col">Icone da Bandeira</th>
        <th scope="col">Imagem do Mapa</th>
      </tr>
    </thead>
    @foreach($countrys as $country)
    <tbody class="border">
      <tr>
        <td scope="row">{{$country->id}}</td>
        <td>{{$country->country_name}}</td>
        <td><img style="width: 10%" src="{{asset('storage/' . $country->country_icon_flag_file_code)}}" alt=""></td>
        <td><img style="width: 10%" src="{{asset('storage/' . $country->country_world_map_img_file_code)}}" alt=""></td>
        <td><button wire:click='deleteCountry({{ $country->id }})' wire:confirm="Are you sure you want to delete this post?" class="btn btn-danger">Excluir</button></td>
        <td><button wire:click='updateCountry({{ $country }})' class="btn btn-primary">Editar</button></td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@endif