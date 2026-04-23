<h2>Add Company</h2>

<form action="{{ route('companies.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Company Name"><br><br>
    <input type="text" name="location" placeholder="Location"><br><br>

    <button type="submit">Save</button>
</form>