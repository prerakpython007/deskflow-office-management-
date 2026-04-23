<h2>Add Employee</h2>

<form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>

   <select name="company_id" required>
    <option value="">Select Company</option>
    @foreach($companies as $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
    @endforeach
</select><br><br>

    <select name="manager_id">
        <option value="">No Manager</option>
        @foreach($employees as $emp)
            <option value="{{ $emp->id }}">{{ $emp->name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Save</button>
</form>