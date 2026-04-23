<!DOCTYPE html>
<html class="dark">
<head>
    <title>Companies</title>
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
                            Companies <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Directory</span>
                        </h1>
                        <p class="mt-3 text-base text-slate-300 leading-relaxed">Review and manage company records with a clean dashboard.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="{{ route('companies.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-500/40 hover:-translate-y-0.5">
                            Add Company
                        </a>
                        <a href="{{ route('employees.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-700 bg-slate-950/80 px-6 py-3 text-sm font-semibold text-slate-100 transition-all duration-300 hover:border-cyan-400">
                            View Employees
                        </a>
                    </div>
                </div>
            </section>

            <section class="space-y-4">
                <div class="space-y-1">
                    <h2 class="text-xl font-bold text-white">Company Directory</h2>
                    <p class="text-slate-400">{{ $companies->count() }} total companies</p>
                </div>

                <div class="rounded-2xl border border-slate-700 bg-slate-900/50 backdrop-blur-lg overflow-hidden shadow-2xl shadow-black/20">
                    <div class="overflow-x-auto">
                        <table id="companiesTable" class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-slate-700 bg-slate-950/80">
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Company</th>
                                    <th class="px-6 py-4 text-left font-semibold text-slate-300 uppercase text-xs tracking-wider">Location</th>
                                    <th class="px-6 py-4 text-center font-semibold text-slate-300 uppercase text-xs tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @foreach($companies as $company)
                                <tr class="group hover:bg-slate-800/50 transition-all duration-300">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center text-white font-semibold text-sm">
                                                {{ strtoupper(substr($company->name, 0, 1)) }}
                                            </div>
                                            <span class="font-semibold text-white">{{ $company->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-300">{{ $company->location ?? 'Not specified' }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('companies.edit', $company->id) }}" class="px-3 py-1.5 rounded-lg bg-cyan-500/10 text-cyan-400 hover:bg-cyan-500/20 text-xs font-medium transition duration-200">
                                                Edit
                                            </a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Delete this company?')">
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
    $('#companiesTable').DataTable({
        pageLength: 10,
        language: {
            search: "Search companies:",
            lengthMenu: "Rows per page: _MENU_",
            info: "Showing _START_ to _END_ of _TOTAL_ companies",
            paginate: { previous: "← Previous", next: "Next →" }
        }
    });
});
</script>
</body>
</html>