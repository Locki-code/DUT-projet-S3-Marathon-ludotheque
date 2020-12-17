
<div class="text-center" style="margin-top: 2rem">
    <h3>Voulez vous supprimer le jeu ? </h3>
    <hr class="mt-2 mb-2">
</div>

<table class="table-auto">
    <tbody>
        @foreach($achat as $ach)


        <div class="flex items-center justify-end mt-4 top-auto">
            <form action="{{route('user.supprimeAchat',$ach->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" name="delete" value="annule"
                        class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Annule
                </button>
                <button type="submit" name="delete" value="valide"
                        class=" bg-white text-red-500 px-2 py-2 rounded-md ">Valide
                </button>
            </form>
        </div>
        @endforeach
    </tbody>
</table>
