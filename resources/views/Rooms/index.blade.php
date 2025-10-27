<x-layout>
    <x-slot:heading>
        About page
    </x-slot>
<p>Jobs</p>
 
<div class="space-y-4">





     @foreach ($rooms as $room )
     

       <div class="mb-4 border p-3 rounded"></div>
   @if($room->image && file_exists(public_path('storage/' . $room->image)))
       <img src="{{ asset('storage/' . $room->image) }}" alt="Room {{ $room->number }}" width="400" height="300">
   @else
       <div class="w-[400px] h-[300px] bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center rounded">
           <svg class="w-20 h-20 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
           </svg>
       </div>
   @endif
     
       <h2 class="font-bold">Room {{ $room->number }} - {{ $room->type }}</h2>
      <p >Price ${{ $room->price  }}</p>

            @forelse($room->reservations as $reservation )
               

            <p> {{$reservation->user->first_name  }}</p>
           <p><strong>Reservation ID:</strong>  {{ $reservation->Reservation_ID}}</p>

           <p><strong>Period:</strong> {{ $reservation->start_date }} -> {{ $reservation->end_date }}</p>

           @empty
            <p>No reservations for this room.</p>
           @endforelse
            



    </div>

   
      
@endforeach
<div>{{ $rooms->links() }}</div>
</div>

</x-layout>