<h2>Companies List</h2>

<a href="{{ route('companies.create') }}">Add Company</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Location</th>
    </tr>

    @foreach($companies as $company)
    <tr>
        <td>{{ $company->name }}</td>
        <td>{{ $company->location }}</td>
    </tr>
    @endforeach
</table>