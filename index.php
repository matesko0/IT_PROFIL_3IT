<?php
// Načtení dat ze souboru profile.json
$jsonRaw = file_get_contents('profile.json');
// Převod JSONu na PHP pole
$data = json_decode($jsonRaw, true);

if ($data === null) {
    die("Chyba: profile.json obsahuje chybu nebo chybí!");
}

$name = $data['name'] ?? 'Matěj Maršík';
$skills = $data['skills'] ?? [];
$interests = $data['interests'] ?? [];
$projects = $data['projects'] ?? [];
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($name); ?> | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-slate-200 antialiased overflow-x-hidden">

    <div class="bg-animation">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8 lg:py-16 flex flex-col lg:flex-row gap-8 relative z-10">
        
        <aside class="lg:w-1/3 fade-in" style="animation-delay: 0.1s;">
            <div class="glass rounded-3xl p-10 text-center lg:sticky lg:top-10 shadow-2xl transition-all duration-500 hover:shadow-indigo-500/20 group">
                <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-tr from-indigo-500 to-fuchsia-500 rounded-2xl flex items-center justify-center text-4xl font-black text-white shadow-xl transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110">
                    <?php echo mb_substr($name, 0, 1) . mb_substr(explode(' ', $name)[1] ?? '', 0, 1); ?>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2"><?php echo htmlspecialchars($name); ?></h1>
                <p class="text-indigo-400 font-medium tracking-widest uppercase text-xs mb-8 italic">Student & IT nadšenec</p>
                
                <div class="space-y-4 text-left border-t border-white/10 pt-8">
                    <div class="flex items-center gap-4 text-slate-300 p-2 rounded-lg transition-colors hover:bg-white/5">
                        <i class="fa-solid fa-location-dot text-indigo-500"></i>
                        <span class="text-sm">Česká republika</span>
                    </div>
                </div>
            </div>
        </aside>

        <main class="lg:w-2/3 flex flex-col gap-12">
            
            <section class="fade-in" style="animation-delay: 0.3s;">
                <h2 class="text-2xl font-bold mb-6 text-white flex items-center gap-3">
                    <span class="w-2 h-6 bg-indigo-500 rounded-full"></span> Dovednosti
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($skills as $skill): ?> <div class="glass p-6 rounded-2xl border border-white/5 transition-all duration-300 hover:scale-[1.03] hover:rotate-1 hover:border-indigo-500/50 hover:shadow-[0_0_20px_rgba(79,70,229,0.2)]">
                            <div class="flex items-center gap-4 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center">
                                    <i class="fa-solid <?php echo htmlspecialchars($skill['icon']); ?>"></i>
                                </div>
                                <h3 class="font-bold"><?php echo htmlspecialchars($skill['name']); ?></h3>
                            </div>
                            <p class="text-slate-400 text-sm leading-relaxed"><?php echo htmlspecialchars($skill['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <section class="fade-in" style="animation-delay: 0.5s;">
                    <h2 class="text-2xl font-bold mb-6 text-white flex items-center gap-3">
                        <span class="w-2 h-6 bg-rose-500 rounded-full"></span> Zájmy
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        <?php foreach ($interests as $interest): ?>
                            <div class="glass px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 hover:bg-white/10 hover:-translate-y-1">
                                <i class="fa-solid <?php echo htmlspecialchars($interest['icon']); ?> mr-2 <?php echo htmlspecialchars($interest['color']); ?>"></i>
                                <?php echo htmlspecialchars($interest['title']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="fade-in" style="animation-delay: 0.7s;">
                    <h2 class="text-2xl font-bold mb-6 text-white flex items-center gap-3">
                        <span class="w-2 h-6 bg-emerald-500 rounded-full"></span> Projekty
                    </h2>
                    <?php foreach ($projects as $project): ?>
                        <div class="group relative bg-indigo-600/30 p-6 rounded-3xl border border-white/10 shadow-lg overflow-hidden transition-all duration-500 hover:bg-indigo-600/50 hover:shadow-indigo-500/20">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:animate-[shimmer_2s_infinite]"></div>
                            
                            <h3 class="text-xl font-bold text-white mb-2 relative z-10"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="text-xs text-indigo-100 mb-4 opacity-80 relative z-10"><?php echo htmlspecialchars($project['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider underline relative z-10 hover:text-white">
                                GitHub Repo <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </main>
    </div>

</body>
</html>
