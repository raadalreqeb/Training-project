<x-layout>
    <x-slot:heading>
       log In
    </x-slot>

 <form method="post"  action="/login">
 @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
   
       
               
    
         <x-from-filed >
                <x-form-label for="email">Email</x-form-label>
                  <div class="mt-2">

                      <x-form-input id="email" name="email"  type="email" :value="old('email')"  />
          
                 <x-form-error name="email" />
                  </div>
        </x-from-filed>
              



         <x-from-filed >
                <x-form-label for="password">Password</x-form-label>
                  <div class="mt-2">

                      <x-form-input id="password" name="password"  type="password"  />
          
                 <x-form-error name="password" />
                  </div>
        </x-from-filed>




    </div>


       <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        

    </div>

  
    </div>
   
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
     <x-from-button>Log In</x-from-button>
  </div>
 </form>

</x-layout>