<x-app-layout>
    @push('title', __('Welcome to the best hotel on the web!'))


    <div class="col-span-12 md:col-span-6 bg-gray-900/50 rounded-xl flex flex-col py-6 px-8 text-white self-start">
        <h2 class="text-2xl">Create a new accocunt</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

           <div class="grid grid-cols-12 gap-3 mt-4">
               <div class="relative w-full overflow-hidden text-black col-span-12">
                   <input id="username-input" type="text" placeholder="Enter your username" name="username" class="relative py-2 rounded-md w-full" required>
               </div>

               <div class="relative w-full overflow-hidden text-black col-span-12">
                   <input id="email-input" type="email" placeholder="Enter your e-mail" name="mail" class="relative py-2 rounded-md w-full" required>
               </div>

               <div class="col-span-12">
                   <input type="password" placeholder="Enter your password" name="password" class="relative py-2 rounded-md text-black w-full" required>
               </div>

               <div class="col-span-12">
                   <input type="password" placeholder="Confirm your password" name="password_confirmation" class="relative py-2 rounded-md text-black w-full" required>
               </div>
           </div>

            <div class="flex items-center gap-x-3 mt-2">
                <input id="terms" type="checkbox" name="terms"
                       class="mt-1 rounded ring-0 focus:ring-0">

                <a href="{{ route('help-center.rules.index') }}" target="_blank"
                   class="mt-1 text-sm font-semibold text-white hover:text-gray-900 hover:underline hover:text-gray-200">
                    {{ __('I accept the :hotel terms & rules.', ['hotel' => setting('hotel_name')]) }}
                </a>
            </div>

            {{-- Used to determine the refer --}}
            <input type="hidden" name="referral_code" value="{{ $referral_code }}">

           <x-site-captchas />

            <div class="mt-4 grid grid-cols-2 gap-3">
                <button type="submit" class="py-2 px-4 text-white bg-yellow-500 border-2 border-yellow-300 w-full rounded-md transition duration-300 ease-in-out hover:scale-[102%]">Register</button>

                <a href="{{ route('login') }}" class="w-full">
                    <button type="button" class="py-2 px-4 text-white bg-gray-700 border-2 border-gray-600 w-full rounded-md transition duration-300 ease-in-out hover:scale-[102%]">Back to login</button>
                </a>
            </div>
        </form>
    </div>

    <script>
        function debounce(func, wait) {
            let timeout;
            return function() {
                const context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        const avatar = document.getElementById('user-avatar');
        const usernameInput = document.getElementById('username-input');

        const updateAvatar = debounce(async () => {
            const username = usernameInput.value;
            if (!username) return;

            try {
                const response = await fetch(`/api/user/${username}`);
                if (!response.ok) {
                    console.error('Failed to fetch avatar');
                    return;
                }

                const data = await response.json();


                if (!data.data.look) {
                    avatar.src = "/assets/images/dusk/ghost.png";

                    return;
                }

                avatar.src = '{{ setting('avatar_imager') }}' + '/' + data.data.look + '&direction=4&action=wav&head_direction=3';
            } catch (error) {
                console.error('An error occurred:', error);
            }
        }, 200);

        usernameInput.addEventListener('keyup', updateAvatar);

    </script>
    <script src="/assets/js/fancybox.umd.js"></script>
    <link rel="stylesheet" href="/assets/css/fancybox.css" />
</x-app-layout>
