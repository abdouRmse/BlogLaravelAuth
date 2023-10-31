@section ('scripts')
<script>
    
    ClassicEditor
		.create( document.querySelector( '#editor' ),{
            ckfinder:{
                uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}"
            }
        } )
		.catch( error => {
			console.error( error );
		} );
</script>
@endsection