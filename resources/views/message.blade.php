@extends('layouts.app')

@section('title-block'){{ $data->subject }} @endsection

@section('content')
<h1>{{ $data->subject }}</h1>

<div class="alert alert-info">
    <h3>Status: {{ $data->status }}</h3>
    <h3>Type: {{ $data->app_type }}</h3>
    <p>{{ $data->name }}</p>
    <p>{{ $data->email }}</p>
    <p>{{ $data->messages }}</p>
    <p><small>{{ $data->created_at }}</small></p>

    @if ( $data->messageImageBefore != null )
        <h3>Image before:</h3>
        <img style="width: 100%;" src="{{asset("storage/image/$data->messageImageBefore")}}" alt="">
    @endif

    @if ( $data->messageImageAfter != null )
        <h3>Image after:</h3>
        <img style="width: 100%;" src="{{asset("storage/image/$data->messageImageAfter")}}" alt="">
    @endif

    @if ( $data->status == 'sent' or Gate::check('edit-messages'))
        <form method="GET" action="{{ route('contact-delete', $data->id) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
        </form>
    @endif
    
    @can('edit-messages')
        <a href="{{ route('contact-update', $data->id) }}"><button class="btn btn-primary mt-3">Edit</button></a>
    @endcan
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

@endsection
