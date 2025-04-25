<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @livewireStyles
</head>

<body x-data="{ activeView: 'None',  
                showSuccess: false,
                showModal: false
}"
    class="bg-gray-50 font-sans">
    <livewire:dashboard>
        <livewire:global-modal>
            @livewireScripts

            <script>
                Livewire.on('show-success-modal', ({
                    message
                }) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                });

                Livewire.on('triggerDelete', (userId) => {
                    console.log(userId);
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            window.Livewire.dispatch('deleteUser', userId);
                            console.log(userId)
                        }
                    });
                });

                window.addEventListener('user-deleted', () => {
                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    );
                });
            </script>
</body>

</html>