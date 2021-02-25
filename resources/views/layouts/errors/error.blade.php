@if ($errors->any())
<div class="alert alert-danger text-right">
    
   <button type="button" class="close text-left" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
   <ul>
    @foreach ($errors->all() as $error)
    <li class="text-center">
            {{ $error }}
    </li>
    @endforeach
  
   </ul>
</div> 
@endif