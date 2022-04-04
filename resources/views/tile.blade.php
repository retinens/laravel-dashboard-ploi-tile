<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div
            class="flex items-center justify-center w-10 h-10 rounded-full"
            style="background-color: rgba(255, 255, 255, .9)"
        >
            <img src="https://documentator.s3.eu-west-3.amazonaws.com/10/DiscordDefault.png" alt="">
        </div>
        <div wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center | divide-y-2">
            <ul class="divide-y-2">
                @foreach ($servers as $server)
                    <li class="dark:border-gray-800 dark:border-gray-800 last:rounded-b-lg">
                        <div  class="flex items-center p-2">
                            <div class="w-2 h-10 rounded-md bg-gray-400 relative z-0
                            @switch($server['status'])
                                @case('created')
                                @case('active')
                                @case('active')
                                bg-success
                                    @break
                                @case('creating-failed')
                                @case('building-failed')
                                @case('unreachable')
                                bg-error
                                    @break
                                @default
                            @endswitch">
                                <!----></div>
                            <!---->
                            <div class="ml-4"><p class="text-sm"><span
                                        class="font-medium">{{ $server['name'] }}</span>
                                    <span>· {{ $server['ip_address'] }}</span> <!----> <!----> <!----> <!----></p>
                                <p class="text-xs text-gray-500 dark:text-gray-300"><span>{{ $server['sites_count'] }} sites · </span>
                                    <span>{{ $server['uptime_human'] }}</span></p></div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</x-dashboard-tile>
