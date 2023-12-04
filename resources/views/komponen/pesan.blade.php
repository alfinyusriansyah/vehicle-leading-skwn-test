<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success')) 
    <script>
        Swal.fire(
            text='{{$message}}')
    </script>
@endif

@if (Session::has('failed'))

@endif

@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>    
@endif