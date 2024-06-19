
<form action="{{ route('we.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <button type="submit">Test Update</button>
</form>