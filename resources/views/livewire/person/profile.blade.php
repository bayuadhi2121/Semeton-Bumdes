<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Profil</h2>


    <form wire:submit.prevent="save">
        <div class=" grid grid-cols-2 gap-4 gap-y-1 w-3/4">
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                <input wire:model='username' type="text" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                    placeholder="Username" required>
                @error('username')
                    <span class="error text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900 ">Kontak</label>
                <input wire:model='kontak' type="text" id="kontak" name="kontak"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mb-4"
                    placeholder="Kontak" required>
            </div>

            <div>
                <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 ">Password Baru</label>
                <input wire:model="passNew" type="password" id="password1" name="password1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mb-4">
            </div>
            <div>
                <label for="password2" name="password2"
                    class="konfirmasi block mb-2 text-sm font-medium text-gray-900 ">Konfirmasikan Password</label>
                <input wire:model.live="passConfirm" type="password" id="password2"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5">
                @error('passConfirm')
                    <span class="error text-sm text-red-500">{{ $message }}</span>
                @enderror
                {{-- <p class="mt-1 mb-4 text-sm text-red-600 dark:text-red-500" style="display: none;" id="passwordMessage">
                    <span class="font-medium">Maaf!</span>
                    Password tidak sesuai
                </p> --}}
            </div>

            <div>

                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Password saat ini</label>
                <input wire:model="passNow" type="password" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5">
                @error('passNow')
                    <span class="error text-sm text-red-500">{{ $message }}</span>
                @enderror

            </div>
        </div>


        <button
            class="block text-white bg-cyan-900 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4"
            type="submit">
            Simpan
        </button>

    </form>


    {{-- <script>
        function checkPasswords() {
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;
            var message = document.getElementById("passwordMessage");

            if (password1 === password2) {
                // Passwords match
                message.style.display = "none";
            } else {
                // Passwords do not match
                message.style.display = "block";
            }
        }
    </script> --}}
</div>
