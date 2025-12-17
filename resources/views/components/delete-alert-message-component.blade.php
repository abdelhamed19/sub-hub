<script>
    function confirmDelete(link) {
        const name = link.getAttribute('data-name');
        const action = link.getAttribute('data-action');

        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: `سيتم حذف المستخدم "${name}" نهائياً!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذف!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `/${action}`;

                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                form.appendChild(method);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
