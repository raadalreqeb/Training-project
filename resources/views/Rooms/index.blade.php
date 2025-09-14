<x-layout>
    <x-slot:heading>
        About page
    </x-slot>
<p>Jobs</p>
 
<div class="space-y-4">





     @foreach ($rooms as $room )
     

       <div class="mb-4 border p-3 rounded"></div>
   <img src="{{ $room->image }}" alt="Room {{ $room->number }}" width="400" height="300">
     
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