


    <h2 class="mb-4">Suppression du commentaire</h2>
    <p>Voulez-vous supprimer ce commentaire :</p>
    <p>{{$commentaire->commentaire}}</p>
    <div class="flex items-center justify-end mt-4 top-auto">
        <form action="{{route('supprimeCommentaire',$commentaire->id)}}" method="POST">
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



