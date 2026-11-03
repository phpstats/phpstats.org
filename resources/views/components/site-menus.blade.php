{{-- The start of every bar: the PHPstats mark, linking home, and one menu per group of packages. --}}
@props(['current' => null, 'dark' => false])

<a href="{{ route('home') }}" @class([
    'flex shrink-0 items-center rounded-lg py-1.5 pr-2 text-sm font-semibold',
    'flex-col gap-0 min-[420px]:flex-row min-[420px]:gap-2' => ! $current,
    'gap-2' => $current,
    'text-white' => $dark,
    'text-zinc-900 dark:text-white' => ! $dark,
]) aria-label="PHPstats home">
    <x-logo :size="28" />
    <span @class(['hidden sm:inline' => $current, 'text-xs leading-tight min-[420px]:text-sm' => ! $current])>PHPstats</span>
</a>
{{-- The menus fill the space between the mark and the bar's links, centered in it. --}}
<div class="flex min-w-0 flex-1 items-center justify-center">
    @foreach (config('phpstats.menus') as $menu)
        <x-group-menu :menu="$menu" :current="$current" :dark="$dark" />
    @endforeach
</div>
