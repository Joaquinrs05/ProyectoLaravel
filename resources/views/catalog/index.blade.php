<x-app-layout>
    <div class="flex flex-wrap -mx-2">
        @foreach( $arrayPeliculas as $pelicula )
            <div class="w-full sm:w-1/3 md:w-1/4 lg:w-1/5 p-2">
                <a href="{{ url('/catalog/show/' . $pelicula->id ) }}" class="block group">
                    <div class="relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white">
                        <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-50" style="background-image: url('{{$pelicula->poster}}');"></div>
                        <img src="{{$pelicula->poster}}" class="relative w-3/4 h-48 object-cover mx-auto my-4 transform group-hover:scale-105 transition-transform duration-300 rounded-md" alt="Poster de {{$pelicula->title}}">
                    </div>
                    <h4 class="mt-3 text-lg font-semibold text-white hover:text-red-400 transition-colors duration-300 text-center">
                        {{$pelicula->title}}
                    </h4>
                </a>
            </div>
        @endforeach
    </div>

    {{--Aqui ponemos pelicula -> links para que nos de la paginacion --}}

</x-app-layout>
