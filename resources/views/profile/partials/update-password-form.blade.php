<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
         .contanerrr{
          box-shadow: 0px 7px 15px black;
        }

        .name{
            font-size:18px;
            text-align: center;
        }

        .massege{
            color:#000;
            font-size: 20px;
            text-align: center;
            margin-bottom:35px;
            margin-left:35em;
        }

        .New_Password{
          margin-left:23px;
          margin-bottom: 15px;
        }

        .current_password{
            margin-bottom: 15px;
        }

        .Confirm_Password{
            margin-bottom: 15px;
        }


</style>

<body>
    <div class="contanerrr">

    <section>

        <header>
            <div class="header1">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Update Password') }}
                </h2>
            </div>
         <div class="header2">
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
           </div>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')


    <div class="Name">

    <div class="current_password">
        <x-input-label  class="name" for="current_password" :value="__('Current Password')" />
        <x-text-input id="current_password" name="current_password" type="password" class="namee" autocomplete="current-password" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div class="New_Password">
        <x-input-label  class="name" for="password" :value="__('New Password')" />
        <x-text-input id="password" name="password" type="password" class="namee" autocomplete="New-password" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div class="Confirm_Password">
        <x-input-label  class="name" for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="namee" autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

            <x-primary-button class="butt">{{ __('Save') }}</x-primary-button>
    </div>

            <div class="flex items-center gap-4">

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="massege"
                    >{{ __('Save change password') }}</p>
                @endif
            </div>
        </form>
    </section>
</div>


</body>
</html>





