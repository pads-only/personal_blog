<section class="bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            
            <!-- Header -->
            <thead class="bg-background-light dark:bg-background-dark text-muted-light dark:text-muted-dark">
                <tr>
                    {{ $head }}
                </tr>
            </thead>

            <!-- Body -->
            <tbody>
                {{ $slot }} 
            </tbody>

        </table>
    </div>
</section>