<x-guest>
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="bg-white w-1/2 h-1/2 m-2 p-8 rounded-sm shadow-md flex flex-col justify-between items-center">
            <h1 class="text-xl">{{ __('auth.verify_email') }}</h1>

            <p class="text-base">{{ __('auth.send_mail_description') }}</p>
            @if(session('status') == 'success')
                <div class="w-full text-center my-2">
                    <div class="text-green-500">
                        {{ __('auth.verification_link_sent') }}
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('auth.resend-verification-email') }}" class="w-full flex flex-col justify-center items-center space-y-2">
                @csrf
                <button type="submit" class="w-full bg-green-400 hover:bg-green-500 shadow-md duration-500 text-white rounded-sm p-2 mt-4">{{ __('auth.re-send_mail') }}</button>
            </form>
        </div>
    </section>
</x-guest>
