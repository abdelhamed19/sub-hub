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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('all');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');

        // تحديث حالة "Select All"
        function updateSelectAll() {
            const checkedCount = document.querySelectorAll('.row-checkbox:checked').length;
            const totalCount = rowCheckboxes.length;

            selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < totalCount;
            selectAllCheckbox.checked = checkedCount === totalCount && totalCount > 0;
        }

        // Select All / Deselect All
        selectAllCheckbox.addEventListener('change', function() {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateSelectAll();
        });

        // تحديث عند اختيار صف واحد
        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectAll);
        });

        // دالة الحذف المتعدد بـ SweetAlert2
        window.deleteAllSelected = function() {
            const selectedCheckboxes = document.querySelectorAll('.row-checkbox:checked');
            const ids = Array.from(selectedCheckboxes).map(cb => cb.id.replace('checkbox-', ''));

            if (ids.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: "{{ __('mutual.oops') }}",
                    text: "{{ __('mutual.no_items_selected') }}",
                    confirmButtonText: "{{ __('mutual.ok') }}",
                    customClass: {
                        confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                });
                return;
            }

            Swal.fire({
                icon: 'warning',
                title: "{{ __('mutual.are_you_sure') }}",
                text: "{{ __('mutual.confirm_delete_selected') }} (" + ids.length +
                    " {{ __('mutual.items') }})",
                showCancelButton: true,
                confirmButtonText: '<i class="fe fe-trash-2 mr-2"></i> {{ __('mutual.delete') }}',
                cancelButtonText: "{{ __('mutual.cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    // إظهار لودينج
                    Swal.fire({
                        title: "{{ __('mutual.deleting') }}...",
                        text: "{{ __('mutual.please_wait') }}",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    const actionUrl = document.querySelector('.delete-multiple-link').getAttribute(
                        'data-action');

                    fetch(actionUrl, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                ids: ids
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire({
                                    icon: 'success',
                                    title: "{{ __('mutual.deleted') }}!",
                                    text: "{{ __('mutual.delete_success_multiple') }}",
                                    confirmButtonText: "{{ __('mutual.ok') }}",
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                return response.json().then(data => {
                                    throw new Error(data.message ||
                                        "{{ __('mutual.delete_failed') }}");
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: "{{ __('mutual.oops') }}",
                                text: error.message ||
                                    "{{ __('mutual.network_error') }}",
                                confirmButtonText: "{{ __('mutual.ok') }}",
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                            });
                        });
                }
            });
        };
    });
</script>
