@extends('layouts.admin')
@section('content')
<div class="row">
     <h1>Listado de usuarios</h1>

</div>
    <hr>
<div class="row">

    <table border="1">
        <tr>
            <td>Nombre</td>
            <td>Email</td>
        </tr>
    @foreach ($usuarios as $usuario)

<tr>
    <td>{{$usuario->name}}</td>   
        <td>{{$usuario->email}}</td> 
</tr> 
@endforeach      
    </table>
    
   
 

</div>

@endsection

