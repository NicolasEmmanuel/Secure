<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-amber-600 border-b border-gray-200">
                 EDITER
                </div>

                    <!-- component -->

                            {{-- Modification de l'entete pour enregistrer --}}
                            @if (isset($actu))

                                <form action="{{ route("admin-actu-editer") }}" method="post" enctype="multipart/form-data">

                            @else
                                {{-- Modification de l'entete pour poster --}}
                                <form action="{{ route('admin-actu-modifier' , ['actu'=>$actu]) }}" method="post" enctype="multipart/form-data">

                            
                                
                            @endif
            
                        @csrf
                        <div class="bg-neutral-50 min-h-screen md:px-20 pt-6">
                        <div class=" bg-neutral-50 rounded-md px-6 py-10 max-w-2xl mx-auto">
                            <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">{{$actu->titre}}</h1>
                            <div class="space-y-4">

                                <div>
                                    <Label for="semaine">Selectionner un jour</Label>
                                    <select name="semaine_id" id="semaine">

                                        @foreach ( $semaines as $jourDeLaSemaine )
                                            @if ($jourDeLaSemaine->id==$actu->semaine_id)
                                            {{-- "Selected" selection la precedente valeur associé a l'actu --}}
                                                <option value="{{$jourDeLaSemaine->id}}" selected>{{$jourDeLaSemaine->jour}}</option>

                                            @else

                                                <option value="{{$jourDeLaSemaine->id}}">{{$jourDeLaSemaine->jour}}</option>

                                            @endif
                                        @endforeach
                                       
                                    </select>
                                </div>

                            <div>
                                <label  for="title" class="text-lx font-serif">Titre:</label>
                                <input value="{{$actu->titre}}" type="text" placeholder="titre" id="titre" name="titre" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-lg font-serif">Description:</label>
                                <textarea id="description" name="description" cols="30" rows="10" placeholder="écrire ici ..." class="w-full font-serif  p-4 text-gray-600 bg-neutral-50 outline-none rounded-md">{{$actu->description}}</textarea>
                            </div>
                            <div>
                                <label for="image" class="" >image</label>
                                    <input type="file" name="imageActu">
                            </div>
                            
                            
                            <button class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-green-50 bg-amber-600 hover:bg-green-700  ">Ajouter</button>
                            </div>
                        </div>
                        </div>
               
                    </form>
                




            </div>
        </div>
    </div>

</x-app-layout>


