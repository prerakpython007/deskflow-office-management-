<h2>Employees List</h2>

<a href="{{ route('employees.create') }}">Add Employee</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Manager</th>
    </tr>

    @foreach($employees as $emp)
    <tr>
        <td>{{ $emp->name }}</td>
        <td>{{ $emp->email }}</td>
        <td>{{ $emp->company->name ?? 'N/A' }}</td>
        <td>{{ $emp->manager->name ?? 'N/A' }}</td>
    </tr>
    @endforeach
</table>