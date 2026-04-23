<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-100 min-h-screen">

<div class="relative isolate overflow-hidden">
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="min-h-screen px-4 py-8 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="w-full max-w-3xl rounded-[32px] border border-slate-800 bg-slate-900/50 shadow-2xl shadow-black/40 backdrop-blur-xl overflow-hidden">
            <div class="bg-slate-950/80 px-6 py-8 sm:px-10 sm:py-10">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.35em] text-cyan-300 font-semibold">Company Setup</p>
                        <h1 class="mt-3 text-3xl font-bold text-white sm:text-4xl">Edit Company</h1>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Update the company name and location.</p>
                    </div>
                    <a href="{{ route('companies.index') }}" class="inline-flex items-center gap-2 rounded-2xl border border-slate-700 bg-slate-950/80 px-4 py-3 text-sm font-semibold text-slate-100 transition hover:border-cyan-500 hover:text-cyan-300">
                        ← Back to companies
                    </a>
                </div>
            </div>

            <div class="px-6 pb-8 sm:px-10">
                <form action="{{ route('companies.update', $company->id) }}" method="POST" class="grid gap-6">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-slate-200" for="name">Company Name</label>
                        <input id="name" name="name" type="text" value="{{ $company->name }}" required class="w-full rounded-3xl border border-slate-700 bg-slate-950/70 px-4 py-3 text-sm text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20" />
                    </div>
                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-slate-200" for="location">Location</label>
                        <input id="location" name="location" type="text" value="{{ $company->location }}" placeholder="Austin, TX" class="w-full rounded-3xl border border-slate-700 bg-slate-950/70 px-4 py-3 text-sm text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20" />
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-sm text-slate-400">Changes will reflect immediately after saving.</p>
                        <button type="submit" class="inline-flex items-center justify-center rounded-3xl bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-3 text-sm font-semibold text-slate-950 transition hover:scale-[1.01] hover:shadow-xl hover:shadow-cyan-500/20">
                            Update Company
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>