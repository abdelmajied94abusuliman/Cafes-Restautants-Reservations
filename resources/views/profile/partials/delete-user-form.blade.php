<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
        .contanerrrr{
            margin-bottom:8px;
            box-shadow: 0px 7px 15px black;
        }

        .butt{
            background-color: rgb(2, 111, 2);
            margin-left:140px;
            cursor: pointer;
            border-radius:50px;
            color: black;
        }

        .butt:hover{
            background-color: rgb(255, 72, 36);
            color:rgb(255, 255, 255);
            border-radius:50px;
        }

        .butt1{
            font-size:16px;
            background-color: black;
            color: #000 !important;
            cursor: pointer;
        }
        .butt1:hover{
            background-color:rgb(193, 0, 0) !important;
            color:rgb(255, 255, 255);
            border-radius:50px;
        }

        .butt2{
            font-size:16px;
            margin-bottom:20px;
            margin-left:120px;
            cursor: pointer;
            background-color: rgb(244, 6, 6) !important;

        }

        .butt2:hover{
            background-color:rgb(0, 182, 24)!important;
            border-radius:50px;
        }
        .buttdelet{
            font-size:18px;
            cursor: pointer;
            background-color: rgb(255, 72, 36);

        }
        .buttdelet:hover{
            background-color:rgb(193, 0, 0);
            color:rgb(255, 255, 255);
            border-radius:50px;
        }
        .delet{
        text-align:center;
        }

        .pargra{
            font-size:30px;
            color: black;
        }

        .Password{
            font-size: 20px;
        }
        .Passwordd{
            font-size: 25px;
            margin-left: 25px;
        }


</style>
<body>

<div class="contanerrrr">

    <section class="space-y-6">
        <header>
          <div class="header1">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Delete Account') }}
                </h2>
          </div>

        <div class="header2">
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will
                 be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>

        </header>

    <div class="delet">
        <x-danger-button onclick="showConfirm()"  x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="buttdelet">
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>
        <div name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

            <form style="display: none" id="confirmDelete"
            method="post" action="{{ route('profile.destroy') }}" class="p-6" >
                @csrf
                @method('delete')

                <h2 class="pargra">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p> --}}

                <div class="mt-6">
                    <x-input-label for="password" value="Password" class="Passwordd" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="Password"
                        placeholder="Password"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')"  />
                </div>

                <div>
                    <x-secondary-button onclick="closeConfirm()"
                    x-on:click="$dispatch('close')" class="butt2">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="butt1">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </div>

    </section>

</div>

<script>

    function showConfirm() {
        document.getElementById("confirmDelete").style.display = 'block';
    }
    function closeConfirm() {
        document.getElementById("confirmDelete").style.display = 'none';
    }

    </script>


</body>
</html>
@include('layouts.footer')

