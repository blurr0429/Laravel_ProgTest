<h1> {{$heading}}</h1>

{{-- IF STATEMENT IF LISTINGS ARE EMPTY --}}
{{-- @if(count($listings) == 0)
    <p>No Listing Found</p>
@endif --}}


{{--FOR LOOP TO DISPLAT ALL LISTINGS--}}
@foreach ($listings as $listing) 
<h2>
    <a href = "/listings/{{$listing['id']}}"> {{$listing['title']}} </a>
</h2>
<p>
    {{$listing['description']}}
</p>
@endforeach