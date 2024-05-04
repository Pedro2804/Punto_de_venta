

@push('scripts')
    <script src="{{asset('js/sweetalert2@11.js')}}"></script>
        
    <script>
        Livewire.on('mensaje', param => {
            Swal.fire({
                title: param[0]['title'],
                text: param[0]['messaje'],
                icon: param[0]['icon'],
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>

@endpush