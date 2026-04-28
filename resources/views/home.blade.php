<x-guest-layout>
    <section class="grid md:grid-cols-2 gap-10 mt-10">
        <div class="tracking-wide">
            <p class="text-muted-light dark:text-muted-dark mb-2">Hi, I'm</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-2 text-accent-light dark:text-accent-dark tracking-wide">Juan Carlos</h1>
            <p class="text-primary-light dark:text-primary-dark mb-4">Backend Web Developer & Problem Solver</p>
            <p class="text-text-light dark:text-text-dark mb-6 leading-relaxed">
                I build scalable web applications with clean code and exceptional
                user experiences.
            </p>

            <div class="flex gap-2">
                <x-link :active="true" target="_blank" href="{{ asset('JUAN-CARLOS-PADILLO.pdf') }}">
                    View CV
                </x-link>
                <x-link href="https://github.com/pads-only" target="_blank">
                    GitHub
                </x-link>
            </div>
        </div>
        <pre class="-mt-8"><code class="rounded-lg h-86">
    &lt;?php
        $developer = [
            "name" => "Juan Carlos Padillo",
            "role" => "Backend Web Developer",
            "skills" => ["PHP", "Laravel", "MySQL"],
            "passion" => "Clean Code",
            "location" => "Taguig, Metro Manila",
            "available" => true
        ];
    ?&gt;</code></pre>
    </section>

    <!-- About -->
    <section class="grid md:grid-cols-2 gap-10 mt-16 text-text-light dark:text-text-dark">
        <div>
            <h2 class="text-xl font-semibold mb-4 text-accent-light dark:text-accent-dark">About Me</h2>
            <p class=" mb-6">
                I’m a web developer who enjoys building simple and useful web applications. I mostly work with Laravel, Tailwind CSS, and modern JavaScript, focusing on creating things that feel clean, easy to use, and well put together.
            </p>
            <p class=" mb-4">
                For me, development is not just about making things work, but making them make sense.
            </p>
        </div>

        <!-- Skills -->
        <div class="text-text-light dark:text-text-dark tracking-wide">
            <h3 class="mb-4 text-xl font-semibold text-accent-light dark:text-accent-dark">Skills</h3>
            <div class="flex flex-wrap gap-3 text-sm uppercase">
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">HTML</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">CSS</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">JavaScript</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">React</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">Node js</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">Tailwind css</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">PHP</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">Laravel</span>
                <span class="border border-border-light dark:border-border-dark px-3 py-1 rounded-lg">Github</span>                
            </div>
            
            <div class="text-text-light dark:text-text-dark tracking-wide mt-4">
                <h3 class="mb-4 text-xl font-semibold text-accent-light dark:text-accent-dark">Contact Me</h3>
                <div class="flex flex-wrap gap-3 text-sm border border-border-light dark:border-border-dark p-4 rounded-md">
                    <p>padillojuancarlos434@gmail.com</p>       
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>