<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"><h1>liste des actualitées</h1></div>

                  @forelse ($actus as $actu)
                      
                 
                <!-- component -->
                <div>
                <div class="flex flex-col gap-4 items-center justify-center bg-white">

                    <!-- Card 1 -->
                    <a href="" class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">
                
                    <!-- Badge -->
                    <p class="bg-sky-500 w-fit px-4 py-1 text-sm font-bold text-white rounded-tl-lg rounded-br-xl"> ARTICLE </p>
                    <div class="grid grid-cols-6 p-5 gap-y-2">
                        
                        <!-- Profile Picture -->
                        <div>
                            {{---Controle de de la presence de l'image dans la db  
                                -empeche l'affichage de la balise image si il n'y a pas d'image--}}
                            @if (isset($actu->image))
                                <img src="{{Storage::url($actu->image)}}" class="max-w-16 max-h-16 rounded-full" />
                            @endif
                        </div>
                            
                        <!-- Description -->
                        <div class="col-span-5 md:col-span-4 ml-4">
                            <p class="text-gray-400">Mercredi 03 mai 2022</p>
                            <p class="text-gray-600 font-bold">{{$actu->titre}}</p>
                            <p class="text-gray-400">{{ $actu->description}}</p>
                            
                        </div>
                            
                        <!-- Price -->
                        <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
                        <p class="rounded-lg text-sky-500 font-bold bg-sky-100  py-1 px-3 text-sm w-fit h-fit"> $ 5 </p>
                        </div>  
                    </div>
                        </a>
                        
                        {{-- Bouton delete --}}
                        <div class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-green-50 bg-amber-600 hover:bg-red-800  "> 
                            <a href="{{route('admin-actu-modifier' , ["actu"=>$actu] )}}" >modifier</a>
                        </div>

                        {{-- Bouton delete --}}
                        <div class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-green-50 bg-amber-600 hover:bg-red-800  "> 
                            <a href="{{route('admin-actu-supprimer' , ['actu'=>$actu])}}" >supprimer</a>
                        </div>
                </div>


                


                    @empty
                        <h5>Pas d'actualitées</h5>

                    @endforelse
               
            </div>
        </div>
    </div>
</x-app-layout>
