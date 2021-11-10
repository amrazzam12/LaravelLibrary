@props(['section' ,'id'])
<div>
   <a href="{{url('admin/' .$section .'/' .$id .'/edit')}}">
       <button class="btn btn-primary btn-md">Edit</button>
   </a>
    <form action="{{url('admin/' .$section .'/' .$id)}}" method="post" style="display: inline-block">
        @csrf
        @method('delete')
        <button class=" btn btn-danger btn-md">Delete</button>
    </form>
</div>
