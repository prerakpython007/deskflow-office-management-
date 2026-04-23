<!DOCTYPE html>
<html class="dark">
<head>
    <title>Employees</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-100 min-h-screen">

<div class="relative isolate overflow-hidden">
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="space-y-6">

            @if(session('success'))
            <div class="rounded-xl bg-green-500/10 border border-green-500/30 px-4 py-3 text-green-400 text-sm">
                {{ session('success') }}
            </div>
            @endif

            <section class="space-y-3">
                <div class="inline-block">
                    <p class="text-xs uppercase tracking-widest text-cyan-400 font-semibold px-3 py-1 bg-cyan-500/10 rounded-full border border-cyan-500/30">Dashboard</p>
                </div>
                <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div class="max-w-2xl">
                        <h1 class="text-4xl lg:text-5xl font-bold text-white tracking-tight">
                            Employees <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Directory</span>
                        </h1>
                        <p class="mt-3 text-base text-slate-300 leading-relaxed">Manage and organize your employee records efficiently.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="{{ route('employees.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-500/40 hover:-translate-y-0.5">
                            Add Employee
                        </a>
                        <a href="{{ route('companies.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-700 bg-slate-950/80 px-6 py-3 text-sm font-semibold text-slate-100 transition-all duration-300 hover:border-cyan-400">
                            View Companies
                        </a>
                    </div>
                </div>
            </section>

            <section class="space-y-4">
                <div class="space-y-1">
                    <h2 class="text-xl font-bold text-white">Employee Directory</h2>
                    <p class="text-slate-400">{{ count($employees) }} total employees</p>
                </div>

                <div class="rounded-2xl border border-slate-700 bg-slate-900/50 backdrop-blur-lg overflow-hidden shadow-2xl shadow-black/20">
                    <div class="overflow-x-auto">
                        <!-- Filter Bar -->
<div class="flex flex-col gap-3 sm:flex-row sm:items-center mb-4">
    <select id="filterCompany" class="rounded-xl border border-slate-700 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 outline-none focus:border-cyan-400">
        <option value="">All Companies</option>
        @foreach($companies as $company)
            <option value="{{ $company->name }}">{{ $company->name }}</option>
        @endforeach
    </select>
    <select id="filterPosition" class="rounded-xl border border-slate-700 bg-slate-950/70 px-4 py-2 text-sm text-slate-100 outline-none focus:border-cyan-400">
        <option value="">All Positions</option>
    </select>
</div>
                        <table id="employeesTable" class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-slate-700 bg-slate-950/80">
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Company</th>
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Position</th>
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Manager</th>
                                    <th class="px-6 py-4 text-center font-semibold text-slate-300 uppercase text-xs tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @foreach($employees as $emp)
                                <tr class="group hover:bg-slate-800/50 transition-all duration-300">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center text-white font-semibold text-sm">
                                                {{ strtoupper(substr($emp->name, 0, 1)) }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-semibold text-white">{{ $emp->name }}</span>
                                                <span class="text-slate-400 text-xs">{{ $emp->position ?? 'Employee' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-300">{{ $emp->email }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-3 py-1 text-xs font-medium text-blue-200">
                                            {{ $emp->company->name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-slate-300">{{ $emp->position ?? '—' }}</td>
                                    <td class="px-6 py-4 text-slate-300">{{ $emp->manager->name ?? '—' }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('employees.edit', $emp->id) }}" class="px-3 py-1.5 rounded-lg bg-cyan-500/10 text-cyan-400 hover:bg-cyan-500/20 text-xs font-medium transition duration-200">
                                                Edit
                                            </a>
                                            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" onsubmit="return confirm('Delete this employee?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 text-xs font-medium transition duration-200">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    var table = $('#employeesTable').DataTable({
        pageLength: 10,
        language: {
            search: "Search employees:",
            lengthMenu: "Rows per page: _MENU_",
            info: "Showing _START_ to _END_ of _TOTAL_ employees",
            paginate: { previous: "← Previous", next: "Next →" }
        },
        initComplete: function () {
            // Auto populate Position filter from table data
            this.api().column(3).data().unique().sort().each(function (value) {
                if (value && value !== '—') {
                    $('#filterPosition').append('<option value="' + value + '">' + value + '</option>');
                }
            });
        }
    });

    // Filter by Company (column 2)
    $('#filterCompany').on('change', function () {
        table.column(2).search(this.value).draw();
    });

    // Filter by Position (column 3)
    $('#filterPosition').on('change', function () {
        table.column(3).search(this.value).draw();
    });
});
</script>
</body>
</html>