@props(['name'])

@error($name)
                <P class="taxt-xs text-red-500 font-semibold"> {{ $message }} </P>
 @enderror